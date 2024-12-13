<?php
include_once('../models/BukuModel.php');

class BukuController
{
    private $model;

    public function __construct()
    {
        $this->model = new BukuModel();
    }

    public function addBuku($kodebuku, $judul, $pengarang, $penerbit, $tahun)
    {
        return $this->model->addBuku($kodebuku, $judul, $pengarang, $penerbit, $tahun);
    }

    public function getBuku($id)
    {
        return $this->model->getBuku($id);
    }

    public function updateBuku($id, $kodebuku, $judul, $pengarang, $penerbit, $tahun)
    {
        return $this->model->updateBuku($id, $kodebuku, $judul, $pengarang, $penerbit, $tahun);
    }

    public function deleteBuku($id)
    {
        return $this->model->deleteBuku($id);
    }

    public function getBukuList()
    {
        return $this->model->getBukuList();
    }
}