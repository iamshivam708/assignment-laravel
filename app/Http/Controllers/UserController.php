<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class UserController extends Controller
{
    public function signup(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required',
                'cpassword' => 'required'
            ]);
            if($request->get('password') == $request->get('cpassword')){
                $data = [
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'password' => $request->get('password'),
                    'is_admin' => 'false'
                ];
                $result = (new User)::create($data);
                if($result){
                    return redirect()->to('/login')->with('success','User successfully signed up!');
                }else{
                    return redirect()->to('/')->with('success','error occurred');
                }
            }else{
                return redirect()->to('/')->with('success','Password do not match');
            }
        }
        $login = session('adminLogin');
        $login2 = session('userLogin');
        if($login == 'true'){
            return redirect()->to('/admin/dashboard');
        }elseif($login2 == 'true'){
            return redirect()->to('/user/profile');
        }else{
            return view('user.signup');
        }
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);
            $email = $request->get('email');
            $password = $request->get('password');
            $result = (new User)::where('email',$email)->where('password',$password)->get();
            $count = (new User)::where('email',$email)->where('password',$password)->get()->count();
            if($count == 1){
                if($result[0]->getOriginal()['is_admin'] == 'true'){
                    $request->session()->put('adminLogin','true');
                    return redirect()->to('/admin/dashboard');
                }else{
                    $request->session()->put('userLogin','true');
                    $request->session()->put('email',$email);
                    return redirect()->to('/user/profile');
                }
            }else{
                return redirect()->to('/login')->with('success','No User found');
            }
        }
        $login = session('adminLogin');
        $login2 = session('userLogin');
        if($login == 'true'){
            return redirect()->to('/admin/dashboard');
        }elseif($login2 == 'true'){
            return redirect()->to('/user/profile');
        }else{
            return view('user.login');
        }
    }

    public function profile(){
        $login = session('userLogin');
        $email = session('email');
        if($login == 'true'){
            $result = (new User)::where('email',$email)->get();
            $user = $result[0]->getOriginal();
            $products = (new Product)::get();
            return view('user.profile',['user'=>$user,'products' => $products]);
        }else{
            return redirect()->to('/login');
        }
    }

    public function dashboard(Request $request){
        if($request->isMethod('post')){

            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'image' => 'required|mimes:png,jpg,jpeg',
                'price' => 'required|integer'
            ]);

            $file = $request->file('image');
            $destination = 'uploads';
            if($file->move($destination,$file->getClientOriginalName())){
                $data = [
                    'title' => $request->get('title'),
                    'description' => $request->get('description'),
                    'price' => $request->get('price'),
                    'image' => $file->getClientOriginalName()
                ];
                $result = (new Product)::create($data);
                if($result){
                    return redirect()->to('/admin/dashboard')->with('success','Product added successfully');
                }else{
                    return redirect()->to('/admin/dashboard')->with('success','error occurred');
                }
            }
        }
        $login = session('adminLogin');
        if($login == 'true'){
            $products = (new Product)::simplePaginate(2);
            return view('dashboard',['products' => $products]);
        }else{
            return redirect()->to('/login');
        }
    }

    public function adminLogout(Request $request ){
        $request->session()->forget('adminLogin');
        return redirect()->to('/login');
    }

    public function userLogout(Request $request ){
        $request->session()->forget('userLogin');
        $request->session()->forget('email');
        return redirect()->to('/login');
    }

}
