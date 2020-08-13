@extends('layouts.app')

@section('content')
<h1 class="text-center my-5">コメント</h1>
<hr class="mb-5">
<div class="d-flex justify-content-center">
    <div class="d-flex d-column">
        <form action="{{ route('comments.store') }}" method="post">
        @csrf
        @error('comment')
        <p>{{$message}}</p>
        @enderror
        <div class="text-center mb-5">
            <textarea style="width: 500px; height: 200px;" name="comment" placeholder="コメントを記入してください"></textarea>
        </divz>
        <div class="text-center my-5">
            <input type="hidden" name="user_id" value="{{Auth::id()}}">
            <input type="hidden" name="post_id" value="{{$post_id}}">
            <input class="btn btn-info" type="submit" value="コメントする">
        </div>
        </form>
    </div>
</div>

@endsection
