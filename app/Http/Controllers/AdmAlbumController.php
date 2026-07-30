<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use \App\Models\Album;
use SmtHelp;
use App\Http\Middleware\RoleCheck;

class AdmAlbumController extends Controller
{
    public function __construct()
	{
        $this->middleware('auth');
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get auth user
        $data = Album::all();
        return view('module.admin.gallery.list_category',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get auth user
        return view('module.admin.gallery.add_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // 'file_client' => 'required|mimes:jpeg,bmp,png,jpg',
        ]);
        
        $data = new Album;
        $data->nama = $request->post('nama');
        $data->link = str_replace(' ','-', $request->post('nama'));
        $data->publish = "1";
        $data->save();
        return redirect()->route('adm-album.index')->with('status', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get auth user
        $album = Album::find($id);
        return view('module.admin.gallery.edit_category',compact('album'));
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
        $validatedData = $request->validate([
            // 'file_client' => 'mimes:jpeg,bmp,png,jpg',
        ]);
        
        $data = Album::find($id);
        $data->nama = $request->post('nama');
        $data->link = str_replace(' ','-', $request->post('nama'));
        $data->save();
        return redirect()->route('adm-album.index', [$id])->with('status', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Client = Album::findOrFail($id);
        $Client->delete();
        return redirect()->route('adm-album.index', [$id])->with('status', 'Data berhasil dihapus');
    }
}
