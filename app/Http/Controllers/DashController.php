<?php

namespace App\Http\Controllers;

use App\Models\Dash;
use App\Models\Product;
use Illuminate\Http\Request;

class DashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view("dash.index", ["products" => $products] );
 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Dash $dash)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dash $dash)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dash $dash)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dash $dash)
    {
        //
    }
}
