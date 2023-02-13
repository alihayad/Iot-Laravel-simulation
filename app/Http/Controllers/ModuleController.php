<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\ModuleLog;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ModuleController extends Controller
{

    public function index()
    { 
        $logsUnviewedCount = ModuleLog::where("viewed", 0)->count();

        return view('modules', [ 'logsUnviewedCount' => $logsUnviewedCount]);
    }




    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'serial_number' => 'required',
            'info' => 'required',
            'status' => 'required|in:0,1'
        ]);

        $module = Module::create($validatedData);

        return response()->json(['data' => $module], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(Module $module)
    {

        $logsUnviewedCount = ModuleLog::where("viewed", 0)->count();
        return view('dashboard', ['module' => $module, 'logsUnviewedCount' => $logsUnviewedCount]);
    }



    public function getModuleData(Request $request)
    {
        //dd($request->get('length'));
        //$skip = $request->get("start");
        //$take = $request->get("length");
        $modules = Module::select(['id', 'serial_number', 'info', 'status'])->get();
        $dataTable = Datatables::of($modules);
        $dataTable->editColumn('id', function ($module) {
            return '<a href="' . route('module.show', ['module' => $module]) . '">' . $module->id . '</a>';
        })->rawColumns(['id']);
        $dataTable->editColumn('status', function ($module) {
            return $module->status == 0 ? "InActive" : "Active";
        });

        return $dataTable->make(true);
    }
}