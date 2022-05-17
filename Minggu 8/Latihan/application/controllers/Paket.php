<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        $this->form_validation->set_message('required', '%s harus diisi');
        is_role(1, true);
    }

    private function _kodePaket()
    {
        $table = 'jenis_paket';
        $field = 'kd_paket';

        $lastKode = $this->MainModel->getMax($table, $field);

        $noUrut = (int) substr($lastKode, -3, 3);
        $noUrut += 1;

        $char = "KP";
        $newKode = $char . sprintf('%03s', $noUrut);
        return $newKode;
    }

    private function _valid()
    {

        $this->form_validation->set_rules('nm_paket', 'Nama Paket', 'required');
        $this->form_validation->set_rules('kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
    }

    public function index()
    {
        $data['title'] = "Data Paket";
        $data['paket'] = $this->MainModel->getPaket();

        templates_view('paket/data-paket', $data);
    }

    public function add()
    {
        $data['title'] = "Tambah Paket";
        $data['kd_paket'] = $this->_kodePaket();
        $data['kategori'] = $this->MainModel->get('kategori');

        $this->_valid();
        if ($this->form_validation->run() == false) {
            templates_view('paket/add-paket', $data);
        } else {
            $input = $this->input->post(null, true);
            $data = [
                'kd_paket' => $data['kd_paket'],
                'nm_paket' => $input['nm_paket'],
                'id_kategori' => $input['kategori'],
                'harga' => $input['harga']
            ];
            $save = $this->MainModel->insert('jenis_paket', $data);

            if ($save) {
                msgBox('save');
                redirect('paket');
            } else {
                msgBox('save', false);
                redirect('paket/add');
            }

            redirect('paket');
        }
    }

    public function edit($userId)
    {
        $id = encode_php_tags($userId);
        $data['title'] = "Edit Paket";
        $data['kategori'] = $this->MainModel->get('kategori');
        $data['paket'] = $this->MainModel->getPaket(['kd_paket' => $id]);

        $this->_valid();
        if ($this->form_validation->run() == false) {
            templates_view('paket/edit-paket', $data);
        } else {
            $input = $this->input->post(null, true);
            $data = [
                'nm_paket' => $input['nm_paket'],
                'id_kategori' => $input['kategori'],
                'harga' => $input['harga']
            ];

            $edit = $this->MainModel->update('jenis_paket', $data, ['kd_paket' => $id]);

            if ($edit) {
                msgBox('edit');
                redirect('paket');
            } else {
                msgBox('edit', false);
                redirect('paket/edit/' . $id);
            }
            redirect('paket');
        }
    }

    public function delete($userId)
    {
        $id = encode_php_tags($userId);
        $del = $this->MainModel->delete('jenis_paket', ['kd_paket' => $id]);

        if ($del) {
            msgBox('delete');
        } else {
            msgBox('delete', false);
        }

        redirect('paket');
    }
}
