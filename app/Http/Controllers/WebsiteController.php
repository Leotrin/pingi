<?php

namespace App\Http\Controllers;

use App\Models\Checker;
use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function __index(){
        return view('websites');
    }
    public function __search(){
        request()->validate([
            'search'=>['required']
        ]);
        $s = request('search');
        $result = Website::where('user_id',auth()->user()->id)->where('url','like',$s.'%')->get();
        return view('websites',compact('result','s'));
    }
    public function __history($id){
        $history = Checker::where('website_id',$id)->latest()->paginate(50);
        return view('websites',compact('history'));
    }
    public function __store(){
        request()->validate([
            'url'=>['required'],
            'refresh'=>['required']
        ]);
        $url = request('url');
        $refresh = request('refresh');

        if(request('id')!=null){
            $website = Website::where('user_id',auth()->user()->id)->where('id',request('id'))->where('status','>=',0)->first();
        }else{
            //tkontrollohet vec kur o ncreate        Ctrl+X after reading
            $website = Website::where('user_id',auth()->user()->id)->where('url',$url)->where('status','>=',0)->first();
            if($website!=null ){
                return redirect()->back()->with('error','Website already registered!');
            }
            $website                = new Website();
        }
        $website->user_id       = auth()->user()->id;
        $website->url           = $url;
        $website->refresh_rate  = $refresh;
        $website->save();

        return redirect()->back()->with('success','Website saved successfully!');

    }
    public function __destroy(){
        $website = Website::where('user_id',auth()->user()->id)->where('id',request('id'))->where('status','>=',0)->first();
        if($website==null){
            return redirect()->back()->with('error','You dont have permission to access this website information!');
        }
        $website->status = -1;
        $website->save();
        return redirect()->back()->with('success','Website removed successfully!');
    }

    public function __pause(){
        $website = Website::where('user_id',auth()->user()->id)->where('id',request('id'))->where('status','>=',0)->first();
        if($website==null){
            return redirect()->back()->with('error','You dont have permission to access this website information!');
        }
        $website->status = 3;
        $website->save();
        return redirect()->back()->with('success','Website paused monitoring successfully!');
    }
    public function __start(){
        $website = Website::where('user_id',auth()->user()->id)->where('id',request('id'))->where('status','>=',0)->first();
        if($website==null){
            return redirect()->back()->with('error','You dont have permission to access this website information!');
        }
        $ping               = $this->isSiteAvailable($website->url);
        $website->status    = $ping['status'];
        $website->last_check= date('Y-m-d H:i:s');
        $website->avg       = $ping['avg'];
        $website->save();

        $checker            = new Checker();
        $checker->type      = 'site_available';
        $checker->website_id= $website->id;
        $checker->avg       = $ping['avg'];
        $checker->status    = $ping['status'];
        $checker->save();


        if($ping['status']==1) {
            return redirect()->back()->with('success', 'Website is running!');
        }else{
            return redirect()->back()->with('error', 'Website is out of service!');
        }
    }

    public function __check(){
        $id = request('id');
        $website = Website::where('user_id',auth()->user()->id)->where('id',$id)->where('status','>=',0)->first();
        if($website==null){
            return redirect()->back()->with('error','You dont have permission to access this website information!');
        }

        $ping               = $this->isSiteAvailable($website->url);
        $website->site_available    = $ping['status'];
        $website->last_check= date('Y-m-d H:i:s');
        $website->avg       = $ping['avg'];
        $website->save();

        $checker            = new Checker();
        $checker->type      = 'site_available';
        $checker->website_id= $website->id;
        $checker->avg       = $ping['avg'];
        $checker->status    = $ping['status'];
        $checker->save();

        if($ping['status']==1) {
            return redirect()->back()->with('success', 'Website is running!');
        }else{
            return redirect()->back()->with('error', 'Website is out of service!');
        }
    }
    public function __ping(){
        $id = request('id');
        $website = Website::where('user_id',auth()->user()->id)->where('id',$id)->where('status','>=',0)->first();
        if($website==null){
            return redirect()->back()->with('error','You dont have permission to access this website information!');
        }

        $ping               = $this->ping($website->url);
        $website->status    = $ping['status'];
        $website->last_check= date('Y-m-d H:i:s');
        $website->avg       = $ping['avg'];
        $website->save();

        $checker            = new Checker();
        $checker->type      = 'ping';
        $checker->website_id= $website->id;
        $checker->avg       = $ping['avg'];
        $checker->status    = $ping['status'];
        $checker->save();

        if($ping['status']==1) {
            return redirect()->back()->with('success', 'Website is running!');
        }else{
            return redirect()->back()->with('error', 'Website is out of service!');
        }
    }
    public function __traceroute(){
        request()->validate([
            'website'=>['required'],
        ]);
        $websiteId = request('website');
        $website = Website::where('user_id',auth()->user()->id)->where('id',$websiteId)->first();
        if($website==null){
            return redirect()->back()->with('error', 'Website does not exist in your account!');
        }

        $ping = $this->isSiteAvailable($website->url);
        if($ping['status'] == 1){
            $traceroute = $this->traceroute($website->url);
            $checker = new Checker();
            $checker->type      = 'traceroute';
            $checker->website_id= $website->id;
            $checker->response  = $traceroute;
            $checker->avg       = 0;
            $checker->status    = 1;
            $checker->save();

            return redirect('/website/history/'.$website->id)->with('success', 'Website is running and Tracerout is still in development process!');
        }
        return redirect()->back()->with('error', 'Website is out of service!');
    }
}
