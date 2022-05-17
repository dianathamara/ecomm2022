<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        $this->form_validation->set_message('required', '%s harus diisi');
        is_role(2);
    }

    public function index()
    {

        $data['title'] = "Data Pelanggan";
        $data['pelanggan'] = $this->MainModel->get('pelanggan');
        templates_view('pelanggan/data-pelanggan', $data);
    }

    private function _valid()
    {
        $this->form_validation->set_rules('nm_pelanggan', 'Nama Pelanggan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required');
    }

    private function _KodePelanggan()
    {
        // P0001
        $table = "pelanggan";
        $field = "id_pelanggan";

        $lastKode = $this->MainModel->getMax($table, $field);

        // Mengambil 4 karater dari belakang
        $noUrut = (int) substr($lastKode, -4, 4);
        $noUrut++;

        // Mengembalikan menjadi string
        $char = "P";
        $newKode = $char . sprintf('%04s', $noUrut);
        return $newKode;
    }

    public function add()
    {
        $data['title'] = "Tambah Pelanggan";
        $data['id_pelanggan'] = $this->_kodePelanggan();

        $this->_valid();
        if ($this->form_validation->run() == false) {
            templates_view('pelanggan/add-pelanggan', $data);
        } else {
            $data = [
                'id_pelanggan' => $data['id_pelanggan'],
                'nm_pelanggan' => $this->input->post('nm_pelanggan'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp')
            ];
            $save = $this->MainModel->insert('pelanggan', $data);

            if ($save) {
                msgBox('save');
                redirect('pelanggan');
            } else {
                msgBox('save');
                redirect('pelanggan/add');
            }
            redirect('pelanggan');
        }
    }

    public function edit($idPel)
    {
        $id = encode_php_tags($idPel);

        $data['pelanggan'] = $this->MainModel->get_where('pelanggan', ['id_pelanggan' => $id]);
        $data['title'] = "Edit Petugas";

        $this->_valid(false);
        if ($this->form_validation->run() == false) {
            templates_view('pelanggan/edit-pelanggan', $data);
        } else {

            $input =  $this->input->post(null, true);
            $data = [
                'id_pelanggan' => $input['kode'],
                'nm_pelanggan' => $input['nm_pelanggan'],
                'alamat' => $input['alamat'],
                'no_telp' => $input['no_telp']
            ];
            $edit = $this->MainModel->update('pelanggan', $data, ['id_pelanggan' => $id]);

            if ($edit) {
                msgBox('edit');
                redirect('pelanggan');
            } else {
                msgBox('edit', false);
                redirect('pelanggan/edit/' . $id);
            }
        }
    }

    public function delete($idPel)
    {
        $id = encode_php_tags($idPel);
        $del = $this->MainModel->delete('pelanggan', ['id_pelanggan' => $id]);

        if ($del) {
            msgBox('delete');
        } else {
            msgBox('delete', false);
        }
        redirect('pelanggan');
    }
}
