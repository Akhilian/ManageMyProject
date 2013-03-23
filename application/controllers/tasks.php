<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tasks extends CI_Controller {

	public function index() {
		redirect();
	}

	public function edit($idProject, $ganttId){

		$this->load->model('tasks_m');

		$tasks = $this->tasks_m->getFormattedTasks($ganttId);

		$this->load->view('header');
		$this->load->view('tasks/index', array('projectId' => $idProject, 'ganttId' => $ganttId, 'tasks' => $tasks));
		$this->load->view('footer');
	
	}
	
	public function step1($idProject, $ganttId) {

		$this->load->model('tasks_m');
	
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="alert">','</p>');
		
		$this->form_validation->set_rules('inputTitle', 'Intitulé', 'required|xss_clean');
		$this->form_validation->set_rules('inputDescription', 'Description', 'required');
		$this->form_validation->set_rules('inputCateg', 'Category', 'required');
		
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('header');
			$this->load->view('tasks/step1', array('projectId' => $idProject,
													'category' => $this->tasks_m->sortedCategories($ganttId),
													'ganttId' => $ganttId
												));
			$this->load->view('footer', array('js' => array('editor')));
		}
		else
		{
			$this->session->set_userdata($this->input->post());
			redirect('tasks/step2/' . $idProject . '/' . $ganttId);
		}
	}
	
	public function step2($idProject, $ganttId) {
	
		$this->load->model('tasks_m');
		$this->load->library('form_validation');
			
		if($this->input->post('form') == "date"){
			$this->form_validation->set_rules('inputStartDate', 'Date de début', 'required');
			$this->form_validation->set_rules('inputDuration', 'Durée', 'numeric|callback_endDate_check');	
		}
		else if($this->input->post('form') == "previous") {

			$this->form_validation->set_rules('tasks', 'Tache précédente', 'required');

		}
		
		
		if($this->form_validation->run() == false)
		{
			$this->load->view('header');
			$this->load->view('tasks/step2', array('projectId' => $idProject,
													'tasks' => $this->tasks_m->getAllTasks($ganttId),
													'ganttId' => $ganttId));
			$this->load->view('footer', array('js' => array('datepicker')));
			
		}
		else
		{
			$this->session->set_userdata($this->input->post());
			redirect('tasks/step3/' . $idProject . '/' . $ganttId);
		}
	}
	
	public function step3($idProject, $ganttId) {
	
		$this->load->model('tasks_m');
		
		$this->tasks_m->add($this->session->all_userdata());
		$this->tasks_m->clear();
		
		redirect('tasks/edit/' . $idProject . '/'. $ganttId);
	
/*		$this->load->library('form_validation');
		
		if($this->form_validation->run() == false)
		{
			$this->load->view('header');
			$this->load->view('tasks/step3', array('projectId' => $idProject,
													'category' => $this->tasks_m->sortedCategories($ganttId),
													'ganttId' => $ganttId));
			$this->load->view('footer');
		}
		else
		{
			echo '<pre>';
			print_r($this->session->all_userdata());
			echo '</pre>';
		}*/
	}
	
	public function endDate_check($str) {

		$data = $this->input->post();
		
		if( empty ($data['inputEndDate']) && empty ($data['inputDuration'])) {
			$this->form_validation->set_message('endDate_check', 'Veuillez renseigner une date de fin ou une durée pour la tache.');
			return false;
		}
		else
			return true;
	
	}

}

/* End of file tasks.php */
/* Location: ./application/controllers/tasks.php */