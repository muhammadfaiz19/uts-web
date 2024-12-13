<?php
include_once('../models/JadwalModel.php');

class JadwalController
{
    private $model;

    public function __construct()
    {
        $this->model = new JadwalModel();
    }

    public function addJadwal($kodemk, $matakuliah, $kelas, $hari, $waktu, $ruangan, $dosen)
    {
        return $this->model->addJadwal($kodemk, $matakuliah, $kelas, $hari, $waktu, $ruangan, $dosen);
    }

    public function getJadwal($id)
    {
        return $this-> model->getJadwal($id);
    }

    public function updateJadwal($id, $kodemk, $matakuliah, $kelas, $hari, $waktu, $ruangan, $dosen)
    {
        return $this->model->updateJadwal($id, $kodemk, $matakuliah, $kelas, $hari, $waktu, $ruangan, $dosen);
    }

    public function deleteJadwal($id)
    {
        return $this->model->deleteJadwal($id);
    }

    public function getJadwalList()
    {
        return $this->model->getJadwalList();
    }
}

