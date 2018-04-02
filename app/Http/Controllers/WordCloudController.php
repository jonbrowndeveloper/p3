<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WordCloudController extends Controller
{

    public function index()
    {
        return view('wordcloud.index');
    }

}
