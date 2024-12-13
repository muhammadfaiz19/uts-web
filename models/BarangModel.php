<?php

include_once('../db/database.php');

class BarangModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addBarang($kodebrg, $namabrg, $kategori, $harga)
    {
        $sql = "INSERT INTO barang (kodebrg, namabrg, kategori, harga) VALUES (:kodebrg, :namabrg, :kategori, :harga)";
        $params = array(
            ":kodebrg" => $kodebrg,
            ":namabrg" => $namabrg,
            ":kategori" => $kategori,
            ":harga" => $harga
        );

        $result = $this->db->executeQuery($sql, $params);
        return json_encode($this->response($result, "Insert successful", "Insert failed"));
    }

    public function getBarang($id)
    {
        $sql = "SELECT * FROM barang WHERE id = :id";
        $params = array(":id" => $id);
        return $this->db->executeQuery($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateBarang($id, $kodebrg, $namabrg, $kategori, $harga)
    {
        $sql = "UPDATE barang SET kodebrg = :kodebrg, namabrg = :namabrg, kategori = :kategori, harga = :harga WHERE id = :id";
        $params = array(
            ":kodebrg" => $kodebrg,
            ":namabrg" => $namabrg,
            ":kategori" => $kategori,
            ":harga" => $harga,
            ":id" => $id
        );

        $result = $this->db->executeQuery($sql, $params);
        return json_encode($this->response($result, "Update successful", "Update failed"));
    }

    public function deleteBarang($id)
    {
        $sql = "DELETE FROM barang WHERE id = :id";
        $params = array(":id" => $id);
        $result = $this->db->executeQuery($sql, $params);
        return json_encode($this->response($result, "Delete successful", "Delete failed"));
    }

    public function getBarangList()
    {
        $sql = 'SELECT * FROM barang LIMIT 100';
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