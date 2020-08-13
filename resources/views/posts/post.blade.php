@extends('layouts.app')

@section('content')
<div class="mb-5">
    <!-- 検索ホーム -->
            <div class="py-4">
                <div class="my-5 container h-100">
                    <div class="d-flex justify-content-center h-100">
                        <form action="{{ route('posts.search') }}" method="get">
                            <div class="searchbar">
                                <input class="search_input" type="text" name="search" placeholder="Search...">
                                <input type="submit" value="search" class="search_icon">
                                <i class="fas fa-search"></i>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    @if(isset($num))
    <div class="d-flex justify-content-center">
        <h3>{{$num}}</h3>
    </div>
    @endif

    <h1 class="text-center my-5"><a style="text-decoration: none;" class="my-5 text-info" href="{{ route('posts.index') }}">一覧ページ</a></h1>
    @foreach($items as $item)
    <div class="text-center my-5">
        <hr>
        <h1 class="text-dark my-5">{{$item->users->name}}の投稿</h1>

        <p class="text-secondary">タイトル:{{$item->title}}</p>
        <p class="text-secondary">内容：{{$item->content}}</p>
        <p class="my-3 text-secondary">カテゴリ:{{$item->category->category_name}}</p>

        <a class="btn btn-info" href="{{ route('users.show', $item->user_id) }}">{{$item->users->name}}さんの全投稿</a>
        <!-- posts/{post}となっている場合は引数を渡せねばならぬのじゃ -->
        <a class="btn btn-dark px-5" href="{{ route('posts.show', $item->id ) }}">詳細</a>
        <!-- この形で書けば、リクエストで受け付ける -->
        <a class="btn btn-info px-3" href="{{ route('comments.create', ['post_id' => $item->id]) }}">コメントする</a>
</div>
@endforeach
</div>
@if(isset($searched))
<div class="d-flex justify-content-center">{{$items->appends(['search' => $searched])->links()}}</div>
@else
<div class="d-flex justify-content-center">{{$items->links()}}</div>
@endif

@endsection
