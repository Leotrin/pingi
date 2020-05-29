<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __index()
    {
        $sites          = Website::where('user_id',auth()->user()->id)->where('status','>=',0)->get();
        $totalSites     = $sites->count();
        $activeServers  = $sites->where('status',1)->count();
        $inactiveServers= $sites->where('status',2)->count();
        $pausedServers  = $sites->where('status',3)->count();
        $activeSites    = $sites->where('site_available',1)->count();
        $inactiveSites  = $sites->where('site_available',2)->count();
        $pausedSites    = $sites->where('site_available',3)->count();

        if($totalSites==0){$totalSites=1;}
        $up     = (($activeSites / $totalSites) *100);
        $up     = number_format($up,0);
        $down   = (($inactiveSites / $totalSites) *100);
        $down   = number_format($down,0);

        $allSites = Website::count();
        return view('home',compact(
            'totalSites','activeSites','inactiveSites','pausedSites',
            'activeServers','inactiveServers','pausedServers',
            'sites','up','down','allSites'
        ));
    }
    public function __profile(){
        if(request()->isMethod('post')){
            request()->validate([
                'email'=>'required',
                'name'=>'required'
            ]);

            $user = User::where('id',auth()->user()->id)->where('email',request('email'))->first();
            $user->name = request('name');
            $user->save();

            return redirect('/profile')->with('success','Data updated successfully.');
        }
        return view('profile');
    }
    public function __password(){
            request()->validate([
                'email'=>'required',
                'old_password'=>'required',
                'password'=>'required|confirmed|min:6',
            ]);

            if(auth()->attempt(['email'=>request('email'),'password'=>request('old_password')])){
                $user = User::where('id',auth()->user()->id)->where('email',request('email'))->first();
                $user->password = bcrypt(request('password'));
                $user->save();
                return redirect('/profile')->with('success','Password updated successfully.');
            }

        return redirect('/profile')->with('error','Wrong current password.');

    }
}
