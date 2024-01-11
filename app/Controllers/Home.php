<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home_page');
    }

    public function levelPage(): string
    {
        
        return view('user/level_page');
    }
}
