<?php

namespace EXS\DarklaunchProvider\Providers\Services;

use Pimple\ServiceProviderInterface;
use Pimple\Container;
use EXS\DarklaunchProvider\Services\DarklaunchService;

/**
 * Description of DarklaunchProvider
 *
 * Register the service
 * Created      08/12/2015
 * @author      Lee
 * @copyright   Copyright 2015 ExSitu Marketing.
 */
class DarklaunchProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['exs.serv.darklaunch'] = (function ($app) {
            return new DarklaunchService($app['exs.active.ips']);
        });
    }
}
