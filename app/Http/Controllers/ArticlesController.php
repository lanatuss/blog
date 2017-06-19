<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticle;
use App\Http\Requests\UpdateArticle;
use App\Models\Article;
use Illuminate\Http\Request;
use YuanChao\Editor\EndaEditor;

class ArticlesController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(5);

        foreach($articles as $k => $article)
        {
//            $content = $this->markdown->markdown($article->content);
//
//            // 去除html标签
//            $content = strCut($content);
            $articles[$k]->content = strip_tags(str_limit($article->content,300,'...'));
        }

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateArticle $request)
    {
       $data['user_id'] = \Auth::id();
        $data['content'] = htmlspecialchars($request->get('content'));
       $Article =  Article::create(array_merge($data,$request->all()));

        return redirect()->route('articles.show',[$Article->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::where('id',$id)->firstOrFail();
        $article->content = EndaEditor::MarkDecode(htmlspecialchars_decode($article->content));
        $article->increment('views_count');
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::where('id',$id)->firstOrFail();
        $article->content = strip_tags((htmlspecialchars_decode($article->content)));
       return view('articles.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticle $request, $id)
    {
        $article = Article::where('id',$id)->firstOrFail();
        $article->title = $request->get('title');
        $article->content = EndaEditor::MarkDecode(htmlspecialchars_decode($request->get('content')));
        $article->update();

        return redirect()->route('articles.show',[$article->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::destroy($id);
        return redirect()->route('articles.index');
    }
}
