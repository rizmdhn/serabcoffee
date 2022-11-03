<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
class CookieController extends Controller
{
    public function setCookie(Request $request, $table_number) {

        return redirect('/product')->withCookie(cookie('table_number', $table_number));
     }
     public function getCookie(Request $request) {
        $value = $request->cookie('name');
        echo $value;
     }
}
