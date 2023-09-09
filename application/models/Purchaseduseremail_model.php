<?php
defined('BASEPATH') or exit('No direct script access allowed');

//v5.7
class Purchaseduseremail_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    public function add_purchased_course_user_email($data)
    {
        $email = [];
        if($data['purchase_type'] == 'global'){
            $emails = json_decode($data['user_group_emails']);
            foreach ($emails as $email) 
            {
                $data['course_id'] = $data['course_id'];
                $data['email'] = $email;
                $data['type'] = $data['purchase_type'] ;
    
                $this->db->insert('purchased_course_usergroup_email', $data);
            }
        } 
    }

    public function get_purchased_course_user_email($course_id = "")
    {
        print_r($course_id); exit;
        // $this->db->where('course_id', $course_id);
        // $query = $this->db->get('purchased_course_usergroup_email');
        // return $query->result();

        return $this->db->get_where('purchased_course_usergroup_email', array('course_id' => $course_id));
    }

    
}
