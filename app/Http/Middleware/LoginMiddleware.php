<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    // chức năng này có chức năng phân quyền. Khi người dùng đang trong trang admin mà quay về trang đăng nhập bằng đường dẫn chứ không dùng logout thì hệ thống
    // không cho phép và tự động đưa về trang admin

    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            return redirect()->route('dashboard.index');
        }

        return $next($request);
    }
}
