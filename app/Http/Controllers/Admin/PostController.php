<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\FindPostForIdRequest;

class PostController extends Controller
{
    protected $model;

    public function __construct(Post $model)
    {
        $this->middleware('auth');
        $this->model = $model;
    }

    public function index() {
       $posts = $this->model::with('category')->get();

       return view('admin.posts.index', compact('posts'));
    }

    public function create() {
        $categories = Categories::all();

        return view('admin.posts.create', compact('categories'));
    }

    public function store(PostRequest $request) {
        $params = $request->validated();

        $posts = $this->model->create([
            'title' => $params['title'],
            'description' => $params['description'],
            'author' => $params['author'],
            'category_id' => $params['category_id']
        ]);

        $posts->save();

        return redirect()->route('admin.posts.index');
    }

    public function edit($id) {
        $post = $this->model::find($id);
        $categories = Categories::all();

        return view('admin.posts.edit', compact('post', 'categories'));
    }
    
    public function update(PostRequest $request) {
        $params = $request->validated();

        $posts = $this->model::find($params['id']);

        $posts->title = $params['title'];
        $posts->description = $params['description'];
        $posts->author = $params['author'];
        $posts->category_id = $params['category_id'];

        $posts->save();

        return redirect()->route('admin.posts.index');
    }

    public function delete(FindPostForIdRequest $request) {
        $params = $request->validated();

        $post = $this->model::find($params['id']);

        if(!$post) {
            return redirect()->route('admin.post.index')->with('error', 'La categoría no existe.');
        }

        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
