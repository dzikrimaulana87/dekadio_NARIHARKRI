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

    public function modulPage(): string
    {
        return view('user/modul_page');
    }
    public function vidPage(): string
    {
        return view('user/video_page');
    }
}