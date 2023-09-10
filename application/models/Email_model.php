<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Email_model extends CI_Model
{

	function __construct()
	{
		parent::__construct(); 
	}

	public function send_email_verification_mail($to = "", $verification_code = "")
	{
		//Editable
		$type = 'email_verification';
		//End editable

		$notification = $this->db->where('type', $type)->get('notification_settings')->row_array();
		foreach(json_decode($notification['user_types'], true) as $user_type){
			
			//Editable
			if($user_type == 'user'){
				$to_user = $this->db->get_where('users', array('email' => $to))->row_array();
				$replaces['email_verification_code'] = $verification_code;
			}
			//End editable

			$template_data['replaces'] = isset($replaces) ? $replaces:array();
			$template_data['to_user'] = $to_user;
			$template_data['notification'] = $notification;
			$template_data['user_type'] = $user_type;
			$subject = json_decode($notification['subject'], true)[$user_type];
			$email_template = $this->load->view('email/common_template',  $template_data, TRUE);

			if(json_decode($notification['system_notification'], true)[$user_type] == 1){
				$this->notify($type, $to_user['id'], $subject, $email_template);
			}
			if(json_decode($notification['email_notification'], true)[$user_type] == 1){
				$this->send_smtp_mail($email_template, $subject, $to_user['email']);
			}
		}
	}

	function signup_mail($new_user_id = ""){
		//Editable
		$type = 'signup';
		//End editable

		$notification = $this->db->where('type', $type)->get('notification_settings')->row_array();
		foreach(json_decode($notification['user_types'], true) as $user_type){
			
			//Editable
			if($user_type == 'admin'){
				$new_user = $this->db->get_where('users', array('id' => $new_user_id))->row_array();
				$to_user = $this->db->get_where('users', array('role_id' => 1))->row_array();
				$replaces['user_name'] = $new_user['first_name'].' '.$new_user['last_name'];
				$replaces['user_email'] = $new_user['email'];
			}
			if($user_type == 'user'){
				$to_user = $this->db->get_where('users', array('id' => $new_user_id))->row_array();
				$replaces['system_name'] = get_settings('system_name');
			}
			//End editable

			$template_data['replaces'] = isset($replaces) ? $replaces:array();
			$template_data['to_user'] = $to_user;
			$template_data['notification'] = $notification;
			$template_data['user_type'] = $user_type;
			$subject = json_decode($notification['subject'], true)[$user_type];
			$email_template = $this->load->view('email/common_template',  $template_data, TRUE);

			if(json_decode($notification['system_notification'], true)[$user_type] == 1){
				$this->notify($type, $to_user['id'], $subject, $email_template);
			}
			if(json_decode($notification['email_notification'], true)[$user_type] == 1){
				$this->send_smtp_mail($email_template, $subject, $to_user['email']);
			}
		}
	}


	function password_reset_email($verification_code = '', $to = '')
	{

		//Editable
		$type = 'forget_password_mail';
		//End editable

		$notification = $this->db->where('type', $type)->get('notification_settings')->row_array();
		foreach(json_decode($notification['user_types'], true) as $user_type){
			
			//Editable
			if($user_type == 'user'){
				$query = $this->db->get_where('users', array('email' => $to));
				$to_user = $query->row_array();
				$replaces['verification_link'] = '<a href="'.site_url('login/change_password/'.$verification_code).'" target="_blank">Change Password</a>';
				$replaces['system_name'] = get_settings('system_name');
				$replaces['minutes'] = 10;
			}
			//Editable

			$template_data['replaces'] = isset($replaces) ? $replaces:array();
			$template_data['to_user'] = $to_user;
			$template_data['notification'] = $notification;
			$template_data['user_type'] = $user_type;
			$subject = json_decode($notification['subject'], true)[$user_type];
			$email_template = $this->load->view('email/common_template',  $template_data, TRUE);

			if(json_decode($notification['system_notification'], true)[$user_type] == 1){
				$this->notify($type, $to_user['id'], $subject, $email_template);
			}
			if(json_decode($notification['email_notification'], true)[$user_type] == 1){
				$this->send_smtp_mail($email_template, $subject, $to_user['email']);
			}
		}
	}


	//atatic email function
	public function send_mail_on_course_status_changing($course_id = "", $mail_subject = "", $mail_body = "")
	{

		$instructor_id		 = 0;
		$course_details    = $this->crud_model->get_course_by_id($course_id)->row_array();
		if ($course_details['user_id'] != "") {
			$instructor_id = $course_details['user_id'];
		} else {
			$instructor_id = $this->session->userdata('user_id');
		}
		$instuctor_details = $this->user_model->get_all_user($instructor_id)->row_array();


		$email_data['subject'] = $mail_subject;
		$email_data['message'] = $mail_body;
		$email_template = $this->load->view('email/static_common_template', $email_data, TRUE);

		$admin = $this->db->get_where('users', array('role_id' => 1))->row_array();
		$this->notify('course_status', $instructor_id, $mail_subject, $mail_body, $admin['id']);
		$this->send_smtp_mail($email_template, $email_data['subject'], $instuctor_details['email']);
	}

	public function course_purchase_notification($student_id = "", $payment_method = "", $amount_paid = "")
	{
		
		// $purchased_courses 	= $this->session->userdata('cart_items');
		// $student_data 		= $this->user_model->get_all_user($student_id)->row_array();
		// $student_full_name 	= $student_data['first_name'] . ' ' . $student_data['last_name'];
		// $admin_id 			= $this->user_model->get_admin_details()->row('id');
		// foreach ($purchased_courses as $course_id) {
		// 	$course_owner_user_id = $this->crud_model->get_course_by_id($course_id)->row('user_id');
		// 	if ($course_owner_user_id != $admin_id) :
		// 		$this->course_purchase_notification_admin($course_id, $student_full_name, $student_data['email'], $amount_paid);
		// 	endif;
		// 	$this->course_purchase_notification_instructor($course_id, $student_full_name, $student_data['email']);
		// 	$this->course_purchase_notification_student($course_id, $student_id);
		// }
 
		//Editable
		$type = 'course_purchase';
		//End editable

		$notification = $this->db->where('type', $type)->get('notification_settings')->row_array();
		foreach($this->session->userdata('cart_items') as $course_id){
			foreach(json_decode($notification['user_types'], true) as $user_type){
				
				//Editable
				if($user_type == 'admin'){
					$course_details = $this->crud_model->get_course_by_id($course_id)->row_array();
					$student_details = $this->user_model->get_all_user($student_id)->row_array();
					$instructor_details = $this->user_model->get_all_user($course_details['creator'])->row_array();
					$to_user = $this->db->get_where('users', array('role_id' => 1))->row_array();

					$replaces['course_title'] = '<a href="'.site_url('home/course/'.slugify($course_details['title']).'/'.$course_details['id']).'" target="_blank">'.$course_details['title'].'</a>';
					$replaces['student_name'] = $student_details['first_name'].' '.$student_details['last_name'];
					$replaces['instructor_name'] = $instructor_details['first_name'].' '.$instructor_details['last_name'];
					$replaces['paid_amount'] = currency($amount_paid);
					$replaces['datetime'] = date('D jS M Y \a\t g:i A', strtotime($course_details['datetime']));
					$replaces['address'] = $course_details['address'];
					$replaces['city'] = $course_details['city'];
					$replaces['state'] = $course_details['state'];
					$replaces['postal_code'] = $course_details['postal_code'];
					$replaces['country'] = $course_details['country'];

					//If admin is owner of the course
					if($to_user['id'] == $course_details['creator']){
						continue;
					}

				}

				if($user_type == 'instructor'){
					$course_details = $this->crud_model->get_course_by_id($course_id)->row_array();
					$student_details = $this->user_model->get_all_user($student_id)->row_array();
					$to_user = $this->user_model->get_all_user($course_details['creator'])->row_array();
					$replaces['course_title'] = '<a href="'.site_url('home/course/'.slugify($course_details['title']).'/'.$course_details['id']).'" target="_blank">'.$course_details['title'].'</a>';
					$replaces['student_name'] = $student_details['first_name'].' '.$student_details['last_name'];
					$replaces['paid_amount'] = currency($amount_paid);
					$replaces['datetime'] = date('D jS M Y \a\t g:i A', strtotime($course_details['datetime']));
					$replaces['address'] = $course_details['address'];
					$replaces['city'] = $course_details['city'];
					$replaces['state'] = $course_details['state'];
					$replaces['postal_code'] = $course_details['postal_code'];
					$replaces['country'] = $course_details['country'];
				}
				if($user_type == 'student'){
					$course_details = $this->crud_model->get_course_by_id($course_id)->row_array();
					$instructor_details = $this->user_model->get_all_user($course_details['creator'])->row_array();
					$to_user = $this->user_model->get_all_user($student_id)->row_array();

					$replaces['course_title'] = '<a href="'.site_url('home/course/'.slugify($course_details['title']).'/'.$course_details['id']).'" target="_blank">'.$course_details['title'].'</a>';
					$replaces['instructor_name'] = $instructor_details['first_name'].' '.$instructor_details['last_name'];
					$replaces['paid_amount'] = currency($amount_paid);
					$replaces['datetime'] = date('D jS M Y \a\t g:i A', strtotime($course_details['datetime']));
					$replaces['address'] = $course_details['address'];
					$replaces['city'] = $course_details['city'];
					$replaces['state'] = $course_details['state'];
					$replaces['postal_code'] = $course_details['postal_code'];
					$replaces['country'] = $course_details['country'];
				} 

				//Editable 
				$template_data['replaces'] = isset($replaces) ? $replaces:array();
				$template_data['to_user'] = $to_user;
				$template_data['notification'] = $notification;
				$template_data['user_type'] = $user_type;
				$subject = json_decode($notification['subject'], true)[$user_type];
				$email_template = $this->load->view('email/common_template',  $template_data, TRUE);
				
				if(json_decode($notification['system_notification'], true)[$user_type] == 1){
					$this->notify($type, $to_user['id'], $subject, $email_template);
				}
				
				if(json_decode($notification['email_notification'], true)[$user_type] == 1){
					$this->send_smtp_mail($email_template, $subject, $to_user['email']);
				}
				

				
				$this->db->where('course_id', $course_id);
				$query = $this->db->get('purchased_course_usergroup_email'); 

				if($query->num_rows() > 0){
					$emails = $query->result(); 
					foreach($emails as $email){
					 
						if($user_type == 'student'){
							if(!$email->is_email_sent){
								$replaces['paid_amount'] = ''; 
								$replaces['datetime'] = date('D jS M Y \a\t g:i A', strtotime($course_details['datetime']));
								$replaces['address'] = $course_details['address'];
								$replaces['city'] = $course_details['city'];
								$replaces['state'] = $course_details['state'];
								$replaces['postal_code'] = $course_details['postal_code'];
								$replaces['country'] = $course_details['country'];
								
								$template_data['replaces'] = isset($replaces) ? $replaces:array();
								$template_data['to_user'] = $to_user;
								$template_data['notification'] = $notification;
								$template_data['user_type'] = $user_type;
								
								$subject = $to_user['first_name'].' '.$to_user['last_name'].' has purchased a course for you';
								$email_template = $this->load->view('email/common_template',  $template_data, TRUE);
	
								if(json_decode($notification['email_notification'], true)[$user_type] == 1){
									$this->send_smtp_mail($email_template, $subject, $email->email);
									
									$this->db->where('course_id', $course_id);
									$this->db->where('email', $email->email);
									$this->db->update('purchased_course_usergroup_email', ['is_email_sent' => 1]);
								} 
							}
						}
					}
				} 

			}
		}

	}


	public function notify_on_certificate_generate($student_id = "", $course_id = "")
	{
		//Editable
		$type = 'certificate_eligibility';
		//End editable

		$notification = $this->db->where('type', $type)->get('notification_settings')->row_array();
		foreach(json_decode($notification['user_types'], true) as $user_type){
				
			//Editable
			
			if($user_type == 'instructor'){
				$certificate = $this->db->get_where('certificates', array('course_id' => $course_id,'student_id' => $student_id))->row_array();
				$course_details = $this->crud_model->get_course_by_id($course_id)->row_array();
				$student_details = $this->user_model->get_all_user($student_id)->row_array();
				$to_user = $this->user_model->get_all_user($course_details['creator'])->row_array();
				$replaces['course_title'] = '<a href="'.site_url('home/course/'.slugify($course_details['title']).'/'.$course_details['id']).'" target="_blank">'.$course_details['title'].'</a>';
				$replaces['student_name'] = $student_details['first_name'].' '.$student_details['last_name'];

				$replaces['certificate_link'] = '<a href="'.site_url('certificate/' . $certificate['shareable_url']).'" target="_blank"> Certificate link</a>';
			}
			if($user_type == 'student'){
				$certificate = $this->db->get_where('certificates', array('course_id' => $course_id,'student_id' => $student_id))->row_array();
				$course_details = $this->crud_model->get_course_by_id($course_id)->row_array();
				$instructor_details = $this->user_model->get_all_user($student_id)->row_array();
				$to_user = $this->user_model->get_all_user($student_id)->row_array();
				$replaces['course_title'] = '<a href="'.site_url('home/course/'.slugify($course_details['title']).'/'.$course_details['id']).'" target="_blank">'.$course_details['title'].'</a>';
				$replaces['instructor_name'] = $instructor_details['first_name'].' '.$instructor_details['last_name'];

				$replaces['certificate_link'] = '<a href="'.site_url('certificate/' . $certificate['shareable_url']).'" target="_blank"> Certificate link</a>';
			}
			//Editable

			$template_data['replaces'] = isset($replaces) ? $replaces:array();
			$template_data['to_user'] = $to_user;
			$template_data['notification'] = $notification;
			$template_data['user_type'] = $user_type;
			$subject = json_decode($notification['subject'], true)[$user_type];
			$email_template = $this->load->view('email/common_template',  $template_data, TRUE);

			if(json_decode($notification['system_notification'], true)[$user_type] == 1){
				$this->notify($type, $to_user['id'], $subject, $email_template);
			}
			if(json_decode($notification['email_notification'], true)[$user_type] == 1){
				$this->send_smtp_mail($email_template, $subject, $to_user['email']);
			}
		}
	}

	public function suspended_offline_payment($user_id = "")
	{

		//Editable
		$type = 'offline_payment_suspended_mail';
		//End editable

		$notification = $this->db->where('type', $type)->get('notification_settings')->row_array();
		foreach(json_decode($notification['user_types'], true) as $user_type){
			
			//Editable
			if($user_type == 'student'){
				$to_user = $this->db->get_where('users', array('email' => $to))->row_array();
			}
			//End editable

			$template_data['replaces'] = isset($replaces) ? $replaces:array();
			$template_data['to_user'] = $to_user;
			$template_data['notification'] = $notification;
			$template_data['user_type'] = $user_type;
			$subject = json_decode($notification['subject'], true)[$user_type];
			$email_template = $this->load->view('email/common_template',  $template_data, TRUE);

			if(json_decode($notification['system_notification'], true)[$user_type] == 1){
				$this->notify($type, $to_user['id'], $subject, $email_template);
			}
			if(json_decode($notification['email_notification'], true)[$user_type] == 1){
				$this->send_smtp_mail($email_template, $subject, $to_user['email']);
			}
		}
	}

	public function bundle_purchase_notification($student_id = "", $payment_method = "", $amount_paid = "")
	{
		//Editable
		$type = 'bundle_purchase';
		//End editable


		$bundle_id = $this->session->userdata('checkout_bundle_id');
		$bundle_details = $this->course_bundle_model->get_bundle($bundle_id)->row_array();
		$admin_details = $this->user_model->get_admin_details()->row_array();
		$bundle_creator_details = $this->user_model->get_all_user($bundle_details['user_id'])->row_array();
		$student_details = $this->user_model->get_all_user($student_id)->row_array();


		$notification = $this->db->where('type', $type)->get('notification_settings')->row_array();
		foreach(json_decode($notification['user_types'], true) as $user_type){
			//Editable
			if($user_type == 'admin'){
				$replaces['bundle_title'] = '<a href="'.site_url('bundle_details/' . $bundle_details['id']).'" target="_blank"> '.$bundle_details['title'].'</a>';
				$replaces['student_name'] = $student_details['first_name'].' '.$student_details['last_name'];
				$replaces['instructor_name'] = $bundle_creator_details['first_name'].' '.$bundle_creator_details['last_name'];
				if($admin_details['id'] == $bundle_creator_details['id']){
					continue;
				}
				$to_user = $admin_details;
			}

			if($user_type == 'instructor'){
				$replaces['bundle_title'] = '<a href="'.site_url('bundle_details/' . $bundle_details['id']).'" target="_blank"> '.$bundle_details['title'].'</a>';
				$replaces['student_name'] = $student_details['first_name'].' '.$student_details['last_name'];
				$to_user = $bundle_creator_details;
			}
			if($user_type == 'student'){
				$replaces['bundle_title'] = '<a href="'.site_url('bundle_details/' . $bundle_details['id']).'" target="_blank"> '.$bundle_details['title'].'</a>';
				$replaces['instructor_name'] = $bundle_creator_details['first_name'].' '.$bundle_creator_details['last_name'];
				$to_user = $student_details;
			}
			//Editable

			$template_data['replaces'] = isset($replaces) ? $replaces:array();
			$template_data['to_user'] = $to_user;
			$template_data['notification'] = $notification;
			$template_data['user_type'] = $user_type;
			$subject = json_decode($notification['subject'], true)[$user_type];
			$email_template = $this->load->view('email/common_template',  $template_data, TRUE);

			if(json_decode($notification['system_notification'], true)[$user_type] == 1){
				$this->notify($type, $to_user['id'], $subject, $email_template);
			}
			if(json_decode($notification['email_notification'], true)[$user_type] == 1){
				$this->send_smtp_mail($email_template, $subject, $to_user['email']);
			}
		}
	}


	function bundle_purchase_notification_admin($bundle_details = "", $admin_details = "", $bundle_creator_details = "", $student_details = "")
	{
	}

	function bundle_purchase_notification_bundle_creator($bundle_details = "", $admin_details = "", $bundle_creator_details = "", $student_details = "")
	{
		
	}

	function bundle_purchase_notification_student($bundle_details = "", $admin_details = "", $bundle_creator_details = "", $student_details = "")
	{
		
	}

	function send_notice($notice_id = "", $course_id = "")
	{
		$course_details = $this->crud_model->get_course_by_id($course_id)->row_array();
		$notice_details = $this->noticeboard_model->get_notices($notice_id)->row_array();
		$instructor_details = $this->user_model->get_all_user($course_details['user_id'])->row_array();
		$enrolled_students = $this->crud_model->enrol_history($course_id)->result_array();
		foreach ($enrolled_students as $enrolled_student) :
			$student_details = $this->user_model->get_user($enrolled_student['user_id'])->row_array();
			$email_data['subject'] = htmlspecialchars_decode_($notice_details['title']);
			$email_data['message'] = htmlspecialchars_decode_($notice_details['description']) . '<hr style="border: 1px solid #efefef; margin-top: 50px;"> <small><b>' . get_phrase('course') . ':</b> ' . $course_details['title'] . '<br> <b>' . get_phrase('instructor') . ': </b> ' . $instructor_details['first_name'] . ' ' . $instructor_details['last_name'] . '</small>';
			$email_template = $this->load->view('email/static_common_template', $email_data, TRUE);

			$this->send_smtp_mail($email_template, $email_data['subject'], $student_details['email']);
		endforeach;

		return 1;
	}

	function live_class_invitation_mail($to = "")
	{
		$student_details = $this->db->get_where('users', array('email' => $to))->row_array();
		$email_data['subject'] = 'Your live class started';
		$email_data['message'] = $this->input->post('jitsi_live_alert_message');
		$email_template = $this->load->view('email/static_common_template', $email_data, TRUE);
		$this->send_smtp_mail($email_template, $email_data['subject'], $student_details['email']);
		return true;
	}

	function new_device_login_alert($user_id = "")
	{
		$this->load->library('user_agent');

		if ($this->agent->is_browser()) {
			$agent = $this->agent->browser() . ' ' . $this->agent->version();
		} elseif ($this->agent->is_robot()) {
			$agent = $this->agent->robot();
		} elseif ($this->agent->is_mobile()) {
			$agent = $this->agent->mobile();
		} else {
			$agent = 'Unidentified User Agent';
		}

		$browser = $agent;
		$device = $this->agent->platform();

		if (!$this->session->userdata('new_device_verification_code')) {
			$new_device_verification_code = rand(100000, 999999);
		} else {
			$new_device_verification_code = $this->session->userdata('new_device_verification_code');
		}
		if ($user_id == "") {
			$user_id = $this->session->userdata('new_device_user_id');
		}
		$row = $this->db->get_where('users', array('id' => $user_id))->row_array();
		
		//600 seconds = 10 minutes
		$this->session->set_userdata('new_device_code_expiration_time', (time() + 600));
		$this->session->set_userdata('new_device_user_email', $row['email']);
		$this->session->set_userdata('new_device_user_id', $user_id);
		$this->session->set_userdata('new_device_verification_code', $new_device_verification_code);



		//Editable
		$type = 'new_device_login_confirmation';
		//End editable

		$notification = $this->db->where('type', $type)->get('notification_settings')->row_array();
		foreach(json_decode($notification['user_types'], true) as $user_type){
			//Editable
			if($user_type == 'user'){
				$replaces['minutes'] = 10;
				$replaces['user_agent'] = $browser . ' ' . $device;
				$replaces['verification_code'] = $new_device_verification_code;
				$to_user = $row;
			}
			//End editable


			$template_data['replaces'] = isset($replaces) ? $replaces:array();
			$template_data['to_user'] = $row;
			$template_data['notification'] = $notification;
			$template_data['user_type'] = $user_type;
			$subject = json_decode($notification['subject'], true)[$user_type];
			$email_template = $this->load->view('email/common_template',  $template_data, TRUE);

			if(json_decode($notification['system_notification'], true)[$user_type] == 1){
				$this->notify($type, $to_user['id'], $subject, $email_template);
			}
			if(json_decode($notification['email_notification'], true)[$user_type] == 1){
				$this->send_smtp_mail($email_template, $subject, $to_user['email']);
			}
		}

		return true;
	}

	//course_addon start

	public function become_a_course_affiliator_by_admin($email = "", $name = "", $password = "")
	{
		//Editable
		$type = 'add_new_user_as_affiliator';
		//End editable
		$affiliator = $this->db->get_where('users', array('email' => $email))->row_array();

		$notification = $this->db->where('type', $type)->get('notification_settings')->row_array();
		foreach(json_decode($notification['user_types'], true) as $user_type){
			//Editable
			if($user_type == 'affiliator'){
				$replaces['website_link'] = '<a href="'.site_url().'" target="_blank">'.get_settings('system_name').'</a>';
				$replaces['password'] = $password;
			}
			//End editable


			$template_data['replaces'] = isset($replaces) ? $replaces:array();
			$template_data['to_user'] = $affiliator;
			$template_data['notification'] = $notification;
			$template_data['user_type'] = $user_type;
			$subject = json_decode($notification['subject'], true)[$user_type];
			$email_template = $this->load->view('email/common_template',  $template_data, TRUE);

			if(json_decode($notification['system_notification'], true)[$user_type] == 1){
				$this->notify($type, $to_user['id'], $subject, $email_template);
			}
			if(json_decode($notification['email_notification'], true)[$user_type] == 1){
				$this->send_smtp_mail($email_template, $subject, $to_user['email']);
			}
		}
	}

	public function send_email_when_approed_an_affiliator($email = "", $name = "")
	{
		//Editable
		$type = 'affiliator_approval_notification';
		//End editable
		$affiliator = $this->db->get_where('users', array('email' => $email))->row_array();

		$notification = $this->db->where('type', $type)->get('notification_settings')->row_array();
		foreach(json_decode($notification['user_types'], true) as $user_type){
			$template_data['replaces'] = isset($replaces) ? $replaces:array();
			$template_data['to_user'] = $affiliator;
			$template_data['notification'] = $notification;
			$template_data['user_type'] = $user_type;
			$subject = json_decode($notification['subject'], true)[$user_type];
			$email_template = $this->load->view('email/common_template',  $template_data, TRUE);

			if(json_decode($notification['system_notification'], true)[$user_type] == 1){
				$this->notify($type, $to_user['id'], $subject, $email_template);
			}
			if(json_decode($notification['email_notification'], true)[$user_type] == 1){
				$this->send_smtp_mail($email_template, $subject, $to_user['email']);
			}
		}
	}

	public function send_email_when_delete_an_affiliator_request($email = "", $name = "")
	{
		//Editable
		$type = 'affiliator_request_cancellation';
		//End editable
		$affiliator = $this->db->get_where('users', array('email' => $email))->row_array();

		$notification = $this->db->where('type', $type)->get('notification_settings')->row_array();
		foreach(json_decode($notification['user_types'], true) as $user_type){
			$template_data['replaces'] = isset($replaces) ? $replaces:array();
			$template_data['to_user'] = $affiliator;
			$template_data['notification'] = $notification;
			$template_data['user_type'] = $user_type;
			$subject = json_decode($notification['subject'], true)[$user_type];
			$email_template = $this->load->view('email/common_template',  $template_data, TRUE);

			if(json_decode($notification['system_notification'], true)[$user_type] == 1){
				$this->notify($type, $to_user['id'], $subject, $email_template);
			}
			if(json_decode($notification['email_notification'], true)[$user_type] == 1){
				$this->send_smtp_mail($email_template, $subject, $to_user['email']);
			}
		}
	}

	public function send_email_when_suspend_an_affiliator_request($email = "", $name = "")
	{
		$this->send_email_when_delete_an_affiliator_request($email, $name);
	}

	
	public function send_email_when_reactove_an_affiliator_request($email = "", $name = "")
	{
		$this->send_email_when_approed_an_affiliator($email, $name);
	}

	public function send_email_when_withdrawl_request_for_affiliator_approved($email = "", $name = "")
	{

		//Editable
		$type = 'approval_affiliation_amount_withdrawal_request';
		//End editable
		$affiliator = $this->db->get_where('users', array('email' => $email))->row_array();

		$notification = $this->db->where('type', $type)->get('notification_settings')->row_array();
		foreach(json_decode($notification['user_types'], true) as $user_type){
			$template_data['replaces'] = isset($replaces) ? $replaces:array();
			$template_data['to_user'] = $affiliator;
			$template_data['notification'] = $notification;
			$template_data['user_type'] = $user_type;
			$subject = json_decode($notification['subject'], true)[$user_type];
			$email_template = $this->load->view('email/common_template',  $template_data, TRUE);

			if(json_decode($notification['system_notification'], true)[$user_type] == 1){
				$this->notify($type, $to_user['id'], $subject, $email_template);
			}
			if(json_decode($notification['email_notification'], true)[$user_type] == 1){
				$this->send_smtp_mail($email_template, $subject, $to_user['email']);
			}
		}
	}

	public function send_email_when_make_withdrawl_request($email = "", $name = "",$amount="")
	{
		//Editable
		$type = 'affiliation_amount_withdrawal_request';
		//End editable

		$notification = $this->db->where('type', $type)->get('notification_settings')->row_array();
		foreach(json_decode($notification['user_types'], true) as $user_type){
			if($user_type == 'admin'){
				$replaces['user_name'] = $name;
				$replaces['amount'] = currency($amount);
				$to_user = $this->user_model->get_admin_details()->row_array();
			}
			if($user_type == 'affiliator'){
				$replaces['amount'] = currency($amount);
				$to_user = $this->db->get_where('users', array('email' => $email))->row_array();
			}
			$template_data['replaces'] = isset($replaces) ? $replaces:array();
			$template_data['to_user'] = $affiliator;
			$template_data['notification'] = $notification;
			$template_data['user_type'] = $user_type;
			$subject = json_decode($notification['subject'], true)[$user_type];
			$email_template = $this->load->view('email/common_template',  $template_data, TRUE);

			if(json_decode($notification['system_notification'], true)[$user_type] == 1){
				$this->notify($type, $to_user['id'], $subject, $email_template);
			}
			if(json_decode($notification['email_notification'], true)[$user_type] == 1){
				$this->send_smtp_mail($email_template, $subject, $to_user['email']);
			}
		}
	}

	public function send_email_to_admin_when_withdrawl_request_made_by_affiliator ($email = "", $name = "",$user="",$amount="")
	{
	}

	public function send_email_to_admin_when_withdrawl_pending_request_cancle($email = "", $name = "",$user="")
	{
	}

	//course_addon end



	//course gift notification

	//handle notifications for gift purchase
	public function course_gift_notification($enrol_student_id = "", $payer_user_id = "", $payment_method = "", $amount_paid = "")
	{

	}

	//notify the sender/payer of the gift success
	public function course_gift_notification_payer($course_id = "", $payer_user_id = "", $enrol_student_id="")
	{
		//{"payer":"You have gift a course to [user_name] [course_title]","receiver":"You have received a course gift by [user_name] [course_title]"}

		$course_details = $this->crud_model->get_course_by_id($course_id)->row_array();
		$payer_details = $this->user_model->get_all_user($payer_user_id);
		$enrol_student_details = $this->user_model->get_all_user($enrol_student_id);
		$instructor_details = $this->user_model->get_all_user($course_details['user_id'])->row_array();


		//Editable
		$type = 'course_gift';
		//End editable

		$notification = $this->db->where('type', $type)->get('notification_settings')->row_array();
		foreach(json_decode($notification['user_types'], true) as $user_type){
			if($user_type == 'payer'){
				$replaces['user_name'] = $enrol_student_details['first_name'].' '.$enrol_student_details['last_name'];
				$replaces['instructor'] = $instructor_details['first_name'].' '.$instructor_details['last_name'];
				$replaces['course_title'] = '<a href="'.site_url('home/course/'.slugify($course_details['title'])).'/'.$course_details['id'].'" target="_blank">'.$course_details['title'].'</a>';
				$to_user = $this->user_model->get_all_user($payer_user_id)->row_array();
			}
			if($user_type == 'receiver'){
				$replaces['instructor'] = $instructor_details['first_name'].' '.$instructor_details['last_name'];
				$replaces['course_title'] = '<a href="'.site_url('home/course/'.slugify($course_details['title'])).'/'.$course_details['id'].'" target="_blank">'.$course_details['title'].'</a>';
				$to_user = $this->user_model->get_all_user($enrol_student_id)->row_array();
			}
			$template_data['replaces'] = isset($replaces) ? $replaces:array();
			$template_data['to_user'] = $affiliator;
			$template_data['notification'] = $notification;
			$template_data['user_type'] = $user_type;
			$subject = json_decode($notification['subject'], true)[$user_type];
			$email_template = $this->load->view('email/common_template',  $template_data, TRUE);

			if(json_decode($notification['system_notification'], true)[$user_type] == 1){
				$this->notify($type, $to_user['id'], $subject, $email_template);
			}
			if(json_decode($notification['email_notification'], true)[$user_type] == 1){
				$this->send_smtp_mail($email_template, $subject, $to_user['email']);
			}
		}
	}

	//notify the reciever/ enrolled student of the gift success
	public function course_gift_notification_enrol_student($course_id = "", $payer_user_id = "", $enrol_student_id="")
	{
		
	}

	function course_completion($user_id = "", $course_id = ""){
		$user_details = $this->user_model->get_all_user($user_id)->row_array();
		$course_details = $this->db->get_where('course', ['id' => $course_id])->row_array();
		$instructor = $this->user_model->get_all_user($course_details['creator'])->row_array();

		//Editable
		$type = 'course_completion_mail';
		//End editable

		$notification = $this->db->where('type', $type)->get('notification_settings')->row_array();
		foreach(json_decode($notification['user_types'], true) as $user_type){
			if($user_type == 'student'){
				$replaces['course_title'] = '<a href="'.site_url('home/course/'.slugify($course_details['title'])).'/'.$course_details['id'].'" target="_blank">'.$course_details['title'].'</a>';
				$replaces['instructor_name'] = $instructor['first_name'].' '.$instructor['last_name'];
				$to_user = $this->user_model->get_all_user($user_id)->row_array();
			}
			if($user_type == 'instructor'){
				$replaces['course_title'] = '<a href="'.site_url('home/course/'.slugify($course_details['title'])).'/'.$course_details['id'].'" target="_blank">'.$course_details['title'].'</a>';
				$replaces['student_name'] = $user_details['first_name'].' '.$user_details['last_name'];
				$to_user = $this->user_model->get_all_user($instructor['id'])->row_array();
			}
			$template_data['replaces'] = isset($replaces) ? $replaces:array();
			$template_data['to_user'] = $affiliator;
			$template_data['notification'] = $notification;
			$template_data['user_type'] = $user_type;
			$subject = json_decode($notification['subject'], true)[$user_type];
			$email_template = $this->load->view('email/common_template',  $template_data, TRUE);

			if(json_decode($notification['system_notification'], true)[$user_type] == 1){
				$this->notify($type, $to_user['id'], $subject, $email_template);
			}
			if(json_decode($notification['email_notification'], true)[$user_type] == 1){
				$this->send_smtp_mail($email_template, $subject, $to_user['email']);
			}
		}
	}

	//course gift notification end




















	//System notification
	function notify($type = "", $user_id = "", $subject = "", $description = "", $from_user = ""){
        if($from_user == ""){
            $from_user = $this->session->userdata('user_id');
        }

        $preg_match = '/<div class="system_notification_start" style="display: none;"><\/div>(.*?)<div class="system_notification_end" style="display: none;"><\/div>/s';
        if (preg_match($preg_match,$description, $matches)) {
			$description = $matches[1];
		}

        $data['status'] = 0;
        $data['type'] = $type;
        $data['from_user'] = $from_user;
        $data['to_user'] = $user_id;
        $data['title'] = $subject;
        $data['description'] = $description;
        $data['created_at'] = time();

        $this->db->insert('notifications', $data);
    }

	public function send_smtp_mail($msg = NULL, $sub = NULL, $to = NULL, $from = NULL)
	{
		if(!is_array($to)){
			$to = array($to);
		}
		//Load email library
		$this->load->library('email');

		$from		=	get_settings('smtp_from_email');

		//SMTP & mail configuration
		$config = array(
			'protocol'  => get_settings('protocol'),
			'smtp_host' => get_settings('smtp_host'),
			'smtp_port' => get_settings('smtp_port'),
			'smtp_user' => get_settings('smtp_user'),
			'smtp_pass' => get_settings('smtp_pass'),
			'smtp_crypto' => get_settings('smtp_crypto'), //can be 'ssl' or 'tls' for example
			'mailtype'  => 'html',
			'newline'   => "\r\n",
			'charset'   => 'utf-8',
			'smtp_timeout' => '10', //in seconds
		);
		$this->email->set_header('MIME-Version', 1.0);
		$this->email->set_header('Content-type', 'text/html');
		$this->email->set_header('charset', 'UTF-8');

		$this->email->initialize($config);

		$this->email->to($to);

		//for showing "to me" in gmail inbox To: users own email
		$this->email->bcc($to);
		
		$this->email->from($from, get_settings('system_name'));
		$this->email->subject($sub);
		$this->email->message($msg);

		//Send email
		$this->email->send();

		// echo $this->email->print_debugger();
		// die();
	}





	
	
}
