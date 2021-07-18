<?php
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\CurlMultiHandler;
use Illuminate\Support\Facades\Auth;


use App\Models\AnalyticsVisitor;
use App\Models\AnalyticsPage;
use App\Models\Country;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Arr;

use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Illuminate\Support\Facades\Log;

if (! function_exists('customTanggal')) {
   function customTanggal($date,$date_format){
      return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);    
   }
}


//////////////////////////////////////////
// ######### Analytic visitor ########  //
//////////////////////////////////////////

if (!function_exists('SaveVisitorInfo')) {

    function SaveVisitorInfo($PageTitle = false)
    {

      //   if( Auth::user() ){
      //       return;
      //   }

        if(!$PageTitle){
           $PageTitle = URL::current();
        }

        $visitor_ip = $_SERVER['REMOTE_ADDR'];
    
    	try {
        	$reqUrl = $_SERVER[REQUEST_URI];
        } catch (Exception $e) {
        	$reqUrl = '';
        }
    
   		try {
        	$httphost = $_SERVER[HTTP_HOST];
        } catch (Exception $e) {
        	$httphost = env('APP_URL', 'Hello');
        }
    
        $current_page_full_link = "http://".$httphost.$reqUrl;
        $page_load_time = round((microtime(true) - LARAVEL_START), 8);

        // \Log::info('Log message', ['ip' => "http://ipinfo.io/{$visitor_ip}/json" ]);
        // \Log::info('Log message', ['auth' => @Auth::user() ]);
         // $url = "https://ipapi.co/{$visitor_ip}/json/";

        // Check is it already saved today to visitors?
        $SavedVisitor = AnalyticsVisitor::where('ip', '=', $visitor_ip)->where('date', '=', date('Y-m-d'))->first();
        // if (is_array($SavedVisitor) && count($SavedVisitor) == 0) {
        if ( !$SavedVisitor ) {
            // New to analyticsVisitors
            try {

                  $url = "http://ipinfo.io/{$visitor_ip}/json";
                // ### call CURL
                //  Initiate curl
                $ch = curl_init();
                // Will return the response, if false it print the response
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                // Set the url
                curl_setopt($ch, CURLOPT_URL,$url);
                // Execute
                $result=curl_exec($ch);
                // Closing
                curl_close($ch);
                // ### .end call CURL
                
                // $visitor_ip_details = json_decode(@file_get_contents("http://ipinfo.io/{$visitor_ip}/json"));
                $visitor_ip_details = json_decode($result, true) ;


                $visitor_city = @$visitor_ip_details['city'];
                if ($visitor_city == "") {
                    $visitor_city = "unknown";
                }
                $visitor_region = @$visitor_ip_details['region'];
                if ($visitor_region == "") {
                    $visitor_region = "unknown";
                }

                $visitor_country_code = @$visitor_ip_details['country'];
                if ($visitor_country_code == "") {
                    $visitor_country_code = "unknown";
                    $visitor_country = "unknown";
                } else {
                    $v_country = Country::where('code', '=', $visitor_country_code)->first();
                    $visitor_country = isset($v_country->title_en) ? $v_country->title_en : '';
                }

                $visitor_address = "$visitor_region, $visitor_city, $visitor_country";

                $visitor_loc = explode(',', @$visitor_ip_details['loc']);
                $visitor_loc_0 = @$visitor_loc[0];
                if ($visitor_loc_0 == "") {
                    $visitor_loc_0 = "unknown";
                }
                $visitor_loc_1 = @$visitor_loc[1];
                if ($visitor_loc_1 == "") {
                    $visitor_loc_1 = "unknown";
                }

                $visitor_org = @$visitor_ip_details['org'];
                if ($visitor_org == "") {
                    $visitor_org = "unknown";
                }

                $visitor_hostname = @$visitor_ip_details['hostname'];
                if ($visitor_hostname == "") {
                    $visitor_hostname = "No Hostname";
                }


            } catch (Exception $e) {
            Log::info($e);
                $visitor_city = "unknown";
                $visitor_region = "unknown";
                $visitor_country_code = "unknown";
                $visitor_country = "unknown";
                $visitor_loc_0 = "unknown";
                $visitor_loc_1 = "unknown";
                $visitor_org = "unknown";
                $visitor_hostname = "No Hostname";
                $visitor_address = "unknownssss";
            }

            $visitor_referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "unknown";
            $visitor_browser = getBrowser();
            $visitor_os = getOS();
            $visitor_screen_res = "unknown";

            // Start saving to database
            $Visitor = new AnalyticsVisitor;
            $Visitor->ip = $visitor_ip;
            $Visitor->city = $visitor_city;
            $Visitor->country_code = $visitor_country_code;
            $Visitor->country = $visitor_country;
            $Visitor->region = $visitor_region;
            $Visitor->full_address = $visitor_address;
            $Visitor->location_cor1 = $visitor_loc_0;
            $Visitor->location_cor2 = $visitor_loc_1;
            $Visitor->os = $visitor_os;
            $Visitor->browser = $visitor_browser;
            $Visitor->resolution = $visitor_screen_res;
            $Visitor->referrer = $visitor_referrer;
            $Visitor->hostname = $visitor_hostname;
            $Visitor->org = $visitor_org;
            $Visitor->date = date('Y-m-d');
            $Visitor->time = date('H:i:s');
            
            $user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? json_encode($_SERVER['HTTP_USER_AGENT']) : '-';
            $Visitor->userAgent = $user_agent;
            try {
                $Visitor->save();
            } catch (Exception $e) {
                
            }

            // Start saving page info to database
            $VisitedPage = new AnalyticsPage;
            $VisitedPage->visitor_id = $Visitor->id;
            $VisitedPage->ip = $visitor_ip;
            $VisitedPage->title = $PageTitle;
            $VisitedPage->name = @Auth::user()->id;
            $VisitedPage->query = $current_page_full_link;
            $VisitedPage->load_time = $page_load_time;
            $VisitedPage->date = date('Y-m-d');
            $VisitedPage->time = date('H:i:s');
            try {
                $VisitedPage->save();
            } catch (Exception $e) {
                
            }


        } else {
            // Already Saved to analyticsVisitors
            // Check if page saved
            $Savedpage = AnalyticsPage::where('visitor_id', '=', $SavedVisitor->id)->where('ip', '=',
                $visitor_ip)->where('date', '=', date('Y-m-d'))->where('query', '=', $current_page_full_link)->first();
            // if (count($Savedpage) == 0) {
            if ( !$Savedpage ) {
                $VisitedPage = new AnalyticsPage;
                $VisitedPage->visitor_id = $SavedVisitor->id;
                $VisitedPage->ip = $visitor_ip;
                $VisitedPage->title = $PageTitle;
                $VisitedPage->name =  @Auth::user()->id;
                $VisitedPage->query = $current_page_full_link;
                $VisitedPage->load_time = $page_load_time;
                $VisitedPage->date = date('Y-m-d');
                $VisitedPage->time = date('H:i:s');
                try {
                    $VisitedPage->save();
                } catch (Exception $e) {
                    
                }
            }

        }
    }
}

