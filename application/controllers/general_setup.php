<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class General_setup extends CI_Controller{
     function __construct() {
         parent::__construct();
         $this->load->helper('url','form','html');
         $this->load->library('form_validation');
         if(!$this->session->userdata('logged_in')){
             redirect('logout');
         }  elseif($this->session->userdata('apartment')!=='seller'){
             redirect('logout');
         }
     }
     
     function index(){
         $this->load->view('password_change');
     }
     public function change(){
         $this->form_validation->set_rules('pd','Current password','trim|required|xss_clean');
         $this->form_validation->set_rules('npd','New password','trim|required|matches[confpd]|xss_clean');
         $this->form_validation->set_rules('confpd','Confirm password','trim|required|xss_clean');
         if($this->form_validation->run()===FALSE){
             $this->load->view('password_change');
         }  else {
             $sn=  $this->session->userdata('username');
             $curr_password= md5($this->input->post('pd'));
             $new_pasword= md5($this->input->post('npd'));
             $query1=  $this->db->get_where('tb_user',array('email'=>$sn,'password'=>$curr_password),1);
             $query= $this->db->get_where('tb_user',array('username'=>$sn,'password'=>$curr_password),1);
             if($query->num_rows()===1){
                 $row=$query->row();
                 $ses_array=array(
                     'username'=>$sn,
                     'email'=>$row->email,
                     'password'=>$new_pasword
                 );
                 $this->db->where('username',$sn);
                 $this->db->update('tb_user',$ses_array);
                 $data['smg']='Your password have changed successifuly';
                 $this->load->view('password_change',$data);
              }elseif ($query1->num_rows()===1) {
                $row1=$query1->row();
                 $ses_array=array(
                     'username'=>$row1->username,
                     'email'=>$sn,
                     'password'=>$new_pasword
                 );
                 $this->db->where('email',$sn);
                 $this->db->update('tb_user',$ses_array);
                 $data['smg1']='Your password have changed successifuly';
                 $this->load->view('password_change',$data);
            }  else {
               $data['smg2']='Invalid current password..! Try Again..!';
               $this->load->view('password_change',$data);
            }
         }
     }
 }

