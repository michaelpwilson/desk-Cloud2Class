<?php

  # Connect to redis on kahlua-2
#  require 'Predis/Autoloader.php';
#  Predis\Autoloader::register();

  $redis_client = new Predis\Client([
  'scheme' => 'tcp',
  'host' => 'kahlua-2',
  'port' => 6301,
]);
