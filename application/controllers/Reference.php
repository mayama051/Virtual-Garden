<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reference extends CI_Controller {

	public function index()
	{	
		$this->load->view('header');
		$this->load->model('Waste_model');

		$username = $this->session->userdata('username');
		$f_point = $this->Waste_model->getAmount($username, 'fruit');
		$t_point = $this->Waste_model->getAmount($username, 'tree');
		$c_point = $this->Waste_model->getAmount($username, 'chicken');
		$total_point = $this->Waste_model->getPoints($username);
		$data = array(
			'message'=> "",
			'fruit_point' => $f_point,
			'coffee_point' => $t_point,
			'egg_point' => $c_point,
			'total_point' => $total_point
		);
		$this->load->view('reference', $data);
		$this->load->view('about', $data);
		$this->load->view('footer');
	}

    

}
?>
