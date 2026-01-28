<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AuthController extends Controller
{
   
    public function signIn()
    {
        return view('signin');
    }

   
    public function checkSignIn(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $repass = $request->input('repass');
        $mssv = $request->input('mssv');
        $lopmonhoc = $request->input('lopmonhoc');
        $gioitinh = $request->input('gioitinh');

        // Check if password matches repass
        if ($password !== $repass) {
            return "Đăng ký thất bại";
        }

        // Check if matches student info (example: Hieulx, 123abc, 123abc, 26867, 67PM1, nam)
        if ($username === 'ToDuyTu' && $password === '123456' && $mssv === '0106167' && $lopmonhoc === '67PM1' && $gioitinh === 'nam') {
            return "Đăng ký thành công!";
        }

        return "Đăng ký thất bại";
   
    }
}
