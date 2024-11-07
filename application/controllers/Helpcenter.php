<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Helpcenter extends CI_Controller {

	public function index()
	{	
		$this->load->view('header');
		$this->load->view('helpcenter');
		$this->load->view('footer');
	}

	public function goBg(){

		$this->load->view('header');
		$this->load->view('about');
		$this->load->view('footer');
	}
}
