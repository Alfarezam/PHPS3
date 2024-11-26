<?php
require_once 'nodes/node_barang.php';
class modelBarang {
    private $barangs = [];
    private $nextId = 1;
    private $objBarang;


    public function __construct() {
        if (isset($_SESSION['barangs'])) {
            $this->barangs = unserialize($_SESSION['barangs']);
            $this->nextId = count($this->barangs)+1;
        } else {
            $this->initiliazeDefaultBarang();
        }
    }

    public function initiliazeDefaultBarang() {
        $this->addBarang("Tas",100000, 1);
        $this->addBarang("Sepatu",10000, 2);
        $this->addBarang("Setrika",15000, 2);
    }

    public function addBarang($barangName, $hargaBarang, $jumlahBarang) {
//        echo $this->nextId;
        $this->objBarang = new Barang($this->nextId++, $barangName, $hargaBarang, $jumlahBarang);
        $this->barangs[] = $this->objBarang;
        $this->saveToSession();
    }

    private function saveToSession() {
        $_SESSION['barangs'] = serialize($this->barangs);
    }

    public function getAllBarangs() {
        return $this->barangs;
    }

    public function getListBarang() {
        $listBarang = [];
        foreach ($this->barangs as $barang) {
            // $listBarang[] = $this->barangs->namaBarang; // 1 problem di $this->barangs->namaBarang
            $listBarang[] = $barang->nameBarang;
        }
        return $listBarang;
    }

    public function getBarangById($id) {
        foreach ($this->barangs as $barang) {
            if ($barang->idBarang == $id){
                return $barang;
            }
        }
        return null;
    }

    public function updateBarang($id, $barangName, $hargaBarang, $jumlahBarang) {
        foreach ($this->barangs as $barang) {
            if ($barang->idBarang == $id) {
                $barang->nameBarang = $barangName;
                $barang->hargaBarang = $hargaBarang;
                $barang->jumlahBarang = $jumlahBarang;
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function deleteBarang($id) {
        foreach ($this->barangs as $key => $barang) {
            if ($barang->idBarang == $id){
                unset($this->barangs[$key]);
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }
}
?>