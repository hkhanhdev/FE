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
        $products_full_response = Http::get("http://localhost:8000/api/v1/products");
        $products = $products_full_response->json()["data"];
        $manus_full_response = Http::get("http://localhost:8000/api/v1/manufacturers?perPage=30");
        $manus = $manus_full_response->json()['data'];
//        dd($products);
        return view("pages.welcome",["products"=>$products,"manus" => $manus]);
    }
}
