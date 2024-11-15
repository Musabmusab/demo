<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\User;
use App\Models\cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;
use Stripe;

class HomeController extends Controller
{

  public function index(){

       $user =User::where('usertype','user')->count();
       $products=product::all()->count();
       $order=Order::all()->count();
       $deliverd=Order::where('status','Delivered')->count();

         return view('admin.index',compact('user','products','order','deliverd'));
  }
  public function home(){
    $product = product::all();

    if(Auth::id()){
    $product = product::all();
    $user =Auth::user();
    $userid=$user->id;
    $count = cart::where('user_id', $userid)->count();
    }else{
        $count='';
    }
    return view('home.index',compact('product','count'));
}
 public function login_home(){
    if(Auth::id()){

        $product = product::all();
        $user =Auth::user();
        $userid=$user->id;
        $count = cart::where('user_id', $userid)->count();
        }else{
            $count='';
        }

        return view('home.index',compact('product','count'));
 }

 public function product_details($id){
    $data= product::find($id);

    if(Auth::id()){

        $product = product::all();
        $user =Auth::user();
        $userid=$user->id;
        $count = cart::where('user_id', $userid)->count();
        }else{
            $count='';
        }
    return view('home.product_details',compact('data','count'));

 }
 public function add_cart($id){

     $product_id =$id;
     $user= Auth::user();
     $user_id=$user->id;
     $data = new cart;
     $data->user_id =$user_id;
     $data->product_id =$product_id;
     $data->save();
     flash()->success('Your product add cart successfully.');
     return redirect()->back();

 }


 public function mycart(){
    if(Auth::id()){
        $user =Auth::user();
        $userid=$user->id;
        $count = cart::where('user_id', $userid)->count();
        $cart = cart::where('user_id',$userid)->get();

    }


    return view('home.mycart',compact('count','cart'));
 }


 public function confirm_order(Request $request){

    $name=$request->name;
    $phone = $request->phone;
    $address =$request->address;

       $userid = Auth::user()->id;
       $cart = cart::where('user_id',$userid)->get();

      foreach ($cart as $carts){

        $order = new Order;
        $order->name = $name;
        $order->product_id =$carts->product_id;

        $order->rec_address =$address;
        $order->phone=$phone;
        $order->user_id =$userid;

         $order->save();

      }
     $cart_remove = cart::where('user_id',$userid)->get();
      foreach($cart_remove as $remove){

         $data = cart::find($remove->id);
         $data->delete();
      }
      flash()->success('Your product successfully buy.');

      return redirect()->back();

 }




   public function myorder(){



        $user=Auth::user()->id;
        $count = cart::where('user_id', $user)->get()->count();
        $order = Order::where('user_id',$user)->get();

    return view('home.orderss',compact('count','order'));
   }

   public function stripe($value){

     return view('home.stripe', compact('value'));

   }

   public function stripePost(Request $request,$value)





   {Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
         Stripe\Charge::create ([
                "amount" => $value * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment is complete",]);

       $name=Auth::user()->name;
       $phone =Auth::user()->phone;
       $address =Auth::user()->address;
       $userid = Auth::user()->id;
       $cart = cart::where('user_id',$userid)->get();

      foreach ($cart as $carts){

        $order = new Order;
        $order->name = $name;
        $order->product_id =$carts->product_id;

        $order->rec_address =$address;
        $order->phone=$phone;
        $order->user_id =$userid;
        $order->payment_status =  "paid";

         $order->save();

      }
     $cart_remove = cart::where('user_id',$userid)->get();
      foreach($cart_remove as $remove){

         $data = cart::find($remove->id);
         $data->delete();
      } flash()->success('Your product successfully buy.');

return redirect('mycart');


   }

   public function shopes(){

    $product = product::all();

    if(Auth::id()){

    $product = product::all();
    $user =Auth::user();
    $userid=$user->id;
    $count = cart::where('user_id', $userid)->count();
    }else{
        $count='';
    }
    return view('home.shopes',compact('product','count'));

   }


   public function why(){


    if(Auth::id()){

        $user =Auth::user();
        $userid=$user->id;
        $count = cart::where('user_id', $userid)->count();
        }else{
            $count='';
        }
        return view('home.why',compact('count'));

       }

      public function testimonial(){

        if(Auth::id()){

            $user =Auth::user();
            $userid=$user->id;
            $count = cart::where('user_id', $userid)->count();
            }else{
                $count='';
            }
            return view('home.testimonial',compact('count'));

           }




}
