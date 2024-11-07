<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
        $this->load->view('header');
        $data['message'] = " ";
		$this->load->view('register',$data);
        $this->load->view('footer');
	}

    public function do_register(){
        $this->load->database();
        $this->load->model('user_model');
        $this->load->model('Waste_model');
        $this->load->view('header');

        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user_data = array(
            'username' => $username,
            'email' => $email
        );

        $this->session->set_userdata($user_data);
        if (!$this->user_model->userUnique($username)) {
            $this->user_model->register($username, $email, $password);
            $this->Waste_model->createNewUser($username);
            // Show the successful message when user register.
            $data['message'] = "Successfully register";
            $this->load->view('tutorialpage');
            $this->load->view('footer');
        } else {
            $data['message'] = "This username has been taken.";
            $this->load->view('register', $data);
            $this->load->view('footer', $data);
        }
    }
}
?>