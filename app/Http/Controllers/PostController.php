<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

use App\Post;
use App\HTTP\Requests\PostRequest;
use App\Tag;
use Laravel\Ui\Presets\React;
use PhpParser\Node\Expr\AssignOp\Pow;
use function GuzzleHttp\Promise\all;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = Post::with('category')->get();
        $items = Post::latest()->paginate(3);
        $items->load('category','users','comments','tags');
        // リレーションは貼れているが'tag_name'が文字列として表示されない
        // $tag_name = Post::find(1)->tags()->first();
        return view('posts.post', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request, Post $post)
    {
        if($request->file('image')->isValid()){
            //その他
            $post->user_id = $request->user_id;
            $post->category_id = $request->category_id;
            $post->title = $request->title;
            $post->content = $request->content;

            //image
            $path = $request->file('image')->store('public/image');
            $post->image = basename($path);


            // tag付け
            preg_match_all('/#([a-zA-z0-9０-９ぁ-んァ-ヶ亜-熙]+)/u', $request->content, $match);
            $tags = [];
            foreach ($match[1] as $tag) {
                $record = Tag::firstOrCreate(['tag_name' => $tag]);
                array_push($tags, $record);
            };
            $tags_id = [];
            foreach ($tags as $tag) {
                array_push($tags_id, $tag['id']);
            };



            $post->tags()->sync($tags_id);
            dd($post);

            $post->save();

        }
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // ここのPostはPostモデルのもの
    public function show(Post $post)
    {
        // Postされたもの、つまり$item->idである
        // $id = post_id
        //findであれば表示可能
        // $items = Post::find($id);
        // loadの引数解説category=categoryリレーション、users=usersリレーション、commetns.users＝commetsー>usersモデル
        $items = $post->load('category','users','comments');
        return view('posts.show', ['items' => $items]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $items = Post::where('title', 'like', "%{$request->search}%")->orWhere('content', 'like', "%{$request->search}%")->paginate(2);

        $numberOfSerched = '検索結果'.count($items).'件';
        // dd($items);
        return view('posts.post', ['items' => $items, 'num' => $numberOfSerched, 'searched' => $request->search] );
    }
}
