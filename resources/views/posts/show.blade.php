@extends('layouts.app')

@section('content')
<div class="text-center mx-5 px-5">
    <h1 class="my-5 font-weight-bold text-cente">詳細</h1>
</div>

<div class="text-center my-5">
        <h2>投稿者：{{$items->users->name}}</h2>
        <hr class="bg-info" style="width: 10.0rem;">
        <h2>タイトル：{{$items->title}}</h2>
        <hr class="bg-info" style="width: 10.0rem;">
        <h2>内容：{{$items->content}}</h2>
        <hr class="bg-info" style="width: 10.0rem;">
    @isset($items->image)
    <img class="mt-5" src="{{ asset('storage/image/'.$items->image) }}">
    @endisset
    <hr class="bg-info mx-5">
</div>

<h1 class="mb-5 text-center">コメント一覧</h1>
@foreach($items->comments as $comment)
<div class="text-center">
    <div class="p-3 m-5 border border-info rounded">
        <h3 class="my-3">名前</h3>
        <div class="p-3 mx-5 mb-5 border border-info rounded">
            <p>{{$comment->user->name}}</p>
        </div>
        <h3 class="my-3">コメント</h3>
        <div class="p-3 mx-5 mb-5 border border-info rounded">
            <p>{{$comment->comment}}</p>
        </div>
    </div>
</div>
@endforeach
@endsection
