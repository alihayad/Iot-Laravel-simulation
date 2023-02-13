<?php

namespace App\Console\Commands;

use App\Models\Module;
use GrahamCampbell\ResultType\Success;
use Illuminate\Console\Command;

class FillModuleLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:fill-logs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fill the module logs table';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Module::where('status', 0)->update(['status' => 1]);
        
        $module = Module::inRandomOrder()->first();
        $module->status=0;
        $module->save();
            $module->log()->create([
                'status' => 0,
                'info' =>"Error",
                'viewed' => 0
            ]); 
        
    }
}
