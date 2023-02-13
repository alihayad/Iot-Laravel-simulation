<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\ModuleLog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ModuleLogController extends Controller
{

    public function index()
    {
        $logsUnviewedCount = ModuleLog::where("viewed", 0)->count();

        return view('logs', ['logsUnviewedCount' => $logsUnviewedCount]);




    }

    public function checkForModuleDown()
    {

        $module_down = ModuleLog::where('Notified', 0)
            ->count();
        if ($module_down > 0) {
            return response()->json($module_down);
        } else {
            return response()->json($module_down);
        }
    }

    public function Notified()
    {
        ModuleLog::where('Notified', 0)->update(["Notified" => 1]);
    }

    public function getModuleLogs(Request $request)
    {
        ModuleLog::where('viewed', 0)->update(['viewed' => 1]);
        $modules = ModuleLog::select(['module_id', 'status', 'info', 'created_at'])->orderBy('created_at', 'Desc')->get();
        $dataTable = Datatables::of($modules);

        $dataTable->editColumn('module_id', function ($module) {
            return '<a href="' . route('module.show', ['module' => $module->module]) . '">' . $module->module_id . '</a>';
        })->rawColumns(['module_id']);

        $dataTable->editColumn('status', function ($module) {
            return $module->status == 0 ? "Down" : "Up";
        });

        $dataTable->editColumn('created_at', function ($module) {
            $date = Carbon::parse($module->created_at);
            return $date->toDateTimeString();


        });


        $dataTable->addColumn('timePassed', function ($module) {

            return $module->created_at->diffForHumans();
        });


        return $dataTable->make(true);
    }


}