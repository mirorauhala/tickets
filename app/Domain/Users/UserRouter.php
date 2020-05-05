<?php

namespace Domain\Users;

use Illuminate\Routing\Router;

class UserRouter {

    /**
     * @var array
     */
    protected $prefix = [
        'prefix' => '/settings',
        'namespace' => 'Domain\\Users\\Controllers'
    ];

    /**
     * These are the web routes for the user. Mainly settings.
     *
     * @param Illuminate\Routing\Router  $router
     * @return void
     */
    public function __invoke(Router $router) {
        $router->group($this->prefix, function () use ($router) {
            $router->get('/', 'AccountController@show')->name('settings');
            $router->post('/', 'AccountController@update');

            $router->get('/password', 'PasswordController@showPasswordForm')->name('settings.password');
            $router->post('/password', 'PasswordController@updatePassword');

            $router->get('/language', 'LanguageController@show')->name('settings.language');
            $router->post('/language', 'LanguageController@update');

            $router->get('/about', 'AboutController')->name('settings.about');
        });
    }
}
