<?php


function templates_view($view, $data = null)
{
    $ci = get_instance();
    $ci->load->view('templates/header', $data);
    $ci->load->view('templates/topbar');
    $ci->load->view('templates/sidebar');
    $ci->load->view($view, $data);
    $ci->load->view('templates/footer',);
}

function setMsg($type, $msg)
{
    $ci = get_instance();
    $text = "";
    $text .= "<div class='alert alert-{$type} alert-dismissible fade show' role='alert'>";
    $text .= $msg;
    $text .= "<button class='close' type='button' data-dismiss='alert' aria-lable='close'>";
    $text .= "<span aria-hidden='true'>&times;</span>";
    $text .= "</button>";
    $text .= "</div>";
    return $ci->session->set_flashdata('pesan', $text);
}

function activeMenu($page, $page2 = null)
{
    $ci = get_instance();
    $uri = $ci->uri->segment(1);

    if ($page == $uri || $page2 == $uri) {
        return 'active';
    }
}

function is_logged_in()
{
    $ci = get_instance();
    if ($ci->session->has_userdata('username')) {
        redirect('dashboard');
    }
}


function is_role($role, $redirect = false)
{
    $ci = get_instance();
    if ($ci->session->userdata('username')) {
        if ($ci->session->userdata('role_id') == $role) {
            return true;
        } else {
            return $redirect ? redirect('dashboard/blocked') : false;
        }
    } else {
        redirect('auth');
    }
}

function role($role = 1, $redirect = false)
{
    $ci = get_instance();
    $level = $ci->session->userdata('role_id');
    if ($redirect) {
        if ($level != $role) {
            redirect('auth');
        }
    } else {
        return $level == $role ? 1 : 0;
    }
}

function msgBox($msg = "save", $success = true)
{
    switch ($msg) {
        case "save":
            $pesan = $success ? "Data berhasil disimpan!" : "Gagal menyimpan data!";
            break;
        case "edit":
            $pesan = $success ? "Data berhasil diedit!" : "Gagal mengedit data!";
            break;
        case "delete":
            $pesan = $success ? "Data berhasil dihapus" : "Gagal menghapus data";
            break;
        case "lunas":
            redirect('admin');
            $pesan = $success ? "Data berhasil dilunaskan" : "Gagal melunaskan transaksi";
            break;
        default:
            $pesan = "";
            break;
    }

    $title = $success ? 'Berhasil!' : 'Gagal!';
    $type = $success ? 'success' : 'error';
    $alert = "
        <script type='text/javascript'>
            $(document).ready(function() {
                Swal.fire(
                    '{$title}',
                    '{$pesan}',
                    '{$type}'
                );
            });
        </script>
    ";

    $ci = get_instance();
    return $ci->session->set_flashdata('pesan', $alert);
}

function indo_date($date, $print_day = null)
{

    $day = [1 => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
    $mont = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    $split = explode('-', $date);
    $nice_date = $split[2] . ' ' . $mont[(int) $split[1]] . ' ' . $split[0];

    if ($print_day) {
        $num = date('N', strtotime($date));
        return $day[$num] . ', ' . $nice_date;
    }
    return $nice_date;
}