if (!function_exists('getOS')) {
     function getOS()
        {

            $user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '-';

            $os_platform = "unknown";

            $os_array = array(
                '/windows nt 10/i' => 'Windows 10',
                '/windows nt 6.3/i' => 'Windows 8.1',
                '/windows nt 6.2/i' => 'Windows 8',
                '/windows nt 6.1/i' => 'Windows 7',
                '/windows nt 6.0/i' => 'Windows Vista',
                '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
                '/windows nt 5.1/i' => 'Windows XP',
                '/windows xp/i' => 'Windows XP',
                '/windows nt 5.0/i' => 'Windows 2000',
                '/windows me/i' => 'Windows ME',
                '/win98/i' => 'Windows 98',
                '/win95/i' => 'Windows 95',
                '/win16/i' => 'Windows 3.11',
                '/macintosh|mac os x/i' => 'Mac OS X',
                '/mac_powerpc/i' => 'Mac OS 9',
                '/linux/i' => 'Linux',
                '/ubuntu/i' => 'Ubuntu',
                '/iphone/i' => 'iPhone',
                '/ipod/i' => 'iPod',
                '/ipad/i' => 'iPad',
                '/android/i' => 'Android',
                '/blackberry/i' => 'BlackBerry',
                '/webos/i' => 'Mobile'
            );

            foreach ($os_array as $regex => $value) {

                if (preg_match($regex, $user_agent)) {
                    $os_platform = $value;
                }

            }

            return $os_platform;

        }
}

if (!function_exists('getBrowser')) {

    function getBrowser()
        {
            try {
                $http_user_agent = $_SERVER['HTTP_USER_AGENT'];
            } catch (Exception $e) {
                return '-';
            }

            // check if IE 8 - 11+
            preg_match('/Trident\/(.*)/', $_SERVER['HTTP_USER_AGENT'], $matches);
            if ($matches) {
                $version = intval($matches[1]) + 4;     // Trident 4 for IE8, 5 for IE9, etc
                return 'Internet Explorer ' . ($version < 11 ? $version : $version);
            }

            preg_match('/MSIE (.*)/', $_SERVER['HTTP_USER_AGENT'], $matches);
            if ($matches) {
                return 'Internet Explorer ' . intval($matches[1]);
            }

            // check if Firefox, Opera, Chrome, Safari
            foreach (array('Firefox', 'OPR', 'Chrome', 'Safari') as $browser) {
                preg_match('/' . $browser . '/', $_SERVER['HTTP_USER_AGENT'], $matches);
                if ($matches) {
                    return str_replace('OPR', 'Opera',
                        $browser);   // we don't care about the version, because this is a modern browser that updates itself unlike IE
                }
            }
        }
}
// .end Analytic visitor ########  //


