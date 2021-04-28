<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dt_dosen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dt_dosen_model');
        $this->load->library('form_validation');
        //$this->check();
    }

    
    public function check()
    {
        if ($this->uri->uri_string() !== 'auth' && ! $this->session->userdata('logged_in'))
            //&& $this->uri->uri_string() !== 'user/reset_password' &&  $this->uri->uri_string() !== 'user/pilihan') // biar false (pengecualian)
        {     
            redirect('auth');
        }
    }
    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'dt_dosen/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'dt_dosen/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'dt_dosen/index.html';
            $config['first_url'] = base_url() . 'dt_dosen/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Dt_dosen_model->total_rows($q);
        $dt_dosen = $this->Dt_dosen_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'dt_dosen_data' => $dt_dosen,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('dt_dosen/dt_dosen_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Dt_dosen_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nidn' => $row->nidn,
		'nama' => $row->nama,
		'pin' => $row->pin,
	    );
            $this->load->view('dt_dosen/dt_dosen_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('dt_dosen'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('dt_dosen/create_action'),
	    'id' => set_value('id'),
	    'nidn' => set_value('nidn'),
	    'nama' => set_value('nama'),
	    'pin' => set_value('pin'),
	);
        $this->load->view('dt_dosen/dt_dosen_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nidn' => $this->input->post('nidn',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'pin' => $this->input->post('pin',TRUE),
	    );

            $this->Dt_dosen_model->insert($data);
            $this->session->set_flashdata('message', 'Tambah Data Berhasil');
            redirect(site_url('dt_dosen'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Dt_dosen_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('dt_dosen/update_action'),
		'id' => set_value('id', $row->id),
		'nidn' => set_value('nidn', $row->nidn),
		'nama' => set_value('nama', $row->nama),
		'pin' => set_value('pin', $row->pin),
	    );
            $this->load->view('dt_dosen/dt_dosen_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('dt_dosen'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nidn' => $this->input->post('nidn',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'pin' => $this->input->post('pin',TRUE),
	    );

            $this->Dt_dosen_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Ubah Data Berhasil');
            redirect(site_url('dt_dosen'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Dt_dosen_model->get_by_id($id);

        if ($row) {
            $this->Dt_dosen_model->delete($id);
            $this->session->set_flashdata('message', 'Hapus Data Berhasil');
            redirect(site_url('dt_dosen'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('dt_dosen'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nidn', 'nidn', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('pin', 'pin', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "dt_dosen"."_".date('d-M-Y-H-i-s').".xls";
        $judul = "dt_dosen";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nidn");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Pin");

	foreach ($this->Dt_dosen_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nidn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pin);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Dt_dosen.php */
/* Location: ./application/controllers/Dt_dosen.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-27 06:30:15 */
/* http://harviacode.com */