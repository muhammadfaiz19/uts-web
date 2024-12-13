<?php

include_once('../db/database.php');

class PasienModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addPasien($no_reg, $no_ktp, $nama_pasien, $jk, $diagnosis)
    {
        $sql = "INSERT INTO pasien (no_reg, no_ktp, nama_pasien, jk, diagnosis) VALUES (:no_reg, :no_ktp, :nama_pasien, :jk, :diagnosis)";
        $params = array(
            ":no_reg" => $no_reg,
            ":no_ktp" => $no_ktp,
            ":nama_pasien" => $nama_pasien,
            ":jk" => $jk,
            ":diagnosis" => $diagnosis
        );

        $result = $this->db->executeQuery($sql, $params);
        return json_encode($this->response($result, "Insert successful", "Insert failed"));
    }

    public function getPasien($id)
    {
        $sql = "SELECT * FROM pasien WHERE id = :id";
        $params = array(":id" => $id);
        return $this->db->executeQuery($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updatePasien($id, $no_reg, $no_ktp, $nama_pasien, $jk, $diagnosis)
    {
        $sql = "UPDATE pasien SET no_reg = :no_reg, no_ktp = :no_ktp, nama_pasien = :nama_pasien, jk = :jk, diagnosis = :diagnosis WHERE id = :id";
        $params = array(
            ":no_reg" => $no_reg,
            ":no_ktp" => $no_ktp,
            ":nama_pasien" => $nama_pasien,
            ":jk" => $jk,
            ":diagnosis" => $diagnosis,
            ":id" => $id
        );

        $result = $this->db->executeQuery($sql, $params);
        return json_encode($this->response($result, "Update successful", "Update failed"));
    }

    public function deletePasien($id)
    {
        $sql = "DELETE FROM pasien WHERE id = :id";
        $params = array(":id" => $id);
        $result = $this->db->executeQuery($sql, $params);
        return json_encode($this->response($result, "Delete successful", "Delete failed"));
    }

    public function getPasienList()
    {
        $sql = 'SELECT * FROM pasien LIMIT 100';
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    private function response($result, $successMsg, $failMsg)
    {
        return array(
            "success" => $result,
            "message" => $result ? $successMsg : $failMsg
        );
    }
}