<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include 'assets/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
class Mypdf
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function generate($view, $data=array(),$filename='surat')
	{
		$dompdf = new Dompdf();
		$html = $this->ci->load->view($view, $data, TRUE);
		$dompdf->loadHtml($html);

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'portait');

		// Render the HTML as PDF
		$dompdf->render();
	    $dompdf->stream($filename.".pdf", array("Attachment" => FALSE));
		}

}

/* End of file Mypdf.php */
/* Location: ./application/libraries/Mypdf.php */
