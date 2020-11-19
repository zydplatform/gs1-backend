<?php
namespace App\Http\Controllers;
Use App\Models\Product;
Use App\Models\Companies;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Guzzle\Http\Exception\ClientErrorResponseException;
use Validator,Redirect,Response;
use Session;
use DB;

class ProductController extends Controller
{

   public function productsView(){
    return view('first-product');
   } 
   public function addProduct(Request $request){
            request()->validate([   
        'productname' => 'required',
        'productprice' => 'required',
        'productbrand' => 'required',
         'productdetails' => 'required',
            'productqty' => 'required',
            'item_no' => 'required',
            'mfgdate' => 'required',
            'expdate' => 'required',
            
        ]);
        $product = new Product();
        $product->productname = $request->productname;
        $product->productprice = $request->productprice;
        $product->productbrand = $request->productbrand;
        $product->productdetails = $request->productdetails;
        $product->productqty = $request->productqty;
        $product->item_reference_number = $request->item_no;
        $product->mfgdate = $request->mfgdate;
        $product->expdate = $request->expdate;

        $product->save();
        // return Redirect::to('dashboard');
        return response()->json([
            "message"=>"product added successfully"
        ], 201);
   } 

   public function getProducts(){
    // $products = Product::all();
    $products = Product::get()->toJson(JSON_PRETTY_PRINT);
    return response($products, 200);
    // return view('all-products', ['products'=>$products]);

   }

   public function getProduct($id){
    if(Product::where('id', $id)->exists()){
        $product = Product::where('id', $id)->get()->tojson(JSON_PRETTY_PRINT);
        return response($product, 200);
    }
    else{
        return response()->json([
            "message"=> "Product not found"
        ], 404);
    }
   }

   public function editProduct(Request $request, $id){

    if(Product::where('id', $id)->exists()){
        
        $product = Product::find($id);
        $product->productname = is_null($request->productname)?$productname:$request->productname;
        $product->productprice = is_null($request->productprice)?$productprice:$request->productprice;
        $product->productbrand = is_null($request->productbrand)?$productbrand:$request->productbrand;
        $product->productdetails = is_null($request->productdetails)?$productdetails:$request->productdetails;
        $product->productqty = is_null($request->productqty)?$productqty:$request->productqty;
        $product->item_reference_number = is_null($request->item_no)?$item_no:$request->item_no;
        $product->mfgdate = is_null($request->mfgdate)?$mfgdate:$request->mfgdate;
        $product->expdate = is_null($request->expdate)?$expdate:$request->expdate;
        $product->save();
        return response()->json([
            "message"=> "Product updated successfully"
        ], 201);
    }
    else{
        return response()->json([
            "message"=>"Product update failed!"
        ], 404);
    }
   }

    // public function edit($id){
    //     $product = Product::where('id', $id)->first();
    //     return view('editproduct', ['product'=>$product]);
    // }

    public function getBarcode($id){
        $product = Product::where('id', $id)->first();
        return view('get-barcode', ['product'=>$product]);
    }

    // public function updateProduct(Request $request) {
    //     request()->validate([   
    //     'name' => 'required',
    //     'price' => 'required',
    //     'brand' => 'required',
    //      'details' => 'required',
    //         'qty' => 'required',
    //         'itemno' => 'required',
            
    //     ]);
    //     $product = Product::where('id', $request->id)->first();
    //     $product->productname = $request->name;
    //     $product->productprice = $request->price;
    //     $product->productbrand = $request->brand;
    //     $product->productdetails = $request->details;
    //     $product->item_reference_number = $request->itemno;
    //     $product->productqty = $request->qty;
    //     $product->save();
    //     return redirect('dashboard');
    //     }


    public function deleteProduct($id){
        if(Product::where('id', $id)->exists()){
            $product= Product::find($id);
            $product->delete();
            return response()->json([
                "message"=> "Record deleted successfully"
            ], 202);
        }
        else{
            return response()->json([
                "message"=>"records do not exist"
            ], 404);
        }

    	// Product::where('id', $id)->delete();
        // return redirect()->back();
    }

    // public function consumeAPI()    {
    //     $client = new Client(['base_uri' => 'http://localhost/latest-gs1member/gs1member/public/']);
    //     try{
    //     $response = $client->request('GET', 'all-products');
    //     $statusCode = $response->getStatusCode();
    //     // $body = $response->getBody()->getContents();
    //     $responseBody = json_decode($response->getBody());
    //     // $mydata = json_decode($body, true);

    //     return $responseBody;
    // }
    // catch(ClientErrorResponseException $exception){
    //     $responseBody = $exception->getResponse()->getBody(true);

    // }

    // }



}
