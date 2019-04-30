<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Returnn extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('admin');
	}

   public function index()
   {
		$this->cek_login();
		$data['header'] = 'Data Return';
		$data['return'] = $this->admin->return();
		$this->template->admin('return', $data);
   }

   public function return()
	{
		$data['header'] = 'Input Return';
		if ($this->input->post('submit', TRUE) == 'Submit') {
         //validasi
				$barcode = $this->input->post('barcode',TRUE);
				$item = $this->admin->get_where('t_prod_master', array('BARCODE' => $barcode));
		if ($item->num_rows() > 0)
			{
				foreach ($item->result() as $key) 
				{
					$data['PROD_ID'] = $key->PROD_ID;
					$data['BARCODE'] = $key->BARCODE;
					$data['PROD_NM'] = $key->PROD_NM;
					$data['STATUS'] = $key->STATUS;
					$data['SALE_PRC'] = $key->SALE_PRC;
					$data['L1_NM'] = $key->L1_NM;
				}
				$data['kode_return'] = $this->admin->getkodereturn();
				$data['stock'] = $this->admin->get_where('t_stock_detail', array('BARCODE' => $barcode))->row();
				$data['date'] = date('Y-m-d');
				$this->template->admin('input_return',$data);
				$this->session->set_flashdata('alert', 'Sukses Menyimpan data !!!');
			}else{
			$this->session->set_flashdata('alert-danger', 'Barcode Tidak Ditemukan !!!');
			redirect('Returnn','refresh');

			}	
		}
			
	}
   
   	// Add a new item
   	public function add()
   	{
   		if ($this->input->post('submit', TRUE) == 'Submit') {

			$this->form_validation->set_rules('qty', 'Input Qty', 'required');

			if ($this->form_validation->run() == TRUE) {

				$data = array(
						'ID_RETURN' => $this->input->post('id_return', TRUE),
						'PROD_ID' => $this->input->post('prod_id', TRUE),
						'QTY_RETURN' => $this->input->post('qty', TRUE),
						'DATE' => $this->input->post('date', TRUE),
						'REASON' => $this->input->post('reason', TRUE)
						 );
				$q1 = $this->input->post('stock_qty', TRUE);
				$q2 = $this->input->post('qty', TRUE);
				$q3 = $q1-$q2; 
				$data2 = array(
					'PROD_ID' => $this->input->post('prod_id', TRUE),
					'CAT_NM' => $this->input->post('cat_nm', TRUE),
					'BARCODE' => $this->input->post('barcode', TRUE),
					'PROD_NM' => $this->input->post('prod_nm', TRUE),
					'STATUS' => $this->input->post('status', TRUE),
					'STOCK_QTY' => $q3,
					'SALE_PRC' => $this->input->post('sale_prc', TRUE),
					'DATE' => $this->input->post('date', TRUE)
				 );
				$this->admin->insert('t_return',$data);
				$this->admin->update('t_stock_detail',$data2,array('PROD_ID' => $this->input->post('prod_id', TRUE)));
				$this->session->set_flashdata('alert', 'Sukses Menyimpan data !!!');
				redirect('Returnn','refresh');
			} else {
				$this->session->set_flashdata('alert-danger', 'Gagal Menyimpan data !!!');
				redirect('Returnn','refresh');
			}
   		}
   }
   
   	//Update one item
   	public function excel()
   	{
   		$data['data'] = $this->admin->return();
		require(APPPATH.'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH.'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$objPHPExcel= new PHPExcel();

		$objPHPExcel->getProperties()->setCreator("Wahyu Hidayat");
		$objPHPExcel->getProperties()->setLastModifiedBy("Wahyu Hidayat");
		$objPHPExcel->getProperties()->setTitle("Return Stock");
		$objPHPExcel->getProperties()->setSubject("");
		$objPHPExcel->getProperties()->setDescription("");

		$objPHPExcel->setActiveSheetIndex(0);

		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'ID RETURN');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'PROD_ID');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'PROD NM');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'QTY');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'REASON');
		$objPHPExcel->getActiveSheet()->setCellValue('F1', 'DATE');

		$baris=2;
		$a = 1;
		foreach ($data['data']->result() as $data) {
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$baris, $data->ID_RETURN);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$baris, $data->PROD_ID);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$baris, $data->PROD_NM);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$baris, $data->QTY_RETURN);
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$baris, $data->REASON);
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$baris, $data->DATE);
				
		$baris++;
		}
		$filename = "Return_stock".date("dmYHis").'.xlsx';
		$objPHPExcel->getActiveSheet()->setTitle("Return_Stock");

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachement;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');

		$writer=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
		$writer->save('php://output');

		exit;
   	}
   
   	//Delete one item
   	public function delete( $id = NULL )
   	{
   
   	}
   

	function cek_login()
	{
		if (!$this->session->userdata('login_user'))
		{
			redirect('login');
		}
	}
}
   /* End of file Returnn.php */
   /* Location: ./application/controllers/Returnn.php */
   
