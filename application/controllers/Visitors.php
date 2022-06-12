<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitors extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Commons_mdl');
		$this->load->helper('string');
	}

	public function index()
	{
		redirect('visitors/manage');
	}

	public function records()
	{
        if(getSignedInData('role_id') != "88"){
            redirect('auth/forbidden');
        }

        //--For Searching Data:
        $btnSubmit = $this->input->post('btnSubmit',TRUE);

        $searchText = "";
        if($btnSubmit == "Search"){
            $searchText = $this->input->post('search', true);
            $this->session->set_userdata('search', $searchText);            
        }else{
            if($this->session->userdata('search') != NULL){
                $searchText = $this->session->userdata('search');
            }
        }

        //--For Pagination:
        $limit = 4;
        $startIndex = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        if($searchText != ""){
            $sqlTotal = '
                SELECT *
                FROM tbl_visitors v
                JOIN tbl_users u ON u.code = v.user_code
                JOIN tbl_devices d ON d.id = v.device_id
                WHERE u.fullname LIKE "%'.$searchText.'%"
                OR d.description LIKE "%'.$searchText.'%"
                ORDER BY v.log_at DESC
            ';

            $sqlShow = '
                SELECT *
                FROM tbl_visitors v
                JOIN tbl_users u ON u.code = v.user_code
                JOIN tbl_devices d ON d.id = v.device_id
                WHERE u.fullname LIKE "%'.$searchText.'%"
                OR d.description LIKE "%'.$searchText.'%"
                ORDER BY v.log_at DESC
                LIMIT '.$limit.' OFFSET '.$startIndex.'
            ';
        }else{
            $sqlTotal = '
                SELECT *
                FROM tbl_visitors v
                JOIN tbl_users u ON u.code = v.user_code
                JOIN tbl_devices d ON d.id = v.device_id
                ORDER BY v.log_at DESC
            '; 

            $sqlShow = '
                SELECT *
                FROM tbl_visitors v
                JOIN tbl_users u ON u.code = v.user_code
                JOIN tbl_devices d ON d.id = v.device_id
                ORDER BY v.log_at DESC
                LIMIT '.$limit.' OFFSET '.$startIndex.'
            ';           
        }
        $dtVisitors = $this->Commons_mdl->customQuery($sqlTotal);
        $totVisitor = $dtVisitors->num_rows();


        //--For Pagination:
        $dtVisitorsToShow = $this->Commons_mdl->customQuery($sqlShow);
        // json($dtVisitorsToShow->result(), true);
        $data['dtVisitors'] = $dtVisitorsToShow->result();
        //
        $pagination_data['target_url'] = base_url('visitors/records');
        $pagination_data['total_rows'] = $totVisitor;
        $pagination_data['offset_segment'] = 3;
        $pagination_data['limit'] = $limit;
        // json($pagination_data, true);
        $data['links'] = pagination_bs4($pagination_data);
        $data['search'] = $searchText ?? "-";
        $data['totData'] = $totVisitor;

        //--
		
		$data['pageTitle'] = 'Visitor Records';
		$data['flashMsg'] = $this->session->flashdata('flashMsg'); 
		$data['viewFile'] = 'visitors/v_records';
		// $data['jsFile'] = 'visitors/js_users';
		$this->load->view('templates/v_backend', $data, FALSE);
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
            ORDER BY id DESC
        ';
		$dtVisitors = $this->Commons_mdl->customQuery($sql)->result();
		// $dtVisitors = $this->Commons_mdl->getData('tbl_users', ['role_id !='=>'88'])->result();
        // json($dtVisitors, true);
		$data['dtVisitors'] = $dtVisitors;

		$data['pageTitle'] = 'Manage Visitor';

		$data['flashMsg'] = $this->session->flashdata('flashMsg'); 
		$data['viewFile'] = 'visitors/v_manage';
		// $data['jsFile'] = 'visitors/js_users';
		$this->load->view('templates/v_backend', $data, FALSE);
	}

    public function search()
    {
        if(getSignedInData('role_id') != "88"){
            redirect('auth/forbidden');
        }

        //--For Searching Data:
        $btnSubmit = $this->input->post('btnSubmit',TRUE);
        $txtName = $this->input->post('name',TRUE);
        $txtDataFrom = convertDate($this->input->post('date-from',TRUE), "mysql_date");
        $txtDateUpto = convertDate($this->input->post('date-upto',TRUE), "mysql_date");
        $txtLogType = $this->input->post('log-type',TRUE);
        $txtNotes = $this->input->post('notes',TRUE);

        if($btnSubmit == "Reset") {
            $this->session->unset_userdata('search_more');
            redirect('visitors/records');
        }

        $searchMore = [];
        if($btnSubmit == "SearchMore"){
            // json($this->input->post(), true);
            $searchMoreData['name'] = $txtName;
            $searchMoreData['date_from'] = $txtDataFrom;
            $searchMoreData['date_upto'] = $txtDateUpto;
            $searchMoreData['log_type'] = $txtLogType;
            $searchMoreData['notes'] = $txtNotes;
            // $_SESSION['search_more'] = $searchMoreData;
            $this->session->set_userdata('search_more', $searchMoreData);
            $searchMore = $this->session->userdata('search_more');
            // json($searchMore, true);
            // json($this->session->userdata('search_more'), true);          
        }else{
            if($this->session->userdata('search_more') != NULL){
                $searchMore = $this->session->userdata('search_more');
            }
        }

        //--For Pagination:
        $limit = 10;
        $startIndex = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        if($searchMore != NULL){
            $sqlTotal = '
                SELECT *
                FROM tbl_visitors v
                JOIN tbl_users u ON u.code = v.user_code
                JOIN tbl_devices d ON d.id = v.device_id
                WHERE u.fullname LIKE "%'.$searchMore["name"].'%"
                AND v.log_type LIKE "%'.$searchMore["log_type"].'%"
                AND (DATE(v.log_at) BETWEEN "'.$searchMore["date_from"].'" AND "'.$searchMore["date_upto"].'")
                AND d.description LIKE "%'.$searchMore["notes"].'%"
                ORDER BY v.log_at DESC
            ';

            $sqlShow = '
                SELECT *
                FROM tbl_visitors v
                JOIN tbl_users u ON u.code = v.user_code
                JOIN tbl_devices d ON d.id = v.device_id
                WHERE u.fullname LIKE "%'.$searchMore["name"].'%"
                AND v.log_type LIKE "%'.$searchMore["log_type"].'%"
                AND (DATE(v.log_at) BETWEEN "'.$searchMore["date_from"].'" AND "'.$searchMore["date_upto"].'")
                AND d.description LIKE "%'.$searchMore["notes"].'%"
                ORDER BY v.log_at DESC
                LIMIT '.$limit.' OFFSET '.$startIndex.'
            ';
        }else{
            redirect('visitors/records');
        }
        $dtVisitors = $this->Commons_mdl->customQuery($sqlTotal);
        // checkSQL($dtVisitors);
        $totVisitor = $dtVisitors->num_rows();
        // json($totVisitor, true);

        //--For Pagination:
        $dtVisitorsToShow = $this->Commons_mdl->customQuery($sqlShow);
        // json($dtVisitorsToShow->result(), true);
        $data['dtVisitors'] = $dtVisitorsToShow->result();
        //
        $pagination_data['target_url'] = base_url('visitors/search');
        $pagination_data['total_rows'] = $totVisitor;
        $pagination_data['offset_segment'] = 3;
        $pagination_data['limit'] = $limit;
        // json($pagination_data, true);
        $data['links'] = pagination_bs4($pagination_data);
        $data['searchMore'] = $searchMore;
        $data['totData'] = $totVisitor;

        //--
        
        $data['pageTitle'] = 'Search Visitor';
        $data['flashMsg'] = $this->session->flashdata('flashMsg'); 
        $data['viewFile'] = 'visitors/v_records';
        // $data['jsFile'] = 'visitors/js_users';
        $this->load->view('templates/v_backend', $data, FALSE);
    }

	function create()
    {
    	if(getSignedInData('role_id') != "88"){
        	redirect('auth/forbidden');
        }

		$data['pageTitle'] = 'Create Visitor';

		$data['formLocation'] = base_url('visitors/store');
		$data['submitValue'] = 'Save';

		// $data['flashMsg'] = $this->session->flashdata('flashMsg'); 
		$data['viewFile'] = 'visitors/v_form';
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
        	$this->form_validation->set_rules('company','Company','required');
        	$this->form_validation->set_rules('fullname','Full name','required');
        	$this->form_validation->set_rules('phone','Phone','required');
			$this->form_validation->set_error_delimiters('<p style="color:red">', '</p>');

            $validation = $this->form_validation->run();
    
            if ($validation == true) {
				//--Data to be post:
                $newData = $this->_get_data_from_post();
                $newData['username'] = random_string('alnum', 10);
                $newData['password'] = password_hash('pass123', PASSWORD_BCRYPT, array('cost' => 11));
                $data['url_string'] = url_title($newData['fullname'], 'dash', true);
                $newData['role_id'] = 0;//Guess = 0
                $newData['created_at'] = date('Y-m-d H:i:s');
                $newData['code'] = 'V'.date('ymdhis').strtoupper(random_string('alnum', 5));

				//--Uploaded file to be post:
				if($_FILES['picture']['name'] != ""){
		        	$imgFile = $this->_uploadFile('picture');
                    if($imgFile){
                        // echo "Upload image ok";die();
                        $newData['picture'] = $imgFile;
                        $this->_generateThumbnail($imgFile);
                    }else{
                        // echo "Upload image not ok";die();
                        $msg = array($this->upload->display_errors('<p style="color:red">', '</p>'));
                        // $data['errorUpload'] = array('error' => $this->upload->display_errors('<p class="alert alert-danger">','</p>'));
                        $this->session->set_userdata('errors', $msg);
						redirect($_SERVER['HTTP_REFERER']);
						// json($msg, true);
                    }
		        }
                // json($newData, true);
                $this->Commons_mdl->insert('tbl_users', $newData);
				// $msg = '<div class="alert alert-success" role="alert"><strong>Success !!!,</strong>New data created</div>';
				$msg = 'New data created';
				// $this->session->set_flashdata('success', $msg);
				$this->session->set_userdata('success', $msg);
                redirect('visitors');
            } else {
				// $this->session->set_flashdata('errors', validation_errors());
				$this->session->set_userdata('errors', validation_errors());
				// redirect($_SERVER['HTTP_REFERER']);
				// $this->session->set_userdata('errors', validation_errors());
                $this->create();
            }
    
        }
	}

    function edit($id)
    {
        if(getSignedInData('role_id') != "88"){
            redirect('auth/forbidden');
        }

        $data['pageTitle'] = 'Edit Visitor';

        $data['formLocation'] = base_url('visitors/store');
        $data['submitValue'] = 'Save';

        $data['dtVisitor'] = $this->Commons_mdl->getData('tbl_users', ['id'=>$id], null)->row();
        $data['formLocation'] = base_url('visitors/update/'.$id);
        $data['submitValue'] = 'Update';

        $data['viewFile'] = 'visitors/v_form';
        $this->load->view('templates/v_backend', $data, FALSE);
    }

    function update($id)
    {
        if(getSignedInData('role_id') != "88"){
            redirect('auth/forbidden');
        }

        $submit = $this->input->post('btnSubmit',TRUE);

        if($submit == "Update"){
            $this->form_validation->set_rules('company','Company','required');
            $this->form_validation->set_rules('fullname','Full name','required');
            $this->form_validation->set_rules('phone','Phone','required');
            $this->form_validation->set_error_delimiters('<p style="color:red">', '</p>');

            $validation = $this->form_validation->run();
    
            if ($validation == true) {
                $newData = $this->_get_data_from_post();
                // json($newData, true);
                $this->Commons_mdl->update('tbl_users', ['id'=>$id], $newData);
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

	function show($id) 
    {
        if(getSignedInData('role_id') != "88"){
        	redirect('auth/forbidden');
        }

        $dtVisitor = $this->Commons_mdl->getData('tbl_users', ['id'=>$id], null)->row();
        if ($dtVisitor == false) {
            redirect('visitors');
        } 

		$data['pageTitle'] = 'Visitor Information';
		$data['dtVisitor'] = $dtVisitor;
		$data['viewFile'] = 'visitors/v_show';
		$this->load->view('templates/v_backend', $data, FALSE);
    }

    function record_detail($id) 
    {
        if(getSignedInData('role_id') != "88"){
            redirect('auth/forbidden');
        }

        $dtVisitor = $this->Commons_mdl->getData('tbl_users', ['id'=>$id], null)->row();
        if ($dtVisitor == false) {
            redirect('visitors');
        } 

        $data['pageTitle'] = 'Visitor Record Information';
        $data['dtVisitor'] = $dtVisitor;
        $data['viewFile'] = 'visitors/v_record_detail';
        $this->load->view('templates/v_backend', $data, FALSE);
    }

	function destroy($id)
	{
        if(getSignedInData('role_id') != "88"){
        	redirect('auth/forbidden');
        }

        $data = $this->Commons_mdl->getData('tbl_users', ['id'=>$id])->row();

        if($data != null){
			//--Delete Picture from folder:
			$imageName = $data->picture;
			$filePath = './assets/uploads/'.$imageName;
			$thumbPath = './assets/uploads/thumb_'.$imageName;
			if(file_exists($filePath)){ unlink($filePath); }		
			if(file_exists($thumbPath)){ unlink($thumbPath); }	
			
			//--Delete Picture from DB:
			$this->Commons_mdl->delete('tbl_users', ['id'=>$id]);
			$msg = 'Data deleted';
			$this->session->set_userdata('success', $msg);
			redirect('visitors');
        }
        
	}

	function _get_data_from_post() 
    {
        $data['company'] = $this->input->post('company',TRUE);
        $data['fullname'] = $this->input->post('fullname',TRUE);
        $data['phone'] = $this->input->post('phone',TRUE);
        
        // $data['isActive'] = $this->input->post('isActive',TRUE);
        // $data['notes'] = $this->input->post('notes',TRUE);
        return $data;
    }

	function _uploadFile($inputFileName, $newName = FALSE)
    {
        // echo $inputFileName;die();
        $storeLocation = './assets/uploads/';
		$fileName = $_FILES['picture']['name'];
		$newName = pathinfo($fileName, PATHINFO_FILENAME)."-".date('ymdhis').".".pathinfo($fileName, PATHINFO_EXTENSION); 
		// json($newName, true);

        //SET CONFIGURATION
        $config['upload_path']          = $storeLocation;//'./uploads/slider/';//
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = '2400';
        $config['max_width']            = '3000';
        $config['max_height']           = '3000';
        // $config['overwrite']         = FALSE;
        // $config['encrypt_name'] 		= TRUE;
        $config['file_name']        	= $newName;

        //--LOAD CONFIG TO LIBRARY
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        //--UPLOADING
        if ($this->upload->do_upload($inputFileName)){
            // echo "Process OK";die();
            $uploadFile = $this->upload->data();
            $file_toDB = $uploadFile['file_name'];
            return $file_toDB;
        }else{
            return false;
        }
    }

	function _generateThumbnail($file_name)
	{
		//create thumbnail
		$config['image_library'] = 'gd2';
		$config['source_image'] = './assets/uploads/'.$file_name;
		$config['new_image'] = './assets/uploads/thumb_'.$file_name;
		// $config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width']         = 200; //- Ukuran ideal Thumbnail 200x200
		$config['height']       = 200; //- Ukuran ideal Thumbnail 200x200
		//$config['thumb_marker'] ='';//without tambahan '_thumb'

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();				
	}

	function _deleteImage($updateID)
    {
        //--Ngambil data dri db User
        $data = $this->Commons_mdl->getData('tbl_artikel',['uid'=>$updateID],null)->row();
        $img = $data->Picture;
        if($img != ''){
            $filePath = FCPATH.'/assets/uploads/'.$img;
            $thumbPath = './assets/uploads/thumb_'.$img;

            if(file_exists($filePath)){ unlink($filePath); }        
            if(file_exists($thumbPath)){ unlink($thumbPath); }
        }  
    }

}
