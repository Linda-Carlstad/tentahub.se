<?php

namespace App\Http\Middleware;

use Closure;

class Moderator
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
        $this->auth = auth()->user() ? (
            auth()->user()->role === 'moderator' ||
            auth()->user()->role === 'admin' ||
            auth()->user()->role === 'super' ) : false ;

        if( $this->auth === true )
        {
            return $next($request);
        }

        return redirect()->route( 'login-form' )->with( 'error', 'Aja baja, du saknar rättigheterna för det där, logga in för att fortsätta.' );
    }
}
