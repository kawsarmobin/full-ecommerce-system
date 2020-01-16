<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Model\Admin\BlogPost;
use App\Model\Admin\BlogCategory;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BlogPostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.blog.posts.index')->with('blog_posts', BlogPost::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.posts.create')->with('blog_categories', BlogCategory::orderBy('name_en')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'blog_category_id' => 'required',
            'title_en' => 'required',
            'title_bn' => 'required',
            'description_en' => 'required',
            'description_bn' => 'required',
        ]);

        $input = $request->all();

        if ($post_image = $request->file('image')) {
            $image_name = time() . uniqid() . '-' . Str::slug($request->title_en) . '.' . $post_image->getClientOriginalExtension();
            Image::make($post_image)->resize(400, 240)->save(BlogPost::ATTACH_UPLOAD_PATH. '/' .$image_name);
            $input['image'] = $image_name;
        }

        BlogPost::create($input);

        $notification = array(
            'messege' => 'Blog post added successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Admin\BlogPost  $blog_post
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blog_post)
    {
        return view('admin.blog.posts.edit')->with('blog_post', $blog_post)->with('blog_categories', BlogCategory::orderBy('name_en')->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Admin\BlogPost  $blog_post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blog_post)
    {
        $this->validate($request, [
            'blog_category_id' => 'required',
            'title_en' => 'required',
            'title_bn' => 'required',
            'description_en' => 'required',
            'description_bn' => 'required',
        ]);

        $input = $request->all();

        if ($post_image = $request->file('image')) {
            $image_name = time() . uniqid() . '-' . Str::slug($request->title_en) . '.' . $post_image->getClientOriginalExtension();
            unlink(BlogPost::ATTACH_UPLOAD_PATH. '/' .$blog_post->getOriginal('image'));
            Image::make($post_image)->resize(400, 240)->save(BlogPost::ATTACH_UPLOAD_PATH. '/' .$image_name);
            $input['image'] = $image_name;
        }

        $blog_post->update($input);

        $notification = array(
            'messege' => 'Blog post updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('blog-posts.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Admin\BlogPost  $blog_post
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blog_post)
    {
        if ($blog_post->delete())
        {
            unlink(BlogPost::ATTACH_UPLOAD_PATH. '/' .$blog_post->getOriginal('image'));

            $notification = array(
                'messege' => 'Blog post deleted successfully',
                'alert-type' => 'success'
            );
        }
        return back()->with($notification);
    }
}
