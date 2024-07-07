<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Psy\Util\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();
        // $blogs = Blog::with(['user' => function($query){
        //     $query->where('email','random@gmail.com');
        // }])
        // ->where('email', 'random@gmail.com') // Replace with your actual where condition
        //->get();
        $blogs = Blog::where('user_id',$user->id)->get();
        //return $blogs;
        return view('blog.list',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //   dd(Auth::user()->id);
        // dd($request);
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>"required|image|mimes:jpeg,png,jpg|max:2048"
        ]);
        
        $filename = 'http://127.0.0.1:8000/storage/uploads/'.time().'.'.$request->image->extension();

        if ($request->hasFile('image')) {



       
            $request->image->move(public_path('storage/uploads'), $filename); 
            //$request->img->storeAs('public/uploads', $filename);
             
            
            $blog  = new Blog();
            $blog->user_id = Auth::user()->id;
            $blog->title = $request->title;
            $blog->description = $request->description;
            $blog->img = $filename;
            $blog->save();

            return redirect()->route('blog.index')->with('blog_create','sussessfully file uploaded');
        } else {
   
           return redirect()->back()->withErrors(['message' => 'Please upload an image file.']);
        }

            
           
           
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $blogs = Blog::findOrFail($id);
        //return $blogs;
        // return view('student.edit' , compact('student'));
        return view('blog.edit',compact('blogs'));
        // return 555;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'title' =>'',
        //     'description' =>'',
        // ]);
        
        $blog = Blog::findOrFail($id);
        if (!empty($request->input('title'))) {
            $blog->title = $request->input('title');
        }
        if (!empty($request->input('description'))) {
            $blog->description = $request->input('description');
        }
        // $blog->description = $request->description;
        
        $blog->save();
        return redirect()->route('blog.index')->with("Create",'Successfully Updated the Blog');
       
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $blogs = Blog::findOrFail($id);
        $filename = 'public/uploads/' . $blogs->img;
        // dd($filename);
        //dd(Storage::exists($filename));
        if($blogs && Storage::exists(public_path('uploads') . $blogs->img)){
            return 444;
        }
        $blogs->delete();
        return redirect()->route('blog.index')->with('delete','Blog Deleted Successfully');
    }
}
