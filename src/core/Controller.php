<?php

class Controller {
    protected $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function model($model) {
        require_once '../models/' . $model . '.php';
        return new $model($this->db);
    }

    public function view($view, $data = []) {
        require_once '../views/' . $view . '.php';
    }
}