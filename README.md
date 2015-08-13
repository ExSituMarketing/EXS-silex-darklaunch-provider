EXS-silex-darklaunch-provider
==========================

Provides darklaunch ability based on user ips.


## Installing the EXS-silex-darklaunch-provider in a Silex project
The installation process is actually very simple.  Set up a Silex project with Composer.

Once the new project is set up, open the composer.json file and add the exs/silex-darklaunch-provider as a dependency:
``` js
//composer.json
//...
"require": {
        //other bundles
        "exs/silex-darklaunch-provider": "@dev"
```
Or you could just add it via the command line:
```
$ composer.phar require exs/silex-darklaunch-provider ~1.0@dev
```

Save the file and have composer update the project via the command line:
``` shell
php composer.phar update
```
Composer will now update all dependencies and you should see our bundle in the list:
``` shell
  - Installing exs/silex-darklaunch-provider (dev-master 463eb20)
    Cloning 463eb2081e7205e7556f6f65224c6ba9631e070a
```

Update the app.php to include the EXS-silex-darklaunch-provider provider:
``` php
//app.php
//...
$app->register(new \EXS\DarklaunchProvider\Providers\Services\DarklaunchProvider());
```

Add ips to active dark launched functions or services in config.php:
```php
//...
$app['tf.active.ips'] = array(
    '127.0.0.1',
    MORE IPS HERE
);
//...
```



## USAGE

1. Declare the service 

```php
//...
use EXS\DarklaunchProvider\Services\DarklaunchService;

$darkLauncher = new DarklaunchService();
//...
```


2. wrap the function or service to be dark launched and triggered by ip
```php
//...
if(darkLauncher->isActiveIp()) {
    FUNCTION_TO_BE_DARKLAUNCHED
}

// or if you already know the user ip

if(darkLauncher->isActiveIp(USER_IP_HERE)) {
    FUNCTION_TO_BE_DARKLAUNCHED
}
//...
```




#### Contributing ####
Anyone and everyone is welcome to contribute.

If you have any questions or suggestions please [let us know][1].

[1]: http://www.ex-situ.com/