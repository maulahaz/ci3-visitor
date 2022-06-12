<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Commons_mdl');
		// _isLoggedin();
	}

	function index() 
    {
        // $token = $this->app_security->_isSignedIn();

        $sql = '
            SELECT *
            FROM tbl_visitors v
            JOIN tbl_users u ON u.code = v.user_code
            JOIN tbl_devices d ON d.id = v.device_id
            ORDER BY v.log_at DESC
            LIMIT 20 
        ';
        $dtVisitors = $this->Commons_mdl->customQuery($sql)->result();
    	//json(($_SESSION['auth']), true);
    	
        $data['dtVisitors'] = $dtVisitors;

        //--Data Loggedin User:
		$deviceId = isset($_SESSION['device_id']) ? $_SESSION['device_id'] : NULL;
		$data['deviceId'] = $deviceId ;
		$data['deviceLoc'] = ($deviceId != NULL) ? $this->Commons_mdl->getData('tbl_devices', ['id'=>$deviceId])->row()->description : NULL;
        
        //--Data Device:
        $data['dtDevices'] = $this->Commons_mdl->getData('tbl_devices')->result();
        // json($data['dtDevices'], true);

        //--Data Summary:
        $data['totTodayPunchIn'] = $this->_totTodayPunchIn();
        $data['totTodayPunchOut'] = $this->_totTodayPunchOut();
        $data['totDifference'] = $this->_totTodayPunchIn() - $this->_totTodayPunchOut();

        $data['pageTitle'] = 'Visitor Page'; 
		$data['flashMsg'] = $this->session->flashdata('flashMsg'); 
		$data['viewFile'] = 'welcome/v_record';
		$data['jsFile'] = 'welcome/js_welcome';
		$this->load->view('templates/v_frontend', $data, FALSE);
    }

    function _totTodayPunchIn()
    {
        $sql = '
            SELECT count(*) TodayPunchIn
            FROM tbl_visitors
            WHERE log_type = "punch_in" AND date(log_at) = date(now())
        ';
        $result = $this->Commons_mdl->customQuery($sql)->row()->TodayPunchIn;
        // $r = $result->TodayPunchIn;
        // json($result, true);
        // checkSQL($result);
        return $result;
    }
// 
    function _totTodayPunchOut()
    {
        $sql = '
            SELECT count(*) TodayPunchOut
            FROM tbl_visitors
            WHERE log_type = "punch_out" AND date(log_at) = date(now())
            --date("2022-06-05")
        ';
        $result = $this->Commons_mdl->customQuery($sql)->row()->TodayPunchOut;
        // json($result, true);
        // checkSQL($result);
        return $result;
    }

	function getDataVisitor()
    {
        $sql = '
            SELECT *
            FROM tbl_visitors v
            JOIN tbl_users u ON u.code = v.user_code
            JOIN tbl_devices d ON d.id = v.device_id
            ORDER BY v.log_at DESC
            LIMIT 20
        ';
        $dtVisitors = $this->Commons_mdl->customQuery($sql)->result();
        // json($dtVisitors, true);
        echo json_encode($dtVisitors);
    }

    function savePunch()
	{
        // echo "Howdy"; die();
        $post = file_get_contents('php://input');
        $decoded = json_decode($post, true);
        // json($decoded, true);

        $response = array('isSuccess' => false, 'msg' => array(),'data' => array());
        $userBarcode = $decoded['user_barcode'];
        $deviceId = $decoded['device_id'];

		$postedData['device_id'] = $deviceId;
		$postedData['user_code'] = $userBarcode;
		$postedData['log_at'] = date('Y-m-d H:i:s');
		$postedData['notes'] = 'notes';//$this->input->post('notes', true);
        // json($postedData, true);

        $isValidUser = $this->Commons_mdl->getData('tbl_users',['code'=>$userBarcode])->row();
        // json($isValidUser, true);
		//--Log Type:
        $sql = '
            SELECT *
            FROM tbl_visitors v
            WHERE user_code = "'.$userBarcode.'"
            ORDER BY v.log_at DESC
        ';
        $lastUserLog = $this->Commons_mdl->customQuery($sql)->result();
        // json($lastUserLog, true);
		if($lastUserLog != null){
			$postedData['log_type'] = ($lastUserLog[0]->log_type == 'punch_in') ? 'punch_out' : 'punch_in';
		}else{
			$postedData['log_type'] = 'punch_in';
		}

        if($isValidUser){
            $execution = $this->Commons_mdl->insert('tbl_visitors', $postedData);
            if($execution){
                $response['isSuccess'] = TRUE;
                $response['msg'] = 'New Data Successfully Saved';
            }else{
                $response['isSuccess'] = FALSE;
                $response['msg'] = 'Error while creating new data. Please contact Administrator';
            }
            
        }else{
            $response['isSuccess'] = FALSE;
            $response['msg'] = 'User not registered. Please contact Administrator';
        }   

        echo json_encode($response);

	}
}
