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
        /* first element of the array is the filepath with regards to the project. Backslash is included*/
        $nav = [
            'wordcloud\create' => 'Create',
            'about' => 'About',
            'contact' => 'Contact',
        ];
        View::share(['nav' => $nav]);
    }

    // custom usort function to compare the 'number' int within the importance array

    public static function numberCompare($first, $second)
    {
        if ($first['number'] == $second['number']) {
            return 0;
        }

        return ($first['number'] < $second['number'] ? 1 : -1);
    }

    // another custom usort function used to sort the final array

    public static function stringCompare($a, $b)
    {
        return strcasecmp($a['word'], $b['word']);
    }
}
