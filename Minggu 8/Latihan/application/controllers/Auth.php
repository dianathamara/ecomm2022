<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        $this->form_validation->set_message('required', 'kolom <b><i>%s</i></b> tidak boleh kosong');
    }

    private function _validate()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
    }

    public function index()
    {
        is_logged_in();
        $this->_validate();
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {

            // Tangkap data dari input
            $input = $this->input->post(null, true);
            $username = $input['username'];
            $pass = ($input['password']);

            // Ambil data dari database
            $where = ['username' => $username];
            $user = $this->MainModel->get_where('user', $where);

            // cek username 
            if ($user) {
                // cek password
                if (password_verify($pass, $user['password'])) {
                    // user active 
                    if ($user['active'] == 1) {
                        $session = [
                            'id_user' => $user['id_user'],
                            'username' => $user['username'],
                            'role_id' => $user['role_id'],
                            'nama' => $user['nama'],
                        ];
                        $this->session->set_userdata($session);
                        redirect('dashboard');
                    } else {
                        setMsg('danger', 'Akun anda no-aktif. Silahkan hubungi admin.');
                        redirect('auth');
                    }
                } else {
                    setMsg('danger', 'Password salah!');
                    redirect('auth');
                }
            } else {
                setMsg('danger', 'Username tidak terdaftar!');
                redirect('auth');
            }
        }
    }

    public function ubahPassword()
    {
        $data['title'] = "Ubah Password";
        $usr_pass = $this->MainModel->get_where('user', ['id_user' => $this->session->userdata('id_user')])['password'];

        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('password', 'Password Baru', 'required|min_length[4]|alpha_dash');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|matches[password]');

        if ($this->form_validation->run() == false) {
            templates_view('petugas/ubah-password', $data);
        } else {
            $input = $this->input->post(null, true);
            if (password_verify($input['password_lama'], $usr_pass)) {
                $newPass = password_hash($input['password'], PASSWORD_DEFAULT);
                $this->MainModel->update('user', ['password' => $newPass], ['id_user' => $this->session->userdata('id_user')]);
                setMsg('success', 'Password anda berhasil diubah');
                redirect('auth/ubahPassword');
            } else {
                setMsg('danger', 'Password lama tidak cocok');
                redirect('auth/ubahPassword');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata(['username', 'role_id']);
        redirect('auth');
    }
}
