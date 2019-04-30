<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sum_Stock extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('admin');
	}

	public function index()
	{
		$this->cek_login();
		$data['header'] = 'Summary';
		$data['data'] = $this->admin->summary()->result();

		$this->template->admin('sum_stock', $data);	
	}

	public function excel()
	{
		$data['data'] = $this->admin->summary()->result();
		require(APPPATH.'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH.'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$objPHPExcel= new PHPExcel();

		$objPHPExcel->getProperties()->setCreator("Wahyu Hidayat");
		$objPHPExcel->getProperties()->setLastModifiedBy("Wahyu Hidayat");
		$objPHPExcel->getProperties()->setTitle("Summary Stock");
		$objPHPExcel->getProperties()->setSubject("");
		$objPHPExcel->getProperties()->setDescription("");

		$objPHPExcel->setActiveSheetIndex(0);

		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'DIVISI');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'CATEGORY');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'PROD NM');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'STOCK QTY');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'STOCK AMT');

		$baris=2;
		$a = 1;
		foreach ($data['data'] as $data) {
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$baris, $data->DIVISION);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$baris, $data->CAT_NM);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$baris, $data->PROD_NM);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$baris, $data->STOCK_QTY);
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$baris, $data->STOCK_QTY*$data->SALE_PRC);
				
		$baris++;
		}
		$filename = "Summary_stock".date("dmYHis").'.xlsx';
		$objPHPExcel->getActiveSheet()->setTitle("Summary_Stock");

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachement;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');

		$writer=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
		$writer->save('php://output');

		exit;
	}
	function cek_login()
	{
		if (!$this->session->userdata('login_user'))
		{
			redirect('login');
		}
	}

}

/* End of file Sum_Stock.php */
/* Location: ./application/controllers/Sum_Stock.php */