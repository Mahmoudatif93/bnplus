<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Cards;
use App\Order;
use App\Carbon\Carbon;
use DB;
class endedpackages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'endedpackages:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
    
    
   $orderss= DB::select("select * FROM  packages_orders  where endDate <=NOW()");
   
   foreach($orderss as $order){
       if($order->active==0){
        $finalorders= DB::update("update packages_orders set active=1 where id = '$order->id'");
   }
   }
   
   $cobons= DB::select("select * FROM  cobons  where end_date <=NOW()");
   
   foreach($cobons as $cobon){
       if($cobon->active==0){
        $finalcobon= DB::update("update cobons set active=1 where id = '$cobon->id'");
   }
   }
   
   
   
   
   $caaobons= DB::select("select * FROM  cobons  ");
 $packj= DB::select("SELECT count(*) f,package_id FROM `packages_orders` WHERE paid='true' and active =0 GROUP by client_id,package_id ");

foreach($packj as $kk){
     $cons= DB::select("select * FROM  cobons where package_id='$kk->package_id' and active=0");
     
    foreach($cons as $rr){
        
          if($rr->f >= $rr->number_use){
    $finalcssobon= DB::update("update cobons set active=1 where id = '$rr->id'");
} 
    }
}
/*foreach($caaobons as $caaobon){
    



 $cobons= DB::select("SELECT count(*) c FROM `packages_orders` WHERE paid='true' and active =0 GROUP by client_id  ");

foreach($cobons as $gg){
  if($gg->c >= $caaobon->number_use){
    $finalcssobon= DB::update("update cobons set active=1 where id = '$caaobon->id'");
}  
}


}*/
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
    
    
           $this->info('endedpackages Cummand Run successfully!.');

     //  $this->info('Order Cummand Run successfully!');
    }
}
