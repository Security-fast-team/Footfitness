<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['user_id','order_number','sub_total','quantity','delivery_charge','status','total_amount','first_name','last_name','country','post_code','address1','note','address2','phone','email','payment_method','payment_status','shipping_id','coupon'];

    public function cart_info(){
        return $this->hasMany('App\Models\Cart','order_id','id');
    }
    public static function getAllOrder($id){
        return Order::with('cart_info')->find($id);
    }
    public static function countActiveOrder(){
        $data=Order::count();
        if($data){
            return $data;
        }
        return 0;
    }
    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function shipping(){
        return $this->belongsTo(Shipping::class,'shipping_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }

    public function subTotal(){
        $orders = Order::find($this->id);
        $product_price = $orders->product->price;
        $qty = $orders->quantity;
        if($orders->product->discount){
            $discount = $orders->product->discount;
            $price_after_dis = $product_price - $discount;
            $sub_total = $price_after_dis * $qty;
            return $sub_total;
        }else{
            $sub_total = $product_price * $qty;
            return $sub_total;
        }
    }

    public function total(){
        $orders = Order::find($this->id);
        $sub_total = $orders->subTotal();

        if($orders->shipping_id){
            $shipping_price = $orders->shipping->price;
            $total = $shipping_price+$sub_total;
            return $total;
        }else{
            return $sub_total;
        }

    }
    public function toalQty(){
        $orders = Order::where('order_number',$this->order_number)->get();
        $total_qty  = 0;
        foreach($orders as $order){
            $total_qty += $order->quantity;
        }
        return $total_qty;
    }

    public function CusWiseTotal(){
        $orders = Order::where('order_number',$this->order_number)->get();
        $total_price  = 0;
        foreach($orders as $order){
            $total_price += $order->product->mainPrice() * $order->quantity + $order->shipping->price;
        }
        return $total_price;
    }

}
