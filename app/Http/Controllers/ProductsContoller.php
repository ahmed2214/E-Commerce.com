<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Traits\ImagesTrait;

class ProductsContoller extends Controller
{
    use ImagesTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 
         $Product = Product::paginate(10);
        return view('products.index',['Product'=>  $Product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $Category =  Category::all();
        return view('products.Create',['Category'=>  $Category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'ProductName' => ['required', 'min:3'],
            'Dscription' => ['required', 'min:8'],
            'Price' => ['required','numeric','max_digits:6','min_digits:1'],
            'Quantity' => ['required' ,"numeric",'max_digits:6','min_digits:1'],
            'Category' => ['required'],
            'Image' => ['required'],
        ]);
        $fileName = time().'.'.$request->Image->extension();
        $this->uploading($request->Image,$fileName,'prodects');
        $Product = Product::create([
            'Product_name'=> $request->input('ProductName'),
            'imgpath'=> $fileName,
            'description'=> $request->input('Dscription'),
            'price'=> $request->input('Price'),
            'quantity'=> $request->input('Quantity'),
            'category_id'=> $request->input('Category'),

        ]);
        return  redirect('productsindex');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $Product)
    {
        //
        $Category =  Category::all();
        return view('products.show',['Product'=>  $Product,'Category'=>$Category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $Product)
    {
        //
        $Category =  Category::all();
        return view('products.edit',['Product'=>  $Product,'Category'=>$Category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $Product)
    {
        //
    
        $request->validate([
            'ProductName' => ['required', 'min:3'],
            'Dscription' => ['required', 'min:8'],
            'Price' => ['required','numeric','max_digits:6','min_digits:1'],
            'Quantity' => ['required' ,"numeric",'max_digits:6','min_digits:1'],
            'Category' => ['required'],
            'imagePath' => ['required'],
        ]);
        $file_name = time().'.'.$request->imagePath->extension();
        $this->uploading($request->imagePath,$file_name,'prodects');
      $Product->update([
            'Product_name'=> $request->input('ProductName'),
            'imgpath'=> $file_name,
            'description'=> $request->input('Dscription'),
            'price'=> $request->input('Price'),
            'quantity'=> $request->input('Quantity'),
            'category_id'=> $request->input('Category'),

        ]);
        return  redirect('productsindex');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $Product)
    {
        //
        $Product->delete();
        return redirect("index");
    }
}
