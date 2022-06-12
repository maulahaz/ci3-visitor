<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Commons_mdl');
		// _isLoggedin();
	}

    public function signin()
	{
		if (isset($_SESSION['auth'])){
            redirect('account/profile');
        }

		$data['pageTitle'] = 'Sign in'; 
		$data['flashMsg'] = $this->session->flashdata('flashMsg');
		$data['actionUrl'] = base_url('auth/signin_exe');
		$this->load->view('auth/v_signin2', $data, FALSE);
	}

	public function signin_exe()
	{
		// json($_POST, true);
		$submit = $this->input->post('submit', TRUE);

		if ($submit == 'Signin') {
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('userpass','Password','required');
			$this->form_validation->set_error_delimiters('<p style="color: red">', '</p>');

			$result = $this->form_validation->run();

			if($result == TRUE){
				$username = $this->input->post('username', TRUE);
				$userpass = $this->input->post('userpass', TRUE);

				$dataUser = $this->Commons_mdl->getData('tbl_users',['username' => $username])->row();

				if(!empty($dataUser)){
					$storedPassword = $dataUser->password;

					$cekPassword = password_verify($userpass, $storedPassword);
					// json($cekPassword.'--'.$storedPassword."---".$userpass, true);

					if($cekPassword){
						$roleId = $dataUser->role_id;
						$numLogins = $dataUser->num_logins;
						$token = make_rand_str(32);

						//--Update login data ke tbl_users:
                        $data['num_logins'] = $numLogins + 1;
                        $data['last_login'] = time();
                        $data['user_token'] = '';//$token;
                        $this->Commons_mdl->update('tbl_users',['username'=>$username],$data);

                        //--Insert data ke tbl_tokens:
                        $dtToken['token'] = $token;
                        $dtToken['user_id'] = $username;
                        $dtToken['expiry_date'] = time() + 86400; //one day
                        $this->Commons_mdl->insert('tbl_tokens', $dtToken);

                        // Create session
                        $signedinUserData = $dataUser;
                        $signedinUserData->token = $token;

                        $_SESSION['auth'] = $signedinUserData;

						$this->afterSignin();
					} else{
						$msg= '<div class="alert alert-warning" role="alert"><strong>Failed !!!,</strong> Wrong Password</div>';
						//$msg= '<div class="alert alert-success" role="alert"><strong>Success !!!,</strong>Data updated</div>';
						$this->session->set_flashdata('flashMsg', $msg);
						redirect('auth/signin');
					}
				} 
				else {
					$msg= '<div class="alert alert-warning" role="alert"><strong>Failed !!!,</strong> User ID is Not Registered</div>';
					$this->session->set_flashdata('flashMsg', $msg);
					redirect('auth/signin');
                }
			} 
			else {
				// die('error here');
				$flashMsg = validation_errors();
				$this->session->set_flashdata('flashMsg', $flashMsg);
				redirect('auth/signin');
            }
		}
	}

	protected function afterSignin()
	{
		redirect(base_url());
	}

	public function signout()
	{
		unset($_SESSION['auth']);
		// $this->session->sess_destroy();
		redirect(base_url());
	}

	public function forbidden()
	{
		echo "<h1 style='line-height: 500px; text-align: center; color: red';><marquee behavior='alternate' width='500' height='500'>You are not allowed to be here!!!</marquee></h1>";
	}

}
