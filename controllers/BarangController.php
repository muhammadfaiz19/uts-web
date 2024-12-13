<?php
include_once('../models/BarangModel.php');

class BarangController
{
    private $model;

    public function __construct()
    {
        $this->model = new BarangModel();
    }

    public function addBarang($kodebrg, $namabrg, $kategori, $harga)
    {
        return $this->model->addBarang($kodebrg, $namabrg, $kategori, $harga);
    }

    public function getBarang($id)
    {
        return $this->model->getBarang($id);
    }

    public function updateBarang($id, $kodebrg, $namabrg, $kategori, $harga)
    {
        return $this->model->updateBarang($id, $kodebrg, $namabrg, $kategori, $harga);
    }

    public function deleteBarang($id)
    {
        return $this->model->deleteBarang($id);
    }

    public function getBarangList()
    {
        return $this->model->getBarangList();
    }
}