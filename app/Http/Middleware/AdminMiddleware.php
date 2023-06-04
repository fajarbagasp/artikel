<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Admin;


class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah pengguna saat ini adalah admin
        if ($request->user() instanceof Admin) {
            return $next($request);
        }

        // Redirect jika pengguna bukan admin
        return new Response('Access denied.', 403);
    }
}
