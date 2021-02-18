<?php

class RedisDB {

    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}

    private static $instance = null;
    private $connection = null;

    public static function getInstance() {

        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    private function getConnection() {

        if (is_null($this->connection)) {
            $this->connection = new Redis();
            $this->connection->connect(REDIS_HOST, REDIS_PORT);

        }
        return $this->connection;
    }

    public function set($key, $value, $time = 60) {
       if ($c = $this->getConnection()) {
            $c->set($key, $value, $time);
            return true;
        } else {
            return false;
        }
    }

    public function get($key) {

        if ($c = $this->getConnection()) {
            return $c->get($key);
        } else {
            return null;
        }
    }

    public function del($key) {
        if ($c = $this->getConnection()) {
            $c->delete($key);
            return true;
        } else {
            return false;
        }
    }

    public function clear() {
        if ($c = $this->getConnection()) {
            $c->flushDB();
            return true;
        } else {
            return false;
        }
    }
}
