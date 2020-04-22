<?php
namespace App\Http\Controllers;

class MenuController extends Controller {


    public function accueil()
    {
        return view('menu.accueil');
    }

    public function apropos()
    {
        return view('menu.apropos');
    }

    public function contact()
    {
        return view('menu.contact');
    }

}
