<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Admin_profile extends CI_Controller{
     function __construct() {
         parent::__construct();
         $this->load->helper('url','form','html');
         $this->load->library('form_validation');
         if(!$this->session->userdata('logged_in')){
             redirect('logout');
         }elseif($this->session->userdata('apartment')!=='admin'){
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
         $data9=  $this->alert8();
         $data10=  $this->alert9();
         $data11=  $this->alert10();
         $data12=  $this->alert11();
         $data13=  $this->alert12();
         $data14=  $this->alert13();
         $data15=  $this->alert14();
         $data16=  $this->alert15();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10
                 +$data11+$data12+$data13+$data14+$data15+$data16;
        $this->load->view('profile_view',$data);
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
       }
     }
 }