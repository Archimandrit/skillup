<?php
class DB
{

    private $db;

    public function __construct()
    {
        $config = Config::$db;
        $this->db = new PDO(
            $config['dsn'],
            $config['username'],
            $config['password']);

        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);

    }
    public function execute($sql, $param = []) {
        $stmt = $this->db->prepare($sql);
        if ($param=[]){
            $stmt->execute($sql);
        }
        return $stmt;
    }
}


