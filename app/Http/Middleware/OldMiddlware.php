<?php
/**
 * Created by PhpStorm.
 * User: SVE
 * Date: 2/6/2015
 * Time: 12:48 PM
 */

namespace App\Http\Middleware;


use Illuminate\Contracts\Routing\Middleware;
use PhpParser\Node\Expr\Closure;

class OldMiddlware implements Middleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request,\Closure $next)
    {
       if($request->input('number') < 200) {

           return redirect()->back()->withInput()->with('message', 'So luong phai nhap vao lon hon 200');
       }
        return $next($request);
    }

} 