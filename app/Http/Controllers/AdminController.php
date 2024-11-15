<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_categoty(){
        $data = Category::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request){

       $cat=new Category;
       $cat->category_name=$request->category;
       $cat->save();
       flash()->success('Your Category added.');
       return redirect()->back();
    }

    public function delete_category($id){

        flash()->success('Your Category Deleted.');
        $data=Category::find($id);
        $data->delete();
        return redirect()->back();

    }


    public function add_product(){

        $category = Category::all();

        return view('admin.add_product',compact('category'));
    }

     public function upload_product(Request $request){

         $data = new product();

         $data->title=$request->title;
         $data->description=$request->description;
         $data->price=$request->price;
         $data->quantity=$request->qty;
         $data->category=$request->category;

         $image =$request->image;
         if ($image) {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image =$imagename;
         }
         $data->save();
         flash()->success('Your product Added successfully.');
         return redirect()->back();


     }


     public function view_producte(){

        $product = product::all();
        return view('admin.view',compact('product'));
     }
     public function delete_product($id){
        $product=product::find($id);
         $image_path = public_path('products/'.$product->image);
         if (file_exists($image_path)) {
           unlink($image_path);
         }
        $product->delete();
        flash()->timeOut(2000)->success('Your Product Deleted.');
        return redirect()->back();
    }
    //===============>update<======================//
    public function update_product($id){
        $data=product::find($id);
        $category=Category::all();
        return view('admin.update',compact('data','category'));
    }
    public function edit_product(Request $request ,$id){
        $data=product::find($id);

        $data->title=$request->title;
        $data->description=$request->description;
        $data->price=$request->price;
        $data->quantity=$request->quantity;
        $data->category=$request->category;
        $image =$request->image;
        if ($image) {
           $imagename=time().'.'.$image->getClientOriginalExtension();
           $request->image->move('products',$imagename);
           $data->image =$imagename;
        }
        $data->save();
        flash()->success('Your updated successfully.');
        return redirect('view_producte');
    }




    public function view_order(){
        $data= Order::all();
        return view('admin.order',compact('data'));
    }

    public function on_the_way($id){

       $data=Order::find($id);
       $data->status ='On the way';
       $data->save();
       return redirect('/view_orders');
    }

    public function delivered($id){

        $data=Order::find($id);
        $data->status ='Delivered';
        $data->save();
        return redirect('/view_orders');

    }
    public function print($id){

        $data = Order::find($id);
        $pdf = Pdf::loadView('admin.invoice',compact('data'));
         return $pdf->download('Product.pdf');

    }


}



