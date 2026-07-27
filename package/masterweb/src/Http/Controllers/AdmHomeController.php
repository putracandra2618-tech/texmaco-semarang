<?php

namespace Smt\Masterweb\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Smt\Masterweb\Rules\Captcha;

class AdmHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('masterweb::module.admin.beranda');
    }

    protected function validator(array $data)
    {
    return Validator::make($data, [
        'email' => 'required',
        'password' => 'required',
        'g-recaptcha-response' => new Captcha(),
    ]);
    }
}
