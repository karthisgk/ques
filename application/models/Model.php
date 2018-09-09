<?php

class Model extends CI_Model
{
  public function __construct()
    {
        parent::__construct();
    }
	
	public function add($table,$data)
	{
	   $this->db->insert($table, $data); 
	   return $this->db->insert_id();
    
	}

	public function getsettings(){
		
		/*$query = $this->get_one("id","1","settings");
		return $query;*/

		$rt = new stdClass();
		$rt->load_more_count = 16;
		return $rt;

	}


	public function get($qry)
	{
	  $query=$this->db->query($qry);
	  if($query->num_rows()>0)
	    return $query->result();
	}
	
	public function count($qry)
	{
	  $query=$this->db->query($qry);
	  return $query->num_rows();
	}

	public function get_one($col_name, $col_data, $table){
		$this->db->where($col_name, $col_data);
		$query = $this->db->get($table);
	    if($query->num_rows()>0){
		   $data =  $query->result();
		   return $data[0];
	    }
	}


	public function remove($tbl,$data)
	{
	   $this->db->delete($tbl, $data);
	   
	}


	public function update($tbl,$set,$where)
	{
	   $this->db->update($tbl, $set,$where);
	   
	}



	public function dbtruncate($tbl)
	{
	 $this->db->truncate($tbl); 
	}


	public function getip(){
		if (isset($_SERVER)){
		    if(isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
		        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		        if(strpos($ip,",")){
		            $exp_ip = explode(",",$ip);
		            $ip = $exp_ip[0];
		        }
		    }else if(isset($_SERVER["HTTP_CLIENT_IP"])){
		        $ip = $_SERVER["HTTP_CLIENT_IP"];
		    }else{
		        $ip = $_SERVER["REMOTE_ADDR"];
		    }
		}else{
		    if(getenv('HTTP_X_FORWARDED_FOR')){
		        $ip = getenv('HTTP_X_FORWARDED_FOR');
		        if(strpos($ip,",")){
		            $exp_ip=explode(",",$ip);
		            $ip = $exp_ip[0];
		        }
		    }else if(getenv('HTTP_CLIENT_IP')){
		        $ip = getenv('HTTP_CLIENT_IP');
		    }else{
		        $ip = getenv('REMOTE_ADDR');
		    }
		}
		return $ip;
	}

	public function unique_id(){
     	return base_convert(microtime(false), 10, 36);
    }

    public function Arraymultisort($data, $options){

    	$element = $options['element'];
		if($data != ''){

			$index = array();
			foreach ($data as $key => $value) {
				$value = $this->json_toArray($value);
				array_push($index, $value[$element]);
			}

			array_multisort($index, $options['sort_by'], $data);
			return $data;
		}else
			return '';

	}


	public function json_toArray($data){

		$array = array();
		if($data != ''){
			foreach ($data as $key => $value) {
				$array[$key] = $value;
			}
			return $array;
		}else 
			return '';
	}

	public function _en_urlid($data,$en_de = 0){ // $en_de = 0  for encode 1 for decode
		$salt = 10000;
		if($en_de == 0) //encode
			return base_convert($data*$salt, 36, 32);
		else //decode
			return base_convert($data, 32, 36) / $salt;
	}

	public function timeMoment($timestamp){
		$datetime1=new DateTime("now");
    	$datetime2=date_create($timestamp);
    	$diff=date_diff($datetime1, $datetime2);
    	$timemsg='';
    	if($diff->y > 0){
        	$timemsg = $diff->y .' Year'. ($diff->y > 1?"s":'');

    	}
    	else if($diff->m > 0){
     		$timemsg = $diff->m .' Month'. ($diff->m > 1?"s":'');
    	}
    	else if($diff->d > 0){
     		$timemsg = $diff->d .' Day'. ($diff->d > 1?"s":'');
    	}
    	else if($diff->h > 0){
     		$timemsg = $diff->h .' Hour'.($diff->h > 1 ? "s":'');
    	}
    	else if($diff->i > 0){
     		$timemsg = $diff->i .' Minute'. ($diff->i > 1?"s":'');
    	}
    	else if($diff->s > 0){
     		$timemsg = $diff->s .' Second'. ($diff->s > 1?"s":'');
    	}

    	if($timestamp < date('Y-m-d H:i:s'))
			$timemsg = $timemsg.' Ago';
		elseif($timestamp == date('Y-m-d H:i:s'))
			$timemsg = 'Just Now';
		else
			$timemsg = $timemsg.' Left';		
		return $timemsg;
	}

