<?php 
	class Projects extends CI_Controller {
		public function __construct() {
			parent::__construct();
			if(!$this->session->userdata('logged_in')) {
				$this->session->set_flashdata('no_access', 'Sorry you are not allowed or not logged in');
				redirect('home');
			}
		}
		public function index() {
			$data['projects'] = $this->Project_model->get_all_projects($this->session->userdata('user_id'));
			$data['main_view'] = "projects/index";
			$this->load->view('layouts/main', $data);
		}
		public function display($project_id) {
			if(isset($project_id)) {
				$data['not_completed_tasks'] = $this->Project_model->get_project_tasks($project_id, false);
				$data['completed_tasks'] = $this->Project_model->get_project_tasks($project_id, true);
				$data['project_data'] = $this->Project_model->get_project($project_id);
				$data['main_view'] = "projects/display";
				$this->load->view('layouts/main', $data);
			} else {
				$this->session->set_flashdata("missing_variable", "<h1><p class='bg-danger text-center'>You haven't selected any project.</p></h1>");
				redirect('home');
			}
		}
		public function create() {
			$this->form_validation->set_rules('project_name', 'Project Name', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('project_body', 'Project Description', 'trim|required');
			if($this->form_validation->run() == FALSE) {
				$data['main_view'] = 'projects/create_project';
				$this->load->view('layouts/main', $data);
			} else {
				$data = array(
						'project_user_id' => $this->session->userdata('user_id'),
						'project_name' => $this->input->post('project_name'),
						'project_body' => $this->input->post('project_body')
						);
				if($this->Project_model->create_project($data)) {
					$this->session->set_flashdata('project_created', 'The project has been created successfuly');
					redirect('projects');
				}
			}
		}
		public function edit($project_id) {
			if(isset($project_id)) {
				$this->form_validation->set_rules('project_name', 'Project Name', 'trim|required|min_length[3]');
				$this->form_validation->set_rules('project_body', 'Project Description', 'trim|required');
				if($this->form_validation->run() == FALSE) {
					$data['project_data'] = $this->Project_model->get_project($project_id);
					$data['main_view'] = 'projects/edit_project';
					$this->load->view('layouts/main', $data);
				} else {
					$data = array(
							'project_user_id' => $this->session->userdata('user_id'),
							'project_name' => $this->input->post('project_name'),
							'project_body' => $this->input->post('project_body')
							);
					if($this->Project_model->edit_project($project_id, $data)) {
						$this->session->set_flashdata('project_updated', 'The project has been updated successfuly');
						redirect('projects');
					}
				} 
			} else {
				$this->session->set_flashdata("missing_variable", "<h1><p class='bg-danger text-center'>You haven't selected any project to edit.</p></h1>");
				redirect('home');
			}
		} 
		public function delete($project_id) {
			if(isset($project_id)) {
				$this->Project_model->delete_project($project_id);
				$this->Task_model->delete_project_tasks($project_id);
				$this->session->set_flashdata('project_deleted', 'The project has been deleted successfuly');
				redirect("projects");
			} else {
				$this->session->set_flashdata("missing_variable", "<h1><p class='bg-danger text-center'>You haven't selected any project to delete.</p></h1>");
				redirect("home");
			}
		}
	}
?>