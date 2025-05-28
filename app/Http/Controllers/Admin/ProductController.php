<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

    }
    public function create()
    {
        return view('admin.products.simple.add');
    }
    public function store(Request $request)
    {
        dd($request->all());
    }
    public function show()
    {

    }
    public function edit()
    {

    }
    public function update()
    {

    }
    public function delete()
    {

    }
}
