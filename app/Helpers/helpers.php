<?php
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\CurlMultiHandler;
use Illuminate\Support\Facades\Auth;

if (! function_exists('customTanggal')) {
   function customTanggal($date,$date_format){
      return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);    
   }
}



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
