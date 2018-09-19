<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function _remap($id, $name) {
        $this->redirect = base_url();
        $this->login_url = base_url().'login/';
        $id = strtolower($id);
        $this->id = $id;

        if(!isset($_SESSION['user']))
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
        else
            $this->error_404();
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
}
