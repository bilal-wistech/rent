<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/_debugbar/open' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.openhandler',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_debugbar/assets/stylesheets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.assets.css',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_debugbar/assets/javascript' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.assets.js',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_debugbar/queries/explain' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.queries.explain',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/telescope/telescope-api/mail' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uxUBKdHLjwlJLCKY',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/telescope/telescope-api/exceptions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::70J1O31e3Kd1UVwX',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/telescope/telescope-api/dumps' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::I2iZcIizxKgWo7A6',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/telescope/telescope-api/logs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZY7USq5PbGBIuroO',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/telescope/telescope-api/notifications' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::d5Zy4EmD93EOJ4aP',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/telescope/telescope-api/jobs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OlXX41zOf9EsIube',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/telescope/telescope-api/batches' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2h9ayNJl5VKL2MBS',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/telescope/telescope-api/events' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9m5W4O1pJE2U5WUb',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/telescope/telescope-api/gates' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xAMTBRJx4TudFsnZ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/telescope/telescope-api/cache' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cJeMdoR0JWXCHqJ8',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/telescope/telescope-api/queries' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xgnDKxn5FFdPl9mK',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/telescope/telescope-api/models' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uY5um8rApBsTHgdV',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/telescope/telescope-api/requests' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bqHSi5FwrSsdRVcm',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/telescope/telescope-api/views' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::r7HkEQxhg3Fq4Y41',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/telescope/telescope-api/commands' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::blBWjaDAFLmRdQIm',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/telescope/telescope-api/schedule' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WTxZMccp3jwTJfzw',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/telescope/telescope-api/redis' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xB8ntzwClfQqGJhC',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/telescope/telescope-api/client-requests' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::FvpaYDJ140HkIW75',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/telescope/telescope-api/monitored-tags' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7A6O1wTZyOLyY2ao',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Nh0dWbcXgqeMDShU',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/telescope/telescope-api/monitored-tags/delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZhD9i27zXTw7bSZi',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/telescope/telescope-api/toggle-recording' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WkEwVo9kX2C9Svsr',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/telescope/telescope-api/entries' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BjMZu3tTe78y1HXJ',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/health-check' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.healthCheck',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/execute-solution' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.executeSolution',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/update-config' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.updateConfig',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/broadcasting/auth' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2wD3rJHL3jY8o29W',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/directbanktransfer/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bank.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/directbanktransfer/edit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bank.edit',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/gateway/flutterwave/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'flutterwave.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/gateway/flutterwave/edit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'flutterwave.edit',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/flutterwave' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::grcWguNbGbs8NfiH',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/gateway/payment/confirmation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gateway.confirmation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/gateway/payment/failed-payment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gateway.failed',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/gateway/payment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gateway.payment',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/gateway/enable-module' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gateway.enable-module',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/gateway/disable-module' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gateway.disable-module',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/gateway/paypal/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'paypal.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/gateway/paypal/edit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'paypal.edit',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/gateway/paystack/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'paystack.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/gateway/paystack/edit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'paystack.edit',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/razorpay/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'razorpay.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/razorpay/edit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'razorpay.edit',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/gateway/stripe/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'stripe.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/gateway/stripe/edit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'stripe.edit',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BVgIfATQwjMEUgRj',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/enable-debugger' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OGTjgULuLKtX9RjW',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/create-users-wallet' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pZEQFdNPKhUulpm6',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/cron' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Zt9pMjwnQ8163KY7',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/import' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::EDVSHO2m2deXWixL',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/cron/ical-synchronization' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Z70kdRjneKoNtvUV',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::aKQrjVZm6QcVvI90',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/search/result' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nqudqeDAPrC7flcA',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pHojNowvcDuwgYHb',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/property/get-price' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::oL7oy7HYjnJuT3mg',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/set-slug' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vJ8SQuiTrRy7n9La',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/signup' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4af56Ar4S09kcgM5',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/checkUser/check' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'checkUser.check',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/set_session' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zilBZHjuLMS5nznt',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zH382lpCxipsO7U5',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/cache-clear' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6QMy0kQaquClLTL6',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/addons' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'addon.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/sms' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3B1BkacejRptU1p8',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ghhjGD2n5JRDougK',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TjlfUL9rolQrkcPL',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rmy40GWkFWjpcAxU',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/customers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bIfJwksnYK0UjGUM',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/document' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'document.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'document.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/document/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'document.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/emergencycontacts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'emergencycontacts.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'emergencycontacts.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/emergencycontacts/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'emergencycontacts.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/city' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'city.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/city/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/area' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'area.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'area.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/area/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'area.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/admin/add-ajax-city' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.addAjax',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/admin/add-ajax-area' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'area.addAjax',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/customers/customer_search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6WoFPOjHZavVmgfm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/add-ajax-customer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::FYYCoJ2SdGy2vEd1',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/add-customer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CgRU5zlpJdXKMjP0',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/currency-symbol' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::L6OvQR83gaJ8Xl16',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/customer/customer_list_csv' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tWhjLyccofwo8Ph5',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/customer/customer_list_pdf' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::79AukWTwX81Rj1TX',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/messages' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xiALBb8b1mgxpQu9',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/upload_image' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'upload',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/properties' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ibKQDUKPvvF1j1dM',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/add-properties' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qlokuUzkz55mdek5',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/properties/property_list_csv' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::PTSwZRFq70iQZUUZ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/properties/property_list_pdf' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZcGEM901tJXIBMtt',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/listing/photo/make_default_photo' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cKulkleM0rSuYN1U',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/listing/photo/make_photo_serial' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KMaYu3Ef1CRMJVnA',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/bookings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.bookings.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/bookings/property_search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XkhqCoRxK97DkBpB',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/bookings/customer_search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.bookings.customer_search',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/bookings/pay' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lW9SJUqJ0vERNLor',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/booking/booking_list_csv' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::dOut3vxp4xfFDmIY',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/booking/booking_list_pdf' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::A1cj2qfghLOqWls2',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/invoices' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.invoices.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/payouts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::FyhR06THV9ipVyau',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/payouts/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payouts.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/payouts/create/success' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payouts.asuccess',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/payouts/payouts_list_pdf' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8G2u8wGH33lMCZJl',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/payouts/payouts_list_csv' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cSumFMzqVq63BcYT',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/reviews' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UjZenQL5MlZoSh5b',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/reviews/review_search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WTogl6SkpokTQRcu',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/reviews/review_list_csv' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::aMhZNUP2paKlF51w',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/reviews/review_list_pdf' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::agLhV8IiOjBvpRbZ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/sales-report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4TZWw8xm2Ja4Kq1V',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/sales-analysis' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::eICwmWuQHPiuNeHb',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/reports/property-search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::am0xp0Yy49g5koEk',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/overview-stats' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ohzdlCUKrbbYQXeO',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/amenities' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fxFL7IoBegY7c4MI',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/add-amenities' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4sxrzbCNmbKzjjs5',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/pages' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gbRGOdn43HHdl8DI',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/add-page' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1emsQMNGptOTRsrp',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/admin-users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::EbfBn1oTynkRVX1d',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/add-admin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RovnU7xWy8A0rCmH',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3xbIVvjGbSBPRZZM',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/preferences' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::oEsXXKWd5Ti8nf2t',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/getreCaptchaCredential' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NIwarJvZ0vD7tVrk',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/delete_logo' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LzhC6w2jovOnJ9Wn',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/delete_favicon' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VKnYBuLoLIZWQBU6',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/fees' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lSUvmZvjLiMWr58w',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/banners' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::11pocAlPAVhhEdPY',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/add-banners' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WUPg2JO2WzHmHums',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/starting-cities' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vHfLPLraLfVxJzTB',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/add-starting-cities' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xozeRRcY6Iw6ZLWP',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/property-type' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hi6MF6LQd1RRX2wv',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/add-property-type' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::AeGPqpfbKjHzjGTw',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/space-type' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HQasWhApGBnm3DDQ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/add-space-type' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RvvdpLjALk18jgQV',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/bed-type' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Nye6oZhVJQ3lfikr',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/add-bed-type' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::l1QiJiEx7R8o4GN3',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/currency' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4yHwDXtFRXw1Csx6',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/add-currency' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::C6C7khW7geOObX7p',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/country' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Itia0B5KbF95MINp',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/add-country' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yWOAHkh8KOGs9ix3',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/amenities-type' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::e9PPIdylqzxETfBj',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/add-amenities-type' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ED2tOUEMVUVvZ9fE',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/email' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XC0ejLE0r4Rh5bVi',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/language' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rHV5xoklc8WGozzn',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/add-language' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BIYhwnyG5SRNGOJs',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/metas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qvCKbFWBqh2ZOgds',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/api-informations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::465TTszu13fH3OLh',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/google-recaptcha-api-information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::243bf4wTe7S1Okis',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/payment-methods' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::g3CxNBHjyiNQVFUL',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/bank/add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vxhZD4nXXr7Kngkx',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/social-links' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qLSj46dg4XFZiji3',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/social-logins' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0r0NvgZvNtdGDsS0',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/roles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Dk13cO2aCpkKvxmj',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/add-role' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3s8LdLJDYw9lqfVC',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/backup' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yOBJLKbwwdtTQGaq',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/backup/save' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mpIGer87my6mPFZK',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/testimonials' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nWBVNtCmKpozbGnP',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/add-testimonials' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::oLC73fZ9odKffkFu',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/bookings/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.bookings.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/bookings/calander' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.bookings.calander',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/bookings/check-booking-exists' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.bookings.check-booking-exists',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/bookings/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.bookings.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
            'PUT' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/bookings/form_property_search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.bookings.form_property_search',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/bookings/form_customer_search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.bookings.form_customer_search',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Xq1QAVqd3YUIjcyA',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/authenticate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::eeHIKBO6TSnWt7My',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/forgot-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6SHHyQ1AEr8DAuNC',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::w4zWgL07sT2R9Imo',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/auth/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LkkbgKObL1OP5zPv',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/googleLogin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nDAh4rlq4TOHKhB2',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/facebookLogin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CaRB5B4HcMGhdY6q',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gDrqcN0t0og9LZwH',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/forgot_password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::AglSOTuMpYdV6FE7',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::T1iyYL5lr74NNHzu',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/authenticate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MPkOfcOF1TI3fX5d',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/googleAuthenticate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rrkNhrsLB4zSmbVs',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/facebookAuthenticate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Vqtl0hdRdZ0tgG6y',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::PXb8UPe2ewsisKGp',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/users/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::i6aiqDFTFbqkZF4r',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/users/profile/media' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5y2n2f4Kw6oMF0d9',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/users/edit-verification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZtIxjLlb280IUr5e',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/users/new_email_confirm' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qftz4JFcrnIazecZ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/facebookLoginVerification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::px4nFjlopPmVyToT',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/facebookDisconnect' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::d8h3nFLn9lNca5HT',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/googleLoginVerification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::I0QYRenDymt8cgNN',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/googleDisconnect' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IiYNh9w4viu74QKe',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/users/reviews' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5MX855xSSstehyew',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/users/reviews_by_you' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0FGn5rRLe3G7sMJa',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reviews/details' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::g7LF7kLOwRV4FNIh',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/properties' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::InFPFCNkkZDDaLOa',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/property/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Vhqo3k898NstTMNN',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/listing/photo/make_default_photo' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9AXtvejSyoo0mHxJ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/listing/photo/make_photo_serial' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OMU7DiQS81G2MXsS',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/listing/update_status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kTYQNu919ZQMsnJx',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/favourite' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vyLxEv6HHgqmxsbA',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/add-edit-book-mark' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uNpgy0GhXCtO4OiR',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/currency-symbol' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GVywJ6EqzKMYfSYg',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/payments/create_booking' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MeFhHEMEyKk0gSNL',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/payments/success' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WOnBAFHZWqfZxLWn',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/payments/cancel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YFsImOlmCsaW8qVk',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/payments/stripe' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::y7UU8HF14fETYlU1',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/payments/stripe-request' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mlqdTwmVdhMHfiGg',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/payments/bank-payment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kFlg0RhxWrZnN6Op',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/booking/requested' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::e0gkR2PLIjK9XudH',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/booking/itinerary_friends' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fm6PlcH6vKDQ9POy',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/my-bookings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OetgOeWhZyMEFm8U',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/booking/host_cancel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::45nkIAD2bMOC5edX',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/trips/active' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::FdmH4P5ae1COB8Bk',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/booking/receipt' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qH0ps2AoHxMnKF65',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/trips/guest_cancel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Q3CGS2n21TOzeAx6',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/inbox' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2TiwRhFCfD8VR7fS',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/messaging/booking' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::m25T5YDrXlyqRB3x',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/messaging/reply' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::u9IGufByzf9jfalG',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/users/account-preferences' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::26T1hozVJF9kiRq8',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/users/transaction-history' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wvWZnACVl2MrPe6N',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/users/account_transaction_history' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HTSYZiSpM97VG2GR',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/users/payout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5Tn2plUpgNXL99tM',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/users/payout/setting' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mDGbFIg6DUM86WY1',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/users/payout/edit-payout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xtB7KjkkHre5hzWh',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/users/payout-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::domtjrbiLQ08Vmy9',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/users/payout/success' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::arD6cPRwrNI3lfT2',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/users/security' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NW8UG6r2YN2fwFzY',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IORkudHsCF2X1EFe',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/_debugbar/(?|c(?|lockwork/([^/]++)(*:42)|ache/([^/]++)(?:/([^/]++))?(*:76))|telescope/([^/]++)(*:102))|/telescope(?|/telescope\\-api/(?|m(?|ail/([^/]++)(?|(*:162)|/(?|preview(*:181)|download(*:197)))|odels/([^/]++)(*:221))|e(?|xceptions/([^/]++)(?|(*:255))|vents/([^/]++)(*:278))|logs/([^/]++)(*:300)|notifications/([^/]++)(*:330)|jobs/([^/]++)(*:351)|batches/([^/]++)(*:375)|gates/([^/]++)(*:397)|c(?|ache/([^/]++)(*:422)|ommands/([^/]++)(*:446)|lient\\-requests/([^/]++)(*:478))|queries/([^/]++)(*:503)|re(?|quests/([^/]++)(*:531)|dis/([^/]++)(*:551))|views/([^/]++)(*:574)|schedule/([^/]++)(*:599))|(?:/((?:.*)))?(*:622))|/g(?|ateway/pay(?|ment/([^/]++)/pay(*:666)|/([^/]++)/(?|c(?|omplete(*:698)|a(?|llback(*:716)|ncelled(*:731)))|payment_webhook(*:756)))|oogleConnect/([^/]++)(*:787))|/p(?|roperties/([^/]++)(*:819)|ayments/book(?:/([^/]++))?(*:853))|/u(?|nauthentication\\-favourite/([^/]++)(*:902)|sers/(?|reset_password(?|(?:/([^/]++))?(*:949)|(*:957))|confirm_email(?:/([^/]++))?(*:993)|show/([^/]++)(*:1014)|account_de(?|lete/([^/]++)(*:1049)|fault/([^/]++)(*:1072))|payout/delete\\-payout/([^/]++)(*:1112)))|/a(?|dmin/(?|d(?|ocument/([^/]++)(?|(*:1159)|/edit(*:1173)|(*:1182))|elete\\-(?|customer/([^/]++)(*:1219)|message/([^/]++)(*:1244)|p(?|roperty/([^/]++)(*:1273)|age/([^/]++)(*:1294))|a(?|menities/([^/]++)(*:1325)|dmin/([^/]++)(*:1347))|testimonials/([^/]++)(*:1378)))|e(?|m(?|ergencycontacts/([^/]++)(?|(*:1424)|/edit(*:1438)|(*:1447))|ail\\-template/([^/]++)(?|(*:1482)))|dit(?|\\-(?|customer/([^/]++)(*:1521)|a(?|menities/([^/]++)(*:1551)|dmin/([^/]++)(*:1573))|page/([^/]++)(*:1596)|testimonials/([^/]++)(*:1626))|_(?|property/([^/]++)(*:1657)|review/([^/]++)(*:1681))))|c(?|ity/(?|([^/]++)(?|(*:1715)|/edit(*:1729)|(*:1738))|add/([^/]++)(*:1760))|ustomer/(?|p(?|roperties/([^/]++)(?|(*:1806)|/property_list_(?|csv(*:1836)|pdf(*:1848)))|ay(?|outs/([^/]++)(?|(*:1880)|/payouts_list_(?|pdf(*:1909)|csv(*:1921)))|ment\\-methods/([^/]++)(*:1954)))|bookings/(?|([^/]++)(*:1985)|property_search(*:2009)|([^/]++)/booking_list_(?|csv(*:2046)|pdf(*:2058)))|wallet/([^/]++)(*:2084)))|a(?|rea/(?|([^/]++)(?|(*:2117)|/edit(*:2131)|(*:2140))|add/([^/]++)(*:2162))|jax\\-(?|calender(?|/([^/]++)(*:2200)|\\-price/([^/]++)(*:2225))|icalender\\-import/([^/]++)(*:2261))|dmin/properties/get\\-areas/([^/]++)/([^/]++)(*:2315))|se(?|nd\\-message\\-email/([^/]++)(*:2357)|ttings/(?|edit(?|\\-(?|b(?|anners/([^/]++)(*:2407)|ed\\-type/([^/]++)(*:2433))|s(?|tarting\\-cities/([^/]++)(*:2471)|pace\\-type/([^/]++)(*:2499))|property\\-type/([^/]++)(*:2532)|c(?|urrency/([^/]++)(*:2561)|ountry/([^/]++)(*:2585))|amenities\\-type/([^/]++)(*:2619)|language/([^/]++)(*:2645)|role/([^/]++)(*:2667))|_meta/([^/]++)(*:2691))|delete\\-(?|b(?|anners/([^/]++)(*:2731)|ed\\-type/([^/]++)(*:2757))|s(?|tarting\\-cities/([^/]++)(*:2795)|pace\\-type/([^/]++)(*:2823))|property\\-type/([^/]++)(*:2856)|c(?|urrency/([^/]++)(*:2885)|ountry/([^/]++)(*:2909))|amenities\\-type/([^/]++)(*:2943)|language/([^/]++)(*:2969)|role/([^/]++)(*:2991))|bank/(?|edit/([^/]++)(*:3022)|([^/]++)(*:3039)|delete/([^/]++)(*:3063))))|messaging/host/([^/]++)(*:3098)|re(?|ply/([^/]++)(*:3124)|set\\-password(?|(?:/([^/]++))?(*:3163)|(*:3172)))|p(?|roperties/cities\\-by\\-country/([^/]++)(*:3225)|ayouts/(?|update/([^/]++)(*:3259)|edit/([^/]++)(*:3281)|de(?|lete/([^/]++)(*:3308)|tails/([^/]++)(*:3331))))|listing/(?|([^/]++)/(?|photo_(?|message(*:3382)|delete(*:3397))|update_status(*:3420))|([0-9]+)/([^/]++)(*:3447))|i(?|calendar/synchronization/([^/]++)(*:3494)|nvoices/(?|show/([^/]++)(*:3527)|invoice/([^/]++)(*:3552)))|b(?|ooking(?|s/(?|detail(?|/([^/]++)(*:3599)|s/([^/]++)(*:3618))|edit/([^/]++)(?|/([^/]++)(*:3653)|(*:3662))|get\\-(?|number\\-of\\-guests/([^/]++)(*:3707)|property\\-dates/([^/]++)(*:3740))|update/([^/]++)(*:3765))|/need_pay_account/([^/]++)/([^/]++)(*:3810))|ackup/download/([^/]++)(*:3843)))|jax\\-(?|calender(?|/([^/]++)(*:3882)|\\-price/([^/]++)(*:3907))|icalender\\-import/([^/]++)(*:3943)))|/facebookConnect/([^/]++)(*:3979)|/reviews/edit/([^/]++)(*:4010)|/listing/(?|([^/]++)/photo_(?|message(*:4056)|delete(*:4071))|([0-9]+)/([^/]++)(*:4098))|/icalend(?|ar/synchronization/([^/]++)(*:4146)|er/export/([^/]++)(*:4173))|/booking(?|/(?|([0-9]+)(*:4206)|accept/([^/]++)(*:4230)|decline/([^/]++)(*:4255)|expire/([^/]++)(*:4279))|_payment/([0-9]+)(*:4306))|/([^/]++)(*:4325)|/duplicate\\-phone\\-number\\-check(?|(*:4369)|\\-for\\-existing\\-customer(*:4403)))/?$}sDu',
    ),
    3 => 
    array (
      42 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.clockwork',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      76 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.cache.delete',
            'tags' => NULL,
          ),
          1 => 
          array (
            0 => 'key',
            1 => 'tags',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      102 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.telescope',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      162 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YBxNTrt0a0fZDk1h',
          ),
          1 => 
          array (
            0 => 'telescopeEntryId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      181 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sEci0lndX956kKeE',
          ),
          1 => 
          array (
            0 => 'telescopeEntryId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      197 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NeCk4AZngDdCJ0MI',
          ),
          1 => 
          array (
            0 => 'telescopeEntryId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      221 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::AjbCxKPoCfJs1elu',
          ),
          1 => 
          array (
            0 => 'telescopeEntryId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      255 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wyVg1sbwIfhrORxH',
          ),
          1 => 
          array (
            0 => 'telescopeEntryId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vVzL6bV7z4BRb6ad',
          ),
          1 => 
          array (
            0 => 'telescopeEntryId',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      278 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::StMBMoK5PzRQJ9gw',
          ),
          1 => 
          array (
            0 => 'telescopeEntryId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      300 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pvHlXkoo6VGypr9A',
          ),
          1 => 
          array (
            0 => 'telescopeEntryId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      330 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QdBiwPrqBPuXNKQS',
          ),
          1 => 
          array (
            0 => 'telescopeEntryId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      351 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BtB08ypU58TgWQrt',
          ),
          1 => 
          array (
            0 => 'telescopeEntryId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      375 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BkYlgTWlUCZ6RhwI',
          ),
          1 => 
          array (
            0 => 'telescopeEntryId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      397 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::q57DJbmZ0FW1zFRX',
          ),
          1 => 
          array (
            0 => 'telescopeEntryId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      422 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fUl2fVZ6sJAJ4vTF',
          ),
          1 => 
          array (
            0 => 'telescopeEntryId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      446 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::n27j1RRw5MV1Hke0',
          ),
          1 => 
          array (
            0 => 'telescopeEntryId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      478 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WRjXbUDFHVdFnqlo',
          ),
          1 => 
          array (
            0 => 'telescopeEntryId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      503 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gZTAIhzQezJ4Gj8f',
          ),
          1 => 
          array (
            0 => 'telescopeEntryId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      531 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OejODpl74eu4Ql2C',
          ),
          1 => 
          array (
            0 => 'telescopeEntryId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      551 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gvVmm7IJc2v5bG8m',
          ),
          1 => 
          array (
            0 => 'telescopeEntryId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      574 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uQeF0KVk1CWk4qEt',
          ),
          1 => 
          array (
            0 => 'telescopeEntryId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      599 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WS6IFQaUbAz8EZ5S',
          ),
          1 => 
          array (
            0 => 'telescopeEntryId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      622 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'telescope',
            'view' => NULL,
          ),
          1 => 
          array (
            0 => 'view',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      666 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gateway.pay',
          ),
          1 => 
          array (
            0 => 'gateway',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      698 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gateway.complete',
          ),
          1 => 
          array (
            0 => 'gateway',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      716 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gateway.callback',
          ),
          1 => 
          array (
            0 => 'gateway',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      731 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gateway.cancel',
          ),
          1 => 
          array (
            0 => 'gateway',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      756 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'gateway.webhook',
          ),
          1 => 
          array (
            0 => 'gateway',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      787 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bEqcBc68xFNZSXjE',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      819 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'property.single',
          ),
          1 => 
          array (
            0 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      853 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5yGuMQ9TR7CW0Ki5',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      902 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Yz6agoSrw21wsiAo',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      949 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nUSDUhwHFxQEEq73',
            'secret' => NULL,
          ),
          1 => 
          array (
            0 => 'secret',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      957 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BuWoPDqytQDgcgt4',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      993 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Iepeea77bQepcoox',
            'code' => NULL,
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1014 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nZydj5bdJis5PSer',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1049 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GzXGj4qyztUea1M8',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1072 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::W2hVsljVkljtWFVx',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1112 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GmaMxfG9xkZohDM2',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1159 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'document.show',
          ),
          1 => 
          array (
            0 => 'document',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1173 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'document.edit',
          ),
          1 => 
          array (
            0 => 'document',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1182 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'document.update',
          ),
          1 => 
          array (
            0 => 'document',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'document.destroy',
          ),
          1 => 
          array (
            0 => 'document',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1219 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MVOp5oN7x0D7sqsw',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1244 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YT2Q7VbIIYCKKiRq',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1273 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4lkKss4qCGPTtDgp',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1294 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::741rzLlekSTqoGDN',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1325 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YCPeId2I8yK83sPW',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1347 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uWq8Z243l8RZFaUr',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1378 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::guw69kwROf0tbMWn',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1424 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'emergencycontacts.show',
          ),
          1 => 
          array (
            0 => 'emergencycontact',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1438 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'emergencycontacts.edit',
          ),
          1 => 
          array (
            0 => 'emergencycontact',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1447 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'emergencycontacts.update',
          ),
          1 => 
          array (
            0 => 'emergencycontact',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'emergencycontacts.destroy',
          ),
          1 => 
          array (
            0 => 'emergencycontact',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1482 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::eUkaR8ZM59zsGjtf',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LVdg86EO7QIjd8km',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1521 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IrbVwWFpF2xfFvs2',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1551 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::AZeXDx1GQbp48iAP',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1573 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1fMeURXFwfQ5V3H3',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1596 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::I1u8HAIMPmtDXHo6',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1626 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yCqxDTloSpVtmU28',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1657 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Mn9nhgJIcgEjpIEX',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1681 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::F1ICt9pMNUxVk80a',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1715 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.show',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1729 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.edit',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1738 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.update',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'city.destroy',
          ),
          1 => 
          array (
            0 => 'city',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1760 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'city.add',
          ),
          1 => 
          array (
            0 => 'countryId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1806 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ertbBNIAJYvw3B0R',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1836 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::94Jo5sjDBQ6APGzc',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1848 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XuzW8NheXhC6lFgb',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1880 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5b4CPgtad03RpNQh',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1909 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ahOAGoYBnQV2BiCN',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1921 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bN8buHkFjDZtBGa9',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1954 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MdRQMqbHFVn3UAyB',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1985 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kgUE7mMA6jdweDpE',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2009 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7OEN51EqNDI5ZyA8',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2046 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ynqjkazSkou84NDy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2058 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Dz6DmoTOTaiDZAqF',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2084 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mtsattSYpCgW380x',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2117 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'area.show',
          ),
          1 => 
          array (
            0 => 'area',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2131 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'area.edit',
          ),
          1 => 
          array (
            0 => 'area',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2140 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'area.update',
          ),
          1 => 
          array (
            0 => 'area',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'area.destroy',
          ),
          1 => 
          array (
            0 => 'area',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2162 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'area.add',
          ),
          1 => 
          array (
            0 => 'cityId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2200 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CezPs3AbeV6x1mWe',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2225 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::to87hrY1HBO6lWEW',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2261 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Lt9Pu9yfZAbFrgn2',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2315 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.get_areas',
          ),
          1 => 
          array (
            0 => 'countryId',
            1 => 'cityId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2357 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Gm1FIZf9wdWyGqwY',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2407 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bKAiHPFlUHUboDVk',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2433 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NfvXwqBYwWGj14ee',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2471 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7IWqJwCRGbfxChm4',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2499 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::EJevbXlfDr3mAb8A',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2532 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TN6Wv8H2WOPlrY7M',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2561 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::huXqkeH5QGb0XIlU',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2585 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::K8CfA8Eiq0jmBTI7',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2619 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UIRt1v5XnzqQQejv',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2645 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::flRaV37sRsotOQYK',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2667 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::dZVFYIrXKolnIUBS',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2691 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::SnazYAYxtcvILYa7',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2731 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0O0WJCJeorEH0WC5',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2757 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QqcQTz01CpgVKKEt',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2795 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bz6fvLvrlJZV4GLV',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2823 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xEVyEkCRnfnRJrMO',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2856 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ULpINvN4deCqkMBr',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2885 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MBSAgkO79Br8Tmtw',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2909 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::29vcN1UTfKNbNKZe',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2943 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TxHxLk6jRN8npdpS',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2969 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::l8qotWjJIC1GHX3c',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2991 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::iTL6TTNXPa2w5MAK',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3022 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kdfwjAZ5iNiv4aMA',
          ),
          1 => 
          array (
            0 => 'bank',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3039 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Z2G90cGdqGFQMjK4',
          ),
          1 => 
          array (
            0 => 'bank',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3063 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GlrlgWogoILjAF50',
          ),
          1 => 
          array (
            0 => 'bank',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3098 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ts8crN2hJ647ey8a',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3124 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lcyYmG9aJ5g3rZlF',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3163 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vQWQs2PFSlL73l8d',
            'secret' => NULL,
          ),
          1 => 
          array (
            0 => 'secret',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3172 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RpvbHD8IozBAPSiP',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3225 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cities-by-country',
          ),
          1 => 
          array (
            0 => 'country',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3259 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payouts.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3281 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9D7ue8ADwO3XYZwq',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3308 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jCLtrmvJxN8D6TtP',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3331 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JEkz3V6tzM2YvqHg',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3382 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::roUha6UU5pbPvbOz',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3397 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::eU0R6Be2HZnQJ4j9',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3420 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::48BBrbjeKmtXffrs',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3447 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hg8sRdQSJIIWishn',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'step',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3494 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vU49nV2ZpdTBXEDd',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3527 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.invoices.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3552 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zNbfuwleAE15O29r',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3599 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::T7P2E3jNH4brGP5T',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3618 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.bookings.details',
          ),
          1 => 
          array (
            0 => 'date',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3653 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3sebhgWNVIbuzsHV',
          ),
          1 => 
          array (
            0 => 'req',
            1 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3662 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.bookings.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3707 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.bookings.get-number-of-guests',
          ),
          1 => 
          array (
            0 => 'property_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3740 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.bookings.get-property-dates',
          ),
          1 => 
          array (
            0 => 'property_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3765 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.bookings.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3810 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0HZasghgtzH7fP2Q',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3843 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::17Lmf8md7x41IkIw',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3882 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::09zVEP8LGG0jlbBg',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3907 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vCBHiHRHHRbz88Ai',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3943 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8OjY4BLrKa1ubqU6',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3979 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9pWf7El2b5s7hOFB',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4010 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3Cxubcjp3Y7xh5K7',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4056 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::FJ11On0UvZcEA3l5',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4071 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XXczHJyXiDc5L3qQ',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4098 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gTIxFxfdtYirMxmh',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'step',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4146 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pEactzoMYp0YMwIr',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4173 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::M9YEbtUZp9off5CO',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4206 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::M8ae2eGxRT2is9YO',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4230 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jAH6G8tuDNT3NnNl',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4255 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GsUrCnUFywIZE4uH',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4279 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UxvXxe1XMexc2nUA',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4306 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CRfZyg3855FkPtfd',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4325 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0b7rj2CiFBk1oZcj',
          ),
          1 => 
          array (
            0 => 'name',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4369 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::s4jdARfeFxxzzQSJ',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4403 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ejRzL81r7ca1EfUu',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'debugbar.openhandler' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/open',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@handle',
        'as' => 'debugbar.openhandler',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@handle',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.clockwork' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/clockwork/{id}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@clockwork',
        'as' => 'debugbar.clockwork',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@clockwork',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.telescope' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/telescope/{id}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\TelescopeController@show',
        'as' => 'debugbar.telescope',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\TelescopeController@show',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.assets.css' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/assets/stylesheets',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@css',
        'as' => 'debugbar.assets.css',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@css',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.assets.js' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/assets/javascript',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@js',
        'as' => 'debugbar.assets.js',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@js',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.cache.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '_debugbar/cache/{key}/{tags?}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\CacheController@delete',
        'as' => 'debugbar.cache.delete',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\CacheController@delete',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.queries.explain' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_debugbar/queries/explain',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\QueriesController@explain',
        'as' => 'debugbar.queries.explain',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\QueriesController@explain',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::uxUBKdHLjwlJLCKY' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'telescope/telescope-api/mail',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\MailController@index',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\MailController@index',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::uxUBKdHLjwlJLCKY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::YBxNTrt0a0fZDk1h' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'telescope/telescope-api/mail/{telescopeEntryId}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\MailController@show',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\MailController@show',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::YBxNTrt0a0fZDk1h',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::sEci0lndX956kKeE' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'telescope/telescope-api/mail/{telescopeEntryId}/preview',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\MailHtmlController@show',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\MailHtmlController@show',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::sEci0lndX956kKeE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NeCk4AZngDdCJ0MI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'telescope/telescope-api/mail/{telescopeEntryId}/download',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\MailEmlController@show',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\MailEmlController@show',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::NeCk4AZngDdCJ0MI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::70J1O31e3Kd1UVwX' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'telescope/telescope-api/exceptions',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\ExceptionController@index',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\ExceptionController@index',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::70J1O31e3Kd1UVwX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wyVg1sbwIfhrORxH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'telescope/telescope-api/exceptions/{telescopeEntryId}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\ExceptionController@show',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\ExceptionController@show',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::wyVg1sbwIfhrORxH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vVzL6bV7z4BRb6ad' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'telescope/telescope-api/exceptions/{telescopeEntryId}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\ExceptionController@update',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\ExceptionController@update',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::vVzL6bV7z4BRb6ad',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::I2iZcIizxKgWo7A6' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'telescope/telescope-api/dumps',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\DumpController@index',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\DumpController@index',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::I2iZcIizxKgWo7A6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZY7USq5PbGBIuroO' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'telescope/telescope-api/logs',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\LogController@index',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\LogController@index',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::ZY7USq5PbGBIuroO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pvHlXkoo6VGypr9A' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'telescope/telescope-api/logs/{telescopeEntryId}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\LogController@show',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\LogController@show',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::pvHlXkoo6VGypr9A',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::d5Zy4EmD93EOJ4aP' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'telescope/telescope-api/notifications',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\NotificationsController@index',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\NotificationsController@index',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::d5Zy4EmD93EOJ4aP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QdBiwPrqBPuXNKQS' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'telescope/telescope-api/notifications/{telescopeEntryId}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\NotificationsController@show',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\NotificationsController@show',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::QdBiwPrqBPuXNKQS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::OlXX41zOf9EsIube' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'telescope/telescope-api/jobs',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\QueueController@index',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\QueueController@index',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::OlXX41zOf9EsIube',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BtB08ypU58TgWQrt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'telescope/telescope-api/jobs/{telescopeEntryId}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\QueueController@show',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\QueueController@show',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::BtB08ypU58TgWQrt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::2h9ayNJl5VKL2MBS' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'telescope/telescope-api/batches',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\QueueBatchesController@index',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\QueueBatchesController@index',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::2h9ayNJl5VKL2MBS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BkYlgTWlUCZ6RhwI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'telescope/telescope-api/batches/{telescopeEntryId}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\QueueBatchesController@show',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\QueueBatchesController@show',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::BkYlgTWlUCZ6RhwI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9m5W4O1pJE2U5WUb' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'telescope/telescope-api/events',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\EventsController@index',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\EventsController@index',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::9m5W4O1pJE2U5WUb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::StMBMoK5PzRQJ9gw' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'telescope/telescope-api/events/{telescopeEntryId}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\EventsController@show',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\EventsController@show',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::StMBMoK5PzRQJ9gw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xAMTBRJx4TudFsnZ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'telescope/telescope-api/gates',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\GatesController@index',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\GatesController@index',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::xAMTBRJx4TudFsnZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::q57DJbmZ0FW1zFRX' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'telescope/telescope-api/gates/{telescopeEntryId}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\GatesController@show',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\GatesController@show',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::q57DJbmZ0FW1zFRX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::cJeMdoR0JWXCHqJ8' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'telescope/telescope-api/cache',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\CacheController@index',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\CacheController@index',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::cJeMdoR0JWXCHqJ8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fUl2fVZ6sJAJ4vTF' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'telescope/telescope-api/cache/{telescopeEntryId}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\CacheController@show',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\CacheController@show',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::fUl2fVZ6sJAJ4vTF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xgnDKxn5FFdPl9mK' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'telescope/telescope-api/queries',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\QueriesController@index',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\QueriesController@index',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::xgnDKxn5FFdPl9mK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gZTAIhzQezJ4Gj8f' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'telescope/telescope-api/queries/{telescopeEntryId}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\QueriesController@show',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\QueriesController@show',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::gZTAIhzQezJ4Gj8f',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::uY5um8rApBsTHgdV' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'telescope/telescope-api/models',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\ModelsController@index',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\ModelsController@index',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::uY5um8rApBsTHgdV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::AjbCxKPoCfJs1elu' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'telescope/telescope-api/models/{telescopeEntryId}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\ModelsController@show',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\ModelsController@show',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::AjbCxKPoCfJs1elu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::bqHSi5FwrSsdRVcm' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'telescope/telescope-api/requests',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\RequestsController@index',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\RequestsController@index',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::bqHSi5FwrSsdRVcm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::OejODpl74eu4Ql2C' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'telescope/telescope-api/requests/{telescopeEntryId}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\RequestsController@show',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\RequestsController@show',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::OejODpl74eu4Ql2C',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::r7HkEQxhg3Fq4Y41' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'telescope/telescope-api/views',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\ViewsController@index',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\ViewsController@index',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::r7HkEQxhg3Fq4Y41',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::uQeF0KVk1CWk4qEt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'telescope/telescope-api/views/{telescopeEntryId}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\ViewsController@show',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\ViewsController@show',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::uQeF0KVk1CWk4qEt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::blBWjaDAFLmRdQIm' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'telescope/telescope-api/commands',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\CommandsController@index',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\CommandsController@index',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::blBWjaDAFLmRdQIm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::n27j1RRw5MV1Hke0' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'telescope/telescope-api/commands/{telescopeEntryId}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\CommandsController@show',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\CommandsController@show',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::n27j1RRw5MV1Hke0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::WTxZMccp3jwTJfzw' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'telescope/telescope-api/schedule',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\ScheduleController@index',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\ScheduleController@index',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::WTxZMccp3jwTJfzw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::WS6IFQaUbAz8EZ5S' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'telescope/telescope-api/schedule/{telescopeEntryId}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\ScheduleController@show',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\ScheduleController@show',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::WS6IFQaUbAz8EZ5S',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xB8ntzwClfQqGJhC' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'telescope/telescope-api/redis',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\RedisController@index',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\RedisController@index',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::xB8ntzwClfQqGJhC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gvVmm7IJc2v5bG8m' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'telescope/telescope-api/redis/{telescopeEntryId}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\RedisController@show',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\RedisController@show',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::gvVmm7IJc2v5bG8m',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::FvpaYDJ140HkIW75' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'telescope/telescope-api/client-requests',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\ClientRequestController@index',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\ClientRequestController@index',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::FvpaYDJ140HkIW75',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::WRjXbUDFHVdFnqlo' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'telescope/telescope-api/client-requests/{telescopeEntryId}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\ClientRequestController@show',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\ClientRequestController@show',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::WRjXbUDFHVdFnqlo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7A6O1wTZyOLyY2ao' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'telescope/telescope-api/monitored-tags',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\MonitoredTagController@index',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\MonitoredTagController@index',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::7A6O1wTZyOLyY2ao',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Nh0dWbcXgqeMDShU' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'telescope/telescope-api/monitored-tags',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\MonitoredTagController@store',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\MonitoredTagController@store',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::Nh0dWbcXgqeMDShU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZhD9i27zXTw7bSZi' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'telescope/telescope-api/monitored-tags/delete',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\MonitoredTagController@destroy',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\MonitoredTagController@destroy',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::ZhD9i27zXTw7bSZi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::WkEwVo9kX2C9Svsr' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'telescope/telescope-api/toggle-recording',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\RecordingController@toggle',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\RecordingController@toggle',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::WkEwVo9kX2C9Svsr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BjMZu3tTe78y1HXJ' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'telescope/telescope-api/entries',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\EntriesController@destroy',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\EntriesController@destroy',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'generated::BjMZu3tTe78y1HXJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'telescope' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'telescope/{view?}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 'telescope',
        'uses' => 'Laravel\\Telescope\\Http\\Controllers\\HomeController@index',
        'controller' => 'Laravel\\Telescope\\Http\\Controllers\\HomeController@index',
        'namespace' => 'Laravel\\Telescope\\Http\\Controllers',
        'prefix' => 'telescope',
        'where' => 
        array (
        ),
        'as' => 'telescope',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'view' => '(.*)',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.healthCheck' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_ignition/health-check',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController',
        'as' => 'ignition.healthCheck',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.executeSolution' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/execute-solution',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController',
        'as' => 'ignition.executeSolution',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.updateConfig' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/update-config',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController',
        'as' => 'ignition.updateConfig',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::2wD3rJHL3jY8o29W' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'broadcasting/auth',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => '\\Illuminate\\Broadcasting\\BroadcastController@authenticate',
        'controller' => '\\Illuminate\\Broadcasting\\BroadcastController@authenticate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'excluded_middleware' => 
        array (
          0 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
        ),
        'as' => 'generated::2wD3rJHL3jY8o29W',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bank.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'directbanktransfer/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\DirectBankTransfer\\Http\\Controllers\\DirectBankTransferController@store',
        'controller' => 'Modules\\DirectBankTransfer\\Http\\Controllers\\DirectBankTransferController@store',
        'as' => 'bank.store',
        'namespace' => 'Modules\\DirectBankTransfer\\Http\\Controllers',
        'prefix' => '/directbanktransfer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bank.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'directbanktransfer/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\DirectBankTransfer\\Http\\Controllers\\DirectBankTransferController@edit',
        'controller' => 'Modules\\DirectBankTransfer\\Http\\Controllers\\DirectBankTransferController@edit',
        'as' => 'bank.edit',
        'namespace' => 'Modules\\DirectBankTransfer\\Http\\Controllers',
        'prefix' => '/directbanktransfer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'flutterwave.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'gateway/flutterwave/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'permission:addons',
        ),
        'uses' => 'Modules\\Flutterwave\\Http\\Controllers\\FlutterwaveController@store',
        'controller' => 'Modules\\Flutterwave\\Http\\Controllers\\FlutterwaveController@store',
        'as' => 'flutterwave.store',
        'namespace' => 'Modules\\Flutterwave\\Http\\Controllers',
        'prefix' => '/gateway/flutterwave',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'flutterwave.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'gateway/flutterwave/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'permission:addons',
        ),
        'uses' => 'Modules\\Flutterwave\\Http\\Controllers\\FlutterwaveController@edit',
        'controller' => 'Modules\\Flutterwave\\Http\\Controllers\\FlutterwaveController@edit',
        'as' => 'flutterwave.edit',
        'namespace' => 'Modules\\Flutterwave\\Http\\Controllers',
        'prefix' => '/gateway/flutterwave',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::grcWguNbGbs8NfiH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/flutterwave',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000000000103c0000000000000000";}";s:4:"hash";s:44:"vqJuXT4n3RAmessO+bw69INWVPKJL+mJUuYCHP58OfY=";}}',
        'namespace' => 'Modules\\Flutterwave\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::grcWguNbGbs8NfiH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'gateway.confirmation' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'gateway/payment/confirmation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@paymentConfirmation',
        'controller' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@paymentConfirmation',
        'as' => 'gateway.confirmation',
        'namespace' => 'Modules\\Gateway\\Http\\Controllers',
        'prefix' => '/gateway',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'gateway.failed' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'gateway/payment/failed-payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@paymentFailed',
        'controller' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@paymentFailed',
        'as' => 'gateway.failed',
        'namespace' => 'Modules\\Gateway\\Http\\Controllers',
        'prefix' => '/gateway',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'gateway.payment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'gateway/payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@paymentGateways',
        'controller' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@paymentGateways',
        'as' => 'gateway.payment',
        'namespace' => 'Modules\\Gateway\\Http\\Controllers',
        'prefix' => '/gateway',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'gateway.pay' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'gateway/payment/{gateway}/pay',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'locale',
        ),
        'uses' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@pay',
        'controller' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@pay',
        'as' => 'gateway.pay',
        'namespace' => 'Modules\\Gateway\\Http\\Controllers',
        'prefix' => '/gateway',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'gateway.complete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'gateway/pay/{gateway}/complete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@makePayment',
        'controller' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@makePayment',
        'as' => 'gateway.complete',
        'namespace' => 'Modules\\Gateway\\Http\\Controllers',
        'prefix' => '/gateway',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'gateway.callback' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'gateway/pay/{gateway}/callback',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@paymentCallback',
        'controller' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@paymentCallback',
        'as' => 'gateway.callback',
        'namespace' => 'Modules\\Gateway\\Http\\Controllers',
        'prefix' => '/gateway',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'gateway.cancel' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'gateway/pay/{gateway}/cancelled',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@paymentCancelled',
        'controller' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@paymentCancelled',
        'as' => 'gateway.cancel',
        'namespace' => 'Modules\\Gateway\\Http\\Controllers',
        'prefix' => '/gateway',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'gateway.webhook' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'gateway/pay/{gateway}/payment_webhook',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@paymentHook',
        'controller' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@paymentHook',
        'as' => 'gateway.webhook',
        'namespace' => 'Modules\\Gateway\\Http\\Controllers',
        'prefix' => '/gateway',
        'where' => 
        array (
        ),
        'excluded_middleware' => 
        array (
          0 => 'App\\Http\\Middleware\\VerifyCsrfToken',
          1 => 'site.auth',
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'gateway.enable-module' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'gateway/enable-module',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'permission',
        ),
        'uses' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@enableModule',
        'controller' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@enableModule',
        'as' => 'gateway.enable-module',
        'namespace' => 'Modules\\Gateway\\Http\\Controllers',
        'prefix' => '/gateway',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'gateway.disable-module' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'gateway/disable-module',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'permission',
        ),
        'uses' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@disableModule',
        'controller' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@disableModule',
        'as' => 'gateway.disable-module',
        'namespace' => 'Modules\\Gateway\\Http\\Controllers',
        'prefix' => '/gateway',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'paypal.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'gateway/paypal/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'permission:addons',
        ),
        'uses' => 'Modules\\Paypal\\Http\\Controllers\\PaypalController@store',
        'controller' => 'Modules\\Paypal\\Http\\Controllers\\PaypalController@store',
        'as' => 'paypal.store',
        'namespace' => 'Modules\\Paypal\\Http\\Controllers',
        'prefix' => '/gateway/paypal',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'paypal.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'gateway/paypal/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'permission:addons',
        ),
        'uses' => 'Modules\\Paypal\\Http\\Controllers\\PaypalController@edit',
        'controller' => 'Modules\\Paypal\\Http\\Controllers\\PaypalController@edit',
        'as' => 'paypal.edit',
        'namespace' => 'Modules\\Paypal\\Http\\Controllers',
        'prefix' => '/gateway/paypal',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'paystack.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'gateway/paystack/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'permission:addons',
        ),
        'uses' => 'Modules\\Paystack\\Http\\Controllers\\PaystackController@store',
        'controller' => 'Modules\\Paystack\\Http\\Controllers\\PaystackController@store',
        'as' => 'paystack.store',
        'namespace' => 'Modules\\Paystack\\Http\\Controllers',
        'prefix' => '/gateway/paystack',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'paystack.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'gateway/paystack/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'permission:addons',
        ),
        'uses' => 'Modules\\Paystack\\Http\\Controllers\\PaystackController@edit',
        'controller' => 'Modules\\Paystack\\Http\\Controllers\\PaystackController@edit',
        'as' => 'paystack.edit',
        'namespace' => 'Modules\\Paystack\\Http\\Controllers',
        'prefix' => '/gateway/paystack',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'razorpay.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'razorpay/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'permission:addons',
        ),
        'uses' => 'Modules\\Razorpay\\Http\\Controllers\\RazorpayController@store',
        'controller' => 'Modules\\Razorpay\\Http\\Controllers\\RazorpayController@store',
        'as' => 'razorpay.store',
        'namespace' => 'Modules\\Razorpay\\Http\\Controllers',
        'prefix' => '/razorpay',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'razorpay.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'razorpay/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'permission:addons',
        ),
        'uses' => 'Modules\\Razorpay\\Http\\Controllers\\RazorpayController@edit',
        'controller' => 'Modules\\Razorpay\\Http\\Controllers\\RazorpayController@edit',
        'as' => 'razorpay.edit',
        'namespace' => 'Modules\\Razorpay\\Http\\Controllers',
        'prefix' => '/razorpay',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'stripe.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'gateway/stripe/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'permission:addons',
        ),
        'uses' => 'Modules\\Stripe\\Http\\Controllers\\StripeController@store',
        'controller' => 'Modules\\Stripe\\Http\\Controllers\\StripeController@store',
        'as' => 'stripe.store',
        'namespace' => 'Modules\\Stripe\\Http\\Controllers',
        'prefix' => '/gateway/stripe',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'stripe.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'gateway/stripe/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'permission:addons',
        ),
        'uses' => 'Modules\\Stripe\\Http\\Controllers\\StripeController@edit',
        'controller' => 'Modules\\Stripe\\Http\\Controllers\\StripeController@edit',
        'as' => 'stripe.edit',
        'namespace' => 'Modules\\Stripe\\Http\\Controllers',
        'prefix' => '/gateway/stripe',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BVgIfATQwjMEUgRj' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000cf60000000000000000";}";s:4:"hash";s:44:"IOAL91p6jAcIMSeoku8Pq5VWRRBZbDubgEQNhdBlSpk=";}}',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::BVgIfATQwjMEUgRj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::OGTjgULuLKtX9RjW' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'enable-debugger',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@activateDebugger',
        'controller' => 'App\\Http\\Controllers\\HomeController@activateDebugger',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::OGTjgULuLKtX9RjW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pZEQFdNPKhUulpm6' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'create-users-wallet',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@walletUser',
        'controller' => 'App\\Http\\Controllers\\HomeController@walletUser',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::pZEQFdNPKhUulpm6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Zt9pMjwnQ8163KY7' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cron',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CronController@index',
        'controller' => 'App\\Http\\Controllers\\CronController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Zt9pMjwnQ8163KY7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::EDVSHO2m2deXWixL' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'import',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CronController@importDump',
        'controller' => 'App\\Http\\Controllers\\CronController@importDump',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::EDVSHO2m2deXWixL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Z70kdRjneKoNtvUV' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cron/ical-synchronization',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CronController@iCalendarSynchronization',
        'controller' => 'App\\Http\\Controllers\\CronController@iCalendarSynchronization',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Z70kdRjneKoNtvUV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::aKQrjVZm6QcVvI90' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\HomeController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::aKQrjVZm6QcVvI90',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nqudqeDAPrC7flcA' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'search/result',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\SearchController@searchResult',
        'controller' => 'App\\Http\\Controllers\\SearchController@searchResult',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::nqudqeDAPrC7flcA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pHojNowvcDuwgYHb' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\SearchController@index',
        'controller' => 'App\\Http\\Controllers\\SearchController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::pHojNowvcDuwgYHb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'property.single' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'properties/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\PropertyController@single',
        'controller' => 'App\\Http\\Controllers\\PropertyController@single',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'property.single',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::oL7oy7HYjnJuT3mg' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'property/get-price',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\PropertyController@getPrice',
        'controller' => 'App\\Http\\Controllers\\PropertyController@getPrice',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::oL7oy7HYjnJuT3mg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vJ8SQuiTrRy7n9La' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'set-slug',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\PropertyController@set_slug',
        'controller' => 'App\\Http\\Controllers\\PropertyController@set_slug',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::vJ8SQuiTrRy7n9La',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4af56Ar4S09kcgM5' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'signup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\LoginController@signup',
        'controller' => 'App\\Http\\Controllers\\LoginController@signup',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::4af56Ar4S09kcgM5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Yz6agoSrw21wsiAo' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'unauthentication-favourite/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\PropertyController@unauthenticationFavourite',
        'controller' => 'App\\Http\\Controllers\\PropertyController@unauthenticationFavourite',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Yz6agoSrw21wsiAo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'checkUser.check' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'checkUser/check',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\LoginController@check',
        'controller' => 'App\\Http\\Controllers\\LoginController@check',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'checkUser.check',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zilBZHjuLMS5nznt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'set_session',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@setSession',
        'controller' => 'App\\Http\\Controllers\\HomeController@setSession',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::zilBZHjuLMS5nznt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zH382lpCxipsO7U5' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:288:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:70:"function () {
        return \\Redirect::to(\'admin/dashboard\');
    }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000d390000000000000000";}";s:4:"hash";s:44:"COmpB8CXoVJC+Ptfbrauba7ny5svX0PVURZxh8YagTc=";}}',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::zH382lpCxipsO7U5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6QMy0kQaquClLTL6' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/cache-clear',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@cacheClear',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@cacheClear',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::6QMy0kQaquClLTL6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'addon.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/addons',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AddonController@index',
        'controller' => 'App\\Http\\Controllers\\AddonController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'addon.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3B1BkacejRptU1p8' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/sms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SettingsController@smsSettings',
        'controller' => 'App\\Http\\Controllers\\Admin\\SettingsController@smsSettings',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::3B1BkacejRptU1p8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ghhjGD2n5JRDougK' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@profile',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@profile',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::ghhjGD2n5JRDougK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TjlfUL9rolQrkcPL' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@logout',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@logout',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::TjlfUL9rolQrkcPL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rmy40GWkFWjpcAxU' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\DashboardController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\DashboardController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::rmy40GWkFWjpcAxU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::bIfJwksnYK0UjGUM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/customers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:customers',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CustomerController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\CustomerController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::bIfJwksnYK0UjGUM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'document.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/document',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'as' => 'document.index',
        'uses' => 'App\\Http\\Controllers\\Admin\\DocumentController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\DocumentController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'document.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/document/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'as' => 'document.create',
        'uses' => 'App\\Http\\Controllers\\Admin\\DocumentController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\DocumentController@create',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'document.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/document',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'as' => 'document.store',
        'uses' => 'App\\Http\\Controllers\\Admin\\DocumentController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\DocumentController@store',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'document.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/document/{document}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'as' => 'document.show',
        'uses' => 'App\\Http\\Controllers\\Admin\\DocumentController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\DocumentController@show',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'document.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/document/{document}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'as' => 'document.edit',
        'uses' => 'App\\Http\\Controllers\\Admin\\DocumentController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\DocumentController@edit',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'document.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/document/{document}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'as' => 'document.update',
        'uses' => 'App\\Http\\Controllers\\Admin\\DocumentController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\DocumentController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'document.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/document/{document}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'as' => 'document.destroy',
        'uses' => 'App\\Http\\Controllers\\Admin\\DocumentController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\DocumentController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'emergencycontacts.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/emergencycontacts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'as' => 'emergencycontacts.index',
        'uses' => 'App\\Http\\Controllers\\Admin\\EmergencyContactController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\EmergencyContactController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'emergencycontacts.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/emergencycontacts/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'as' => 'emergencycontacts.create',
        'uses' => 'App\\Http\\Controllers\\Admin\\EmergencyContactController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\EmergencyContactController@create',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'emergencycontacts.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/emergencycontacts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'as' => 'emergencycontacts.store',
        'uses' => 'App\\Http\\Controllers\\Admin\\EmergencyContactController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\EmergencyContactController@store',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'emergencycontacts.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/emergencycontacts/{emergencycontact}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'as' => 'emergencycontacts.show',
        'uses' => 'App\\Http\\Controllers\\Admin\\EmergencyContactController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\EmergencyContactController@show',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'emergencycontacts.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/emergencycontacts/{emergencycontact}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'as' => 'emergencycontacts.edit',
        'uses' => 'App\\Http\\Controllers\\Admin\\EmergencyContactController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\EmergencyContactController@edit',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'emergencycontacts.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/emergencycontacts/{emergencycontact}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'as' => 'emergencycontacts.update',
        'uses' => 'App\\Http\\Controllers\\Admin\\EmergencyContactController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\EmergencyContactController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'emergencycontacts.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/emergencycontacts/{emergencycontact}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'as' => 'emergencycontacts.destroy',
        'uses' => 'App\\Http\\Controllers\\Admin\\EmergencyContactController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\EmergencyContactController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'city.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/city',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'as' => 'city.index',
        'uses' => 'App\\Http\\Controllers\\Admin\\CityController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\CityController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'city.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/city/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'as' => 'city.create',
        'uses' => 'App\\Http\\Controllers\\Admin\\CityController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\CityController@create',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'city.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/city',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'as' => 'city.store',
        'uses' => 'App\\Http\\Controllers\\Admin\\CityController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\CityController@store',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'city.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/city/{city}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'as' => 'city.show',
        'uses' => 'App\\Http\\Controllers\\Admin\\CityController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\CityController@show',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'city.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/city/{city}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'as' => 'city.edit',
        'uses' => 'App\\Http\\Controllers\\Admin\\CityController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\CityController@edit',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'city.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/city/{city}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'as' => 'city.update',
        'uses' => 'App\\Http\\Controllers\\Admin\\CityController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\CityController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'city.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/city/{city}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'as' => 'city.destroy',
        'uses' => 'App\\Http\\Controllers\\Admin\\CityController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\CityController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'area.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/area',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'as' => 'area.index',
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'area.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/area/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'as' => 'area.create',
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@create',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'area.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/area',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'as' => 'area.store',
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@store',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'area.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/area/{area}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'as' => 'area.show',
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@show',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'area.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/area/{area}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'as' => 'area.edit',
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@edit',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'area.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/area/{area}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'as' => 'area.update',
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'area.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/area/{area}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'as' => 'area.destroy',
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'city.add' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/city/add/{countryId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CityController@add',
        'controller' => 'App\\Http\\Controllers\\Admin\\CityController@add',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'city.add',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'area.add' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/area/add/{cityId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@add',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@add',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'area.add',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'city.addAjax' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/admin/add-ajax-city',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CityController@addAjax',
        'controller' => 'App\\Http\\Controllers\\Admin\\CityController@addAjax',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'city.addAjax',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'area.addAjax' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/admin/add-ajax-area',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AreaController@addAjax',
        'controller' => 'App\\Http\\Controllers\\Admin\\AreaController@addAjax',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'area.addAjax',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6WoFPOjHZavVmgfm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/customers/customer_search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:customers',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CustomerController@searchCustomer',
        'controller' => 'App\\Http\\Controllers\\Admin\\CustomerController@searchCustomer',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::6WoFPOjHZavVmgfm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::FYYCoJ2SdGy2vEd1' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/add-ajax-customer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:add_customer',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CustomerController@ajaxCustomerAdd',
        'controller' => 'App\\Http\\Controllers\\Admin\\CustomerController@ajaxCustomerAdd',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::FYYCoJ2SdGy2vEd1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CgRU5zlpJdXKMjP0' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/add-customer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:add_customer',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CustomerController@add',
        'controller' => 'App\\Http\\Controllers\\Admin\\CustomerController@add',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::CgRU5zlpJdXKMjP0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::MVOp5oN7x0D7sqsw' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/delete-customer/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:delete_customer',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CustomerController@delete',
        'controller' => 'App\\Http\\Controllers\\Admin\\CustomerController@delete',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::MVOp5oN7x0D7sqsw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::IrbVwWFpF2xfFvs2' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/edit-customer/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:edit_customer',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CustomerController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\CustomerController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::IrbVwWFpF2xfFvs2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ertbBNIAJYvw3B0R' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/customer/properties/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:edit_customer',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CustomerController@customerProperties',
        'controller' => 'App\\Http\\Controllers\\Admin\\CustomerController@customerProperties',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::ertbBNIAJYvw3B0R',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::kgUE7mMA6jdweDpE' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/customer/bookings/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:edit_customer',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CustomerController@customerBookings',
        'controller' => 'App\\Http\\Controllers\\Admin\\CustomerController@customerBookings',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::kgUE7mMA6jdweDpE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7OEN51EqNDI5ZyA8' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/customer/bookings/property_search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:edit_customer',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BookingsController@searchProperty',
        'controller' => 'App\\Http\\Controllers\\Admin\\BookingsController@searchProperty',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::7OEN51EqNDI5ZyA8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5b4CPgtad03RpNQh' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/customer/payouts/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:edit_customer',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CustomerController@customerPayouts',
        'controller' => 'App\\Http\\Controllers\\Admin\\CustomerController@customerPayouts',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::5b4CPgtad03RpNQh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::MdRQMqbHFVn3UAyB' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/customer/payment-methods/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:edit_customer',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CustomerController@paymentMethods',
        'controller' => 'App\\Http\\Controllers\\Admin\\CustomerController@paymentMethods',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::MdRQMqbHFVn3UAyB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mtsattSYpCgW380x' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/customer/wallet/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:edit_customer',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CustomerController@customerWallet',
        'controller' => 'App\\Http\\Controllers\\Admin\\CustomerController@customerWallet',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::mtsattSYpCgW380x',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::L6OvQR83gaJ8Xl16' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/currency-symbol',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:edit_customer',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PropertiesController@currencySymbol',
        'controller' => 'App\\Http\\Controllers\\Admin\\PropertiesController@currencySymbol',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::L6OvQR83gaJ8Xl16',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::94Jo5sjDBQ6APGzc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/customer/properties/{id}/property_list_csv',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:edit_customer',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PropertiesController@propertyCsv',
        'controller' => 'App\\Http\\Controllers\\Admin\\PropertiesController@propertyCsv',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::94Jo5sjDBQ6APGzc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XuzW8NheXhC6lFgb' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/customer/properties/{id}/property_list_pdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:edit_customer',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PropertiesController@propertyPdf',
        'controller' => 'App\\Http\\Controllers\\Admin\\PropertiesController@propertyPdf',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::XuzW8NheXhC6lFgb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ynqjkazSkou84NDy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/customer/bookings/{id}/booking_list_csv',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:edit_customer',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BookingsController@bookingCsv',
        'controller' => 'App\\Http\\Controllers\\Admin\\BookingsController@bookingCsv',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::ynqjkazSkou84NDy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Dz6DmoTOTaiDZAqF' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/customer/bookings/{id}/booking_list_pdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:edit_customer',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BookingsController@bookingPdf',
        'controller' => 'App\\Http\\Controllers\\Admin\\BookingsController@bookingPdf',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::Dz6DmoTOTaiDZAqF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ahOAGoYBnQV2BiCN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/customer/payouts/{id}/payouts_list_pdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:edit_customer',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PayoutsController@payoutsPdf',
        'controller' => 'App\\Http\\Controllers\\Admin\\PayoutsController@payoutsPdf',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::ahOAGoYBnQV2BiCN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::bN8buHkFjDZtBGa9' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/customer/payouts/{id}/payouts_list_csv',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:edit_customer',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PayoutsController@payoutsCsv',
        'controller' => 'App\\Http\\Controllers\\Admin\\PayoutsController@payoutsCsv',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::bN8buHkFjDZtBGa9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::tWhjLyccofwo8Ph5' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/customer/customer_list_csv',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:edit_customer',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CustomerController@customerCsv',
        'controller' => 'App\\Http\\Controllers\\Admin\\CustomerController@customerCsv',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::tWhjLyccofwo8Ph5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::79AukWTwX81Rj1TX' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/customer/customer_list_pdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:edit_customer',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CustomerController@customerPdf',
        'controller' => 'App\\Http\\Controllers\\Admin\\CustomerController@customerPdf',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::79AukWTwX81Rj1TX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xiALBb8b1mgxpQu9' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/messages',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_messages',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@customerMessage',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@customerMessage',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::xiALBb8b1mgxpQu9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::YT2Q7VbIIYCKKiRq' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/delete-message/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_messages',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@deleteMessage',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@deleteMessage',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::YT2Q7VbIIYCKKiRq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Gm1FIZf9wdWyGqwY' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/send-message-email/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_messages',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@sendEmail',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@sendEmail',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::Gm1FIZf9wdWyGqwY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'upload' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/upload_image',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_messages',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@uploadImage',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@uploadImage',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'upload',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ts8crN2hJ647ey8a' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/messaging/host/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_messages',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@hostMessage',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@hostMessage',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::ts8crN2hJ647ey8a',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::lcyYmG9aJ5g3rZlF' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/reply/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_messages',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@reply',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@reply',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::lcyYmG9aJ5g3rZlF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ibKQDUKPvvF1j1dM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/properties',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:properties',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PropertiesController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\PropertiesController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::ibKQDUKPvvF1j1dM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qlokuUzkz55mdek5' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/add-properties',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:add_properties',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PropertiesController@add',
        'controller' => 'App\\Http\\Controllers\\Admin\\PropertiesController@add',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::qlokuUzkz55mdek5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cities-by-country' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/properties/cities-by-country/{country}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PropertiesController@getCitiesByCountry',
        'controller' => 'App\\Http\\Controllers\\Admin\\PropertiesController@getCitiesByCountry',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'cities-by-country',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::PTSwZRFq70iQZUUZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/properties/property_list_csv',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PropertiesController@propertyCsv',
        'controller' => 'App\\Http\\Controllers\\Admin\\PropertiesController@propertyCsv',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::PTSwZRFq70iQZUUZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZcGEM901tJXIBMtt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/properties/property_list_pdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PropertiesController@propertyPdf',
        'controller' => 'App\\Http\\Controllers\\Admin\\PropertiesController@propertyPdf',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::ZcGEM901tJXIBMtt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::roUha6UU5pbPvbOz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/listing/{id}/photo_message',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:edit_properties',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PropertiesController@photoMessage',
        'controller' => 'App\\Http\\Controllers\\Admin\\PropertiesController@photoMessage',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::roUha6UU5pbPvbOz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::eU0R6Be2HZnQJ4j9' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/listing/{id}/photo_delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:edit_properties',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PropertiesController@photoDelete',
        'controller' => 'App\\Http\\Controllers\\Admin\\PropertiesController@photoDelete',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::eU0R6Be2HZnQJ4j9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::48BBrbjeKmtXffrs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/listing/{id}/update_status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:edit_properties',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PropertiesController@update_status',
        'controller' => 'App\\Http\\Controllers\\Admin\\PropertiesController@update_status',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::48BBrbjeKmtXffrs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::cKulkleM0rSuYN1U' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/listing/photo/make_default_photo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:edit_properties',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PropertiesController@makeDefaultPhoto',
        'controller' => 'App\\Http\\Controllers\\Admin\\PropertiesController@makeDefaultPhoto',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::cKulkleM0rSuYN1U',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KMaYu3Ef1CRMJVnA' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/listing/photo/make_photo_serial',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:edit_properties',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PropertiesController@makePhotoSerial',
        'controller' => 'App\\Http\\Controllers\\Admin\\PropertiesController@makePhotoSerial',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::KMaYu3Ef1CRMJVnA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hg8sRdQSJIIWishn' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/listing/{id}/{step}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:edit_properties',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PropertiesController@listing',
        'controller' => 'App\\Http\\Controllers\\Admin\\PropertiesController@listing',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::hg8sRdQSJIIWishn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'id' => '[0-9]+',
        'page' => 'basics|description|location|amenities|photos|pricing|calendar|details|booking',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CezPs3AbeV6x1mWe' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/ajax-calender/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CalendarController@calenderJson',
        'controller' => 'App\\Http\\Controllers\\Admin\\CalendarController@calenderJson',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::CezPs3AbeV6x1mWe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::to87hrY1HBO6lWEW' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/ajax-calender-price/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CalendarController@calenderPriceSet',
        'controller' => 'App\\Http\\Controllers\\Admin\\CalendarController@calenderPriceSet',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::to87hrY1HBO6lWEW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Lt9Pu9yfZAbFrgn2' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/ajax-icalender-import/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CalendarController@icalendarImport',
        'controller' => 'App\\Http\\Controllers\\Admin\\CalendarController@icalendarImport',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::Lt9Pu9yfZAbFrgn2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vU49nV2ZpdTBXEDd' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/icalendar/synchronization/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CalendarController@icalendarSynchronization',
        'controller' => 'App\\Http\\Controllers\\Admin\\CalendarController@icalendarSynchronization',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::vU49nV2ZpdTBXEDd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Mn9nhgJIcgEjpIEX' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/edit_property/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:edit_properties',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PropertiesController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\PropertiesController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::Mn9nhgJIcgEjpIEX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4lkKss4qCGPTtDgp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/delete-property/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:delete_property',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PropertiesController@delete',
        'controller' => 'App\\Http\\Controllers\\Admin\\PropertiesController@delete',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::4lkKss4qCGPTtDgp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.bookings.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/bookings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_bookings',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BookingsController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\BookingsController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.bookings.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XkhqCoRxK97DkBpB' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/bookings/property_search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_bookings',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BookingsController@searchProperty',
        'controller' => 'App\\Http\\Controllers\\Admin\\BookingsController@searchProperty',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::XkhqCoRxK97DkBpB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.bookings.customer_search' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/bookings/customer_search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_bookings',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BookingsController@searchCustomer',
        'controller' => 'App\\Http\\Controllers\\Admin\\BookingsController@searchCustomer',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.bookings.customer_search',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::T7P2E3jNH4brGP5T' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/bookings/detail/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_bookings',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BookingsController@details',
        'controller' => 'App\\Http\\Controllers\\Admin\\BookingsController@details',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::T7P2E3jNH4brGP5T',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3sebhgWNVIbuzsHV' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/bookings/edit/{req}/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_bookings',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BookingsController@updateBookingStatus',
        'controller' => 'App\\Http\\Controllers\\Admin\\BookingsController@updateBookingStatus',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::3sebhgWNVIbuzsHV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::lW9SJUqJ0vERNLor' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/bookings/pay',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_bookings',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BookingsController@pay',
        'controller' => 'App\\Http\\Controllers\\Admin\\BookingsController@pay',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::lW9SJUqJ0vERNLor',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0HZasghgtzH7fP2Q' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/booking/need_pay_account/{id}/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BookingsController@needPayAccount',
        'controller' => 'App\\Http\\Controllers\\Admin\\BookingsController@needPayAccount',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::0HZasghgtzH7fP2Q',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::dOut3vxp4xfFDmIY' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/booking/booking_list_csv',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BookingsController@bookingCsv',
        'controller' => 'App\\Http\\Controllers\\Admin\\BookingsController@bookingCsv',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::dOut3vxp4xfFDmIY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::A1cj2qfghLOqWls2' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/booking/booking_list_pdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BookingsController@bookingPdf',
        'controller' => 'App\\Http\\Controllers\\Admin\\BookingsController@bookingPdf',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::A1cj2qfghLOqWls2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.invoices.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/invoices',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_invoices',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\InvoiceController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\InvoiceController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.invoices.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.invoices.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/invoices/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_invoices',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\InvoiceController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\InvoiceController@show',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.invoices.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::FyhR06THV9ipVyau' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/payouts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:view_payouts',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PayoutsController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\PayoutsController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::FyhR06THV9ipVyau',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zNbfuwleAE15O29r' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/invoices/invoice/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\InvoiceController@getInvoiceByUserId',
        'controller' => 'App\\Http\\Controllers\\Admin\\InvoiceController@getInvoiceByUserId',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::zNbfuwleAE15O29r',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payouts.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/payouts/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PayoutsController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\PayoutsController@create',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'payouts.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payouts.asuccess' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/payouts/create/success',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PayoutsController@asuccess',
        'controller' => 'App\\Http\\Controllers\\Admin\\PayoutsController@asuccess',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'payouts.asuccess',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payouts.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/payouts/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PayoutsController@updatePayout',
        'controller' => 'App\\Http\\Controllers\\Admin\\PayoutsController@updatePayout',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'payouts.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9D7ue8ADwO3XYZwq' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/payouts/edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PayoutsController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\PayoutsController@edit',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::9D7ue8ADwO3XYZwq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jCLtrmvJxN8D6TtP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/payouts/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PayoutsController@delete',
        'controller' => 'App\\Http\\Controllers\\Admin\\PayoutsController@delete',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::jCLtrmvJxN8D6TtP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::JEkz3V6tzM2YvqHg' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/payouts/details/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PayoutsController@details',
        'controller' => 'App\\Http\\Controllers\\Admin\\PayoutsController@details',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::JEkz3V6tzM2YvqHg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8G2u8wGH33lMCZJl' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/payouts/payouts_list_pdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PayoutsController@payoutsPdf',
        'controller' => 'App\\Http\\Controllers\\Admin\\PayoutsController@payoutsPdf',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::8G2u8wGH33lMCZJl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::cSumFMzqVq63BcYT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/payouts/payouts_list_csv',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PayoutsController@payoutsCsv',
        'controller' => 'App\\Http\\Controllers\\Admin\\PayoutsController@payoutsCsv',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::cSumFMzqVq63BcYT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UjZenQL5MlZoSh5b' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/reviews',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_reviews',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ReviewsController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\ReviewsController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::UjZenQL5MlZoSh5b',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::F1ICt9pMNUxVk80a' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/edit_review/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_reviews',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ReviewsController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\ReviewsController@edit',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::F1ICt9pMNUxVk80a',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::WTogl6SkpokTQRcu' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/reviews/review_search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_reviews',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ReviewsController@searchReview',
        'controller' => 'App\\Http\\Controllers\\Admin\\ReviewsController@searchReview',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::WTogl6SkpokTQRcu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::aMhZNUP2paKlF51w' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/reviews/review_list_csv',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_reviews',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ReviewsController@reviewCsv',
        'controller' => 'App\\Http\\Controllers\\Admin\\ReviewsController@reviewCsv',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::aMhZNUP2paKlF51w',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::agLhV8IiOjBvpRbZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/reviews/review_list_pdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_reviews',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ReviewsController@reviewPdf',
        'controller' => 'App\\Http\\Controllers\\Admin\\ReviewsController@reviewPdf',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::agLhV8IiOjBvpRbZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4TZWw8xm2Ja4Kq1V' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/sales-report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:view_reports',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ReportsController@salesReports',
        'controller' => 'App\\Http\\Controllers\\Admin\\ReportsController@salesReports',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::4TZWw8xm2Ja4Kq1V',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::eICwmWuQHPiuNeHb' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/sales-analysis',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:view_reports',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ReportsController@salesAnalysis',
        'controller' => 'App\\Http\\Controllers\\Admin\\ReportsController@salesAnalysis',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::eICwmWuQHPiuNeHb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::am0xp0Yy49g5koEk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/reports/property-search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:view_reports',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ReportsController@searchProperty',
        'controller' => 'App\\Http\\Controllers\\Admin\\ReportsController@searchProperty',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::am0xp0Yy49g5koEk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ohzdlCUKrbbYQXeO' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/overview-stats',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:view_reports',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ReportsController@overviewStats',
        'controller' => 'App\\Http\\Controllers\\Admin\\ReportsController@overviewStats',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::ohzdlCUKrbbYQXeO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fxFL7IoBegY7c4MI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/amenities',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_amenities',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AmenitiesController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\AmenitiesController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::fxFL7IoBegY7c4MI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4sxrzbCNmbKzjjs5' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/add-amenities',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_amenities',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AmenitiesController@add',
        'controller' => 'App\\Http\\Controllers\\Admin\\AmenitiesController@add',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::4sxrzbCNmbKzjjs5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::AZeXDx1GQbp48iAP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/edit-amenities/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_amenities',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AmenitiesController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\AmenitiesController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::AZeXDx1GQbp48iAP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::YCPeId2I8yK83sPW' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/delete-amenities/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_amenities',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AmenitiesController@delete',
        'controller' => 'App\\Http\\Controllers\\Admin\\AmenitiesController@delete',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::YCPeId2I8yK83sPW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gbRGOdn43HHdl8DI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/pages',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_pages',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PagesController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\PagesController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::gbRGOdn43HHdl8DI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1emsQMNGptOTRsrp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/add-page',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_pages',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PagesController@add',
        'controller' => 'App\\Http\\Controllers\\Admin\\PagesController@add',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::1emsQMNGptOTRsrp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::I1u8HAIMPmtDXHo6' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/edit-page/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_pages',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PagesController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\PagesController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::I1u8HAIMPmtDXHo6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::741rzLlekSTqoGDN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/delete-page/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_pages',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PagesController@delete',
        'controller' => 'App\\Http\\Controllers\\Admin\\PagesController@delete',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::741rzLlekSTqoGDN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::EbfBn1oTynkRVX1d' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/admin-users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::EbfBn1oTynkRVX1d',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::RovnU7xWy8A0rCmH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/add-admin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@add',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@add',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::RovnU7xWy8A0rCmH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1fMeURXFwfQ5V3H3' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/edit-admin/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::1fMeURXFwfQ5V3H3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::uWq8Z243l8RZFaUr' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/delete-admin/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@delete',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@delete',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::uWq8Z243l8RZFaUr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3xbIVvjGbSBPRZZM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:general_setting',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SettingsController@general',
        'controller' => 'App\\Http\\Controllers\\Admin\\SettingsController@general',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::3xbIVvjGbSBPRZZM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::oEsXXKWd5Ti8nf2t' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/preferences',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:preference',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SettingsController@preferences',
        'controller' => 'App\\Http\\Controllers\\Admin\\SettingsController@preferences',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::oEsXXKWd5Ti8nf2t',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NIwarJvZ0vD7tVrk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/getreCaptchaCredential',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SettingsController@getreCaptchaCredential',
        'controller' => 'App\\Http\\Controllers\\Admin\\SettingsController@getreCaptchaCredential',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::NIwarJvZ0vD7tVrk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LzhC6w2jovOnJ9Wn' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/settings/delete_logo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SettingsController@deleteLogo',
        'controller' => 'App\\Http\\Controllers\\Admin\\SettingsController@deleteLogo',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::LzhC6w2jovOnJ9Wn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VKnYBuLoLIZWQBU6' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/settings/delete_favicon',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SettingsController@deleteFavIcon',
        'controller' => 'App\\Http\\Controllers\\Admin\\SettingsController@deleteFavIcon',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::VKnYBuLoLIZWQBU6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::lSUvmZvjLiMWr58w' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/fees',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_fees',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SettingsController@fees',
        'controller' => 'App\\Http\\Controllers\\Admin\\SettingsController@fees',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::lSUvmZvjLiMWr58w',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::11pocAlPAVhhEdPY' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/banners',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_banners',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BannersController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\BannersController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::11pocAlPAVhhEdPY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::WUPg2JO2WzHmHums' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/add-banners',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_banners',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BannersController@add',
        'controller' => 'App\\Http\\Controllers\\Admin\\BannersController@add',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::WUPg2JO2WzHmHums',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::bKAiHPFlUHUboDVk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/edit-banners/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_banners',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BannersController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\BannersController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::bKAiHPFlUHUboDVk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0O0WJCJeorEH0WC5' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/delete-banners/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_banners',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BannersController@delete',
        'controller' => 'App\\Http\\Controllers\\Admin\\BannersController@delete',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::0O0WJCJeorEH0WC5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vHfLPLraLfVxJzTB' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/starting-cities',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:starting_cities_settings',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\StartingCitiesController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\StartingCitiesController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::vHfLPLraLfVxJzTB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xozeRRcY6Iw6ZLWP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/add-starting-cities',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:starting_cities_settings',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\StartingCitiesController@add',
        'controller' => 'App\\Http\\Controllers\\Admin\\StartingCitiesController@add',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::xozeRRcY6Iw6ZLWP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7IWqJwCRGbfxChm4' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/edit-starting-cities/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:starting_cities_settings',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\StartingCitiesController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\StartingCitiesController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::7IWqJwCRGbfxChm4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::bz6fvLvrlJZV4GLV' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/delete-starting-cities/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:starting_cities_settings',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\StartingCitiesController@delete',
        'controller' => 'App\\Http\\Controllers\\Admin\\StartingCitiesController@delete',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::bz6fvLvrlJZV4GLV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hi6MF6LQd1RRX2wv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/property-type',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_property_type',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PropertyTypeController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\PropertyTypeController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::hi6MF6LQd1RRX2wv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::AeGPqpfbKjHzjGTw' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/add-property-type',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_property_type',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PropertyTypeController@add',
        'controller' => 'App\\Http\\Controllers\\Admin\\PropertyTypeController@add',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::AeGPqpfbKjHzjGTw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TN6Wv8H2WOPlrY7M' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/edit-property-type/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_property_type',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PropertyTypeController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\PropertyTypeController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::TN6Wv8H2WOPlrY7M',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ULpINvN4deCqkMBr' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/delete-property-type/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_property_type',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PropertyTypeController@delete',
        'controller' => 'App\\Http\\Controllers\\Admin\\PropertyTypeController@delete',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::ULpINvN4deCqkMBr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HQasWhApGBnm3DDQ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/space-type',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:space_type_setting',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SpaceTypeController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\SpaceTypeController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::HQasWhApGBnm3DDQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::RvvdpLjALk18jgQV' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/add-space-type',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:space_type_setting',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SpaceTypeController@add',
        'controller' => 'App\\Http\\Controllers\\Admin\\SpaceTypeController@add',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::RvvdpLjALk18jgQV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::EJevbXlfDr3mAb8A' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/edit-space-type/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:space_type_setting',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SpaceTypeController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\SpaceTypeController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::EJevbXlfDr3mAb8A',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xEVyEkCRnfnRJrMO' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/delete-space-type/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:space_type_setting',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SpaceTypeController@delete',
        'controller' => 'App\\Http\\Controllers\\Admin\\SpaceTypeController@delete',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::xEVyEkCRnfnRJrMO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Nye6oZhVJQ3lfikr' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/bed-type',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_bed_type',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BedTypeController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\BedTypeController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::Nye6oZhVJQ3lfikr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::l1QiJiEx7R8o4GN3' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/add-bed-type',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_bed_type',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BedTypeController@add',
        'controller' => 'App\\Http\\Controllers\\Admin\\BedTypeController@add',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::l1QiJiEx7R8o4GN3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NfvXwqBYwWGj14ee' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/edit-bed-type/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_bed_type',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BedTypeController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\BedTypeController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::NfvXwqBYwWGj14ee',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QqcQTz01CpgVKKEt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/delete-bed-type/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_bed_type',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BedTypeController@delete',
        'controller' => 'App\\Http\\Controllers\\Admin\\BedTypeController@delete',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::QqcQTz01CpgVKKEt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4yHwDXtFRXw1Csx6' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/currency',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_currency',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CurrencyController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\CurrencyController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::4yHwDXtFRXw1Csx6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::C6C7khW7geOObX7p' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/add-currency',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_currency',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CurrencyController@add',
        'controller' => 'App\\Http\\Controllers\\Admin\\CurrencyController@add',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::C6C7khW7geOObX7p',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::huXqkeH5QGb0XIlU' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/edit-currency/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_currency',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CurrencyController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\CurrencyController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::huXqkeH5QGb0XIlU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::MBSAgkO79Br8Tmtw' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/delete-currency/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_currency',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CurrencyController@delete',
        'controller' => 'App\\Http\\Controllers\\Admin\\CurrencyController@delete',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::MBSAgkO79Br8Tmtw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Itia0B5KbF95MINp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/country',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_country',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CountryController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\CountryController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::Itia0B5KbF95MINp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::yWOAHkh8KOGs9ix3' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/add-country',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_country',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CountryController@add',
        'controller' => 'App\\Http\\Controllers\\Admin\\CountryController@add',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::yWOAHkh8KOGs9ix3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::K8CfA8Eiq0jmBTI7' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/edit-country/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_country',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CountryController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\CountryController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::K8CfA8Eiq0jmBTI7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::29vcN1UTfKNbNKZe' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/delete-country/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_country',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CountryController@delete',
        'controller' => 'App\\Http\\Controllers\\Admin\\CountryController@delete',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::29vcN1UTfKNbNKZe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::e9PPIdylqzxETfBj' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/amenities-type',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_amenities_type',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AmenitiesTypeController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\AmenitiesTypeController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::e9PPIdylqzxETfBj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ED2tOUEMVUVvZ9fE' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/add-amenities-type',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_amenities_type',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AmenitiesTypeController@add',
        'controller' => 'App\\Http\\Controllers\\Admin\\AmenitiesTypeController@add',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::ED2tOUEMVUVvZ9fE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UIRt1v5XnzqQQejv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/edit-amenities-type/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_amenities_type',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AmenitiesTypeController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\AmenitiesTypeController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::UIRt1v5XnzqQQejv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TxHxLk6jRN8npdpS' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/delete-amenities-type/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_amenities_type',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AmenitiesTypeController@delete',
        'controller' => 'App\\Http\\Controllers\\Admin\\AmenitiesTypeController@delete',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::TxHxLk6jRN8npdpS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XC0ejLE0r4Rh5bVi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:email_settings',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SettingsController@email',
        'controller' => 'App\\Http\\Controllers\\Admin\\SettingsController@email',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::XC0ejLE0r4Rh5bVi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rHV5xoklc8WGozzn' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/language',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_language',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\LanguageController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\LanguageController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::rHV5xoklc8WGozzn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BIYhwnyG5SRNGOJs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/add-language',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_language',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\LanguageController@add',
        'controller' => 'App\\Http\\Controllers\\Admin\\LanguageController@add',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::BIYhwnyG5SRNGOJs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::flRaV37sRsotOQYK' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/edit-language/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_language',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\LanguageController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\LanguageController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::flRaV37sRsotOQYK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::l8qotWjJIC1GHX3c' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/delete-language/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_language',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\LanguageController@delete',
        'controller' => 'App\\Http\\Controllers\\Admin\\LanguageController@delete',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::l8qotWjJIC1GHX3c',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qvCKbFWBqh2ZOgds' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/metas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_metas',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\MetasController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\MetasController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::qvCKbFWBqh2ZOgds',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::SnazYAYxtcvILYa7' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/edit_meta/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_metas',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\MetasController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\MetasController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::SnazYAYxtcvILYa7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::465TTszu13fH3OLh' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/api-informations',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:api_informations',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SettingsController@apiInformations',
        'controller' => 'App\\Http\\Controllers\\Admin\\SettingsController@apiInformations',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::465TTszu13fH3OLh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::243bf4wTe7S1Okis' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/google-recaptcha-api-information',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:google_recaptcha',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SettingsController@googleRecaptchaInformation',
        'controller' => 'App\\Http\\Controllers\\Admin\\SettingsController@googleRecaptchaInformation',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::243bf4wTe7S1Okis',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::g3CxNBHjyiNQVFUL' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/payment-methods',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:payment_settings',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SettingsController@paymentMethods',
        'controller' => 'App\\Http\\Controllers\\Admin\\SettingsController@paymentMethods',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::g3CxNBHjyiNQVFUL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vxhZD4nXXr7Kngkx' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/bank/add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:payment_settings',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BankController@addBank',
        'controller' => 'App\\Http\\Controllers\\Admin\\BankController@addBank',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::vxhZD4nXXr7Kngkx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::kdfwjAZ5iNiv4aMA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/bank/edit/{bank}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:payment_settings',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BankController@editBank',
        'controller' => 'App\\Http\\Controllers\\Admin\\BankController@editBank',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::kdfwjAZ5iNiv4aMA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Z2G90cGdqGFQMjK4' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/bank/{bank}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:payment_settings',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BankController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\BankController@show',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::Z2G90cGdqGFQMjK4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::GlrlgWogoILjAF50' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/bank/delete/{bank}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:payment_settings',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BankController@deleteBank',
        'controller' => 'App\\Http\\Controllers\\Admin\\BankController@deleteBank',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::GlrlgWogoILjAF50',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qLSj46dg4XFZiji3' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/social-links',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:social_links',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SettingsController@socialLinks',
        'controller' => 'App\\Http\\Controllers\\Admin\\SettingsController@socialLinks',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::qLSj46dg4XFZiji3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0r0NvgZvNtdGDsS0' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/social-logins',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:social_logins',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SettingsController@socialLogin',
        'controller' => 'App\\Http\\Controllers\\Admin\\SettingsController@socialLogin',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::0r0NvgZvNtdGDsS0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Dk13cO2aCpkKvxmj' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/roles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_roles',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\RolesController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\RolesController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::Dk13cO2aCpkKvxmj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3s8LdLJDYw9lqfVC' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/add-role',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_roles',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\RolesController@add',
        'controller' => 'App\\Http\\Controllers\\Admin\\RolesController@add',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::3s8LdLJDYw9lqfVC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::dZVFYIrXKolnIUBS' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/settings/edit-role/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_roles',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\RolesController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\RolesController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::dZVFYIrXKolnIUBS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::iTL6TTNXPa2w5MAK' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/delete-role/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_roles',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\RolesController@delete',
        'controller' => 'App\\Http\\Controllers\\Admin\\RolesController@delete',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::iTL6TTNXPa2w5MAK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::yOBJLKbwwdtTQGaq' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/backup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:database_backup',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BackupController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\BackupController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::yOBJLKbwwdtTQGaq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mpIGer87my6mPFZK' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/backup/save',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:database_backup',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BackupController@add',
        'controller' => 'App\\Http\\Controllers\\Admin\\BackupController@add',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::mpIGer87my6mPFZK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::17Lmf8md7x41IkIw' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/backup/download/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:database_backup',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BackupController@download',
        'controller' => 'App\\Http\\Controllers\\Admin\\BackupController@download',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::17Lmf8md7x41IkIw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::eUkaR8ZM59zsGjtf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/email-template/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_email_template',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\EmailTemplateController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\EmailTemplateController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::eUkaR8ZM59zsGjtf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LVdg86EO7QIjd8km' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/email-template/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_email_template',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\EmailTemplateController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\EmailTemplateController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::LVdg86EO7QIjd8km',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nWBVNtCmKpozbGnP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/testimonials',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_testimonial',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\TestimonialController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\TestimonialController@index',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::nWBVNtCmKpozbGnP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::oLC73fZ9odKffkFu' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/add-testimonials',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_testimonial',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\TestimonialController@add',
        'controller' => 'App\\Http\\Controllers\\Admin\\TestimonialController@add',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::oLC73fZ9odKffkFu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::yCqxDTloSpVtmU28' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/edit-testimonials/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_testimonial',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\TestimonialController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\TestimonialController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::yCqxDTloSpVtmU28',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::guw69kwROf0tbMWn' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/delete-testimonials/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:general_setting',
          3 => 'permission:manage_testimonial',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\TestimonialController@delete',
        'controller' => 'App\\Http\\Controllers\\Admin\\TestimonialController@delete',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::guw69kwROf0tbMWn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.bookings.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/bookings/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_bookings',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BookingsController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\BookingsController@create',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.bookings.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.bookings.calander' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/bookings/calander',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_bookings',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BookingsController@calander',
        'controller' => 'App\\Http\\Controllers\\Admin\\BookingsController@calander',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.bookings.calander',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.bookings.get-number-of-guests' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/bookings/get-number-of-guests/{property_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_bookings',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BookingsController@getNumberofGuests',
        'controller' => 'App\\Http\\Controllers\\Admin\\BookingsController@getNumberofGuests',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.bookings.get-number-of-guests',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.bookings.check-booking-exists' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/bookings/check-booking-exists',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_bookings',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BookingsController@checkExistingPropertyBooking',
        'controller' => 'App\\Http\\Controllers\\Admin\\BookingsController@checkExistingPropertyBooking',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.bookings.check-booking-exists',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.bookings.get-property-dates' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/bookings/get-property-dates/{property_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_bookings',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BookingsController@getPropertyDates',
        'controller' => 'App\\Http\\Controllers\\Admin\\BookingsController@getPropertyDates',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.bookings.get-property-dates',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.bookings.details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/bookings/details/{date}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_bookings',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BookingsController@getBookingDetails',
        'controller' => 'App\\Http\\Controllers\\Admin\\BookingsController@getBookingDetails',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.bookings.details',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.bookings.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
        1 => 'PUT',
      ),
      'uri' => 'admin/bookings/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_bookings',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BookingsController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\BookingsController@store',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.bookings.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.bookings.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/bookings/edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_bookings',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BookingsController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\BookingsController@edit',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.bookings.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.bookings.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/bookings/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_bookings',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BookingsController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\BookingsController@update',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.bookings.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.bookings.form_property_search' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/bookings/form_property_search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_bookings',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BookingsController@searchFormProperty',
        'controller' => 'App\\Http\\Controllers\\Admin\\BookingsController@searchFormProperty',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.bookings.form_property_search',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.bookings.form_customer_search' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/bookings/form_customer_search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
          2 => 'permission:manage_bookings',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\BookingsController@searchFormCustomer',
        'controller' => 'App\\Http\\Controllers\\Admin\\BookingsController@searchFormCustomer',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.bookings.form_customer_search',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.get_areas' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/admin/properties/get-areas/{countryId}/{cityId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PropertiesController@getAreas',
        'controller' => 'App\\Http\\Controllers\\Admin\\PropertiesController@getAreas',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.get_areas',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Xq1QAVqd3YUIjcyA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'no_auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@login',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@login',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::Xq1QAVqd3YUIjcyA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::eeHIKBO6TSnWt7My' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/authenticate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'no_auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@authenticate',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@authenticate',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::eeHIKBO6TSnWt7My',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6SHHyQ1AEr8DAuNC' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/forgot-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'no_auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@forgotPassword',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@forgotPassword',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::6SHHyQ1AEr8DAuNC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vQWQs2PFSlL73l8d' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/reset-password/{secret?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'no_auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@resetPassword',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@resetPassword',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::vQWQs2PFSlL73l8d',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::RpvbHD8IozBAPSiP' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/reset-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'no_auth:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminController@resetPassword',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminController@resetPassword',
        'namespace' => 'App\\Http\\Controllers\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::RpvbHD8IozBAPSiP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::w4zWgL07sT2R9Imo' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'no_auth:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\LoginController@index',
        'controller' => 'App\\Http\\Controllers\\LoginController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::w4zWgL07sT2R9Imo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LkkbgKObL1OP5zPv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'auth/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'no_auth:users',
          2 => 'locale',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:278:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:60:"function () {
        return \\Redirect::to(\'login\');
    }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000e0c0000000000000000";}";s:4:"hash";s:44:"rTRqcR+mSseWF6AXCAjarS8fKUgAQTluI/15za1jFp8=";}}',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::LkkbgKObL1OP5zPv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nDAh4rlq4TOHKhB2' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'googleLogin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'no_auth:users',
          2 => 'locale',
          3 => 'social_login:google_login',
        ),
        'uses' => 'App\\Http\\Controllers\\LoginController@googleLogin',
        'controller' => 'App\\Http\\Controllers\\LoginController@googleLogin',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::nDAh4rlq4TOHKhB2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CaRB5B4HcMGhdY6q' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'facebookLogin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'no_auth:users',
          2 => 'locale',
          3 => 'social_login:facebook_login',
        ),
        'uses' => 'App\\Http\\Controllers\\LoginController@facebookLogin',
        'controller' => 'App\\Http\\Controllers\\LoginController@facebookLogin',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::CaRB5B4HcMGhdY6q',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gDrqcN0t0og9LZwH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'no_auth:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@register',
        'controller' => 'App\\Http\\Controllers\\HomeController@register',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::gDrqcN0t0og9LZwH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::AglSOTuMpYdV6FE7' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'forgot_password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'no_auth:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\LoginController@forgotPassword',
        'controller' => 'App\\Http\\Controllers\\LoginController@forgotPassword',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::AglSOTuMpYdV6FE7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::T1iyYL5lr74NNHzu' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'no_auth:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@create',
        'controller' => 'App\\Http\\Controllers\\UserController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::T1iyYL5lr74NNHzu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::MPkOfcOF1TI3fX5d' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'authenticate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'no_auth:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\LoginController@authenticate',
        'controller' => 'App\\Http\\Controllers\\LoginController@authenticate',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::MPkOfcOF1TI3fX5d',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nUSDUhwHFxQEEq73' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'users/reset_password/{secret?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'no_auth:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\LoginController@resetPassword',
        'controller' => 'App\\Http\\Controllers\\LoginController@resetPassword',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::nUSDUhwHFxQEEq73',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BuWoPDqytQDgcgt4' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'users/reset_password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'no_auth:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\LoginController@resetPassword',
        'controller' => 'App\\Http\\Controllers\\LoginController@resetPassword',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::BuWoPDqytQDgcgt4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rrkNhrsLB4zSmbVs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'googleAuthenticate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\LoginController@googleAuthenticate',
        'controller' => 'App\\Http\\Controllers\\LoginController@googleAuthenticate',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::rrkNhrsLB4zSmbVs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Vqtl0hdRdZ0tgG6y' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'facebookAuthenticate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\LoginController@facebookAuthenticate',
        'controller' => 'App\\Http\\Controllers\\LoginController@facebookAuthenticate',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Vqtl0hdRdZ0tgG6y',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::PXb8UPe2ewsisKGp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@dashboard',
        'controller' => 'App\\Http\\Controllers\\UserController@dashboard',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::PXb8UPe2ewsisKGp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::i6aiqDFTFbqkZF4r' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'users/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@profile',
        'controller' => 'App\\Http\\Controllers\\UserController@profile',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::i6aiqDFTFbqkZF4r',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5y2n2f4Kw6oMF0d9' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'users/profile/media',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@media',
        'controller' => 'App\\Http\\Controllers\\UserController@media',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::5y2n2f4Kw6oMF0d9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZtIxjLlb280IUr5e' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'users/edit-verification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@verification',
        'controller' => 'App\\Http\\Controllers\\UserController@verification',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::ZtIxjLlb280IUr5e',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Iepeea77bQepcoox' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'users/confirm_email/{code?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@confirmEmail',
        'controller' => 'App\\Http\\Controllers\\UserController@confirmEmail',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Iepeea77bQepcoox',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qftz4JFcrnIazecZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'users/new_email_confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@newConfirmEmail',
        'controller' => 'App\\Http\\Controllers\\UserController@newConfirmEmail',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::qftz4JFcrnIazecZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::px4nFjlopPmVyToT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'facebookLoginVerification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@facebookLoginVerification',
        'controller' => 'App\\Http\\Controllers\\UserController@facebookLoginVerification',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::px4nFjlopPmVyToT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9pWf7El2b5s7hOFB' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'facebookConnect/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@facebookConnect',
        'controller' => 'App\\Http\\Controllers\\UserController@facebookConnect',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::9pWf7El2b5s7hOFB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::d8h3nFLn9lNca5HT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'facebookDisconnect',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@facebookDisconnectVerification',
        'controller' => 'App\\Http\\Controllers\\UserController@facebookDisconnectVerification',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::d8h3nFLn9lNca5HT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::I0QYRenDymt8cgNN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'googleLoginVerification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@googleLoginVerification',
        'controller' => 'App\\Http\\Controllers\\UserController@googleLoginVerification',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::I0QYRenDymt8cgNN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::bEqcBc68xFNZSXjE' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'googleConnect/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@googleConnect',
        'controller' => 'App\\Http\\Controllers\\UserController@googleConnect',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::bEqcBc68xFNZSXjE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::IiYNh9w4viu74QKe' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'googleDisconnect',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@googleDisconnect',
        'controller' => 'App\\Http\\Controllers\\UserController@googleDisconnect',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::IiYNh9w4viu74QKe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nZydj5bdJis5PSer' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'users/show/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@show',
        'controller' => 'App\\Http\\Controllers\\UserController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::nZydj5bdJis5PSer',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5MX855xSSstehyew' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'users/reviews',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@reviews',
        'controller' => 'App\\Http\\Controllers\\UserController@reviews',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::5MX855xSSstehyew',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0FGn5rRLe3G7sMJa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'users/reviews_by_you',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@reviewsByYou',
        'controller' => 'App\\Http\\Controllers\\UserController@reviewsByYou',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::0FGn5rRLe3G7sMJa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3Cxubcjp3Y7xh5K7' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'reviews/edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@editReviews',
        'controller' => 'App\\Http\\Controllers\\UserController@editReviews',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::3Cxubcjp3Y7xh5K7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::g7LF7kLOwRV4FNIh' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'reviews/details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@reviewDetails',
        'controller' => 'App\\Http\\Controllers\\UserController@reviewDetails',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::g7LF7kLOwRV4FNIh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::InFPFCNkkZDDaLOa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'properties',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\PropertyController@userProperties',
        'controller' => 'App\\Http\\Controllers\\PropertyController@userProperties',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::InFPFCNkkZDDaLOa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Vhqo3k898NstTMNN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'property/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\PropertyController@create',
        'controller' => 'App\\Http\\Controllers\\PropertyController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Vhqo3k898NstTMNN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::FJ11On0UvZcEA3l5' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'listing/{id}/photo_message',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
          3 => 'checkUserRoutesPermissions',
        ),
        'uses' => 'App\\Http\\Controllers\\PropertyController@photoMessage',
        'controller' => 'App\\Http\\Controllers\\PropertyController@photoMessage',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::FJ11On0UvZcEA3l5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XXczHJyXiDc5L3qQ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'listing/{id}/photo_delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
          3 => 'checkUserRoutesPermissions',
        ),
        'uses' => 'App\\Http\\Controllers\\PropertyController@photoDelete',
        'controller' => 'App\\Http\\Controllers\\PropertyController@photoDelete',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::XXczHJyXiDc5L3qQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9AXtvejSyoo0mHxJ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'listing/photo/make_default_photo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\PropertyController@makeDefaultPhoto',
        'controller' => 'App\\Http\\Controllers\\PropertyController@makeDefaultPhoto',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::9AXtvejSyoo0mHxJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::OMU7DiQS81G2MXsS' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'listing/photo/make_photo_serial',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\PropertyController@makePhotoSerial',
        'controller' => 'App\\Http\\Controllers\\PropertyController@makePhotoSerial',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::OMU7DiQS81G2MXsS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::kTYQNu919ZQMsnJx' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'listing/update_status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\PropertyController@updateStatus',
        'controller' => 'App\\Http\\Controllers\\PropertyController@updateStatus',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::kTYQNu919ZQMsnJx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gTIxFxfdtYirMxmh' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'listing/{id}/{step}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\PropertyController@listing',
        'controller' => 'App\\Http\\Controllers\\PropertyController@listing',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::gTIxFxfdtYirMxmh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'id' => '[0-9]+',
        'page' => 'basics|description|location|amenities|photos|pricing|calendar|details|booking',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vyLxEv6HHgqmxsbA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user/favourite',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\PropertyController@userBookmark',
        'controller' => 'App\\Http\\Controllers\\PropertyController@userBookmark',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::vyLxEv6HHgqmxsbA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::uNpgy0GhXCtO4OiR' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'add-edit-book-mark',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\PropertyController@addEditBookMark',
        'controller' => 'App\\Http\\Controllers\\PropertyController@addEditBookMark',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::uNpgy0GhXCtO4OiR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::09zVEP8LGG0jlbBg' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ajax-calender/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\CalendarController@calenderJson',
        'controller' => 'App\\Http\\Controllers\\CalendarController@calenderJson',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::09zVEP8LGG0jlbBg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vCBHiHRHHRbz88Ai' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ajax-calender-price/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\CalendarController@calenderPriceSet',
        'controller' => 'App\\Http\\Controllers\\CalendarController@calenderPriceSet',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::vCBHiHRHHRbz88Ai',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8OjY4BLrKa1ubqU6' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ajax-icalender-import/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\CalendarController@icalendarImport',
        'controller' => 'App\\Http\\Controllers\\CalendarController@icalendarImport',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::8OjY4BLrKa1ubqU6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pEactzoMYp0YMwIr' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'icalendar/synchronization/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\CalendarController@icalendarSynchronization',
        'controller' => 'App\\Http\\Controllers\\CalendarController@icalendarSynchronization',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::pEactzoMYp0YMwIr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::GVywJ6EqzKMYfSYg' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'currency-symbol',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\PropertyController@currencySymbol',
        'controller' => 'App\\Http\\Controllers\\PropertyController@currencySymbol',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::GVywJ6EqzKMYfSYg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5yGuMQ9TR7CW0Ki5' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'payments/book/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentController@index',
        'controller' => 'App\\Http\\Controllers\\PaymentController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::5yGuMQ9TR7CW0Ki5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::MeFhHEMEyKk0gSNL' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'payments/create_booking',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentController@createBooking',
        'controller' => 'App\\Http\\Controllers\\PaymentController@createBooking',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::MeFhHEMEyKk0gSNL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::WOnBAFHZWqfZxLWn' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'payments/success',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentController@success',
        'controller' => 'App\\Http\\Controllers\\PaymentController@success',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::WOnBAFHZWqfZxLWn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::YFsImOlmCsaW8qVk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'payments/cancel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentController@cancel',
        'controller' => 'App\\Http\\Controllers\\PaymentController@cancel',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::YFsImOlmCsaW8qVk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::y7UU8HF14fETYlU1' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'payments/stripe',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentController@stripePayment',
        'controller' => 'App\\Http\\Controllers\\PaymentController@stripePayment',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::y7UU8HF14fETYlU1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mlqdTwmVdhMHfiGg' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'payments/stripe-request',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentController@stripeRequest',
        'controller' => 'App\\Http\\Controllers\\PaymentController@stripeRequest',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::mlqdTwmVdhMHfiGg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::kFlg0RhxWrZnN6Op' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'payments/bank-payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\PaymentController@bankPayment',
        'controller' => 'App\\Http\\Controllers\\PaymentController@bankPayment',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::kFlg0RhxWrZnN6Op',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::M8ae2eGxRT2is9YO' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'booking/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\BookingController@index',
        'controller' => 'App\\Http\\Controllers\\BookingController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::M8ae2eGxRT2is9YO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'id' => '[0-9]+',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CRfZyg3855FkPtfd' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'booking_payment/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\BookingController@requestPayment',
        'controller' => 'App\\Http\\Controllers\\BookingController@requestPayment',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::CRfZyg3855FkPtfd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'id' => '[0-9]+',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::e0gkR2PLIjK9XudH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'booking/requested',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\BookingController@requested',
        'controller' => 'App\\Http\\Controllers\\BookingController@requested',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::e0gkR2PLIjK9XudH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fm6PlcH6vKDQ9POy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'booking/itinerary_friends',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\BookingController@requested',
        'controller' => 'App\\Http\\Controllers\\BookingController@requested',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::fm6PlcH6vKDQ9POy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jAH6G8tuDNT3NnNl' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'booking/accept/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\BookingController@accept',
        'controller' => 'App\\Http\\Controllers\\BookingController@accept',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::jAH6G8tuDNT3NnNl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::GsUrCnUFywIZE4uH' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'booking/decline/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\BookingController@decline',
        'controller' => 'App\\Http\\Controllers\\BookingController@decline',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::GsUrCnUFywIZE4uH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UxvXxe1XMexc2nUA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'booking/expire/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\BookingController@expire',
        'controller' => 'App\\Http\\Controllers\\BookingController@expire',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::UxvXxe1XMexc2nUA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::OetgOeWhZyMEFm8U' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'my-bookings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\BookingController@myBookings',
        'controller' => 'App\\Http\\Controllers\\BookingController@myBookings',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::OetgOeWhZyMEFm8U',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::45nkIAD2bMOC5edX' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'booking/host_cancel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\BookingController@hostCancel',
        'controller' => 'App\\Http\\Controllers\\BookingController@hostCancel',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::45nkIAD2bMOC5edX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::FdmH4P5ae1COB8Bk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'trips/active',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\TripsController@myTrips',
        'controller' => 'App\\Http\\Controllers\\TripsController@myTrips',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::FdmH4P5ae1COB8Bk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qH0ps2AoHxMnKF65' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'booking/receipt',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\TripsController@receipt',
        'controller' => 'App\\Http\\Controllers\\TripsController@receipt',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::qH0ps2AoHxMnKF65',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Q3CGS2n21TOzeAx6' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'trips/guest_cancel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\TripsController@guestCancel',
        'controller' => 'App\\Http\\Controllers\\TripsController@guestCancel',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Q3CGS2n21TOzeAx6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::2TiwRhFCfD8VR7fS' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'inbox',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\InboxController@index',
        'controller' => 'App\\Http\\Controllers\\InboxController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::2TiwRhFCfD8VR7fS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::m25T5YDrXlyqRB3x' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'messaging/booking',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\InboxController@message',
        'controller' => 'App\\Http\\Controllers\\InboxController@message',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::m25T5YDrXlyqRB3x',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::u9IGufByzf9jfalG' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'messaging/reply',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\InboxController@messageReply',
        'controller' => 'App\\Http\\Controllers\\InboxController@messageReply',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::u9IGufByzf9jfalG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::26T1hozVJF9kiRq8' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'users/account-preferences',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@accountPreferences',
        'controller' => 'App\\Http\\Controllers\\UserController@accountPreferences',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::26T1hozVJF9kiRq8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::GzXGj4qyztUea1M8' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'users/account_delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@accountDelete',
        'controller' => 'App\\Http\\Controllers\\UserController@accountDelete',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::GzXGj4qyztUea1M8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::W2hVsljVkljtWFVx' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'users/account_default/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@accountDefault',
        'controller' => 'App\\Http\\Controllers\\UserController@accountDefault',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::W2hVsljVkljtWFVx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wvWZnACVl2MrPe6N' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'users/transaction-history',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@transactionHistory',
        'controller' => 'App\\Http\\Controllers\\UserController@transactionHistory',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::wvWZnACVl2MrPe6N',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HTSYZiSpM97VG2GR' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'users/account_transaction_history',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@getCompletedTransaction',
        'controller' => 'App\\Http\\Controllers\\UserController@getCompletedTransaction',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::HTSYZiSpM97VG2GR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5Tn2plUpgNXL99tM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'users/payout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\PayoutController@index',
        'controller' => 'App\\Http\\Controllers\\PayoutController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::5Tn2plUpgNXL99tM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mDGbFIg6DUM86WY1' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'users/payout/setting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\PayoutController@setting',
        'controller' => 'App\\Http\\Controllers\\PayoutController@setting',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::mDGbFIg6DUM86WY1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xtB7KjkkHre5hzWh' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'users/payout/edit-payout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\PayoutController@edit',
        'controller' => 'App\\Http\\Controllers\\PayoutController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::xtB7KjkkHre5hzWh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::GmaMxfG9xkZohDM2' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'users/payout/delete-payout/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\PayoutController@delete',
        'controller' => 'App\\Http\\Controllers\\PayoutController@delete',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::GmaMxfG9xkZohDM2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::domtjrbiLQ08Vmy9' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'users/payout-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\PayoutController@payoutList',
        'controller' => 'App\\Http\\Controllers\\PayoutController@payoutList',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::domtjrbiLQ08Vmy9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::arD6cPRwrNI3lfT2' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'users/payout/success',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\PayoutController@success',
        'controller' => 'App\\Http\\Controllers\\PayoutController@success',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::arD6cPRwrNI3lfT2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NW8UG6r2YN2fwFzY' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'users/security',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@security',
        'controller' => 'App\\Http\\Controllers\\UserController@security',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::NW8UG6r2YN2fwFzY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::IORkudHsCF2X1EFe' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest:users',
          2 => 'locale',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:360:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:141:"function () {
        \\Auth::logout();
        \\Illuminate\\Support\\Facades\\Session::flush();
        return \\Redirect::to(\'login\');
    }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000e5a0000000000000000";}";s:4:"hash";s:44:"8sVazUbb+jbli44JC4IczpPt4ok3pP6kyzBUP33jIGE=";}}',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::IORkudHsCF2X1EFe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::M9YEbtUZp9off5CO' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'icalender/export/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CalendarController@icalendarExport',
        'controller' => 'App\\Http\\Controllers\\CalendarController@icalendarExport',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::M9YEbtUZp9off5CO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0b7rj2CiFBk1oZcj' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '{name}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'locale',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@staticPages',
        'controller' => 'App\\Http\\Controllers\\HomeController@staticPages',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::0b7rj2CiFBk1oZcj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::s4jdARfeFxxzzQSJ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'duplicate-phone-number-check',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@duplicatePhoneNumberCheck',
        'controller' => 'App\\Http\\Controllers\\UserController@duplicatePhoneNumberCheck',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::s4jdARfeFxxzzQSJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ejRzL81r7ca1EfUu' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'duplicate-phone-number-check-for-existing-customer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@duplicatePhoneNumberCheckForExistingCustomer',
        'controller' => 'App\\Http\\Controllers\\UserController@duplicatePhoneNumberCheckForExistingCustomer',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::ejRzL81r7ca1EfUu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
