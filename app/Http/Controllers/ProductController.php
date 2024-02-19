<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');

    }

    public function store(Request $request)
    {
       $this->validate($request,[
            'name'=>'required',
            'description'=>'required|min:3',
            'image'=>'required|mimes:jpeg,png',
            'price'=>'required|numeric',
            'additional_info'=>'required',
            'category'=>'required',
       ]);

       $image = $request->file('image')->store('public/product');

       Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$image,
            'price'=>$request->price,
            'additional_info'=>$request->additional_info,
            'category_id'=>$request->category,
            'subcategory_id'=>$request->subcategory,
            

       ]);

       notify()->success('Product created successfully!');

       return redirect()->back();

    }


    public function destroy($id){
        $product = Product::find($id);
        $filename = $product->image;
        $product->delete();
        \Storage::delete($filename);
        
        notify()->success('Product deleted succefully!');

        return redirect()->route('product.index');
    }

    public function loadSubcatogories(Request $request, $id){
        $subcategory = Subcategory::where('category_id', $id)->pluck('name', 'id');

        return response()->json($subcategory);
    }


    public function productList(Request $request) {


       
        return response()->json([
            'status_code' => 200,
            'data' => Product::all(),
            'message' => 'Successes'
            
        ], 200);
     }

     public function laptopList(Request $request) {

        $username = $request->input('username');
        $department = $request->input('department');
    
        // Build the query
        $query = Product::query();
    
        // Apply filters if they exist
       
            $query->where('category_id', '2');
        
   
        // Retrieve the filtered data
        $filterProduct = $query->get();
    
        return response()->json([
            'status_code' => 200,
            'data' => $filterProduct,
            'message' => 'Success',
        ], 200);
     }

}
