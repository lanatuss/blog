@extends('layouts.app')

@section('content')

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">发布文章</div>

                    <div class="panel-body">
                        @include("shared.errors")
                        <form action="{{ url('/articles/update/'.$article->id) }}" method="post" >
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title">标题</label>
                                <input type="text" name="title" required="require"
                                       value=" {{ $article->title }}" class="form-control" placeholder="标题" id="title">
                                <input type="hidden" value="{{$article->id}}" name="id">
                            </div>
                            @include('editor::head')

                            <label for="content">内容</label>
                            <div class="form-group">
                                <div class="editor">
                                    <textarea id='myEditor' name="content">  {{ $article->content }}</textarea>
                                </div>
                            </div>

                            <button class="btn btn-success pull-right" type="submit">编辑文章</button>
                        </form>
                        <form method="get" action="{{ url('/articles/delete/'.$article->id) }}">
                            <button class="btn btn-danger pull-left" type="submit">删除文章</button>
                        </form>
                    </div>
                </div>
            </div>

  {{--@section('js')--}}
    {{--<script type="text/javascript">--}}
        {{--$(document).ready(function () {--}}
            {{--var simplemde = new SimpleMDE({--}}
               {{--autofocus: true,--}}
                {{--autosave: {--}}
                    {{--enabled: true,--}}
                    {{--delay: 5000,--}}
                    {{--unique_id: "editor01",--}}
                {{--},--}}
                {{--element: document.getElementById("editor"),--}}
                {{--spellChecker: false,--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
  {{--@endsection--}}
@endsection



