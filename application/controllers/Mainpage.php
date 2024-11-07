<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mainpage extends CI_Controller {
	public function index()
	{
		$username = $this->session->userdata('username');
		$this->load->view('header');

		$this->load->model('Background_model');
		$this->load->model('User_model');
		$this->load->model('Waste_model');
		$this->load->model('Image_model');

		// This section deal with the amount of the bar
		$f_width = $this->Waste_model->getAmount($username, 'fruit')%10;
		$t_width = $this->Waste_model->getAmount($username, 'tree')%10;
		$c_width = $this->Waste_model->getAmount($username, 'chicken')%10;

		// Update fruitBar, treeBar, chickenBar, points, background
		$data = array(
			'username' => $username,
			'points' => $this->Waste_model->getPoints($username),
			'fruit_width' => $f_width,
			'tree_width' => $t_width,
			'chicken_width' => $c_width,
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
		$this->load->view('mainpage', $data);
		$this->load->view('about');
		$this->load->view('footer');
	}

	public function updateWaste($picture){
		$this->load->model('User_model');
		$this->load->model('Waste_model');
		$this->load->model('Image_model');
		$this->load->model('Background_model');
		$this->load->model('PerfectImage_model');
		
		$wasteType = get_cookie('wasteType');
		$username = $this->session->userdata('username');

		$newAmount = $this->input->post('wasteAmount');
		$this->putImages($username, $newAmount, $wasteType);
		$this->Waste_model->updateWaste($username, $newAmount, $wasteType);

		$this->load->view('header');
		$f_width = $this->Waste_model->getAmount($username, 'fruit')%10;
		$t_width = $this->Waste_model->getAmount($username, 'tree')%10;
		$c_width = $this->Waste_model->getAmount($username, 'chicken')%10;
		if ($wasteType == 'fruit'){
			$showWwasteType = "Fruit and Veggies";
		} else if ($wasteType == 'tree'){
			$showWwasteType = "Coffee grounds";
		} else if ($wasteType == 'chicken'){
			$showWwasteType = "Eggshells and Teabags";
		} else {
			$showWwasteType = "Coffee grounds";
		}
		$data = array(
			'username' => $username,
			'points' => $this->Waste_model->getPoints($username),
			'fruit_width' => $f_width,
			'tree_width' => $t_width,
			'chicken_width' => $c_width,
			'gardenId' => $this->User_model->background($username),
			'row' => $this->Background_model->backgroundConf($this->User_model->background($username)),
			'choose_type' => $showWwasteType,
			"picture" => $picture
		);
		if ($this->Image_model->checkUser($username)){
			$data['query'] = $this->Image_model->showImage($username);
		} else {
			$data['query'] = "";
		}
		$this->load->view('mainpage', $data);
		$this->load->view('about', $data);
		$this->load->view('footer');

	}

	// Place the image on the virtual garden
	public function putImages($username, $newAmount, $wasteType){
		$this->load->model('Waste_model');
		$this->load->model('Image_model');
		$this->load->model('PerfectImage_model');

		// insert the image instance into database so that it will automatically show on the page
		$curAmount = $this->Waste_model->getAmount($username, $wasteType);
		$totalAmount = $curAmount%10 + $newAmount;
		while($totalAmount >= 10){
			$totalAmount = $totalAmount - 10;
			if ($this->Image_model->searchUncomplete($username, $wasteType)){
				// echo "UpGrade!!!!!!!!!!!!!!";
				// According to the name and update to the next version
				$this->Image_model->updateImage($username, $wasteType );
			} else {
				// echo "Create a new One!!!!!!";
				$number = rand(1,2);
				$imageName = "";
				if ($wasteType == "fruit"){
					if ($number == 1){
						$imageName = "t.1";
					} else if ($number == 2){
						$imageName = "flower.1";
					}
				} else if ($wasteType == "tree"){
					if ($number == 1){
						$imageName = "tree.1";
					} else if ($number == 2){
						$imageName = "w.1";
					}
				} else if ($wasteType == "chicken"){
					if ($number == 1){
						$imageName = "chicken.1.1";
					} else if ($number == 2){
						$imageName = "chicken.1.2";
					}
				}
				
				$query = $this->PerfectImage_model->getWH($imageName);
				$pBottom = rand(0, 85);
				$pLeft = rand(0, 90);
				// echo $query->row()->pWidth;
				// echo $query->row()->pHeight;
				$this->Image_model->insertImages($username, $query->row()->pWidth, $query->row()->pHeight, $pBottom, $pLeft, $imageName, $wasteType);
			}

		}

		if ($this->Image_model->selectNothing($username)){
			$number = rand(1,2);
			$imageName = "";
			if ($wasteType == "fruit"){
				if ($number == 1){
					$imageName = "t.1";
				} else if ($number == 2){
					$imageName = "flower.1";
				}
			} else if ($wasteType == "tree"){
				if ($number == 1){
					$imageName = "tree.1";
				} else if ($number == 2){
					$imageName = "w.1";
				}
			} else if ($wasteType == "chicken"){
				if ($number == 1){
					$imageName = "chicken.1.1";
				} else if ($number == 2){
					$imageName = "chicken.1.2";
				}
			} 
			else {
				$wasteType = "tree";
				if ($number == 1){
					$imageName = "tree.1";
				} else if ($number == 2){
					$imageName = "w.1";
				}
			}
			$query = $this->PerfectImage_model->getWH($imageName);
			$pBottom = rand(0, 85);
			$pLeft = rand(0, 90);
			// echo $query->row()->pWidth;
			// echo $query->row()->pHeight;
			$this->Image_model->insertImages($username, $query->row()->pWidth, $query->row()->pHeight, $pBottom, $pLeft, $imageName, $wasteType);
		}

	}
}
