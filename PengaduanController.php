<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\DB;

use App\Models\Pengaduan;


class PengaduanController extends Controller
{
    function index(){

    $judul = "Selamat Datang";
    $pengaduan = DB::table('desainlaporan_pengaduan')->get();
 

    return view('home', ['judul' => $judul, 'pengaduan' => $pengaduan]);
   }

  function tampil_pengaduan(){
    echo "Tampillll";
  }
} 
function tampil_pengaduan(){
  return view('isi-pengaduan');
}
function proses_tambah_pengaduan(Request $request){
// validasi
$request->validate([
  'isi_laporan' => 'required'
]);
  // $isi_pengaduan = $POST['isi_laporan'];
  $isi_pengaduan = $request->isi_laporan;

  DB::table('pengaduan')->insert([
    'tgl_pengaduan' => date('Y-m-d'),
    'nik' =>'',
    'isi_laporan' => $isi_pengaduan,
    'foto' =>'',
    'status' => '0'

  ]);
  return redirect('/home');
}

function hapus($id){
  DB::table('pengaduan')->where('id_pengaduan', '=', $id)->delete();
}

  function detail_pengaduan ($id){
    $pengaduan= DB::table('pengaduan')
                ->where('id_pengaduan', '=', $id)
                ->first();
    return view("detail_pengaduan", ["data"=> $pengaduan]);
  }
