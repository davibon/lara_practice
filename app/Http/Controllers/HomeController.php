<?php
namespace App\Http\Controllers;
use View;
use App\model\Post;
// use Input; 
// use Redirect;
//use Illuminate\Support\Facades\Input;
//use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller {
	
    public function index()
    {
		$posts = Post::all();
        return View::make('post')
            ->with('title', '首頁ㄎㄎ')
            ->with('hello', '大家好～～')
			->with('posts',$posts);
    }
	
    public function show($id)
    {
		$post = Post::find($id);
		return View::make('show')
			->with('title', 'My Blog - '. $post->title)
			->with('post', $post);
    }
	
	public function create(){
		return View::make('create')
            ->with('title', '新增文章');
	}

	public function store(){
		$input = \Input::all();
	    $post = new Post;
		$post->title = $input['title'];
		$post->content = $input['content'];
		$post->save();
		return \Redirect::to('post');		
	}	

	public function edit($id){
		$post = Post::find($id);
		return View::make('edit')
            ->with('title', '編輯文章')
			->with('post',$post);
	}

	public function update($id){
		$input = \Input::all();
	    
		$post = Post::find($id);
		$post->title = $input['title'];
		$post->content = $input['content'];
		$post->save();
		return \Redirect::to('post');
	}	

	public function destroy($id){
		$post = Post::find($id);
		$post->delete();
		return \Redirect::to('post');
	}	
}
