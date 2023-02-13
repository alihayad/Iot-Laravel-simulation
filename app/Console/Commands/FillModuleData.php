<?php

namespace App\Console\Commands;

use App\Models\Module;
use App\Models\ModuleData;
use Illuminate\Console\Command;

class FillModuleData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:fill-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fill random data in the module_data table';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $modules = Module::where('status',1)->get();
        foreach ($modules as $module) {
            $module->data()->create([
                'data' => rand(0, 100)
            ]);
        }
    }
}
