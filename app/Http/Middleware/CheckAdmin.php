<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role=Role::where('name','admin')->first();
        
        if($role && auth()->user()->role_id==$role->id)
        {
            return $next($request);
        }
        notify()->error('You are not admin.');
        return redirect()->route('home');
       

    }
}
