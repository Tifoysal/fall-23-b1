<?php

namespace App\Console\Commands;

use App\Models\Permission as ModelsPermission;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Output\ConsoleOutput;

class permission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:permission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //step1 read web.php 
        $routes=Route::getRoutes();
        // dd($routes);
        //$routes=[ order.list, order.update,order.delete]

        
        //step 2 insert into permissions table
        //foreach($routes as $rt)
        foreach($routes as $rt)
        {
            if($rt->getPrefix() == '/admin')
            {
                //admin.login -> admin login
                //admin.product.view -> admin product view
                ModelsPermission::updateOrCreate([
                    'name'=>str_replace("."," ",$rt->getName()),
                    'slug'=>$rt->getName()
                ]);
            }
        }
            //check permission exist or not
                //if exist
                    //skip
                //else
                    //insert    

        echo "All permission stored.";
    }
}
