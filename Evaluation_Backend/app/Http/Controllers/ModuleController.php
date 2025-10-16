<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $module = Module::all();
        return $module;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request, Module $module)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string' . Module::class],
        ]);

        $module = Module::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
         event(new Create($module));

        return response()->json($module);
    }

       public function show(Module $module): View

    {
        return view('modules', [

            'module' => Module::findOrFail($module)

        ]);

    }


}
