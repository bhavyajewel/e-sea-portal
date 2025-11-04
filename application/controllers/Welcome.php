<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->database();
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->model('Usermodel');
	}
	public function index()
	{
		$this->load->view('indexpage');
	}
	public function home()
	{
		$this->load->view('welcome_message');
	}
	public function login()
	{
		$this->load->view('login');
	}

	public function companyhome()
	{
		$this->load->view('companyhome');
	}
	public function contracthome()
	{
		$this->load->view('contracthome');
	}
	public function admin()
	{
		$this->load->view('admin');
	}
	public function admincomp()
	{
		$data['dis'] = $this->Usermodel->admincomp();
		$this->load->view('admincomp', $data);
	}
	public function admincontra()
	{
		$data['dis'] = $this->Usermodel->admincontra();
		$this->load->view('admincontra', $data);
	}
	public function adminpublic()
	{
		$data['dis'] = $this->Usermodel->adminpublic();
		$this->load->view('adminpublic', $data);
	}
	public function user()
	{
		$this->load->view('user');
	}
	
	public function forgotpassword() {
		$this->load->view('forgot_password');
	}
	
	public function process_forgot_password() {
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', 'Please enter a valid email address.');
			redirect('Welcome/forgotpassword');
		}
		
		$email = $this->input->post('email');
		$user = $this->Usermodel->check_email_exists($email);
		
		if ($user) {
			// Generate a random token
			$token = bin2hex(random_bytes(32));
			
			// Save token to database
			if ($this->Usermodel->update_reset_token($email, $token)) {
				// Send email with reset link
				$reset_link = base_url("Welcome/reset_password/$token");
				
				// Email configuration
				$config = array(
					'protocol' => 'smtp',
					'smtp_host' => 'smtp.gmail.com',
					'smtp_port' => 587,
					'smtp_user' => 'your-email@gmail.com', // Replace with your email
					'smtp_pass' => 'your-email-password', // Replace with your email password
					'mailtype' => 'html',
					'charset' => 'iso-8859-1',
					'smtp_crypto' => 'tls',
					'wordwrap' => TRUE
				);
				
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				
				$this->email->from('your-email@gmail.com', 'Vizhinjam Port');
				$this->email->to($email);
				$this->email->subject('Password Reset Request');
				
				$message = "<p>You have requested to reset your password.</p>";
				$message .= "<p>Please click the following link to reset your password:</p>";
				$message .= "<p><a href='$reset_link'>$reset_link</a></p>";
				$message .= "<p>This link will expire in 1 hour.</p>";
				$message .= "<p>If you did not request this, please ignore this email.</p>";
				
				$this->email->message($message);
				
				if ($this->email->send()) {
					$this->session->set_flashdata('success', 'Password reset link has been sent to your email.');
				} else {
					log_message('error', 'Email sending failed: ' . $this->email->print_debugger());
					$this->session->set_flashdata('error', 'Failed to send reset email. Please try again.');
				}
			} else {
				$this->session->set_flashdata('error', 'Failed to process your request. Please try again.');
			}
		} else {
			$this->session->set_flashdata('success', 'If your email exists in our system, you will receive a password reset link.');
		}
		
		redirect('Welcome/forgotpassword');
	}
	
	public function reset_password($token = null) {
		if (empty($token)) {
			show_404();
		}
		
		$user = $this->Usermodel->get_user_by_token($token);
		
		if (!$user) {
			$this->session->set_flashdata('error', 'Invalid or expired reset link. Please request a new one.');
			redirect('Welcome/forgotpassword');
		}
		
		$data['token'] = $token;
		$this->load->view('reset_password', $data);
	}
	
	public function process_reset_password() {
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
		$this->form_validation->set_rules('token', 'Token', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('Welcome/reset_password/' . $this->input->post('token'));
		}
		
		$token = $this->input->post('token');
		$password = $this->input->post('password');
		
		$user = $this->Usermodel->get_user_by_token($token);
		
		if (!$user) {
			$this->session->set_flashdata('error', 'Invalid or expired reset link. Please request a new one.');
			redirect('Welcome/forgotpassword');
		}
		
		if ($this->Usermodel->update_password($user->email, $password)) {
			$this->session->set_flashdata('success', 'Your password has been reset successfully. You can now login with your new password.');
			redirect('Welcome/login');
		} else {
			$this->session->setflashdata('error', 'Failed to reset password. Please try again.');
			redirect('Welcome/reset_password/' . $token);
		}
	}

	public function userreg()
	{
		$this->load->view('indexheader');
		$this->load->view('publicregister');
		$this->load->view('footer');
	}
	public function publicregister()
	{
		$pass = $this->input->post('password');
		$newpassword = $this->Usermodel->hash_password($pass);
		$data = array(
			'name' => $this->input->post('name'),
			'address' => $this->input->post('address'),
			'pincode' => $this->input->post('pincode'),
			'district' => $this->input->post('district'),
			'city' => $this->input->post('city'),
			'gender' => $this->input->post('gender'),
			'contact' => $this->input->post('contact')
		);
		$da = array(
			'email' => $this->input->post('email'),
			'password' => $newpassword,
			'usertype' => '3',
			'status'=>'1'



		);


		$result = $this->Usermodel->publicreg($data, $da);
		if ($result) {
			echo "<script>alert('Registration sucessfull')</script>";
			redirect('Welcome/userreg', 'refresh');
		} else {
			echo "<script>alert('Registration unsucessfull')</script>";
		}

	}
	public function companyreg()
	{
		$this->load->view('indexheader');
		$this->load->view('companyreg');
		$this->load->view('footer');
	}
	public function companyregister()
	{
		$pass = $this->input->post('password');
		$newpassword = $this->Usermodel->hash_password($pass);
		$data = array(
			'name' => $this->input->post('name'),
			'address' => $this->input->post('address'),
			'state' => $this->input->post('state'),
			'district' => $this->input->post('district'),
			'contact' => $this->input->post('contact_number')
		);
		$da = array(
			'email' => $this->input->post('email'),
			'password' => $newpassword,
			'usertype' => '2',

		);


		$result = $this->Usermodel->companyreg($data, $da);
		if ($result) {
			echo "<script>alert('Registration sucessfull')</script>";
			redirect('Welcome/companyreg', 'refresh');
		} else {
			echo "<script>alert('Registration unsucessfull')</script>";
		}
	}
	public function companyupdation_view()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '1') 
		{
		$this->load->view('companyheader');
		$id = $this->session->userid;
		$data['id'] = $this->session->userid;
		$data['views'] = $this->Usermodel->companyupdation_dataview($id);
		$this->load->view('companyupdation', $data);
		$this->load->view('footer');
	}
	else{
		redirect('Welcome/login', 'refresh');
	}
	}
	public function companyupdation()
	{
		// $pass=$this->input->post('password');
		// $newpassword=$this->Usermodel->hash_password($pass);
		$id = $this->input->post('hide');
		$data = array(
			'name' => $this->input->post('name'),
			'address' => $this->input->post('address'),
			'state' => $this->input->post('state'),
			'district' => $this->input->post('district'),
			'contact' => $this->input->post('contact')
		);
		$da = array(
			'email' => $this->input->post('email'),
			//  'password'=>$newpassword,
			// 'usertype'=>'2',



		);


		$result = $this->Usermodel->companyupdation($data, $id);
		$result1 = $this->Usermodel->companyemailupdate($da, $id);
		if ($result && $result1) {
			echo "<script>alert('Updation sucessfull')</script>";
			redirect('Welcome/companyupdation_view', 'refresh');
		} else {
			echo "<script>alert('Updation unsucessfull')</script>";
		}

	}
	public function contractreg()
	{
		$this->load->view('indexheader');
		$this->load->view('contractreg');
		$this->load->view('footer');
	}
	public function contractregister()
	{
		$pass = $this->input->post('password');
		$newpassword = $this->Usermodel->hash_password($pass);
		$data = array(
			'name' => $this->input->post('name'),
			'regid' => $this->input->post('regid'),
			'age' => $this->input->post('age'),
			'gender' => $this->input->post('gender'),
			'contact' => $this->input->post('contact')
		);
		$da = array(
			'email' => $this->input->post('email'),
			'password' => $newpassword,
			'usertype' => '3',



		);


		$result = $this->Usermodel->contractreg($data, $da);
		if ($result) {
			echo "<script>alert('Registration sucessfull')</script>";
			redirect('Welcome/contractreg', 'refresh');
		} else {
			echo "<script>alert('Registration unsucessfull')</script>";
		}

	}
	public function contractupdation_view()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '2') 
		{
		$this->load->view('contractorheader');
		$id = $this->session->userid;
		$data['id'] = $this->session->userid;
		$data['views'] = $this->Usermodel->contractupdation_dataview($id);
		$this->load->view('contractupdation', $data);
		$this->load->view('footer');
		}
		else
   {
     			redirect('Welcome/login','refresh');

   }
	}
	public function contractupdation()
	{
		
		// $pass=$this->input->post('password');
		// $newpassword=$this->Usermodel->hash_password($pass);
		$id = $this->input->post('hide');
		$data = array(
			'name' => $this->input->post('name'),
			'regid' => $this->input->post('regid'),
			'age' => $this->input->post('age'),
			'gender' => $this->input->post('gender'),
			'contact' => $this->input->post('contact')
		);
		$da = array(
			'email' => $this->input->post('email'),
			//  'password'=>$newpassword,
			// 'usertype'=>'2',



		);


		$result = $this->Usermodel->contractupdation($data, $id);
		$result1 = $this->Usermodel->contractemailupdate($da, $id);
		if ($result && $result1) {
			echo "<script>alert('Updation sucessfull')</script>";
			redirect('Welcome/contractupdation_view', 'refresh');
		} else {
			echo "<script>alert('Updation unsucessfull')</script>";
		}

	}
	public function publicupdation_view()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '3') 
		{
		$this->load->view('userheader');
		$id = $this->session->userid;
		$data['id'] = $this->session->userid;
		$data['views'] = $this->Usermodel->publicupdation_dataview($id);
		$this->load->view('publicupdation', $data);
		$this->load->view('footer');
	    }
         else
      {
		 redirect('Welcome/login','refresh');

      }
	}
	public function publicupdation()
	{
		// $pass=$this->input->post('password');
		// $newpassword=$this->Usermodel->hash_password($pass);
		$id = $this->input->post('hide');
		$data = array(
			'name' => $this->input->post('name'),
			'address' => $this->input->post('address'),
			'pincode' => $this->input->post('pincode'),
			'district' => $this->input->post('district'),
			'city' => $this->input->post('city'),
			'gender' => $this->input->post('gender'),
			'contact' => $this->input->post('contact'),
			'qualification' => $this->input->post('qualification'),
			'skills' => $this->input->post('skills'),
			'experience' => $this->input->post('experience'),
			'domain' => $this->input->post('domain'),
		);
		$da = array(
			'email' => $this->input->post('email'),
			//  'password'=>$newpassword,
			// 'usertype'=>'2',



		);


		$result = $this->Usermodel->publicupdation($data, $id);
		$result1 = $this->Usermodel->publicemailupdate($da, $id);
		if ($result && $result1) {
			echo "<script>alert('Updation sucessfull')</script>";
			redirect('Welcome/publicupdation_view', 'refresh');
		} else {
			echo "<script>alert('Updation unsucessfull')</script>";
		}

	}
	public function qualification_view()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '3') {
			$this->load->view('userheader');
			$this->load->view('qualification_form');
			$this->load->view('footer');
		} else {
			redirect('Welcome/login', 'refresh');
		}
	}

	public function qualification_save()
	{
		if (!(isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '3')) {
			redirect('Welcome/login', 'refresh');
			return;
		}

		$id = $this->session->userid;
		$data = array(
			'qualification' => $this->input->post('qualification'),
			'skills' => $this->input->post('skills'),
			'experience' => $this->input->post('experience'),
			'domain' => $this->input->post('domain'),
		);

		$result = $this->Usermodel->publicupdation($data, $id);
		if ($result) {
			echo "<script>alert('Qualification details saved')</script>";
			redirect('Welcome/user', 'refresh');
		} else {
			echo "<script>alert('Failed to save qualification details')</script>";
			redirect('Welcome/qualification_view', 'refresh');
		}
	}
	public function companyapproval()
	{
		$get = $this->uri->segment(3);
		$status = array('status' => '1');
		$model = $this->Usermodel->companyapprove($get, $status);
		if ($model) {
			echo "<script>alert('Approval success')</script>";
			redirect('Welcome/admincomp', 'refresh');
		} else {
			echo "<script>alert('Approval unsuccessfull')</script>";
		}
	}
	public function contractapproval()
	{
		$get = $this->uri->segment(3);
		$status = array('status' => '1');
		$model = $this->Usermodel->contractapprove($get, $status);
		if ($model) {
			echo "<script>alert('Approval success')</script>";
			redirect('Welcome/admincontra', 'refresh');
		} else {
			echo "<script>alert('Approval unsuccessfull')</script>";
		}
	}
	public function contractreject()
	{
		$get = $this->uri->segment(3);
		$status = array('status' => '2');
		$model = $this->Usermodel->contractreject($get, $status);
		if ($model) {
			echo "<script>alert('Successfully Rejected')</script>";
			redirect('Welcome/admincontra', 'refresh');
		} else {
			echo "<script>alert('Rejection Unsuccessfull')</script>";
		}
	}
	public function companyreject()
	{
		$get = $this->uri->segment(3);
		$status = array('status' => '2');
		$model = $this->Usermodel->companyreject($get, $status);
		if ($model) {
			echo "<script>alert('Successfully Rejected')</script>";
			redirect('Welcome/admincomp', 'refresh');
		} else {
			echo "<script>alert('Rejection Unsuccessfull')</script>";
		}
	}
	public function login_program()
	{
		$this->load->helper('security');
		$id = $this->input->post('username');
		// echo $id;exit;
		$id1 = $this->input->post('password');
		// echo $id1;exit;
		if ($this->Usermodel->checklogin($id, $id1)) {
			$id2 = $this->Usermodel->getuserid($id);
			$alldetail = $this->Usermodel->getuserdetail($id2);
			$this->session->set_userdata(
				array(
					'userid' => $id2,
					'logined' => (bool) true,
					'usertype' => $alldetail->usertype,
					'status' => $alldetail->status
				)
			);
			if (
				isset($_SESSION['logined']) and ($_SESSION['logined'] === true)
				and ($_SESSION['usertype'] === '0') and ($_SESSION['status'] === '1')
			) {
				redirect('Welcome/admin', 'refresh');

			} else if (
				isset($_SESSION['logined']) and ($_SESSION['logined'] === true)
				and
				($_SESSION['usertype'] === '1') and ($_SESSION['status'] === '1')
			) {
				redirect('Welcome/companyhome', 'refresh');

			} else if (
				isset($_SESSION['logined']) and ($_SESSION['logined'] === true)
				and
				($_SESSION['usertype'] === '2') and ($_SESSION['status'] === '1')
			) {
				redirect('Welcome/contracthome', 'refresh');

			} else if (
				isset($_SESSION['logined']) and ($_SESSION['logined'] === true)
				and
				($_SESSION['usertype'] === '3') and ($_SESSION['status'] === '1')
			) {
				redirect('Welcome/user', 'refresh');

			} else {
				echo "<script>alert('Waiting for admin approval')</script>";
				redirect('Welcome/login', 'refresh');
			}
		} else {
			echo "<script>alert('email or password incorrect')</script>";
			redirect('Welcome/login', 'refresh');
		}
	}
