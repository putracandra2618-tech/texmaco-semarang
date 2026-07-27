<?php
namespace Smt\Masterweb\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AdmBiodataController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
    }

    public function index()
    {
        $user = Auth()->user();
        return view('masterweb::module.admin.users.biodata',compact('user'));
    }

    public function update(Request $request, $id)
    {
        //
        $user = \Smt\Masterweb\Models\User::findOrFail($id);
        $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'username'  => 'required',
            'photo'      => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $user->name = $request->post('name');
        $user->email = $request->get('email');
        $user->username = $request->post('username');

        if($request->hasFile('photo')){
            $image_path = public_path("/assets/admin/images/photo/".$user->photo);
            if (\Storage::exists($image_path)) {
                \Storage::delete($image_path);
            }
            $file = $request->file('photo');
            $imgName = $file->getClientOriginalName();
            $destinationPath = public_path('/assets/admin/images/photo/');
            $file->move($destinationPath, $imgName);

            //thubmail
                  $image = Image::make(public_path("/assets/admin/images/photo/".$imgName))->resize(100,100)->save(public_path('/assets/admin/images/photo_thumb/') . $imgName);
        } else {
            $imgName = $user->photo;
        }
        $user->photo = $imgName;
        $user->save();

        if(isset($user)){
            return redirect('biodata')->with('status', 'User succesfully updated');
        } else {
            return Redirect::back()->withErrors('Gagal disimpan');
        }
    }
}
