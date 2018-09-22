<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->url = base_url().'api/';
		if(!$this->input->is_ajax_request())
			redirect(base_url());	

        $this->suser = $this->sg->sessionUser();
	}

	public function batch(){

		if(!$this->sg->checkAccess()) { /* check admin access.*/
			echo json_encode(array('result'	=> 'error', 'message' => 'Access Denied'));
			die;
		}

		if(!empty($_POST)){
			$id = $this->input->post('id');
			$up = array(
				'name'			=> $this->input->post('name'),
				'from'			=> $this->input->post('from'),
				'to'			=> $this->input->post('to')
			);

			$msg = 'Batch Updated Successfull';
			if($id == ''){
				$up['created_at'] = $this->sg->created_atDate();
				$id = $this->sg->add('batch', $up);
				$msg = 'Batch Created Successfull';
			}
			else{
				$id = $this->sg->_en_urlid($id, '1');
				$this->sg->update('batch', $up, array('id'	=> $id));
			}

			$return = array(
				'id'		=> $id,
				'result'	=> 'success',
				'message'	=> $msg
			);
		}else
			$return = array('result'	=> 'error', 'message'	=> 'Input values are not found');

		echo json_encode($return);
	}

	public function get_batch($id = ''){

		$id = $this->sg->_en_urlid($id, '1');
		$b = $this->sg->get_one('id', $id , 'batch');
		if(!empty($b) && $this->sg->checkAccess())
			echo json_encode($b);
		else
			echo "{}";
	}

	public function batch_ajax_table() {

        $sess_user = $this->sg->sessionUser();
        if($_POST && $this->sg->checkAccess()) {
            $wh = $response = array();
            $response['draw'] = $_POST['draw'];
            $response['recordsTotal'] = $response['recordsFiltered'] = 0;
            $response['data'] = array();
            $table_columns = array('id','name','from','to','created_at','option');
            $search_columns = $table_columns;
            unset($search_columns[5]);
            $request = $_POST;
            $request['column'] = $table_columns;
            $request['search_columns'] = $search_columns;
            $request['tablename'] = 'batch'; 
            $data = $this->Model->ajax_table($request);            
            if(!empty($data)){
                $total = $this->Model->ajax_table($request, true);
                $recordsTotal['recordsTotal'] = $response['recordsFiltered'] = $total;
                foreach ($data as $key => $b) {

                	$enid = $this->sg->_en_urlid($b->id, '0');
                	$option = '<a onclick="batch.trigger(\''.$enid.'\')" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>';
                	$option .= ' <a onclick="batch.delete(\''.$enid.'\')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>';

                    $row = array();
                    $row['DT_RowId'] = 'row-'.$b->id;
                    $row['id'] = $b->id;
                    $row['name'] = $this->sg->short_string($b->name, '25');
                    $row['from'] = $b->from;
                    $row['to'] = $b->to;
                    $row['created_at'] = $this->sg->timeAgo($b->created_at);
                    $row['option'] = $option;
                    array_push($response['data'], $row);
                }
            }
            echo json_encode($response);
        }else
            echo '{}';

        die;

    }

    public function delete_batch($id = ''){
    	if($this->sg->checkAccess()){
    		$id = $this->sg->_en_urlid($id, '1');
            $this->sg->remove('user', array('batch_id' => $id));
    		$this->sg->remove('batch', array('id' => $id));
    	}
    }


    public function user_ajax_table() {

        $sess_user = $this->sg->sessionUser();
        if($_POST && $this->sg->checkAccess()) {
            $wh = $response = array();
            $response['draw'] = $_POST['draw'];
            $response['recordsTotal'] = $response['recordsFiltered'] = 0;
            $response['data'] = array();
            $table_columns = array('id','uname','name','email','created_at','option');
            $search_columns = $table_columns;
            unset($search_columns[5]);
            $request = $_POST;
            $request['conditions']['or'] = false;
            $wh = array('user_type!=' => '0');            
            $bid = isset($_GET['bid']) ? $_GET['bid'] : '0';
            if($bid != 'all')
            	$wh['batch_id'] = $bid;
            $request['conditions']['where'] = $wh;
            $request['column'] = $table_columns;
            $request['search_columns'] = $search_columns;
            $request['tablename'] = 'user';   
            $data = $this->Model->ajax_table($request);        
            if(!empty($data)){
                $total = $this->Model->ajax_table($request, true);
                $recordsTotal['recordsTotal'] = $response['recordsFiltered'] = $total;
                foreach ($data as $key => $b) {

                	$enid = $this->sg->_en_urlid($b->id, '0');
                	$option = '<a onclick="user.trigger(\''.$enid.'\')" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>';
                	$option .= ' <a onclick="user.delete(\''.$enid.'\')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>';

                    $row = array();
                    $row['DT_RowId'] = 'row-'.$b->id;
                    $row['id'] = $b->id;
                    $row['uname'] = $this->sg->short_string($b->uname, '10');
                    $row['name'] = $this->sg->short_string($b->name, '25');
                    $row['email'] = $this->sg->short_string($b->email, '25');
                    $row['created_at'] = $this->sg->timeAgo($b->created_at);
                    $row['option'] = $option;
                    array_push($response['data'], $row);
                }
            }
            echo json_encode($response);
        }else
            echo '{}';

        die;

    }

    public function get_user($id = ''){

        $id = $this->sg->_en_urlid($id, '1');
        $b = $this->sg->get_one('id', $id , 'user');
        if(!empty($b) && $this->sg->checkAccess())
            echo json_encode($b);
        else
            echo "{}";
    }

    public function update_user(){


        $_id = $id = $this->input->post('id') != '' ? $this->sg->_en_urlid($this->input->post('id'), '1') : '';

        if(!$this->sg->checkAccess()) { /* check admin access.*/
            if($this->sg->checkAccess('1') && $this->suser->id != $_id)
                echo json_encode(array('result' => 'error', 'message' => 'Access Denied'));
                die;
        }

        if(!empty($_POST)){            
            $up = array(
                'name'          => $this->input->post('name'),
                'lname'         => $this->input->post('lname'),
                'uname'         => $this->input->post('uname'),
                'email'         => $this->input->post('email'),
                'batch_id'      => $this->input->post('batch_id')
            );

            if(trim($this->input->post('password')) != ''){
                if($this->input->post('password') != $this->input->post('cpassword')){
                    echo json_encode(array('result' => 'error', 'message' => 'Password Does\'nt be Same.'));
                    die;
                }else
                    $up['password'] = md5($this->input->post('password'));                
            }

            $msg = 'User Updated Successfull';
            if($id == ''){
                $up['created_at'] = $this->sg->created_atDate();
                $id = $this->sg->add('user', $up);
                $msg = 'User Created Successfull';
            }
            else
                $this->sg->update('user', $up, array('id'  => $id));

            $return = array(
                'id'        => $id,
                'result'    => 'success',
                'message'   => $msg
            );
        }else
            $return = array('result'    => 'error', 'message'   => 'Input values are not found');

        echo json_encode($return);
    }

    public function delete_user($id = ''){
        if($this->sg->checkAccess()){
            $id = $this->sg->_en_urlid($id, '1');
            $this->sg->remove('user', array('id' => $id));
        }
    }

    public function test_api(){
        if (isset($_GET['get_single'])) {
            $id = $this->sg->_en_urlid($_GET['get_single'], '1');
            $b = $this->sg->get_one('id', $id , 'test');
            if(!empty($b) && $this->sg->checkAccess())
                echo json_encode($b);
            else
                echo "{}";
        }
        elseif (isset($_GET['get_questions'])) {
            if(!$this->sg->checkAccess() && !$this->sg->checkAccess('1')){
                echo "[]";die();
            }

            $id = $this->sg->_en_urlid($_GET['get_questions'], '1');
            $b = $this->sg->get_one('id', $id , 'test');
            $_POST['quest'] = $questCreated = array();
            $trigger = false;
            if(!empty($b)){
                if($b->questions != ''){
                    $quest = json_decode($b->questions);                   
                    if (json_last_error() === 0 && count($quest) > 0){ 
                        $trigger = true;
                        foreach ($quest as $k => $q) {
                            array_push($_POST['quest'], $q->id);
                            array_push($questCreated, $q->created);
                        }
                    }
                }
            }

            if(!$trigger && $_POST['reverse'] !== 'true'){
                echo "[]";
                die();
            }

            $_POST['enid'] = true;
            $d = $this->sg->getQuest($_POST);
            if(!empty($d)){
                $fg = count($questCreated) == count($d);
                if($_POST['reverse'] !== 'true' && $fg)
                    array_multisort($questCreated, SORT_ASC, $d);
                $d[0]->total = $this->sg->getQuest($_POST, true);
                echo json_encode($d);
            }else
                echo '[]';
        }
        elseif (isset($_GET['update_questions'])) {
            if(!$this->sg->checkAccess())
                echo "[]";

            $id = $this->sg->_en_urlid($_GET['update_questions'], '1');
            if(isset($_POST['quest'])){
                $quest = array();
                $_POST['quest'] = is_array($_POST['quest']) ? $_POST['quest'] : array();
                foreach ($_POST['quest'] as $key => $obj) {
                    if(isset($obj['created']))
                        $obj['created'] = date('Y-m-d H:i:s', strtotime($obj['created']));
                    array_push($quest, $obj);
                }
                $up = array('questions' => json_encode($quest));                
            }else
                $up = array('questions' => '');
            $this->sg->update('test', $up, array('id'  => $id));           
        }
        elseif (isset($_GET['delete'])) {
            if($this->sg->checkAccess()){
                $id = $this->sg->_en_urlid($_GET['delete'], '1');
                $this->sg->remove('test', array('id' => $id));
                $this->sg->remove('assign', array('test_id' => $id));
                //$this->sg->remove('result', array('test_id' => $id));
            }
        }
        elseif (isset($_GET['update'])) {
            if(!$this->sg->checkAccess()) { /* check admin access.*/
                echo json_encode(array('result' => 'error', 'message' => 'Access Denied'));
                die;
            }

            if(!empty($_POST)){
                $id = $this->input->post('id');
                $up = array(
                    'name'          => $this->input->post('name'),
                    'desb'          => $this->input->post('desb')
                );

                $msg = 'Test Updated Successfull';
                if($id == ''){
                    $up['created_at'] = $this->sg->created_atDate();
                    $id = $this->sg->add('test', $up);
                    $msg = 'Test Created Successfull';
                }
                else{
                    $id = $this->sg->_en_urlid($id, '1');
                    $this->sg->update('test', $up, array('id'  => $id));
                }

                $return = array(
                    'id'        => $this->sg->_en_urlid($id, '0'),
                    'result'    => 'success',
                    'message'   => $msg
                );
            }else
                $return = array('result' => 'error', 'message'   => 'Input values are not found');

            echo json_encode($return);
        }
        elseif (isset($_GET['get'])) {
            if(!$this->sg->checkAccess()){
                echo "[]";die;
            }

            $_POST['enid'] = true;
            $d = $this->sg->getTest($_POST);
            if(!empty($d)){
                $d[0]->total = $this->sg->getTest($_POST, true);
                echo json_encode($d);
            }else
                echo "[]";
        }
    }

    public function quest_api(){
        if (isset($_GET['get_single'])) {
            $id = $this->sg->_en_urlid($_GET['get_single'], '1');
            $b = $this->sg->get_one('id', $id , 'questions');
            if(!empty($b) && $this->sg->checkAccess())
                echo json_encode($b);
            else
                echo "{}";
        }
        elseif (isset($_GET['delete'])) {
            if($this->sg->checkAccess()){
                $id = $this->sg->_en_urlid($_GET['delete'], '1');
                $this->sg->remove('questions', array('id' => $id));
            }
        }
        elseif (isset($_GET['update'])) {
            if(!$this->sg->checkAccess()) { /* check admin access.*/
                echo json_encode(array('result' => 'error', 'message' => 'Access Denied'));
                die;
            }

            if(!empty($_POST)){
                $id = $this->input->post('id');
                $up = array(
                    'qtype'            => $this->input->post('qtype'),
                    'content'          => $this->input->post('content'),
                    'tf'               => $this->input->post('tf'),
                    'choises'          => json_encode($this->input->post('choises'))
                );

                $msg = 'Question Updated Successfull';
                if($id == ''){
                    $up['created_at'] = $this->sg->created_atDate();
                    $id = $this->sg->add('questions', $up);
                    $msg = 'Question Created Successfull';
                }
                else{
                    $id = $this->sg->_en_urlid($id, '1');
                    $this->sg->update('questions', $up, array('id'  => $id));
                }

                $return = array(
                    'id'        => $this->sg->_en_urlid($id, '0'),
                    'req_volume'=> $id,
                    'result'    => 'success',
                    'message'   => $msg
                );
            }else
                $return = array('result' => 'error', 'message'   => 'Input values are not found');

            echo json_encode($return);
        }
        elseif (isset($_GET['get'])) {
            if(!$this->sg->checkAccess())
                echo "[]";

            $_POST['enid'] = true;
            $d = $this->sg->getQuest($_POST);
            if(!empty($d)){
                $d[0]->total = $this->sg->getQuest($_POST, true);
                echo json_encode($d);
            }else
                echo "[]";
        }
    }

    public function test_schedule(){
        if (isset($_GET['get'])) {
            if(!$this->sg->checkAccess('1')){
                echo "[]";die;
            }

            $_POST['enid'] = true;
            $d = $this->sg->getAssigned($_POST);
            if(!empty($d)){
                $d[0]->total = $this->sg->getAssigned($_POST, true);
                echo json_encode($d);
            }else
                echo "[]";
        }
    }

    public function assign_api(){
        if (isset($_GET['get_single'])) {
            $id = $this->sg->_en_urlid($_GET['get_single'], '1');
            $b = $this->sg->get_one('id', $id , 'assign');
            if(!empty($b) && $this->sg->checkAccess()){
                $b->date = date('d-m-Y', strtotime($b->date));
                $b->from = date('h:i A', strtotime($b->from));
                $b->to = date('h:i A', strtotime($b->to));
                echo json_encode($b);
            }
            else
                echo "{}";
        }
        elseif (isset($_GET['update'])) {
            if(!$this->sg->checkAccess()) { /* check admin access.*/
                echo json_encode(array('result' => 'error', 'message' => 'Access Denied'));
                die;
            }

            $return = $this->sg->assign_test($_POST);

            echo json_encode($return);
        }

        elseif (isset($_GET['delete'])) {
            if($this->sg->checkAccess()){
                $id = $this->sg->_en_urlid($_GET['delete'], '1');
                $this->sg->remove('assign', array('id' => $id));
                //$this->sg->remove('result', array('assign_id' => $id));
            }
        }

        else if (isset($_GET['ajax_table']) && isset($_GET['test_id'])) {
            $sess_user = $this->sg->sessionUser();
            if($_POST && $this->sg->checkAccess()) {
                $wh = $response = array();
                $response['draw'] = $_POST['draw'];
                $response['recordsTotal'] = $response['recordsFiltered'] = 0;
                $response['data'] = array();
                $table_columns = array('id','name','batch_id','date','from','option');
                $search_columns = $table_columns;
                unset($search_columns[5]);
                $request = $_POST;
                $request['conditions']['or'] = false;
                $request['conditions']['where'] = array('test_id' => $this->sg->_en_urlid($_GET['test_id'], '1'));
                $request['column'] = $table_columns;
                $request['search_columns'] = $search_columns;
                $request['tablename'] = 'assign'; 
                $data = $this->Model->ajax_table($request);            
                if(!empty($data)){
                    $total = $this->Model->ajax_table($request, true);
                    $recordsTotal['recordsTotal'] = $response['recordsFiltered'] = $total;
                    foreach ($data as $key => $b) {

                        $enid = $this->sg->_en_urlid($b->id, '0');
                        $option = '<a onclick="assign.trigger(\''.$enid.'\')" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>';
                        $option .= ' <a onclick="assign.delete(\''.$enid.'\')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>';

                        $batch = $this->sg->get_one('id', $b->batch_id, 'batch');
                        $b->from = date('h:i A', strtotime($b->from));
                        $b->to = date('h:i A', strtotime($b->to));

                        $row = array();
                        $row['DT_RowId'] = 'row-'.$enid;
                        $row['id'] = $enid;
                        $row['name'] = $this->sg->short_string($b->name, '25');
                        $row['batch_id'] = isset($batch->name) ? $batch->name : '';
                        $row['date'] = date('d-m-Y', strtotime($b->date));
                        $row['from'] = $b->from .'-'. $b->to. ' ('.$this->sg->timeDiffer($b->from, $b->to).')';
                        $row['option'] = $option;
                        array_push($response['data'], $row);
                    }
                }
                echo json_encode($response);
            }else
                echo '{}';

            die;
        }
    }
}

?>