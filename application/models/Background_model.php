<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Background_model extends CI_Model{ 
    public function backgroundConf($bgId){
        return $this->db->where('bgId', $bgId)->get('background')->row();
    }

}
?>
