<?php

namespace App\Controllers;

use PesananModel;
use ProdukModel;

class Admin extends BaseController
{
    protected $produkModel;
    protected $pesananModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->pesananModel = new PesananModel();
    }

    public function index()
    {
        return view('welcome_message');
    }

    public function pesanan()
    {
        $pesanan = $this->pesananModel->getAllPesanan();
        $data = [
            'title' => "Pesanan Masuk",
            'pesanan' => $pesanan,
        ];

        return view('/admin/pesanan', $data);
    }
}
