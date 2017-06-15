@extends('layouts.app')

@section('content')
            <div class="col-md-8 col-md-offset-2">
                @foreach($articles as $article)
                    <div class="media" style="border: 1px solid #eaeaea;margin-top: 20px;background-color: #fff;padding: 15px 22px;border-radius: 4px;">
                        <div class="media-body">
                            <h4 class="media-heading">
                                <a href="/articles/{{ $article->id }}">{{ $article->title }}</a>
                            </h4>
                            <p style="text-overflow:ellipsis;">
                                {{ $article->content }}
                            </p>
                            <small class="utility-muted">发表于 {{ $article->created_at }}</small>
                        </div>
                    </div>
                @endforeach
                    {!! $articles->render() !!}
            </div>
@endsection
