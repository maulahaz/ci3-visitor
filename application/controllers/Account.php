<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Commons_mdl');
		// _isLoggedin();
	}

	public function dashboard()
	{
		redirect('account/profile');
	}

    public function profile()
	{
		if(getSignedInData() == NULL){
        	redirect('auth/signin');
        }

		$data['pageTitle'] = 'Account Information';

		$data['flashMsg'] = $this->session->flashdata('flashMsg'); 
		$data['viewFile'] = 'account/v_profile';
		// $data['viewFile'] = 'account/v_show';
		// $data['jsFile'] = 'account/js_account';
		$this->load->view('templates/v_backend', $data, FALSE);
	}

	public function changepass()
	{
		if(getSignedInData() == NULL){
        	redirect('auth/signin');
        }

        $username = $_SESSION['auth']->username;
        $dtUser = $this->Commons_mdl->getData('tbl_users', ['username'=>$username], NULL)->row();

        $submit = $this->input->post('btnSubmit',TRUE);
        $currentPassword = $this->input->post('curPwd', TRUE);
		$newPassword = $this->input->post('newPwd', TRUE);
		
        if($submit == "Save"){
        	$this->form_validation->set_rules('curPwd','Current Password','required|trim');
			$this->form_validation->set_rules('newPwd','New Password','required|min_length[3]|matches[confPwd]');
			$this->form_validation->set_rules('confPwd','Confirm New Password','required|min_length[3]');

			if($this->form_validation->run() == TRUE){
				$checkPassword = password_verify($currentPassword, $dtUser->password);
				if($checkPassword == FALSE){
					$msg = "Wrong Current Password";
					$this->session->set_userdata('success', $msg);	
					redirect('account/changepass');
				} elseif ($currentPassword == $newPassword) {
					$msg = "New Password can not be same with Current Password";
					$this->session->set_userdata('success', $msg);
					redirect('account/changepass');
				} else{
					// Password ok
					$postedData['password'] = password_hash($newPassword, PASSWORD_BCRYPT, array('cost' => 11));
					$this->Commons_mdl->update('tbl_users', ['username'=>$username], $postedData);
					$msg = "Change Password success";
					$this->session->set_userdata('success', $msg);
					redirect('account/dashboard');
				}
			}else{
				$this->session->set_userdata('errors', validation_errors());
				redirect('account/changepass');
			}
        }

		$data['pageTitle'] = 'Change Password';
		$data['formLocation'] = base_url('account/changepass');
		$data['submitValue'] = 'Save';

		$data['viewFile'] = 'account/v_changepass';
		$this->load->view('templates/v_backend', $data, FALSE);
	}

}
