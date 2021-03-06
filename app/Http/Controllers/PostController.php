<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();

    	return view('posts.index');
    }

    public function create() {

    	return view('posts.create');
    }

    public function store() {

    	$this->validate(request(), [

    		'userSkill' => 'required',
            'jobLocation' => 'required',
			'toDo'		=> 'required',
			'deadline' 	=> 'required',
			'experience'=> 'required',
			'start'		=> 'required',
			'priceRange'=> 'required',
			'noOfWorkers'=>'required'

    	]);

    	\App\Post::create([

    		'userSkill' => request('userSkill'),
            'jobLocation' => request('jobLocation'),
			'toDo' => request('toDo'),
			'deadline' => request('deadline'),
			'experience' => request('experience'),
			'start' => request('start'),
			'priceRange' => request('priceRange'),
			'noOfWorkers' => request('noOfWorkers')

    	]);

    	return redirect('/employer/myPosts');
    }
}
