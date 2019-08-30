<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Login extends Controller
{
    public function index(){
      return view('login');
    }
    public function cek(Request $req){
      $this->validate($req,[
        'username'=>'required',
        'password'=>'required'
      ]);
      $proses=ModelKontak::where('username',$req->username)->where('password',$req->password)->first();
      if(count($proses)>0){
        Session::put('id_kontak',$proses->id_kontak);
        Session::put('username',$proses->username);
        Session::put('password',$proses->password);
        Session::put('nama',$proses->nama);
        Session::put('login_status',true);
        return redirect('/');
      }else{
        Session::flash('alert_pesan','Username dan password tidak cocok');
        return redirect('login');
      }
    }
}
