<?php

namespace App\Http\Controllers\ApiV1;

use App\Http\Controllers\Controller;
use Validator;

class WebsiteController extends Controller
{
    public function __check(){
        $valid = Validator::make(request()->all(), [
            'url'=>'required',
        ]);
        if($valid->errors()->messages()!=null){
            return response()->json(['error'=>'URL is required.'],200);
        }
        $ping = $this->isSiteAvailable(request('url'));
        if($ping['status']==1) {
            return response()->json(['status'=>true,'datetime'=>date(' H:i:s d.m.Y')],200);
        }else{
            return response()->json(['status'=>false,'datetime'=>date(' H:i:s d.m.Y')],200);
        }
    }
}
