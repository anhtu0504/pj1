<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;

class PageController extends Controller
{
    //
    public function getIndex(){
    	$slide = Slide::all();
    	// return view('page.trangchu',['silde'=>$silde]);
    	$new_product = Product::where('new','1')->paginate(4);
        $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(8);
    	return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai'));
    }

    public function getLoaiSp($type){
        $sp_theloai = Product::where('id_type',$type)->get();
    	return view('page.loaisanpham',compact('sp_theloai'));
    }

    public function getChitiet($id){
        $product = Product::where('id',$id)->paginate(1);
    	return view('page.chitiet_sanpham');
    }

    public function getLienhe(){
    	return view('page.lienhe');
    }

    public function getGioithieu(){
        return view('page.gioithieu');
    }

    public function getDetailProduct($id){
        $product = Product::where('id',$id)->paginate(1);
        return view('page.chitiet_sanpham',compact('product'));
    }

    public function getSaleProduct($id){
        $product = Product::where('id',$id)->paginate(1);
        return view('page.chitiet_sanphamsale',compact('product'));
    }

}
