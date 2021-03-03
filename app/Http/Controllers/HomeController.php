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

// use App\Models\Perumahan;
use App\Models\BeautyKlinik as Perumahan;
use App\Models\BeautyProduct;
use App\Models\BeautyCategoriProduct;
use App\Models\BeautyPromo;

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


class HomeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private function thema(){
      // return 'ranon.';
      return 'onefamily.';
    }

    private function base( $saveActifity = true ){
      $FrontSetting = FrontSetting::all()->pluck('value', 'key');
      $base = [];
      $base['thema_lock'] = $this->thema();
      $base['vid'] = true;
      foreach ($FrontSetting as $kFrontSetting => $vFrontSetting) {
            // session()->flash('base.'.$kFrontSetting, $vFrontSetting);
            // session(['base.'.$kFrontSetting => $vFrontSetting]);
            $base[$kFrontSetting] = $vFrontSetting;
      }
      
      if( $saveActifity ){
        actGuest(' Activity ');
      }
      return $base;
    }

    private function baseApp(){
      $KontenHome = KontenHome::all()->pluck('value', 'key');
      $baseApp = [];
      foreach ($KontenHome as $kKontenHome => $vKontenHome) {
         // session()->flash('base.'.$kKontenHome, $vKontenHome);
         // session(['base.'.$kKontenHome => $vKontenHome]);
         $baseApp[$kKontenHome] = $vKontenHome;
      }
      return $baseApp;
    }

    public function getWelcome(Request $request){
      
      // if( Auth::check() ){
      //     return redirect()->route('expoproperty_front.home');
      // }

      $base = $this->base();
      $baseApp = $this->baseApp();
      $sponsor = Sponsor::where('status', 1)->whereNull('deleted_at')->get();

      return view( $this->thema() . 'welcome', compact( 'base', 'baseApp', 'sponsor') );
    }

    public function getHome(Request $request){
      $base = $this->base();
      $baseApp = $this->baseApp();

      $vid = ( $request->vid ) ? false : true ;
      $base['vid'] = $vid;

      $dev = Developer::where('status', 1)->whereNull('deleted_at')->get();
      $perumahan = Perumahan::where('status', 1)->whereNull('deleted_at')->orderBy('sort', 'asc')->get();
      $sponsor = Sponsor::where('status', 1)->whereNull('deleted_at')->get();
      $event = expoEvent::where('status', 1)->whereNull('deleted_at')->orderBy('start_event', 'desc')->get();
      $categorie = Categorie::where('status', 1)->whereNull('deleted_at')->get();

      return view( $this->thema() . 'home', compact( 'base', 'baseApp', 'dev', 'sponsor', 'perumahan', 'event', 'categorie') );
    }

    public function getRegional($slug, Request $request){
      $base = $this->base();
      $baseApp = $this->baseApp();
      $base['welcomeOff'] = true;
      $perumahan = [];
      // $perumahan = Perumahan::where('status', 1)->whereNull('deleted_at')->orderBy('sort', 'asc')->get();
      
      $cat = Categorie::where('seo_url_slug_en', $slug)->where('status', 1)->whereNull('deleted_at')->first();

      if($cat){
        $base['regional'] = $cat;

        // dd( $cat->id );
        try {
          // $perumahan = Perumahan::whereJsonContains('categorie_id', [$cat->id] )
          //     ->where('status', 1)->whereNull('deleted_at')->orderBy('sort', 'asc')->get();
          $perumahan = Perumahan::where('categorie_id', 'like', '%"'.$cat->id.'"%')
              ->where('status', 1)->whereNull('deleted_at')->orderBy('sort', 'asc')->get();

        } catch (\Throwable $th) {
          // dd($th);
          $perumahan = [];
        }
      }

      $vid = ( $request->vid ) ? false : true ;
      $base['vid'] = $vid;


      $dev = Developer::where('status', 1)->whereNull('deleted_at')->get();
      
      $sponsor = Sponsor::where('status', 1)->whereNull('deleted_at')->get();
      $event = expoEvent::where('status', 1)->whereNull('deleted_at')->orderBy('start_event', 'desc')->get();
      $categorie = Categorie::where('status', 1)->whereNull('deleted_at')->get();

      return view( $this->thema() . 'home', compact( 'base', 'baseApp', 'dev', 'sponsor', 'perumahan', 'event', 'categorie') );
    }

    public function getLogin(){

      if( Auth::check() ){
          return redirect()->route('expoproperty_front.home');
      }

      $base = $this->base();
      $baseApp = $this->baseApp();
      $sponsor = Sponsor::where('status', 1)->whereNull('deleted_at')->get();
      

      // return view( $this->thema() . 'login', compact( 'base', 'baseApp', 'sponsor') );
      return view( $this->thema() . 'welcome', compact( 'base', 'baseApp', 'sponsor') );
    }

    public function showFormRegister(Type $var = null){
      
      if( Auth::check() ){
          return redirect()->route('expoproperty_front.home');
      }

      $base = $this->base();
      $baseApp = $this->baseApp();
      $sponsor = Sponsor::where('status', 1)->whereNull('deleted_at')->get();

      return view( $this->thema() . 'register', compact( 'base', 'baseApp', 'sponsor') );
    }

    public function getSlugDev($dev, $id){
      return redirect()->route('expoproperty_front.dev', ['id' => $id]);
    }

    public function getDev( $id, Request $request) {
      $base = $this->base();
      $baseApp = $this->baseApp();
      $perumahan = Perumahan::where('uuid', $id)->where('status', 1)->whereNull('deleted_at')->first();
      $perumahan_list = Perumahan::where('status', 1)->whereNull('deleted_at')->orderBy('sort', 'asc')->orderBy('sort', 'asc')->get();
      
      if( !$perumahan ){
        return view( $this->thema() . 'notFound', compact( 'base', 'baseApp') );
      }
      
      $vid = ( $request->vid ) ? false : true ;
      $base['vid'] = $vid;
      $sponsor = Sponsor::where('status', 1)->whereNull('deleted_at')->get();
      $event_list = expoEvent::where('status', 1)->whereNull('deleted_at')->orderBy('start_event', 'desc')->limit(5)->get();

      return view( $this->thema() . 'detail', compact( 'base', 'baseApp', 'sponsor', 'perumahan', 'perumahan_list', 'event_list') );
    }

    public function getProduct( $id, Request $request) {
      $base = $this->base();
      $baseApp = $this->baseApp();
      
      $productDetail = BeautyProduct::where('uuid', $id)->where('status', 1)->whereNull('deleted_at')->first();

      $perumahan_list = Perumahan::where('status', 1)->whereNull('deleted_at')->orderBy('sort', 'asc')->orderBy('sort', 'asc')->get();

      
      if( !$productDetail ){
        return view( $this->thema() . 'notFound', compact( 'base', 'baseApp') );
      }

      $catProduct = BeautyCategoriProduct::where('status', 1)->whereNull('deleted_at')->get();
      
      $vid = ( $request->vid ) ? false : true ;
      $base['vid'] = $vid;
      $sponsor = Sponsor::where('status', 1)->whereNull('deleted_at')->get();
      $event_list = expoEvent::where('status', 1)->whereNull('deleted_at')->orderBy('start_event', 'desc')->limit(5)->get();

      return view( $this->thema() . 'product', compact( 'base', 'baseApp', 'sponsor', 'productDetail', 'perumahan_list', 'event_list', 'catProduct') );
    }

    public function getKategoriProduct($id = '', Request $request){
      $base = $this->base();
      $baseApp = $this->baseApp();
      
      if( $id ){
        $cat = BeautyCategoriProduct::where('uuid', $id)->where('status', 1)->whereNull('deleted_at')->first();
        $product = ($cat->allProduct == '') ? [] : $cat->allProduct;
        $title = 'Kategori : '.$cat->name;
      } else {
        $title = 'All Product ';
        $cat = BeautyCategoriProduct::getModel();
        $product = BeautyProduct::where('status', 1)->whereNull('deleted_at')->get();
      }
      
      
      // if( !$productDetail ){
      //   return view( $this->thema() . 'notFound', compact( 'base', 'baseApp') );
      // }
      
      $perumahan_list = Perumahan::where('status', 1)->whereNull('deleted_at')->orderBy('sort', 'asc')->orderBy('sort', 'asc')->get();

      $catProduct = BeautyCategoriProduct::where('status', 1)->whereNull('deleted_at')->get();
      
      $vid = ( $request->vid ) ? false : true ;
      $base['vid'] = $vid;
      $sponsor = Sponsor::where('status', 1)->whereNull('deleted_at')->get();
      $event_list = expoEvent::where('status', 1)->whereNull('deleted_at')->orderBy('start_event', 'desc')->limit(5)->get();

      return view( $this->thema() . 'productKategori', compact( 'base', 'baseApp', 'sponsor', 'product', 'perumahan_list', 'event_list', 'catProduct', 'title', 'cat') );
    } 

    public function getSearchProduct($s = '', Request $request){

      $base = $this->base();
      $baseApp = $this->baseApp();
     
      if( !$s ){
        $s = $request->s;
      }

      $cat = BeautyCategoriProduct::getModel();
      $title = 'Search : '.$s;

      if( $s ){
        $product = BeautyProduct::where('status', 1)->whereNull('deleted_at')
                  ->where('name', 'LIKE', '%' . $s . '%')
                  ->orwhere('desc', 'LIKE', '%' . $s . '%')
                  ->get();
      } else {
        $product = BeautyProduct::where('status', 1)->whereNull('deleted_at')->get();
      }
      
      
      // if( !$productDetail ){
      //   return view( $this->thema() . 'notFound', compact( 'base', 'baseApp') );
      // }
      
      $perumahan_list = Perumahan::where('status', 1)->whereNull('deleted_at')->orderBy('sort', 'asc')->orderBy('sort', 'asc')->get();

      $catProduct = BeautyCategoriProduct::where('status', 1)->whereNull('deleted_at')->get();
      
      $vid = ( $request->vid ) ? false : true ;
      $base['vid'] = $vid;
      $sponsor = Sponsor::where('status', 1)->whereNull('deleted_at')->get();
      $event_list = expoEvent::where('status', 1)->whereNull('deleted_at')->orderBy('start_event', 'desc')->limit(5)->get();

      return view( $this->thema() . 'productKategori', compact( 'base', 'baseApp', 'sponsor', 'product', 'perumahan_list', 'event_list', 'catProduct', 'title', 'cat') );

    }

    public function getMyAccount(Request $request)
    {
      $base = $this->base();
      $baseApp = $this->baseApp();

      $account = Auth::user();
      
      $perumahan_list = Perumahan::where('status', 1)->whereNull('deleted_at')->orderBy('sort', 'asc')->get();
      
      $vid = ( $request->vid ) ? false : true ; 
      $base['vid'] = $vid;
      $sponsor = Sponsor::where('status', 1)->whereNull('deleted_at')->get();

      return view( $this->thema() . 'my-account', compact( 'base', 'baseApp', 'account', 'sponsor', 'perumahan_list') );
    }

    public function getEvent( $id = '', Request $request) {
      $base = $this->base();
      $baseApp = $this->baseApp();

      $account = Auth::user();
      if( $id ){
        $event = expoEvent::where('uuid', $id)->where('status', 1)->whereNull('deleted_at')->first();
        try {
          $title = $event->name;
          $desc = $event->tema;
        } catch (\Throwable $th) {
          return view( $this->thema() . 'notFound', compact( 'base', 'baseApp') );
        }
        $event = [$event];
        $event_list = expoEvent::where('status', 1)->whereNull('deleted_at')->orderBy('start_event', 'desc')->limit(5)->get();
      } else {
        $event = expoEvent::where('status', 1)->whereNull('deleted_at')->orderBy('start_event', 'desc')->get();
        $title = 'All Event';
        $desc = false;
        $event_list = expoEvent::where('status', 1)->whereNull('deleted_at')->orderBy('start_event', 'desc')->limit(5)->get();
      }

      $perumahan_list = Perumahan::where('status', 1)->whereNull('deleted_at')->orderBy('sort', 'asc')->orderBy('sort', 'asc')->get();

      $catProduct = BeautyCategoriProduct::where('status', 1)->whereNull('deleted_at')->get();
      
      $vid = ( $request->vid ) ? false : true ;
      $base['vid'] = $vid;
      $sponsor = Sponsor::where('status', 1)->whereNull('deleted_at')->get();

      return view( $this->thema() . 'event', compact('event', 'base', 'baseApp', 'sponsor', 'perumahan_list', 'event_list', 'catProduct', 'title', 'desc') );
    }

    public function getKlaimPromo(Request $request){
      $base = $this->base();
      $baseApp = $this->baseApp();

      $account = Auth::user();

      $promo = BeautyPromo::where('status', 1)->whereNull('deleted_at')->orderBy('updated_at', 'desc')->get();
      
      $title = 'Promo';
      $desc = false;
      $event_list = expoEvent::where('status', 1)->whereNull('deleted_at')->orderBy('start_event', 'desc')->limit(5)->get();

      $perumahan_list = Perumahan::where('status', 1)->whereNull('deleted_at')->orderBy('sort', 'asc')->orderBy('sort', 'asc')->get();

      $catProduct = BeautyCategoriProduct::where('status', 1)->whereNull('deleted_at')->get();
      
      $vid = ( $request->vid ) ? false : true ;
      $base['vid'] = $vid;
      $sponsor = Sponsor::where('status', 1)->whereNull('deleted_at')->get();

      return view( $this->thema() . 'klaimPromo', compact('promo', 'base', 'baseApp', 'sponsor', 'perumahan_list', 'event_list', 'catProduct', 'title', 'desc') );
    }

    public function gooAnalytic(Request $request)
    {
      actGuest( json_encode($request->all()) );
      return true;
    }
    
    public function sendComment(Request $request)
    {
      if( !Auth::check() && !$request->uuid){
        return false;
      }
      $user = Auth::user();
      $event = expoEvent::where('uuid', $request->uuid )->where('status', 1)->whereNull('deleted_at')->first();

      if( !$event){
        return false;
      }

      $act = \App\Models\Comment::create([
            'msg' => $request->msg,
            'event_id' => $event->id,
            'user_by' => $user->id,
      ]);
      $msgV = [
        'msg' => $request->msg,
        'user' => $user->name,
        'type' => $user->id,
        'time' => Carbon::now()->toString()
      ];
      event(new RealTimeMessage($msgV, $request->uuid));

      return $msgV;

    }

    public function getDownloadBrowsur( $id, Request $request) {
      $perumahan = Perumahan::where('uuid', $id)->where('status', 1)->whereNull('deleted_at')->first();
      
        if( !$perumahan ){
          $base = $this->base();
          $baseApp = $this->baseApp();
          return view( $this->thema() . 'notFound', compact( 'base', 'baseApp') );
        } else {
          actGuest(' { "download": "browsur '.$perumahan->name.'"}' );

          $fileName =  str_replace( "uploads/pdf/", "", $perumahan->brosur );
            return response()->streamDownload(function () use($fileName, $perumahan) {
                echo file_get_contents(   env('URL_ENDPOINT').'/'.$perumahan->brosur );
            }, $fileName);
        }
    }

    public function getViewBrowsur($id, Request $request){
      $perumahan = Perumahan::where('uuid', $id)->where('status', 1)->whereNull('deleted_at')->first();
      $base = $this->base( false );
      actGuest(' { "view-browsur": "browsur '.$perumahan->name.'"}' );
      $baseApp = $this->baseApp();

      if( !$perumahan ){
          return view( $this->thema() . 'notFound', compact( 'base', 'baseApp') );
        } else {

          $fileName =  str_replace( "uploads/pdf/", "", $perumahan->brosur );

          // $file = Http::get( env('URL_ENDPOINT').'/'.$perumahan->brosur );
          // $file = $file->body();
          
          $file = env('URL_ENDPOINT').'/'.$perumahan->brosur;
          return view( $this->thema() . 'viewFile', compact( 'base', 'baseApp', 'file') );
        }
    }
    public function webhook(){
      return true;
    }

}
