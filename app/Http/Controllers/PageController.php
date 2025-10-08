<?php

declare(strict_types=1);

namespace App\Http\Controllers;

final class PageController
{
    public function home(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('home');
    }

    public function family(): \Illuminate\Contracts\View\View
    {
        return view('page.family');
    }
}
