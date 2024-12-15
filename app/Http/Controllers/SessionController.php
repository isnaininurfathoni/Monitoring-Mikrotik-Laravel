<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as FacadesSession;

class SessionController extends Controller
{
    //

    function index(){
        return view('pages.login');
    }

    function login(Request $request){

        FacadesSession::flash('email',$request->email);
        FacadesSession::flash('password',$request->password);
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email'=>'Masukan Email',
            'password'=>'Masukan Password'
        ]);

        $logindata =[
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($logindata)){
            return redirect('/menu');
        }else{
            return redirect('/');
        }
    }

    function logout(){
        Auth::logout();
        return redirect('/');
    }

    function register(){
        return view('pages.register');
    }

    function create(Request $request){

        FacadesSession::flash('name',$request->name);
        FacadesSession::flash('email',$request->email);
        FacadesSession::flash('password',$request->password);
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email|email',
            'password'=>'required|min:8'
        ],[
            'name'=>'Masukan Nama',
            'email'=>'Masukan Email',
            'email.unique'=>'Email sudah terdaftar',
            'password'=>'Masukan Password',
            'password.min'=>'Minimal 8 karakter'
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        User::create($data);

        $logindata =[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($logindata)){
            return view('components.sidebar');
        }
    }


}
