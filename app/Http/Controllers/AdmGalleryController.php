<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use \App\Models\CategoryPortofolio;
use \App\Models\Portofolio;
use \App\Models\Gallery;
use SmtHelp;
use App\Http\Middleware\RoleCheck;
use Intervention\Image\Facades\Image;
use App\Models\Album;

class AdmGalleryController extends Controller
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
        $data = Gallery::all()->sortByDesc('created_at');
        return view('module.admin.gallery.list',compact('data'));
    }

    public function list($id)
    {
        //get auth user
        $album = Album::find($id);
        $data = Gallery::where('id_photoalbum',$id)->get()->sortByDesc('created_at');
        return view('module.admin.gallery.list',compact('data','album'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get auth user
        $album = Album::find(request('album'));
        return view('module.admin.gallery.add',compact('album'));
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
       

        foreach ($request->file('file') as $file) {
            $data = new Gallery;
            $data->id_photoalbum = request()->query('album');
            $data->nama    = $request->post('nama');
            $data->link               = str_replace(' ','-', $request->post('nama'));
            $data->isi    = $request->post('isi');
            $data->publish = "1";
            // if($request->file('file')){
                // $file = $request->file('file');
                $imgName = $file->getClientOriginalName();
                $destinationPath = public_path('/assets/public/images/');
                $file->move($destinationPath, $imgName);
                $data->images = $imgName;
                $image = Image::make(public_path("/assets/public/images/".$imgName))->save(public_path('/assets/public/images/') . $imgName);
            // }
            $data->save();
        }
       
        return redirect()->route('adm-gallery.list',[request()->query('album')])->with('status', 'Data berhasil ditambahkan');
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
        $album = Album::find(request('album'));
        $data = Gallery::find($id);
        return view('module.admin.gallery.edit',compact('data','album'));
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

        $data = gallery::find($id);
        $data->nama    = $request->post('nama');
        $data->link               = str_replace(' ','-', $request->post('nama'));
        $data->isi    = $request->post('isi');
        $data->publish = "1";
        if($request->file('file')){
            $file = $request->file('file');
            $imgName = $file->getClientOriginalName();
            $destinationPath = public_path('/assets/public/images/');
            $file->move($destinationPath, $imgName);
            $data->images = $imgName;
            $image = Image::make(public_path("/assets/public/images/".$imgName))->save(public_path('/assets/public/images/') . $imgName);
        }
        $data->save();
        return redirect()->route('adm-gallery.list',[$data->id_photoalbum])->with('status', 'Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Client = Gallery::findOrFail($id);
        $album = $Client->id_photoalbum;
        $Client->delete();
        return redirect()->route('adm-gallery.list', [$album])->with('status', 'Data berhasil dihapus');
    }

    public function publish($id)
    {
        $Client = Gallery::findOrFail($id);
        $album = $Client->id_photoalbum;
        if($Client->publish == NULL OR $Client->publish == 0)
        {
            $Client->publish = "1";
        }else{
            $Client->publish = "0";
        }
        $Client->save();

        return redirect("/adm-gallery/list/$album");
    }
}
