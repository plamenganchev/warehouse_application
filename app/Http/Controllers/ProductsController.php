<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')->paginate(5);
        return view('products.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
        $search = $request->get('search');
        $category = $request->get('category');
        $code = $request->get('code');
        if(is_null($code)){
         $products = DB::table('products')->where('name','like','%'.$search.'%')->where('category','like','%'.$category.'%')->paginate(5);
        }else{
         $products = DB::table('products')->where('code','like','%'.$code.'%')->paginate(5);
        }
        // poradi nqkakva prichina za category where sys '=' ne raboti...
        return view('products.index', ['products' => $products]);
        
    }
   
    public function create()
    {
        return view('products.create');
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
            'name'=> ['required','max:50'],
            'buy_price'=> 'required',
            'sell_price'=> 'required',
            'number_of_products'=> 'required',
            'code'=> 'required',
            'category' => 'required'
        ]);
        //Create product
        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->buy_price = $request->input('buy_price');
        $product->sell_price = $request->input('sell_price');
        $product->number_of_products = $request->input('number_of_products');
        $product->code = $request->input('code');
        $product->category = $request->input('category');
        $product->save();
        return redirect('/products')->with('success', 'Product Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $product = Product::find($id);
       return view('products.edit')->with('product',$product);
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
        $this->validate($request, [
            'name'=> ['required','max:50'],
            'buy_price'=> 'required',
            'sell_price'=> 'required',
            'number_of_products'=> 'required',
            'code'=> 'required',
            'category' => 'required'
        ]);
        //Create product
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->buy_price = $request->input('buy_price');
        $product->sell_price = $request->input('sell_price');
        $product->number_of_products = $request->input('number_of_products');
        $product->code = $request->input('code');
        $product->category = $request->input('category');
        $product->save();
        return redirect('/products')->with('success', 'Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/products')->with('success', 'Product Removed');
    }
}
