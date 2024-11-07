<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_model extends CI_Model{
    public function getLastUpdate(){
        // construct sql query
        $this->db->order_by('id', 'DESC')->limit(1); 
        
        
        // making query
        $result = $this->db->get('updateStatus');

        if($result->num_rows() == 1){
            // echo "Find";
            return $result->row()->updated;
        } 
        else 
        {
            // echo "Dont fund";
            return NULL;
        }
    }
    public function setLastUpdated($now){
        $data = array(
            'updated' => $now,
        );
        $this->db->insert('updateStatus', $data);
    }
    public function dataExist($table, $key, $value){
        // construct sql query
        $this->db->where($key, $value); 
        
        // making query
        $result = $this->db->get($table);

        if($result->num_rows() == 1){
            // echo "Find";
            return true;
        } 
        else 
        {
            // echo "Dont fund";
            return false;
        }
    }

    public function update_DB(){
        $this->db->empty_table('events');
        $this->db->empty_table('workshops');
		//Events-Green API
		$feed_url1 = 'http://www.trumba.com/calendars/green-events.rss?filterview=green_events';
		// Citation: Events - green - data. Brisbane City Council. (n.d.). Retrieved October 9, 2022, from https://www.data.brisbane.qld.gov.au/data/dataset/green-events 

		$rss1 = new DOMDocument();
		$rss1->load($feed_url1);
		$event_content = array();

		foreach ($rss1->getElementsByTagName('item') as $node) {
			$eId = explode("/", $node->getElementsByTagName('guid')->item(0)->nodeValue);
			$item = array(
				'eventId' => $eId[count($eId)- 1],
				'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
				'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
				'time' => $node->getElementsByTagName('formatteddatetime')->item(0)->nodeValue,
				'location' => $node->getElementsByTagName('location')->item(0)->nodeValue
			);
			$doc = new DOMDocument();
			$doc->loadHTML($node->getElementsByTagName('description')->item(0)->nodeValue);
			$imgtag = $doc->getElementsByTagName('img')[0]->getAttribute('src');
			$item['image'] = $imgtag;

            $start_time = $node->getElementsByTagName('dtstart')->item(0)->nodeValue;
            $start_time = str_replace("Z", "", $start_time);
			$item['start_time'] = $start_time;
            if (strtotime($start_time) > time()) {
                $end_time = $node->getElementsByTagName('dtend')->item(0)->nodeValue;
                $end_time = str_replace("Z", "", $end_time);
                $final_time = date("D M j g:ia",strtotime($start_time))." to ".date("g:ia", strtotime($end_time));
            
                $event_data = array(
                    'id' => $item['eventId'],
                    'title' => $item['title'],
                    'link' => $item['link'],
                    'time' => $final_time,
                    'location' => $item['location'],
                    'image' => $item['image'],
					'start_time' => $item['start_time'],
                );
                if ($this->dataExist('events', 'id', $item['eventId'])) {
                    $this->db->replace('events', $event_data);
                }else {
                    $this->db->insert('events', $event_data);
                }
            }

            

            

			
			// array_push($event_content, $item);
		}

		//Events — Brisbane parks API
		$feed_url2 = 'http://www.trumba.com/calendars/brisbane-events-rss.rss?filterview=parks';
		// Citation: Events - brisbane parks - data. Brisbane City Council. (n.d.). Retrieved October 8, 2022, from https://www.data.brisbane.qld.gov.au/data/dataset/brisbane-parks-events

		$rss2 = new DOMDocument();
		$rss2->load($feed_url2);
		$workshop_content = array();

		foreach ($rss2->getElementsByTagName('item') as $node) {
			$wsId1 = explode("/", $node->getElementsByTagName('guid')->item(0)->nodeValue);
			$item = array(
				'workshopId' => $wsId1[count($wsId1)-1],
				'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
				'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
				'description' => $node->getElementsByTagName('description')->item(0)->nodeValue,
				'time' => $node->getElementsByTagName('formatteddatetime')->item(0)->nodeValue,
				'location' => $node->getElementsByTagName('location')->item(0)->nodeValue
			);
			$doc = new DOMDocument();
			$doc->loadHTML($node->getElementsByTagName('description')->item(0)->nodeValue);
			$imgtag = $doc->getElementsByTagName('img')[0]->getAttribute('src');
			$item['image'] = $imgtag;
			
			if(preg_match("/compost/im", $item['description'])) {
				// array_push($workshop_content, $item);
				$start_time = $node->getElementsByTagName('dtstart')->item(0)->nodeValue;
				$start_time = str_replace("Z", "", $start_time);
				$item['start_time'] = $start_time;
				if (strtotime($start_time) > time()) {
					$end_time = $node->getElementsByTagName('dtend')->item(0)->nodeValue;
					$end_time = str_replace("Z", "", $end_time);
					$final_time = date("D M j g:ia",strtotime($start_time))." to ".date("g:ia", strtotime($end_time));
				
					$workshop_data1 = array(
						'id' => $item['workshopId'],
						'title' => $item['title'],
						'link' => $item['link'],
						'time' => $final_time,
						'location' => $item['location'],
						'image' => $item['image'],
						'start_time' => $item['start_time'],
					);
					if ($this->dataExist('workshops', 'id', $item['workshopId'])) {
						$this->db->replace('workshops', $workshop_data1);
					}else {
						$this->db->insert('workshops', $workshop_data1);
					}
            	}	
			
			}
		}
		

		//Events — Brisbane botanic gardens API
		$feed_url3 = 'http://www.trumba.com/calendars/brisbane-botanic-gardens.rss';
		// Citation: Events - brisbane botanic gardens - data. Brisbane City Council. (n.d.). Retrieved October 9, 2022, from https://www.data.brisbane.qld.gov.au/data/dataset/brisbane-botanic-gardens-events 

		$rss3 = new DOMDocument();
		$rss3->load($feed_url3);

		foreach ($rss3->getElementsByTagName('item') as $node) {
			$wsId2 = explode("/", $node->getElementsByTagName('guid')->item(0)->nodeValue);
			$item = array(
				'workshopId' => $wsId2[count($wsId2)-1],
				'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
				'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
				'description' => $node->getElementsByTagName('description')->item(0)->nodeValue,
				'time' => $node->getElementsByTagName('formatteddatetime')->item(0)->nodeValue,
				'location' => $node->getElementsByTagName('location')->item(0)->nodeValue
			);


			$doc = new DOMDocument();
			$doc->loadHTML($node->getElementsByTagName('description')->item(0)->nodeValue);
			$imgtag = $doc->getElementsByTagName('img')[0]->getAttribute('src');
			$item['image'] = $imgtag;
			
			if(preg_match("/workshop|plant/im", $item['description'])){
				// array_push($workshop_content, $item);
				$start_time = $node->getElementsByTagName('dtstart')->item(0)->nodeValue;
				$start_time = str_replace("Z", "", $start_time);
				$item['start_time'] = $start_time;
				if (strtotime($start_time) > time()) {
					$end_time = $node->getElementsByTagName('dtend')->item(0)->nodeValue;
					$end_time = str_replace("Z", "", $end_time);
					$final_time = date("D M j g:ia",strtotime($start_time))." to ".date("g:ia", strtotime($end_time));
				
					$workshop_data2 = array(
						'id' => $item['workshopId'],
						'title' => $item['title'],
						'link' => $item['link'],
						'time' => $final_time,
						'location' => $item['location'],
						'image' => $item['image'],
						'start_time' => $item['start_time'],
					);
					if ($this->dataExist('workshops', 'id', $item['workshopId'])) {
						$this->db->replace('workshops', $workshop_data2);
					}else {
						$this->db->insert('workshops', $workshop_data2);
					}
            	}
				// $workshop_data2 = array(
				// 	'id' => $item['workshopId'],
				// 	'title' => $item['title'],
				// 	'link' => $item['link'],
				// 	'time' => $item['time'],
				// 	'location' => $item['location'],
                //     'image' => $item['image']
				// );
				// if ($this->dataExist('workshops', 'id', $item['workshopId'])) {
				// 	$this->db->replace('workshops', $workshop_data2);
				// }else {
				// 	$this->db->insert('workshops', $workshop_data2);
				// }
			}
		}
	}



    public function getEvents() {
        // construct sql query
        $this->db->select('*')->order_by('start_time', 'ASC'); 
        
        // making query
        $result = $this->db->get('events');

        return $result->result_array();
    }
    public function getWorkshops(){
        // construct sql query
        $this->db->select('*')->order_by('start_time', 'ASC'); 
        
        // making query
        $result = $this->db->get('workshops');

        return $result->result_array();
    }
}
?>