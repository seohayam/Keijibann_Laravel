@extends('layouts.app')

@section('content')
<div class="card m-5 bg-light">
    <div class="card-body text-center">
        <h1 class="p-3">{{$user->name}}の投稿</h1>
        <h3 class="p-3">email：{{$user->email}}</h3>
    </div>
</div>

<hr>

@foreach($user->posts as $post)
<div class="card m-5 border border-info">
    <div class="card-body text-center">
    <h3 class="p-3">タイトル：{{$post->title}}</h3>
    <hr class="mx-5 px-5">
    <p class="p-3">内容：{{$post->content}}</p>
    </div>
</div>
@endforeach

@endsection
