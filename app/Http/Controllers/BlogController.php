<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogDB;
use App\CategoryDB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Looping Variable
    public function list()
    {
        $blog = BlogDB::get();
        // Looping Blog
        foreach ($blog as $key => $value) {
            $category_id = $value->category_id;
            // Get Category by id
            $category = CategoryDB::where('id', $category_id)->get()->first();
            $name = $category->name;
            // Add category name to object blog
            $value->category_name = $name;
            // echo json_encode($name); die();
        }
        echo json_encode($blog);
    }

    // Join Table
    public function list_new()
    {
        $blog = BlogDB::select('blog.*', 'category.name as category_name')
                    ->join('category', 'category.id', 'blog.category_id')
                    ->get();
        echo json_encode($blog);
    }

    public function add(Request $request)
    {
        $category_id = $request->post('category_id');
        $title = $request->post('title');
        $desc = $request->post('description');
        $data_insert = array(
            'category_id' => $category_id,
            'description' => $desc,
            'title' => $title,
            'created_at' => date('Y-m-d H:i:s')
        );
        $insert = BlogDB::insert($data_insert);
        echo json_encode($insert);
    }

    public function add_new(Request $request)
    {
        $insert = BlogDB::insert($request->post());
        echo json_encode($insert);
    }

    public function delete($id)
    {
        $blog = BlogDB::find($id);
        $blog->delete();

        return "Data has been deleted";
    }
}
