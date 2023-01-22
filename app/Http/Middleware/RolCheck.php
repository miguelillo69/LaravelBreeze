<?php

namespace App\Http\Middleware;

use App\Models\Ganga;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->rol === 'admin'){
            return $next($request);
        }
        $id = $request->segments()[1];
        $ganga = Ganga::findOrFail($id);
        if ($ganga->user_id !== Auth::id()) {
            abort(403, 'Must Be Owner');
        }
        return $next($request);
    }
}
