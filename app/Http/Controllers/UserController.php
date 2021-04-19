<?php

namespace App\Http\Controllers;

use App\User;
use App\Language;
use App\Userlanguage;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $users=User::with(["UserLanguages"=>function($q){
            $q->with("language");
        }])->get();
        return view("user/index",compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $languages= Language::all();
       return view("user/create",compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'age'=>'required|numeric'
        ]);
      
        $user=User::create([
            "name"=>$request->name,
            "age"=>$request->age,
            "gender"=>$request->gender,
        ]);

        foreach ($request->languages as $key => $language) {
            Userlanguage::create(["user_id"=>$user->id,"language_id"=>$language]);
        }

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        
        $languages= Language::all();
        
        $user_selected_language=Userlanguage::where("user_id",$user->id)->pluck("language_id")->toArray();
        return view("user/edit",compact('languages','user','user_selected_language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user,Request $request)
    {
       
        $validated = $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'age'=>'required|numeric'
        ]);
      
       User::where("id",$user->id)->  update([
            "name"=>$request->name,
            "age"=>$request->age,
            "gender"=>$request->gender,
        ]);
        
        Userlanguage::where("user_id",$user->id)->delete();
        foreach ($request->languages as $key => $language) {
            Userlanguage::create(["user_id"=>$user->id,"language_id"=>$language]);
        }
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
       $user->delete();
       return redirect()->route('index');
    }
}
