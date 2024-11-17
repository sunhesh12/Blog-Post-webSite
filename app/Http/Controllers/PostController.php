<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //
    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'description' => 'required',
            'thumbnail' => 'required|image|mimes:png,jpeg,jpg,avif',
        ]);

        if($validator -> fails()){
            return back()->with('status', 'Something went wrong!');
        }else{
            $imageName = time() . "." . $request->thumbnail->extension();

            $request->thumbnail->move(public_path('thumbnail'),$imageName);

            post::create([
                'user_Id' => auth()->user()->id,
                'title' => $request->title,
                'description' => $request->description,
                'thumbnail'=> $imageName,
    
            ]);
        }

        return redirect(route('posts.all'))->with('status', 'Post Created Successfully!');
    }


    public function show($postId){

        $post = Post::findOrFail($postId);

        return view('posts.show', compact('post'));

    }


    public function edit($postId){
        $post = Post::findOrFail($postId);
        return view('posts.edit', compact('post'));
    }


    public function update($postId, Request $request){

        Post::findOrFail($postId)->update($request->all());

        return  redirect(route('posts.all'))->with('status','Post Updated successfully!');


    }

    public function delete($postId){

        Post::findOrFail($postId)->delete();
        return  redirect(route('posts.all'));

    }
}
