<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Customer;
use App\Bill;
use App\BillDetail;
use Session;    
use App\User;
use Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use Socialite;
use App\SocialProvider;

class PageController extends Controller
{
    //
    public function getIndex(Request $request){
    	$slide = Slide::all();
    	// return view('page.trangchu',['silde'=>$silde]);
    	$new_product = Product::where('new','1')->paginate(4);
        $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(8);
        if($request->ajax()){
            return view('page.pagination-list',compact('new_product','sanpham_khuyenmai'))
                ->render();
        }
        return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai'));

        // $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(8);
    	// return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai'));
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

    public function getLogin(){
        return view('page.login');
    }

    public function getSignup(){
        return view('page.signup');
    }

    public function postSignup(Request $req){
        //validate incoming request
        $validator = Validator::make($req->all(),
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'fullname'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                'fullname.required' => 'Vui long nhap ho ten',
                'password.required'=>'Vui lòng nhập password',
                're_password.required'=>'Vui lòng nhập password',
                're_password.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Mật khẩu phải có ít nhất 6 ký tự',
            ]);
        if ($validator->fails()) {
            // Session::flash('error', $validator->messages()->first());
            // return redirect()->back()->withInput();
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        //save user into database
        $user = new User();
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('success','Tao tai khoan thanh cong');
    }

    public function postLogin(Request $req){
        // $validator = Validator::make($req->all(),
        $this->validate($req, 
        [
            'email'=> 'required|max:255|email',
            'password'=> 'required',
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Email không đúng định dạng',
            'email.unique'=>'Email đã có người sử dụng',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu có ít nhất 6 ký tự',
            'password.max'=>'Mật khẩu có tối đa 15 ký tự'
        ]);
        $credentials = array('email'=>$req->email,'password'=>$req->password);
        if(Auth::attempt($credentials)){
            //dd(Auth::attempt(['email'=>$req->email,'password'=>$req->password]));
            return redirect('index');
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Dang nhap that bai']);
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect('dang-nhap');
    }

    public function getSearch(Request $req){
        $product = Product::where('name','like','%'.$req->key.'%')
                            ->orWhere('unit_price','like','%'.$req->key.'%')
                            ->get();
        return view('page.search',compact('product'));
    }
}
