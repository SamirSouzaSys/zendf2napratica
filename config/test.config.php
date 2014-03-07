<?php

return array(
    'db' => array(
        'driver' => 'PDO_SQLite',
        'dsn' => 'sqlite::memory:',
        'driver_options' => array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        )
    ),
   'db' => array(
        'driver'=> 'PDO',
        'dsn'   => 'mysql:dbname=zf2napratica_test;host=localhost',
        'username' => 'root',
        'password' => 'root',
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        ),
   )
);