// Existing CodeIgniter Controller...

public function google_login()
{
    // 1. Load the Configuration
    $this->config->load('google_oauth');
    
    // 2. Include Manual Autoloader
    require_once APPPATH . 'libraries/Google/src/autoload.php';

    // 3. Setup Client
    $client = new Google\Client();
    $client->setClientId($this->config->item('google_client_id'));
    $client->setClientSecret($this->config->item('google_client_secret'));
    $client->setRedirectUri($this->config->item('google_redirect_uri'));

    foreach ($this->config->item('google_scopes') as $scope) {
        $client->addScope($scope);
    }

    // 4. Generate State and Authorization URL
    $state = bin2hex(random_bytes(16));
    $this->session->set_userdata('oauth_state', $state); 
    
    $authUrl = $client->createAuthUrl() . '&state=' . $state; 

    // 5. Redirect to Google's sign-in page
    redirect($authUrl, 'refresh');
}

// Existing CodeIgniter Controller...

public function google_callback()
{
    // 1. Load the Configuration
    $this->config->load('google_oauth');
    
    // 2. Include Manual Autoloader
    require_once APPPATH . 'libraries/Google/src/autoload.php';

    // 3. Check for Code and State
    $code = $this->input->get('code');
    $state = $this->input->get('state');
    $session_state = $this->session->userdata('oauth_state');

    if (!$code || !$state || $state !== $session_state) {
        $this->session->unset_userdata('oauth_state');
        // Handle CSRF or error
        echo "<script>alert('Authentication error or invalid request.');</script>";
        redirect('Welcome/login', 'refresh');
        return;
    }
    $this->session->unset_userdata('oauth_state');

    // 4. Setup Client
    $client = new Google\Client();
    $client->setClientId($this->config->item('google_client_id'));
    $client->setClientSecret($this->config->item('google_client_secret'));
    $client->setRedirectUri($this->config->item('google_redirect_uri'));

    try {
        // 5. Exchange the code for tokens
        $client->fetchAccessTokenWithAuthCode($code);
        
        // 6. Fetch User Profile Data
        $oauth = new Google\Service\Oauth2($client);
        $user_info = $oauth->userinfo->get();
        
        $google_email = $user_info->email;
        $google_name = $user_info->name;
        // The ID token contains the unique Google ID: $user_info->id

        // 7. Core Login Logic (Integration with your existing system)
        
        // **a. Check if user exists in your database using $google_email**
        if ($this->Usermodel->check_google_user($google_email)) {
            // User exists, log them in
            $this->perform_google_login($google_email);
        } else {
            // **b. User is new, register them**
            // IMPORTANT: You need a model method to handle registration
            $new_user_id = $this->Usermodel->register_google_user($google_email, $google_name);
            
            // Log in the new user
            if ($new_user_id) {
                $this->perform_google_login($google_email);
            } else {
                 echo "<script>alert('Registration failed.');</script>";
                 redirect('Welcome/login', 'refresh');
            }
        }

    } catch (Exception $e) {
        // Log the error and show a generic message
        log_message('error', 'Google OAuth Error: ' . $e->getMessage());
        echo "<script>alert('Google sign-in failed. Please try again.');</script>";
        redirect('Welcome/login', 'refresh');
    }
}

