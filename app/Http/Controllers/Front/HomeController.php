<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
//use MongoDB\Driver\Session;
use RealRashid\SweetAlert\Facades\Alert;
/*namespace App\Http\Controllers;
use Illuminate\Http\Request;*/


class HomeController extends Controller
{

    public function index(){
       return "Welcome Welcome Please Enter login Path for continuing";
    }
    function list(){
        $data=User::all();
        return view('login.dashboard_page',['user'=>$data]);
    }
    function delete($id){
        $data=User::find($id);
        $data->delete();
        Alert::success('Transaction Successful','User has been deleted successfuly !!');
        return redirect('/home/dashboard');
    }
    function showData($id){
        $data= User::find($id);
        return view('login.edit_page',['data'=>$data]);
    }
    function update(Request $req){
        $data=User::find($req->id);
        $data->name=$req->name;
        $data->email=$req->email;
        $data->save();
        Alert::success('Transaction Successful','User has been updated successfuly !!');
        return redirect('/home/dashboard');
    }

    public function loginIndex(){
        return view('login.login_page');
    }

    public function login(Request $request){
        $request->validate([
           'email'=>'required',
            'password'=>'required|min:5|max:12'
        ]);

        $user=User::where('email','=',$request->email)->first();
        if($user){
            if (Hash::check($request->password,$user->password)){
                $request->session()->put('loginId',$user->id);
                return redirect('/home/dashboard');
            }else{
                Alert::error('Something is wrong !!',"Password not matches !!");
                return redirect('/home/login');
            }
        }else{
            Alert::error('Something is wrong !!','This email is not registered !!');
            return redirect('/home/login');
        }
    }
//
       /* public function basarili(){
            Alert::success('transaction successful','Your login information is correct. You are logging in');
        }*/






    public function registerIndex(){
        return view('login.register_page');
    }

    public function register(Request $request){

        $request->validate([
           'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =Hash::make($request->password);
        $deger=$user->save();
        if ($deger){
            Alert::success('Transaction Successful','You have registered Successfuly');
            return redirect('/home/dashboard');
        }else{
            Alert::error('Something is wrong !!','Unexpected Error !!');
            return redirect('/home/register');
        }
    }



     /*public function updateIndex($id){
        $user= User::find($id);
        return view('login.update_page',compact("user"));
    }*/
    public function updateIndex(){
        $data= array();
        if (session()->has('loginId')){
            $data = User::where('id','=',session()->get('loginId'))->first();
        }
        Alert::success('Transaction Successful','Your login information is correct. You are logging in');
        return view('login.dashboard_page',compact('data'));
    }










    /* public function test($id){
        echo "Id Number: ", $id;
    }*/


}
