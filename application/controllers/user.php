<?php  
class user extends CI_controller{
	function index() {
		$this->load->model('User_models');
		$users = $this->User_models->all();
		$data = array();
		$data['users'] = $users;
		$this->load->view('list',$data) ;
	}

	function create(){
		$this->load->model('User_models');
		 $this->form_validation->set_rules('name','Name','required') ;
		 $this->form_validation->set_rules('email','Email','required|valid_email');

		 	if ($this->form_validation->run() == false){
		 		$this->load->view('create');
		 	}else {
		 		//save record 
		 		$formArray =  array();
		 		$formArray['name'] = $this->input->post('name');
		 		$formArray['email'] = $this->input->post('email');
		 		$formArray['created_at'] = date('y-m-d'); 
		 		$this->User_models->create($formArray);
		 		$this->session->set_flashdata('success','record added successfully');
		 		redirect(base_url().'index.php/user/index ');
		 	}
		 
	}
	
	function edit($userId){
		$this->load->model('User_models');
		$user = $this->User_models->getUser($userId);
		//print_r($user);
		$data = array();
		$data['user'] = $user;
        //echo $userId;
		//return;
		$this->form_validation->set_rules('name','Name','required') ;
		$this->form_validation->set_rules('email','Email','required|valid_email');

		 if ($this->form_validation->run() == false){

		 		$this->load->view('edit',$data);
		 	//	return;
		  	}
			else {
		 		//save record 
		 		$formArray =  array();
		 		$formArray['name'] = $this->input->post('name');
		 		$formArray['email'] = $this->input->post('email');
		 		 
		 		$this->User_models->updateUser($userId,$formArray);
		 		$this->session->set_flashdata('success','record added successfully');
		 		redirect(base_url().'index.php/user/index ');
		  }
		//$this->load->view('edit',$data);


	}
	function delete($userId)
	{
		$this->load->model('User_models');
		$user = $this->User_models->getUser($userId);
		if(empty($user)) {
			$this->session->set_flashdata('failure','No record');
			redirect(base_url().'index.php/user/index');
		}
		$this->User_models->deleteUser($userId);
		$this->session->set_flashdata('success');
		redirect(base_url().'index.php/user/index');

	}
 }
?>