<?php

namespace Smt\Masterweb\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use \Smt\Masterweb\Models\Feedback;
use \Smt\Masterweb\Models\Offer;
use \Smt\Masterweb\Models\Menu;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function contact(Request $request)
     {
         Feedback::create([
             'name' => $request->name,
             'email' => $request->email,
             'phone' => $request->telephone,
             'message' => $request->message
         ]);
         if($request == NULL)
         {
            echo FALSE;
         }else{
            echo TRUE;
         }
     }

     public function offer(Request $request)
     {
         # code...
        //  dd($request);
         $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'nama_proyek' => 'required',
            'deadline' => 'required',
            'info_umum' => 'required',
            'phone' => 'required'
        ]);

        $data = new Offer;

        $data->nama             = $request->post('nama');
        $data->phone             = $request->post('phone');
        $data->instansi         = $request->post('instansi');
        $data->email            = $request->post('email');
        $data->nama_proyek      = $request->post('nama_proyek');
        $data->detail_proyek    = $request->post('detail_proyek');
        $data->layanan          = implode(',',$request->post('layanan'));
        $data->deadline         = $request->post('deadline');
        $data->lampiran_url     = $request->post('lampiran_url');
        $data->info_umum        = $request->post('info_umum');
        if($request->file('lampiran_berkas')){
            $file = $request->file('lampiran_berkas');
            $imgName = $file->getClientOriginalName();
            $destinationPath = public_path('/assets/public/images/');
            $file->move($destinationPath, $imgName);

            $data->lampiran_berkas = $imgName;
        }
        $data->save();
        
        return redirect('penawaran')->with('status', 'Terimakasih telah membuat penawaran, Kami akan segera menghubungi anda');
     }
}
