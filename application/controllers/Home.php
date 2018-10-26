<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function _remap($id, $name) {
        $this->redirect = base_url();
        $this->suser = $this->sg->sessionUser();
        $this->login_url = base_url().'login/';
        $id = strtolower($id);
        $this->id = $id;

        if(!$this->suser->login)
        	redirect($this->login_url);

        if($id == 'index')
        	$this->index();
        elseif ($id == 'blank')
            $this->blank();
        elseif ($id == 'batch')
            $this->batch();
        elseif ($id == 'user')
            $this->user();
        elseif ($id == 'test'){
            $id = isset($name[0]) ? $name[0] : '';
            $this->test($id);
        }
        elseif($id == 'site_settings')
            $this->site_settings();
        elseif($id == 'profile')
            $this->profile();
        else
            $this->testPage($id);            
    }

    public function testPage($id = ''){
        if($id == '' || !$this->suser->login){
            $this->error_404();die;
        }

        if(!empty($_POST)){
            $answers = json_decode($_POST['answers']);
            if(json_last_error() === 0)
                $this->sg->resultValidation($id, $answers);
            redirect(base_url());
            die;
        }

        $id = $this->sg->_en_urlid($id, '1');
        $d = $this->sg->get_one('id', $id, 'result');
        if(!empty($d)){

            if($d->attempt > ($this->sg->getsettings()->no_of_attempt - 1)) {
                redirect(base_url());die;
            }

            $test = $this->sg->get_one('id', $d->test_id, 'test');
            $assign = $this->sg->get_one('id', $d->assign_id, 'assign');
            if($d->user_id == $this->suser->id && (!empty($test) && !empty($assign))){
                $d->from = $assign->date.' '.$assign->from;
                $d->to = $assign->date.' '.$assign->to;
                $d->from = date('Y-m-d H:i:s', strtotime($d->from));
                $d->to = date('Y-m-d H:i:s', strtotime($d->to));
                $vd = array('data' => $d, 'actived' => 'index');
                $vd['test'] = $test;
                $vd['assign'] = $assign;
                $vd['questions'] = array();
                //$this->load->view('front/checkTiming', $vd);
                if($test->questions != ''){
                    $vd['questions'] = array_reverse(json_decode($test->questions));
                    if(json_last_error() !== 0)
                        $vd['questions'] = array();

                }
                echo $this->sg->app($vd, 'front-test');
            }else{
                $this->error_404();die;
            }
        }else{
            $this->error_404();die;
        }
    }

	public function index(){
        if($this->sg->checkAccess('1'))
	   	   echo $this->sg->app(array('actived' => $this->id), 'test-list');
        else
            redirect(base_url('test'));
	}

    public function error_404(){
        echo $this->sg->app(array('actived' => 'error_404'), 'error_404');
    }

    public function blank(){
        echo $this->sg->app(array('actived' => $this->id), 'blank');
    }

    public function batch(){
        if($this->sg->checkAccess())
            echo $this->sg->app(array('actived' => $this->id), 'batch');
        else
            redirect(base_url());
    }

    public function user(){
        if($this->sg->checkAccess()){
            $d = array('actived' => $this->id);
            echo $this->sg->app($d, 'user');
        }
        else
            redirect(base_url());
    }

    public function test($id = ''){
        if($this->sg->checkAccess()){

            $isSinggle = $id != '';$_id = $id;

            if($isSinggle) {
                $id = $this->sg->_en_urlid($id, '1');
                $test = $this->sg->get_one('id', $id, 'test');
                $isSinggle = !empty($test);
                if(empty($test))
                    redirect(base_url().'test');
            }

            if(!$isSinggle){
                $d = array('actived' => $this->id);
                echo $this->sg->app($d, 'test');
            }else{
                $d = array('actived' => $this->id);
                $d['test'] = $d['assign'] = '';
                if(isset($_GET['assign']))
                    $d['assign'] = 'active in';
                else
                    $d['test'] = 'active in';
                $test->enid = $_id;
                $test->questions = empty($test->questions) ? '[]' : $test->questions;
                $quest = json_decode($test->questions);
                if(json_last_error() !== 0)
                    $test->questions = '[]';
                $d['data'] = $test;
                echo $this->sg->app($d, 'test-single');
            }
        }
        else
            redirect(base_url());
    }

    public function site_settings(){
        if(!$this->sg->checkAccess())
            redirect(base_url());
        if(!empty($_POST)) {
            $_POST['no_of_negt_quest'] = intval($_POST['no_of_negt_quest']) == 0 ? 1 : $_POST['no_of_negt_quest'];
            $this->sg->update('settings', $_POST, array('id' => 1));
            $this->session->set_flashdata('flash', 'Settings Updated Successfull');
            $this->session->set_flashdata('flashtype', 'success');
            redirect(base_url('site_settings'));
        }
        $d = array('actived' => $this->id, 'isSettings' => true);
        echo $this->sg->app($d, 'site_settings');
    }

    public function profile(){
        if(!$this->suser->login)
            redirect(base_url());
        if(!empty($_POST)){
            $pass = $_POST['password'];
            $npass = $_POST['npassword'];
            $cpass = $_POST['cf_password']; 
            $up = array(
                'name'          => $this->input->post('fname'),
                'lname'         => $this->input->post('lname'),
                'email'         => $this->input->post('email')
            );
            //echo "<pre>";print_r($_POST);die;
            if($this->suser->user_type == '0' && ($this->input->post('uname') != '' && strlen($this->input->post('uname')) > 4))
                $up['uname'] = $this->input->post('uname');
            $p = ($pass != '' && $npass != '' && $cpass != '');
            if($p) {
                if(md5($pass) == $this->suser->password && $npass == $cpass){
                    $up['password'] = md5($npass);
                    $this->session->set_flashdata('flash', 'Profile Updated Successfull');
                    $this->session->set_flashdata('flashtype', 'success');
                }
                elseif(md5($pass) != $this->suser->password) {
                    $this->session->set_flashdata('flash', 'Invalid Password');
                    $this->session->set_flashdata('flashtype', 'error');
                }
                elseif($npass != $cpass){
                    $this->session->set_flashdata('flash', 'New Password and Confirm Password does\'nt be Same.');
                    $this->session->set_flashdata('flashtype', 'error');
                }
            }else{
                $this->session->set_flashdata('flash', 'Profile Updated Successfull');
                $this->session->set_flashdata('flashtype', 'success');
            }
            $this->sg->update('user', $up, array('id' => $this->suser->id));            
            redirect(base_url('profile'));
        }
        $d = array('actived' => $this->id, 'isSettings' => true);
        if($this->suser->user_type == '1') {
            $d['bname'] = $this->sg->get_one('id', $this->suser->batch_id, 'batch');
            if(!empty($d['bname']))
                $d['bname'] = $d['bname']->from.'-'.$d['bname']->to.' ('.$d['bname']->name.')';
        }
        echo $this->sg->app($d, 'profile');
    }
}
