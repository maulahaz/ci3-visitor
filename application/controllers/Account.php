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

		$data['pageTitle'] = 'Change Password';
		$data['formLocation'] = base_url('visitors/changepass');
		$data['submitValue'] = 'Save';

		$data['viewFile'] = 'account/v_changepass';
		$this->load->view('templates/v_backend', $data, FALSE);
	}

}
