<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function edit(Request $request, $id){
        $result = (new Product)::where('id',$id)->get();
        $product = $result[0]->getOriginal();
        if($request->isMethod('post')){
            $file = $request->file('image');
            if($file){
                $destination = 'uploads';
                $file->move($destination,$file->getClientOriginalName());
                $image = $file->getClientOriginalName();
            }else{
                $image = $product['image'];
            }
            $data = [
                'title' => $request->get('title'),
                'description' => $request->get('description'),
                'price' => $request->get('price'),
                'image' => $image
            ];
            $result = (new Product)::where('id',$id)->update($data);
            if($result){
                return redirect()->to('/admin/dashboard')->with('success','Movie created successfully');
            }else{
                return redirect()->to('/admin/dashboard')->with('success','Error occurred');
            }
        }
        $login = session('adminLogin');
        if($login == 'true'){
            return view('product.edit',['product'=> $product]);
        }else{
            return redirect()->to('/login');
        }
    }

    public function delete($id){
        $result = (new Product)::where('id',$id)->delete();
        if($result){
            return redirect()->to('/admin/dashboard')->with("success",'Product Deleted Successfully');
        }else{
            return redirect()->to('/admin/dashboard')->with("success",'Error Occurred');
        }
    }
}
