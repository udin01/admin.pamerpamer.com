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
// use App\Models\BeautyKlinik as Perumahan;
use App\Models\JobfairCompany as Perumahan;

use App\Models\JobfairJobs;
use App\Models\JobfairCompany;
use App\Models\JobfairJobsSave;
use App\Models\JobfairJobApply;
/*
use App\Models\BeautyProduct;
use App\Models\BeautyPromo;
*/


use App\Models\JobfairUser;
use App\Models\Categorie;

use App\Models\Event As expoEvent;
use App\Models\GuestActivity;
use App\Models\KontenHome;
use App\Models\MarketingShow;
use App\Models\Sponsor;
use App\Models\Comment;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;

use Auth;
use \Carbon\Carbon;
use App\Events\RealTimeMessage;


class HomeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private function thema(){
      // return 'ranon.';
      // return 'onefamily.';
      return 'la-kok-iso.';
    }

    /* ===============================  __construct ================== */
    /* =============================== ================== =============== */
    public function __construct(Request $request){
      $name_route = $request->route()->getName();
      // dump('$name_route');
      if(  $name_route == 'maintenance' ){
        
      }else if($name_route !== 'expoproperty_front.home' ){
        $ip = $request->ip();
        // "180.248.17.42"
        // if( $ip !== '180.248.17.42'){
        /*
          if( $ip !== '180.246.229.20'){
          return redirect('/maintenance')->send();
        }
        */

      }
    	SaveVisitorInfo();
    }

    
    /* ===============================  getMaintenance ================== */
    /* =============================== ================== =============== */
    public function getMaintenance(){
      $base = $this->base();
      $baseApp = $this->baseApp();
      return view( 'maintenance', compact( 'base', 'baseApp' ) );
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

    /* ===============================  getWelcome ================== */
    /* =============================== ================== =============== */
    public function getWelcome(Request $request){
      
      // if( Auth::check() ){
      //     return redirect()->route('expoproperty_front.home');
      // }

      $base = $this->base();
      $baseApp = $this->baseApp();
      $sponsor = Sponsor::where('status', 1)->whereNull('deleted_at')->get();

      return view( $this->thema() . 'welcome', compact( 'base', 'baseApp', 'sponsor') );
    }

    /* ===============================  getHome ================== */
    /* =============================== ================== =============== */
    public function getHome(Request $request){
      $base = $this->base();
      $baseApp = $this->baseApp();

      $vid = ( $request->vid ) ? false : true ;
      $base['vid'] = $vid;

      $dev = Developer::where('status', 1)->whereNull('deleted_at')->get();
      $perumahan = Perumahan::where('event_id', $baseApp['event_aktif'] )->where('status', 1)->whereNull('deleted_at')->orderBy('sort', 'asc')->get();
      $sponsor = Sponsor::where('status', 1)->whereNull('deleted_at')->get();
      $event = expoEvent::where('status', 1)->whereNull('deleted_at')->orderBy('start_event', 'desc')->get();
      $categorie = Categorie::where('status', 1)->whereNull('deleted_at')->get();

      return view( $this->thema() . 'home', compact( 'base', 'baseApp', 'dev', 'sponsor', 'perumahan', 'event', 'categorie') );
    }

    /* ===============================  getRegional ================== */
    /* =============================== ================== =============== */
    public function getRegional($slug = null, Request $request){
      $base = $this->base();
      $baseApp = $this->baseApp();
      $base['welcomeOff'] = true;
      $perumahan = [];
      // $perumahan = Perumahan::where('event_id', $baseApp['event_aktif'] )->where('status', 1)->whereNull('deleted_at')->orderBy('sort', 'asc')->get();
      
      $cat = Categorie::where('seo_url_slug_en', $slug)->where('status', 1)->whereNull('deleted_at')->first();
      
      if($slug){
        $title = 'Kategori : <b>'. $cat->name .'</b>';
        $product = \App\Models\JobfairJobs::where('status', 1)
        // where('categorie_id', $cat->id)
        ->where('categorie_id', 'LIKE', '%' . $cat->id . '%')
        ->whereNull('deleted_at')
        // ->where('event_id', $baseApp['event_aktif'] )
        // ->get();
        ->paginate(10);
      } else {
        $title = 'All Jobs';
        $product = \App\Models\JobfairJobs::where('status', 1)->whereNull('deleted_at')
        ->paginate(10);
        // ->get();
      }

      $vid = ( $request->vid ) ? false : true ;
      $base['vid'] = $vid;

      $perumahan_list = Perumahan::where('event_id', $baseApp['event_aktif'] )->where('status', 1)->whereNull('deleted_at')->orderBy('sort', 'asc')->orderBy('sort', 'asc')->get();

      $catProduct = Categorie::where('status', 1)->whereNull('deleted_at')->get();
      
      $vid = ( $request->vid ) ? false : true ;
      $base['vid'] = $vid;
      $sponsor = Sponsor::where('status', 1)->whereNull('deleted_at')->get();
      $event_list = expoEvent::where('status', 1)->whereNull('deleted_at')->orderBy('start_event', 'desc')->limit(5)->get();

      return view( $this->thema() . 'productKategori', compact( 'base', 'baseApp', 'sponsor', 'product', 'perumahan_list', 'event_list', 'catProduct', 'title', 'cat') );
    }

    /* ===============================  getDbToFile ================== */
    /* =============================== ================== =============== */
    public function getDbToFile(Request $request){
      if($request->id){
        $user = \App\Models\JobfairUser::find($request->id);
        dd($user);
        return false;
      } else if($request->mod){
         ini_set("memory_limit", "-1");
		set_time_limit(0);
      
      	$user = \App\Models\JobfairUser::whereNotNull('pasfoto')->where('desc', 'pindah_foto')->limit(500)->get();
      
      foreach ($user as $key_user => $val_user) {
      	$val_user->pasfoto = env('APP_URL').'/'.$val_user->pasfoto;
        $val_user->desc = '';
        $val_user->save();
      }
      echo "sip";
      echo count($user);
      return false;
      } else if($request->name){
        $user = \App\Models\JobfairUser::where('name', $request->name)->get();
        dd($user);
        return false;
      } else {
      	ini_set("memory_limit", "-1");
		set_time_limit(0);
      }
      $user = \App\Models\JobfairUser::whereNotNull('pasfoto')->whereNull('desc')->limit(500)->get();
      // $user = \App\Models\JobfairUser::whereNotNull('desc')->get();
      // $user = \App\Models\JobfairUser::find('4713');
      // dump($user->id);
      // dd($user);
      // $user = [ $user ];

      $folder = 'pasfoto/';
      foreach ($user as $key_user => $val_user) {
        // Storage::put(  'public/pasfoto-'.$val_user->id.'.jpg', $val_user->pasfoto);
        $base64_image = $val_user->pasfoto;
        @list($type, $file_data) = explode(';', $base64_image);
        @list(, $file_data) = explode(',', $file_data); 
        $imageName_pre = $folder.'pasfoto-'.$val_user->id.'.'.'png';
        $imageName = 'public/'.$imageName_pre;
        $val_user->pasfoto = env('APP_URL').'/'.$imageName_pre;
        $val_user->desc = 'pindah_foto';
        $val_user->save();
        Storage::disk('local')->put($imageName, base64_decode($file_data));
      }
      echo "sip";
      echo count($user);
      
    }

    /* ===============================  getLogin ================== */
    /* =============================== ================== =============== */
    public function getLogin(){

      if( Auth::check() ){
          return redirect()->route('expoproperty_front.home2');
      }

      $base = $this->base();
      $baseApp = $this->baseApp();
      $sponsor = Sponsor::where('status', 1)->whereNull('deleted_at')->get();
      

      // return view( $this->thema() . 'login', compact( 'base', 'baseApp', 'sponsor') );
      return view( $this->thema() . 'login2', compact( 'base', 'baseApp', 'sponsor') );
    }

    /* ===============================  getForgetPassword ================== */
    /* =============================== ================== =============== */
    public function getForgetPassword(){
       if( Auth::check() ){
          return redirect()->route('expoproperty_front.home2');
      }

      $base = $this->base();
      $baseApp = $this->baseApp();
      $sponsor = Sponsor::where('status', 1)->whereNull('deleted_at')->get();
      
      return view( $this->thema() . 'forgetPassword', compact( 'base', 'baseApp', 'sponsor') );
    }

    /* ===============================  getKonfirmasiResetPassword ================== */
    /* =============================== ================== =============== */
    public function getKonfirmasiResetPassword($kode){
      $user = \App\Models\JobfairUser::where('kode_konfirmasi', $kode)->first();

      if(!$user){
          Log::error('ForgetPassword '.$kode);
          return redirect()->route('expoproperty_front.login');;
      }
      // $user->kode_konfirmasi = '';
      // $user->save();

      $base = $this->base();
      $baseApp = $this->baseApp();
      $sponsor = Sponsor::where('status', 1)->whereNull('deleted_at')->get();
      
      return view( $this->thema() . 'konfirmasiNewPassword', compact( 'user', 'base', 'baseApp', 'sponsor') );
    }

    /* ===============================  getSignup ================== */
    /* =============================== ================== =============== */
    public function getSignup(){

      if( Auth::check() ){
          return redirect()->route('expoproperty_front.home2');
      }

      $base = $this->base();
      $baseApp = $this->baseApp();
      $sponsor = Sponsor::where('status', 1)->whereNull('deleted_at')->get();
      
      return view( $this->thema() . 'signup2', compact( 'base', 'baseApp', 'sponsor') );
    }


    /* ===============================  postUploadcv ================== */
    /* =============================== ================== =============== */
    public function postUploadcv(Request $request){
      if( !Auth::check() ){ 
        return redirect()->route('expoproperty_front.login')->withMsg('login first');
      }
      $file = $request->file('cv');

      try {
        $mimeType = $file->getMimeType();
       } catch (\Throwable $th) {
        // Log::debug( $th );
      	return redirect()->route('expoproperty_front.myAccount', ['act' => 'tabsResume'])->withMsg('type file bermasalah:: gunakan type file pdf untuk memudahkan perushaan memeriksa')->withType('error');
      }
    
      try {
        if($mimeType === "text/x-php"){
          return redirect()->route('expoproperty_front.myAccount', ['act' => 'tabsResume'])->withMsg('type file tidak diperkenenkan untuk diupload:: 1')->withType('error');
        } elseif($mimeType === "text/plain") {
          return redirect()->route('expoproperty_front.myAccount', ['act' => 'tabsResume'])->withMsg('type file tidak diperkenenkan untuk diupload:: 2')->withType('error');
        } else {
          $user = Auth::user();
          $stampTime = Carbon::now()->timestamp;
          $placeUpload = 'private';
          $nameFile = $stampTime.'-'.$file->getClientOriginalName();
          $nameFileOrigin = $file->getClientOriginalName();

          $file->move($placeUpload, $nameFile );
          $user->cv = $placeUpload.'/'.$nameFile;
          $user->cv_name_origin = $nameFileOrigin;
          $user->cv_ext = $file->getClientOriginalExtension();
          $user->cv_mimetype = $mimeType;
          $user->save();
          return redirect()->route('expoproperty_front.myAccount', ['act' => 'tabsResume'])->withMsg('success Upload Resume');
        }
      } catch (\Throwable $th) {
        Log::debug( $th );
        return redirect()->route('expoproperty_front.myAccount', ['act' => 'tabsResume'])->withMsg('sory, something error:: 3')->withType('error');
        
      }

      // application/vnd.openxmlformats-officedocument.wordprocessingml.document
      // mimeType: "text/php"
      // mimeType: "text/php"
    }

    /* ===============================  getViewFile ================== */
    /* =============================== ================== =============== */
    public function getViewFile($id, Request $request){
      if( !Auth::check() ){ 
        // return redirect()->route('expoproperty_front.login')->withMsg('login first');
        // return '';
      }
    
    if( Auth::check() ){ 
      $userId = Auth::user()->id;
      actGuest(' { "view-file": "file '.$userId.'"}' );
    }

      $fileTarget = JobfairUser::where('uuid', $id)->first();

      if(!$fileTarget){
          // return redirect()->back()->withMsg('sory, file not found')->withType('error');
          return 'file not found';
      } else {

        try {
          // $file = Storage::disk('public')->get( $fileTarget->cv );
          $file = File::get(public_path( $fileTarget->cv ));
        } catch (\Throwable $th) {
          Log::debug( $th );
          // return redirect()->back()->withMsg('sory, file not found')->withType('error');
        	// dump($th);
          return '';
        }

        try {
          $response = Response::make($file, 200);
          $response->header('Content-Type', $fileTarget->cv_mimetype);
          return $response;
        } catch (\Throwable $th) {
          Log::debug( $th );
        // dump($th);
          return '';
        }

        // return $file;
      }
    }

    /* ===============================  postAkun ================== */
    /* =============================== ================== =============== */
    public function postAkun(Request $request){
      if( !Auth::check() ){ 
        return redirect()->route('expoproperty_front.login')->withMsg('login first');
      }
      $user = Auth::user();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->dob = $request->dob;
      $user->kota_asal = $request->kota_asal;
      $user->alamat = $request->alamat;
      $user->status_nikah = $request->status_nikah;
      $user->gender = $request->gender;
      $user->berat = $request->berat;
      $user->tinggi = $request->tinggi;
      $user->id_kualifikasi = $request->id_kualifikasi;
      $user->thn_masuk = $request->thn_masuk;
      $user->thn_lulus = $request->thn_lulus;
      $user->institusi = $request->institusi;
      $user->institusi_lain = $request->institusi_lain;
      
      
      $user->prodi = $request->prodi;
      $user->jurusan = $request->jurusan;
      $user->jurusan_lain = $request->jurusan_lain;
      $user->ipk = $request->ipk;
      $user->toefl = $request->toefl;
      $user->toeic = $request->toeic;


      /* ========================= Save foto to storage ======================== */
      // $user->pasfoto = $request->pasfoto;
      $folder = 'pasfoto/';
      // Storage::put(  'public/pasfoto-'.$val_user->id.'.jpg', $val_user->pasfoto);
      $base64_image = $request->pasfoto;
      @list($type, $file_data) = explode(';', $base64_image);
      @list(, $file_data) = explode(',', $file_data); 
      $imageName_pre = $folder.'pasfoto-'.$user->id.'.'.'png';
      $imageName = 'public/'.$imageName_pre;
      $user->pasfoto = env('APP_URL').'/'.$imageName_pre;
      $user->desc = 'pindah_foto';
      Storage::disk('local')->put($imageName, base64_decode($file_data));
      /* ======================== ./Save foto to storage ======================= */



      $user->pengalaman_kerja = json_encode($request->pengalaman);
      $user->pengalaman_organisasi = json_encode($request->org);
      $user->save();

      return redirect()->back()->withMsg('success save account');
    }


    /* ===============================  getAkunku ================== */
    /* =============================== ================== =============== */
    public function getAkunku($act = ''){

      if( !Auth::check() ){
          return redirect()->route('expoproperty_front.home2');
      }

      // $user = JobfairUser::where('id', '1')->whereNull('deleted_at')->get();
      $user = Auth::user();

      $base = $this->base();
      $baseApp = $this->baseApp();
      $sponsor = Sponsor::where('status', 1)->whereNull('deleted_at')->get();


      $option = [
        'statusNikah' => [
          'Nikah' => 'Menikah',
          'Belum Nikah' => 'Single'
        ],
        'jurusan' => [
          'S1 ILMU HUKUM' => 'S1 ILMU HUKUM',
          'S1 EKONOMI PEMBANGUNAN' => 'S1 EKONOMI PEMBANGUNAN',
          'S1 EKONOMI ISLAM' => 'S1 EKONOMI ISLAM',
          'S1 MANAJEMEN' => 'S1 MANAJEMEN',
          'S1 KEUANGAN & PERBANKAN' => 'S1 KEUANGAN & PERBANKAN',
          'S1 KEWIRAUSAHAAN' => 'S1 KEWIRAUSAHAAN',
          'S1 AKUNTANSI' => 'S1 AKUNTANSI',
          'S1 ILMU ADMINISTRASI PUBLIK' => 'S1 ILMU ADMINISTRASI PUBLIK',
          'S1 ILMU ADMINISTRASI BISNIS' => 'S1 ILMU ADMINISTRASI BISNIS',
          'S1 ADM. PERPAJAKAN' => 'S1 ADM. PERPAJAKAN',
          'S1 ADM. PENDIDIKAN' => 'S1 ADM. PENDIDIKAN',
          'S1 ILMU PERPUSTAKAAN' => 'S1 ILMU PERPUSTAKAAN',
          'S1 PARIWISATA' => 'S1 PARIWISATA',
          'S1 AGROEKOTEKNOLOGI' => 'S1 AGROEKOTEKNOLOGI',
          'S1 AGRIBISNIS' => 'S1 AGRIBISNIS',
          'S1 PETERNAKAN' => 'S1 PETERNAKAN',
          'S1 TEKNIK SIPIL' => 'S1 TEKNIK SIPIL',
          'S1 TEKNIK INDUSTRI' => 'S1 TEKNIK INDUSTRI',
          'S1 TEKNIK ELEKTRO' => 'S1 TEKNIK ELEKTRO',
          'S1 ARSITEKTUR' => 'S1 ARSITEKTUR',
          'S1 TEKNIK PENGAIRAN' => 'S1 TEKNIK PENGAIRAN',
          'S1 TEKNIK PERENCANAAN WILAYAH & KOTA' => 'S1 TEKNIK PERENCANAAN WILAYAH & KOTA',
          'S1 TEKNIK MESIN' => 'S1 TEKNIK MESIN',
          'S1 TEKNIK KIMIA' => 'S1 TEKNIK KIMIA',
          'S1 PENDIDIKAN DOKTER' => 'S1 PENDIDIKAN DOKTER',
          'S1 ILMU KEPERAWATAN' => 'S1 ILMU KEPERAWATAN',
          'S1 ILMU GIZI' => 'S1 ILMU GIZI',
          'S1 KEBIDANAN' => 'S1 KEBIDANAN',
          'S1 FARMASI' => 'S1 FARMASI',
          'S1 PENDIDIKAN DOKTER GIGI' => 'S1 PENDIDIKAN DOKTER GIGI',
          'S1 MANAJEMEN SD PERAIRAN' => 'S1 MANAJEMEN SD PERAIRAN',
          'S1 BUDIDAYA PERAIRAN' => 'S1 BUDIDAYA PERAIRAN',
          'S1 TEKNOLOGI HASIL PERIKANAN' => 'S1 TEKNOLOGI HASIL PERIKANAN',
          'S1 PEMANFAATAN SD PERIKANAN' => 'S1 PEMANFAATAN SD PERIKANAN',
          'S1 ILMU KELAUTAN' => 'S1 ILMU KELAUTAN',
          'S1 AGROBISNIS PERIKANAN' => 'S1 AGROBISNIS PERIKANAN',
          'S1 BIOLOGI' => 'S1 BIOLOGI',
          'S1 FISIKA' => 'S1 FISIKA',
          'S1 KIMIA' => 'S1 KIMIA',
          'S1 MATEMATIKA' => 'S1 MATEMATIKA',
          'S1 STATISTIKA' => 'S1 STATISTIKA',
          'S1 TEKNIK GEOFISIKA' => 'S1 TEKNIK GEOFISIKA',
          'S1 INSTRUMENTASI' => 'S1 INSTRUMENTASI',
          'S1 ILMU & TEKNOLOGI PANGAN / THP' => 'S1 ILMU & TEKNOLOGI PANGAN / THP',
          'S1 KETEKNIKAN PERTANIAN' => 'S1 KETEKNIKAN PERTANIAN',
          'S1 TIP' => 'S1 TIP',
          'S1 BIOTEKNOLOGI' => 'S1 BIOTEKNOLOGI',
          'S1 TEKNIK LINGKUNGAN' => 'S1 TEKNIK LINGKUNGAN',
          'S1 TEKNIK BIOPROSES' => 'S1 TEKNIK BIOPROSES',
          'S1 SOSIOLOGI' => 'S1 SOSIOLOGI',
          'S1 ILMU KOMUNIKASI' => 'S1 ILMU KOMUNIKASI',
          'S1 PSIKOLOGI' => 'S1 PSIKOLOGI',
          'S1 ILMU POLITIK' => 'S1 ILMU POLITIK',
          'S1 HUBUNGAN INTERNASIONAL' => 'S1 HUBUNGAN INTERNASIONAL',
          'S1 ILMU PEMERINTAHAN' => 'S1 ILMU PEMERINTAHAN',
          'S1 SASTRA INGGRIS' => 'S1 SASTRA INGGRIS',
          'S1 SASTRA JEPANG' => 'S1 SASTRA JEPANG',
          'S1 SASTRA PRANCIS' => 'S1 SASTRA PRANCIS',
          'S1 SASTRA CINA' => 'S1 SASTRA CINA',
          'S1 PEND. BAHASA INDONESIA' => 'S1 PEND. BAHASA INDONESIA',
          'S1 PEND. BAHASA INGGRIS' => 'S1 PEND. BAHASA INGGRIS',
          'S1 PEND. BAHASA JEPANG' => 'S1 PEND. BAHASA JEPANG',
          'S1 SENI RUPA MURNI' => 'S1 SENI RUPA MURNI',
          'S1 ANTROPOLOGI' => 'S1 ANTROPOLOGI',
          'S1 PEND. DOKTER HEWAN' => 'S1 PEND. DOKTER HEWAN',
          'S1 TEKNIK INFORMATIKA' => 'S1 TEKNIK INFORMATIKA',
          'S1 SISTEM INFORMASI' => 'S1 SISTEM INFORMASI',
          'S1 PEND. TEKNOLOGI INFORMASI' => 'S1 PEND. TEKNOLOGI INFORMASI',
          'S1 TEKNOLOGI INFORMASI' => 'S1 TEKNOLOGI INFORMASI',
          'S1 TEKNIK KOMPUTER' => 'S1 TEKNIK KOMPUTER',
          'D3 KESEKRETARIATAN' => 'D3 KESEKRETARIATAN',
          'D3 KEUANGAN & PERBANKAN' => 'D3 KEUANGAN & PERBANKAN',
          'D3 MANAJEMEN INFORMATIKA' => 'D3 MANAJEMEN INFORMATIKA',
          'D3 PARIWISATA' => 'D3 PARIWISATA',
          'S2 ILMU HUKUM' => 'S2 ILMU HUKUM',
          'S2 ILMU KENOTARIATAN' => 'S2 ILMU KENOTARIATAN',
          'S2 ILMU EKONOMI' => 'S2 ILMU EKONOMI',
          'S2 ILMU MANAJEMEN' => 'S2 ILMU MANAJEMEN',
          'S2 ILMU AKUNTANSI' => 'S2 ILMU AKUNTANSI',
          'S2 ILMU ADM BISNIS' => 'S2 ILMU ADM BISNIS',
          'S2 ILMU ADM PUBLIK' => 'S2 ILMU ADM PUBLIK',
          'S2 MANAJEMEN PENDIDIKAN TINGGI' => 'S2 MANAJEMEN PENDIDIKAN TINGGI',
          'S2 ILMU TANAMAN' => 'S2 ILMU TANAMAN',
          'S2 PENGELOLAAN TANAH DAN AIR' => 'S2 PENGELOLAAN TANAH DAN AIR',
          'S2 AGRIBISNIS' => 'S2 AGRIBISNIS',
          'S2 EKONOMI PERTANIAN' => 'S2 EKONOMI PERTANIAN',
          'S2 ILMU TERNAK' => 'S2 ILMU TERNAK',
          'S2 MAGISTER ARSITEKTUR LINGKUNGAN BINAAN' => 'S2 MAGISTER ARSITEKTUR LINGKUNGAN BINAAN',
          'S2 MAGISTER TEKNIK ELEKTRO' => 'S2 MAGISTER TEKNIK ELEKTRO',
          'S2 MAGISTER TEKNIK MESIN' => 'S2 MAGISTER TEKNIK MESIN',
          'S2 MAGISTER TEKNIK PENGAIRAN' => 'S2 MAGISTER TEKNIK PENGAIRAN',
          'S2 MAGISTER TEKNIK SIPIL' => 'S2 MAGISTER TEKNIK SIPIL',
          'S2 MAGISTER PERENCANAAN WILAYAH DAN KOTA' => 'S2 MAGISTER PERENCANAAN WILAYAH DAN KOTA',
          'S2 ILMU BIOMEDIS' => 'S2 ILMU BIOMEDIS',
          'S2 KEPERAWATAN' => 'S2 KEPERAWATAN',
          'S2 MANAJEMEN RUMAH SAKIT' => 'S2 MANAJEMEN RUMAH SAKIT',
          'S2 KEBIDANAN' => 'S2 KEBIDANAN',
          'S2 BUDIDAYA PERAIRAN' => 'S2 BUDIDAYA PERAIRAN',
          'S2 ILMU BIOLOGI' => 'S2 ILMU BIOLOGI',
          'S2 ILMU KIMIA' => 'S2 ILMU KIMIA',
          'S2 ILMU MATEMATIKA' => 'S2 ILMU MATEMATIKA',
          'S2 ILMU FISIKA' => 'S2 ILMU FISIKA',
          'S2 ILMU STATISTIKA' => 'S2 ILMU STATISTIKA',
          'S2 TEKNOLOGI INDUSTRI PERTANIAN' => 'S2 TEKNOLOGI INDUSTRI PERTANIAN',
          'S2 TEKNOLOGI HASIL PERTANIAN' => 'S2 TEKNOLOGI HASIL PERTANIAN',
          'S2 KETEKNIKAN PERTANIAN' => 'S2 KETEKNIKAN PERTANIAN',
          'S2 ILMU KOMUNIKASI' => 'S2 ILMU KOMUNIKASI',
          'S2 ILMU SOSIAL' => 'S2 ILMU SOSIAL',
          'S2 ILMU LINGUISTIK' => 'S2 ILMU LINGUISTIK',
          'S2 ILMU KOMPUTER/ INFORMATIKA' => 'S2 ILMU KOMPUTER/ INFORMATIKA',
          'S2 PENGELOLAAN LINGKUNGAN' => 'S2 PENGELOLAAN LINGKUNGAN',
          'S2 KAJIAN PEREMPUAN' => 'S2 KAJIAN PEREMPUAN',
          'S2 KETAHANAN NASIONAL' => 'S2 KETAHANAN NASIONAL',
          'lain-lain' => 'Lain - Lain',
        ],
        'gender' => [
          'L' => 'Laki-laki',
          'P' => 'Perempuan',
        ],
        'kualifikasi' => [
          'S1' => 'S1',
          'S2' => 'S2',
          'S3' => 'S3',
          'D3' => 'D3',
          'D4' => 'D4',
          'D1' => 'D1',
          'SMA' => 'SMA',
          'SMK' => 'SMK',
          'SMP' => 'SMP',
        ]
      ];

      $jobSave = JobfairJobsSave::where('jobfair_user_id', $user->id)->get();
      $jobApply = JobfairJobApply::where('jobfair_user_id', $user->id)->get();
      
      return view( $this->thema() . 'user-profile', compact( 'jobSave', 'jobApply', 'user', 'base', 'baseApp', 'sponsor', 'option', 'act') );
    }

    /* ===============================  showFormRegister ================== */
    /* =============================== ================== =============== */
    public function showFormRegister(Type $var = null){
      
      if( Auth::check() ){
          return redirect()->route('expoproperty_front.home');
      }

      $base = $this->base();
      $baseApp = $this->baseApp();
      $sponsor = Sponsor::where('status', 1)->whereNull('deleted_at')->get();

      return view( $this->thema() . 'register', compact( 'base', 'baseApp', 'sponsor') );
    }

    /* ===============================  getSlugDev ================== */
    /* =============================== ================== =============== */
    public function getSlugDev($dev, $id){
      return redirect()->route('expoproperty_front.dev', ['id' => $id]);
    }

    /* ===============================  getDev ================== */
    /* =============================== ================== =============== */
    public function getDev( $id = null, Request $request) {
      $base = $this->base();
      $baseApp = $this->baseApp();
      $perumahan = Perumahan::where('event_id', $baseApp['event_aktif'] )->where('uuid', $id)->where('status', 1)->whereNull('deleted_at')->first();
      $perumahan_list = Perumahan::where('event_id', $baseApp['event_aktif'] )->where('status', 1)->whereNull('deleted_at')->orderBy('sort', 'asc')->orderBy('sort', 'asc')->get();
      
      if( !$perumahan ){
        return view( $this->thema() . 'notFound', compact( 'base', 'baseApp') );
      }
      
      $vid = ( $request->vid ) ? false : true ;
      $base['vid'] = $vid;
      $sponsor = Sponsor::where('status', 1)->whereNull('deleted_at')->get();
      $event_list = expoEvent::where('status', 1)->whereNull('deleted_at')->orderBy('start_event', 'desc')->limit(5)->get();

      return view( $this->thema() . 'detail', compact( 'base', 'baseApp', 'sponsor', 'perumahan', 'perumahan_list', 'event_list') );
    }

    /* ===============================  getProduct ================== */
    /* =============================== ================== =============== */
    public function getProduct( $id = null, Request $request) {
      $base = $this->base();
      $baseApp = $this->baseApp();
      
      $productDetail = JobfairJobs::where('uuid', $id)->where('status', 1)->whereNull('deleted_at')->first();
    
      if( !$productDetail ){
        return view( $this->thema() . 'notFound', compact( 'base', 'baseApp') );
      }

      $btnSaveJob = true;
      $btnApplyJob = true;
      if( Auth::check() ){ 
        $btnSaveJob = JobfairJobsSave::where('jobfair_jobs_id', $productDetail->id)->where('jobfair_user_id', Auth::user()->id)->first();
        $btnSaveJob = ($btnSaveJob) ? false : true;
        $btnApplyJob = JobfairJobApply::where('jobfair_jobs_id', $productDetail->id)->where('jobfair_user_id', Auth::user()->id)->first();
        $btnApplyJob = ($btnApplyJob) ? false : true;
      }

      $perumahan_list = Perumahan::where('event_id', $baseApp['event_aktif'] )->where('status', 1)->whereNull('deleted_at')->orderBy('sort', 'asc')->orderBy('sort', 'asc')->get();

      
      

      $catProduct = Categorie::where('status', 1)->whereNull('deleted_at')->get();
      
      $vid = ( $request->vid ) ? false : true ;
      $base['vid'] = $vid;
      $sponsor = Sponsor::where('status', 1)->whereNull('deleted_at')->get();
      $event_list = expoEvent::where('status', 1)->whereNull('deleted_at')->orderBy('start_event', 'desc')->limit(5)->get();

      return view( $this->thema() . 'product', compact( 'base', 'baseApp', 'sponsor', 'productDetail', 'perumahan_list', 'event_list', 'catProduct', 'btnSaveJob', 'btnApplyJob') );
    }

    /* ===============================  getKategoriProduct ================== */
    /* =============================== ================== =============== */
    public function getKategoriProduct($id = '', Request $request){
      $base = $this->base();
      $baseApp = $this->baseApp();
      
      if( $id ){
        $cat = Categorie::where('uuid', $id)->where('status', 1)->whereNull('deleted_at')->first();
        $product = ($cat->allProduct == '') ? [] : $cat->allProduct;
        $title = 'Kategori : '.$cat->name;
      } else {
        $title = 'All Product ';
        $cat = Categorie::getModel();
        $product = JobfairJobs::where('status', 1)->whereNull('deleted_at')->get();
      }
      
      
      // if( !$productDetail ){
      //   return view( $this->thema() . 'notFound', compact( 'base', 'baseApp') );
      // }
      
      $perumahan_list = Perumahan::where('event_id', $baseApp['event_aktif'] )->where('status', 1)->whereNull('deleted_at')->orderBy('sort', 'asc')->orderBy('sort', 'asc')->get();

      $catProduct = Categorie::where('status', 1)->whereNull('deleted_at')->get();
      
      $vid = ( $request->vid ) ? false : true ;
      $base['vid'] = $vid;
      $sponsor = Sponsor::where('status', 1)->whereNull('deleted_at')->get();
      $event_list = expoEvent::where('status', 1)->whereNull('deleted_at')->orderBy('start_event', 'desc')->limit(5)->get();

      return view( $this->thema() . 'productKategori', compact( 'base', 'baseApp', 'sponsor', 'product', 'perumahan_list', 'event_list', 'catProduct', 'title', 'cat') );
    } 

    /* ===============================  getSearchProduct ================== */
    /* =============================== ================== =============== */
    public function getSearchProduct($s = '', Request $request){

      $base = $this->base();
      $baseApp = $this->baseApp();
     
      if( !$s ){
        $s = $request->s;
      }

      $cat = Categorie::getModel();
      $title = 'Search : '.$s;

      if( $s ){
        $product = \App\Models\JobfairJobs::where('status', 1)->whereNull('deleted_at')
                  ->where('name', 'LIKE', '%' . $s . '%')
                  ->orwhere('desc', 'LIKE', '%' . $s . '%')
                  ->with('categorie')
                  ->paginate(10);
                  // ->get();
      } else {
        $product = \App\Models\JobfairJobs::where('status', 1)->whereNull('deleted_at')
        ->paginate(10);
        // ->get();
      }
      
      
      // if( !$productDetail ){
      //   return view( $this->thema() . 'notFound', compact( 'base', 'baseApp') );
      // }
      
      $perumahan_list = Perumahan::where('event_id', $baseApp['event_aktif'] )->where('status', 1)->whereNull('deleted_at')->orderBy('sort', 'asc')->orderBy('sort', 'asc')->get();

      $catProduct = Categorie::where('status', 1)->whereNull('deleted_at')->get();
      
      $vid = ( $request->vid ) ? false : true ;
      $base['vid'] = $vid;
      $sponsor = Sponsor::where('status', 1)->whereNull('deleted_at')->get();
      $event_list = expoEvent::where('status', 1)->whereNull('deleted_at')->orderBy('start_event', 'desc')->limit(5)->get();

      return view( $this->thema() . 'productKategori', compact( 'base', 'baseApp', 'sponsor', 'product', 'perumahan_list', 'event_list', 'catProduct', 'title', 'cat') );

    }

    /* ===============================  postApplyJob ================== */
    /* =============================== ================== =============== */
    public function postApplyJob($id = null, Request $request){
      if( !Auth::check() ){ 
        return redirect()->route('expoproperty_front.login')->withMsg('login first');
      }

      if(!$id){ 
        return redirect()->back()->withMsg('id null')->withType('error');
      }

      $job = JobfairJobs::where('uuid', $id)->first();
      if(!$job){ 
        return redirect()->back()->withMsg('sory, something is wrong when you input')->withType('error');
      }

      
      $idUser = Auth::user()->id;
      $jobApply = JobfairJobApply::where('jobfair_jobs_id', $job->id)->where('jobfair_user_id', $idUser)->first();
      if($jobApply){ 
        return redirect()->back()->withMsg('sory, job vacancies have been appaly')->withType('warning');
      } else {
        $jobApply = JobfairJobApply::getModel();
      }

      $jobApply->jobfair_jobs_id = $job->id;
      $jobApply->jobfair_user_id = $idUser;
      $jobApply->surat_lamaran = $request->pitch;
      $jobApply->event_id = env('EVENT_ID');
      $jobApply->save();

      return redirect()->back()->withMsg('success save job');
    }
    /* ===============================  postApplyJobDelete ================== */
    /* =============================== ================== =============== */
    public function postApplyJobDelete($id = null, Request $request){
      if( !Auth::check() ){ 
        return redirect()->route('expoproperty_front.login')->withMsg('login first');
      }

      if(!$id){ 
        return redirect()->back()->withMsg('id null')->withType('error');
      }
      
      
      $idUser = Auth::user()->id;
      $jobApply = JobfairJobApply::where('uuid', $id)->where('jobfair_user_id', $idUser)->first();
      if(!$jobApply){ 
        return redirect()->back()->withMsg('sory, something is wrong when you input')->withType('error');
      } else {
        $jobApply->delete();
      }

      return redirect()->back()->withMsg('success Cancel job');
    }

    /* ===============================  postSaveJob ================== */
    /* =============================== ================== =============== */
    public function postSaveJob($id = null, Request $request){
      if( !Auth::check() ){ 
        return redirect()->route('expoproperty_front.login')->withMsg('login first');
      }

      if(!$id){ 
        return redirect()->back()->withMsg('id null')->withType('error');
      }

      $job = JobfairJobs::where('uuid', $id)->first();
      if(!$job){ 
        return redirect()->back()->withMsg('sory, something is wrong when you input')->withType('error');
      }

      
      $idUser = Auth::user()->id;
      $jobSave = JobfairJobsSave::where('jobfair_jobs_id', $job->id)->where('jobfair_user_id', $idUser)->first();
      if($jobSave){ 
        return redirect()->back()->withMsg('sory, job vacancies have been saved')->withType('warning');
      } else {
        $jobSave = JobfairJobsSave::getModel();
      }

      $jobSave->jobfair_jobs_id = $job->id;
      $jobSave->jobfair_user_id = $idUser;
      $jobSave->event_id = env('EVENT_ID');
      $jobSave->save();

      return redirect()->back()->withMsg('success save job');
    }
    /* ===============================  postSaveJobDelete ================== */
    /* =============================== ================== =============== */
    public function postSaveJobDelete($id = null, Request $request){
      if( !Auth::check() ){ 
        return redirect()->route('expoproperty_front.login')->withMsg('login first');
      }

      if(!$id){ 
        return redirect()->back()->withMsg('id null')->withType('error');
      }
      
      
      $idUser = Auth::user()->id;
      $jobSave = JobfairJobsSave::where('uuid', $id)->where('jobfair_user_id', $idUser)->first();
      if(!$jobSave){ 
        return redirect()->back()->withMsg('sory, something is wrong when you input')->withType('error');
      } else {
        $jobSave->delete();
      }

      return redirect()->back()->withMsg('success delete job');
    }

    /* ===============================  getMyAccount ================== */
    /* =============================== ================== =============== */
    public function getMyAccount(Request $request)
    {
      $base = $this->base();
      $baseApp = $this->baseApp();

      $account = Auth::user();
      
      $perumahan_list = Perumahan::where('event_id', $baseApp['event_aktif'] )->where('status', 1)->whereNull('deleted_at')->orderBy('sort', 'asc')->get();
      
      $vid = ( $request->vid ) ? false : true ; 
      $base['vid'] = $vid;
      $sponsor = Sponsor::where('status', 1)->whereNull('deleted_at')->get();

      return view( $this->thema() . 'my-account', compact( 'base', 'baseApp', 'account', 'sponsor', 'perumahan_list') );
    }

    /* ===============================  getEvent ================== */
    /* =============================== ================== =============== */
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

      $perumahan_list = Perumahan::where('event_id', $baseApp['event_aktif'] )->where('status', 1)->whereNull('deleted_at')->orderBy('sort', 'asc')->orderBy('sort', 'asc')->get();

      $catProduct = Categorie::where('status', 1)->whereNull('deleted_at')->get();
      
      $vid = ( $request->vid ) ? false : true ;
      $base['vid'] = $vid;
      $sponsor = Sponsor::where('status', 1)->whereNull('deleted_at')->get();

      return view( $this->thema() . 'event', compact('event', 'base', 'baseApp', 'sponsor', 'perumahan_list', 'event_list', 'catProduct', 'title', 'desc') );
    }

    /* ===============================  getKlaimPromo ================== */
    /* =============================== ================== =============== */
    public function getKlaimPromo(Request $request){
      $base = $this->base();
      $baseApp = $this->baseApp();

      $account = Auth::user();

      $promo = BeautyPromo::where('status', 1)->whereNull('deleted_at')->orderBy('updated_at', 'desc')->get();
      
      $title = 'Promo';
      $desc = false;
      $event_list = expoEvent::where('status', 1)->whereNull('deleted_at')->orderBy('start_event', 'desc')->limit(5)->get();

      $perumahan_list = Perumahan::where('event_id', $baseApp['event_aktif'] )->where('status', 1)->whereNull('deleted_at')->orderBy('sort', 'asc')->orderBy('sort', 'asc')->get();

      $catProduct = JobfairJobs::where('status', 1)->whereNull('deleted_at')->get();
      
      $vid = ( $request->vid ) ? false : true ;
      $base['vid'] = $vid;
      $sponsor = Sponsor::where('status', 1)->whereNull('deleted_at')->get();

      return view( $this->thema() . 'klaimPromo', compact('promo', 'base', 'baseApp', 'sponsor', 'perumahan_list', 'event_list', 'catProduct', 'title', 'desc') );
    }

    /* ===============================  gooAnalytic ================== */
    /* =============================== ================== =============== */
    public function gooAnalytic(Request $request)
    {
      actGuest( json_encode($request->all()) );
      return true;
    }
    
    /* ===============================  sendComment ================== */
    /* =============================== ================== =============== */
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

    /* ===============================  getDownloadBrowsur ================== */
    /* =============================== ================== =============== */
    public function getDownloadBrowsur( $id, Request $request) {
      $perumahan = Perumahan::where('event_id', $baseApp['event_aktif'] )->where('uuid', $id)->where('status', 1)->whereNull('deleted_at')->first();
      
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

    /* ===============================  getViewBrowsur ================== */
    /* =============================== ================== =============== */
    public function getViewBrowsur($id, Request $request){
      $perumahan = Perumahan::where('event_id', $baseApp['event_aktif'] )->where('uuid', $id)->where('status', 1)->whereNull('deleted_at')->first();
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
    /* ===============================  webhook ================== */
    /* =============================== ================== =============== */
    public function webhook(){
      return true;
    }

}
