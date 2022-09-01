<?php


namespace App\Http\Controllers;


class MainController
{
    public function index()
    {
        return view('home');
    }

    public function aboutUs()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
