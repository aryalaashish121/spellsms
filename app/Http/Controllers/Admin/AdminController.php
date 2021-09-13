<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   public function index(){

      //permission check 
       
       $user = Auth::user();
    //    $menu = new MenuManager();
   }
}
