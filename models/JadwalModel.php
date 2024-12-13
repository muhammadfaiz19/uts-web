<?php

include_once('../db/database.php');

class JadwalModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addJadwal($kodemk, $matakuliah, $kelas, $hari, $waktu, $ruangan, $dosen)
    {
        $sql = "INSERT INTO jadwal (kodemk, matakuliah, kelas, hari, waktu, ruangan, dosen) VALUES (:kodemk, :matakuliah, :kelas, :hari, :waktu, :ruangan, :dosen)";
        $params = array(
            ":kodemk" => $kodemk,
            ":matakuliah" => $matakuliah,
            ":kelas" => $kelas,
            ":hari" => $hari,
            ":waktu" => $waktu,
            ":ruangan" => $ruangan,
            ":dosen" => $dosen
        );

        $result = $this->db->executeQuery($sql, $params);
        return json_encode($this->response($result, "Insert successful", "Insert failed"));
    }

    public function getJadwal($id)
    {
        $sql = "SELECT * FROM jadwal WHERE id = :id";
        $params = array(":id" => $id);
        return $this->db->executeQuery($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateJadwal($id, $kodemk, $matakuliah, $kelas, $hari, $waktu, $ruangan, $dosen)
    {
        $sql = "UPDATE jadwal SET kodemk = :kodemk, matakuliah = :matakuliah, kelas = :kelas, hari = :hari, waktu = :waktu, ruangan = :ruangan, dosen = :dosen WHERE id = :id";
        $params = array(
            ":kodemk" => $kodemk,
            ":matakuliah" => $matakuliah,
            ":kelas" => $kelas,
            ":hari" => $hari,
            ":waktu" => $waktu,
            ":ruangan" => $ruangan,
            ":dosen" => $dosen,
            ":id" => $id
        );

        $result = $this->db->executeQuery($sql, $params);
        return json_encode($this->response($result, "Update successful", "Update failed"));
    }

    public function deleteJadwal($id)
    {
        $sql = "DELETE FROM jadwal WHERE id = :id";
        $params = array(":id" => $id);
        $result = $this->db->executeQuery($sql, $params);
        return json_encode($this->response($result, "Delete successful", "Delete failed"));
    }

    public function getJadwalList()
    {
        $sql = 'SELECT * FROM jadwal LIMIT 100';
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