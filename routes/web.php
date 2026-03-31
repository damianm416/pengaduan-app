<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/form', function () {
    $kategori = DB::table('kategori')->get();
    return view('form', ['kategori' => $kategori]);
});


Route::post('/submit', function (Request $request) {

    $id = rand(1,1000); // bikin ID sekali

    DB::table('input_aspirasi')->insert([
        'id_pelapor' => $id,
        'nis' => 123,
        'id_kategori' => $request->id_kategori,
        'lokasi' => $request->lokasi,
        'keterangan' => $request->keterangan,
    ]);

    DB::table('aspirasi')->insert([
        'id_aspirasi' => rand(1,1000),
        'id_pelapor' => $id,
        'status' => 'Menunggu',
        'feedback' => '-'
    ]);

    return "Data berhasil disimpan!";
});

Route::get('/data', function () {
    $data = DB::table('input_aspirasi')
        ->leftJoin('aspirasi', 'input_aspirasi.id_pelapor', '=', 'aspirasi.id_pelapor')
        ->select(
            'input_aspirasi.*',
            'aspirasi.status',
            'aspirasi.feedback'
        )
        ->get();

    return view('data', ['data' => $data]);
});

Route::get('/update/{id}', function ($id) {
    return view('update', ['id' => $id]);
});
Route::post('/update', function (Request $request) {

   DB::table('aspirasi')->updateOrInsert(
    ['id_pelapor' => $request->id],
    [
        'status' => $request->status,
        'feedback' => $request->feedback
    ]
);
    return redirect('/data');
});
