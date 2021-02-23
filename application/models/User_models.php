<?php
class User_models extends CI_model{
	
	function create($formArray)
	{
		$this->db->insert('users',
			$formArray); //INSERT INTO users (name,email) values (?,?),
	}
	function all(){
		return $users = $this->db->get('users')->result_array();
	}
	function getUser($userId) {
		$this->db->where('uid',$userId);
		return $user = $this->db->get('users')->row_array();
	}
	function updateUser($userId,$formArray) {
		$this->db->where('uid',$userId);
		$this->db->update('users',$formArray);
	}
	function deleteUser($userId){
		$this->db->where('uid',$userId);
		$this->db->delete('users'); 
	}
}

?>