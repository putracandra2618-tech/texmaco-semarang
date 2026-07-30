<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Option;
use Illuminate\Http\Request;
use Faker\Provider\Image;
use Validator;
use Spipu\Html2Pdf\Html2Pdf;

class AdmOptionsController extends Controller
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
        //
        $user = Auth()->user();
        $options = Option::all();
        return view('module.admin.web_setting.logo',compact('user', 'options'));
    }

    public function index_favicon()
    {
        $user = Auth()->user();
        $options = Option::all();
        return view('module.admin.web_setting.favicon',compact('user', 'options'));
    }

    public function index_metadata()
    {
        $user = Auth()->user();
        $options = Option::all();
        return view('module.admin.web_setting.metadata', compact('user', 'options'));
    }

    public function index_maps()
    {
        # code...
        $option = Option::first();
        return view('module.admin.web_setting.maps', compact('option'));
    }

    public function cetak()
    {
        $user = Auth()->user();
        $options = Option::all();

        $html2pdf = new Html2Pdf('P', 'A4', 'en');
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->pdf->SetTitle('Data Options');
        $html2pdf->writeHTML(view('module.admin.web_setting.print', compact('user', 'options')));
        $html2pdf->output('daftar-options.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function show(Option $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $option)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'logo'      => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $data = Option::find($id);
        if($request->file('logo')){
            $file = $request->file('logo');
            $imgName = $file->getClientOriginalName();
            $destinationPath = public_path('/assets/public/images/logo/');
            $file->move($destinationPath, $imgName);

            $data->logo = $imgName;
        }
        $data->save();
        
        if(isset($data)){
            return redirect('/logo')->with('status', 'Logo succesfully updated');
        } else {
            return Redirect::back()->withErrors('Gagal disimpan');
        }
        
    }

    public function update_favicon(Request $request, $id)
    {
        $request->validate([
            'favicon'      => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $data = Option::find($id);
        if($request->file('favicon')){
            $file = $request->file('favicon');
            $imgName = $file->getClientOriginalName();
            $destinationPath = public_path('/assets/admin/images/');
            $file->move($destinationPath, $imgName);

            $data->favicon = $imgName;
        }
        $data->save();

        if(isset($data)){
            return redirect('/favicon')->with('status', 'Favicon succesfully updated');
        } else {
            return Redirect::back()->withErrors('Eror');
        }
    }

    public function update_metadata(Request $request, $id)
    {
        $validasi = $request->validate([
            'title' => 'required',
            'slogan' => 'required',
            'description' => 'required',
            'keyword' => 'required',
            'footer' => 'required',
        ]);

        $option = Option::where('id', $id)
                ->update($validasi);

        if(isset($option)){
            return redirect('/metadata')->with('status', 'Metadata succesfully updated');
        } else {
            return Redirect::back()->withErrors('Gagal disimpan');
        }
    }

    public function update_maps(Request $request, $id)
    {
        // dd($id);
       $data = Option::find($id);
       $option = Option::where('id',$id)->update([
            'latitude'  => $request->latitude, 
            'longitude' => $request->longitude,
            'idplace'   => $request->idplace]);

        return redirect('/adm-maps')->with('status', 'Maps succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
        //
    }
}
