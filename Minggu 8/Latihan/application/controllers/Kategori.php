<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        $this->form_validation->set_message('required', '%s harus diisi');
        is_role(1, true);
    }

    private function _kodeKategori()
    {
        $table = 'kategori';
        $field = 'id_kategori';

        $lastKode = $this->MainModel->getMax($table, $field);

        $noUrut = (int) substr($lastKode, -3, 3);
        $noUrut += 1;

        $char = 'K';
        $newKode = $char . sprintf('%03s', $noUrut);
        return $newKode;
    }

    public function index()
    {
        $data['title'] = "Data Kategori";
        $data['kategori'] = $this->MainModel->get('kategori');
        templates_view('kategori/data-kategori', $data);
    }


    public function add()
    {
        $data['title'] = "Tambah Kategori";
        $data['kd_kategori'] = $this->_kodeKategori();

        $this->form_validation->set_rules('nm_kategori', 'Nama Kategori', 'required');
        if ($this->form_validation->run() == false) {
            templates_view('kategori/add-kategori', $data);
        } else {
            $input = $this->input->post(null, true);
            $data = [
                'id_kategori' => $input['kode'],
                'nm_kategori' => $input['nm_kategori']
            ];
            $save = $this->MainModel->insert('kategori', $data);
            if ($save) {
                msgBox('save');
                redirect('kategori');
            } else {
                msgBox('save', false);
                redirect('kategori/add');
            }
            redirect('kategori');
        }
    }

    public function edit($idKategori)
    {
        $id = encode_php_tags($idKategori);
        $data['title'] = "Edit Kategori";
        $data['kategori'] = $this->MainModel->get_where('kategori', ['id_kategori' => $id]);

        $this->form_validation->set_rules('nm_kategori', 'Nama Kategori', 'required');
        if ($this->form_validation->run() == false) {
            templates_view('kategori/edit-kategori', $data);
        } else {
            $data = [
                'nm_kategori' => $this->input->post('nm_kategori')
            ];

            $edit = $this->MainModel->update('kategori', $data, ['id_kategori' => $id]);

            if ($edit) {
                msgBox('edit');
                redirect('kategori');
            } else {
                msgBox('edit', false);
                redirect('kategori/edit/' . $id);
            }
            redirect('kategori');
        }
    }

    public function delete($idKategori)
    {
        $id = encode_php_tags($idKategori);
        $del = $this->MainModel->delete('kategori', ['id_kategori' => $id]);

        if ($del) {
            msgBox('delete');
        } else {
            msgBox('delete', false);
        }
        redirect('kategori');
    }
}
