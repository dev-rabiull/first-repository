<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function dataFetch(){
        $todos = DB::table('todos')->get();
        return view('contact', compact('todos'));
    }

    function Contact(){
        return "Iam From FirstController Home Method";
        //return view(contact);
    }

    function NameTest($name){
        return "Your Name is : " .$name;
    }

    function Test($name, $age){
        return "Your Name Is : " .$name;
        return "Your Age Is : " .$age;

        return view(contact, ['name'=>$name, 'age'=>$age]);

    }

}
