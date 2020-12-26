<?php

namespace App\Controllers;

use BankModel;
use CodeIgniter\Database\Database;
use JenisModel;
use KategoriModel;
use PesananModel;
use ProdukModel;
use UkuranModel;

class User extends BaseController
{
    protected $produkModel;
    protected $jenisModel;
    protected $kategoriModel;
    protected $ukuranModel;
    protected $bankModel;
    protected $pesananModel;
    protected $kurirController;
    protected $produkController;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->jenisModel = new JenisModel();
        $this->kategoriModel = new KategoriModel();
        $this->ukuranModel = new UkuranModel();
        $this->bankModel = new BankModel();
        $this->pesananModel = new PesananModel();
        $this->kurirController = new Kurir();
        $this->produkController = new Produk();
    }

    public function index()
    {
        if (in_groups('admin')) {
            return $this->produkController->index();
        }
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
        if (in_groups('admin')) {
            return $this->produkController->index();
        }
        if (!logged_in()) {
            return redirect()->to("/");
        }

        $kota = $this->kurirController->requestAllCity();
        $produk = $this->produkModel->getById($id);
        $ukuran = $this->ukuranModel->getAll();
        $bank = $this->bankModel->getAll();

        $data = [
            'title' => "Pembelian",
            'produk' => $produk[0],
            'ukuran' => $ukuran,
            'kota' => $kota['rajaongkir']['results'],
            'bank' => $bank,
            'validation' => \Config\Services::validation()
        ];

        // cek jika tidak ada kemungkinan karena user mengarang ID di url
        if ($produk == null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('user/pembelian', $data);
    }

    public function beli()
    {
        if (in_groups('admin')) {
            return $this->produkController->index();
        }
        $id = $this->request->getVar('id_produk');
        if (!$this->validate([
            'nama'     => 'required',
            'no_hp' => 'required',
            'bank'     => 'required',
            'jumlah'    => 'required',
            'catatan'    => 'required',
            'kota' => 'required',
            'kurir' => 'required',
            'layanan_kurir_name' => 'required',
            'jalan' => 'required',
        ])) {
            // jika id di isi kembalikan lagi ke halaman edit

            return redirect()->to("/pembelian/$id")->withInput();
        }

        $dataKota = $this->kurirController->requestCityById($this->request->getVar('kota'));

        $dataKota = $dataKota['rajaongkir']['results'];
        $pesanan = [
            'id_user' => $this->request->getVar('id_user'),
            'id_produk' => $this->request->getVar('id_produk'),
            'tanggal_pemesanan' => date('Y-m-d'),
            'nama_penerima' => $this->request->getVar('nama'),
            'no_hp' => $this->request->getVar('no_hp'),
            'total_pembayaran' => ($this->request->getVar('harga_produk_value') + $this->request->getVar('biaya_kurir_value')),
            'id_status_pemesanan' => 1,
            'id_bank' => $this->request->getVar('bank'),
            'jumlah' => $this->request->getVar('jumlah'),
            'catatan' => $this->request->getVar('catatan')
        ];

        $kurir = [
            'nama_kurir' => $this->request->getVar('kurir'),
            'layanan_kurir' => $this->request->getVar('layanan_kurir_name'),
            'biaya' => $this->request->getVar('biaya_kurir_value')
        ];

        $alamat = [
            'id_kota' => $dataKota['city_id'],
            'jalan' => $this->request->getVar('jalan'),
            'kota' => $dataKota['city_name'],
            'provinsi' => $dataKota['province'],
        ];

        $data = [
            'pesanan' => $pesanan,
            'kurir' => $kurir,
            'alamat' => $alamat
        ];
        $this->pesananModel->insertPesanan($data);
        session()->setFlashdata('pesan', 'produk berhasil di beli');
        return redirect()->to("/pembelian/$id");
    }

    public function pesanan()
    {
        $data = [
            'title' => "Daftar Pesanan"
        ];

        return view('user/pesanan', $data);
    }
}
