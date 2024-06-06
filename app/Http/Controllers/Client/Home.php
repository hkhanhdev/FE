<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class Home extends Controller
{
    protected $rules = [
        'username' => ['min:8','max:100'],
        'email' => ['required','email','ends_with:gmail.com'],
        'address' => [],
        'gender' => ['required']
    ];

    protected $messages = [
        'email.required' => "Email field cannot be empty!",
        'email.email' => "Please enter a valid email address!",
        'email.ends_with' => "Please enter an email address with valid domain!",
        'username.min' => 'Username must have more than 8 characters!',
        'username.max' => 'Username must have less than 100 characters!',
    ];

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
//        dd($product);
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
        $products_full_response = Http::get("http://localhost:8000/api/v1/products?perPage=8");
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
        session()->put('user_info',$response['data']);
        return view('pages.user_profile',['user_info'=>$response['data']]);
    }

    public function updateInfo(Request $request)
    {
        $user_info = session()->get('user_info');
        $validated = $request->validate($this->rules,$this->messages);
        $response = Http::post("http://localhost:8000/api/v1/update",
            [   'token' => session()->get("access_token"),
                "name"=>$validated['username'],
                "email"=>$validated['email'],
                'address' => $validated['address'],
                'genders' => $validated['gender']
            ])->json();
        if (isset($response['errors'])) {
            if (isset($response['errors']['email'])) {
                $request->session()->now("email_taken",$response['errors']['email'][0]);
            }
            return view("pages.user_profile",['user_info'=>$user_info]);
        }else {
            $request->session()->now("updateProfileSuccess","Updated!");
            return view("pages.user_profile",['user_info'=>$user_info]);
        }
    }

    public function order_history()
    {
        $orders_endpoint = "http://localhost:8000/api/v1/orders";
        $get_orders = Http::get($orders_endpoint,['token'=>session()->get("access_token")])->json();
//        dd($get_orders['data']);
//        dd(json_decode($get_orders['data']['pagination_data']['products_cart'],true));
        return view("pages.order_history",['orders'=>$get_orders['data']]);
    }
}
