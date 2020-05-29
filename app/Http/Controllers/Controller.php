<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use JJG\Ping;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function pingMango(){
        $url = 'mangosoft.mk';
        //$url = 'tippito.com';
        dd($this->ping($url));
    }
    public function traceroute($url){
        $response = file_get_contents("http://tracert.mangosoft.mk?url=".$url);
        return $response;
    }
    public function isSiteAvailable($url){

        // Initialize cURL
        $curlInit = curl_init($url);

        // Set options
        curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
        curl_setopt($curlInit,CURLOPT_HEADER,true);
        curl_setopt($curlInit,CURLOPT_NOBODY,true);
        curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);

        // Get response
        $response = curl_exec($curlInit);

        // Close a cURL session
        curl_close($curlInit);

        if($response == false){
            $data['status'] = 2;
            $data['avg'] = -1;
        }

        if($response != false){
            $data['status'] = 1;
            $data['avg'] = (int)0;//str_replace('ms','',$avg);
        }
        $data['url']=$url;
        return $data;
    }
    public function ping($url){
        //$status = null;
        //$output = null;
        //exec("ipconfig /flushdns");
        //exec("ping -n 3 $url", $output,$status);
        $ping = new Ping($url);
        $status = $ping->ping();
        $data['status'] = 2;
        if($status == false){
            $data['status'] = 2;
            $data['avg'] = -1;
        }
        if($status != false){
//            $avg = explode(',',$output[9]);
//            $avg = explode(' = ',$avg[2]);
//            $avg = $avg[1];
            $data['status'] = 1;
            $data['avg'] = (int)$status;//str_replace('ms','',$avg);
        }
        $data['url']=$url;
        return $data;

    }
}
