<?php 
	class User_model extends CI_Model {
		public function get_user($user_id){
			$this->db->where(['id' => $user_id]);
			$query = $this->db->get('users');
			return $query->row();
		}
		public function get_user_img($user_id){
			$this->db->where(['id' => $user_id]);
			$query = $this->db->get('users');
			return $query->row(6)->img;
		}
		public function create_user($data) {
			$this->db->insert('users', $data);
		}
		public function update_user($data, $id) {
			$this->db->where(['id' => $id]);
			$this->db->update('users', $data);
		}
		public function delete_users($id) {
			$this->db->where(['id' => $id]);
			$this->db->delete('users');
		}
		public function login_user($username, $password) {
			$this->db->where('username', $username);
			$result = $this->db->get('users');
			$db_password = $result->row(4)->password;
			if (password_verify($password, $db_password)) {
				return $result->row(0)->id;
			} else {
				return false;
			}
		}
	}
?>