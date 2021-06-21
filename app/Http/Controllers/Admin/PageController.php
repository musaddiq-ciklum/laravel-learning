<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

use App\Models\Page;

class PageController extends Controller
{
    protected $page_heading = 'Pages';
    protected $page_sub_heading = 'Sub heading';
    protected $single_name = 'Page';
    protected $add_link = '';
    protected $index_page = '';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->index_page = route('pages.index');
        $this->add_link = route('pages.create');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pages = Page::paginate(env('PAGING_PER_PAGE', 20));
        $data=[
            'pages'=>$pages,
            'success'=>$request->session()->get('success'),
            'page_heading'=>$this->page_heading,
            'page_sub_heading'=>$this->page_sub_heading,
            'single_name'=>$this->single_name,
            'add_link'=>$this->add_link
        ];
        return view('admin.pages.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[
            'page_heading'=>$this->page_heading,
            'page_sub_heading'=>$this->page_sub_heading,
            'single_name'=>$this->single_name,
            'back_link'=>$this->index_page
        ];
        return view('admin.pages.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->input('id');
        $validated = $request->validate([
            'name' => 'required','max:255',
                Rule::unique('pages')->ignore($id),
            'desc' => 'required|min:10',
            'title' => '',
            'desc' => 'required|min:50'
        ]);

        /*$all = $request->all();
        echo '<pre>';print_r($all);exit;*/

        $page = new Page;
        $page->name = $request->input('name');
        $page->slug = Str::slug($page->name);
        $page->desc = $request->input('desc');
        $page->title = $request->input('title');
        $page->meta_desc = $request->input('meta_desc');
        $page->save();
        $request->session()->flash('success', 'added');
        return redirect()->route('pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);
        $data=[
            'page'=>$page,
            'page_heading'=>$this->page_heading,
            'page_sub_heading'=>$this->page_sub_heading,
            'back_link'=>$this->index_page,
            'single_name'=>$this->single_name,
        ];
        return view('admin.pages.edit',$data);
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
        $validated = $request->validate([
            'name' => 'required','max:255',
            Rule::unique('pages')->ignore($id),
            'desc' => 'required|min:10',
            'title' => '',
            'desc' => 'required|min:50'
        ]);

        $page = Page::find($id);
        $page->name = $request->input('name');
        $page->desc = $request->input('desc');
        $page->title = $request->input('title');
        $page->meta_desc = $request->input('meta_desc');
        $page->save();

        $request->session()->flash('success','updated');
        return redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        $page = Page::find($id)->delete();
        $request->session()->flash('success','deleted');
        return redirect()->route('pages.index');
    }
}
