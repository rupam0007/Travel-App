<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function faq()
    {
        return view('pages.faq');
    }

    public function visaInfo()
    {
        return view('pages.visa-info');
    }

    public function travelTips()
    {
        return view('pages.travel-tips');
    }
}
