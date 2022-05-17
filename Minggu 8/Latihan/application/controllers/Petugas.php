<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        $this->form_validation->set_message('required', '%s harus diisi');
        $this->form_validation->set_message('is_unique', '%s sudah ada');
        $this->form_validation->set_message('alpa_dash', '%s tidak boleh ada spasi');
        $this->form_validation->set_message('min_length', '%s minimal 4 karakter');
        $this->form_validation->set_message('matches', '{field} tidak cocok dengan {param}');
        is_role(1, true);
    }

    public function index()
    {
        $data['title'] = "Data User";
        $data['user'] = $this->MainModel->get('user');
        templates_view('petugas/data-petugas', $data);
    }

    private function valid($add = true)
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('role_id', 'Role_Id', 'required');

        if ($add) {
            $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
            $this->form_validation->set_rules('password2', 'Password2', 'required|min_length[4]|matches[password]');
        }
    }

    private function _generated()
    {
        // NP200052900001
        $char = "NU";
        $table = "user";
        $field = "id_user";
        $today = date('ymd');

        $prefix = $char . $today;

        $lastKode = $this->MainModel->getId($prefix, $table, $field);

        // mengambil 5 karakter dari belakang
        $noUrut = (int) substr($lastKode, -5, 5);
        $noUrut += 1;

        // Mengubah kembali menjadi string
        $newKode = $char . $today .  sprintf('%05s', $noUrut);
        return $newKode;
    }

    public function add()
    {
        $data['title'] = "Tambah User";
        $data['id_user'] = $this->_generated();


        $this->valid();
        if ($this->form_validation->run() == false) {
            templates_view('petugas/add-petugas', $data);
        } else {
            $input = $this->input->post(null, true);
            $input['id_user'] = $data['id_user'];
            $input['password'] = password_hash($input['password'], PASSWORD_DEFAULT);
            $input['active'] = 0;
            unset($input['password2']);

            $save = $this->MainModel->insert('user', $input);


            if ($save) {
                msgBox('save');
                redirect('petugas');
            } else {
                msgBox('save', false);
                redirect('petugas/add');
            }

            redirect('petugas');
        }
    }

    public function toggle($userId)
    {
        $id = encode_php_tags($userId);
        $user = $this->MainModel->get_where('user', ['id_user' => $id]);

        $toggle = $user['active'] ? 0 : 1;

        $data = [
            'active' => $toggle
        ];

        $edit = $this->MainModel->update('user', $data, ['id_user' => $id]);

        if ($edit) {
            msgBox('edit');
        } else {
            msgBox('edit', false);
        }
        redirect('petugas');
    }

    public function edit($userId)
    {
        $id = encode_php_tags($userId);
        $data['title'] = "Edit User";
        $data['user'] = $this->MainModel->get_where('user', ['id_user' => $id]);

        $this->valid(false);
        if ($this->form_validation->run() == false) {
            templates_view('petugas/edit-petugas', $data);
        } else {
            $input = $this->input->post(null, true);
            $save = $this->MainModel->update('user', $input,  ['id_user' => $id]);

            if ($save) {
                msgBox('edit');
                redirect('petugas');
            } else {
                msgBox('edit', false);
                redirect('petugas/edit/' . $id);
            }
        }
    }


    public function delete($idUser)
    {
        $id = encode_php_tags($idUser);
        $del = $this->MainModel->delete('user', ['id_user' => $id]);

        if ($del) {
            msgBox('delete');
        } else {
            msgBox('delete', false);
        }
        redirect('petugas');
    }
}
