<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Devices extends CI_Controller 
{
    private $default_limit = 20;
    private $per_page_options = array(10, 20, 50, 100); 

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Commons_mdl');
	}

	public function index()
	{
		redirect('devices/manage');
	}

    function manage()
	{
		if(getSignedInData('role_id') != "88"){
        	redirect('auth/forbidden');
        }

		$dtDevices = $this->Commons_mdl->getData('tbl_devices')->result();
        // json($dtDevices, true);
		$data['dtDevices'] = $dtDevices;

		$data['pageTitle'] = 'Manage Device';

		$data['flashMsg'] = $this->session->flashdata('flashMsg'); 
		$data['viewFile'] = 'devices/v_manage';
		// $data['jsFile'] = 'devices/js_devices';
		$this->load->view('templates/v_backend', $data, FALSE);
    }

    function show($id) 
    {
        if(getSignedInData('role_id') != "88"){
        	redirect('auth/forbidden');
        }

        $dtDevice = $this->Commons_mdl->getData('tbl_devices', ['id'=>$id], null)->row();
        if ($dtDevice == false) {
            redirect('devices');
        } 

		$data['pageTitle'] = 'Device Information';
		$data['dtDevice'] = $dtDevice;
		$data['viewFile'] = 'devices/v_show';
		$this->load->view('templates/v_backend', $data, FALSE);
    }

    function create()
    {
    	if(getSignedInData('role_id') != "88"){
        	redirect('auth/forbidden');
        }

		$data['pageTitle'] = 'Create Device';

		$data['formLocation'] = base_url('devices/store');
		$data['submitValue'] = 'Save';

		// $data['flashMsg'] = $this->session->flashdata('flashMsg'); 
		$data['viewFile'] = 'devices/v_form';
		$this->load->view('templates/v_backend', $data, FALSE);
    }

    function store()
	{
		if(getSignedInData('role_id') != "88"){
        	redirect('auth/forbidden');
        }
		// json($this->input->post(), true);

        $submit = $this->input->post('btnSubmit',TRUE);

        if($submit == "Save"){
        	$this->form_validation->set_rules('name','Name Code','required');
        	$this->form_validation->set_rules('description','Description','required');
			$this->form_validation->set_error_delimiters('<p style="color:red">', '</p>');

            $validation = $this->form_validation->run();
    
            if ($validation == true) {
				//--Data to be post:
                $newData = $this->_get_data_from_post();
                // json($newData, true);
                $this->Commons_mdl->insert('tbl_devices', $newData);
				$msg = 'New data created';
				$this->session->set_userdata('success', $msg);
                redirect('devices');
            } else {
				$this->session->set_userdata('errors', validation_errors());
                $this->create();
            }
    
        }
	}

	function setActive() 
    {
    	if(getSignedInData('role_id') != "88"){
        	redirect('auth/forbidden');
        }
        // $post = $this->input->post();
		// json($post, true);

        $_SESSION['device_id'] = $this->input->post('device_id', TRUE);
        redirect(base_url());
    }

    function edit($id)
    {
        if(getSignedInData('role_id') != "88"){
        	redirect('auth/forbidden');
        }

        $data['pageTitle'] = 'Edit Device';

		$data['formLocation'] = base_url('devices/store');
		$data['submitValue'] = 'Save';

		$data['dtDevice'] = $this->Commons_mdl->getData('tbl_devices', ['id'=>$id], null)->row();
		$data['formLocation'] = base_url('devices/update/'.$id);
		$data['submitValue'] = 'Update';

		$data['viewFile'] = 'devices/v_form';
		$this->load->view('templates/v_backend', $data, FALSE);
    }

    function update($id)
	{
		if(getSignedInData('role_id') != "88"){
        	redirect('auth/forbidden');
        }

        $submit = $this->input->post('btnSubmit',TRUE);

        if($submit == "Update"){
        	$this->form_validation->set_rules('name','Name Code','required');
        	$this->form_validation->set_rules('description','Description','required');
			$this->form_validation->set_error_delimiters('<p style="color:red">', '</p>');

            $validation = $this->form_validation->run();
    
            if ($validation == true) {
                $newData = $this->_get_data_from_post();
                // json($newData, true);
                $this->Commons_mdl->update('tbl_devices', ['id'=>$id], $newData);
                $msg = 'Data updated';
				$this->session->set_userdata('success', $msg);
                redirect('devices');
            } else {
                $this->session->set_userdata('errors', validation_errors());
                redirect($_SERVER['HTTP_REFERER']);
                // $this->edit($id);
            }
    
        }
	}

    function destroy($id)
	{
        if(getSignedInData('role_id') != "88"){
        	redirect('auth/forbidden');
        }

        $data = $this->Commons_mdl->getData('tbl_devices', ['id'=>$id])->row();

        if($data != null){		
			//--Delete data from DB:
			$this->Commons_mdl->delete('tbl_devices', ['id'=>$id]);
			$msg = 'Data deleted';
			$this->session->set_userdata('success', $msg);
			redirect('devices');
        }
        
	}

    function _get_data_from_post() 
    {
        $data['name'] = $this->input->post('name',TRUE);
        $data['description'] = $this->input->post('description',TRUE);
        return $data;
    }
}
