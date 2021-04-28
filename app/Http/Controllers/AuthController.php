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
// use App\Models\User;
use App\Models\Guest As User;

use App\Models\Event As expoEvent;
use App\Models\GuestActivity;
use App\Models\KontenHome;
use App\Models\MarketingShow;
use App\Models\Sponsor;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

 
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;


 
class AuthController extends BaseController
{
 
    private function event(){
      return env('EVENT_ID', 1);
    }

    public function login(Request $request)
    {
        $rules = [
            'wa'                 => 'required|string',
            'otp'              => 'required|string'
        ];
 
        $messages = [
            'wa.required'        => 'No WhatsApps wajib diisi',
            'wa.string'           => 'No WhatsApps tidak valid',
            'otp.required'     => 'OTP wajib diisi',
            'otp.string'       => 'OTP harus berupa string'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $noWA =  str_replace(" ","", $request->wa );
        $noWA =  (int) $noWA;
        
        $checkKodeTelp = substr( $noWA,0, 2);
        if($checkKodeTelp !== '62' ){
            $noWA = '62'.$noWA;
        }

        try {
            $user = User::where('wa', $noWA )
                ->where('otp', $request->input('otp'))
                ->first();
        } catch (\Throwable $th) {
            actGuest(' Try Login ');
            Session::flash('error', 'ada yang salah dengan inputan anda');
            return redirect()->route('login');
        }

        if(!$user){
            actGuest( $request->input('otp') . ' :: ' . $noWA);
            Session::flash('error', 'No WA atau OTP salah');
            return redirect()->route('login');
        } else {
            Auth::login($user);
            $user->status = 1;
            $user->save();
            
            actGuest('Login');
            return redirect()->route('expoproperty_front.home');
        }
 
    }
 
    public function register(Request $request)
    {
        $rules = [
            'name'                  => 'required',
            'wa'                 => 'required',
        ];
 
        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'wa.required'        => 'No whatsApp wajib diisi'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        
        $noWA =  str_replace(" ","", $request->wa );
        $noWA =  (int) $noWA ;

        $checkKodeTelp = substr( $noWA,0, 2);
        if($checkKodeTelp !== '62' ){
            $noWA = '62'.$noWA;
        }

        try {
            $user = User::where('wa', $noWA )->first();
        } catch (\Throwable $th) {
            Session::flash('error', 'ada yang salah dengan inputan anda');
            return redirect()->route('login');
        }
        if($user){
            Session::flash('error', 'No WA Sudah Terdaftar');
            return redirect()->route('login');
        } 

        
        $otp = rand(100000,999999);

        $text = "JANGAN BERITAHU KODE RAHASIA KE SIAPA PUN termasuk pihak Pamerpamer[dot]com . Kode Rahasia untuk login ke akun pamerpamer[dot]com kamu: ".$otp.".";
        

        // if( $resp['statusCode'] !== 200 ){
        //     Session::flash('error', 'ada yang salah dengan inputan anda');
        //     return redirect()->route('login');
        // }
        
        try {
            // $otp = Str::random(6);

            $user = new User;
            $user->name = ucwords(strtolower($request->name));
            // $user->wa = strtolower($request->wa);
            $user->wa = $noWA ;
            $user->otp = $otp;
            $user->status = 0;
            $user->password = Hash::make( 'password' );
            $simpan = $user->save();

            $resp = sendWa( env('KEY_WHT'), $noWA, $text, $user->id, 'Send OTP');
            

        } catch (\Throwable $th) {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
            
        }
 
        $simpan = true;
 
        if($simpan){
            Session::flash('success', "Register berhasil! \n Silahkan login dengan kode OTP yang sudah dikirim ke no whatsapp anda, \n jika belum terkirim tunggu sekitar 1 menit");
            return redirect()->route('login');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }

    public function postSignup(Request $request){
        // dd($request->all());
        $telp =  str_replace(" ","", $request->telp );
        $telp =  (int) $telp ;

        try {
            // $otp = Str::random(6);

            $username = Str::snake( ucwords(strtolower($request->name)) );

            $user = \App\Models\JobfairUser::where('email', $request->email)->orWhere('username', $username)->first();

            if($user){
                return response()->json(['response' => 'error','errorMessage'=> 'User Exist' ]);
            }

            
            $user = new \App\Models\JobfairUser;
            $user->name = ucwords(strtolower($request->name));
            $user->username =  $username ;
            // $user->wa = strtolower($request->wa);
            $user->telp = $telp ;
            $user->email = $request->email;
            $user->uuid = (string) Str::uuid();
            $user->status = 0;
            $user->event_id = $this->event();
            $user->password = Hash::make( $request->password );
            $simpan = $user->save();

            // $resp = sendWa( env('KEY_WHT'), $noWA, $text, $user->id, 'Send OTP');
            
            return response()->json(['response' => 'success']);
            
        } catch (\Throwable $th) {
        	actGuest(' { "daftar salah": "'. json_encode($request->all()).'"}' );
            Log::error($th);
            return response()->json(['response' => 'error', 'errorMessage'=> 'Maaf terjadi Kesalahan dalam system']);
        }

        // -------------------
        /*
        	$arrResult = array ('response'=>'success');

            } catch (Exception $e) {
                $arrResult = array ('response'=>'error','errorMessage'=>$e->errorMessage());
            } catch (\Exception $e) {
                $arrResult = array ('response'=>'error', 'errorMessage'=>$e->getMessage());
            }
        */
        // ./-------------------
    }

    public function postLogin(Request $request){
        
        if( !$request->email || !$request->password ){
        	actGuest(' { "upaya masuk": "'. json_encode($request->all()).'"}' );
            // return response()->json(['response' => 'error', 'errorMessage'=> 'Email dan password Kosong' ]);
            return redirect()->back()->with(['msg' => 'Email dan password Kosong']);
        }


        $user = \App\Models\JobfairUser::where('email', $request->email)->first();

        if(!$user){
        	actGuest(' { "upaya masuk": "'. json_encode($request->all()).'"}' );
            // return response()->json(['response' => 'error', 'errorMessage'=> 'User Belum Terdaftar']);
            return redirect()->back()->with(['msg' => 'User Belum Terdaftar']);
        }

        if ( !Hash::check( $request->password, $user->password )) {
        	actGuest(' { "upaya masuk": "'. json_encode($request->all()).'"}' );
            // return response()->json(['response' => 'error', 'errorMessage'=> 'Password salah']);
            return redirect()->back()->with(['msg' => 'Password salah']);
        }
        
        Auth::login($user);
        // $user->status = 1;
        // $user->save();

        // dd(Auth::check());
            
        // actGuest('Login');
        return redirect()->route('expoproperty_front.home2');
        // return response()->json(['response' => 'success']);

    }

    public function waKamu(Request $request){
        if(!$request->noWa){
            return true;
        }
        $noWA =  str_replace(" ","", $request->noWa );
        $noWA =  (int) $noWA ;
        $checkKodeTelp = substr( $noWA,0, 2);
        if($checkKodeTelp !== '62' ){
            $noWA = '62'.$noWA;
        }

        try {
            $user = User::where('wa', $noWA )
                ->first();
        } catch (\Throwable $th) {
            return true;
        }
        if(!$user){
            // return  $noWA;
            if($request->nama){
                // Send OTP
                try {
                    $otp = rand(100000,999999);

                    $text = "JANGAN BERITAHU KODE RAHASIA KE SIAPA PUN . Kode Rahasia untuk login ke akun kamu: ".$otp.".";
                    $user = new User;
                    $user->name = ucwords(strtolower($request->nama));
                    // $user->wa = strtolower($request->wa);
                    $user->wa = $noWA ;
                    $user->otp = $otp;
                    $user->status = 0;
                    $user->password = Hash::make( 'password' );
                    $simpan = $user->save();

                    $resp = sendWa( env('KEY_WHT'), $noWA, $text, $user->id, 'Send OTP');
                    return true;
                } catch (\Throwable $th) {
                    Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
                    return redirect()->route('register');
                    return true;
                }
                // ./Send OTP
            } else {
                return  'reg';
            }
        } else {
            if($user){
                if($user->status == 1){
                    Auth::login($user);
                    actGuest('Login');
                    return 'login_success';
                }
            }
            return true;
        }

    }
    public function getOTPlagi(Request $request){
        if(!$request->noWa){
            return 'fail';
        }
        $noWA =  str_replace(" ","", $request->noWa );
        $noWA =  (int) $noWA ;
        $checkKodeTelp = substr( $noWA,0, 2);
        if($checkKodeTelp !== '62' ){
            $noWA = '62'.$noWA;
        }

        try {
            $user = User::where('wa', $noWA )
                ->first();
        } catch (\Throwable $th) {
            return 'fail';
        }
        if($user){
            // ==============
            $otp = rand(100000,999999);

            $text = "JANGAN BERITAHU KODE RAHASIA KE SIAPA PUN. Kode Rahasia untuk login ke akun kamu: ".$otp.".";
            $user->otp = $otp;
            $user->save();
            
            try {
                $resp = sendWa( env('KEY_WHT'), $noWA, $text, $user->id, 'Send OTP');
                return  'mohon tunggu pesan WhatsApp dari kami,';
            } catch (\Throwable $th) {
                return  'fail';
            }
            // ./==============
        } else {
            return 'Nomer Belum terdaftar';
        }

    }
 
    public function logout()
    {
        // actGuest('Logout');
        Auth::logout(); // menghapus session yang aktif
        // return redirect()->route('login');
        return redirect()->route('expoproperty_front.home2');
    }
 
 
}
