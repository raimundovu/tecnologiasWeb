<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class students extends MY_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('student_model');
	}

	public function index()
	{
		//$this->load->view('users_list');
		$data['resultado'] = $this->list_all();
		$this->render_page('students_list', $data);
	}

	public function list_all()
	{
		return $this->student_model->get_all();
	}
	
	public function add_student()
	{
		header('Content-Type: application/json');
		$data = array(
			'matricula' => $this->input->post('matricula'),
			'nombre' => $this->input->post('nombre'),
			'apellido_materno' => $this->input->post('apellido_materno'),
			'apellido_paterno' => $this->input->post('apellido_paterno')
		);
		if ($this->student_model->check($this->input->post('matricula'))) 
		{
			$this->student_model->add_student($data);		
			echo json_encode( array('ok' => true) );
			return;
		}
		echo json_encode( array('ok' => false) );
		return;
	}

	public function add_student_in_subject()
	{
		header('Content-type: application/json');
		$data = [
			'codigo_asignatura' => $this->input->post('id_ins_asig'),
			'id_usuario' => $this->input->post('matricula')
		];

		if ($this->student_model->check_student_in_subject($data)) {
			$this->student_model->add_student_in_subject($data);
			echo json_encode(['ok'=>true]);
			return;
		}
		echo json_encode(['ok'=>false]);
		return;
	}
}