<?php
class Blog extends CI_Controller {

	public function index()
	{
		// retrieve all blogs from Blog_model
		$data['blogs'] = $this->Blog_model->get_all();

		// Set view and pass $data to view
		$this->template->show('blogs/index', $data);
	}

	public function create()
	{

		// load form helper
		$this->load->helper('form');

		// Set Validation Rules
		$this->validate();

		if ($this->form_validation->run() === FALSE)
		{
			// validation fail and if it was ajax request
			if ($this->input->is_ajax_request()) {

				// set error status
				http_response_code(400);

				// echo validation errors and exit
				echo validation_errors();
				exit();
			}

			// set view
			$this->template->show('blogs/add');
		}
		else
		{

			// collect data from input
			$data = array(
				'title' => $this->input->post('title'),
				'content' => $this->input->post('content'),
			);

			// sent data to model
			$blog = $this->Blog_model->create($data);

			// get latest added id
			$blog_id = $this->db->insert_id();

			// if it was ajax request
			if ($this->input->is_ajax_request()) {

				// sent $blog_id
				echo $blog_id;
				exit();
			}

			// if normal request, redirect to /blog
			redirect("blog");
		}
	}

	public function edit($id)
	{
		//load form helper
		$this->load->helper('form');
		// do validation
		$this->validate();

		// if validation fail
		if ($this->form_validation->run() === FALSE)
		{
			// if it was ajax request
			if ($this->input->is_ajax_request()) {

				// set status code
				http_response_code(400);

				// show validation error in exit
				echo validation_errors();
				exit();
			}

			// get single blog from model by $id
			$data['blog'] = $this->Blog_model->find($id);

			//set view
			$this->template->show('blogs/edit', $data);
		}
		else
		{

			// collect data from input
			$data = array(
				'id' => $this->input->post('id'),
				'title' => $this->input->post('title'),
				'content' => $this->input->post('content'),
			);

			// sent updated data to model
			$blog = $this->Blog_model->update($data);

			// if it was ajax
			if ($this->input->is_ajax_request()) {

				// echo messages
				echo 'Succefully Updated';
				exit();
			}
			// If it was normal request, redirect to /blog
			redirect("blog");
		}
	}

	public function delete() {

		// get id by uri setment
		$id = $this->uri->segment(3);

		// ask Blog_model to delete
		$this->Blog_model->delete($id);

		// if it was ajax
		if ($this->input->is_ajax_request()) {

			// show message and exit;
			echo 'Succefully Deleted';
			exit();
		}
		// if it was normal, redirect to blog
		redirect("blog");
	}

	// refectored validation rules to follow DRY
	private function validate() {

		// set validation rules
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');
	}

}