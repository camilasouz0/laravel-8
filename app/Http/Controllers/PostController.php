<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(){

        $posts = Post::orderBy('id', 'DESC')->paginate();
        return view('layout.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('layout.posts.create');
    }

    public function store(StoreUpdatePost $request){
        $dados = new Post;
        $dados->title = $request->input('title');
        $dados->content = $request->input('content');
        $dados->save();

        return redirect()->route('posts.index')->with('message', 'Atualizado');
    }

    public function show($id){
        //$post = Post::where('id', $id)->first();

        if(!$post = Post::find($id)){
            return redirect()->route('posts.index');
        }
        
        return view('layout.posts.show', compact('post'));
    }

    public function destroy($id){
        if(!$post = Post::find($id)){
            return redirect()->route('posts.index');
        }
        $post->delete();
        return redirect()->route('posts.index')->with('message', 'Post deletado');
    }

    public function edit($id){
        if(!$post = Post::find($id)){
            return redirect()->back();
        }
        return view('layout.posts.edit', compact('posts'));
    }
    
    public function update(StoreUpdatePost $request, $id){
        if(!$post = Post::find($id)){
            return redirect()->back();
        }
        $post->update($request->all());

        return redirect()->route('posts.index')->with('message', 'Post criado');
    }

    public function search(Request $request){
        $posts = Post::where('title', 'LIKE', "%{$request->input('search')}%")
            ->orWhere('content', 'LIKE', "%{$request->input('search')}%")
            ->paginate();
        // dd($request->input('search'));
        return view('layout.posts.index', compact('posts'));
    }
}
