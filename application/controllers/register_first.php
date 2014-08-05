<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Register_first extends CI_Controller{
     function __construct() {
         parent::__construct();
         $this->load->helper('url','form','html');
         $this->load->library('form_validation');
         
     }
     function forgot_password(){
         $this->form_validation->set_rules('us','Username or Email','trim|required|xss_clean');
         if($this->form_validation->run()===FALSE){
             $this->load->view('forgot_password');
         }  else {
          $username= $this->input->post('us');
          $res=  $this->db->get_where('tb_user',array('email'=>$username),1);
          $res2=  $this->db->get_where('tb_user',array('username'=>$username),1);
         if($res->num_rows()===1){
             $row=$res->row();
             $array=array(
                 'username'=>$row->username,
                 'email'=>$username
             );
           $this->session->set_userdata($array);
           $data['data']=$username;
           $this->load->view('password_retrival',$data);
         }elseif ($res2->num_rows()===1) {
             $row1=$res2->row();
            $array=array(
                'username'=>$username,
                'email'=>$row1->email
            );
            $this->session->set_userdata($array);
            $data['data']=$username;
           $this->load->view('password_retrival',$data);
        }  else {
            $data['data']='<p>Invalid Username or Email</p>';
           $this->load->view('forgot_password',$data);
        }
            
         }
     }
     function password_retrival(){
         $this->form_validation->set_rules('pd','Password','trim|required|matches[confpd]|xss_clean');
         $this->form_validation->set_rules('confpd','Confirm password','trim|required|xss_clean');
         if($this->form_validation->run()===FALSE){
             $this->load->view('password_retrival');
         }  else {
             $password=  md5($this->input->post('pd'));
             $sn=  $this->session->userdata('username');
             $sn2=  $this->session->userdata('email');
              $res=  $this->db->get_where('tb_user',array('email'=>$sn2),1);
              $res2=  $this->db->get_where('tb_user',array('username'=>$sn),1);
              if($res->num_rows()===1){
                  $array_data=array('password'=>$password);
                  $this->db->where('email',$sn2);
                  $this->db->update('tb_user',$array_data);
                  $data['data1']='<font color="blue">Your password has updated.!</font>';
                  $this->load->view('password_retrival',$data);
              }elseif ($res2->num_row()===1) {
                    $data_record=array('password'=>$password);
                    $this->db->where('username',$sn);
                    $this->db->update('tb_user',$data_record);
                    $data['data1']='<font color="blue">Your password has updated.!</font>';
                    $this->load->view('password_retrival',$data);
            }
         }
     }
 }
 

