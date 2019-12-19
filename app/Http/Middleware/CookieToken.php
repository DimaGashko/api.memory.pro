<?php

namespace App\Http\Middleware;

use Closure;

class CookieToken
{
   /**
    * If the request has a 'access_token' cookie
    * set the 'Authorization' header by this cookie token
    *
    * That's why you can provide one of 'Authorization' header or cookie token
    * for authorization:
    *
    * -H 'Authorization: Bearer eyJ0eXAiOiJKV...'
    * or
    * -H 'cookie: access_token=eyJ0eXAiOiJKV1...'
    *
    * @param \Illuminate\Http\Request $request
    * @param \Closure $next
    * @return mixed
    */
   public function handle($request, Closure $next)
   {
      if ($request->headers->has('Authorization')) {
         return $next($request);
      }

      $cookieToken = $request->cookie('access_token');
      $request->headers->set('Authorization', "Bearer $cookieToken");

      return $next($request);
   }
}
