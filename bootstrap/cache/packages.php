<?php return array (
  'intervention/image' => 
  array (
    'providers' => 
    array (
      0 => 'Intervention\\Image\\ImageServiceProvider',
    ),
    'aliases' => 
    array (
      'Image' => 'Intervention\\Image\\Facades\\Image',
    ),
  ),
  'jenssegers/agent' => 
  array (
    'providers' => 
    array (
      0 => 'Jenssegers\\Agent\\AgentServiceProvider',
    ),
    'aliases' => 
    array (
      'Agent' => 'Jenssegers\\Agent\\Facades\\Agent',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'anlutro/l4-settings' => 
  array (
    'aliases' => 
    array (
      'Setting' => 'anlutro\\LaravelSettings\\Facade',
    ),
    'providers' => 
    array (
      0 => 'anlutro\\LaravelSettings\\ServiceProvider',
    ),
  ),
  'eklundkristoffer/seedster' => 
  array (
    'providers' => 
    array (
      0 => 'Seedster\\SeedsterServiceProvider',
    ),
  ),
  'jeremykenedy/laravel-roles' => 
  array (
    'providers' => 
    array (
      0 => 'jeremykenedy\\LaravelRoles\\RolesServiceProvider',
    ),
  ),
  'proengsoft/laravel-jsvalidation' => 
  array (
    'providers' => 
    array (
      0 => 'Proengsoft\\JsValidation\\JsValidationServiceProvider',
    ),
    'aliases' => 
    array (
      'JsValidator' => 'Proengsoft\\JsValidation\\Facades\\JsValidatorFacade',
    ),
  ),
  'tymon/jwt-auth' => 
  array (
    'aliases' => 
    array (
      'JWTAuth' => 'Tymon\\JWTAuth\\Facades\\JWTAuth',
      'JWTFactory' => 'Tymon\\JWTAuth\\Facades\\JWTFactory',
    ),
    'providers' => 
    array (
      0 => 'Tymon\\JWTAuth\\Providers\\LaravelServiceProvider',
    ),
  ),
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'yajra/laravel-datatables-oracle' => 
  array (
    'providers' => 
    array (
      0 => 'Yajra\\DataTables\\DataTablesServiceProvider',
    ),
    'aliases' => 
    array (
      'DataTables' => 'Yajra\\DataTables\\Facades\\DataTables',
    ),
  ),
  'laravelcollective/html' => 
  array (
    'providers' => 
    array (
      0 => 'Collective\\Html\\HtmlServiceProvider',
    ),
    'aliases' => 
    array (
      'Form' => 'Collective\\Html\\FormFacade',
      'Html' => 'Collective\\Html\\HtmlFacade',
    ),
  ),
  'anhskohbo/no-captcha' => 
  array (
    'providers' => 
    array (
      0 => 'Anhskohbo\\NoCaptcha\\NoCaptchaServiceProvider',
    ),
    'aliases' => 
    array (
      'NoCaptcha' => 'Anhskohbo\\NoCaptcha\\Facades\\NoCaptcha',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'hexters/coinpayment' => 
  array (
    'providers' => 
    array (
      0 => 'Hexters\\CoinPayment\\Providers\\CoinPaymentServiceProvider',
    ),
    'aliases' => 
    array (
      'CoinPayment' => 'Hexters\\CoinPayment\\Helpers\\CoinPaymentFacade',
    ),
  ),
  'nunomaduro/collision' => 
  array (
    'providers' => 
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
);