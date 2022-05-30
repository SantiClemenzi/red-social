<?php
require_once 'config/Database.php';
class ModeloBase{
    
    public $db;

    public function __construct()
    {
        $this->db = database::conectar();
    }

    public function getAll($tabla)
    {
        $query = $this->db->query("SELECT * FROM $tabla ORDER BY id ASC");
        return $query;
    }
}