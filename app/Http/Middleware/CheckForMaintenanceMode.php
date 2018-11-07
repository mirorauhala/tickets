<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Http\Exceptions\MaintenanceModeException;

class CheckForMaintenanceMode
{
    /**
     * The application implementation.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * Create a new middleware instance.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return void
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->app->isDownForMaintenance() && ! $this->isIpWhiteListed($request)) {
            $data = json_decode(file_get_contents($this->app->storagePath() . '/framework/down'), true);

            throw new MaintenanceModeException($data['time'], $data['retry'], $data['message']);
        } elseif ($this->app->isDownForMaintenance()) {
            \Session::flash('system_maintenance_status', true);
            \Session::save();
        }

        return $next($request);
    }

    /**
     * Parse whitelisted IPs.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return bool
     */
    private function isIpWhiteListed($request)
    {
        $ip = $request->getClientIp();
        $allowed = explode(',', config('APP_MAINTENANCE_WHITELIST'));

        return in_array($ip, $allowed);
    }
}
