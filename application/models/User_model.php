<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{ 
    // Create a user account
    public function register($username, $email, $password){
        $data = array(
            'Account' => $username,
            'Email' => $email,
            'Password' => $password
        );
        $this->db->insert('User', $data);
        
    }

    // Check if there is a specific user in the database
    public function userExist($username, $password){
        // construct sql query
        $this->db->where('Account', $username);
        $this->db->where('Password', $password); 
        
        // making query
        $result = $this->db->get('User');

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

    // Get which background did user choose
    public function background($username){
        return $this->db->where('Account', $username)->get('User')->row()->bgId;
    }

    public function updatebg($username, $bgId){
        $builder = $this->db->where('Account', $username)->get('User');
        $data = array(
            'UserId' =>  $builder->row()->UserId,
            'Account' => $builder->row()->Account,
            'Email' => $builder->row()->Email,
            'Password' => $builder->row()->Password,
            'bgId' => $bgId
        );
        
        $this->db->replace('User', $data);
    }

    public function userUnique($username){
        // construct sql query
        $this->db->where('Account', $username);
        
        // making query
        $result = $this->db->get('User');

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
}
?>
