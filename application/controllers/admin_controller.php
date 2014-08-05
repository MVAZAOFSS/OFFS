<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');
 class Admin_controller extends CI_Controller{
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
         $data17=  $this->alert12();
         $data18=  $this->alert13();
         $data19=  $this->alert14();
         $data20=  $this->alert15();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+$data12
                 +$data13+$data14+$data15+$data17+$data18+$data19+$data20;
         $data['results']=  $this->member();
         $data['petrol']=  $this->petrol_summaries();
         $data['diesel']=  $this->diesel_summaries();
         $data['kerosine']=  $this->kerosine_summaries();
         $data['oil']=  $this->oil_summaries();
         $data['activef']=TRUE;
         $data['active']=TRUE;
         $this->load->view('admin_dashbord',$data);
     }
     public function petrol(){
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
         $data17=  $this->alert12();
         $data18=  $this->alert13();
         $data19=  $this->alert14();
         $data20=  $this->alert15();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+$data12
                 +$data13+$data14+$data15+$data17+$data18+$data19+$data20;
         $data['results']=  $this->member();
         $data['petrol']=  $this->petrol_summaries();
         $data['diesel']=  $this->diesel_summaries();
         $data['kerosine']=  $this->kerosine_summaries();
         $data['oil']=  $this->oil_summaries();
         $data['activef']=TRUE;
         $data['active']=TRUE;
         $this->form_validation->set_rules('nl','Number of Litres','trim|required|numeric|xss_clean');
         $this->form_validation->set_rules('amnt','Amount Purchased','trim|required|alpha_numeric|xss_clean');
         $this->form_validation->set_rules('exp','Expected Amount','trim|required|alpha_numeric|xss_clean');
         $this->form_validation->set_rules('date','Expected Amount','trim|required|xss_clean');
         if($this->form_validation->run()===FALSE){
             $this->load->view('admin_dashbord',$data);
         }  else {
             $this->load->model('admin_model');
             $admin_name=  $this->session->userdata('username');
             $number_litres=  $this->input->post('nl');
             $amount_parchased=  $this->input->post('amnt');
             $expected_amount=  $this->input->post('exp');
             $data_entrance=  $this->input->post('date');
             $roles=  $this->session->userdata('role_station');
             $this->admin_model->petrol_insert($number_litres,$amount_parchased,$expected_amount,$data_entrance,$admin_name,$roles);
             $data['smg']='<p class="alert alert-success">Successifully added</p>';
             $this->load->view('admin_dashbord',$data);
         }
         }
         
         public function diesel(){
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
         $data17=  $this->alert12();
         $data18=  $this->alert13();
         $data19=  $this->alert14();
         $data20=  $this->alert15();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+$data12
                 +$data13+$data14+$data15+$data17+$data18+$data19+$data20;
             $data['results']=  $this->member();
             $data['petrol']=  $this->petrol_summaries();
         $data['diesel']=  $this->diesel_summaries();
         $data['kerosine']=  $this->kerosine_summaries();
         $data['oil']=  $this->oil_summaries();
             $data['active1']=TRUE;
             $data['activef']=TRUE;
             unset($data['active']);
         $this->form_validation->set_rules('nl1','Number of Litres','trim|required|numeric|xss_clean');
         $this->form_validation->set_rules('amnt1','Amount Purchased','trim|required|alpha_numeric|xss_clean');
         $this->form_validation->set_rules('exp1','Expected Amount','trim|required|alpha_numeric|xss_clean');
         $this->form_validation->set_rules('date1','Expected Amount','trim|required|xss_clean');
         if($this->form_validation->run()===FALSE){
             $this->load->view('admin_dashbord',$data);
         }  else {
             $this->load->model('admin_model');
             $number_litres=  $this->input->post('nl1');
             $admin_name=  $this->session->userdata('username');
             $amount_parchased=  $this->input->post('amnt1');
             $expected_amount=  $this->input->post('exp1');
             $data_entrance=  $this->input->post('date1');
             $roles=  $this->session->userdata('role_station');
             $this->admin_model->diesel_insert($number_litres,$amount_parchased,$expected_amount,$data_entrance,$admin_name,$roles);
             $data['smg1']='<p class="alert alert-success">Successifully added</p>';
             $this->load->view('admin_dashbord',$data);
         }
     }
     function kerosine(){
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
         $data17=  $this->alert12();
         $data18=  $this->alert13();
         $data19=  $this->alert14();
         $data20=  $this->alert15();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+$data12
                 +$data13+$data14+$data15+$data17+$data18+$data19+$data20;
         $data['results']=  $this->member();
         $data['petrol']=  $this->petrol_summaries();
         $data['diesel']=  $this->diesel_summaries();
         $data['kerosine']=  $this->kerosine_summaries();
         $data['oil']=  $this->oil_summaries();
         $data['activef']=TRUE;
         $data['active2']=TRUE;
         unset($data['active1']);
         $this->form_validation->set_rules('nl2','Number of Litres','trim|required|numeric|xss_clean');
         $this->form_validation->set_rules('amnt2','Amount Purchased','trim|required|alpha_numeric|xss_clean');
         $this->form_validation->set_rules('exp2','Expected Amount','trim|required|alpha_numeric|xss_clean');
         $this->form_validation->set_rules('date2','Expected Amount','trim|required|xss_clean');
         if($this->form_validation->run()===FALSE){
             $this->load->view('admin_dashbord',$data);
         }  else {
             $this->load->model('admin_model');
             $number_litres=  $this->input->post('nl2');
             $admin_name=  $this->session->userdata('username');
             $amount_parchased=  $this->input->post('amnt2');
             $expected_amount=  $this->input->post('exp2');
             $data_entrance=  $this->input->post('date2');
             $roles=  $this->session->userdata('role_station');
             $this->admin_model->kerosine_insert($number_litres,$amount_parchased,$expected_amount,$data_entrance,$admin_name,$roles);
             $data['smg2']='<p class="alert alert-success">Successifully added</p>';
             $this->load->view('admin_dashbord',$data);
         }
     }
     function oil(){
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
         $data17=  $this->alert12();
         $data18=  $this->alert13();
         $data19=  $this->alert14();
         $data20=  $this->alert15();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+$data12
                 +$data13+$data14+$data15+$data17+$data18+$data19+$data20;
         $data['results']=  $this->member();
         $data['petrol']=  $this->petrol_summaries();
         $data['diesel']=  $this->diesel_summaries();
         $data['kerosine']=  $this->kerosine_summaries();
         $data['oil']=  $this->oil_summaries();
         $data['activef']=TRUE;
         $data['active3']=TRUE;
         unset($data['active1']);
         unset($data['active2']);
         $this->form_validation->set_rules('nl3','Oil type','trim|required|xss_clean');
         $this->form_validation->set_rules('amnt3','Amount Purchased','trim|required|alpha_numeric|xss_clean');
         $this->form_validation->set_rules('qnty','Total Number of Box','trim|required|numeric|xss_clean');
         $this->form_validation->set_rules('date3','Expected Amount','trim|required|xss_clean');
         if($this->form_validation->run()===FALSE){
             $this->load->view('admin_dashbord',$data);
         }  else {
             $this->load->model('admin_model');
             $number_litres=  $this->input->post('nl3');
             $admin_name=  $this->session->userdata('username');
             $amount_parchased=  $this->input->post('amnt3');
             $prod_name=  $this->input->post('qnty');
             $data_entrance=  $this->input->post('date3');
             $roles=  $this->session->userdata('role_station');
             $this->admin_model->oil_insert($number_litres,$amount_parchased,$prod_name,$data_entrance,$admin_name,$roles);
             $this->admin_model->oilPut($number_litres,$roles);
             $data['smg3']='<p class="alert alert-success">Successifully added</p>';
             $this->load->view('admin_dashbord',$data);
         }
     }
     function member(){
       $query= $this->db->get_where('tb_user',array('position !='=>'admin','stat_role'=>  $this->session->userdata('role_station')));
       if($query->num_rows()>0){
           return $query; 
       }  else {
           return FALSE;
       }
     }
     public function delete($id){
       $res= $this->db->get_where('tb_user',array('id'=>$id),1);
       if($res->num_rows()===1){
           $this->db->where('id',$id);
           $this->db->delete('tb_user');
           $this->index();
          }  else {
           $this->index();
       }
     }
     function update($id){
         $res=  $this->db->get_where('tb_user',array('id'=>$id),1);
         if($res->num_rows()===1){
             foreach ($res->result() as $ros){
                 
                 $data_records=array(
                     'id'=>$ros->id,
                     'firstname'=>$ros->first_name,
                     'lastname'=>$ros->sec_name,
                     'username'=>$ros->username,
                     'email'=>$ros->email,
                     'position'=>$ros->position
                 );
         }
         
             unset($ros);
             $this->load->view('admin_dashbord_update',$data_records);
         }  else {
             return FALSE; 
         }
     }
     function diactivate($id){
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
         $data17=  $this->alert12();
         $data18=  $this->alert13();
         $data19=  $this->alert14();
         $data20=  $this->alert15();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+$data12
                 +$data13+$data14+$data15+$data17+$data18+$data19+$data20;
         $data['results']=  $this->member();
         $data['petrol']=  $this->petrol_summaries();
         $data['diesel']=  $this->diesel_summaries();
         $data['kerosine']=  $this->kerosine_summaries();
         $data['oil']=  $this->oil_summaries();
         $data['activef2']=TRUE;
         $res=  $this->db->get_where('tb_user',array('id'=>$id,'status'=>'active'),1);
         $res1=  $this->db->get_where('tb_user',array('id'=>$id,'status'=>'diactive'),1);
         if($res->num_rows()===1){
             $active=array(
                 'id'=>$id,
                 'status'=>'diactive'
             );
             $this->db->where('id',$id);
            $this->db->update('tb_user',$active);
            $this->load->view('admin_dashbord',$data);
         }elseif($res1->num_rows()===1){  
            $diactivate=array(
                'id'=>$id,
                'status'=>'active'
            );
            $this->db->where('id',$id);
            $this->db->update('tb_user',$diactivate);
            $this->load->view('admin_dashbord',$data);
         }else {
             return FALSE;
         }
     }
     function user(){
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
         $data17=  $this->alert12();
         $data18=  $this->alert13();
         $data19=  $this->alert14();
         $data20=  $this->alert15();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+$data12
                 +$data13+$data14+$data15+$data17+$data18+$data19+$data20;
       $data['results']=  $this->member();
       $data['petrol']=  $this->petrol_summaries();
       $data['diesel']=  $this->diesel_summaries();
       $data['kerosine']=  $this->kerosine_summaries();
       $data['oil']=  $this->oil_summaries();
       $data['activef2']=TRUE;
       $this->load->view('admin_dashbord',$data);
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
         $res=  $this->db->select_sum('prod_qnty')->from('tb_oil')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $array=array(
                     'Litre_oil'=>$row->prod_qnty
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
       $res1=  $this->db->select_sum('sold_qnty')->from('tb_oil')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
       if($res1->num_rows()>0){
           foreach ($res1->result() as $row){
               $array=array(
                   'sold_litre3'=>$row->sold_qnty
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
     public function summary(){
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
         $data17=  $this->alert12();
         $data18=  $this->alert13();
         $data19=  $this->alert14();
         $data20=  $this->alert15();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+$data12
                 +$data13+$data14+$data15+$data17+$data18+$data19+$data20;
         $data['petrol']=  $this->petrol_summaries();
         $data['diesel']=  $this->diesel_summaries();
         $data['kerosine']=  $this->kerosine_summaries();
         $data['oil']=  $this->oil_summaries();
         $this->load->view('alert_view',$data);    
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
                     'Litre_oil'=>$row->prod_qnty,
                     'purchased_amount3'=>$row->purchased_amount,
                     'admin_name3'=>$row->admin_name,
                     'seller_name3'=>$row->seller_name,
                     'entray_date3'=>$row->entray_date,
                     'sold_litre3'=>$row->sold_qnty,
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
                     'seller_name3'=>'',
                     'entray_date3'=>'',
                     'sold_litre3'=>'',
                     'sold_amount3'=>''
                 ); 
            return $array;
         }
     }
     public function problem(){
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
         $data17=  $this->alert12();
         $data18=  $this->alert13();
         $data19=  $this->alert14();
         $data20=  $this->alert15();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+$data12
                 +$data13+$data14+$data15+$data17+$data18+$data19+$data20;
         $data['petrol']=  $this->petrol_summaries();
         $data['diesel']=  $this->diesel_summaries();
         $data['kerosine']=  $this->kerosine_summaries();
         $data['oil']=  $this->oil_summaries();
         $this->form_validation->set_rules('txt','Problem','trim|required|xss_clean');
         $this->form_validation->set_rules('people','Receipient','trim|required|xss_clean');
         if($this->form_validation->run()===FALSE){
          $this->load->view('problem_view',$data);
         }else{
         $this->load->model('admin_model');
         $sender=  $this->session->userdata('username');
         $problem=  $this->input->post('txt');
         $receiver=  $this->input->post('people');
         $roles=  $this->session->userdata('role_station');
         $this->admin_model->reporter($sender,$problem,$receiver,$roles);
         $data['sms']='<label class="alert alert-success">Your problem has sent.!</label>';
         $this->load->view('problem_view',$data);
         }
     }
     function notify_view(){
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
         $data17=  $this->alert12();
         $data18=  $this->alert13();
         $data19=  $this->alert14();
         $data20=  $this->alert15();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+$data12
                 +$data13+$data14+$data15+$data17+$data18+$data19+$data20;
         $data['petrol']=  $this->petrol_summaries();
         $data['diesel']=  $this->diesel_summaries();
         $data['kerosine']=  $this->kerosine_summaries();
         $data['oil']=  $this->oil_summaries();
         $res=  $this->db->get_where('tb_problem',array('receiver'=>'admin','status'=>'unchecked','stat_role'=>  $this->session->userdata('role_station')));
         if($res->num_rows()>0){
            $data['record']=$res;
            $this->load->view('admin_message',$data);
         }  else {
         $data['records']='<p class="alert alert-warning">Inbox Empty..!</p>';
         $this->load->view('admin_message',$data);
 
         }
     }
     function message($id){
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
         $data17=  $this->alert12();
         $data18=  $this->alert13();
         $data19=  $this->alert14();
         $data20=  $this->alert15();
         $res=  $this->db->get_where('tb_problem',array('id'=>$id));
         if($res->num_rows()>0){
             $this->db->where('id',$id);
             $this->db->update('tb_problem',array('status'=>'checked'));
             foreach ($res->result() as $sms){
                $data_array=array(
                    'id'=>$sms->id,
                    'problem'=>$sms->problem
                ); 
             }
             unset($sms);
             $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+$data12
                 +$data13+$data14+$data15+$data17+$data18+$data19+$data20+$data_array;
         $data['petrol']=  $this->petrol_summaries();
         $data['diesel']=  $this->diesel_summaries();
         $data['kerosine']=  $this->kerosine_summaries();
         $data['oil']=  $this->oil_summaries();
             $this->load->view('admin_message_view',$data);
         }
     }
     function sms_delete($id){
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
        $data17=  $this->alert12();
         $data18=  $this->alert13();
         $data19=  $this->alert14();
         $data20=  $this->alert15();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+$data12
                 +$data13+$data14+$data15+$data17+$data18+$data19+$data20;
         $data['petrol']=  $this->petrol_summaries();
         $data['diesel']=  $this->diesel_summaries();
         $data['kerosine']= $this->kerosine_summaries();
         $data['oil']=  $this->oil_summaries();
         $res=  $this->db->get_where('tb_problem',array('id'=>$id));
         if($res->num_rows()>0){
             $this->db->where('id',$id);
             $this->db->delete('tb_problem');
             $data['records']='<p class="alert alert-info">Message deleted..!</p>';
             $this->load->view('admin_message',$data);
         }  else {
         $data['records']='<p class="alert-warning">Inbox Empty..!</p>';
         $this->load->view('admin_message',$data);
         }
     }
     function petrol_summaries(){
         $res=  $this->db->get_where('tb_petrol',array('added'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
         return $res;
     }
     function diesel_summaries(){
         $res=  $this->db->get_where('tb_diesel',array('added'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
         return $res;
     }
     function kerosine_summaries(){
         $res=  $this->db->get_where('tb_kerosine',array('added'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
         return $res;
     }
     function oil_summaries(){
         $res=  $this->db->get_where('tb_oil',array('added'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
         return $res;
     }
     function edit($id){
         $position=  $this->input->post('position');
         $this->load->model('admin_model');
         $this->admin_model->edit($id,$position);
         echo '<p class="alert alert-success">successifully updated</p>';
        
     }
     function tableupdate($id){
         $this->load->model('admin_model');
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
         $data17=  $this->alert12();
         $data18=  $this->alert13();
         $data19=  $this->alert14();
         $data20=  $this->alert15();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+$data12
                 +$data13+$data14+$data15+$data17+$data18+$data19+$data20;
         $data['results']=  $this->member();
         $data['petrol']=  $this->petrol_summaries();
         $data['diesel']=  $this->diesel_summaries();
         $data['kerosine']=  $this->kerosine_summaries();
         $data['oil']=  $this->oil_summaries();
         $data['activef1']=TRUE;
         $data['activep']=TRUE;
         unset($data['activef']);
         unset($data['active']);
         $number_litres=  $this->input->post('lp');
         $amount_parchased=  $this->input->post('pma');
         $expected_amount=  $this->input->post('exma');
         $data_entrance=  $this->input->post('edate');
         $roles=  $this->session->userdata('role_station');
         $this->admin_model-> updatepetrol($id,$number_litres,$amount_parchased,$expected_amount,$data_entrance,$roles);
         $this->load->view('admin_dashbord',$data);
     }
     function tableupdatediesel($id){
         $this->load->model('admin_model');
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
         $data17=  $this->alert12();
         $data18=  $this->alert13();
         $data19=  $this->alert14();
         $data20=  $this->alert15();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+$data12
                 +$data13+$data14+$data15+$data17+$data18+$data19+$data20;
         $data['results']=  $this->member();
         $data['petrol']=  $this->petrol_summaries();
         $data['diesel']=  $this->diesel_summaries();
         $data['kerosine']=  $this->kerosine_summaries();
         $data['oil']=  $this->oil_summaries();
         $data['activef1']=TRUE;
         $data['actived']=TRUE;
         unset($data['activef']);
         unset($data['active']);
         unset($data['activep']);
         $number_litres=  $this->input->post('lp');
         $amount_parchased=  $this->input->post('pma');
         $expected_amount=  $this->input->post('exma');
         $data_entrance=  $this->input->post('edate');
         $roles=  $this->session->userdata('role_station');
         $this->admin_model-> updatediesel($id,$number_litres,$amount_parchased,$expected_amount,$data_entrance,$roles);
         $this->load->view('admin_dashbord',$data);
     }
     function tableupdatekerosine($id){
         $this->load->model('admin_model');
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
        $data17=  $this->alert12();
         $data18=  $this->alert13();
         $data19=  $this->alert14();
         $data20=  $this->alert15();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+$data12
                 +$data13+$data14+$data15+$data17+$data18+$data19+$data20;
         $data['results']=  $this->member();
         $data['petrol']=  $this->petrol_summaries();
         $data['diesel']=  $this->diesel_summaries();
         $data['kerosine']=  $this->kerosine_summaries();
         $data['oil']=  $this->oil_summaries();
         $data['activef1']=TRUE;
         $data['activek']=TRUE;
         unset($data['activef']);
         unset($data['active']);
         $number_litres=  $this->input->post('lp');
         $amount_parchased=  $this->input->post('pma');
         $expected_amount=  $this->input->post('exma');
         $data_entrance=  $this->input->post('edate');
         $role=  $this->session->userdata('role_station');
         $this->admin_model-> updatekerosine($id,$number_litres,$amount_parchased,$expected_amount,$data_entrance,$role);
         $this->load->view('admin_dashbord',$data);
     }
     function tableupdateoil($id){
         $this->load->model('admin_model');
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
         $data17=  $this->alert12();
         $data18=  $this->alert13();
         $data19=  $this->alert14();
         $data20=  $this->alert15();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+$data12
                 +$data13+$data14+$data15+$data17+$data18+$data19+$data20;
         $data['results']=  $this->member();
         $data['petrol']=  $this->petrol_summaries();
         $data['diesel']=  $this->diesel_summaries();
         $data['kerosine']=  $this->kerosine_summaries();
         $data['oil']=  $this->oil_summaries();
         $data['activef1']=TRUE;
         $data['activeo']=TRUE;
         unset($data['activef']);
         unset($data['active']);
         $number_litres=  $this->input->post('lp');
         $amount_parchased=  $this->input->post('pma');
         $expected_amount=  $this->input->post('exma');
         $data_entrance=  $this->input->post('edate');
         $roles=  $this->session->userdata('role_station');
         $this->admin_model-> updateoil($id,$number_litres,$amount_parchased,$expected_amount,$data_entrance,$roles);
         $this->load->view('admin_dashbord',$data);
     }
     function petrolCheck($id){
         $data['pet']=$id;
         $this->load->view('petrol_edit',$data);
     }
     function dieselCheck($id){
         $data['pet']=$id;
         $this->load->view('diesel_edit',$data);
     }
     function keroasineCheck($id){
         $data['pet']=$id;
         $this->load->view('kerosine_edit',$data);
     }
     function oilCheck($id){
         $data['pet']=$id;
         $this->load->view('oil_edit',$data);
     }
     function dieselupdate(){
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
         $data17=  $this->alert12();
         $data18=  $this->alert13();
         $data19=  $this->alert14();
         $data20=  $this->alert15();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+$data12
                 +$data13+$data14+$data15+$data17+$data18+$data19+$data20;
         $this->load->view('diesel_update',$data);
     }
     function petrolupdate(){
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
         $data17=  $this->alert12();
         $data18=  $this->alert13();
         $data19=  $this->alert14();
         $data20=  $this->alert15();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+$data12
                 +$data13+$data14+$data15+$data17+$data18+$data19+$data20;
         $this->load->view('petrol_update',$data);
     }
     function kerosineupdate(){
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
         $data17=  $this->alert12();
         $data18=  $this->alert13();
         $data19=  $this->alert14();
         $data20=  $this->alert15();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+$data12
                 +$data13+$data14+$data15+$data17+$data18+$data19+$data20;
         $this->load->view('kerosine_update',$data);
     }
     function oilupdate(){
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
         $data17=  $this->alert12();
         $data18=  $this->alert13();
         $data19=  $this->alert14();
         $data20=  $this->alert15();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+$data12
                 +$data13+$data14+$data15+$data17+$data18+$data19+$data20;
         $this->load->view('oil_update',$data);
     }
     function petrol_cost_insert(){
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
         $data17=  $this->alert12();
         $data18=  $this->alert13();
         $data19=  $this->alert14();
         $data20=  $this->alert15();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+$data12
                 +$data13+$data14+$data15+$data17+$data18+$data19+$data20;
         $this->form_validation->set_rules('psc','Petrol cost','trim|required|alpha_numeric|xss_clean');
         if($this->form_validation->run()===FALSE){
             $this->load->view('petrol_update',$data);
         }  else {
             $this->load->model('admin_model');
             $petrol=  $this->input->post('psc');
             $roles=  $this->session->userdata('role_station');
             $this->admin_model->petrol_cost($petrol,$roles);
             $data['smg']='<p class="alert alert-success">Cost updated</p>';
             $this->load->view('petrol_update',$data);
         }
     }
     function diesel_cost_insert(){
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
         $data17=  $this->alert12();
         $data18=  $this->alert13();
         $data19=  $this->alert14();
         $data20=  $this->alert15();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+$data12
                 +$data13+$data14+$data15+$data17+$data18+$data19+$data20;
         $this->form_validation->set_rules('dsc','Diesel cost','trim|required|alpha_numeric|xss_clean');
         if($this->form_validation->run()===FALSE){
             $this->load->view('diesel_update',$data);
         }  else {
             $this->load->model('admin_model');
             $diesel=  $this->input->post('dsc');
             $roles=  $this->session->userdata('role_station');
             $this->admin_model->diesel_cost($diesel,$roles);
             $data['smg']='<p class="alert alert-success">Cost updated</p>';
             $this->load->view('diesel_update',$data);
         }
     }
     function kerosine_cost_insert(){
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
         $data17=  $this->alert12();
         $data18=  $this->alert13();
         $data19=  $this->alert14();
         $data20=  $this->alert15();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+$data12
                 +$data13+$data14+$data15+$data17+$data18+$data19+$data20;
         $this->form_validation->set_rules('ksc','kerosine cost','trim|required|alpha_numeric|xss_clean');
         if($this->form_validation->run()===FALSE){
             $this->load->view('kerosine_update',$data);
         }  else {
             $this->load->model('admin_model');
             $kerosine=  $this->input->post('ksc');
             $roles=  $this->session->userdata('role_station');
             $this->admin_model->kerosine_cost($kerosine,$roles);
             $data['smg']='<p class="alert alert-success">Cost updated</p>';
             $this->load->view('kerosine_update',$data);
         }
     }
     function oil_cost_insert($id){
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
         $data17=  $this->alert12();
         $data18=  $this->alert13();
         $data19=  $this->alert14();
         $data20=  $this->alert15();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+$data12
                 +$data13+$data14+$data15+$data17+$data18+$data19+$data20;
         $data['oil_cost']=$id;
         $this->form_validation->set_rules('osc','Oil cost','trim|required|alpha_numeric|xss_clean');
         $this->form_validation->set_rules('oildate','Oil date','trim|required|xss_clean');
         $this->form_validation->run();
         if(isset($_POST['save'])){
         if($this->form_validation->run()===FALSE){
             $this->load->view('oilCostChange',$data);
         }  else {
             $this->load->model('admin_model');
             $oil=  $this->input->post('osc');
             $date=  $this->input->post('oildate');
             $roles=  $this->session->userdata('role_station');
             $this->admin_model->oil_cost($oil,$roles,$id,$date);
             $data['smg']='<p class="alert alert-success">Cost updated</p>';
             $this->load->view('oilCostChange',$data);
         }
         }
     }
     function costOilUpdates($id){
         $data['oil_cost']=$id;
         $this->load->view('oilCostChange',$data);
     }
 }

