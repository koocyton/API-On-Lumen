<?php

namespace App\Providers;

use App\Model\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.
        /**@var Request $request **/
        $this->app['auth']->viaRequest('api', function ($request) {
            if ($request->header("sess-token") || $request->cookie("sess-token")) {
                $sessionToken = empty($request->header("sess-token")) ? $request->cookie("sess-token") : $request->header("sess-token");
                $manager = Manager::where('token', $sessionToken)->first();
                if ($manager!=null) {
                    $_SESSION["manager"] = $manager;
                    return $manager;
                }
            }
            return null;
        });
    }
}
