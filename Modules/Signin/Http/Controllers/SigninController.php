<?php

namespace Modules\Signin\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Modules\Signin\Entities\Signin;
use Modules\Signin\Http\Requests\LoginUserRequest;
use Modules\Signin\Http\Requests\SigninRequest;
use Modules\Signup\Entities\Signup;

class SigninController extends Controller
{

    public function index()
    {
        return view('signin::components.login');
    }


    public function submit(SigninRequest $request)
    {
        $request->validated($request->all());

        $user = Signup::where('business_email', $request->business_email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId', $user->user_id);
        
                return redirect('signin/dashboard');
      
            }else{
                return back()->with('error', 'password is incorrect');
            }
        }else{
            return back()->with('error', 'Email or password is incorrect');
        }
    }


    public function dashboard()
    {

        if(session()->has('loginId')){
            $user = Signup::where('user_id', session()->get('loginId'))->first();
        }
        return redirect('dashboard');
    }


    public function show($id)
    {
        return view('signin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('signin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
