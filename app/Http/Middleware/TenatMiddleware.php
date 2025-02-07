<?php

namespace App\Http\Middleware;

use App\Models\Store;
use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class TenatMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            $tenantId = $user->id;
            if ($user->user_type == 'merchant') {
                app()->singleton('tenant_id', fn() => $tenantId);
            }

            Store::addGlobalScope('tenant_id', function (Builder $builder) use ($tenantId) {
                $builder->where('tenant_id', $tenantId);
            });
        }
        return $next($request);
    }
}
