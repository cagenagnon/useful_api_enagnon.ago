<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
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

        return response()->json($module);
    }
    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Module $module)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Module $module)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Module $module)
    {
        //
    }
    protected $moduleClass;

    public function __construct()
    {
        $this->moduleClass = Module::class;
    }
    public function module($user_id)
    {
        $moduleInstance = app($this->moduleClass);

        $module = $moduleInstance->newQuery()->find($user_id);

        if (!$module || !$module->is('active')) {
            return response()->json(["error" => "Module inactive. Please activate this module to use it."], 403);
        }



        return response()->json($module);
    }
}
