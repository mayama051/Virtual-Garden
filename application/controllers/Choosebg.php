<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Choosebg extends CI_Controller {
	public function index()
	{	
		$this->load->view('header');
        $this->load->view('choosebg');
		$this->load->view('about');
		$this->load->view('footer');
	}

	public function goGarden(){
		$this->load->view('header');
		$this->load->model('Background_model');
		$this->load->model('User_model');
		$this->load->model('Waste_model');
		$username = $this->session->userdata('username');
		$gardenId = $this->input->post('bg');
		$this->User_model->updatebg($username, $gardenId);

		$f_width = $this->Waste_model->getAmount($username, 'fruit')%10;
		$t_width = $this->Waste_model->getAmount($username, 'tree')%10;
		$c_width = $this->Waste_model->getAmount($username, 'chicken')%10;

		$data = array(
			'username' => $username,
			'points' => $this->Waste_model->getPoints($username),
			'fruit_width' => $f_width,
			'tree_width' => $t_width,
			'chicken_width' => $c_width,
			// The garden background should be chosen by user and
			'gardenId' => $gardenId,
			'row' => $this->Background_model->backgroundConf($this->User_model->background($username)),
			'choose_type' => "",
			"picture" => 0,
			'query' => null
		);

		$this->load->view('mainpage', $data);
		
		$this->load->view('about');
		$this->load->view('footer');
	}

	public function test()
	{	
		$this->load->view('header');
        $this->load->view('test');
		$this->load->view('about');
		$this->load->view('footer');
	}

	public function testGoGarden(){
		
		$this->load->model('Background_model');
		$this->load->model('User_model');
		$this->load->model('Waste_model');

		$username = 'User';
		$user_data = array(
			'username' => $username
		);
		$this->session->set_userdata($user_data);


		$gardenId = $this->input->post('bg');
		$this->User_model->updatebg($username, $gardenId);
	
		$f_width = $this->Waste_model->getAmount($username, 'fruit')%10;
		$t_width = $this->Waste_model->getAmount($username, 'tree')%10;
		$c_width = $this->Waste_model->getAmount($username, 'chicken')%10;

		$data = array(
			'username' => $username,
			'points' => $this->Waste_model->getPoints($username),
			'fruit_width' => $f_width,
			'tree_width' => $t_width,
			'chicken_width' => $c_width,
			// The garden background should be chosen by user and
			'gardenId' => $gardenId,
			'row' => $this->Background_model->backgroundConf($this->User_model->background($username)),
			'choose_type' => "",
			"picture" => 0,
			'query' => null
		);
	

		$this->load->view('header', $data);
		$this->load->view('mainpage', $data);	
		$this->load->view('about', $data);
		$this->load->view('footer', $data);
	}

	
}
?>
