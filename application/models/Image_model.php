<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Image_model extends CI_Model{ 
    public function showImage($username){
        $this->db->where('username', $username);
        return $this->db->get('images');
    }

    public function selectNothing($username){
        $builder = $this->db->where('username', $username);
        if($builder->get('images')->num_rows() > 0){
            return false;
        } else {
            return true;
        }
    }

    public function checkUser($username){
        $this->db->where('username', $username);
        $query = $this->db->get('images');
        if ($query->num_rows()> 0){
            return true;
        }else {
            return false;
        }
    }

    public function insertImages($username, $pWidth, $pHeight, $pBottom, $pLeft, $imageName, $wasteType){
        $data=  array(
            'username' => $username,
            'pWidth' => $pWidth,
            'pHeight' => $pHeight,
            'pBottom' => $pBottom,
            'pLeft' => $pLeft,
            'image' => $imageName,
            'wasteType' => $wasteType,
            'unComplete' => 0
        );
        $this->db->insert('images', $data);
    }

    public function searchUncomplete($username, $wasteType){
        $builder = $this->db->where('username', $username)
                ->where('wasteType', $wasteType)
                ->where('unComplete', 0)->get('images');

        if ($builder->num_rows() > 0){
            // There is an uncomplete item in database
            return true;
        } else {
            return false;
        }
    }

    public function updateImage($username, $wasteType){
        $this->load->model('PerfectImage_model');

        $names = array('chicken.3.1', 'chicken.3.2', 'flower.5', 't.5', 'tree.5', 'w.5');
        $builder = $this->db->where('username', $username)
                ->where('wasteType', $wasteType)
                ->where('unComplete', 0)->get('images');

        $imageName = $builder->row()->image;
        $version = explode(".", $imageName);
        
        $newImageName = ""; 
        $number = intval($version[1]) + 1;
        // echo $number;
        if (count($version) == 2){
            $newImageName = $version[0].".".$number;
        } else if(count($version) == 3){
            $newImageName = $version[0].".".$number.".".$version[2];
        }
        if (in_array("$newImageName", $names)){
            $completion = 1;
        } else {
            $completion = 0;
        }
        // echo $newImageName;
        $data = array(
            'username' => $username,
            'pWidth' => $this->PerfectImage_model->getWH($newImageName)->row()->pWidth,
            'pHeight' => $this->PerfectImage_model->getWH($newImageName)->row()->pHeight,
            'pBottom' => $builder->row()->pBottom,
            'pLeft' => $builder->row()->pLeft,
            'image' => $newImageName,
            'wasteType' => $wasteType,
            'unComplete' => $completion
        );

        $this->db->where('username', $username)
                ->where('wasteType', $wasteType)
                ->where('unComplete', 0)->update('images', $data);
    }

    public function clearImages($username) {
        $this->db->where('username', $username);
        $this->db->delete('images');  
    }
}
?>
