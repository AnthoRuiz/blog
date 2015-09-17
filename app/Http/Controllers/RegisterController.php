<?php

namespace blog\Http\Controllers;

use blog\User;
use Illuminate\Http\Request;

use blog\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $postData = $request->all();
        $rules = [
            'email' => 'required|email|unique:users',
            'password_r' => 'required|min:8',
            'password' => 'required|min:8|same:password_r',
        ];
        $validator = Validator::make($postData,$rules);

        if($validator->fails())
        {
            return redirect()->route('register_show_path')
                ->withInput()
                ->withErrors($validator);
        }
        else
        {

            $user = new User;
            $user->name    = $postData['name'];
            $user->email   = $postData['email'];
            $user->password =bcrypt($postData['password']);
            $user->save();
        }
        return redirect()->route('auth_show_path')->withErrors('Usuario Creado');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
