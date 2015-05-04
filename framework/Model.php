<?php

namespace framework;

class Model {
    public $table;
    public $fields;

    protected $app;

    private $db;
    
    public function __construct($application) {
        $this->app = $application;
        $db_config = $this->app->config['database'];
        $this->db = new \PDO('mysql:host=' . $db_config['host'] . ';dbname=' . $db_config['name'],
            $db_config['user'],
            $db_config['password']);
    }

    public function setField($field_name, $field_value) {
        $this->fields[$field_name] = $field_value;
    }

    public function load($fields) {
        foreach($fields as $name => $value) {
            $this->setField($name, $value);
        }
    }

    public function save() {
        if (isset($this->fields['id'])) {
            $query = 'UPDATE ';
        } else {
            $query = 'INSERT ';
        }
        $query .= '`' . $this->table . '` SET ';

        $set_parts = [];
        $params = [];
        foreach ($this->fields as $field_name => $field_value) {
            $set_parts[] = '`' . $field_name . '`=:' . $field_name;
            $params[':' . $field_name] = $field_value;
        }        

        $query .= join(',', $set_parts);

        if (isset($this->fields['id'])) {
            $query .= ' WHERE id=:id';
            $params[':id'] = $this->fields['id'];
        }
        
        $statement = $this->db->prepare($query);
        $result = $statement->execute($params);        
    }

    public function findAll() {
        $statement = $this->db->prepare('SELECT * FROM ' . $this->table);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function findById($id) {
        $statement = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $statement->execute(array(':id' =>  $id));
        return $statement->fetch();
    }
}