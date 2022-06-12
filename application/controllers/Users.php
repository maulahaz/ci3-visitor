<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Commons_mdl');
	}

    public function manage()
	{
		if(getSignedInData('role_id') != "88"){
        	redirect('auth/forbidden');
        }

		$sql = '
            SELECT *
            FROM tbl_users u
            WHERE u.role_id NOT IN (99,88) 
        ';
		$dtUsers = $this->Commons_mdl->customQuery($sql)->result();
		// $dtUsers = $this->Commons_mdl->getData('tbl_users', ['role_id !='=>'88'])->result();
        // json($dtUsers, true);
		$data['dtUsers'] = $dtUsers;

		$data['pageTitle'] = 'User List';

		$data['flashMsg'] = $this->session->flashdata('flashMsg'); 
		$data['viewFile'] = 'users/v_manage';
		// $data['jsFile'] = 'users/js_users';
		$this->load->view('templates/v_backend', $data, FALSE);
	}

	function create()
    {
    	if(getSignedInData('role_id') != "88"){
        	redirect('auth/forbidden');
        }
        
		$data['pageTitle'] = 'Create User';

		$data['formLocation'] = base_url('users/store');
		$data['submitValue'] = 'Save';

		$data['flashMsg'] = $this->session->flashdata('flashMsg'); 
		$data['viewFile'] = 'users/v_modify';
		$this->load->view('templates/v_backend', $data, FALSE);
    }

}
