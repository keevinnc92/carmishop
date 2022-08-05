<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::all();
        $brands = Brand::all();

        return view('home', ['products' => $products, 'brands' => $brands]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }



    /**
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request){

        // variables que nos llegan
        $nameSearch = $request->post('name');
        $brandSearch = $request->post('brand');

        $brands = Brand::all();

        // montamos la query
        $query = Product::query();
        $query = $query->where('name', 'like', '%'.$nameSearch.'%');
        if ($brandSearch!='') {
            $query = $query->where('brand_id', $brandSearch);
        }
        $products = $query->get();

        return view('home', ['products' => $products, 'namesearch'=> $nameSearch, 'brandsearch'=> $brandSearch, 'brands' => $brands]);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {       
        //buscamos producto    
        $product = Product::find($id);

        //pasamos a string el id
        $img = strval($id);
        // recortamos si es más grande de 10 (aprovechamos las 10 imgs para todos)
        if ($id>10) {
            $img = substr($id, -1);
        }

        $img .='.jpg';

        return view('product.show', ['product' => $product, 'img' => $img]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }


}
