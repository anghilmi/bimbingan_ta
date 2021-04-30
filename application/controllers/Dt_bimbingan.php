<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dt_bimbingan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dt_bimbingan_model');
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
    public function indexz234535346()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'dt_bimbingan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'dt_bimbingan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'dt_bimbingan/index.html';
            $config['first_url'] = base_url() . 'dt_bimbingan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Dt_bimbingan_model->total_rows($q);
        $dt_bimbingan = $this->Dt_bimbingan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'dt_bimbingan_data' => $dt_bimbingan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('dt_bimbingan/dt_bimbingan_list', $data);
    }

    public function read3423532463465($id) 
    {
        $row = $this->Dt_bimbingan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_record' => $row->id_record,
		'thn_akademik' => $row->thn_akademik,
		'nim' => $row->nim,
		'tgl' => $row->tgl,
		'nidn' => $row->nidn,
		'catatan' => $row->catatan,
		'qrcode' => $row->qrcode,
		'validasi' => $row->validasi,
	    );
            $this->load->view('dt_bimbingan/dt_bimbingan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('dt_bimbingan'));
        }
    }

    public function create() 
    {
        $this->load->model('dt_dosen_model');
        $this->load->helper('form_helper');

        $data = array(
            'button' => 'Tambah',
            'action' => site_url('hasil'),
	    'id_record' => set_value('id_record'),
	    'thn_akademik' => set_value('thn_akademik'),
	    'nim' => set_value('nim'),
	    'tgl' => set_value('tgl'),
	    // 'nidn' => set_value('nidn'),
	    'catatan' => set_value('catatan'),
	    'qrcode' => set_value('qrcode'),
	    'validasi' => set_value('validasi'),
        'dd_dosen' => $this->dt_dosen_model->dd_dosen(),
        'dosen_selected' => $this->input->post('nidn') ? $this->input->post('nidn') : '',
    );
        
        $this->load->view('dt_bimbingan/dt_bimbingan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'thn_akademik' => "2020/2021",
		'nim' => $this->input->post('nim',TRUE),
		'tgl' => $this->input->post('tgl',TRUE),
		'nidn' => $this->input->post('nidn',TRUE),
		'catatan' => $this->input->post('catatan',TRUE),
        'persen_progres' => "-",
		'qrcode' => "-",
		'validasi' => "-",
	    );

            

            $this->Dt_bimbingan_model->insert($data);

            //buat image qrcode
            $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
            $config['cacheable']    = true; //boolean, the default is true
            $config['cachedir']     = './assets/'; //string, the default is application/cache/
            $config['errorlog']     = './assets/'; //string, the default is application/logs/
            $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
            $config['quality']      = true; //boolean, the default is true
            $config['size']         = '1024'; //interger, the default is 1024
            $config['black']        = array(224,255,255); // array, default is array(255,255,255)
            $config['white']        = array(70,130,180); // array, default is array(0,0,0)
            $this->ciqrcode->initialize($config);
            //$this->load->library('encryption');

            $id_record = $this->db->insert_id()+45; //45 salt aja
            //$msg = $id_record;

           // $encrypted_id = $this->encryption->encrypt($msg);
            $url_data = base_url('validasi')."/".$id_record;
            $image_data = $url_data;

            $image_name = $id_record; // TODO generate ke URL untuk dosen
            $params['data'] = $image_data; //data yang akan di jadikan QR CODE
            $params['level'] = 'H'; //H=High
            $params['size'] = 10;
            $params['savename'] = FCPATH.$config['imagedir'].$image_name.".png"; //simpan image QR CODE ke folder assets/images/
            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
            //insert data id yang di-get
            $dataID = array(
                
                'qrcode' => $image_name,
               
                );
        
            $this->Dt_bimbingan_model->update($this->db->insert_id(), $dataID);

            
            
            $this->session->set_flashdata('message', 'Tambah Data Berhasil');
            //echo $image_data;
            
            $dataQR = array(
                'hasil' => $image_name,
            );
            // redirect(site_url('hasil'));
            $this->load->view('dt_bimbingan/hasil_qrcode', $dataQR);
        }
    }
    
    public function update($id) 
    {
        $this->load->model('dt_dosen_model');
        $this->load->model('dt_mahasiswa_model');

        $this->load->helper('form_helper');

        $id_asli = $id-45;
        $row = $this->Dt_bimbingan_model->get_by_id($id_asli); //decode akal-akalan
        $getNim = $this->Dt_bimbingan_model->get_nim_by_id($id_asli);
        if (!empty($this->dt_mahasiswa_model->get_nama_by_nim($getNim))) {
            # code...
            $nm_mahasiswa = $this->dt_mahasiswa_model->get_nama_by_nim($getNim);
        }else{
            $nm_mahasiswa = "NIM salah, nama tidak ditemukan";

        }
        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('dt_bimbingan/update_action'),
		'id_record' => set_value('id_record', $row->id_record),
		//'thn_akademik' => set_value('thn_akademik', $row->thn_akademik),
		'nim' => set_value('nim', $row->nim),
		'tgl' => set_value('tgl', $row->tgl),
		'nidn' => set_value('nidn', $row->nidn),
		'catatan' => set_value('catatan', $row->catatan),
        'persen_progres' => set_value('persen_progres', $row->persen_progres),
        'dd_dosen' => $this->dt_dosen_model->dd_dosen(),
        'dosen_selected' => $this->input->post('nidn') ? $this->input->post('nidn') : '',

		'nm_mhs' => $nm_mahasiswa,
		'validasi' => set_value('validasi', $row->validasi),

	    );
            $this->load->view('dt_bimbingan/dt_bimbingan_form_dosen', $data);
        } else {
            $this->session->set_flashdata('message', 'PIN invalid');
            $this->session->set_flashdata('linkback', "<a href='javascript:history.back()'><< Kembali</a>");
            //redirect(site_url('dt_bimbingan'));
            $this->load->view('dt_bimbingan/dt_bimbingan_validasi');
            //echo "PIN invalid <br>";//[todo]
            //echo"<a href='javascript:history.back()'>Go Back</a>";

        }
    }
    
    public function update_action() 
    {
        //ambil data dari tabel dosen, cocokkan dengan nidn yang diinput
        $this->load->model('Dt_dosen_model');
        $row = $this->Dt_dosen_model->get_pin($this->input->post('nidn',TRUE)); 
        $pin_dosen = $row->pin;

        if ($pin_dosen != $this->input->post('pin')) {
            
            $this->session->set_flashdata('message', 'PIN invalid');
            $this->update($this->input->post('id_record', TRUE));
        }else{

        $this->_rules_update();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_record', TRUE));
        } else {

            $data = array(
		//'thn_akademik' => $this->input->post('thn_akademik',TRUE),
		'nim' => substr($this->input->post('nim',TRUE),0,7),
		'tgl' => $this->input->post('tgl',TRUE),
		'nidn' => $this->input->post('nidn',TRUE),
		'catatan' => $this->input->post('catatan',TRUE),
		'persen_progres' => $this->input->post('persen_progres',TRUE),
		'validasi' => "valid",
	    );

            $this->Dt_bimbingan_model->update($this->input->post('id_record', TRUE), $data);
            $this->session->set_flashdata('message', 'Validasi OK');
            //echo "Validasi OK"; //[TODO]
            $this->load->view('dt_bimbingan/dt_bimbingan_validasi');

            //redirect(site_url('dt_bimbingan'));
        }
    }
    }
    
    public function delete3453453452342342($id) 
    {
        $row = $this->Dt_bimbingan_model->get_by_id($id);

        if ($row) {
            $this->Dt_bimbingan_model->delete($id);
            $this->session->set_flashdata('message', 'Hapus Data Berhasil');
            redirect(site_url('dt_bimbingan'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('dt_bimbingan'));
        }
    }

    public function _rules() 
    {
	// $this->form_validation->set_rules('thn_akademik', 'thn akademik', 'trim|required');
	$this->form_validation->set_rules('nim', 'nim', 'exact_length[7]|is_natural|trim|required');
	$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	$this->form_validation->set_rules('nidn', 'nidn', 'trim|required');
	$this->form_validation->set_rules('catatan', 'catatan', 'trim|required');
	// $this->form_validation->set_rules('qrcode', 'qrcode', 'trim');
	// $this->form_validation->set_rules('validasi', 'validasi', 'trim');

	//$this->form_validation->set_rules('id_record', 'id_record', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    public function _rules_update() 
    {
	// $this->form_validation->set_rules('thn_akademik', 'thn akademik', 'trim|required');
	$this->form_validation->set_rules('nim', 'nim', 'min_length[7]|trim|required');
	$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	$this->form_validation->set_rules('nidn', 'nidn', 'trim|required');
	$this->form_validation->set_rules('catatan', 'catatan', 'trim|required');
	// $this->form_validation->set_rules('qrcode', 'qrcode', 'trim');
	// $this->form_validation->set_rules('validasi', 'validasi', 'trim');

	//$this->form_validation->set_rules('id_record', 'id_record', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "dt_bimbingan"."_".date('d-M-Y-H-i-s').".xls";
        $judul = "dt_bimbingan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Thn Akademik");
	xlsWriteLabel($tablehead, $kolomhead++, "Nim");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl");
	xlsWriteLabel($tablehead, $kolomhead++, "Nidn");
	xlsWriteLabel($tablehead, $kolomhead++, "Catatan");
    xlsWriteLabel($tablehead, $kolomhead++, "Progres");
	xlsWriteLabel($tablehead, $kolomhead++, "Qrcode");
	xlsWriteLabel($tablehead, $kolomhead++, "Validasi");

	foreach ($this->Dt_bimbingan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->thn_akademik);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nim);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nidn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->catatan);
        xlsWriteLabel($tablebody, $kolombody++, $data->persen_progres);
	    xlsWriteLabel($tablebody, $kolombody++, $data->qrcode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->validasi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Dt_bimbingan.php */
/* Location: ./application/controllers/Dt_bimbingan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-26 09:26:31 */
/* http://harviacode.com */