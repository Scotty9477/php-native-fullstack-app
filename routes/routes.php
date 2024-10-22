<?php

return function($router) {
    $router->addRoute('/training/', (function() {
        require BASE_PATH . '/views/home.php';
    }));

    $router->addRoute('/training/register', 'UserController@register');
    $router->addRoute('/training/login', 'UserController@login');
    $router->addRoute('/training/logout', 'UserController@logout');
};
?>