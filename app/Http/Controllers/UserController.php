<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return User::where('id',Auth::id())->get();
        return view('profile')->with('profile',User::where('id',Auth::id())->get());
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('edit_profile')->with('profile',User::where('id',Auth::id())->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //

        // return $request;
        $userDetails=User::find(Auth::id());
        if($userDetails){
            
            if($request->avatar){
                $fileName = time().'.'.$request->avatar->extension();
                $request->avatar->move(public_path('images'), $fileName);
                $userDetails->avatar = $fileName;
            }

            $userDetails->firstname = $request->firstname;
            $userDetails->lastname = $request->lastname;
            $userDetails->phone = $request->phone;
            $userDetails->city = $request->city;
            $userDetails->state = $request->state;
            $userDetails->address = $request->address;
            $userDetails->zipcode = $request->zipcode;
            $saved = $userDetails->save();
        if(!$saved){
            abort(500, 'Error');
        }else{
            $request->session()->flash('message', "User Updated");
            return redirect('profile');
        }
        }else{
            return "User Not Found";
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
