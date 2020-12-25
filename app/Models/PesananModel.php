<?php

use CodeIgniter\Model;

class PesananModel extends Model
{
    // ini nama tabel dari pemesanan
    protected $table = 'user_pesanan';
    protected $primaryKey = 'id_pesanan';

    public function insertPesanan($data)
    {
        $insertTablePemesanan = $data['pesanan'];
        $resultPemesanan = $this->db->table($this->table)->insert($insertTablePemesanan);
        if ($resultPemesanan) {
            $idPesanan = $this->insertID();

            $insertKurir = ["id_pesanan" => $idPesanan];
            $insertKurir += $data['kurir'];

            $insertAlamat = ["id_pesanan" => $idPesanan];
            $insertAlamat += $data['alamat'];

            $this->db->table("user_pesanan_kurir")->insert($insertKurir);
            $this->db->table("user_pesanan_alamat")->insert($insertAlamat);
        }
    }
}
