<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Category;

class CategoryController extends Controller
{
    protected $page_heading = 'Categories';
    protected $page_sub_heading = 'Sub heading';
    protected $add_link = '';
    protected $back_link = '';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->back_link = route('admin_categories');
        $this->add_link = route('create_category');
    }

    public function index(Request $request)
    {
        $categories = Category::paginate(20);
        $data=[
            'categories'=>$categories,
            'success'=>$request->session()->get('success'),
            'page_heading'=>$this->page_heading,
            'page_sub_heading'=>$this->page_sub_heading,
            'add_link'=>$this->add_link
        ];
        return view('admin.categories.list',$data);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'page_heading'=>$this->page_heading,
            'page_sub_heading'=>$this->page_sub_heading,
            'back_link'=>$this->back_link
        ];
        return view('admin.categories.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
            'desc' => 'required|min:10',
        ]);

        $category = new Category;
        $category->name = $request->input('name');
        $category->slug = Str::slug($category->name, '-');
        $category->desc = $request->input('desc');
        $category->save();

        $request->session()->flash('success', 'added');
        return redirect()->route('admin_categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        echo '<pre>';print_r($category);exit;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $data = [
            'category'=>$category,
            'page_heading'=>$this->page_heading,
            'page_sub_heading'=>$this->page_sub_heading,
            'back_link'=>$this->back_link
        ];
        return view('admin.categories.edit',$data);
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
        $category = Category::find($id);
        $input = $request->all();
        $category->name = $input['name'];
        $category->desc = $input['desc'];
        $category->save();

        $request->session()->flash('success', 'updated');
        return redirect()->route('admin_categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id)
    {
        $category = Category::find($id)->delete();
        $request->session()->flash('success', 'deleted');
        return redirect()->route('admin_categories');
    }
}
