<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PerfectImage_model extends CI_Model{ 
    public function getWH($imageName){
        return $this->db->where('imageName', $imageName)->get('perfectImage');
    }
}
?>
