<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutorialpage extends CI_Controller {

	public function index()
	{	
		$this->load->view('header');
		$this->load->view('tutorialpage');
		$this->load->view('footer');
	}

	public function goBg(){

		$this->load->view('header');
        $this->load->view('choosebg');
		$this->load->view('about');
		$this->load->view('footer');
	}
}