// Existing CodeIgniter Controller...

private function perform_google_login($email)
{
    // This logic is adapted from your original login_program()
    $id2 = $this->Usermodel->getuserid_by_email($email); // **You'll need to create this method**
    
    if (!$id2) {
        echo "<script>alert('Account not found.');</script>";
        redirect('Welcome/login', 'refresh');
        return;
    }
    
    $alldetail = $this->Usermodel->getuserdetail($id2);

    $this->session->set_userdata(
        array(
            'userid' => $id2,
            'logined' => (bool) true,
            'usertype' => $alldetail->usertype,
            'status' => $alldetail->status
        )
    );
    
    // Use your existing redirection logic
    if (isset($_SESSION['logined']) and ($_SESSION['logined'] === true) and ($_SESSION['usertype'] === '0') and ($_SESSION['status'] === '1')) {
        redirect('Welcome/admin', 'refresh');
    } else if (isset($_SESSION['logined']) and ($_SESSION['logined'] === true) and ($_SESSION['usertype'] === '1') and ($_SESSION['status'] === '1')) {
        redirect('Welcome/companyhome', 'refresh');
    } else if (isset($_SESSION['logined']) and ($_SESSION['logined'] === true) and ($_SESSION['usertype'] === '2') and ($_SESSION['status'] === '1')) {
        redirect('Welcome/contracthome', 'refresh');
    } else if (isset($_SESSION['logined']) and ($_SESSION['logined'] === true) and ($_SESSION['usertype'] === '3') and ($_SESSION['status'] === '1')) {
        redirect('Welcome/user', 'refresh');
    } else {
        echo "<script>alert('Waiting for admin approval')</script>";
        redirect('Welcome/login', 'refresh');
    }
}
	public function news()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '0') 
		{
		// $data['dis']=$this->Usermodel->newsupdate();
		$this->load->view('newsupdate');
		$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login', 'refresh');
		}
	}
	public function addnews()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '0') 
		{
		$this->load->view('news');
		$this->load->view('footer');
		}
		else
		{
			redirect('Welcome/login', 'refresh');
		}
	}

	public function newsadd()
	{
		$date = date('Y-m-d');
		$data = array(
			'news' => $this->input->post('news'),
			'currentdate' => $date,
		);


		$result = $this->Usermodel->addnews($data);
		if ($result) {
			echo "<script>alert('News updated')</script>";
			redirect('Welcome/addnews', 'refresh');
		} else {
			echo "<script>alert('News not Updated')</script>";
		}
	}
	public function newstable()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '0') 
		{
		$data['dis'] = $this->Usermodel->newstable();
		$this->load->view('newstable', $data);
		}
		else
		{
			redirect('Welcome/login', 'refresh');
		}
	}
	public function newsview()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '0') 
		{
		$this->load->view('updatenews');
	}
	else
	{
		redirect('Welcome/login', 'refresh');
	}
	}
	public function newsupdation_dataview()
	{
        if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '0') 
		{
		$this->load->view('userheader');
		$data['id'] = $this->uri->segment(3);
		$id = $this->uri->segment(3);
		$data['views'] = $this->Usermodel->newsupdation_dataview($id);
		$this->load->view('editnews', $data);
		$this->load->view('footer');
	}
	else
	{
		redirect('Welcome/login', 'refresh');
	}
	}
	public function newsupdation()
	{
		// $pass=$this->input->post('password');
		// $newpassword=$this->Usermodel->hash_password($pass);
		$id = $this->input->post('hide');
		$date = date('Y-m-d');
		//   echo $id;exit;
		$data = array(
			'news' => $this->input->post('news'),
			'currentdate' => $date,
		);


		$result = $this->Usermodel->newsupdation($data, $id);
		//   $result1=$this->Usermodel->companyemailupdate($da,$id);
		if ($result) {
			echo "<script>alert('Updation sucessfull')</script>";
			redirect('Welcome/newstable', 'refresh');
		} else {
			echo "<script>alert('Updation unsucessfull')</script>";
		}

	}
	public function newsreject()
	{
		$get = $this->uri->segment(3);
		//   $status=array('status'=>'1');
		$model = $this->Usermodel->newsreject($get);
		if ($model) {
			echo "<script>alert('Successfully Rejected')</script>";
			redirect('Welcome/newstable', 'refresh');
		} else {
			echo "<script>alert('Rejection Unsuccessfull')</script>";
		}
	}
	public function newstableviews()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '3') 
		{
		$this->load->view('userheader');
		$data['dis'] = $this->Usermodel->newstableviews();
		$this->load->view('newstableview', $data);
		$this->load->view('footer');
		}
		else{
			redirect('Welcome/login', 'refresh');
		}
	}
	public function shipdetails()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '1') 
		{
		$this->load->view('companyheader');
		$this->load->view('shipdetailsadding');
		$this->load->view('footer');
	}
	else{
		redirect('Welcome/login', 'refresh');
	}

	}
	public function shipdetailsprocess()
	{
		$loginid = $this->session->userid;
		$data = array(
			'shipcategory' => $this->input->post('shipcategory'),
			'shipname' => $this->input->post('shipname'),
			'source' => $this->input->post('source'),
			'destination' => $this->input->post('destination'),
			'shipdetails' => $this->input->post('shipdetails'),
			'loginid' => $loginid

		);


		$result = $this->Usermodel->shipdetails($data);
		if ($result) {
			echo "<script>alert('Ship details added sucessfully')</script>";
			redirect('Welcome/companyhome', 'refresh');
		} else {
			echo "<script>alert('Ship details adding unsucessfull')</script>";
		}

	}
	public function shipview()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '1') 
		{
		$this->load->view('userheader');
		$id = $this->session->userid;
		$data['dis'] = $this->Usermodel->shipdetailsviews($id);
		$this->load->view('shipdetailsview', $data);
		$this->load->view('footer');
	}
	else{
		redirect('Welcome/login', 'refresh');
	}

	}
	public function ship_edit_view()
	{
		
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '1') 
		{
		$this->load->view('companyheader');
		$shipid = $this->uri->segment(3);
		$data['id'] = $this->uri->segment(3);
		$data['dis'] = $this->Usermodel->shipupdation_dataview($shipid);
		$this->load->view('shipedit', $data);
		$this->load->view('footer');
	}
	else{
		redirect('Welcome/login', 'refresh');
	}

	}
	public function shipupdation()
	{

		$id = $this->input->post('hide');
		//   $loginid=$this->session->userid;
		$data = array(
			'shipcategory' => $this->input->post('shipcategory'),
			'shipname' => $this->input->post('shipname'),
			'source' => $this->input->post('source'),
			'destination' => $this->input->post('destination'),
			'shipdetails' => $this->input->post('shipdetails')
		);


		$result = $this->Usermodel->shipupdation($data, $id);

		if ($result) {
			echo "<script>alert('Updation successfull')</script>";
			redirect('Welcome/companyhome', 'refresh');
		} else {
			echo "<script>alert('Updation unsuccessfull')</script>";
		}

	}
	public function ship_delete()
	{
		$get = $this->uri->segment(3);
		//   $status=array('status'=>'1');
		$model = $this->Usermodel->shipdelete($get);
		if ($model) {
			echo "<script>alert('Successfully Rejected')</script>";
			redirect('Welcome/companyhome', 'refresh');
		} else {
			echo "<script>alert('Rejection Unsuccessfull')</script>";
		}
	}
	public function ship_public_view()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '3') 
		{
		$data['dis'] = $this->Usermodel->shippublic();
		$this->load->view('shippublicview', $data);
	}
	else{
		redirect('Welcome/login', 'refresh');
	}
	}
	public function exports()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '3') 
		{
		$this->load->view('userheader');
		$get['shipid'] = $this->uri->segment(3);
		$get['category'] = $this->Usermodel->getcategory();
		$this->load->view('exportdetails', $get);
		$this->load->view('footer');
	}
	else{
		redirect('Welcome/login', 'refresh');
	}
	}
	public function shipexportprocess()
	{
		$loginid = $this->session->userid;
		$shipid = $this->input->post('hide');
		$category = $this->input->post('productcategory');
		$quantity = $this->input->post('productquantity');
		$priceofitem = $this->Usermodel->getpriceofitem($category);
		$taxofitem = $this->Usermodel->gettaxofitem($category);
		$totalamount = $quantity * $priceofitem * $taxofitem;
		// echo $totalamount;exit;
		$data = array(
			'productcategory' => $this->input->post('productcategory'),
			'productname' => $this->input->post('productname'),
			'productquantity' => $quantity,
			'source' => $this->input->post('source'),
			'destination' => $this->input->post('destination'),
			'date' => $this->input->post('date'),
			'recepientname' => $this->input->post('recepientname'),
			'recepientaddress' => $this->input->post('recepientaddress'),
			'recepientcontact' => $this->input->post('recepientcontact'),
			'loginid' => $loginid,
			'shipid' => $shipid,
		);
		// print_r($data);exit;
		$result = $this->Usermodel->exports($data);

		if ($result) {
			echo "<script>alert('Ship  export details added sucessfully')</script>";
			redirect('Welcome/payment/' . $loginid . '/' . $totalamount);
		} else {
			echo "<script>alert('Ship expot details adding unsucessfull')</script>";
		}
	}
	public function shipexportview()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '3') 
		{
		$this->load->view('userheader');
		$search = $this->input->post('search');
		// $check=$this->Usermodel->search();
		$get = $this->uri->segment(3);
		$data['dis'] = $this->Usermodel->shipexportviews($search);
		if (empty($data['data'])) {
			$data['search_message'] = 'No results found !!! .';
		}
		$this->load->view('shipexportview', $data);
		$this->load->view('footer');
	}
	else{
		redirect('Welcome/login', 'refresh');
	}
	}
	public function shipexportedit_view()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '3') 
		{
		$this->load->view('userheader');
		$shipid = $this->uri->segment(3);
		$data['id'] = $this->uri->segment(3);
		$data['dis'] = $this->Usermodel->exportupdation_dataview($shipid);
		$this->load->view('shipexportedit', $data);
		$this->load->view('footer');
	}
	else{
		redirect('Welcome/login', 'refresh');
	}
	}
	public function exportupdation()
	{

		$id = $this->input->post('hide');
		//   $loginid=$this->session->userid;
		$data = array(
			'shipcategory' => $this->input->post('shipcategory'),
			'shipname' => $this->input->post('shipname'),
			'source' => $this->input->post('source'),
			'destination' => $this->input->post('destination'),
			'shipdetails' => $this->input->post('shipdetails'),
		);


		$result = $this->Usermodel->exportupdation($data, $id);

		if ($result) {
			echo "<script>alert('Updation successfull')</script>";
			redirect('Welcome/user', 'refresh');
		} else {
			echo "<script>alert('Updation unsuccessfull')</script>";
		}

	}
	public function export_delete()
	{
		$get = $this->uri->segment(3);
		//   $status=array('status'=>'1');
		$model = $this->Usermodel->exportdelete($get);
		if ($model) {
			echo "<script>alert('Successfully Cancelled')</script>";
			redirect('Welcome/user', 'refresh');
		} else {
			echo "<script>alert('Cancellation Unsuccessfull')</script>";
		}
	}
	public function exportdetailsview()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '3') 
		{
		$this->load->view('companyheader');
		$id = $this->session->userid;
		$data['dis'] = $this->Usermodel->exportdetailsview($id);
		$this->load->view('exportdetailsview', $data);
		$this->load->view('footer');
	}
	else{
		redirect('Welcome/login', 'refresh');
	}
	}

	public function exportingchannel()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '1') 
		{
		$this->load->view('companyheader');
		$this->load->view('exportingchannel');
		$this->load->view('footer');
	}
	else{
		redirect('Welcome/login', 'refresh');
	}
	}
	public function exportchannel()
	{
		$loginid = $this->session->userid;
		$data = array(
			'productcategory' => $this->input->post('productcategory'),
			'product_subcategory' => $this->input->post('product_subcategory'),
			'productname' => $this->input->post('productname'),
			'companyname' => $this->input->post('companyname'),
			'exportingcharge' => $this->input->post('exportingcharge'),
			'taxamount' => $this->input->post('taxamount'),
			//   'loginid'=>$loginid

		);


		$result = $this->Usermodel->exportingchannel($data);
		if ($result) {
			echo "<script>alert('exporting channel details added sucessfully')</script>";
			redirect('Welcome/admin', 'refresh');
		} else {
			echo "<script>alert('exporting channel details adding is unsucessfull')</script>";
		}


	}
	// public function payment()
	// {
	// 	$data['loginid'] = $this->uri->segment(3);
	public function payment()
    {
        $data['loginid'] = $this->uri->segment(3);
        $data['amount'] = $this->uri->segment(4);
        $this->load->view('payment', $data);
    }

    /**
     * Process payment using SVM
     */
    public function process_payment() {
        // Get form data
        $card_number = $this->input->post('card_number');
        $expiry_date = $this->input->post('expiry_date');
        $cvv = $this->input->post('cvv');
        $amount = $this->input->post('amount');
        $loginid = $this->input->post('loginid');
        $card_holder = $this->input->post('card_holder');

        // Basic validation
        if (empty($card_number) || empty($expiry_date) || empty($cvv) || empty($amount) || empty($loginid)) {
            $this->session->set_flashdata('error', 'All fields are required');
            redirect('welcome/payment_failed');
            return;
        }

        // Process payment (in a real app, this would be a call to a payment gateway)
        // For demo purposes, we'll just generate a random success/failure
        $success = (rand(1, 10) > 3); // 70% success rate for demo

        if ($success) {
            // Generate a fake transaction ID
            $transaction_id = 'TXN' . strtoupper(uniqid());
            
            // Here you would typically save the payment details to your database
            // For example:
            // $payment_data = array(
            //     'user_id' => $loginid,
            //     'amount' => $amount,
            //     'transaction_id' => $transaction_id,
            //     'payment_method' => 'card',
            //     'status' => 'completed',
            //     'created_at' => date('Y-m-d H:i:s')
            // );
            // $this->db->insert('payments', $payment_data);
            
            $this->session->set_flashdata('amount', $amount);
            $this->session->set_flashdata('transaction_id', $transaction_id);
            redirect('welcome/payment_success');
        } else {
            $this->session->set_flashdata('error', 'Payment declined. Please check your card details and try again.');
            redirect('welcome/payment_failed');
        }
        // Mock response
        return [
            'success' => true,
            'transaction_id' => 'txn_' . bin2hex(random_bytes(8)),
            'amount' => $payment_data['amount'],
            'currency' => $payment_data['currency'],
            'status' => 'succeeded',
            'timestamp' => time()
        ];
        
        /*
        // Example of how to implement with a real payment processor (e.g., Stripe)
        try {
            \Stripe\Stripe::setApiKey('your_secret_key_here');
            
            $payment_intent = \Stripe\PaymentIntent::create([
                'amount' => $payment_data['amount'] * 100, // Convert to cents
                'currency' => $payment_data['currency'],
                'payment_method' => $payment_data['payment_method_id'],
                'confirmation_method' => 'manual',
                'confirm' => true,
                'metadata' => $payment_data['metadata']
            ]);
            
            return [
                'success' => true,
                'transaction_id' => $payment_intent->id,
                'amount' => $payment_data['amount'],
                'currency' => $payment_data['currency'],
                'status' => $payment_intent->status
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
        */
    }
    
    /**
     * Payment success page
     */
    public function payment_success() {
        $data['amount'] = $this->session->flashdata('amount');
        $data['transaction_id'] = $this->session->flashdata('transaction_id');
        $this->load->view('payment_success', $data);
    }
    
    /**
     * Payment failed page
     */
    public function payment_failed() {
        $data['error'] = $this->session->flashdata('error');
        $this->load->view('payment_failed', $data);
    }
    
    /**
     * Generate SVM token (for client-side use)
     */
    public function generate_svm_token() {
        // In a real implementation, you would call your payment processor's API
        // to generate a client token or setup intent
        $response = [
            'status' => 'success',
            'token' => 'svm_' . bin2hex(random_bytes(16)),
            'timestamp' => time(),
            'expires_in' => 3600 // 1 hour
        ];
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
    public function insertpayment()
	{
		$id = $this->session->userid;
		$loginid = $this->input->post('loginid');
		$amount = $this->input->post('amount');
		// echo $amount;exit;
		$cardno = $this->input->post('cardno');
		$cvv = $this->input->post('cvv');
		$totalamount = $this->Usermodel->gettotalamountbank($cardno, $cvv);
		$balanceamount = $totalamount - $amount;
		$date = date('Y-m-d');
		$data = array(
			'noc' => $this->input->post('noc'),
			'cardno' => $this->input->post('cardno'),
			'cvv' => $this->input->post('cvv'),
			'expiredate' => $this->input->post('expiredate'),
			'totalamount' => $amount,
			'currentdate' => $date,
			'loginid' => $loginid
		);
		$updatebankamount = array('amount' => $balanceamount);
		$paystatus = array('paystatus' => '1');

		$result = $this->Usermodel->insertpayment($data);
		$result1 = $this->Usermodel->updatebalance($cardno, $cvv, $updatebankamount);
		$result2 = $this->Usermodel->updatepaystatus($paystatus, $result);
		if ($result && $result1 && $result2) {
			echo "<script>alert('Payment Successful')</script>";
			redirect('Welcome/payment', 'refresh');
		} else {
			echo "<script>alert('News not Updated')</script>";
		}
	}
	public function userexport()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '3') 
		{
		$this->load->view('userheader');
		$id = $this->session->userid;
		$data['dis'] = $this->Usermodel->userexport($id);
		$this->load->view('userexportview', $data);
		$this->load->view('footer');
	}
	else{
		redirect('Welcome/login', 'refresh');
	}
	}

  public function jobrecommendations()
  {
    if (!(isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '3')) {
      redirect('Welcome/login', 'refresh');
      return;
    }
    $this->load->model('Job_model');
    $user_id = $this->session->userid;
    $data['user'] = $this->Job_model->get_user($user_id);
    $data['recommended_jobs'] = $this->Job_model->recommend_jobs($user_id, 3);
    $data['k'] = 3;
    $this->load->view('job_recommendation_view', $data);
  }
	public function cancelstatus()
	{
		$shipid = $this->uri->segment(3);
		$status = array('cancel_status' => '1');
		$result = $this->Usermodel->cancelstatus($shipid, $status);
		if ($result) {
			echo "<script>alert('cancelled')</script>";
			redirect('Welcome/userexport', 'refresh');
		} else {
			echo "<script>alert('not cancelled')</script>";
			redirect('Welcome/userexport', 'refresh');
		}
	}
	public function shiporders()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '1') 
		{
		$this->load->view('companyheader');
		$id = $this->uri->segment(3);
		// $data['id']=$this->session->id;
		$data['dis'] = $this->Usermodel->shiporders($id);
		$this->load->view('shiporders', $data);
		$this->load->view('footer');
	}
	else{
		redirect('Welcome/login', 'refresh');
	}
	}
	public function complaints()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '3') 
		{
		$get['shipid'] = $this->uri->segment(3);
		$get['exportid'] = $this->uri->segment(4);
		$this->load->view('userheader');
		$this->load->view('complaints', $get);
		$this->load->view('footer');
	}
	else{
		redirect('Welcome/login', 'refresh');
	}
	}
	public function complaint()
	{
		$loginid = $this->session->userid;
		$shipid = $this->input->post('hide');
		$exportid = $this->input->post('exportid');
		//   echo $shipid;exit;
		$data = array(
			'subject' => $this->input->post('subject'),
			'complaints' => $this->input->post('complaints'),
			'image' => $this->input->post('image'),
			'loginid' => $loginid,
			'shipid' => $shipid,
			'exportid' => $exportid
		);
		$result = $this->Usermodel->complaints($data);
		if ($result) {
			echo "<script>alert('Complaints added sucessfully')</script>";
			redirect('Welcome/user', 'refresh');
		} else {
			echo "<script>alert('Complaints adding unsucessfull')</script>";
		}

	}
	public function complaintsview()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '1') 
		{
		$this->load->view('companyheader');
		$shipid = $this->uri->segment(3);
		$data['dis'] = $this->Usermodel->complaintsview($shipid);
		$this->load->view('complaintsview', $data);
		$this->load->view('footer');
	}
	else{
		redirect('Welcome/login', 'refresh');
	}
	}

	public function refunds()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '3') 
		{
		$get['shipid'] = $this->uri->segment(3);
		$get['exportid'] = $this->uri->segment(4);
		$this->load->view('companyheader');
		$this->load->view('refund', $get);
		$this->load->view('footer');
	}
	else{
		redirect('Welcome/login', 'refresh');
	}
	}

	public function refund_process()
	{
		$compalaintid = $this->input->post('hide');
		$exportid = $this->input->post('export');
		$refundamount = $this->input->post('refundamount');
		if ($refundamount) {
			echo "<script>alert('Redirecting to payment')</script>";
			redirect('Welcome/refund_payment/' . $compalaintid . '/' . $exportid . '/' . $refundamount);
		} else {
			echo "<script>alert('Complaints adding unsucessfull')</script>";
		}
	}

	public function refund_payment()
	{
		$data['complaintid'] = $this->uri->segment(3);
		$data['exportid'] = $this->uri->segment(4);
		$data['amount'] = $this->uri->segment(5);
		$this->load->view('refundpayment', $data);
	}

	public function refund_payment_process()
	{
		$userid = $this->session->userid;
		$complaintid = $this->input->post('complaintid');
		$refundamount = $this->input->post('amount');
		$exportid = $this->input->post('exportid');
		$cardno = $this->input->post('cardno');
		$cvv = $this->input->post('cvv');
		$totalamount = $this->Usermodel->gettotalamountbank($cardno, $cvv);
		$balanceamount = $totalamount - $refundamount;
		// echo $balanceamount;exit;
		$date = date('Y-m-d');
		$data = array(
			'noc' => $this->input->post('noc'),
			'cardno' => $this->input->post('cardno'),
			'cvv' => $this->input->post('cvv'),
			'expiredate' => $this->input->post('expiredate'),
			'totalamount' => $refundamount,
			'currentdate' => $date,
			'loginid' => $userid
		);
		$updatebankamount = array('amount' => $balanceamount);

		$contactnouser = $this->Usermodel->getcontactno($exportid);
		$totalamountcredit = $this->Usermodel->gettotalamountcredit($contactnouser);
		$credit_amount = $totalamountcredit + $refundamount;
		// echo $credit_amount;exit;
		$refund_status = array('refund_status' => '1');
		
		$credit_amount_update = array('amount' => $credit_amount);

		$result = $this->Usermodel->insertpayment($data);
		$result1 = $this->Usermodel->updatebalance($cardno, $cvv, $updatebankamount);
		$result2 = $this->Usermodel->updatecreditbank($contactnouser, $credit_amount_update);
		$result3 = $this->Usermodel->updaterefundstatus($refund_status, $complaintid);
		if ($result && $result1 && $result2  && $result3 ) {
			echo "<script>alert('Payment Successful')</script>";
			redirect('Welcome/payment', 'refresh');
		} else {
			echo "<script>alert('News not Updated')</script>";
		}
	}
	public function tenderadding()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '2') 
		{
		$this->load->view('companyheader');
		$this->load->view('tender');
		$this->load->view('footer');
	}
	else{
		redirect('Welcome/login', 'refresh');
	}

	}
	public function admintenders()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '0') 
		{
		$this->load->view('admintenderpost');
	}
	else{
		redirect('Welcome/login', 'refresh');
	}
	}

	public function tender()
	{
		$date = date('Y-m-d');
		$data = array(
			'tendercategory' => $this->input->post('tendercategory'),
			'tendername' => $this->input->post('tendername'),
			'tenderdetails' => $this->input->post('tenderdetails'),
			'amount' => $this->input->post('amount'),
			'lastdate' => $this->input->post('lastdate'),
			'date' => $date,
		);


		$result = $this->Usermodel->admintenders($data);

		if ($result) {
			echo "<script>alert('tender added successfully')</script>";
			redirect('Welcome/admin', 'refresh');
		} else {
			echo "<script>alert('tender adding unsuccessfull')</script>";
		}

	}


	public function tenderviews()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '0') 
		{
		// $this->load->view('userheader');
		$data['dis'] = $this->Usermodel->tenderview();
		$this->load->view('tenderadminview', $data);
		// $this->load->view('footer');
	}
	else{
		redirect('Welcome/login', 'refresh');
	}
	}
	
	public function tenderupdatepage()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '0') 
		{
		$id = $this->uri->segment(3);
		$data['id'] = $this->uri->segment(3);
		$data['dis']=$this->Usermodel->tenderupdation_view($id);
		$this->load->view('tenderadminedit', $data);
	}
	else{
		redirect('Welcome/login', 'refresh');
	}
	}

	public function tenderupdations()
	{

		$id = $this->input->post('hide');
		$data = array(
			'tendercategory' => $this->input->post('tendercategory'),
			'tendername' => $this->input->post('tendername'),
			'tenderdetails' => $this->input->post('tenderdetails'),
			'amount' => $this->input->post('amount'),
			'lastdate' => $this->input->post('lastdate'),
			'date' => $this->input->post('date'),
		);


		$result = $this->Usermodel->tenderupdation($data, $id);

		if ($result) {
			echo "<script>alert('Updation successfull')</script>";
			redirect('Welcome/admin', 'refresh');
		} else {
			echo "<script>alert('Updation unsuccessfull')</script>";
		}

	}

	public function tender_delete()
	{
		$get = $this->uri->segment(3);
		$model = $this->Usermodel->tenderdelete($get);
		if ($model) {
			echo "<script>alert(' Tender Successfully Cancelled')</script>";
			redirect('Welcome/admin', 'refresh');
		} else {
			echo "<script>alert(' Tender Cancellation Unsuccessfull')</script>";
		}
	}

	public function tendercontractviews()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '2') 
		{
		$id = $this->uri->segment(3);
		$this->load->view('contractorheader');
		// $this->load->view('tendercontractview');
		$data['dis']=$this->Usermodel->tendercontractview($id);
		$this->load->view('tendercontractview',$data);
		$this->load->view('footer');
	}
	else{
		redirect('Welcome/login', 'refresh');
	}

	}

	public function tenderapplynow()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '2') 
		{
		$this->load->view('contractorheader');
		$tenderid['tid']=$this->uri->segment(3);
		$this->load->view('tenderapplynow', $tenderid);
		$this->load->view('footer');
	}
	else{
		redirect('Welcome/login', 'refresh');
	}
	}

	public function tenderapplynow1()
	{
		$id = $this->input->post('hide');
		$loginid = $this->session->userid;
		$date= date('Y-m-d H:i:s');
		$data = array(
			'contract_loginid' => $loginid,
			'tenderid' => $id,
			'amount' => $this->input->post('amount'),
			'currentdate' => $date,

		);


		$result = $this->Usermodel->tenderapplynow_1($data,$id);
		if ($result) {
			echo "<script>alert('tender amount added sucessfully')</script>";
			redirect('Welcome/contracthome', 'refresh');
		} else {
			echo "<script>alert('tender amount addedd unsucessfull')</script>";
		}

	}

	public function tenderviewapply()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '0') 
		{
		// $this->load->view('companyheader');
		$data['dis'] = $this->Usermodel->tenderapplynow1();
		$this->load->view('tenderapplyview', $data);
		$this->load->view('footer');
	}
	else{
		redirect('Welcome/login', 'refresh');
	}
	}

	public function tenderapproval()
	{
		$get = $this->uri->segment(3);
		// echo $get;exit;
		$status = array('approve_status' => '1');
		$model = $this->Usermodel->tenderapprove($get,$status);
		if ($model) {
			echo "<script>alert('Approval success')</script>";
			redirect('Welcome/tenderviewapply', 'refresh');
		} else {
			echo "<script>alert('Approval unsuccessfull')</script>";
		}
	}

	public function tenderapprovedview()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '2') 
		{
		$this->load->view('contractorheader');
		$data['dis'] = $this->Usermodel->tenderapproveview1();
		$this->load->view('tenderapproved', $data);
		$this->load->view('footer');
	}
	else{
		redirect('Welcome/login', 'refresh');
	}
	}

	public function jobss()
	{
		// if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '3') 
		// {
		$this->load->view('companyheader');
		$this->load->view('job');
		$this->load->view('footer');
	// }
	// else{
	// 	redirect('Welcome/login', 'refresh');
	// }
	}

	public function jobdetails()
	{
		$date = date('Y-m-d');
		$loginid = $this->session->userid;
		$data = array(
			'jobcategory' => $this->input->post('jobcategory'),
			'jobname' => $this->input->post('jobname'),
			'jobdetails' => $this->input->post('jobdetails'),
			'qualification' => $this->input->post('qualification'),
			'lastdateforapply' => $this->input->post('lastdateforapply'),
			'loginid' => $loginid,
			'currentdate' =>$date,


		);


		$result = $this->Usermodel->job($data);
		if ($result) {
			echo "<script>alert('Job details added sucessfully')</script>";
			redirect('Welcome/companyhome', 'refresh');
		} else {
			echo "<script>alert('Job details adding unsucessfull')</script>";
		}
}
public function jobviews()
{
	if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '3') 
		{
	$this->load->view('userheader');
	$data['dis'] = $this->Usermodel->jobview();
	$this->load->view('jobviewuser', $data);
	$this->load->view('footer');
}
else{
	redirect('Welcome/login', 'refresh');
}
}

