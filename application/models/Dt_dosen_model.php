<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dt_dosen_model extends CI_Model
{

    public $table = 'dt_dosen';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get data pin by nidn
    function get_pin($nidn)
    {
        $this->db->where('nidn', $nidn);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('nidn', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('pin', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('nidn', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('pin', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    // get data dropdown
    function dd_dosen()
    {
        // ambil data dari db
        $this->db->order_by('id', 'asc');
        $result = $this->db->get('dt_dosen');
        // bikin array
        // please select berikut ini merupakan tambahan saja agar saat pertama
        // diload akan ditampilkan text please select.
        $dd['-'] = 'Pilih';
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $dd[$row->nidn] = $row->nama;
            }
        }
        return $dd;
    }

}

/* End of file Dt_dosen_model.php */
/* Location: ./application/models/Dt_dosen_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-27 06:30:15 */
/* http://harviacode.com */