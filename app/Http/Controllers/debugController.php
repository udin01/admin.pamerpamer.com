<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\Developer;
use App\Models\FrontSetting;
use App\Models\Guest;
use App\Models\Marketing;
use App\Models\Perumahan;
use App\Models\User;
use App\Models\Categorie;

use App\Models\Event As expoEvent;
use App\Models\GuestActivity;
use App\Models\KontenHome;
use App\Models\MarketingShow;
use App\Models\Sponsor;
use App\Models\Comment;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

use Auth;
use \Carbon\Carbon;
use App\Events\RealTimeMessage;


class debugController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function getdebugJson($slug= null){
       if(!$slug){
          return response()->json(['name' => 'Abigail', 'state' => 'CA']);
       }

       $ert = "\\App\\Models\\".$slug;

       try {
         //  $ert = $ert::all();
          $ert = $ert::limit(10)->offset(0)->get();
       } catch (\Throwable $th) {
          return response()->json($th);
       }
       return response()->json($ert);

    }

}
