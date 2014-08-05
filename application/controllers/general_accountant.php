<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class General_accountant extends CI_Controller{
     function __construct() {
         parent::__construct();
         $this->load->helper('url','form','html');
         $this->load->library('form_validation');
         if(!$this->session->userdata('logged_in')){
             redirect('logout');
         }  elseif($this->session->userdata('apartment')!=='accountant'){
             redirect('logout');
         }
     }
     
     function index(){
         $this->load->view('password_change2');
     }
     public function change(){
         $this->form_validation->set_rules('pd','Current password','trim|required|xss_clean');
         $this->form_validation->set_rules('npd','New password','trim|required|matches[confpd]|xss_clean');
         $this->form_validation->set_rules('confpd','Confirm password','trim|required|xss_clean');
         if($this->form_validation->run()===FALSE){
             $this->load->view('password_change2');
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
                 $this->load->view('password_change2',$data);
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
                 $this->load->view('password_change2',$data);
            }
            else {
               $data['smg2']='Invalid current password..! Try Again..!';
               $this->load->view('password_change2',$data);
            }
         }
     }
     public function burger(){
         $this->form_validation->set_rules('txt','Problem','trim|required|xss_clean');
         $this->form_validation->set_rules('people','Receipient','trim|required|xss_clean');
         if($this->form_validation->run()===FALSE){
          $this->load->view('accountant_problem');
         }else{
         $this->load->model('accountant_model');
         $sender=  $this->session->userdata('username');
         $problem=  $this->input->post('txt');
         $receiver=  $this->input->post('people');
         $roles=  $this->session->userdata('role_station');
         $this->accountant_model->reporter($sender,$problem,$receiver,$roles);
         $data['sms']='<p class="alert-success">Your problem has sent.!</p>';
         $this->load->view('accountant_problem',$data);
         }
     }
     public function count(){
     $res1=  $this->db->get_where('tb_problem',array('receiver'=>'accountant','status'=>'unchecked','stat_role'=>  $this->session->userdata('role_station')));
     if ($res1->num_rows()>0){
         $data['msg']=$res1;
         $this->load->view('accountant_smg',$data);
     }else {
      $data['msg1']='<p class="label-info">Inbox Empty.!</p>';
      $this->load->view('accountant_smg',$data);  
     }
      
     }
    public function msg_view($id){
    $res= $this->db->get_where('tb_problem',array('id'=>$id));
    if($res->num_rows()===1){
        $this->db->where('id',$id);
        $this->db->update('tb_problem',array('status'=>'checked'));
        foreach ($res->result() as $ros){
            $data_sess=array(
                'problem'=>$ros->problem,
                'id'=>$ros->id
            );
        }
        unset($ros);
        $this->load->view('accountant_details',$data_sess);
    }
 }
  public function delete($id){
    $del= $this->db->get_where('tb_problem',array('id'=>$id,'receiver'=>'accountant'));
    if($del->num_rows()===1){
        $this->db->where('id',$id);
        $this->db->delete('tb_problem');
       foreach ($del->result() as $ros){
            $data_sess=array(
                'problem'=>$ros->problem,
                'id'=>$ros->id
            );
        }
        unset($ros);
        $this->load->view('accountant_details',$data_sess);
 }  else {
     $data['msg1']='<p class="label-info">Message deleted.!</p>';
      $this->load->view('accountant_smg',$data); 
 }
 }
 public function overviews(){
     $res=  $this->db->get_where('tb_petrol',array('seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
     if($res->num_rows()>0){
        $data['petrol']=$res; 
     $this->load->view('accountant_overview',$data);
     }  else {
     $data['sms']='<p class="text-warning">No result found</p>'; 
     $this->load->view('accountant_overview',$data);  
     }
 }
 public function overviews1(){
    $res=  $this->db->get_where('tb_diesel',array('seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
     if($res->num_rows()>0){
        $data['petrol']=$res; 
     $this->load->view('accountant_overview1',$data);
     } else {
        $data['sms']='<p class="text-warning">No result found</p>'; 
     $this->load->view('accountant_overview1',$data);  
     }
 }
 public function overviews2(){
    $res=  $this->db->get_where('tb_kerosine',array('seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
     if($res->num_rows()>0){
        $data['petrol']=$res; 
     $this->load->view('accountant_overview2',$data);
     }  else {
       $data['sms']='<p class="text-warning">No result found</p>'; 
     $this->load->view('accountant_overview2',$data);   
     } 
 }
 public function overviews3(){
     $this->load->view('accountant_overview3');
     } 

 public function petrol($id){
     $res=  $this->db->get_where('tb_petrol',array('id'=>$id,'stat_role'=>  $this->session->userdata('role_station')));
     if($res->num_rows()===1){
         foreach ($res->result() as $row){
             $petrol_data=array(
                 'seller_name'=>$row->seller_name,
                 'sold_litre'=>$row->sold_litre,
                 'sold_amount'=>$row->sold_amount,
                 'sold_date'=>$row->sold_date,
                 'customer_name'=>$row->customer_credit_name,
                 'credit_litre'=>$row->credit_litre,
                 'credit_amount'=>$row->credit_amount
             );
         }
         unset($row);
         $this->load->view('petrol_seller_info',$petrol_data);
     }
 }
 function printoverview($id){
     $this->load->helper('dompdf','file');
     $res=  $this->db->get_where('tb_petrol',array('id'=>$id,'stat_role'=>  $this->session->userdata('role_station')));
     if($res->num_rows()===1){
         foreach ($res->result() as $row){
             $petrol_data=array(
                 'seller_name'=>$row->seller_name,
                 'sold_litre'=>$row->sold_litre,
                 'sold_amount'=>$row->sold_amount,
                 'sold_date'=>$row->sold_date,
                 'customer_name'=>$row->customer_credit_name,
                 'credit_litre'=>$row->credit_litre,
                 'credit_amount'=>$row->credit_amount
             );
         }
         unset($row);
      $doc= $this->load->view('petrol_seller_info',$petrol_data,TRUE);
      $htc='petrol info';
      pdf_create($doc,$htc,TRUE);
     }
 }
 function printoverview1($id){
     $this->load->helper('dompdf','file');
     $res=  $this->db->get_where('tb_diesel',array('id'=>$id,'stat_role'=>  $this->session->userdata('role_station')));
     if($res->num_rows()===1){
         foreach ($res->result() as $row){
             $petrol_data=array(
                 'seller_name1'=>$row->seller_name,
                 'sold_litre1'=>$row->sold_litre,
                 'sold_amount1'=>$row->sold_amount,
                 'sold_date1'=>$row->sold_date,
                 'customer_name1'=>$row->customer_credit_name,
                 'credit_litre1'=>$row->credit_litre,
                 'credit_amount1'=>$row->credit_amount
             );
         }
         unset($row);
      $doc= $this->load->view('diesel_seller_info',$petrol_data,TRUE);
      $htc='diesel info';
      pdf_create($doc,$htc,TRUE);
     }
 }
 function printoverview2($id){
     $this->load->helper('dompdf','file');
     $res=  $this->db->get_where('tb_kerosine',array('id'=>$id,'stat_role'=>  $this->session->userdata('role_station')));
     if($res->num_rows()===1){
         foreach ($res->result() as $row){
             $petrol_data=array(
                 'seller_name2'=>$row->seller_name,
                 'sold_litre2'=>$row->sold_litre,
                 'sold_amount2'=>$row->sold_amount,
                 'sold_date2'=>$row->sold_date,
                 'customer_name2'=>$row->customer_credit_name,
                 'credit_litre2'=>$row->credit_litre,
                 'credit_amount2'=>$row->credit_amount
             );
         }
         unset($row);
      $doc= $this->load->view('kerosine_seller_info',$petrol_data,TRUE);
      $htc='kerosine info';
      pdf_create($doc,$htc,TRUE);
     }
 }
 function printoverview3($id){
     $this->load->helper('dompdf','file');
     $res=  $this->db->get_where('tb_oil',array('id'=>$id,'stat_role'=>  $this->session->userdata('role_station')));
     if($res->num_rows()===1){
         foreach ($res->result() as $row){
             $petrol_data=array(
                 'seller_name3'=>$row->seller_name,
                 'sold_litre3'=>$row->sold_litre,
                 'sold_amount3'=>$row->sold_amount,
                 'sold_date3'=>$row->sold_date,
                 'customer_name3'=>$row->customer_credit_name,
                 'credit_litre3'=>$row->credit_litre,
                 'credit_amount3'=>$row->credit_amount
             );
         }
         unset($row);
      $doc= $this->load->view('oil_seller_info',$petrol_data,TRUE);
      $htc='oil info';
      pdf_create($doc,$htc,TRUE);
     }
 }

 public function diesel($id){
     $res=  $this->db->get_where('tb_diesel',array('id'=>$id,'stat_role'=>  $this->session->userdata('role_station')));
     if($res->num_rows()===1){
         foreach ($res->result() as $row){
             $petrol_data=array(
                 'seller_name1'=>$row->seller_name,
                 'sold_litre1'=>$row->sold_litre,
                 'sold_amount1'=>$row->sold_amount,
                 'sold_date1'=>$row->sold_date,
                 'customer_name1'=>$row->customer_credit_name,
                 'credit_litre1'=>$row->credit_litre,
                 'credit_amount1'=>$row->credit_amount
             );
         }
         unset($row);
         $this->load->view('diesel_seller_info',$petrol_data);
     }
 }
 public function kerosine($id){
     $res=  $this->db->get_where('tb_kerosine',array('id'=>$id,'stat_role'=>  $this->session->userdata('role_station')));
     if($res->num_rows()===1){
         foreach ($res->result() as $row){
             $petrol_data=array(
                 'seller_name2'=>$row->seller_name,
                 'sold_litre2'=>$row->sold_litre,
                 'sold_amount2'=>$row->sold_amount,
                 'sold_date2'=>$row->sold_date,
                 'customer_name2'=>$row->customer_credit_name,
                 'credit_litre2'=>$row->credit_litre,
                 'credit_amount2'=>$row->credit_amount
             );
         }
         unset($row);
         $this->load->view('kerosine_seller_info',$petrol_data);
     }
 }
 public function oil($id){
     $res=  $this->db->get_where('tb_oil',array('id'=>$id,'stat_role'=>  $this->session->userdata('role_station')));
     if($res->num_rows()===1){
         foreach ($res->result() as $row){
             $petrol_data=array(
                 'seller_name3'=>$row->seller_name,
                 'sold_litre3'=>$row->sold_qnty,
                 'sold_amount3'=>$row->sold_amount,
                 'sold_date3'=>$row->sold_date,
                 'customer_name3'=>$row->customer_credit_name,
                 'credit_litre3'=>$row->credit_litre,
                 'credit_amount3'=>$row->credit_amount
             );
         }
         unset($row);
         $this->load->view('oil_seller_info',$petrol_data);
     }
 }
 function expenditure($id){
     $data['exp']=$id;
     $this->load->view('expenditureinfo',$data);
 }
 function expendits_cash(){
     $this->load->view('expenditure_cash');
 }
 function oil_loads($id){
     $data['oil']=$id;
     $this->load->view('oilLoader',$data);
 }
 }



