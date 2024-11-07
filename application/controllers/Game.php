<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller {
	public function index()
	{
		$username = $this->session->userdata('username');
		$this->load->view('header');
		$this->load->view('game');
		$this->load->view('about');
		$this->load->view('footer');
		
	}

	public function done(){
		$this->load->model('Waste_model');
		$this->load->model('Background_model');
		$this->load->model('User_model');
		$this->load->model('Image_model');

		$username = $this->session->userdata('username');

		$this->load->view('header');
		if($username != null){
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
				'gardenId' => $this->User_model->background($username),
				'row' => $this->Background_model->backgroundConf($this->User_model->background($username)),
				'choose_type' => "",
				"picture" => 0,
				'query' =>  $this->Image_model->showImage($username)
			);
			$this->load->view('mainpage', $data);
		} else {
			// set_cookie("points", null, '300'); //set cookie username
			$this->load->view('homepage');
		}
		$this->load->view('about');
		$this->load->view('footer');
		$points = get_cookie('points'); //get the points from cookie
		if ($points != null && $username != null){
			$this->Waste_model->gainPoints($username, $points);
		}
		set_cookie("points", null, '300'); //set cookie username
	}
	

	
}