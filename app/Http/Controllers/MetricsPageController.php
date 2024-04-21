<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * MetricsPageController is responsible for handling the display of the metrics page.
 */

class MetricsPageController extends Controller
{
    /**
     *  Display the metrics page view.
     *
     * @return \Illuminate\View\View Returns view with the metrics page template.
     */
    public function index()
    {
        // return workout blade view
        return view('pages.metric');
    }
}