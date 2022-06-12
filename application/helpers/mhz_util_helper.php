<?php

function json($data, $kill_script=null) {
    echo '<pre>'.json_encode($data, JSON_PRETTY_PRINT).'</pre>';

    if (isset($kill_script)) {
        die();
    }
}

function getProfile($param)
{
	$ci =& get_instance();
	$ci->load->model('Commons_mdl');
	$qryProfile = $ci->Commons_mdl->getData('tbl_configs', ['Field_key' => $param], null);
	$result = $qryProfile->row()->Value;
	return $result;
}

function getConfigData($param)
{
	$ci =& get_instance();
	$ci->load->model('Commons_mdl');
	$qryProfile = $ci->Commons_mdl->getData('tbl_configs', ['Field_key' => $param], null);
	$result = $qryProfile->row()->Value;
	return $result;
}

function undercon()
{
	redirect('pages/undercon');
}

function forbidden()
{
	redirect('auths/forbidden');
}

function checkPost()
{
	$ci =& get_instance();
    //--- TESTING:
    $p = $ci->input->post();
    echo "<pre>";
    print_r ($p);
    echo "</pre>";
    die();        
}

function checkArray($array)
{
	foreach ($array as $key => $value) {
		echo "<pre>";
		print_r ($value);
		echo "</pre>";
	}
	die();
}

function checkSQL($variable)
{
	$ci =& get_instance();
	if($variable == "") { echo "Data Empty"; }
	echo "<pre>";
	print_r ($variable);
	echo "</pre>";
	echo "<hr>";
	echo $ci->db->last_query();
	die();
}

function checkSha1($pass)
{
	echo sha1($pass);
}

function make_rand_str($strlen, $uppercase=false) {
    $characters = '-_23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
    $random_string = '';
    for ($i = 0; $i < $strlen; $i++) {
        $random_string .= $characters[mt_rand(0, strlen($characters) - 1)];
    }

    if ($uppercase == true) {
        $random_string = strtoupper($random_string);
    }
    return $random_string;
}

function pagination_bs4($pagination_data){
	$ci =& get_instance();	
	// Note : to make this function work, it should have pagination_data like:
	// $target_url, $total_rows, $offset_segment, $limit (tot data per page)

	$target_url = $pagination_data['target_url'];
	$total_rows = $pagination_data['total_rows'];
	$offset_segment = $pagination_data['offset_segment'];
	$limit = $pagination_data['limit']; //<-- tot data per page

	$get_num_links = $total_rows / $limit;
    $num_links = floor($get_num_links);

	$ci->load->library('pagination');

	$config['base_url'] = $target_url;
	$config['total_rows'] = $total_rows;
	
	$config['uri_segment'] = $offset_segment;

	$config['per_page'] = $limit; //-per_page = Items per page
	$config['num_links'] = $num_links; //-num_links = Links qty

    $config['full_tag_open']    = '<nav aria-label="Page navigation example"><ul class="pagination">';
    $config['full_tag_close']   = '</ul></nav>';

	$config['attributes'] = ['class' => 'page-link'];
		
	$config['first_link'] = false;
	$config['first_tag_open'] = '<li class="page-item">';
	$config['first_tag_close'] = '</li>';

	$config['prev_link'] = '&laquo';
	$config['prev_tag_open'] = '<li class="page-item">';
	$config['prev_tag_close'] = '</li>';

	$config['next_link'] = '&raquo';
	$config['next_tag_open'] = '<li class="page-item">';
	$config['next_tag_close'] = '</li>';

	$config['last_link'] = false;
	$config['last_tag_open'] = '<li class="page-item">';
	$config['last_tag_close'] = '</li>';

	$config['cur_tag_open'] = '<li class="page-item active" aria-current="page"><a href="#" class="page-link">';
	$config['cur_tag_close'] = '</a></li>';

	$config['num_tag_open'] = '<li class="page-item">';
	$config['num_tag_close'] = '</li>';

	$ci->pagination->initialize($config);

	$halamanku =  $ci->pagination->create_links();
	return $halamanku;
}

function convertDate($datetime_str, $format)
{
    //==Convert String date to some format
    switch ($format) {
        case 'mysql':
            // * MySQL DATETIME format,  2018-02-11 11:05:20.
        $the_date = date('Y-m-d H:i:s', strtotime($datetime_str));
        break;  
        case 'mydate':
            // * mydate, dd-mmm-yy, 11-Feb-18..
        $the_date = date('d-M-y', strtotime($datetime_str));
        break;
        case 'mydateX':
        $the_date = date('d-M-yyyy', strtotime($datetime_str));
        break;
        case 'overtime':
            // * mydate, dd-mmm-yy, 11-Feb-18..
        $the_date = date('d-M-y H:i', strtotime($datetime_str));
        break;                                      
        case 'mysql_date':
            // * MySQL DATETIME format,  2018-02-11.
        $the_date = date('Y-m-d', strtotime($datetime_str));
        break;   
    }
    return $the_date;
}
