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
        elseif ($id == 'test')
            $this->test();
        else
            $this->error_404();
    }

	public function index(){
		echo $this->sg->app(array('actived' => $this->id));
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

    public function test(){
        if($this->sg->checkAccess()){
            $d = array('actived' => $this->id);
            echo $this->sg->app($d, 'test');
        }
        else
            redirect(base_url());
    }
}
