<?php

$container['events'] = function (){
    return new \Zend\EventManager\EventManager;
};

$container['settings'] = function () {
    return [
        'db' => [
            'dsn' => 'mysql:host=localhost;',
            'database' => 'project_manager',
            'username' => 'root',
            'password' => '',
            'options' => [
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            ]
        ]
    ];
};

$container['db'] = function ($container) {
  $dsn = $container['settings']['db']['dsn'] . 'dbname=' .$container['settings']['db']['database'];
  $username = $container['settings']['db']['username'];
  $password = $container['settings']['db']['password'];
  $options = $container['settings']['db']['options'];

  $pdo = new \PDO($dsn, $username, $password, $options);

  $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

  return $pdo;
};

$container['users_model'] = function ($container) {
    return new \App\Models\Users($container);
};

return $container;

