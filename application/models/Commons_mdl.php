<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commons_mdl extends CI_Model{
	
	function __construct(){
		parent ::__construct();
	}

    public function getData($table, $where = null, $orderBy = null)
    {
		($where) ? $this->db->where($where) : null;
		($orderBy) ? $this->db->order_by($orderBy) : null;
		$query = $this->db->get($table);
		return $query;
    }

    public function update($table, $where, $data)
    {
		$this->db->where($where);
		return $this->db->update($table, $data);
    }

    public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function delete($table, $where)
    {
        return $this->db->delete($table, $where);
    }

    public function getCount($table) {
        return $this->db->count_all($table);
    }

    public function customQuery($sql)
    {
		return $this->db->query($sql);
	}

}