<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Update the given post.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */

    protected $page_heading = 'Posts';
    protected $page_sub_heading = 'Sub heading';
    protected $add_link = '';
    protected $back_link = '';

    public function __construct()
    {
        $this->back_link = route('admin_posts');
        $this->add_link = route('posts.create');
    }

    function index(Request $request)
    {
        /*$user = auth()->user();
        $permissions = $user->getAllPermissions();
        dd($permissions);*/
        $posts = Post::latest()->paginate(env('PAGING_PER_PAGE', 20));
        $data=[
            'posts'=>$posts,
            'success'=>$request->session()->get('success'),
            'page_heading'=>$this->page_heading,
            'page_sub_heading'=>$this->page_sub_heading,
            'add_link'=>$this->add_link
        ];
        return view('admin.posts.index', $data);
    }

    function create()
    {
        $data=[
            'page_heading'=>$this->page_heading,
            'page_sub_heading'=>$this->page_sub_heading,
            'add_link'=>$this->add_link
        ];
        return view('admin.posts.add', $data);
    }

    function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|unique:posts|min:3|max:255',
            'contents' => 'required|min:30',
        ]);

        $post = new Post;
        $post->title = $request->input('title');
        $post->slug = Str::slug($post->title, '-');
        $post->contents = $request->input('contents');
        $post->user_id = Auth::id();
        $post->save();

        $request->session()->flash('success', 'added');
        return redirect()->route('admin_posts');
    }

    function edit(Post $post)
    {
        $data = [
            'post'=>$post,
            'page_heading'=>$this->page_heading,
            'page_sub_heading'=>$this->page_sub_heading,
            'back_link'=>$this->back_link
        ];
        return view('admin.posts.edit',$data);
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            //'title' => 'required|unique:posts|min:3|max:255',
            'title' => ['required',
                Rule::unique('posts')->ignore($post->id),
                'min:3','max:255'
            ],
            'contents' => 'required|min:30',
        ]);

        $post->title = $request->input('title');
        $post->contents = $request->input('contents');
        $post->update();

        $request->session()->flash('success', 'updated');
        return redirect()->route('admin_posts');

        return ['msg' => 'Post updated'];
    }

    function destroy(Request $request,Post $post)
    {
        $post->delete();
        $request->session()->flash('success', 'deleted');
        return redirect()->route('admin_posts');
    }

    function publish(Request $request, Post $post){

        $post->published = ! ($request->input('published'));
        $post->save();

        $msg = 'Post is published';
        if($post->published ===false)
            $msg = 'Post is unpublished';
        $response = array(
            'status' => 'success',
            'msg' => $msg
        );
        return response()->json($response);
    }
}
