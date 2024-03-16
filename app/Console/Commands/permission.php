<?php

namespace App\Console\Commands;

use App\Models\Permission as ModelsPermission;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;

class Permission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Read all routes from web.php and store into permissions table.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //read all routes and store into permissions table
        $routes = Route::getRoutes();
        foreach($routes as $route)
        {
            if($route->getPrefix()=='/admin'){
                // dd($route->getName());
               
               ModelsPermission::updateOrCreate([
                'name'=>str_replace("."," ",$route->getName()),
                'slug'=>$route->getName(),
               ]);

            }
           
        }

        echo "all permission store successfully.";

       
    }
}
