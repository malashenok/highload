<?php
error_reporting(E_ALL);
require_once("../vendor/autoload.php");


use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$time_start = time();

$log = new Logger('main');

$log->pushHandler(new StreamHandler('log/all.log', Logger::DEBUG));

$log->warning('warning');
$log->info('info');
$log->debug('debug');
$log->error('error');
$log->notice('notice');

sleep(1);

$time_end = time();

$log->warning($time_end - $time_start);
$log->info(memory_get_usage());