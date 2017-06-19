@extends('layouts.app')

@section('content')
            <div class="col-md-8 col-md-offset-2">
                <div class="panel article-body content-body">
                    <div class="panel-body">
                        <h1 class="text-center">
                            {{ $article->title }}
                        </h1>

                        <div class="article-meta text-center">
                            <i class="fa fa-clock-o"></i> <abbr title="{{ $article->created_at }}" class="timeago">{{ $article->created_at }}</abbr>
                            ⋅
                            <i class="fa fa-eye"></i> {{ $article->views_count }}
                            ⋅
                            <i class="fa fa-thumbs-o-up"></i> {{ $article->votes_count }}
                            ⋅
                            <i class="fa fa-comments-o"></i> {{ $article->comments_count }}

                        </div>
                        <div class="entry-content">
                            <div class="markdown" >
                                {!! $article->content !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            {{--<div class="col-md-3">--}}
                {{--<div id="category-menu" style="padding:15px;background:#ffffff;margin-top:150px;">--}}
                    {{--<div id="category"><b>文章目录</b><br/></div>--}}
                {{--</div>--}}
            {{--</div>--}}
            @section('js')
                {{--<script type="text/javascript">--}}
                    {{--$(document).ready(function(){--}}
                        {{--$(".entry-content h2,.entry-content h3,.entry-content h4,.entry-content h5,.entry-content h6").each(function(i,item){--}}
                            {{--var tag = $(item).get(0).localName;--}}

                            {{--$(item).attr("id","wow"+i);  // 添加标签属性，增加锚点--}}
                            {{--$("#category").append('<a class="new'+tag+'" href="#wow'+i+'">'+$(this).text()+'</a></br>');--}}
                            {{--$(".newh2").css("margin-left",0);--}}
                            {{--$(".newh3").css("margin-left",20);--}}
                            {{--$(".newh4").css("margin-left",40);--}}
                            {{--$(".newh5").css("margin-left",60);--}}
                            {{--$(".newh6").css("margin-left",80);--}}
                        {{--});--}}

                    {{--});--}}
                {{--</script>--}}
            @endsection

        <!-- 评论Vue -->
        <comments
                type="article"
                model="{{ $article->id }}"
                count="{{ $article->comments_count }}"
        ></comments>

@endsection



