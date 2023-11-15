<?php

namespace App\Http\Controllers;



class HomeController extends Controller {
    public function accueil():\Illuminate\View\View|string {
        return view("accueil");
    }

    public function apropos():\Illuminate\View\View|string{
        return view("apropos");
    }

    public function contact():\Illuminate\View\View|string{
        return view("contact");
    }
}
