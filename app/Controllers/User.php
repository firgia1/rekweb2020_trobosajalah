<?php

namespace App\Controllers;

use JenisModel;
use KategoriModel;
use ProdukModel;

class User extends BaseController
{
    protected $produkModel;
    protected $jenisModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->jenisModel = new JenisModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        return $this->home();
    }

    public function home()
    {
        $s = $this->request->getGet('s');
        $j = $this->request->getGet('j');
        $har = $this->request->getGet('har');
        $rat = $this->request->getGet('rat');
        $id = $this->request->getGet('id');

        if ($s != null) {
            $produk = $this->produkModel->getByNama($s);
        } else if ($j != null) {
            $produk = $this->produkModel->getByJenis($j);
        } else if ($har != null) {
            $produk = $this->produkModel->getOrderHarga($har);
        } else if ($rat != null) {
            $produk = $this->produkModel->getOrderRating($rat);
        } else if ($id != null) {
            $produk = $this->produkModel->getOrderProduk($id);
        } else {
            $produk = $this->produkModel->getAllProduk();
        }

        $jenis = $this->jenisModel->getAll();
        $kategori = $this->kategoriModel->getAll();

        $data = [
            'title' => "Home",
            'produk' => $produk,
            'jenis' => $jenis,
            'kategori' => $kategori
        ];

        return view('user/home', $data);
    }




    public function keranjang()
    {
        $data = [
            'title' => "Keranjang"
        ];

        return view('user/keranjang', $data);
    }

    public function pembelian($id)
    {
        if (!logged_in()) {
            return redirect()->to("/");
        }
        $data = [
            'title' => "Pembelian"
        ];

        return view('user/Pembelian', $data);
    }

    public function beli()
    {
        dd($this->request->getVar());
    }

    public function pesanan()
    {
        $data = [
            'title' => "Daftar Pesanan"
        ];

        return view('user/pesanan', $data);
    }
}
