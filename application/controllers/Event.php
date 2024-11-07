<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->checkForUpdates();
	}

	private function checkForUpdates() {
		$this->load->model('Event_model');
    	date_default_timezone_set('Australia/Brisbane');
		$lastUpdate = $this->Event_model->getLastUpdate();
		$now = date('Y-m-d H:i:s', time());

		$diff = strtotime($now) - strtotime($lastUpdate);
		$diff = $diff / 86400;
		If ($diff > 7) {
			$this->Event_model->setLastUpdated($now);
			$this->Event_model->update_DB();
    	}
	}

	

	public function index()
	{	
		$data['eventInfo'] = $this->Event_model->getEvents();
		$data['wsInfo'] = $this->Event_model->getWorkshops();
		$this->load->view('header');
		$data['message'] ="";
		$this->load->view('event', $data);
        $this->load->view('about', $data);
		$this->load->view('footer');


		// $content = file_get_contents( $feed_url );
		// $data_obj = new SimpleXMLElement($content);
		// $json_obj = json_encode($data_obj);
		// $array_data = json_decode($json_obj, true);

		// echo "<pre>" . print_r($array_data['channel']['item'], true) . "</pre>";
		// $data = $array_data['channel']['item'];

		// foreach($data_obj->channel->item as $entry) {
			
		// 	array_push($data, array($entry->title, $entry->description));
		// 	echo "<pre>" . print_r($data, true) . "</pre>";
		// }
	}

	public function twitter() {
		$this->load->view('header');
		$data['message'] ="";
		$this->load->view('twitter', $data);
        $this->load->view('about', $data);
		$this->load->view('footer');
	}

}

?>