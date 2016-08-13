<?php

namespace Lib;

/**
 * ModelManager
 */
class ModelManager
{
    private $db;
    private $loaded = [];

    private function init()
    {
        $this->db = new \mysqli(getenv('HOST'), getenv('USER_NAME'), getenv('PASSWORD'), getenv('DB_NAME'));
    }

    public function load($model)
    {
        if (isset($this->loaded[$model]))
            return $this->loaded[$model];

        if (!$this->db)
            $this->init();

        $this->loaded[$model] = new $model($this->db);

        return $this->loaded[$model];
    }

    public function close()
    {
        if ($this->db) {
            $this->db->close();
        }

    }
}
