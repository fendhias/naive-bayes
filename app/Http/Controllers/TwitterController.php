<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\BrandRequest;
use DB;
use Session;
use Abraham\TwitterOAuth\TwitterOAuth;
use Storage;
use Validator;
use App\brand;

class TwitterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view ('content.beranda');
    }
    
    public function daftartweet()
    {
        return view ('content.daftar_tweet')->with('tweets',DB::table('tweets')->orderBy('date_tweet','DESC')->paginate(10))/*->with('tweets_training',$this->checkTweetTraining())*/;
    }

    public function unduh(Request $request)
    {
    	$post  = $request->only('_token');
        // $brand = $request->only('0','1','2','3');
        $brand = DB::table('brands')->select('username')->get();
        $brand = json_decode( json_encode($brand), true);
      
        // $date                = date('Y-m-d',strtotime($post['date']) + 86400);
        // $date                = date('Y-m-d',strtotime($post['date']));

        $consumer_key        = "JLOryjo5q7xQmwcqi8Cx4tS5S";
        $consumer_secret     = "uO9gEDteTKq745QaURt6c8BVexZVotNEj0mLvA1hHGsXPaqhDS";
        $access_token        = "326552398-3p45KU8dDCWlbStGYSCeRlsBFAUaiGY0Uzl3Zo22";
        $access_token_secret = "OOKwoM8vexCae5cvHKkf2TO16tG2VrbrXshXg6fsDfKf0";
        $twitter             = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);
        $twitter->setTimeouts(30, 6000);

        $keywords = $brand;
        
        foreach ($keywords as $value_keyword)
        {
            $tweets = $twitter->get("search/tweets", ["q" => $value_keyword,"count"=>200,"result_type"=>"recent"]);
            if(!empty($tweets->statuses))
            {
                foreach ($tweets->statuses as $tweet)
                {
                    $check_tweet = DB::table('tweets')->where('id_tweet' , $tweet->id_str)->count();
                    if($check_tweet == 0)
                    {

                        if($this->removeWord($tweet->text) != ''){   
                          DB::table('tweets')->insert(['id_tweet' => $tweet->id_str,'username' => $tweet->user->screen_name,'tweet' => $tweet->text,'date_tweet' => date('Y-m-d H:i:s',strtotime($tweet->created_at))]);
                        }
                    }
                }
            }
        }
        Session::flash('message','<div class="alert alert-success">
                                    Berhasil unduh
                                </div>');

        alert()->success('Data Twitter berhasil diunduh','Berhasil')->persistent('Lihat');
        return redirect('daftar_tweet')->with(compact('keywords'));
    }

    public function bersihkan()
    {
        $tweets = DB::table('tweets')->truncate();
        alert()->success('Data Twitter berhasil dibersihkan','Berhasil')->persistent('Oke');
        return redirect('daftar_tweet');
    }

    public function removeWord($tweet){
        $tweet_split = explode(' ',$tweet);
        $tweet_new = '';
        foreach ($tweet_split as $key => $value) {
          if((substr($value, 0,4) == 'http') || (substr($value, 0,1) == '@') || (substr($value, 0,1) == '#') || (substr($value, 0,8) == 'https://') || (substr($value, 0,2) == 'RT') || (substr($value, 0,8) == 'https://')){
            continue;
          }else{
            $tweet_new .= $value.' ';
          }
        }
        return rtrim($tweet_new);
    }
}
