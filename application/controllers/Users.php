<?php 
	class Users extends CI_Controller {
		public function show($user_id){
			//$this->load->model('User_model');
			$data['results'] = $this->User_model->get_user($user_id);
			$this->load->view('user_view', $data);
		}
		public function insert($first_name, $last_name, $username, $password, $email, $user_img) {
			$options = ['cost' => 12];
			$encripted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
			$this->User_model->create_user ([
											'first_name' => $first_name,
											'last_name' => $last_name,
											'username' => $username,
											'password' => $encripted_pass,
											'email' => $email,
											'img' => $user_img
											]);
		}
		public function update($user_id) {
			$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[10]');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[3]|matches[password]');
			if ($this->form_validation->run() == FALSE) {
				$data{'main_view'} = 'users/profile_view';
				$this->load->view('layouts/main', $data);
			} else {
				$email = $this->input->post('email');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$options = ['cost' => 12];
				$encripted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
				$data = array(
					'username' => $username,
					'password' => $encripted_pass,
					'email' => $email
				);
				$this->User_model->update_user($data, $user_id);
				$this->session->set_flashdata('profile_updated', '<p class="bg-success text-center">Your profile has been successfully updated!</p>');
				redirect('users/profile/'.$user_id);
			}
		}
		public function delete() {
			/* $id = 3;
			$this->User_model->delete_users($id); */
		}
		public function profile ($user_id) {
			if ($this->session->userdata('logged_in')) {
				$data['user'] = $this->User_model->get_user($user_id);
				$data['main_view'] = 'users/profile_view';
				$id['user_id'] = $user_id;
				$data['upload_img_modal'] = $this->load->view('modals/upload_img_modal', $id, TRUE);
				$this->load->view('layouts/main', $data);
			} else {
				$data{'main_view'} = 'users/register_view';
				$this->load->view('layouts/main', $data);
			}
		}
		public function upload($user_id) {
			$config['allowed_types'] = 'jpg|png';
			$config['upload_path'] = './userimg/';
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('file')) {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				$data['main_view'] = 'users/profile_view';
				$this->load->view('layouts/main', $data);
			} else {
				$prev_img = $this->User_model->get_user_img($user_id);
				unlink('./userimg/'.$prev_img);
				$img['img'] = $this->upload->data('file_name');
				$this->User_model->update_user($img, $user_id);
			}
		}
		public function get_img($user_id) {
			$img = $this->User_model->get_user_img($user_id);
			echo $img;
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
				$user_img = 'user_image_placeholder.png';
				$this->insert($first_name, $last_name, $username, $password, $email, $user_img);
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