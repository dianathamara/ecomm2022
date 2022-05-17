<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MainModel extends CI_Model
{
    public function get($table)
    {
        return $this->db->get($table)->result_array();
    }

    public function get_where($table, $where = [])
    {
        return $this->db->get_where($table, $where)->row_array();
    }

    public function insert($table, $data = [])
    {
        return $this->db->insert($table, $data);
    }

    public function update($table, $input = [], $where = [])
    {
        return $this->db->update($table, $input, $where);
    }

    public function delete($table, $where)
    {
        return $this->db->delete($table, $where);
    }

    public function count($table)
    {
        return $this->db->count_all($table);
    }

    public function sum($table, $field)
    {
        $this->db->select_sum($field);
        return $this->db->get($table)->row()->$field;
    }

    public function getTransaksi($where = null)
    {
        $this->db->join('pelanggan p', 't.idPelanggan=p.id_pelanggan');
        $this->db->join('user u', 't.idUser=u.id_user');
        $this->db->join('jenis_paket jp', 't.kd_paket=jp.kd_paket');

        if ($where != null) {
            return $this->db->get_where('transaksi t', $where)->row_array();
        } else {
            return $this->db->get('transaksi t')->result_array();
        }
    }

    public function getPaket($where = null)
    {
        $this->db->join('kategori', 'id_kategori');
        if ($where != null) {
            return $this->db->get_where('jenis_paket', $where)->row_array();
        } else {
            return $this->db->get('jenis_paket')->result_array();
        }
    }

    public function getLaporanTransaksi($tgl1 = null, $tgl2 = null)
    {
        $this->db->join('user u', 'u.id_user=t.idUser');
        $this->db->join('pelanggan p', 'p.id_pelanggan=t.idPelanggan');

        if ($tgl1 != null && $tgl2 != null) {
            $this->db->where('tgl_masuk' . '>=', $tgl1);
            $this->db->where('tgl_masuk' . '<=', $tgl2);
        }
        return $this->db->get('transaksi t')->result();
    }

    // kode otomatis 
    public function getId($prefix = null, $table = null, $field = null)
    {
        $this->db->select_max($field);
        $this->db->like($field, $prefix, 'after');
        return $this->db->get($table)->row_array()[$field];
    }

    public function getMax($table = null, $field = null)
    {
        $this->db->select_max($field);
        return $this->db->get($table)->row_array()[$field];
    }

    public function chartLaundry($date)
    {
        $this->db->like('tgl_masuk', $date, 'after');
        return count($this->db->get('transaksi')->result());
    }
}
