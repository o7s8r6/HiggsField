<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Helpers\Helper;

class PostsController extends Controller
{

    public function save(Request $request)
    {
    	$rules = [
    		'caption'=>'required',
    	];
    	$this->validate($request, $rules);

    	$data = $request->all();
    	if (isset($data['is_public']))
    		$data['is_public']=1;
    	else
    		$data['is_public']=0;

    	$data['user_id'] = Auth::id();

		if($request->hasFile('image'))
        {
            $file = Helper::upload($request->file('image'), 'posts');
            $data['image'] = $file['url'];
            
        }

    	Post::create($data);

    	return redirect(route('home'));
    }

    public function delete($id)
    {
    	$user_id= Auth::id();
        $post = Post:: where('user_id', $user_id)->where('id', $id)->delete();
        //$post->delete();

        return redirect(route('home'));
    }
}
