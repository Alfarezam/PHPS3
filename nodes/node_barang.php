<?php
class Barang {
    public $idBarang;
    public $nameBarang;
    public $hargaBarang;
    public $jumlahBarang;

    public function __construct($idBarang, $namaBarang, $harga, $jumlah) {
        $this->idBarang = $idBarang;
        $this->nameBarang = $namaBarang;
        $this->hargaBarang = $harga;
        $this->jumlahBarang = $jumlah;
    }
}
?>