	public function timeAgo($timestamp){
    	return $this->timeMoment($timestamp);
	}

	public function timeLeft($timestamp){
    	return $this->timeMoment($timestamp);
	}

	public function short_string($string,$length){
		$string = strlen($string) > $length ? substr($string, 0,$length).'...' : $string;
		return $string;
	}

	public function created_atDate(){
    	return date('Y-m-d H:i:s');
    }

    public function moddate(){
    	return date("Y-m-d H:i:s", strtotime(date('Y-m-d H:i:s'))+(30*60)); //current datetime + plus 30 mins
    }

	public function app($data, $cont_name = 'index') { //content name

		$data['short'] = function($text, $len){
			return $this->short_string($text, $len);
		};
		$data['compare'] = function($date){
			return $this->timeMoment($timestamp);
		};
		$data['get_unique'] = function(){
			return $this->unique_id();
		};
		$data['encode'] = function($id, $opt){
			return $this->_en_urlid($id, $opt);
		};
		$batch = $this->sg->get('select * from batch');
        $data['batchs'] = !empty($batch) ? $batch : array();
		$data['appcss'] = $this->load->view('front/appcss' , $data, true);
		$data['menus'] = $this->load->view('front/menus' , $data, true);
		$data['popup'] = $this->load->view('front/popup' , $data, true);
		$data['main'] = $this->load->view('front/'.$cont_name , $data, true);
		return $this->load->view('front/app', $data, true);

	}

	public function RollnoExist($rno, $id = ''){
		$qry = 'select id from user where uname="'.$rno.'" ';
		if($id != '')
			$qry .= 'and id<>"'.$id.'"';
		return $this->count($qry) > 0;
	}

	public function ajax_table($input, $get_count = false){

		$sess_user = $this->Model->sessionUser();
		if(!is_array($input))
			return array();

		$like = array();

		if(is_array($input['search_columns'])){
			foreach ($input['search_columns'] as $c_key => $col) {
				$like[$col] = $input['search']['value'];
			}
		}

		$order_col = 'id';
		$order_sort = 'DESC';
		if($input['order']['0']['column']){
			$order_sort = $input['order']['0']['dir'];
			$order_col = $input['column'][$input['order']['0']['column']];
		}

		if(!empty($like)) {
			unset($like['action']);
			$this->db->group_start();
        	$this->db->or_like($like)->group_end();
        }

        if(isset($input['conditions'])){        	
	        $this->db->group_start();
	        if($input['conditions']['or'])
	        	$this->db->or_where($input['conditions']['where']);
	        else
	        	$this->db->where($input['conditions']['where']);
	        $this->db->group_end();
	    }
	    if(!$get_count)
			$this->db->limit($input['length'], $input['start']);
		$this->db->order_by($order_col, $order_sort);
		$query = $this->db->get($input['tablename']);
        $data = $query->result();

        if($get_count)
        	return count($data);

        if(count($data) > 0)
        	return $data;
        else
        	return array();        

	}

	public function availableYears(){
        $rt = array();
        for ($i=2000; $i <= 2100; $i++)
            array_push($rt, $i);
        return $rt;
    }

    public function sessionUser(){
    	$user = $this->session->userdata('user');
    	$user = $this->get_one('id', $user, 'user');
    	$obj = new stdClass;    	
    	if(!empty($user))
    		$obj = $user;
    	$obj->login = !empty($user);
    	return $obj;
    }

    public function checkAccess($opt = '0'){
    	$user = $this->sessionUser();
    	if($user->login){
    		return $user->user_type == $opt;
    	}else
    		return false;
    }

