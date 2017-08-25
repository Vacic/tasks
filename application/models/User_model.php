<?php 
	class User_model extends CI_Model {
		public function get_users($user_id){
			// $this->db->where('id', $user_id);
			$this->db->where(['id => $user_id']);
			$query = $this->db->get('users');
			return $query->result();
			// $query = $this->db->query("SELECT * FROM users");
			// return $query->num_rows(); gives the row count
			// return $query->num_fields(); gives the column count
		/*	$config['hostname'] = 'localhost';
			$config['username'] = 'root';
			$config['password'] = 'root';
			$config['database'] = 'errand_db';

			$connection = $this->load->database($config);*/
		}
		public function create_users($data) {
			$this->db->insert('users', $data);
		}
		public function update_users($data, $id) {
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