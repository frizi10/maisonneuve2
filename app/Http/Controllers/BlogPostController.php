<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Zip\Zip;

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

        //$posts = BlogPost::all();
        $posts = new BlogPost;
        $posts = $posts-> blogTranslationSelect();

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
        return view('blog.create');
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
        // $request->validate([
        //     'nom' => 'required|string',
        //     'adresse' => 'required|string',
        //     'phone' => 'required|string',
        //     'email' => 'required|email',
        //     'ville_id' => 'required|exists:villes,id',
        //     'date_de_naissance' => 'required|date',
        // ]);
        
        $newPost = BlogPost::create([
            'title'=> $request->title,
            'body'=> $request->body,
            'user_id'=> Auth::user()->id,
            //'category_id'=> $request->category_id
            'title_fr' => $request->title_fr,
            'body_fr' => $request->body_fr,


        ]);
        
        return redirect(route('blog.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show($blogPost)
    {
        
        $post = new BlogPost;

        $post = $post->blogTranslationSelectByID($blogPost);



        return view('blog.show',['blogPost'=>$post]);
    }


    public function page(){
        $blogPosts = BlogPost::Select()
                    ->paginate(4);
        return view('blog.page', ['blogPosts'=> $blogPosts]);            
    }

   
}