<?php

namespace App\Http\Middleware;
use Illuminate\Support\Collection ;

use Closure;
use App\Tenant;
class SetTenantConfiguration
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
        $domain = explode('.' , $request->server->get('HTTP_HOST'));
        $subdomain = $domain[0]; 
        $tenant = Tenant::where('subdomain', $subdomain)->first();
        
        config(['tenant' => $tenant->toArray()]);

        return $next($request);
    }
}
