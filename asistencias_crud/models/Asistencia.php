<?php
require_once 'config.php';

class Asistencia {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM asistencias");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM asistencias WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data) {
        $stmt = $this->pdo->prepare("INSERT INTO asistencias (nombre, hora, fecha, estado, observaciones) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$data['nombre'], $data['hora'], $data['fecha'], $data['estado'], $data['observaciones']]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE asistencias SET nombre=?, hora=?, fecha=?, estado=?, observaciones=? WHERE id=?");
        return $stmt->execute([$data['nombre'], $data['hora'], $data['fecha'], $data['estado'], $data['observaciones'], $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM asistencias WHERE id=?");
        return $stmt->execute([$id]);
    }
}
?>