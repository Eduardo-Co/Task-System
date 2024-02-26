<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProcurarusuarioController extends Controller
{
    public function procurar(){
       
        dd($_SESSION['user_id']);
    }
}
