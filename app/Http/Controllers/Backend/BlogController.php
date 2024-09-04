<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

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
}
