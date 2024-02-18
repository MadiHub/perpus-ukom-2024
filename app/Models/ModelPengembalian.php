<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengembalian extends Model
{
    protected $table = 'tb_pengembalian';
    protected $primaryKey = 'id_pengembalian';
    protected $allowedFields = [
        'id_pengembalian', 
        'id_member', 
        'id_peminjaman', 
        'tanggal_pengembalian',
        'hari_keterlambatan', 
        'total_denda', 
        'uang_kembalian', 
        'uang_dibayarkan'];

    public function tambah_pengembalian($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    // query untuk method daftar_pengembalian
    public function semua_dikembalikan()
    {
        return $this->select('tb_pengembalian.*, tb_member.*, tb_buku.*')
        ->join('tb_member', 'tb_member.id_member = tb_pengembalian.id_member')
        ->join('tb_buku', 'tb_buku.id_buku = tb_pengembalian.id_buku')
        ->orderBy('tanggal_pengembalian', 'DESC') // Urutan tanggal terbaru (DESC)
        ->get()
        ->getResultArray();
    }

    // query untuk method buku_dikembalikan by member
    public function buku_dikembalikan_by_member($id_member)
    {
        $query = $this->db->table('tb_pengembalian');
        $result = $query->select('*')
            ->join('tb_member', 'tb_member.id_member = tb_pengembalian.id_member')
            ->join('tb_buku', 'tb_buku.id_buku = tb_pengembalian.id_buku')
            ->where('tb_pengembalian.id_member', $id_member)
            ->get()
            ->getResultArray();
    
        return $result;
    }

    public function cetak_pengembalian($bulan, $tahun)
    {
        return $this->select('tb_pengembalian.*, tb_member.*, tb_buku.*')
            ->join('tb_member', 'tb_member.id_member = tb_pengembalian.id_member')
            ->join('tb_buku', 'tb_buku.id_buku = tb_pengembalian.id_buku')
            ->where('MONTH(tanggal_pengembalian)', $bulan)
            ->where('YEAR(tanggal_pengembalian)', $tahun)
            ->orderBy('tanggal_pengembalian', 'DESC') // Urutan tanggal terbaru (DESC)
            ->get()
            ->getResultArray();
    }
    
    public function total_pengembalian()
    {
        $currentMonth = date('m'); // Mendapatkan bulan saat ini

        $query = $this->db->table($this->table)
            ->select('COUNT(DISTINCT id_pengembalian) as total_pengembalian')
            ->where("DATE_FORMAT(tanggal_pengembalian, '%m')", $currentMonth)
            ->get();

        return $query->getRow();
    }
}