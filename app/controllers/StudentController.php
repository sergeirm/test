<?php

namespace app\controllers;

use framework\Model;
use framework\Controller;

use app\models\Student;

class StudentController extends Controller {    

    public function __construct($application) {
        parent::__construct($application);              
        $this->model = new Student($application);        
    }

    public function indexAction() {        
        $students = $this->model->findAll();        
        $this->render('index', ['students' => $students]);
    }

    public function editAction() {
        $student_id = $this->app->params['get']['id'];
        if (count($this->app->params['post']) > 0) {
            unset($this->app->params['post']['submit']);
            $fields = $this->app->params['post'] + ['id' => $student_id];
            $this->model->load($fields);
            $this->model->save();
            $this->redirect('student/index');
        } else {
            $student = $this->model->findById($student_id);
            $this->render('edit', ['action' => 'edit', 'student' => $student]);
        }
    }
    
    public function addAction() {        
        if (count($this->app->params['post']) > 0) {
            unset($this->app->params['post']['submit']);
            $this->model->load($this->app->params['post']);
            $this->model->save();
            $this->redirect('student/index');
        } else {
            $this->render('edit', ['action' => 'add']);
        }
    }
   
}