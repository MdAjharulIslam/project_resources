<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        return view('home', compact('users')); 
    }

    public function create()

     {  
        return view('createUser');
        
  }

    public function store(Request $request) {
        
    $users = DB::table('users')->insert([
    'name'=> $request->name,
    'email'=>$request->email,
    'age'=> $request->age,
    'city'=>$request->city,
  ]); 
  redirect('resources');
  }

    public function show(string $id) {
          $user = DB::table('users')->where('id', $id)->first();

          return view('singleUser', compact('user'));

     }

    public function edit(string $id) { }

    public function update(Request $request, string $id) { }

    public function destroy(string $id) { }
}