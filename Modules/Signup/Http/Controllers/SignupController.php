<?php

namespace Modules\Signup\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Signup\Http\Requests\SignupRequest;
use App\Trait\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Modules\Signup\Entities\Signup;

class SignupController extends Controller
{


    public function index()
    {
        return view('signup::components.register');
    }

    public function submit(SignupRequest $request)
    {
        $request->validated($request->all());
        $user = new Signup([
            'business_name' => $request->business_name,
            'business_email' => $request->business_email,
            'phone_no' => $request->phone_no,
            'password' => Hash::make($request->password),
            'user_id' => (string) Str::uuid(),
        ]);
      if($user->save()){
        return back()->with('success', 'Successful registeration');
      }else{
        return back()->with('error', 'Signup error');
      }

        
    }

    public function create()
    {
        return view('signup::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('signup::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('signup::edit');
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

    public function checking(){
        return 'cchecking complete';
    }
}
