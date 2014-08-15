<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class General_admin extends CI_Controller{
     function __construct() {
         parent::__construct();
         $this->load->helper('url','form','html');
         $this->load->library('form_validation');
         if(!$this->session->userdata('logged_in')){
             redirect('logout');
         }  elseif($this->session->userdata('apartment')!=='admin'){
             redirect('logout');
         }
     }
     
     function index(){
         $this->load->view('password_change1');
     }
     public function change(){
         $this->form_validation->set_rules('pd','Current password','trim|required|xss_clean');
         $this->form_validation->set_rules('npd','New password','trim|required|matches[confpd]|xss_clean');
         $this->form_validation->set_rules('confpd','Confirm password','trim|required|xss_clean');
         if($this->form_validation->run()===FALSE){
             $this->load->view('password_change1');
         }  else {
             $sn=  $this->session->userdata('username');
             $curr_password= md5($this->input->post('pd'));
             $new_pasword= md5($this->input->post('npd'));
             $query1="select * from tb_user where email='$sn' and password='$curr_password' limit 1";
             $res1=  $this->db->query($query1);
             $query="select * from tb_user where username='$sn' and password='$curr_password' limit 1";
             $res=  $this->db->query($query);
             if($res->num_rows()===1){
                 $row=$res->row();
                 $ses_array=array(
                     'username'=>$sn,
                     'email'=>$row->email,
                     'password'=>$new_pasword
                 );
                 $this->db->where('username',$sn);
                 $this->db->update('tb_user',$ses_array);
                 $data['smg']='Your password have changed successifuly';
                 $this->load->view('password_change1',$data);
             }elseif ($query1->num_rows()===1) {
                $row1=$res1->row();
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
               $this->load->view('password_change1',$data);
            }
         }
     }
 }



