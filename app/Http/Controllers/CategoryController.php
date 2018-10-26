<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryDB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $category = CategoryDB::get();
        echo json_encode($category);
    }

    public function add(Request $request)
    {
        $name = $request->post('name');
        $data_insert = array(
            'name' => $name,
            'created_at' => date('Y-m-d H:i:s')

        );
        $insert = CategoryDB::insert($data_insert);
        echo json_encode($insert);
        // echo json_encode($request->post('name'));
    }

    public function edit(Request $post)
    {
        $id = $post->post('id');
        $name = $post->post('name');
        $data_update = array(
            'name' => $name
        );
        $update = CategoryDB::where('id', $id)->update($data_update);
        echo json_encode($update);
    }
}
