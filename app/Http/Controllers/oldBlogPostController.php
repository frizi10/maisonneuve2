<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //SELECT *FROM `blog_posts`

        $posts = BlogPost::all();
        return view('blog.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categories = Category::select()->orderby('Category')->get(); = new Category;
        // $categories new Category;
        // $categories = $categories->categorySelect();

        // $categories = Category::categorySelect();
        // //return  $categories;
        // //return view('blog.create');
        // return view('blog.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //insert into blog_post(title, body) value (?,?)
        //newData = slect*from blod_post where id = lastInsertedID
        $newPost = BlogPost::create([
            'title'=> $request->title,
            'body'=> $request->body,
            'user_id'=> Auth::user()->id,
            'category_id'=> $request->category_id

        ]);
        
        return redirect(route('blog.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {
        
        return view('blog.show',['blogPost'=>$blogPost]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blogPost)
    {

        return view('blog.edit',['blogPost'=>$blogPost]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        $blogPost->update([
            'title' => $request->title,
            'body' => $request->body
        ]);
        return redirect(route('blog.show', $blogPost->id))->withSuccess(trans('lang.text_data_insert'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
         $blogPost->delete();
         
         return redirect (route('blog.index'))->withSuccess('Data deleted');
    }

    public function query(){
        //select 
       // $query = BlogPost::all();
        //$query = $query[0];
        //$query = BlogPost::Select()->get();
        //$query = BlogPost::Select()->get()->first();
        // $query = BlogPost::Select('title','body')
        // ->orderby('title','desc')
        // ->get();

        //select * from bolog_where id = 1
        // $query = BlogPost::Select()
        // ->where('id','=', 1)
        // ->get();

        // $query = BlogPost::Select()
        // ->where('id','=', 15)
        // ->first();

        //return $query->id;

        // $query = BlogPost::find(2);
        //afficher id 

       
        // $query= BlogPost::select()
        // ->where('user_id',1)
        // ->orwhere('id',4) 
        // ->get(); 
        
        //join
        // $query = BlogPost::select()
        // ->join('users', 'user_id','=', 'users.id')
        // ->get();

        // $query = BlogPost::select()
        //         ->Rightjoin('users', 'user_id','=', 'users.id')
        //         ->get();

        //Aggregation:  Max, Min, Avg, Count, Sum

        // $query = BlogPost::max('id');
        // $query = BlogPost::count('id');
        // $query = BlogPost::select()
        //         ->where('user_id', 1)
        //         ->count();
        //raw queries
        //
        // $query = BlogPost::select(DB::raw('count(*) as blogs'), 'user_id')
        //         ->groupBy('user_id)')
        //         ->get();

       // return $query;
    }
    public function page(){
        $blogPosts = BlogPost::Select()
                    ->paginate(4);
        return view('blog.page', ['blogPosts'=> $blogPosts]);            
    }
}