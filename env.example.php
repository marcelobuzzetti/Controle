<?php
  $variables = [
      'DB_HOST' => 'localhost',
      'DB_USERNAME' => 'user',
      'DB_PASSWORD' => 'password',
      'DB_DATABASE' => 'database',
      'DB_PORT' => '3306',
  ];
  foreach ($variables as $key => $value) {
      putenv("$key=$value");
  }
?>