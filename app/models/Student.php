<?php

namespace app\models;

use framework\Model;

class Student extends Model {
    public $id;
    public $name;
    public $email;
    public $phone;
    public $address;

    public function __construct($application) {        
        $this->table = 'student';
        parent::__construct($application);
    }
}
