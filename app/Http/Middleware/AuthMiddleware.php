<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::user()->role=='1'||Auth::user()->role=='3'){
                return $next($request);
            }else{
                return redirect()->route('home')->with([
                    'messageError'=>'Bạn không đủ quyền',
                ]);
            }

        }else{
            return redirect()->route('login')->with([
                'message'=>'Bạn cần đăng nhập trước',
            ]);
        }
    }
}
