<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\staff;
use App\Models\calonWP;
use App\Models\wajibPajak;
use App\Models\wajibPajakUsaha;
use App\Models\jenisUsaha;
use App\Models\kecamatan;
use App\Models\kelurahan;

class WPApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Http::get('http://pajak-daerah.brebeskab.go.id/kpk-simda-api/data-wp/2');
        // dd(wajibPajak::all());
        // Paginator::useBootstrap();
        // $response = Http::get('https://api.kawalcorona.com/indonesia/provinsi');
        // $response = Http::get('http://pajak-daerah.brebeskab.go.id/kpk-simda-api/data-wp/2');
        // $data = $response->json();
        // $response = Http::get('https://api.kawalcorona.com');
        // $data = $response->json();
        $response = Http::get('http://pajak-daerah.brebeskab.go.id/kpk-simda-api/data-wp/1');
        $data1 = $response->json();
        $response = Http::get('http://pajak-daerah.brebeskab.go.id/kpk-simda-api/data-wp/2');
        $data2 = $response->json();
        // return Http::get('http://pajak-daerah.brebeskab.go.id/kpk-simda-api/data-wp/2',[
        //     'npwpd',
        //     'namaWp',
        // ]);
        return view('wajib-pajak-api', compact(['data1', 'data2']), ['menu' => 'wajib-pajak']);
        // return view('wajib-pajak-api', [
            // 'menu' => 'wajib-pajak', 
            // 'data' => Http::get('http://pajak-daerah.brebeskab.go.id/kpk-simda-api/data-wp/2')->json(),
            // compact('data'),
            // 'jenis_usaha' => jenisUsaha::all(),
            // 'kecamatan' => kecamatan::all(),
            // 'kelurahan' => kelurahan::all()
        // ]);
            // // // ])->with('i', (request()->input('page', 1) - 1) * 5);
        // dd($data);
        // return Http::dd()->get('http://pajak-daerah.brebeskab.go.id/kpk-simda-api/data-wp/2');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $rules = [
        //     'name'                  => 'required|min:3|max:35',
        //     'email'                 => 'required|email|unique:users,email',
        //     'password'              => 'required|confirmed'
        // ];

        // $messages = [
        //     'name.required'         => 'Nama Lengkap wajib diisi',
        //     'name.min'              => 'Nama lengkap minimal 3 karakter',
        //     'name.max'              => 'Nama lengkap maksimal 35 karakter',
        //     'email.required'        => 'Email wajib diisi',
        //     'email.email'           => 'Email tidak valid',
        //     'email.unique'          => 'Email sudah terdaftar',
        //     'password.required'     => 'Password wajib diisi',
        //     'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        // ];

        // $validator = Validator::make($request->all(), $rules, $messages);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput($request->all);
        // }

        $calon_wp = new calonWP;
        $calon_wp->No_Pokok_WP = '123';
        $calon_wp->Jn_Wajib_Pajak = '1';
        $calon_wp->Jn_Usaha_WP = $request->Jn_Usaha_WP;
        $calon_wp->Kd_Usaha = '1';
        $calon_wp->Nm_Usaha = $request->Nm_Usaha;
        $klasifikasi_usaha = jenisUsaha::where('Jn_Usaha_WP', $request->Jn_Usaha_WP)->first();
        $calon_wp->Klasifikasi_Usaha = $klasifikasi_usaha->Nm_Jn_Usaha_WP;
        $calon_wp->NPWP_Usaha = $request->NPWP_Usaha;
        $calon_wp->Kd_Kec = $request->Kd_Kec;
        $calon_wp->Kd_Kel = $request->Kd_Kel;
        $calon_wp->Alamat_Usaha = $request->Alamat_Usaha;
        $calon_wp->Nm_Izin = $request->Nm_Izin;
        $calon_wp->No_Izin = $request->No_Izin;
        $calon_wp->Tgl_Izin = $request->Tgl_Izin;
        $calon_wp->Email = $request->Email;
        $calon_wp->No_HP = $request->No_HP;
        $calon_wp->potensi = $request->potensi;
        $calon_wp->omset = $request->omset;
        // $calon_wp->Nm_Usaha = $request->Nm_Usaha;
        // $calon_wp->Nm_Usaha = $request->Nm_Usaha;
        // $calon_wp->name = ucwords(strtolower($request->name));
        // $user->email = strtolower($request->email);
        // $user->password = Hash::make($request->password);
        // $user->email_verified_at = \Carbon\Carbon::now();
        $simpan = $calon_wp->save();
        return redirect('wajib_pajak')->with('status', 'Data Calon WP Berhasil Ditambahkan!');
        
        // if ($simpan) {
            //     Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            //     return redirect()->route('signin');
            // } else {
                //     Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
                //     return redirect()->route('register');
                // }
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        //
    }
            
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        // $calon_wp = calonWP::find(1);
        $wp = wajibPajak::find($id);
        $wp->No_Pokok_WP = '123';
        $wp->Jn_Wajib_Pajak = '1';
        $wp->Jn_Usaha_WP = $request->Jn_Usaha_WP;
        $wp->Kd_Usaha = '1';
        $wp->Nm_Usaha = $request->Nm_Usaha;
        $klasifikasi_usaha = jenisUsaha::where('Jn_Usaha_WP', $request->Jn_Usaha_WP)->first();
        $wp->Klasifikasi_Usaha = $klasifikasi_usaha->Nm_Jn_Usaha_WP;
        $wp->NPWP_Usaha = $request->NPWP_Usaha;
        $wp->Kd_Kec = $request->Kd_Kec;
        $wp->Kd_Kel = $request->Kd_Kel;
        $wp->Alamat_Usaha = $request->Alamat_Usaha;
        $wp->Nm_Izin = $request->Nm_Izin;
        $wp->No_Izin = $request->No_Izin;
        $wp->Tgl_Izin = $request->Tgl_Izin;
        $wp->Email = $request->Email;
        $wp->No_HP = $request->No_HP;
        $wp->potensi = $request->potensi;
        $wp->omset = $request->omset;
        // dd($wp);
        $wp->update();
        // calonWP::where('id', $request->id)->update($calon_wp->all());
        // calonWP::find($id)->update($request->all());
        return redirect()->route('wajib-pajak.index')
            ->with('success', 'User Berhasil Diupdate');
        // return redirect('/calon-wp')->with('status', 'Data Calon WP Berhasil Diupdate!');
        //
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(Request $request)
    {
        $calon_wp = calonWP::find($request->id); //BUAT QUERY UNTUK MENGAMBIL DATA BERDASARKAN ID
        // find($id)->delete();
        // dd($calon_wp);
        $calon_wp->delete(); //LALU HAPUS DATA
        return redirect()->route('calon-wp.index')
            ->with('success', 'User Berhasil Dihapus');
        // return redirect('/calon-wp')->with('status', 'Data Calon WP Berhasil Dihapus!');
        // session()->flash('message', $member->name . ' Dihapus');
    }
}
