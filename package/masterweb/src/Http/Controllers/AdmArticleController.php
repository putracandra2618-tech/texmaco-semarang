<?php

namespace Smt\Masterweb\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use \Smt\Masterweb\Models\Content;
use \Smt\Masterweb\Models\Menu;
use Intervention\Image\Facades\Image;

class AdmArticleController extends Controller
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
        $data = Content::Where('menu_id','5')->orderBy('created_at','DESC')->get();
        return view('masterweb::module.admin.article.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //get all menu public
        $menupublic = Menu::where(['publish'=>1])->Where('type','18')->get();

        return view('masterweb::module.admin.article.add',compact('menupublic'));
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
            'menu_id' => 'required',
            'title' => 'required',
            'link_url' => 'required',
            'content' => 'required',
            'author' => 'required',
            'deskripsi' => 'required',
            // 'img_thumbnail' => 'mimes:jpg,gif,png,bmp'
        ]);

        $data = new Content;

        $data->menu_id = $request->post('menu_id');
        $data->type = "0";
        $data->title = $request->post('title');
        $data->link_url = $request->post('link_url');
        $data->content = $request->post('content');
        $data->views = "0";
        $data->author = $request->post('author');
        $data->keyword = $request->post('keyword');
        $data->deskripsi = $request->post('deskripsi');
        $data->publish = "1";
        $data->date = $request->date;
        if($request->file('img_thumbnail')){
            $file = $request->file('img_thumbnail');
            $imgName = $file->getClientOriginalName();
            $destinationPath = public_path('/assets/public/images/');
            $file->move($destinationPath, $imgName);

            $data->img_thumbnail = $imgName;
            $image = Image::make(public_path("/assets/public/images/".$imgName))->resize(360,216)->save(public_path('/assets/public/images/article_thumb/') . $imgName);
        }
        $data->save();
        return redirect()->route('admarticle.index')->with('status', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get auth user
        $content = Content::find($id);
        $menupublic = Menu::where(['publish'=>1])->Where('type','18')->get();
        return view('masterweb::module.admin.article.detail',compact('menupublic','content'));
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
        $content = Content::find($id);
        $menupublic = Menu::where(['publish'=>1])->Where('type','18')->get();
        return view('masterweb::module.admin.article.edit',compact('menupublic','content'));
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
            'menu_id' => 'required',
            'title' => 'required',
            'link_url' => 'required',
            'content' => 'required',
            'author' => 'required',
            'deskripsi' => 'required',
            // 'img_thumbnail' => 'mimes:jpg,gif,png,bmp'
        ]);

        $data = Content::find($id);
        $data->menu_id = $request->post('menu_id');
        $data->type = "0";
        $data->title = $request->post('title');
        $data->link_url = $request->post('link_url');
        $data->content = $request->post('content');
        $data->author = $request->post('author');
        $data->keyword = $request->post('keyword');
        $data->deskripsi = $request->post('deskripsi');
        $data->date = $request->date;
        
        if($request->file('img_thumbnail')){
            $file = $request->file('img_thumbnail');
            $imgName = $file->getClientOriginalName();
            $destinationPath = public_path('/assets/public/images/');
            $file->move($destinationPath, $imgName);

            $data->img_thumbnail = $imgName;
            $image = Image::make(public_path("/assets/public/images/".$imgName))->resize(360,216)->save(public_path('/assets/public/images/article_thumb/') . $imgName);
        }
        $data->save();

        return redirect()->route('admarticle.index')->with('status', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subsector = Content::findOrFail($id);
        $subsector->delete();
        return redirect()->route('admarticle.index')->with('status', 'Data berhasil dihapus');
    }
}
