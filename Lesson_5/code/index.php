<?php

include './config.php';
include './RedisDB.php';

$redis = RedisDB::getInstance();

if ($redis->clear()) {
    echo "Redis was cleared<br>";
}

if  ($redis->set('var1', 10)) {
    echo "Variable was set<br>";
};

echo "Value is " . $redis->get('var1') . "<br>";

if ($redis->del('var1')) {
    echo "Variable was deleted<br>";
}