if (! function_exists('Closetags')) {
   Function Closetags($html) {
      $arr_single_tags = array('meta','img','br','link','area');
        preg_match_all('#<([a-z]+)(?: .*)?(?<![/|/ ])\s*>#iU', $html, $result);
        $openedtags = $result[1];
        preg_match_all('#</([a-z]+)>#iU', $html, $result);
        $closedtags = $result[1];
        $len_opened = count($openedtags);
        if (count($closedtags) == $len_opened){
            return $html;
        }
        $openedtags = array_reverse($openedtags);
        //re arrange open tags and closed tags for count 
        $aOpenedtagsCnt=Array();
        $aClosedtagsCnt=Array();
        if(is_array($openedtags)){
            foreach($openedtags as $iK =>$sTag){
                if(!isset($aOpenedtagsCnt[$sTag])){
                    $aOpenedtagsCnt[$sTag]=1;
                }else{
                    $aOpenedtagsCnt[$sTag]++;
                }
            }
        }
        if(is_array($closedtags)){
            foreach($closedtags as $iK =>$sTag){
                if(!isset($aClosedtagsCnt[$sTag])){
                    $aClosedtagsCnt[$sTag]=1;
                }else{
                    $aClosedtagsCnt[$sTag]++;
                }
            }
        }
        for ($i=0; $i < $len_opened; $i++){
            if (!in_array($openedtags[$i],$arr_single_tags)){
                if ($aOpenedtagsCnt[$openedtags[$i]]!=$aClosedtagsCnt[$openedtags[$i]]){
                    $html .= '</'.$openedtags[$i].'>';
                    if(!isset($aClosedtagsCnt[$openedtags[$i]])){
                        $aClosedtagsCnt[$openedtags[$i]]=1;
                    }else{
                        $aClosedtagsCnt[$openedtags[$i]]++;
                    }
                }
            }
        }
        return $html;
   }
}

if (! function_exists('actGuest')) {
   function actGuest($actAction  = '-'){
      try {
            $visitor_referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "unknown";

            if( Auth::check() ){
               $user = Auth::user()->id;
               $note = Auth::user()->name;
               // if( $user == 16){
               //    return true;
               // }
            } else {
               $user = '';
               $note = '';
            }
            $query = ( $_SERVER['QUERY_STRING'] ) ? '::'. json_encode($_SERVER['QUERY_STRING']) : '';

            $PageTitle = URL::current();
            $page_load_time = round((microtime(true) - LARAVEL_START), 8);
            $user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? json_encode($_SERVER['HTTP_USER_AGENT']) : '-';

            $act = \App\Models\GuestActivity::create([
               'guest_id' => (int) $user,
               'referrer' => $visitor_referrer,
               'desti' => $PageTitle,
               'time' => '',
               'action' => $actAction,
               'ip' => $_SERVER['REMOTE_ADDR'],
               'userAgent' => $user_agent,
               'no' => $page_load_time,
               'note' => $note . $query,
            ]);
      } catch (\Throwable $th) {
         //throw $th;
         \Log::info('Log actGuest', ['auth' => $th ]);
      }

   }
}

if (! function_exists('sendWa')) {
   function sendWa($KEY, $TO, $TEXT, $ID, $type )
   {

      $endpoint = "https://panel.rapiwha.com/send_message.php";

      $client = new \GuzzleHttp\Client();

      $response = $client->request('GET', $endpoint,
         [
            'query' => [
               'apikey' => $KEY,
               'number' => $TO,
               'text' => $TEXT,
            ]
         ]
      );

      $statusCode = $response->getStatusCode();
      $content = $response->getBody();
      
      $saveMsg = \App\Models\SendWa::create([
         'no' => $TO,
         'guest_id' => (int) $ID,
         'status' => $type,
         'text' => $TEXT,
         'resp' => $statusCode,
      ]);
      
      return [
         'statusCode' => $statusCode,
         'content' => $content,
      ];

   /*
      $curl = curl_init();

      curl_setopt_array($curl, array(
      CURLOPT_URL => "https://panel.rapiwha.com/send_message.php?apikey=MY_API_KEY&number=55555555555555&text=MyText",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
      echo "cURL Error #:" . $err;
      } else {
      echo $response;
      }
   */
   }
}
