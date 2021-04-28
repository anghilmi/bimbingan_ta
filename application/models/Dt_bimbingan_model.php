<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dt_bimbingan_model extends CI_Model
{

    public $table = 'dt_bimbingan';
    public $id = 'id_record';
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
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_record', $q);
	$this->db->or_like('thn_akademik', $q);
	$this->db->or_like('nim', $q);
	$this->db->or_like('tgl', $q);
	$this->db->or_like('nidn', $q);
	$this->db->or_like('catatan', $q);
	$this->db->or_like('qrcode', $q);
	$this->db->or_like('validasi', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_record', $q);
	$this->db->or_like('thn_akademik', $q);
	$this->db->or_like('nim', $q);
	$this->db->or_like('tgl', $q);
	$this->db->or_like('nidn', $q);
	$this->db->or_like('catatan', $q);
	$this->db->or_like('qrcode', $q);
	$this->db->or_like('validasi', $q);
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

}

/* End of file Dt_bimbingan_model.php */
/* Location: ./application/models/Dt_bimbingan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-26 09:26:31 */
/* http://harviacode.com */