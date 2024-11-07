<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{	
		$this->load->view('header');
		$data['message'] ="";
		$this->load->view('login', $data);
		$this->load->view('footer');
	}

    public function check_login(){
		$this->load->model('Background_model');
		$this->load->model('User_model');
		$this->load->model('Waste_model');
		$this->load->model('Image_model');
		$this->load->view('header');

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if ($this->User_model->userExist($username, $password)){
			// Login successful
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
				"picture" => 0
			);
			if ($this->Image_model->checkUser($username)){
				$data['query'] = $this->Image_model->showImage($username);
			} else {
				$data['query'] = null;
			}

			$user_data = array(
				'username' => $username
			);

			$this->session->set_userdata($user_data);
			redirect('mainpage', $data);
		}else {
			// Login unsuccessful
			$data['message'] ="Invalid Account or Password";
			$this->load->view('login', $data);
		}
		$this->load->view('about', $data);
		$this->load->view('footer');
    }

	public function logout()
	{	
		$this->load->model('Waste_model');
		$this->load->model('Image_model');
		$user = $this->session->userdata('username');
		if ($user === 'User') {
			$this->Waste_model->clearPoints($this->session->userdata('username'));
			$this->Image_model->clearImages($this->session->userdata('username'));
		}
		$this->session->unset_userdata('username');
		set_cookie('wasteType', null, 0);
		redirect('welcome');
	}
}
?>
