<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
class HomeController extends Controller
{

    public function index(){

        // $pageInfos = Page::where("page_name","home")->get();

        return view("frontend.home");

    }


}
