<?php

namespace App\Http\Controllers;

use App\Components\Core\ResponseHelpers;
use Illuminate\Http\Request;


class TestController extends Controller
{
    use ResponseHelpers;
    public function check(){
      
        return $this->respondBadRequest("hello successfully used");
    }
}
