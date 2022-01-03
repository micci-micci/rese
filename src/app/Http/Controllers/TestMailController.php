<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestMail;
use Mail;

class TestMailController extends Controller
{
    public function index()
    {
        return Mail::to('micci184@gmail.com')->send(new TestMail());
    }
}
