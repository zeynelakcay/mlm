<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class ContactType extends My_Controller
{
	function __construct()
	{ 
		parent::__construct(); 
		$this->load->model("contacttypemodel","omodel");
	}
	
	public function Index()
	{     
		 $this->load->view("ContactType/index"); 
	}
	
	public function display()
	{ 
		$result=$this->omodel->display();  
		$resultArr = array();
		foreach ($result as $row) {
			$resultArr[] = array($row ['Id'],$row ['Id'],$row ['TypeName']);
		} 
		echo json_encode(array("aaData" => $resultArr));
	}
	
	public function create()
	{ 
		$this->load->view("ContactType/create");
	}
	
	public function createhit()
	{
		$this->form_validation->set_rules('TypeName', 'TypeName', 'required|trim|xss_clean');

		if ($this->form_validation->run())
		{
			
		  
			$data = array('TypeName' => $this->input->post('TypeName'));
			$insert = $this->omodel->save($data);
			 
			echo json_encode(array("status" => true));
		}
		else
		{
			 echo json_encode(array("status" => false,"errors" =>validation_errors())); 
		} 
	}
	
	 
	public function edit($id)
	{
		$ContactType= $this->omodel->byId($id);
		$this->load->view("ContactType/edit",["ContactType"=> $ContactType]);
	}
	
	public function edithit()
	{   
		$this->form_validation->set_rules('TypeName', 'TypeName', 'required|trim|xss_clean');

		if ($this->form_validation->run())
		{ 
			
 
			$data = array('TypeName' => $this->input->post('TypeName'));
			
			$this->omodel->update(array('Id' => $this->input->post('Id')), $data);
		
			echo json_encode(array("status" => true));
		}
		else
		{
			echo json_encode(array("status" => false,"errors" =>validation_errors()));
		}
	}
	 
	public function deletehit($id)
	{ 
		$this->omodel->deleteById($id);
		echo json_encode(array("status" => TRUE));
	}
	
}
