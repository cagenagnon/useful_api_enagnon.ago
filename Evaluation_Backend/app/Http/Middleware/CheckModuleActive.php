<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Module;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class CheckModuleActive
{
    /**
     * Handle an incoming request.
     * @param moduleName
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $moduleName): Response
    {
        //  $module = Module::where('name'->$moduleName)->first();
        // if(!$module || !$module->is('active')){
        //     return response()->noContent('error: Module inactive. Please activate this module to use it.');
        // }
        // if(modules.module.active == false){
        //     return
        // }
        return $next($request);
    }
}
