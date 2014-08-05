<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Register_controller extends CI_Controller{
     function __construct() {
         parent::__construct();
         $this->load->helper('url','form','html');
         $this->load->library('form_validation');
         if(!$this->session->userdata('logged_in')){
             redirect('logout');
         }elseif ($this->session->userdata('apartment')!=='admin') {
             redirect('logout');
        }
     }
     function index(){
         $data1=  $this->alert();
         $data2=  $this->alert1();
         $data3=  $this->alert2();
         $data4=  $this->alert3();
         $data5=  $this->alert4();
         $data6=  $this->alert5();
         $data7=  $this->alert6();
         $data8=  $this->alert7();
         $data9=  $this->show();
         $data10=  $this->show1();
         $data11=  $this->show2();
         $data12=  $this->show3();
         $data13=  $this->alert8();
         $data14=  $this->alert9();
         $data15=  $this->alert10();
         $data16=  $this->alert11();
         $data17=  $this->alert12();
         $data18=  $this->alert13();
         $data19=  $this->alert14();
         $data20=  $this->alert15();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+$data12
                 +$data13+$data14+$data15+$data16+$data17+$data18+$data19+$data20;
         $this->load->view('register_view',$data);
     }
     public function register_form(){
         $data1=  $this->alert();
         $data2=  $this->alert1();
         $data3=  $this->alert2();
         $data4=  $this->alert3();
         $data5=  $this->alert4();
         $data6=  $this->alert5();
         $data7=  $this->alert6();
         $data8=  $this->alert7();
         $data9=  $this->show();
         $data10=  $this->show1();
         $data11=  $this->show2();
         $data12=  $this->show3();
         $data13=  $this->alert8();
         $data14=  $this->alert9();
         $data15=  $this->alert10();
         $data16=  $this->alert11();
         $data17=  $this->alert12();
         $data18=  $this->alert13();
         $data19=  $this->alert14();
         $data20=  $this->alert15();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+$data12
                 +$data13+$data14+$data15+$data16+$data17+$data18+$data19+$data20;
         $this->form_validation->set_rules('fn','First name','trim|required|xss_clean');
         $this->form_validation->set_rules('sn','Second name','trim|required|xss_clean');
         $this->form_validation->set_rules('us','Username','trim|required|is_unique[tb_user.username]|xss_clean');
         $this->form_validation->set_rules('em','Email','trim|required|valid_email|is_unique[tb_user.email]|xss_clean');
         $this->form_validation->set_rules('pd','Password','trim|required|min_lenght[8]|xss_clean');
         if($this->form_validation->run()===FALSE){
             $this->load->view('register_view',$data);
         }  else {
             $this->load->model('registration_model');
             $first_name=  $this->input->post('fn');
             $sec_name=  $this->input->post('sn');
             $username=  $this->input->post('us');
             $email=  $this->input->post('em');
             $password= md5($this->input->post('pd'));
             $position=  $this->input->post('position');
             $roles=  $this->session->userdata('role_station');
             $this->registration_model->registration($first_name,$sec_name,$username,$email,$password,$position,$roles);
             $data['smg']='<font color="blue">Account of'.' '.ucfirst(strtolower(addslashes($username))).' has successifully created</font>';
              $this->load->view('register_view',$data);
         }
     }
     public function alert(){
         $res=  $this->db->select_sum('Litre_petrol')->from('tb_petrol')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $array=array(
                     'Litre_petrol'=>$row->Litre_petrol
                 );
             }
             unset($row);
             return $array;
         }  else {
            $array=array(
                     'Litre_petrol'=>''
                 ); 
            return $array;
         }
     }
     public function alert1() {
       $res1=  $this->db->select_sum('sold_litre')->from('tb_petrol')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
       if($res1->num_rows()>0){
           foreach ($res1->result() as $row){
               $array=array(
                   'sold_litre'=>$row->sold_litre
               );
           }
           unset($row);
           return $array;
       }  else {
           $array=array(
                   'sold_litre'=>''
               );
           return $array;
       }
     }
      public function alert2(){
         $res=  $this->db->select_sum('Litre_diesel')->from('tb_diesel')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $array=array(
                     'Litre_diesel'=>$row->Litre_diesel
                 );
             }
             unset($row);
             return $array;
         }  else {
             $array=array(
                     'Litre_diesel'=>''
                 );
             return $array;
         }
     }
     public function alert3() {
       $res1=  $this->db->select_sum('sold_litre')->from('tb_diesel')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
       if($res1->num_rows()>0){
           foreach ($res1->result() as $row){
               $array=array(
                   'sold_litre1'=>$row->sold_litre
               );
           }
           unset($row);
           return $array;
       }  else {
           $array=array(
                   'sold_litre1'=>''
               );
               return $array;
       }
     }
      public function alert4(){
         $res=  $this->db->select_sum('Litre_kerosine')->from('tb_kerosine')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $array=array(
                     'Litre_kerosine'=>$row->Litre_kerosine
                 );
             }
             unset($row);
             return $array;
         }  else {
             $array=array(
                     'Litre_kerosine'=>''
                 );
             return $array;
         }
     }
     public function alert5() {
       $res1=  $this->db->select_sum('sold_litre')->from('tb_kerosine')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
       if($res1->num_rows()>0){
           foreach ($res1->result() as $row){
               $array=array(
                   'sold_litre2'=>$row->sold_litre
               );
           }
           unset($row);
           return $array;
       }  else {
           $array=array(
                   'sold_litre2'=>''
               );
           return $array;
       }
     }
      public function alert6(){
         $res=  $this->db->select_sum('Litre_oil')->from('tb_oil')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $array=array(
                     'Litre_oil'=>$row->Litre_oil
                 );
             }
             unset($row);
             return $array;
         }  else {
             $array=array(
                     'Litre_oil'=>''
                 );
             return $array;
         }
     }
     public function alert7() {
       $res1=  $this->db->select_sum('sold_litre')->from('tb_oil')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
       if($res1->num_rows()>0){
           foreach ($res1->result() as $row){
               $array=array(
                   'sold_litre3'=>$row->sold_litre
               );
           }
           unset($row);
           return $array;
       }  else {
           $array=array(
                   'sold_litre3'=>''
               );
            return $array;
       }
     }
       public function alert8() {
       $res1=  $this->db->select_sum('expected_amount')->from('tb_petrol')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
       if($res1->num_rows()>0){
           foreach ($res1->result() as $row){
               $array=array(
                   'expected_amount'=>$row->expected_amount
               );
           }
           unset($row);
           return $array;
       }  else {
           $array=array(
                   'expected_amount'=>''
               );
           return $array;
       }
       }
       public function alert9() {
       $res1=  $this->db->select_sum('expected_amount')->from('tb_kerosine')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
       if($res1->num_rows()>0){
           foreach ($res1->result() as $row){
               $array=array(
                   'expected_amount1'=>$row->expected_amount
               );
           }
           unset($row);
           return $array;
       }  else {
           $array=array(
                   'expected_amount1'=>''
               );
           return $array;
       }
       }
       public function alert10() {
       $res1=  $this->db->select_sum('expected_amount')->from('tb_diesel')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
       if($res1->num_rows()>0){
           foreach ($res1->result() as $row){
               $array=array(
                   'expected_amount2'=>$row->expected_amount
               );
           }
           unset($row);
           return $array;
       }  else {
          $array=array(
                   'expected_amount2'=>''
               ); 
          return $array;
       }
       }
       public function alert11() {
       $res1=  $this->db->select_sum('expected_amount')->from('tb_oil')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
       if($res1->num_rows()>0){
           foreach ($res1->result() as $row){
               $array=array(
                   'expected_amount3'=>$row->expected_amount
               );
           }
           unset($row);
           return $array;
       }  else {
          $array=array(
                   'expected_amount3'=>''
               ); 
          return $array;
       }
     }
     public function alert12() {
       $res1=  $this->db->select_sum('sold_amount')->from('tb_petrol')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
       if($res1->num_rows()>0){
           foreach ($res1->result() as $row){
               $array=array(
                   'sold_amount1'=>$row->sold_amount
               );
           }
           unset($row);
           return $array;
       }  else {
         $array=array(
                   'sold_amount1'=>''
               );
         return $array;
       }
       }
       public function alert13() {
       $res1=  $this->db->select_sum('sold_amount')->from('tb_kerosine')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
       if($res1->num_rows()>0){
           foreach ($res1->result() as $row){
               $array=array(
                   'sold_amount2'=>$row->sold_amount
               );
           }
           unset($row);
           return $array;
       }  else {
           $array=array(
                   'sold_amount2'=>''
               );
            return $array;
       }
       }
       public function alert14() {
       $res1=  $this->db->select_sum('sold_amount')->from('tb_diesel')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
       if($res1->num_rows()>0){
           foreach ($res1->result() as $row){
               $array=array(
                   'sold_amount3'=>$row->sold_amount
               );
           }
           unset($row);
           return $array;
       }  else {
          $array=array(
                   'sold_amount3'=>''
               );
          return $array;
       }
       }
       public function alert15() {
       $res1=  $this->db->select_sum('sold_amount')->from('tb_oil')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
       if($res1->num_rows()>0){
           foreach ($res1->result() as $row){
               $array=array(
                   'sold_amount4'=>$row->sold_amount
               );
           }
           unset($row);
           return $array;
       }  else {
          $array=array(
                   'sold_amount4'=>''
               ); 
          return $array;
       }
     }
     function show(){
         $res=  $this->db->get_where('tb_petrol',array('stat_role'=>  $this->session->userdata('role_station')));
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $array=array(
                     'Litre_petrol'=>$row->Litre_petrol,
                     'purchased_amount'=>$row->purchased_amount,
                     'admin_name'=>$row->admin_name,
                     'Expected_amount'=>$row->expected_amount,
                     'seller_name'=>$row->seller_name,
                     'entray_date'=>$row->entray_date,
                     'sold_litre'=>$row->sold_litre,
                     'sold_amount'=>$row->sold_amount
                 );
             }
             unset($row);
             return $array;
         }  else {
             $array=array(
                     'Litre_petrol'=>'',
                     'purchased_amount'=>'',
                     'admin_name'=>'',
                     'Expected_amount'=>'',
                     'seller_name'=>'',
                     'entray_date'=>'',
                     'sold_litre'=>'',
                     'sold_amount'=>''
                 );
             return $array;
         }
     }
     function show1(){
         $res=  $this->db->get_where('tb_diesel',array('stat_role'=>  $this->session->userdata('role_station')));
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $array=array(
                     'Litre_diesel'=>$row->Litre_diesel,
                     'purchased_amount1'=>$row->purchased_amount,
                     'admin_name1'=>$row->admin_name,
                     'Expected_amount1'=>$row->expected_amount,
                     'seller_name1'=>$row->seller_name,
                     'entray_date1'=>$row->entray_date,
                     'sold_litre1'=>$row->sold_litre,
                     'sold_amount1'=>$row->sold_amount
                 );
             }
             unset($row);
             return $array;
         }  else {
             $array=array(
                     'Litre_diesel'=>'',
                     'purchased_amount1'=>'',
                     'admin_name1'=>'',
                     'Expected_amount1'=>'',
                     'seller_name1'=>'',
                     'entray_date1'=>'',
                     'sold_litre1'=>'',
                     'sold_amount1'=>''
                 );
             return $array;
         }
     }
     function show2(){
         $res=  $this->db->get_where('tb_kerosine',array('stat_role'=>  $this->session->userdata('role_station')));
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $array=array(
                     'Litre_kerosine'=>$row->Litre_kerosine,
                     'purchased_amount2'=>$row->purchased_amount,
                     'admin_name2'=>$row->admin_name,
                     'Expected_amount2'=>$row->expected_amount,
                     'seller_name2'=>$row->seller_name,
                     'entray_date2'=>$row->entray_date,
                     'sold_litre2'=>$row->sold_litre,
                     'sold_amount2'=>$row->sold_amount
                 );
             }
             unset($row);
             return $array;
         }  else {
             $array=array(
                     'Litre_kerosine'=>'',
                     'purchased_amount2'=>'',
                     'admin_name2'=>'',
                     'Expected_amount2'=>'',
                     'seller_name2'=>'',
                     'entray_date2'=>'',
                     'sold_litre2'=>'',
                     'sold_amount2'=>''
                 );
             return $array;
         }
     }
     function show3(){
         $res=  $this->db->get_where('tb_oil',array('stat_role'=>  $this->session->userdata('role_station')));
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $array=array(
                     'Litre_oil'=>$row->Litre_oil,
                     'purchased_amount3'=>$row->purchased_amount,
                     'admin_name3'=>$row->admin_name,
                     'Expected_amount3'=>$row->expected_amount,
                     'seller_name3'=>$row->seller_name,
                     'entray_date3'=>$row->entray_date,
                     'sold_litre3'=>$row->sold_litre,
                     'sold_amount3'=>$row->sold_amount
                 );
             }
             unset($row);
             return $array;
         }  else {
            $array=array(
                     'Litre_oil'=>'',
                     'purchased_amount3'=>'',
                     'admin_name3'=>'',
                     'Expected_amount3'=>'',
                     'seller_name3'=>'',
                     'entray_date3'=>'',
                     'sold_litre3'=>'',
                     'sold_amount3'=>''
                 ); 
            return $array;
         }
     }
 }

