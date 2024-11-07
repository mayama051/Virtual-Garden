<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gameinfo2 extends CI_Controller {
	public function index()
	{
		$username = $this->session->userdata('username');
		$this->load->view('header');
		$this->load->view('gameinfo2');
		$this->load->view('about');
		$this->load->view('footer');
	}

	

	
}
