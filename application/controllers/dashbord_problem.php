<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Dashbord_problem extends CI_Controller{
     function __construct() {
         parent::__construct();
         $this->load->helper('url','form','html');
         $this->load->library('form_validation');
         if(!$this->session->userdata('logged_in')){
             redirect('logout');
         }elseif ($this->session->userdata('apartment')!=='seller') {
             redirect('logout');
        }
     }
     public function index(){
         $this->form_validation->set_rules('ustxt','Problem','trim|required|xss_clean');
         $this->form_validation->set_rules('usr','Member','trim|required|xss_clean');
         if($this->form_validation->run()===FALSE){
         $this->load->view('problem_user');
     }  else {
         $this->load->model('problem_model');
         $user=  $this->session->userdata('username');
         $problem=  $this->input->post('ustxt');
         $problem_choose=  $this->input->post('usr');
         $roles=  $this->session->userdata('role_station');
         $this->problem_model-> problem_insert($user,$problem,$problem_choose,$roles);
         $data['data']='<p class="alert-success">Your comment has been sent...!</p>';
         $this->load->view('problem_user',$data);
     }
     }
     function today(){
         
     }
 }