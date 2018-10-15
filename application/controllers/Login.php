<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->suser = $this->sg->sessionUser();
		$this->url = base_url().'login/';
		$m = $this->router->fetch_method();
	}

	public function login(){
		if(!$this->suser->login){
			$this->load->view('front/login');
		}
		else
			redirect(base_url());
	}

	public function logout(){
		unset($_SESSION['user']);
		redirect($this->url);
	}

	public function checklogin(){

		$username=$this->input->post('email');
		$password=$this->input->post('password');

		if($username!="" && $password!="") {	
			$password = md5($password);
			$query="select * from user where uname='".$username."' and password='".$password."' ";
			$users=$this->Model->get($query);
			$rows=$this->Model->count($query);
			if($rows > 0){
				if($users[0]->user_type == '0' || $users[0]->activated == '1'){
					$this->session->set_userdata('user',$users[0]->id);
					$this->session->set_flashdata('flash', 'Logged in Successfully');
					$this->session->set_flashdata('flashtype', 'success');
					redirect(base_url());
				}else{
					$this->session->set_flashdata('flash', 'Your Account still does\'nt activated.');
					$this->session->set_flashdata('flashtype', 'error');
					$this->session->set_flashdata('front_username', $username);
					redirect($this->url);
				}
			}else{	
				$this->session->set_flashdata('flash', 'Invalid RollNo/Password.');
				$this->session->set_flashdata('flashtype', 'error');
				$this->session->set_flashdata('front_username', $username);
				redirect($this->url);
			}
		}else{
			$this->session->set_flashdata('flash', 'Invalid RollNo/Password.');
			$this->session->set_flashdata('flashtype', 'error');
			$this->session->set_flashdata('front_username', $username);
			redirect($this->url);
		}
	}

	public function check_rno(){
		if($this->input->is_ajax_request()){
			$id = $this->sg->_en_urlid($this->input->post('id'), '1');
			if($this->sg->RollnoExist($this->input->post('rno'), $id))
				echo "1";
			else
				echo "0";
		}
	}

	public function signup(){
		if($this->suser->login)
			redirect(base_url());

		if(empty($_POST)){
			$batch = $this->sg->get('select * from batch');
			$d['batchs'] = !empty($batch) ? $batch : array();
			$this->load->view('front/signup', $d);
		}
		else{
			$inps = array(
				'name'			=> $this->input->post('fname'),
				'lname'			=> $this->input->post('lname'),
				'uname'			=> $this->input->post('uname'),
				'email'			=> $this->input->post('email'),
				'password'		=> md5($this->input->post('password')),
				'created_at'	=> $this->sg->created_atDate(),
				'batch_id'		=> $this->input->post('batch')
			);

			if($this->sg->getsettings()->stud_approve == '1')
				$inps['activated'] = '1';

			if($this->input->post('password') != $this->input->post('cpassword')){
				$this->session->set_flashdata('flash', 'Password Does\'nt be Same.');
				$this->session->set_flashdata('flashtype', 'error');
				redirect($this->url.'signup');
			}

			$ins_id = $this->sg->add('user', $inps);
			$this->session->set_flashdata('flash', 'Registration is Successfull');
			$this->session->set_flashdata('flashtype', 'success');
			redirect($this->url);
		}
	}
}
