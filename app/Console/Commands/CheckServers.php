<?php

namespace App\Console\Commands;

use App\Mail\ServerDown;
use App\Mail\ServerUpAgain;
use App\Models\Checker;
use App\Models\Website;
use Illuminate\Console\Command;
use App\Http\Controllers\Controller as Cont;
use Mail;

class CheckServers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:servers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checking status of servers registered in database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $now = date('Y-m-d H:i:s');
        $websites = Website::where('last_check','<',date('Y-m-d H:i:s',strtotime($now.' -10 minutes')))
                            ->where('status','!=',3)->with('user')->get();

        foreach($websites as $web){
            $nextUpdate = date('Y-m-d H:i:s', strtotime($web->last_check.' +'.$web->refresh_rate.' minutes'));
            if(strtotime($now)>=strtotime($nextUpdate)){
                $status = $this->__check($web);
                if($status==1 && $web->site_available==2){
                    echo 'back online email sent';
                    Mail::to($web->user->email)->send(new ServerUpAgain($web->url,$web->user->name));
                }
                if($status==2 && $web->site_available==1){
                    echo 'down email sent '.$web->user->email.PHP_EOL;
                    Mail::to($web->user->email)->send(new ServerDown($web->url,$web->user->name));
                }

                echo $web->url.'   :::::   '.$status.PHP_EOL;
            }
        }
    }
    public function __check($website){
        $cont = new Cont();
        $ping               = $cont->isSiteAvailable($website->url);

        $website            = Website::find($website->id);
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

        return $ping['status'];
    }
}
