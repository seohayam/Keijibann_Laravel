@extends('layouts.app')

@section('content')
<div class=" d-flex justify-content-center text-left">

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            <h1 class="m-5">投稿ページ</h1>

            @if(count($errors) < 0)
            <p>保存完了</p>
            @endif

            @csrf

            <div class="form-group">
                @error('title')
                <p>{{$message}}</p>
                @enderror
                <label class="mr-3">タイトル</label>
                <input type="text" name="title" placeholder="title" class="form-controll">
            </div>
            <hr>

            <div class="form-group">
                @error('category_id')
                <p>{{$message}}</p>
                @enderror
                <label class="mr-3">カテゴリ</label>
                <select type="radio" name="category_id" placeholder="category" class="form-controll">
                    <option selected = "">選択する</option>
                    <option value="1">travel</option>
                    <option value="2">cafe</option>
                    <option value="3">book</option>
                </select>
            </div>
            <hr>

            <div class="form-group">
                @error('content')
                <p>{{$message}}</p>
                @enderror
                <label class="mr-3">コンテント</label>
                <div class="form-controll">
                    <textarea name="content"  style="width:350px;"></textarea>
                </div>
            </div>
            <hr>

            <div class="form-group">
                @error('image_file')
                <p>{{$message}}</p>
                @enderror
                <label class="mr-3">ファイル</label>
                <input type="file" name="image" class="form-controll">
            </div>
            <hr>

            <input type="hidden" name="user_id" value="{{Auth::id()}}">

            <div class="form-group text-center my-5">
                <input type="submit" value="投稿" class="form-controll btn btn-info">
            </div>

        </form>
</div>
@endsection
