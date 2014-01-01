<?php

  require dirname(__FILE__) . '/Doctrine2WithoutProxiesTestSuite.php';
  $time = microtime(true);
  $memory = memory_get_usage(true);
  $test = new Doctrine2WithoutProxiesTestSuite();
  $test->initialize();
  $test->run();
  echo sprintf(" %11s | %6.2f |\n", number_format(memory_get_usage(true) - $memory), (microtime(true) - $time));
