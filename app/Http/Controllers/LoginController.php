<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Carbon\Carbon;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if ($request->is('login')) {
            return view('login');
        // }
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

        $rules = [
            'email' => 'required | email | exists:users,email',
            'password' => 'required'
        ];
        $this->validate($request, $rules);

        $auth = [
            'email' => $request->email,
            'password' => $request->password
        ]; 

        $remember = $request->remember;
        // dd($remember);
        $sessionValue = $request->session()->get('key');
        $sessionTime  = $request->session()->get('time');

        if ($sessionValue >= 2) {
            if ($sessionTime == null) {
                $request->session()->put('time', Carbon::now());    //put the current time to session
            }
            $timeDiff = Carbon::parse($sessionTime)->diffInSeconds(); //calculate time
            if ($timeDiff >= 59) {

                if (auth()->attempt($auth, $remember)) {
                    if (auth()->user()->isAdmin()) {
                        return redirect()->route('index');
                    }
                    elseif (auth()->user()->isManager()) {
                        $request->session()->flush();
                        dd("Under Contraction");
                        // return redirect()->route('index');
                    }
                    else{
                        session()->flush();
                        return redirect()->route('login');
                    }
                }else{
                    session()->flush();
                    return back()->with('msg', 'you have to verify account')
                        ->with('title', 'Login Error');
                } // end auth() attempt 

            }
            $waitTime = 59 - $timeDiff;
            return back()->with('msg', 'you have to wait ' . $waitTime . ' sec')
                        ->with('title', 'Login Error');

        }else{
            $sessionValue = $sessionValue + 1;
            $request->session()->put('key', $sessionValue);
            return back()->with('msg', 'you have to verify account ')
                        ->with('title', 'Login Error');
            

        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        \Auth::logout();
        return redirect()->route('login');
    }
}
