<?php
require_once 'models/Asistencia.php';

class AsistenciaController {
    private $model;

    public function __construct() {
        $this->model = new Asistencia();
    }

    public function index() {
        $asistencias = $this->model->getAll();
        include 'views/asistencia_list.php';
    }

    public function create() {
        include 'views/asistencia_form.php';
    }

    public function store() {
        $this->model->insert($_POST);
        header('Location: index.php');
    }

    public function edit($id) {
        $asistencia = $this->model->getById($id);
        include 'views/asistencia_form.php';
    }

    public function update($id) {
        $this->model->update($id, $_POST);
        header('Location: index.php');
    }

    public function delete($id) {
        $this->model->delete($id);
        header('Location: index.php');
    }
}
?>