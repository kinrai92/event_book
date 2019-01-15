<?php

namespace App\Http\middleware;
use Closure;


class Event
{

  public function handle($request,Closure $next)
  {
    if(time() < strtotime('2018-01-10')){
      return redirect('event0');
    }

    return $next($request);

  }
}
