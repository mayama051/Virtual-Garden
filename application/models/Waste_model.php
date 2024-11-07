<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Waste_model extends CI_Model{ 
    // update the waste amount and point amount depending on the wasteType
    public function updateWaste($username, $amount, $wasteType){
        // Find out the user
        $builder = $this->db->where('username', $username)->get('waste');
        
        if($builder->num_rows() == 1){
            if ($wasteType == "fruit") {
                $total_point = $builder->row()->Points + $amount;
                $newAmount = $builder->row()->FW_fruit_veggies + $amount;
                $data = array(
                    'username' => $username,
                    'FW_fruit_veggies' => $newAmount,
                    'FW_coffee' => $builder->row()->FW_coffee,
                    'FW_eggshell' => $builder->row()->FW_eggshell,
                    'Points' => $total_point
                );
                
                $this->db->replace('waste', $data);
                return True;
            } else if ($wasteType == "tree"){
                $total_point = $builder->row()->Points + $amount;
                $newAmount = $builder->row()->FW_coffee + $amount;
                $data = array(
                    'username' => $username,
                    'FW_fruit_veggies' => $builder->row()->FW_fruit_veggies,
                    'FW_coffee' => $newAmount,
                    'FW_eggshell' => $builder->row()->FW_eggshell,
                    'Points' => $total_point
                );
                $this->db->replace('waste', $data);
                return True;
            } else if ($wasteType == "chicken") {
                $total_point = $builder->row()->Points + $amount;
                $newAmount = $builder->row()->FW_eggshell + $amount;
                $data = array(
                    'username' => $username,
                    'FW_fruit_veggies' => $builder->row()->FW_fruit_veggies,
                    'FW_coffee' => $builder->row()->FW_coffee,
                    'FW_eggshell' => $newAmount,
                    'Points' => $total_point
                );
                $this->db->replace('waste', $data);
                return True;
            }
        } 
        else{
            return false;
        }
        
    }

    // Get the waste amount depending on the type variable
    public function getAmount($username, $type){
        $builder = $this->db->where('username', $username)->get('waste');
        if ($type == "fruit"){
            return $builder->row()->FW_fruit_veggies;
        } else if($type == "tree"){
            return $builder->row()->FW_coffee;
        } else if($type == "chicken") {
            return $builder->row()->FW_eggshell;
        }
    }

    // Get a user's point
    public function getPoints($username){
        $builder = $this->db->where('username', $username)->get('waste');

        return $builder->row()->Points;
    }

    // When user register this function will automatically create user's initial data
    public function createNewUser($username){
        $data = array(
            'username' => $username, 
            'FW_fruit_veggies' => 0,
            'FW_coffee' => 0,
            'FW_eggshell' => 0,
            'Points' => 0
        );
        $this->db->insert('waste', $data);
    }

    public function gainPoints($username, $points){
        $builder = $this->db->where('username', $username)->get('waste');

        $total_point = $builder->row()->Points;
        $data = array(
            'username' => $username,
            'FW_fruit_veggies' => $builder->row()->FW_fruit_veggies,
            'FW_coffee' => $builder->row()->FW_coffee,
            'FW_eggshell' => $builder->row()->FW_eggshell,
            'Points' => $total_point + $points
        );
        
        $this->db->replace('waste', $data);
    }

    public function clearPoints($username) {
        $data = array(
            'username' => $username,
            'FW_fruit_veggies' => 0,
            'FW_coffee' => 0,
            'FW_eggshell' => 0,
            'Points' => 0
        );
        $this->db->replace('waste', $data);
    }
}
?>
