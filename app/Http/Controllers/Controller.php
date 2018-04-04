<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        /* this array isn't necessary for the one page, however, more could be added later */
        $nav = [
            'create' => 'Create',
            'about' => 'About',
            'contact' => 'Contact',
        ];
        View::share(['nav' => $nav]);
    }
}
