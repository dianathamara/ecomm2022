<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        $this->form_validation->set_message('required', '%s harus diisi');
    }

    public function index()
    {
        $data['title'] = "Data Transaksi";
        $data['transaksi'] = $this->MainModel->getTransaksi();
        templates_view('transaksi/data-transaksi', $data);
    }

    private function _kodeTransaksi()
    {
        $char = "T";
        $table = 'transaksi';
        $field = 'no_transaksi';
        $today = date('ymd');

        $prefix = $char . $today;
        $lastKode = $this->MainModel->getID($prefix, $table, $field);

        // mengambil 3 karakter dari belakang
        $noUrut = (int) substr($lastKode, -3, 3);
        $noUrut += 1;

        // Mengembalikan ke string
        $newKode = $char . $today . sprintf('%03s', $noUrut);
        return $newKode;
    }

    private function _valid()
    {
        $this->form_validation->set_rules('pelanggan', 'Pelanggan', 'required');
        $this->form_validation->set_rules('masuk', 'Masuk', 'required');
        $this->form_validation->set_rules('kembali', 'Kembali', 'required');
        $this->form_validation->set_rules('layanan', 'Layanan', 'required');
        $this->form_validation->set_rules('berat', 'Berat', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
    }

    public function add()
    {
        $id_user = $this->session->userdata('id_user');

        $data['title'] = "Tambah Transaksi";
        $data['no_transaksi'] = $this->_kodeTransaksi();

        $data['data'] = [];
        $tables = ['user', 'jenis_paket', 'pelanggan', 'transaksi'];
        foreach ($tables as $table) {
            $data['data'][$table] = $this->MainModel->get($table);
        }

        $this->_valid();
        if ($this->form_validation->run() == false) {
            templates_view('transaksi/add-transaksi', $data);
        } else {
            $input = $this->input->post(null, true);
            $data = [
                'idUser' => $id_user,
                'no_transaksi' => $data['no_transaksi'],
                'idPelanggan' => $input['pelanggan'],
                'tgl_masuk' => $input['masuk'],
                'tgl_kembali' => $input['kembali'],
                'status' => $input['status'],
                'berat' => $input['berat'],
                'tarif' => $input['harga'],
                'total' => $input['total'],
                'keterangan' => $input['keterangan'],
                'kd_paket' => $input['layanan']
            ];
            $save = $this->MainModel->insert('transaksi', $data);

            if ($save) {
                msgBox('save');
                redirect('transaksi');
            } else {
                msgBox('save', false);
                redirect('transaksi/add');
            }

            redirect('transaksi');
        }
    }

    public function edit($userId)
    {
        $id = encode_php_tags($userId);
        $data['title'] = "Edit Transaksi";
        $data['transaksi'] = $this->MainModel->get_where('transaksi', ['no_transaksi' => $id]);

        $data['data'] = [];
        $tables = ['user', 'pelanggan', 'jenis_paket'];
        foreach ($tables as $table) {
            $data['data'][$table] = $this->MainModel->get($table);
        }

        $this->_valid(false);
        if ($this->form_validation->run() == false) {
            templates_view('transaksi/edit-transaksi', $data);
        } else {
            $input = $this->input->post(null, true);
            $data = [
                'no_transaksi' => $input['id_transaksi'],
                'idPelanggan' => $input['pelanggan'],
                'tgl_masuk' => $input['masuk'],
                'tgl_kembali' => $input['kembali'],
                'status' => $input['status'],
                'berat' => $input['berat'],
                'tarif' => $input['harga'],
                'total' => $input['total'],
                'keterangan' => $input['keterangan'],
                'kd_paket' => $input['layanan']
            ];
            $edit = $this->MainModel->update('transaksi', $data, ['no_transaksi' => $id]);

            if ($edit) {
                msgBox('edit');
                redirect('transaksi');
            } else {
                msgBox('edit', false);
                redirect('transaksi/edit/' . $id);
            }
        }
    }

    public function detail($detailId)
    {
        $id = encode_php_tags($detailId);
        $whereId = ['no_transaksi' => $id];
        $data['detail'] = $this->MainModel->getTransaksi($whereId);
        $data['title'] = "Detail Transaksi Laundry";


        templates_view('transaksi/detail-transaksi', $data);
    }

    public function status($id)
    {
        $data = ['status' => 'Lunas'];
        $where = ['no_transaksi' => $id];
        $lunas = $this->MainModel->update('transaksi', $data, $where);

        if ($lunas) {
            msgBox('lunas');
            redirect('transaksi');
        } else {
            msgBox('lunas', false);
            redirect('transaksi');
        }
    }

    public function delete($userId)
    {
        $id = encode_php_tags($userId);
        $del = $this->MainModel->delete('transaksi', ['no_transaksi' => $id]);

        if ($del) {
            msgBox('delete');
        } else {
            msgBox('delete', false);
        }
        redirect('transaksi');
    }

    public function cetak_pdf()
    {
        $this->load->library('dompdf_gen');

        $data['transaksi'] = $this->MainModel->getTransaksi();

        $this->load->view('transaksi/cetak_pdf.php', $data);

        $paper = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();

        $this->dompdf->set_paper($paper, $orientation);

        // convert to PDF 
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream('cetak_pdf.pdf', array('Attachment' => 0));
    }

    public function cetak_pdf_pelanggan($id)
    {
        $this->load->library('dompdf_gen');

        $id = encode_php_tags($id);
        $whereId = ['no_transaksi' => $id];
        $data['transaksi'] = $this->MainModel->getTransaksi($whereId);

        $this->load->view('transaksi/cetak_pdf_pelanggan.php', $data);

        $paper = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();

        $this->dompdf->set_paper($paper, $orientation);

        // convert to PDF 
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream('cetak_pdf_pelanggan.pdf', array('Attachment' => 0));
    }
}
