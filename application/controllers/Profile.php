<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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
			'username' => $username,
			'fruit_point' => $f_point,
			'coffee_point' => $t_point,
			'egg_point' => $c_point,
			'total_point' => $total_point
		);
		$this->load->view('profile', $data);
		$this->load->view('about', $data);
		$this->load->view('footer');
	}

    public function about()
	{   
        $this->load->view('header');

		$username = $this->session->userdata('username');
		$this->load->model('Waste_model');
		$f_point = $this->Waste_model->getAmount($username, 'fruit');
		$t_point = $this->Waste_model->getAmount($username, 'tree');
		$c_point = $this->Waste_model->getAmount($username, 'chicken');
		$total_point = $this->Waste_model->getPoints($username);
		
		$data = array(
			'message'=> "",
			'username' => $username,
			'fruit_point' => $f_point,
			'coffee_point' => $t_point,
			'egg_point' => $c_point,
			'total_point' => $total_point
		);

        $this->load->view('aboutpage', $data);
		$this->load->view('about', $data);
		$this->load->view('footer');
	}

	public function aboutPage()
	{   
        $this->load->view('header');
        $this->load->view('aboutpage');
		$this->load->view('about');
		$this->load->view('footer');
	}

	public function reference()
	{   
        $this->load->view('header');
        $this->load->view('reference');
		$this->load->view('about');
		$this->load->view('footer');
	}

}
?>
