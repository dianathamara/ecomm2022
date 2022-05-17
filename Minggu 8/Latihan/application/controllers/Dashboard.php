<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_role(1);
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['jumlah'] = [];
        $tables = ['pelanggan', 'user', 'jenis_paket'];
        foreach ($tables as $table) {
            $data['jumlah'][$table] = $this->MainModel->count($table);
        }
        $data['tot_transaksi'] = $this->MainModel->sum('transaksi', 'total');

        $bln = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $data['tr'] = [];
        foreach ($bln as $b) {
            $date = date('Y-') . $b;
            $data['tr'][] = $this->MainModel->chartLaundry($date);
        }

        templates_view('admin/dashboard', $data);
    }

    public function blocked()
    {
        $data['title'] = "Not Found";
        templates_view('admin/blocked', $data);
    }
}
