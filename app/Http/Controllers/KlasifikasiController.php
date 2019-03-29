<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\lib\NBC;
use App\Http\Controllers\lib\FileDataSource;
use App\Http\Controllers\preprocessing\Preprocessing;  
use Storage;
use DB;
use App\brand;
use Session;

class KlasifikasiController extends Controller
{
	public function  __construct()
	{
		ini_set('max_execution_time', 3000);
	}

	public function analisis()
	{
		$brand = brand::get();
		return view('content.analisis',compact($brand,'brand'));
	}

	public function klas(Request $request)
    {
    	$brands = $request->all();
    	print_r($brands);
    	die();
    }

    public function klasifikasi(Request $request)
    {
    	$post = $request->all();
    	$brands = $request->only('brand1','brand2','brand3','brand4');
    	
    	$nbc = new NBC();
    	$nbc->train(new FileDataSource(storage_path('app\public\positif.txt')), 'positif');
		$nbc->train(new FileDataSource(storage_path('app\public\negatif.txt')), 'negatif');
		$nbc->train(new FileDataSource(storage_path('app\public\netral.txt')), 'netral');

		$start_time_tweet = date('1970-01-01' . ' 00:00:00', time());;
		$end_time_tweet = date('Y-m-d' . ' 23:59:59', time());;

		$tweets = DB::table('tweet_preprocessing')
						->join('tweets', 'tweets.id', '=', 'tweet_preprocessing.id_tweet')
						->whereBetween('date_tweet', [$start_time_tweet,$end_time_tweet])
						->select('tweet_preprocessing.*','tweets.date_tweet')
						->get();
		if(count($tweets) > 0)
		{
			$positif  = array();
			$negatif = array();
			$netral = array();
			$array_tweet = array();
			foreach ($tweets as $key => $value) {
				$classify =  $nbc->classify($value->preprocessing);
				if($classify=='positif'){
					$tweet = DB::table('tweets')->where('id',$value->id_tweet)->first();					
					$positif['positif'][] = $tweet->tweet;
				}
				else if($classify=='negatif'){
					$tweet = DB::table('tweets')->where('id',$value->id_tweet)->first();
					$negatif['negatif'][] = $tweet->tweet;
				}
				else{
					$tweet = DB::table('tweets')->where('id',$value->id_tweet)->first();
					$netral['netral'][] = $tweet->tweet;
				}
			}
			$array_tweet = array_merge($positif,$netral,$negatif);
			$p = array_key_exists('positif', $positif) ? (count($positif['positif'])) :  "0"; ;
			$ng = array_key_exists('negatif', $negatif) ? (count($negatif['negatif'])) :  "0";
			$nt = array_key_exists('netral', $netral) ? (count($netral['netral'])) :  "0";
			$analisis = array($p,$ng,$nt);

			$total = 0 ;
			foreach( $netral['netral'] as $value ) {
			    if( true == strpos($value, $brands['brand3']) ) {
			        // echo 'No:'. $value.'<br>';
			        $total ++;
			    }
			}
			        // echo "Brand :" .$brands['brand2'], " " , $total;

			$brand1positif = 0 ;
			foreach( $positif['positif'] as $value ) {
			    if( true == strpos($value, $brands['brand1']) ) {
			        $brand1positif ++;
			    }
			}

			$brand1netral = 0 ;
			foreach( $netral['netral'] as $value ) {
			    if( true == strpos($value, $brands['brand1']) ) {
			        $brand1netral ++;
			    }
			}

			$brand1negatif = 0 ;
			foreach( $negatif['negatif'] as $value ) {
			    if( true == strpos($value, $brands['brand1']) ) {
			        $brand1negatif ++;
			    }
			}

			$brand2positif = 0 ;
			foreach( $positif['positif'] as $value ) {
			    if( true == strpos($value, $brands['brand2']) ) {
			        $brand2positif ++;
			    }
			}

			$brand2netral = 0 ;
			foreach( $netral['netral'] as $value ) {
			    if( true == strpos($value, $brands['brand2']) ) {
			        $brand2netral ++;
			    }
			}

			$brand2negatif = 0 ;
			foreach( $negatif['negatif'] as $value ) {
			    if( true == strpos($value, $brands['brand2']) ) {
			        $brand2negatif ++;
			    }
			}

			$brand3positif = 0 ;
			foreach( $positif['positif'] as $value ) {
			    if( true == strpos($value, $brands['brand3']) ) {
			        $brand3positif ++;
			    }
			}

			$brand3netral = 0 ;
			foreach( $netral['netral'] as $value ) {
			    if( true == strpos($value, $brands['brand3']) ) {
			        $brand3netral ++;
			    }
			}

			$brand3negatif = 0 ;
			foreach( $negatif['negatif'] as $value ) {
			    if( true == strpos($value, $brands['brand3']) ) {
			        $brand3negatif ++;
			    }
			}

			$brand4positif = 0 ;
			foreach( $positif['positif'] as $value ) {
			    if( true == strpos($value, $brands['brand4']) ) {
			        $brand4positif ++;
			    }
			}

			$brand4netral = 0 ;
			foreach( $netral['netral'] as $value ) {
			    if( true == strpos($value, $brands['brand4']) ) {
			        $brand4netral ++;
			    }
			}

			$brand4negatif = 0 ;
			foreach( $negatif['negatif'] as $value ) {
			    if( true == strpos($value, $brands['brand4']) ) {
			        $brand4negatif ++;
			    }
			}

			$klasifikasibrand = array($brand1positif,$brand1netral,$brand1negatif,$brand2positif,$brand2netral,$brand2negatif,$brand3positif,$brand3netral,$brand3negatif,$brand4positif,$brand4netral,$brand4negatif);
			
			

			// $analisis = array(count($positif['positif']),count($negatif['negatif']),count($netral['netral']));
			Session::flash('message','<div class="alert alert-success">
	                                    Berhasil analisis
	                                </div>');
			return view('content.hasil')->with('tweets',$array_tweet)->with('brands',$brands)->with('klasifikasi',$klasifikasibrand);
		}
		else
		{
			Session::flash('message','<div class="alert alert-danger">
                                    Tidak ada tweet di tanggal '.$post['date'].'
                                </div>');
    		return redirect()->back();
		}
    }
}
