<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class confirmation extends Controller
{
    /*
    private function checkConfirmation()
    {
        $session = session('');
    }
    */
    public function getConfirmation()
    {
        return session('guest_confirmation');
    }

    public function submitConfirmation()
    { }
}
