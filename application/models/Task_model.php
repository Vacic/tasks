<?php 
	class Task_model extends CI_Model {
		public function get_task($task_id) {
			$this->db->where(['id' => $task_id]);
			$query = $this->db->get('tasks');
			return $query->row();
		}
		public function get_tasks($user_id) {
			$this->db->where(['task_user_id' => $user_id]);
			$query = $this->db->get('tasks');
			return $query->result();
		}
		public function get_project_tasks($project_id) {
			$this->db->where(['task_project_id' => $project_id]);
			$query = $this->db->get('tasks');
			return $query->result();
		}
		public function create($data) {
			$this->db->insert('tasks', $data);
			return TRUE;
		}
		public function edit($task_id, $data) {
			$this->db->where(['id' => $task_id]);
			$this->db->update('tasks', $data);
			return TRUE;
		}
		public function delete($task_id) {
			$this->db->where(['id' => $task_id]);
			$this->db->delete('tasks');
			return TRUE;
		}
		public function delete_project_tasks($project_id) {
			$this->db->where(['task_project_id' => $project_id]);
			$this->db->delete('tasks');
			return TRUE;
		}
		public function mark_complete($task_id) {
			$this->db->set('status', 1);
			$this->db->where('id', $task_id);
			$this->db->update('tasks');
			return TRUE;
		}
		public function mark_incomplete($task_id) {
			$this->db->set('status', 0);
			$this->db->where('id', $task_id);
			$this->db->update('tasks');
			return TRUE;
		}
	}
?>