public function jobedit_view()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '0') 
		{
		$this->load->view('userheader');
		$jobid = $this->uri->segment(3);
		$data['jobid'] = $this->uri->segment(3);
		$data['dis'] = $this->Usermodel->jobedit_dataview($jobid);
		$this->load->view('jobedit', $data);
		$this->load->view('footer');
	}
	else{
		redirect('Welcome/login', 'refresh');
	}
	}

public function jobupdations()
	{

		$id = $this->input->post('hide');
		//   $loginid=$this->session->userid;
		$data = array(
			'jobcategory' => $this->input->post('jobcategory'),
			'jobname' => $this->input->post('jobname'),
			'jobdetails' => $this->input->post('jobdetails'),
			'qualification' => $this->input->post('qualification'),
			'lastdateforapply' => $this->input->post('lastdateforapply'),
		);


		$result = $this->Usermodel->jobupdation($data, $id);

		if ($result) {
			echo "<script>alert(' Job Updation successfull')</script>";
			redirect('Welcome/admin', 'refresh');
		} else {
			echo "<script>alert('Job Updation unsuccessfull')</script>";
		}

	}
	public function jobdelete()
	{
		$get = $this->uri->segment(3);
		$model = $this->Usermodel->job_delete($get);
		if ($model) {
			echo "<script>alert('Successfully Rejected')</script>";
			redirect('Welcome/admin', 'refresh');
		} else {
			echo "<script>alert('Rejection Unsuccessfull')</script>";
		}
	}

	public function jobupdation_comview()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '3') 
		{
		$this->load->view('userheader');
		$jobid = $this->uri->segment(3);
		$data['jobid'] = $this->uri->segment(3);
		$data['dis'] = $this->Usermodel->jobedit_companyview($jobid);
		$this->load->view('jobeditcompany', $data);
		$this->load->view('footer');
	}
	else{
		redirect('Welcome/login', 'refresh');
	}
	}

	public function jobupdationscompany()
	{

		$id = $this->input->post('hide');
		//   $loginid=$this->session->userid;
		$data = array(
			'jobcategory' => $this->input->post('jobcategory'),
			'jobname' => $this->input->post('jobname'),
			'jobdetails' => $this->input->post('jobdetails'),
			'qualification' => $this->input->post('qualification'),
			'lastdateforapply' => $this->input->post('lastdateforapply'),
		);


		$result = $this->Usermodel->jobupdations($data,$id);

		if ($result) {
			echo "<script>alert(' Job Updation successfull')</script>";
			redirect('Welcome/companyhome', 'refresh');
		} else {
			echo "<script>alert('Job Updation unsuccessfull')</script>";
		}

	}

	public function jobdeletecompany()
	{
		$get = $this->uri->segment(3);
		$model = $this->Usermodel->jobdeletecom($get);
		if ($model) {
			echo "<script>alert('Successfully Rejected')</script>";
			redirect('Welcome/companyhome', 'refresh');
		} else {
			echo "<script>alert('Rejection Unsuccessfull')</script>";
		}
	}

	public function jobviewadmin1()
{
	if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '0') 
		{
	// $this->load->view('userheader');
	$data['dis'] = $this->Usermodel->jobviewadmins();
	$this->load->view('jobviewadmin', $data);
	// $this->load->view('footer');
}
else{
	redirect('Welcome/login', 'refresh');
}
}

	public function jobapplynow()
	{
		$jobid = $this->uri->segment(3);
		$loginid = $this->session->userid;

		// Server-side: handle PDF CV upload
		$description = $this->input->post('description');
		$cvUploaded = false;
		$uploadError = '';

		if (!empty($_FILES['cv']['name'])) {
			$targetDir = FCPATH . 'uploads/cv/' . $loginid . '/' . $jobid . '/';
			if (!is_dir($targetDir)) {
				@mkdir($targetDir, 0755, true);
			}

			$config = array();
			$config['upload_path']      = $targetDir;
			$config['allowed_types']    = 'pdf';
			$config['max_size']         = 2048; // 2MB
			$config['file_ext_tolower'] = true;
			$config['detect_mime']      = true;
			$config['overwrite']        = false;
			$config['file_name']        = 'cv_' . $loginid . '_' . $jobid . '_' . time();

			$this->load->library('upload');
			$this->upload->initialize($config);

			if ($this->upload->do_upload('cv')) {
				$cvUploaded = true;
			} else {
				$uploadError = $this->upload->display_errors('', '');
			}
		} else {
			$uploadError = 'CV file is required and must be a PDF.';
		}

		if (!$cvUploaded) {
			echo "<script>alert('" . addslashes($uploadError) . "');</script>";
			redirect('Welcome/jobviewscompany', 'refresh');
			return;
		}

		$date = date('Y-m-d H:i:s');
		$data = array(
			'jobid'   => $jobid,
			'loginid' => $loginid,
			'date'    => $date,
			// If your table has these columns, you can uncomment and use them:
			// 'cv_path' => 'uploads/cv/' . $loginid . '/' . $jobid . '/' . $this->upload->data('file_name'),
			// 'description' => $description,
		);

		$result = $this->Usermodel->jobapplynow_1($data, $jobid);
		if ($result) {
			echo "<script>alert('Job applied successfully with CV uploaded.')</script>";
			redirect('Welcome/companyhome', 'refresh');
		} else {
			echo "<script>alert('Job apply is unsuccessful')</script>";
		}

	}

	public function jobviewscompany()
{
	if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '1') 
		{
	$this->load->view('companyheader');
	$data['dis'] = $this->Usermodel->jobview();
	$this->load->view('jobviewcompany', $data);
	$this->load->view('footer');
}
else{
	redirect('Welcome/login', 'refresh');
}
}

	public function interviewform()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '1') 
		{
		$this->load->view('companyheader');
		$data['id'] = $this->uri->segment(3);
		$this->load->view('interviewform', $data);
		$this->load->view('footer');
	}
	else{
		redirect('Welcome/login', 'refresh');
	}
	}

	public function interview()
	{
		$id = $this->input->post('hide');
		$date= date('Y-m-d H:i:s');
		$data = array(
			'jobapplyid' =>$id,
			'interview_date' => $this->input->post('interview_date'),
			'time' => $this->input->post('time'),
			'venue' => $this->input->post('venue'),
			'currentdate'=> $date,

		);


		$result = $this->Usermodel->interview1($data,$id);
		if ($result) {
			echo "<script>alert('Interview details added sucessfully')</script>";
			redirect('Welcome/companyhome', 'refresh');
		} else {
			echo "<script>alert('Interview details adding unsucessfull')</script>";
		}

	}

	public function candidateapplyview()
	{
		if (isset($_SESSION['logined']) && $_SESSION['logined'] === true && $_SESSION['usertype'] === '3') 
		{
		$this->load->view('companyheader');
		$id = $this->uri->segment(3);
		$data['dis'] = $this->Usermodel->candidateapplyview1($id);
		$this->load->view('candidateapplyview', $data);
		$this->load->view('footer');
	}
	else{
		redirect('Welcome/login', 'refresh');
	}
	}

	public function indexhome()
	{
		$this->load->view('indexpage');	
	}

	public function logout()
    {
      $data = new stdClass();
        if (isset($_SESSION['logined']) && $_SESSION['logined'] === true) {
          foreach ($_SESSION as $key => $value) {
            unset($_SESSION[$key]);
          }
          $this->session->set_flashdata('logout_notification', 'logged_out');
          redirect('Welcome/indexhome', 'refresh');
    } else {
          redirect('Welcome/login' , 'refresh');

        }
    }

	// public function google_login()
	// {
	// 	$this->load->helper('url');
	// 	header('Content-Type: application/json');

	// 	$input = json_decode(file_get_contents('php://input'), true);
	// 	$idToken = $input['idToken'] ?? null;

	// 	if (!$idToken) {
	// 		echo json_encode(['success' => false, 'message' => 'ID token missing']);
	// 		return;
	// 	}

	// 	// For production, you should verify the ID token using Firebase Admin SDK
	// 	// For now, we'll decode the JWT to get user info (basic implementation)
	// 	$tokenParts = explode('.', $idToken);
	// 	if (count($tokenParts) !== 3) {
	// 		echo json_encode(['success' => false, 'message' => 'Invalid token']);
	// 		return;
	// 	}

	// 	$payload = json_decode(base64_decode(str_replace(['-', '_'], ['+', '/'], $tokenParts[1])), true);
	// 	if (!$payload) {
	// 		echo json_encode(['success' => false, 'message' => 'Invalid token payload']);
	// 		return;
	// 	}

	// 	$email = $payload['email'] ?? null;
	// 	$name = $payload['name'] ?? null;
	// 	$googleId = $payload['sub'] ?? null;

	// 	if (!$email) {
	// 		echo json_encode(['success' => false, 'message' => 'Email not found in token']);
	// 		return;
	// 	}

	// 	// Check if user exists in database
	// 	$user = $this->Usermodel->get_user_by_email($email);

	// 	if ($user) {
	// 		// User exists, log them in
	// 		$this->session->set_userdata([
	// 			'userid' => $user->loginid,
	// 			'logined' => true,
	// 			'usertype' => $user->usertype,
	// 			'status' => $user->status,
	// 			'google_login' => true
	// 		]);

	// 		$redirectUrl = $this->get_redirect_url($user->usertype);
	// 		echo json_encode(['success' => true, 'redirectUrl' => $redirectUrl]);
	// 	} else {
	// 		// User doesn't exist, you might want to create them or redirect to registration
	// 		// For now, we'll create a basic user account
	// 		$defaultPassword = 'google_' . rand(1000, 9999); // Temporary password
	// 		$hashedPassword = $this->Usermodel->hash_password($defaultPassword);

	// 		$userData = [
	// 			'email' => $email,
	// 			'password' => $hashedPassword,
	// 			'usertype' => '3', // Default to public user
	// 			'status' => '1' // Active
	// 		];

	// 		$loginId = $this->Usermodel->create_google_user($userData, $name);

	// 		if ($loginId) {
	// 			$this->session->set_userdata([
	// 				'userid' => $loginId,
	// 				'logined' => true,
	// 				'usertype' => '3',
	// 				'status' => '1',
	// 				'google_login' => true
	// 			]);

	// 			$redirectUrl = $this->get_redirect_url('3');
	// 			echo json_encode(['success' => true, 'redirectUrl' => $redirectUrl]);
	// 		} else {
	// 			echo json_encode(['success' => false, 'message' => 'Failed to create user account']);
	// 		}
	// 	}
	// }

	// private function get_redirect_url($usertype)
	// {
	// 	switch ($usertype) {
	// 		case '0': return base_url('Welcome/admin');
	// 		case '1': return base_url('Welcome/companyhome');
	// 		case '2': return base_url('Welcome/contracthome');
	// 		case '3': return base_url('Welcome/user');
	// 		default: return base_url('Welcome/login');
	// 	}
	// }

	



	
}





