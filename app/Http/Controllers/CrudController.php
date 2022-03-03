<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class CrudController extends Controller
{
    public function getOffers(){
        return Offer::select('id','name')->get();
    }
}