    public function getTest($inp, $get_count = false){

    	$offset = isset($inp['offset']) ? $inp['offset'] : 0;
    	$limit = isset($inp['limit']) ? $inp['limit'] : $this->getsettings()->load_more_count;
    	$enid = isset($inp['enid']) ? $inp['enid'] : false;

    	if(!$get_count)
			$this->db->limit($limit, $offset);
		$this->db->order_by('id', 'DESC');

    	$data = $this->db->get('test')->result();
    	if($get_count)
        	return count($data);

        if(count($data) > 0){
        	$rt = array();
        	foreach ($data as $key => $d) {
        		$d->id = $enid ? $this->_en_urlid($d->id, '0') : $d->id;
        		array_push($rt, $d);
        	}
        	return $rt;
        }
        else
        	return array();

    }

    public function getQuest($inp, $get_count = false){

    	$offset = isset($inp['offset']) ? $inp['offset'] : 0;
    	$limit = isset($inp['limit']) ? $inp['limit'] : $this->getsettings()->load_more_count;
    	$enid = isset($inp['enid']) ? $inp['enid'] : false;
    	$reverse = isset($inp['reverse']) ? $inp['reverse'] : 'false';
    	$keyword = isset($inp['keyword']) ? $inp['keyword'] : '';
    	$keyword = preg_replace('/["\'{}|\\\\]/i', '', $keyword);
    	$keyword = str_replace('%20', ' ', $keyword);
		if($keyword != '' && strlen($keyword) > 3){
			$array = array('content' => $keyword);			
			$this->db->group_start();
            $this->db->or_like($array)->group_end(); 
        }

    	if(isset($inp['quest']) && $reverse !== 'true'){
    		if(is_array($inp['quest'])){
    			$fg = count($inp['quest']) > 0;
    			if($fg){
    				$this->db->group_start();
	    			foreach ($inp['quest'] as $k => $_id)
	    				$this->db->or_where('id', $_id);
    				$this->db->group_end();
    			}
    		}
    	}

    	if(!$get_count)
			$this->db->limit($limit, $offset);
		$this->db->order_by('id', 'DESC');

    	$data = $this->db->get('questions')->result();
    	if($get_count)
        	return count($data);

        if(count($data) > 0){
        	$rt = array();
        	foreach ($data as $key => $d) {
        		$d->index = $d->id;
        		$d->id = $enid ? $this->_en_urlid($d->id, '0') : $d->id;
        		array_push($rt, $d);
        	}
        	return $rt;
        }
        else
        	return array();

    }

    public function assign_test($inp = array()){

    	$inp['test_id'] = isset($inp['test_id']) ? $inp['test_id'] : '';
    	$test = $this->get_one('id', $inp['test_id'], 'test');
    	if(empty($test))
    		$inp = array();

    	if(!empty($inp)){
            $id = isset($inp['id']) ? $inp['id'] : '';
            $up = array(
                'test_id'			=> $inp['test_id'],
                'batch_id'			=> isset($inp['batch_id']) ? $inp['batch_id'] : 0,
                'name'				=> isset($inp['name']) ? $inp['name'] : $test->name,
                'date'				=> date('Y-m-d', strtotime($inp['date'])),
                'from'				=> date('H:i:s', strtotime($inp['from'])),
                'to'				=> date('H:i:s', strtotime($inp['to'])),
                'publish'			=> isset($inp['publish']) ? $inp['publish'] : 0
            );

            $msg = 'Assigned Test Modified';
            if($id == ''){
                $up['created_at'] = $this->sg->created_atDate();
                $id = $this->sg->add('assign', $up);
                $msg = 'Test Assigned Successfull';
            }
            else{
                $id = $this->sg->_en_urlid($id, '1');
                $this->sg->update('assign', $up, array('id'  => $id));
            }

            $return = array(
                'id'        => $this->sg->_en_urlid($id, '0'),
                'req_volume'=> $id,
                'result'    => 'success',
                'message'   => $msg
            );
        }else
            $return = array('result' => 'error', 'message'   => 'Input values are not found');

        return $return;
    }
}

?>