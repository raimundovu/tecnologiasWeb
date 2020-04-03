<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class reports extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('reports_model');
	}

	public function index()
	{
	
		$this->render_page('reports_view');
	}

	public function getTableReport1() {
		return $this->load->view('report1');
	}

	public function getTableReport2() {
		return $this->load->view('report2');
	}

	public function getTableReport3() {
		return $this->load->view('report3');
	}

	public function getTableReport4() {
		return $this->load->view('report4');
	}

	public function getTableReport5() {
		return $this->load->view('report5');
	}

	public function getTeachersByDate() {
		$date = $this->input->post("date");

		echo json_encode($this->reports_model->getTeachersByDate($date));
	}

}
