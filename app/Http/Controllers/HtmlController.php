<?php

namespace App\Http\Controllers;

use App\Models\HtmlTags;
use Illuminate\Http\Request;

class HtmlController extends Controller
{
    public function list(){
        $htmlTag = HtmlTags::get();
        dd($htmlTag);

    }
}
