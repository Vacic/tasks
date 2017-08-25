<?php 
	class Users extends CI_Controller {
		public function show($user_id){
			//$this->load->model('User_model');
			$data['results'] = $this->User_model->get_users($user_id);
			$this->load->view('user_view', $data);
		}
		public function insert($first_name, $last_name, $username, $password, $email) {
			$options = ['cost' => 12];
			$encripted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
			$this->User_model->create_users ([
											'first_name' => $first_name,
											'last_name' => $last_name,
											'username' => $username,
											'password' => $encripted_pass,
											'email' => $email
											]);
		}
		public function update() {
			$id = 3;
			$username = 'Wiliam';
			$password = 'not so secret';
			$this->User_model->update_users(['username' => $username, 'password' => $password], $id);
		}
		public function delete() {
			$id = 3;
			$this->User_model->delete_users($id);
		}
		public function register() {
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[10]');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[3]|matches[password]');
			if ($this->form_validation->run() == FALSE) {
				$data{'main_view'} = 'users/register_view';
				$this->load->view('layouts/main', $data);
			} else {
				$first_name = $this->input->post('first_name');
				$last_name = $this->input->post('last_name');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$email = $this->input->post('email');
				$this->insert($first_name, $last_name, $username, $password, $email);
				$this->session->set_flashdata('user_registered', 'You have been registered!');
				redirect('home');
			}
		}
		public function login() {
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[3]|matches[password]');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
					);
				$this->session->set_flashdata($data);
				redirect('home');
			} else {
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$user_id = $this->User_model->login_user($username, $password);
				if ($user_id) {
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true
						);
					$this->session->set_userdata($user_data);
					$this->session->set_flashdata('login_success', 'You are now logged in');
					// $data['main_view'] = "home_view";
					// $this->load->view('layouts/main', $data);
					redirect('home');
				} else {
					$this->session->set_flashdata('login_failed', 'Sorry you are not logged in');
					redirect('home');
				}
			}
			// $this->input->post('username');
		}
		public function logout() {
			$this->session->sess_destroy();
			redirect('home');
		}
	}
?>