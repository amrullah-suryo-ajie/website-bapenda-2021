<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\staff;
use App\Models\calonWP;
use App\Models\wajibPajak;
use App\Models\wajibPajakUsaha;
// use App\Models\User;
// use App\TashrifRumus;
// use App\TashrifIstilah;
// use App\AlIsim;
// use App\AlIsimJumlah;
// use App\AlHuruf;
// use App\Indek;
// use App\Heading1;
// use App\Heading2;
// use App\Kelas;
// use App\QuranPersurat;
// use App\QuranPerayat;
// use App\QuranPerkata;
// use App\Student;

// if($link){

// }
class PagesController extends Controller
{
    public function showFormLogin()
    {
        return view('login', ['menu' => 'about', 'nama' => 'Amrullah Suryo Ajie']);
    }
    public function signin(Request $request)
    {
        // if (Auth::guard('users')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/home');
        }
        // echo "masuk";
    }
    public function showFormRegister()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed'
        ];

        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $user = new User;
        $user->name = ucwords(strtolower($request->name));
        $user->email = strtolower($request->email);
        // $user->username = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->email_verified_at = \Carbon\Carbon::now();
        $simpan = $user->save();

        if ($simpan) {
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect('signin');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }
    public function home()
    {
        return view('home', [
            'menu' => 'home',
            'users' => staff::all(),
            'wajib_pajak' => wajibPajak::all(),
            // 'wajib_pajak_usaha' => wajibPajak::find(1)->taWajibPajakUsaha
            ]);
    }
    public function calonWaJibPajak()
    {
        
        return view('calon-wajib-pajak', [
            'menu' => 'calon-wajib-pajak',
            'users' => staff::all(),
            'calon_wp' => calonWP::all(),
            // 'wajib_pajak_usaha' => wajibPajak::find(1)->taWajibPajakUsaha
            ]);
            // dd(wajibPajak::all());
    }
    public function waJibPajak()
    {
        
        return view('wajib-pajak', [
            'menu' => 'wajib-pajak',
            'users' => staff::all(),
            'wajib_pajak' => wajibPajak::all(),
            // 'wajib_pajak_usaha' => wajibPajak::find(1)->taWajibPajakUsaha
            ]);
            dd(wajibPajak::all());
    }
    
    public function about()
    {
        return view('about', ['menu' => 'about', 'nama' => 'Amrullah Suryo Ajie']);
    }
}
