<?php

include_once('../db/database.php');

class BukuModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addBuku($kodebuku, $judul, $pengarang, $penerbit, $tahun)
    {
        $sql = "INSERT INTO buku (kodebuku, judul, pengarang, penerbit, tahun) VALUES (:kodebuku, :judul, :pengarang, :penerbit, :tahun)";
        $params = array(
            ":kodebuku" => $kodebuku,
            ":judul" => $judul,
            ":pengarang" => $pengarang,
            ":penerbit" => $penerbit,
            ":tahun" => $tahun
        );

        $result = $this->db->executeQuery($sql, $params);
        return json_encode($this->response($result, "Insert successful", "Insert failed"));
    }

    public function getBuku($id)
    {
        $sql = "SELECT * FROM buku WHERE id = :id";
        $params = array(":id" => $id);
        return $this->db->executeQuery($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateBuku($id, $kodebuku, $judul, $pengarang, $penerbit, $tahun)
    {
        $sql = "UPDATE buku SET kodebuku = :kodebuku, judul = :judul, pengarang = :pengarang, penerbit = :penerbit, tahun = :tahun WHERE id = :id";
        $params = array(
            ":kodebuku" => $kodebuku,
            ":judul" => $judul,
            ":pengarang" => $pengarang,
            ":penerbit" => $penerbit,
            ":tahun" => $tahun,
            ":id" => $id
        );

        $result = $this->db->executeQuery($sql, $params);
        return json_encode($this->response($result, "Update successful", "Update failed"));
    }

    public function deleteBuku($id)
    {
        $sql = "DELETE FROM buku WHERE id = :id";
        $params = array(":id" => $id);
        $result = $this->db->executeQuery($sql, $params);
        return json_encode($this->response($result, "Delete successful", "Delete failed"));
    }

    public function getBukuList()
    {
        $sql = 'SELECT * FROM buku LIMIT 100';
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