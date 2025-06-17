<?php

  namespace App\Http\Middleware;

  use Closure;
  use Illuminate\Http\Request;
  use Symfony\Component\HttpFoundation\Response;

  class CheckRole
  {
      public function handle(Request $request, Closure $next, $role)
      {
          if (! $request->user() || $request->user()->role !== $role) {
              return redirect('/')->with('error', 'Bạn không có quyền truy cập.');
          }

          return $next($request);
      }
  }