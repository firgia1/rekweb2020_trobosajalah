<?php

namespace App\Controllers;

use Exception;
use JenisModel;
use KategoriModel;
use ProdukModel;
use UkuranModel;

use function PHPSTORM_META\type;

class Produk extends BaseController
{
    protected $produkModel;
    protected $ukuranModel;
    protected $kategoriModel;
    protected $jenisModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->ukuranModel = new UkuranModel();
        $this->kategoriModel = new KategoriModel();
        $this->jenisModel = new JenisModel();
    }

    public function index()
    {
        $produk = $this->produkModel->getAllProduk();
        $ukuran = $this->ukuranModel->getAll();
        $kategori = $this->kategoriModel->getAll();
        $data = [
            'title' => "Daftar Produk",
            'produk' => $produk,
            'ukuran' => $ukuran,
            'kategori' => $kategori
        ];
        return view('produk/index', $data);
    }

    public function detail($id)
    {

        $produk = $this->produkModel->getById($id);
        $ukuran = $this->ukuranModel->getAll();
        $kategori = $this->kategoriModel->getAll();
        $data = [
            'title' => "Detail",
            'produk' => $produk,
            'ukuran' => $ukuran,
            'kategori' => $kategori
        ];

        // cek jika tidak ada kemungkinan karena user mengarang ID di url
        if ($produk == null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('produk/detail', $data);
    }

    public function create()
    {
        $ukuran = $this->ukuranModel->getAll();
        $kategori = $this->kategoriModel->getAll();
        $jenis = $this->jenisModel->getAll();

        $data = [
            'title' => "Tambah Produk",
            'ukuran' => $ukuran,
            'kategori' => $kategori,
            'jenis' => $jenis,
            'validation' => \Config\Services::validation()
        ];
        return view("produk/create", $data);
    }



    public function delete($id)
    {
        $produk = $this->produkModel->getById($id);
        $gambar = $produk[0]['gambar'];


        for ($i = 0; $i < 5; $i++) {
            $key = $gambar["gambar_" . ($i + 1)];
            if ($key != null && $key != "") unlink('img/' . $key);
        }

        $this->produkModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil di hapus');
        return redirect()->to('/produk');
    }

    public function edit($id)
    {
        $produk = $this->produkModel->getById($id);
        $ukuran = $this->ukuranModel->getAll();
        $kategori = $this->kategoriModel->getAll();
        $jenis = $this->jenisModel->getAll();
        $data = [
            'title' => "Ubah Data",
            'produk' => $produk,
            'ukuran' => $ukuran,
            'kategori' => $kategori,
            'jenis' => $jenis,
            'validation' => \Config\Services::validation()
        ];

        // cek jika tidak ada kemungkinan karena user mengarang ID di url
        if ($produk == null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('produk/edit', $data);
    }


    public function save($id = null)
    {
        // jika $id di isi berarti maskud nya adalah untuk meng ubah data
        // jika kosong berarti menambah data
        if (!$this->validate([
            'nama'     => 'required',
            'deskripsi' => 'required',
            'stok'     => 'required',
            'harga'    => 'required',
            'jenis'    => 'required',
            'kategori' => 'required',

            'gambar_1' => [
                'rules' => 'uploaded[gambar_1]|max_size[gambar_1,1024]|is_image[gambar_1]|mime_in[gambar_1,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'pilih gambar n terlebih dahulu',
                    'max_size' => 'ukuran gambar terlalu besar',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in'  => 'yang anda pilih bukan gambar'
                ]
            ]

        ])) {
            // jika id di isi kembalikan lagi ke halaman edit
            $target = ($id) ? "/produk/edit/$id" : "/produk/create";
            return redirect()->to($target)->withInput();
        }

        $listIdKategori = $this->request->getVar('kategori');
        $listIdUkuran = $this->request->getVar('ukuran');




        $fileGambar_1 = $this->request->getFile('gambar_1');
        $namaGambar_1 = "gambar_1_" . $fileGambar_1->getRandomName();
        $fileGambar_1->move('img', $namaGambar_1);

        $gambar = [
            "gambar_1" => $namaGambar_1,
            "gambar_2" => $this->request->getVar('gambar_2') ?? null,
            "gambar_3" => $this->request->getVar('gambar_3') ?? null,
            "gambar_4" => $this->request->getVar('gambar_4') ?? null,
            "gambar_5" => $this->request->getVar('gambar_5') ?? null,
        ];

        $produk = [
            'nama_produk'      => $this->request->getVar('nama') ?? null,
            'deskripsi_produk' => $this->request->getVar('deskripsi') ?? null,
            'stok_produk'      => $this->request->getVar('stok') ?? null,
            'total_pesanan'    => 0,
            'total_wishlist'   => 0,
            'id_jenis'         => $this->request->getVar('jenis') ?? null,
        ];

        $harga = [
            'harga_normal'    => $this->request->getVar('harga') ?? null
        ];

        $kategori = [
            "id_kategori_1" => $listIdKategori[0] ?? null,
            "id_kategori_2" => $listIdKategori[1] ?? null,
            "id_kategori_3" => $listIdKategori[2] ?? null
        ];

        $ukuran = [
            "id_ukuran_1" => $listIdUkuran[0] ?? null,
            "id_ukuran_2" => $listIdUkuran[1] ?? null,
            "id_ukuran_3" => $listIdUkuran[2] ?? null,
            "id_ukuran_4" => $listIdUkuran[3] ?? null,
            "id_ukuran_5" => $listIdUkuran[4] ?? null,
            "id_ukuran_6" => $listIdUkuran[5] ?? null
        ];

        $data = [
            "produk" => $produk,
            "gambar" => $gambar,
            "harga"   => $harga,
            "kategori" => $kategori,
            "ukuran" => $ukuran
        ];

        if ($id) {
            $this->produkModel->updateProduk($data, $id);
        } else {
            $this->produkModel->insertProduk($data);
        }

        session()->setFlashdata('pesan', 'Data `' . $this->request->getVar('nama') . '` berhasil ' . (($id) ? 'di ubah' : 'di tambahkan'));
        return redirect()->to("/produk");
    }
}
