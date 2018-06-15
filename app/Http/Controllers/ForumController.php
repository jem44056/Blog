<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Reply;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\CreateReplyRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ForumController extends Controller
{
	function __construct(){
		$this->middleware('auth', ['except' => ['viewPost']]);
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPost(){
    	$categories = Category::all();
        return view('pages.question', compact('categories'));
    }

    public function postQuestion(CreatePostRequest $request){
    	$post = new Post();

      $post->user_id = Auth::user()->id; 
    	$post->category_id = $request['category'];
    	$post->title = $request['title'];
    	$post->body = $request['body'];

    	$post->save();

      notify()->flash('<h3>Post saved successfully</h3>', 'success');

    	return redirect('/');
    }

    public function viewPost($slug){
        try{
            $post = Post::where('slug', '=', $slug)->first();

            return view('pages.reply', compact('post'));
 
        }catch(ModelNotFoundException $ex){
            return redirect('/');
        } 
    }

    public function saveReply(CreateReplyRequest $request){
        $post = Post::where('slug', '=', $request['slug'])->first(); 

        if($post){
          $reply = new Reply;

          $reply->post_id = $post->id;
          $reply->user_id = Auth::user()->id;
          $reply->body = $request['body'];  

          $reply->save();

          notify()->flash('<h3>Reply submitted successfully</h3>', 'success');


          return redirect()->back();
        }
        return redirect('/');  
    }

    public function deleteQuestion(Request $request){
        try{
            $post = Post::findOrFail($request['post_id']);

            if(Auth::user()->id == $post->user_id){
              $post->delete();
              notify()->flash('<h3>Post deleted successfully</h3>', 'success');

            }

            return redirect()->back();
 
        }
        catch(ModelNotFoundException $ex){
            return redirect('/');
        } 
    }

    public function deleteReply(Request $request){
      try{
            $reply = Reply::findOrFail($request['reply_id']);

            if(Auth::user()->id == $reply->user_id){
              $reply->delete();
              notify()->flash('<h3>Reply deleted successfully</h3>', 'success');

            }

            return redirect()->back();
 
        }
        catch(ModelNotFoundException $ex){
            return redirect('/');
        } 
    }

    public function getEditPost($id){

      try{
            $post = Post::findOrFail($id);

            if(Auth::user()->id == $post->user_id){
              $categories = Category::all();
              return view('pages.edit_post', compact('post', 'categories'));
            }

            return redirect()->back();
 
        }
        catch(ModelNotFoundException $ex){
            return redirect('/');
        } 
    }

    public function saveEditPost(CreatePostRequest $request){
      try{
            $post = Post::findOrFail($request['post_id']);

            if(Auth::user()->id == $post->user_id){
              $post->category_id = $request['category'];
              $post->title = $request['title'];
              $post->body = $request['body'];

              $post->save();

              notify()->flash('<h3>Post updated successfully</h3>', 'success');

              return redirect('/');
              } 
 
        }
        catch(ModelNotFoundException $ex){
            return redirect('/');
        } 
    }
}
