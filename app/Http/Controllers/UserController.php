<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Models\User;

use Ramsey\Uuid\Uuid;

use App\Http\Controllers\Controller;
use Validator;
use Intervention\Image\Facades\Image;

class UserController extends Controller

{
  public function __construct()
	{
		$this->middleware('auth');
	}
  
   public function rules($request)
    {
        $rule = [
            'name' => 'required',
            'level' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'photo' => 'nullable|mimes:jpg,jpeg,png,JPG,JPEG,PNG',
        ];

        $pesan = [
            'level.required' => "Level Pengguna Tidak Boleh Kosong",
            'name.required' => 'Nama Pengguna Tidak Boleh Kosong',
            'username.required' => 'Username Pengguna Tidak Boleh Kosong',
            'username.unique' => 'Username Pengguna Sudah Terpakai',
            'email.required' => 'Email Pengguna Tidak Boleh Kosong',
            'email.unique' => 'Email Pengguna Sudah Terpakai',
            'email.email' => 'Email Tidak Standar',
            'photo.mimes' => 'Foto Tidak Sesuai Format',
        ];

        return Validator::make($request, $rule, $pesan);
    }

  /**

   * Display a listing of the resource.

   *

   * @return \Illuminate\Http\Response

   */

  public function index()

  {

    //get auth user

    $user = Auth()->user();

    $users = User::all();

    return view('module.admin.users.list', compact('user', 'users'));
  }



  /**

   * Show the form for creating a new resource.

   *

   * @return \Illuminate\Http\Response

   */

  public function create()

  {

    //get auth user

    $user = Auth()->user();

    $privileges = \App\Models\Privileges::all();

    return view('module.admin.users.add', compact('user', 'privileges'));
  }



  /**

   * Store a newly created resource in storage.

   *

   * @param  \Illuminate\Http\Request  $request

   * @return \Illuminate\Http\Response

   */

  public function store(Request $request)

  {
    $validator = $this->rules($request->all());

    if ($validator->fails()) {
      return redirect('adm-users/create')->withErrors($validator->errors());
    }else{
      $user = new User;

      $user->name = $request->post('name');

      $user->username = $request->post('username');

      $user->email = $request->get('email');

      $user->level = $request->get('level');

      $user->password = \Hash::make('SMT');

      if ($request->file('photo')) {
  
        $file = $request->file('photo');
        $imgName = $file->getClientOriginalName();
        $destinationPath = public_path('/assets/admin/images/photo/');
        $file->move($destinationPath, $imgName);
  
        $user->photo = $imgName;
        $image = Image::make(public_path("/assets/admin/images/photo/".$imgName))->resize(100,100)->save(public_path('/assets/admin/images/photo_thumb/') . $imgName);
      }

      $user->save();

      return redirect()->route('users.index')->with('status', 'User Berhasil ditambahkan Password User : "SMT"');
    }

    return redirect()->route('adm-users.index')->with('status', 'User succesfully inserted');
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



    $user = Auth()->user();

    $users = User::findOrFail($id);

    $privileges = \App\Models\Privileges::all();



    return view('module.admin.users.edit', compact('user', 'users', 'privileges', 'id'));
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
    $validator = $this->rules($request->all());

    if ($validator->fails()) {
      return redirect()->route('adm-users.edit',[$id])->withErrors($validator->errors());
    }else{
      $user = \App\Models\User::findOrFail($id);

      $user->name = $request->post('name');

      $user->username = $request->post('username');

      // $user->email = $request->get('email');

      $user->level = $request->get('level');



      if ($request->file('photo')) {

        if ($user->photo && file_exists(storage_path('assets/admin/images/photo/' . $user->photo))) {
          \Storage::delete('assets/admin/images/photo/' . $user->photo);
        }
  
        $file = $request->file('photo');
        $imgName = $file->getClientOriginalName();
        $destinationPath = public_path('/assets/admin/images/photo/');
        $file->move($destinationPath, $imgName);
  
        $user->photo = $imgName;
        $image = Image::make(public_path("/assets/admin/images/photo/".$imgName))->resize(100,100)->save(public_path('/assets/admin/images/photo_thumb/') . $imgName);
      }

      $user->save();

      return redirect()->route('adm-users.index')->with('status', 'User Berhasil dirubah');
    }
  }



  /**

   * Remove the specified resource from storage.

   *

   * @param  int  $id

   * @return \Illuminate\Http\Response

   */

  public function destroy($id)

  {

    $user = User::findOrFail($id);

    $user->delete();

    return redirect()->route('adm-users.index', [$id])->with('status', 'User succesfully updated');
  }

  public function reset_password($id)
  {
    $user = \App\Models\User::findOrFail($id);
    $user->password = \Hash::make('SMT');
    $user->save();
    return redirect()->route('adm-users.index', [$id])->with('status', 'User succesfully reset password');
  }

  public function publish(Request $request, $id)
  {

      $user = Auth()->user();
      $user = User::where('id', $id)->first();
      // dd($user);
      if ($user->publish == 0) {
        $user->publish = 1;
        $message = "User Berhasil Active";
      } else {
        $user->publish = 0;
        $message = "User Berhasil Non Active";
      }

      $user->save();
      return redirect()->route('adm-users.index', [$id])->with('status', $message);
  }
}
