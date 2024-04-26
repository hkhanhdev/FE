<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class Home extends Controller
{

    public function toSignIn()
    {
        return view("pages.sign_in");
    }

    public function toSignUp()
    {
        return view("pages.sign_up");
    }

    public function toContact()
    {
        return view("pages.contact");
    }
    public function productDetails(Request $request)
    {
        $prd_id = $request->query("product_id");
        $product_full_response = Http::get("http://localhost:8000/api/v1/products/$prd_id");
        $product = $product_full_response->json()["data"];
        return view('pages.product_details',['product'=>$product]);
    }

    public function productsByCate(Request $request)
    {
        $manu_id = $request->query('manu_id');
//        dd($request->query('manu_id'));
        $products_full_response = Http::get("http://localhost:8000/api/v1/products?id_manufacturer=$manu_id");
        $products = $products_full_response->json()["data"];
        $manus_full_response = Http::get("http://localhost:8000/api/v1/manufacturers?perPage=30");
        $manus = $manus_full_response->json()['data'];
        return view('pages.welcome',["products"=>$products,"manus"=>$manus]);
    }
    public function home()
    {
        $products_full_response = Http::get("http://localhost:8000/api/v1/products?perPage=10");
        $products = $products_full_response->json()["data"];
        $manus_full_response = Http::get("http://localhost:8000/api/v1/manufacturers?perPage=30");
        $manus = $manus_full_response->json()['data'];
//        dd($products);
        return view("pages.welcome",["products"=>$products,"manus" => $manus]);
    }

    public function pagination(Request $request)
    {
//        dd($request);
        $page = $request->query('page');
        $products_full_response = Http::get("http://localhost:8000/api/v1/products?page=$page&perPage=10");
        $products = $products_full_response->json()["data"];
        $manus_full_response = Http::get("http://localhost:8000/api/v1/manufacturers?perPage=30");
        $manus = $manus_full_response->json()['data'];
        return view("pages.welcome",["products"=>$products,"manus" => $manus]);
    }
    public function logout()
    {
        $response = Http::post("http://localhost:8000/api/v1/logout",['token'=>session()->get("access_token")])->json();
//        if ($response['message']) {
        session()->flush();
//        }
        return redirect()->route('home');
    }

    public function profile()
    {
        $response = Http::get("http://localhost:8000/api/v1/user",['token'=>session()->get("access_token")])->json();
//        dd($response);
        return view('pages.user_profile',['user_info'=>$response['data']]);
    }

    public function cart()
    {
        return view("pages.cart");
    }

    public function order_history()
    {
        return view("pages.order_history");
    }
}
