<?php
class FileController extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('filemodel');
	}
	
	function index(){
		$this->load->view('formulaire');
	}
	
	function insert(){
		$data['message'] ='';
		if ($_POST['compte']!='' && $_POST['mdp']!=''){
			$this->filemodel->insert_string($_POST['compte']);
			$this->filemodel->insert_string($_POST['mdp']);
			$data['message'] ="<font color='green'><b>Compte enregistré avec succès !</b></font>";
		}
		$this->load->view('formulaire',$data);
	}
	
	function show(){
		$data['comptes'] = $this->filemodel->get_strings();
		$this->load->view('formulaire',$data);
	}
        
        function delete(){
            $data['comptes'] = $this->filemodel->delete_strings();
            $data['message']="<font color='red'><b>Comptes supprimés avec succès ! </b></font>";
            $this->load->view('formulaire', $data);
        }
}
?>