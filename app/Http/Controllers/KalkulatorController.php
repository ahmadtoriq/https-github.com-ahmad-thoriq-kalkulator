<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class KalkulatorController extends Controller
{
    public function index()
    {
        return view('main');
    }

    //fungsi untuk menghitung penjumlahan
    public function penjumlahan()
    {
        $bil1 = $_POST['bil1'];
        $bil2 = $_POST['bil2'];
        $hasil = $bil1 + $bil2;

        DB::table('riwayat_hasil')->insert([
            "hasil" => $hasil
        ]);

        $lastInserted = DB::table('riwayat_hasil')->select('id')->orderBy('id','DESC')->first();

        DB::table('riwayat_bilangan')->insert([
            "bilangan_1" => $bil1,
            "bilangan_2" => $bil2,
            "id_hasil" => $lastInserted->id
        ]);

        echo json_encode($hasil);
    }

    //fungsi untuk menghitung pengurangan
    public function pengurangan()
    {
        $bil1 = $_POST['bil1'];
        $bil2 = $_POST['bil2'];
        $hasil = $bil1 - $bil2;

        DB::table('riwayat_hasil')->insert([
            "hasil" => $hasil
        ]);

        $lastInserted = DB::table('riwayat_hasil')->select('id')->orderBy('id','DESC')->first();

        DB::table('riwayat_bilangan')->insert([
            "bilangan_1" => $bil1,
            "bilangan_2" => $bil2,
            "id_hasil" => $lastInserted->id
        ]);

        echo json_encode($hasil);
    }

    //fungsi untuk menghitung perkalian
    public function perkalian()
    {
        $bil1 = $_POST['bil1'];
        $bil2 = $_POST['bil2'];
        $hasil = $bil1 * $bil2;

        DB::table('riwayat_hasil')->insert([
            "hasil" => $hasil
        ]);

        $lastInserted = DB::table('riwayat_hasil')->select('id')->orderBy('id','DESC')->first();

        DB::table('riwayat_bilangan')->insert([
            "bilangan_1" => $bil1,
            "bilangan_2" => $bil2,
            "id_hasil" => $lastInserted->id
        ]);

        echo json_encode($hasil);
    }

    //fungsi untuk menghitung pembagian
    public function pembagian()
    {
        $bil1 = $_POST['bil1'];
        $bil2 = $_POST['bil2'];
        $hasil = $bil1 / $bil2;

        DB::table('riwayat_hasil')->insert([
            "hasil" => $hasil
        ]);

        $lastInserted = DB::table('riwayat_hasil')->select('id')->orderBy('id','DESC')->first();

        DB::table('riwayat_bilangan')->insert([
            "bilangan_1" => $bil1,
            "bilangan_2" => $bil2,
            "id_hasil" => $lastInserted->id
        ]);

        echo json_encode($hasil);
    }

    //fungsi untuk menghitung perpangkatan
    public function perpangkatan()
    {
        $bil1 = $_POST['bil1'];
        $bil2 = $_POST['bil2'];
        $hasil = pow($bil1,$bil2);

        DB::table('riwayat_hasil')->insert([
            "hasil" => $hasil
        ]);

        $lastInserted = DB::table('riwayat_hasil')->select('id')->orderBy('id','DESC')->first();

        DB::table('riwayat_bilangan')->insert([
            "bilangan_1" => $bil1,
            "bilangan_2" => $bil2,
            "id_hasil" => $lastInserted->id
        ]);

        echo json_encode($hasil);
    }

    public function modulo()
    {
        $bil1 = $_POST['bil1'];
        $bil2 = $_POST['bil2'];
        $hasil = $bil1 % $bil2;

        DB::table('riwayat_hasil')->insert([
            "hasil" => $hasil
        ]);

        $lastInserted = DB::table('riwayat_hasil')->select('id')->orderBy('id','DESC')->first();

        DB::table('riwayat_bilangan')->insert([
            "bilangan_1" => $bil1,
            "bilangan_2" => $bil2,
            "id_hasil" => $lastInserted->id
        ]);

        echo json_encode($hasil);
    }

    //mendapatkah seluruh riwayat hasil operasi
    public function getRiwayat()
    {
        $query = DB::table('riwayat_hasil')->select('id','hasil')->orderByDesc('id');
        return DataTables::of($query)
            ->addColumn('action', function($data){
                return '<button type="button" class="btn btn-success" data-id="'.$data->id.'">Gunakan</button>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    //mendapatkan 1 riwayat hasil operasi
    public function getHasil()
    {
        $hasil = DB::table('riwayat_hasil')->select('hasil')->where('id',$_POST['id'])->get()->first();

        echo json_encode($hasil);
    }
}
