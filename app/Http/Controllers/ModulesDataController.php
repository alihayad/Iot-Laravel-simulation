<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Module;
use Illuminate\Http\Request;

class ModulesDataController extends Controller
{
    
   
    public function dashboardData(Request $request, $id)
    {
        $module = Module::find($id);
        $data = $module->data()->select(['data', 'created_at'])->orderBy('created_at', 'desc')->take(10)->get();
        $dataCount = $module->data()->count();
        $measueredValues = $data->pluck('data');
        $measueredValues = $measueredValues->toArray();
        $dates = $data->pluck('created_at');
        $dates = $dates->toArray();

        foreach ($dates as &$value) {
            $value = Carbon::parse($value)->toDateTimeString();
        }


        return response()->json([
            'timePassed' => $module->created_at->diffForHumans(),
            'measueredValues' => $measueredValues,
            'dates' => $dates,
            'count' => $dataCount
        ]);
    }
}