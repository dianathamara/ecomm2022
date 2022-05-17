<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Cetak Laporan Transaksi";
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        $this->form_validation->set_message('required', 'Kolom %s harus diisi');
        $this->form_validation->set_message('numeric', 'Kolom %s hanya bisa diisi dengan angka');

        if ($this->form_validation->run() == false) {
            templates_view('laporan/laporan', $data);
        } else {
            $input = $this->input->post(null, true);
            $tgl = explode('-', $input['tanggal']);
            $tgl1 = date('Y-m-d', strtotime($tgl[0]));
            $tgl2 = date('Y-m-d', strtotime(end($tgl)));

            $this->cetak($tgl1, $tgl2);
        }
    }

    public function cetak($tgl1 = null, $tgl2 = null)
    {
        $this->load->library('Dompdf_gen');

        $data['tanggal'] = $tgl1 . " s/d " . $tgl2;
        $data['transaksi'] = $this->MainModel->getLaporanTransaksi($tgl1, $tgl2);
        $this->load->view('laporan/cetak_laporan', $data);

        $paper_size = "A4";
        $orientation = "landscape";
        $html = $this->output->get_output();

        $this->dompdf->set_paper($paper_size, $orientation);
        // convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();

        ob_end_clean();
        $this->dompdf->stream('laporan_transaksi.pdf' . time() . "pdf", array('Attachment' => 0));
    }
}
