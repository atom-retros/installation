<?php

namespace Atom\Installation\Http\Middleware;

use Atom\Installation\Models\WebsiteInstallation;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class InstallationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $installation = WebsiteInstallation::first() ?: WebsiteInstallation::create([
            'installation_key' => Str::uuid(),
        ]);

        if ($installation->completed && !$request->is('installation*')) {
            return $next($request);
        }

        if (in_array($request->method(), ['POST', 'PUT', 'DELETE']) && $request->is('installation*')) {
            return $next($request);
        }

        if (! $installation->completed && ! $request->is('installation*')) {
            return redirect()->route('installation.index');
        }

        if ($installation->completed && $request->is('installation*')) {
            return redirect()->route('welcome');
        }

        return match (true) {
            $installation->step === 0 && ! is_null($request->route('installation')) => redirect()->route('installation.index'),
            $installation->step != $request->route('installation') => redirect()->route('installation.show', ['installation' => $installation->step]),
            default => $next($request),
        };
    }
}
