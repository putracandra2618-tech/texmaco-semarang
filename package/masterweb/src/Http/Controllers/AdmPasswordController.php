<?php

namespace Smt\Masterweb\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdatePasswordRequest;
use Auth;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Illuminate\Support\Facades\Hash;
use \Smt\Masterweb\Models\User;


use App\Http\Controllers\Controller;

class AdmPasswordController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}
    //
    public function edit()
    {
        $user = Auth()->user();
        return view('masterweb::module.admin.users.edit_password', compact('user'));
    }

    public function update(Request $request)
    {  
        $request_data = $request->All();
        $validator = $this->update_rules($request_data);
        if($validator->fails()) {
            // return Redirect::back()->withErrors(array('error' => $validator->getMessageBag()->toArray()), 400);
            return Redirect::back()->withErrors('Password kosong atau tolong masukan password baru yang sama');
        } else {  
            $current_password = Auth::User()->password;           
            if(Hash::check($request_data['current_password'], $current_password)){         
                $user_id = Auth::User()->id;                       
                $obj_user = User::find($user_id);
                $obj_user->password = Hash::make($request_data['password']);
                $obj_user->save(); 
                return redirect('adm-password')->with('status', 'berhasil dirubah');
            } else {           
                return Redirect::back()->withErrors('Silahkan masukan password lama dengan benar');
            }
        }

    }

    public function update_rules(array $data)
    {
        $messages = [
            'current-password.required' => 'Please enter current password',
            'password.required' => 'Please enter password',
        ];

        $validator = Validator::make($data, [
            'current_password' => 'required',
            'password' => 'required|same:password',
            'password_confirmation' => 'required|same:password',     
        ], $messages);

        return $validator;
    } 

}
