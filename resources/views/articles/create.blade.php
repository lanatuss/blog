@extends('layouts.app')

@section('content')

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">发布文章</div>

                    <div class="panel-body">
                        @include("shared.errors")
                        <form action="/articles" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title">标题</label>
                                <input type="text" name="title" required="require"
                                       value="{{ old('title') }}" class="form-control" placeholder="标题" id="title">
                            </div>
                            @include('editor::head')

                            <label for="content">内容</label>
                            <div class="form-group">
                                <div class="editor">
                                    <textarea id='myEditor' name="content"> {{ old('content') }}</textarea>
                                </div>
                            </div>

                            <button class="btn btn-success pull-right" type="submit">发表文章</button>
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



