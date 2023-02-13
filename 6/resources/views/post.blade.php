@extends('layouts.app')
@section('title', 'つぶやき一覧')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <!-- <form class="card p-3 mb-3" action="{{ action('PostController@create') }}" method="post" enctype="multipart/form-data"> -->
                <form class="card" action="{{ action('PostController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group">
                        <!-- <div class="list-group list-group-flush mb-2"><div class="col-md-2 list-group-item" for="body">本文</div></div> -->
                        <div class="list-group list-group-flush">
                            <div class="list-group-item" for="body">ホーム</div>
                        </div>
                        <div class="m-3 mb-3">
                            <input type="text" class="form-control" placeholder="いまどうしてる？" name="body" value="{{ old('body') }}">
                        </div>
                    
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        {{ csrf_field() }}
                        <div class="text-right m-2 mr-3"><input type="submit" class="btn btn-primary" value="つぶやく"></div>
                    </div>
                </form>
                <div>
                    @foreach($posts as $post)
                        <div class="card p-3">
                        @foreach($users as $user)
                            @if ($post->user_id == $user->id)
                                <div class="d-flex mb-2">
                                    <div style="width :49%; font-weight:bold">{{ $user->name }}</div>
                                    <div class="text-right" style="width :50%">{{ $post->created_at }}</div>
                                </div>
                                <div class="d-flex">
                                    <div style="width :49%">{{ $post->body }}</div>
                                    @if ($post->user_id == Auth::user()->id)
                                        <div class="text-right" style="width :50%"><a href="{{ action('PostController@delete', ['id'=>$post->id]) }}" style="color :red">削除</a></div>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection