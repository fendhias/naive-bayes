<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\lib\NBC;
use App\Http\Controllers\lib\FileDataSource;
use App\Http\Controllers\preprocessing\Preprocessing;  
use Storage;
use DB;
use Session;

class PreprocessingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        ini_set('max_execution_time', 3000);
    }

    public function index()
    {   
        return view ('content.hasil_preprocessing')->with('tweets',DB::table('tweet_preprocessing')->paginate(10));
        
    }

    public function Preprocessing(Request $request)
    {
      $post = $request->all();
      $p = new Preprocessing();
      $from = date('1970-01-01' . ' 00:00:00', time());
      $to = date('Y-m-d' . ' 23:59:59', time());
    
      db::table('tweet_preprocessing')->delete();
      // $terms = $p->preprocesing($post['date_tweet'],$post['start_time_tweet'],$post['end_time_tweet']);
      //    $terms = $p->preprocesing(date('Y-m-d',strtotime($post['date'])),$post['start_time_tweet'],$post['end_time_tweet']);
      // $total_tweet    = DB::table('tweets')->where('date_tweet','LIKE',date('Y-m-d%',strtotime($post['date'])))->count();
      $terms = $p->preprocesing($from,$to);
      $total_tweet = DB::table('tweets')->whereBetween('date_tweet',[$from,$to])->count();

      if($total_tweet==0)
      {
        alert()->success('Data Twitter gagal diproses','Gagal')->persistent('Oke');
        return redirect()->back();
      }
      else
      {
        alert()->success('Data Twitter berhasil diproses','Berhasil')->persistent('Oke');
        return redirect('hasil_preprocessing');
      }
    }
}
