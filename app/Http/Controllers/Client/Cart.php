<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class Cart extends Controller
{
    protected $add_endpoint = 'http://localhost:8000/api/v1/carts'; //POST
    protected $update_endpoint = 'http://localhost:8000/api/v1/carts/'; //PUT
    protected $get_endpoint = 'http://localhost:8000/api/v1/carts';  //GET
    protected $del_item_endpoint = 'http://localhost:8000/api/v1/carts/';//POST
    protected $create_order = "http://localhost:8000/api/v1/orders";
    protected $current_cartID;

    public function cf_check_out(Request $request)
    {
        $name = $request->input("name");
        $phone = $request->input('phone');
        $address = $request->input('address');
        $cart_id = $this->getCartID();
        $res = Http::post($this->create_order,['token'=>session()->get("access_token"),'fullName'=>$name,'phone_number'=>$phone,'address'=>$address,'total_bill'=>session()->get('total'),'id_cart'=>$cart_id])->json();
//        dd($res);
        if (isset($res['status_code']) && $res['status_code'] == 200) {
            session()->flash('checkout_suc',"Your order has been made! Waiting for confirmation...");
            return redirect()->route('checkout');
        }else {
            if (isset($res['errors'])) {
                if (isset($res['errors']['fullName'])){
                    session()->flash('err_fullname',$res['errors']['fullName'][0]);
                }
                if (isset($res['errors']['address'])){
                    session()->flash('err_address',$res['errors']['address'][0]);
                }
                if (isset($res['errors']['phone_number'])){
                    session()->flash('err_phone',$res['errors']['phone_number'][0]);
                }
            }else {
                dd("sdflsd");
            }
            return redirect()->route('checkout');
        }
    }
    public function to_check_out(Request $request)
    {
        $total = $request->input('total');
        session()->put(['total'=>$total]);
        return redirect()->route('checkout');
    }
    public function update_cart(Request $request)
    {
        $prd_id = $request->input("prd_id");
        $quantity = $request->input("quantity");
        $current_cartID = $this->getCartID();
        $update_res = Http::put($this->update_endpoint.$current_cartID,['token'=>session()->get("access_token"),'products'=>[$prd_id=>$quantity]])->json();
        return redirect()->route("cart");

    }
    public function remove_item(Request $request)
    {
        $prd_id = $request->input("prd_id");
        $current_cartID = $this->getCartID();
        $del_res = Http::post($this->del_item_endpoint.$current_cartID,['token'=>session()->get("access_token"),'id_product'=>$prd_id])->json();
        if($del_res['status_code'] != 200) {
            dd("Remove failed");
        }else {
            return redirect()->route('cart');
        }
    }
    protected function getCartID()
    {
        $get_info_res = Http::get($this->get_endpoint,['token'=>session()->get("access_token")])->json();
//        dd($get_info_res);
        if ($get_info_res['data'] != null) {
            return $get_info_res['data']['id'];
        }else {
            return null;
        }
    }
    protected function initCart()
    {
        $init_res = Http::post($this->add_endpoint,['token'=>session()->get("access_token"),'products'=>[]])->json();
//        dd($init_res);
        if ($init_res['status_code'] == 200){
            $this->checkCart();
        }else{
            dd("Failed");
        }
    }
    protected function checkCart()
    {
        $get_info_res = Http::get($this->get_endpoint,['token'=>session()->get("access_token")])->json();
//        dd($get_info_res);
        if ($get_info_res['data'] != null) {
            return $get_info_res['data']['products'];
        }else {
            $this->initCart();
        }
    }
    public function render_cart()
    {
        $cart_info = $this->checkCart();
        $cart_info = json_decode($cart_info,true);
//        dd($cart_info);

        return view("pages.cart",["cart_info"=>$cart_info]);
    }
}
