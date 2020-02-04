<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function getProduct()
    {
        $products = Product::with('retailer')->get();
        return json_encode($products);
    }

    public function productRegistration(){
        return view('product.productRegistration');
    }

    public function productRegister(Request $request){
        $this->validate($request, [
            'name'=> 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $product = new Product;
        $product->retailer_id = $request->retailer_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->email_retailer = $request->email_retailer;

        if ($request->hasFile('image')){
            $uploadedImage = $request->file('image');
            $imageName = time() . '.' . $request->image->extension();
            $destinationPath = public_path('/images/productImages/');
            $uploadedImage->move($destinationPath, $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect('/');
    }

    public function viewProduct($id){

        $product = Product::find($id);

        return view('product.viewProduct', compact('product'));
    }

    public function update(Request $request){

        $product = Product::find($request->product_id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->email_retailer = $request->email_retailer;
        $product->price = $request->price;
        $product->save();
        return redirect('/');
    }

    public function delete($id){
        $product = Product::find($id);
        if($product){
            $destroy = Product::destroy($id);
        }
        return redirect('/');
    }


}
