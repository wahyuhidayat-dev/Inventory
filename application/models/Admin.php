<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

   function insert($table = '', $data = '')
   {
      $this->db->insert($table, $data);
   }

	function insert_last($table = '', $data = '')
   {
      $this->db->insert($table, $data);

		return $this->db->insert_id();
   }

	function get_all($table)
	{
		$this->db->from($table);

		return $this->db->get();
	}

	function get_where($table = null, $where = null)
	{
		$this->db->from($table);
		$this->db->where($where);

		return $this->db->get();
	}

	function select_all($select, $table)
	{
		$this->db->select($select);
		$this->db->from($table);

		return $this->db->get();
	}

	function select_where($select, $table, $where)
	{
		$this->db->select($select);
		$this->db->from($table);
		$this->db->where($where);

		return $this->db->get();
	}

	function update($table = null, $data = null, $where = null)
	{
		$this->db->update($table, $data, $where);
	}

	function delete($table = null, $where = null)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function report($where = '')
	{
		$this->db->select(array('o.id_order AS id_order', 'fullname', 'tujuan', 'total', 'SUM(biaya) AS biaya'));

		$this->db->from('t_order o JOIN t_detail_order do ON (o.id_order = do.id_order) JOIN t_users u ON (o.id_user = u.id_user)');
		$this->db->where($where);
		$this->db->group_by('o.id_order');

		return $this->db->get();
	}

	function count($table='')
	{
		return $this->db->count_all($table);
	}

	function count_where($table='', $where = '')
	{
		$this->db->from($table);
		$this->db->where($where);

		return $this->db->count_all_results();
	}

	function last($table, $limit, $order)
	{
		$this->db->from($table);
		$this->db->limit($limit);
		$this->db->order_by($order, 'DESC');

		return $this->db->get();
	}

	function sum($table = null, $where = null)
	{
		$this->db->from($table);
		$this->db->where($where);

		return $this->db->get();
	}
	function total()
	{
		$this->db->select_sum('STOCK_QTY');
		$result = $this->db->get('t_stock_detail')->row();  
		return $result->STOCK_QTY;
	}

	function sector()
	{
		$query =$this->db->select(array('a.PROD_ID AS PROD_ID','a.QTY','a.SEKTOR', 'b.PROD_NM', 'b.BARCODE', 'b.STATUS'));
		$this->db->from('t_stock_location AS a');
		$this->db->join('t_prod_master AS b', 'a.PROD_ID = b.PROD_ID');
		$query = $this->db->get();
		return $query;
		
	}

	function return()
	{
		$query =$this->db->select(array('a.PROD_ID AS PROD_ID','a.QTY_RETURN','a.DATE','a.REASON','a.ID_RETURN', 'b.PROD_NM', 'b.BARCODE', 'b.STATUS'));
		$this->db->from('t_return AS a');
		$this->db->join('t_prod_master AS b', 'a.PROD_ID = b.PROD_ID');
		$query = $this->db->get();
		return $query;
	}

	function getkodeout()
    {
        $query = $this->db->query("select max(ID_TRANS) as max_code FROM t_stock_out");

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 2, 9);

        $max = $max_fix + 1;

        $nik = "OT".sprintf("%09s", $max);
        return $nik;
    }

	function getkodereturn()
    {
        $query = $this->db->query("select max(ID_RETURN) as max_code FROM t_return");

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 2, 9);

        $max = $max_fix + 1;

        $nik = "R".sprintf("%09s", $max);
        return $nik;
    }


    	function getnik()
    {
        $query = $this->db->query("select max(nik) as max_code FROM t_user");

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int)$max_id;

        $max = $max_fix + 1;

        $nik = sprintf("%09s", $max);
        return $nik;
    }

    function update_stock()
    {
    	$query = $this->db->select(array('a.PROD_ID AS PROD_ID', 'a.SUM(QTY_IN) AS QTY_IN', 'a.DATE', 'b.BARCODE', 'b.PROD_NM', 'b.STATUS','b.SUM(STOCK_QTY) AS STOCK_QTY'));
		$this->db->from('t_stock_in AS a');
		$this->db->join('t_stock_detail AS b', 'a.PROD_ID = b.PROD_ID');
		$query = $this->db->get();
		return $query;	
    }

    function summary()
    {
    	$query = $this->db->select(array('b.CAT_NM AS CAT_NM','b.BARCODE', 'b.PROD_NM', 'b.STATUS','b.STOCK_QTY','b.SALE_PRC','c.DIVISION'));
		$this->db->from('t_stock_detail AS b');
		$this->db->join('t_category AS c', 'b.CAT_NM = c.CAT_NM');
		
		//$this->db->where('c.DIVISION');
		$query = $this->db->get();
		return $query;

		// $this->db->select(array('o.id_order AS id_order', 'fullname', 'tujuan', 'total', 'SUM(biaya) AS biaya'));

		// $this->db->from('t_order o JOIN t_detail_order do ON (o.id_order = do.id_order) JOIN t_users u ON (o.id_user = u.id_user)');
		// $this->db->where($where);
		// $this->db->group_by('o.id_order');	
    }

    function total_out()
	{
		$query = $this->db->select(array('a.PROD_ID AS PROD_ID', 'a.QTY_OUT', 'a.DATE', 'b.BARCODE', 'b.PROD_NM', 'b.STATUS','b.STOCK_QTY','b.SALE_PRC','b.CAT_NM','c.DIVISION'));
		$this->db->from('t_stock_out AS a');
		$this->db->join('t_stock_detail AS b', 'a.PROD_ID = b.PROD_ID');
		//this->db->join('t_stock_out AS o', 'a.PROD_ID = o.PROD_ID');
		$this->db->join('t_category AS c', 'b.CAT_NM = c.CAT_NM');
		//$this->db->where('c.DIVISION');
		$query = $this->db->get();
		return $query;
	}
}// End Admin
