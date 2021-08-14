<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function change($lang = 'en')
    {
        Session::put('local', $lang);

        return redirect()->back();
    }
}
