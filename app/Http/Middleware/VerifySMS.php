<?php

namespace App\Http\Middleware;

use Closure;

class VerifySMS
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user= auth()->user();
        if (auth()->check() && $user->verified != '1'){
            return redirect()->route('user.verify.page');
        }
        return $next($request);
    }
}
