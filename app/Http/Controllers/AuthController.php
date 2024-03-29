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
 
 
class AuthController extends BaseController
{
 
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

                    $text = "JANGAN BERITAHU KODE RAHASIA KE SIAPA PUN termasuk pihak Pamerpamer[dot]com . Kode Rahasia untuk login ke akun pamerpamer[dot]com kamu: ".$otp.".";
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

            $text = "JANGAN BERITAHU KODE RAHASIA KE SIAPA PUN termasuk pihak Pamerpamer[dot]com . Kode Rahasia untuk login ke akun pamerpamer[dot]com kamu: ".$otp.".";
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
        actGuest('Logout');
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }
 
 
}
