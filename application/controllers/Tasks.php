<?php 
	class Tasks extends CI_Controller {
		public function __construct() {
			parent::__construct();
			if(!$this->session->userdata('logged_in')) {
				$this->session->set_flashdata('no_access', 'Sorry you are not allowed or not logged in');
				redirect('home');
			}
		}
		public function project_tasks($project_id) {
			if(isset($project_id)) {
				$data['tasks'] = $this->Task_model->get_project_tasks($project_id);
				$data['main_view'] = 'tasks/project_tasks';
				$this->load->view('layouts/main', $data);
			} else {
				$this->session->set_flashdata("missing_variable", "<h1><p class='bg-danger text-center'>You haven't selected any project's tasks.</p></h1>");
				redirect('home');
			}
		}
		public function index() {
			$data['tasks'] = $this->Task_model->get_tasks($this->session->userdata('user_id'));
			$data['main_view'] = 'tasks/index';
			$this->load->view('layouts/main', $data);
		}
		public function display($task_id) {
			if(isset($task_id)) {
				$data['task'] = $this->Task_model->get_task($task_id);
				$data['main_view'] = 'tasks/display';
				$this->load->view('layouts/main', $data);
			} else {
				$this->session->set_flashdata("missing_variable", "<h1><p class='bg-danger text-center'>You haven't selected any task.</p></h1>");
				redirect('home');
			}
		}
		public function create($project_id) {
			if(isset($project_id)) {
				$this->form_validation->set_rules('task_name', 'Task Name', 'trim|required|min_length[3]');
				$this->form_validation->set_rules('task_body', 'Task Description', 'trim|required');
				if($this->form_validation->run() == FALSE) {
					$data['main_view'] = 'tasks/create_task';
					$this->load->view('layouts/main', $data);
				} else {
					$data = array(
							'task_project_id' => $project_id,
							'task_user_id' => $this->session->userdata('user_id'),
							'task_name' => $this->input->post('task_name'),
							'task_body' => $this->input->post('task_body'),
							'due_date' => $this->input->post('due_date')
							);
					if($this->Task_model->create($data)) {
						$this->session->set_flashdata('task_created', 'The task has been created successfuly');
						redirect('tasks/project_tasks/'.$project_id);
					}
				}
			} else {
				$this->session->set_flashdata("missing_variable", "<h1><p class='bg-danger text-center'>A problem has occured.<br>Please try again.</p></h1>");
				redirect('home');
			}
		}
		public function edit($task_id) {
			if(isset($task_id)) {
				$this->form_validation->set_rules('task_name', 'Task Name', 'trim|required|min_length[3]');
				$this->form_validation->set_rules('task_body', 'Task Description', 'trim|required');
				if($this->form_validation->run() == FALSE) {
					$data['task_data'] = $this->Task_model->get_task($task_id);
					$data['main_view'] = 'tasks/edit_task';
					$this->load->view('layouts/main', $data);
				} else {
					$data = array(
							'task_name' => $this->input->post('task_name'),
							'task_body' => $this->input->post('task_body'),
							'due_date' => $this->input->post('due_date')
							);
					if($this->Task_model->edit($task_id, $data)) {
						$this->session->set_flashdata('task_updated', 'The task has been updated successfuly');
						$task_project_id = $this->Task_model->get_task($task_id)->task_project_id;
						redirect('tasks/project_tasks/'.$task_project_id);
					}
				}
			} else {
				$this->session->set_flashdata("missing_variable", "<h1><p class='bg-danger text-center'>You haven't selected any task to edit.</p></h1>");
				redirect('home');
			}
		}
		public function delete($task_id) {
			if(isset($task_id)) {
				$task_project_id = $this->Task_model->get_task($task_id)->task_project_id;
				$this->Task_model->delete($task_id);
				$this->session->set_flashdata('task_deleted', 'The task has been deleted successfuly');
				redirect('tasks/project_tasks/'.$task_project_id);
			} else {
				$this->session->set_flashdata("missing_variable", "<h1><p class='bg-danger text-center'>You haven't selected any task to delete.</p></h1>");
				redirect('home');
			}
		}
		public function mark_complete($task_id) {
			if($this->Task_model->mark_complete($task_id)) {
				$task_project_id = $this->Task_model->get_task($task_id)->task_project_id;
				$this->session->set_flashdata('mark_complete', 'Congratulations on completing your task!');
				redirect('projects/display/'.$task_project_id);
			} else {
				return false;
			}
		}
		public function mark_incomplete($task_id) {
			if($this->Task_model->mark_incomplete($task_id)) {
				$task_project_id = $this->Task_model->get_task($task_id)->task_project_id;
				$this->session->set_flashdata('mark_incomplete', 'Be sure to remember to finish this one!');
				redirect('projects/display/'.$task_project_id);
			} else {
				return false;
			}
		}
	}
?>