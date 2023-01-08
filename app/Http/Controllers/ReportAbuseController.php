<?php

namespace App\Http\Controllers;

use App\ReportAbuse;
use Illuminate\Http\Request;

class ReportAbuseController extends Controller
{
    public function index()
    {
       $title="Report Abuse";
       $abuses=ReportAbuse::get();
       return view("abuse.index",compact("abuses","title"));
    }
}
