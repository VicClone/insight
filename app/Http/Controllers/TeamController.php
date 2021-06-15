<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeamRequest;

class TeamController extends Controller
{
    public function teamAdd(TeamRequest $req) {
        print_r($req);
    }
}
