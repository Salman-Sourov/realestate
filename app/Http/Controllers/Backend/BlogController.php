<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{

    //All Blog Category
    public function AllBlogCategory()
    {
        $category = BlogCategory::latest()->get();
        return view('backend.category.blog_category', compact('category'));
    }

    public function StoreBlogCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        BlogCategory::insert([

            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_ireplace(' ', '-', $request->category_name)),
        ]);

        $notification = array(
            'message' => 'Blog Category Create Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }


    public function EditBlogCategory($id)
    {
        $categories = BlogCategory::findOrFail($id);
        return response()->json($categories);
    }

    public function UpdateBlogCategory(Request $request)
    {

        $cat_id = $request->cat_id;

        BlogCategory::findOrFail($cat_id)->update([
            'category_name' => $request->category_name,
            'category_slug' =>  strtolower(str_ireplace(' ', '-', $request->category_name)),
        ]);

        $notification = array(
            'message' => 'Blog Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.category')->with($notification);
    }

    public function DeleteBlogCategory($id)
    {
        BlogCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Blog Category Delete Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }


    //Blog Post Controller
    public function  AllPost()
    {

        $post = BlogPost::latest()->get();
        return view('backend.post.all_post', compact('post'));
    }

    public function AddPost()
    {

        $blogcat = BlogCategory::latest()->get();
        return view('backend.post.add_post', compact('blogcat'));
    }

    public function  StorePost(Request $request)
    {

        // Define the directory path
        $directoryPath = base_path('public/upload/post/');

        // Check if the directory exists, if not, create it
        if (!File::exists($directoryPath)) {
            File::makeDirectory($directoryPath, 0755, true, true);
        }

        if ($request->file('post_image')) {
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $request->file('post_image')->getClientOriginalExtension();
            $image = $manager->read($request->file('post_image'));
            $image = $image->resize(370, 250);
            $image->toJpeg(80)->Save(base_path(('public/upload/post/' . $name_gen)));
            $save_url = 'upload/post/' . $name_gen;
        } else {
            $save_url = '';
        }

        BlogPost::insert([
            'blogcat_id' => $request->blogcat_id,
            'user_id' => Auth::user()->id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace(' ', '-', $request->post_title)),
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'post_tags' => $request->post_tags,
            'post_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'BlogPost Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.post')->with($notification);
    }

    public function EditPost($id)
    {

        $blogcat = BlogCategory::latest()->get();
        $post = BlogPost::findOrFail($id);
        return view('backend.post.edit_post', compact('post', 'blogcat'));
    } // End Method


    public function UpdatePost(Request $request)
    {

        $post_id = $request->id;
        $post = BlogPost::findOrFail($post_id);

        // Check if a new image is uploaded
        if ($request->file('image')) {

            // Unlink the old image
            $old_image = $post->image;
            if (!empty($old_image) && file_exists(public_path($old_image))) {
                unlink(public_path($old_image));
            }

            // Process and save the new image
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $request->file('post_image')->getClientOriginalExtension();
            $image = $manager->read($request->file('post_image'));
            $image = $image->resize(370, 250);
            $image->toJpeg(80)->Save(base_path(('public/upload/post/' . $name_gen)));
            $save_url = 'upload/post/' . $name_gen;
            //Update with image
            $post->update([
                'blogcat_id' => $request->blogcat_id,
        'user_id' => Auth::user()->id,
        'post_title' => $request->post_title,
        'post_slug' => strtolower(str_replace(' ','-',$request->post_title)),
        'short_descp' => $request->short_descp,
        'long_descp' => $request->long_descp,
        'post_tags' => $request->post_tags,
        'post_image' => $save_url,
        'created_at' => Carbon::now(),
            ]);
        }
        else {
            // Update without changing the image
            $post->update([
                'blogcat_id' => $request->blogcat_id,
        'user_id' => Auth::user()->id,
        'post_title' => $request->post_title,
        'post_slug' => strtolower(str_replace(' ','-',$request->post_title)),
        'short_descp' => $request->short_descp,
        'long_descp' => $request->long_descp,
        'post_tags' => $request->post_tags,
        'created_at' => Carbon::now(),
            ]);
        }

            $notification = array(
                'message' => 'BlogPost Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.post')->with($notification);
        }

    public function DeletePost($id)
    {

        $post = BlogPost::findOrFail($id);
        $old_image = $post->post_image;

        if (!empty($old_image) && file_exists(public_path($old_image))) {
            unlink(public_path($old_image));
        }

        $post->delete();

        $notification = array(
            'message' => 'BlogPost Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method

    } // End Class
