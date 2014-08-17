<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Accountant_controller extends CI_Controller{
     function __construct() {
         parent::__construct();
         $this->load->helper('form','html','url');
         $this->load->library('form_validation');
         if(!$this->session->userdata('logged_in')){
             redirect('logout');  
         }elseif ($this->session->userdata('apartment')!=='accountant') {
             redirect('logout'); 
        }
     }
     function index(){
         $data1=  $this->scallable();
         $data2=  $this->scallable2();
         $data3=  $this->tables();
         $data4=  $this->tablespetrolmin();
         $data5=  $this->tablesdieselmin();
         $data6=  $this->tableskerosinemin();
         $data7=  $this->tablesoilmin();
         $data8=  $this->tables1();
         $data9=  $this->tables2();
         $data11=  $this->alert();
         $data12=  $this->alert1();
         $data13=  $this->alert2();
         $data14=  $this->alert3();
         $data15=  $this->alert4();
         $data16=  $this->alert5();
         $data19=  $this->alert8();
         $data20=  $this->alert9();
         $data21=  $this->alert10();
         $data23=  $this->alert12();
         $data24=  $this->alert13();
         $data25=  $this->alert14();
         $data26=  $this->alert15();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data11+$data12+$data13
                 +$data14+$data15+$data16+$data19+$data20+$data21+$data23+$data24+$data25+$data26;
         $this->load->view('accountant_views',$data);
     }
     function oil_cargo($id){
         $data['oil']=$id;
         $data1=  $this->tablesoilcargo($id);
         $data2=  $this->tablesoilcargo_sold($id);
         $data=$data1+$data2;
         $this->load->view('oil_check_goil',$data);
     } 
         function detailed(){
         $data1=  $this->scallable();
         $data2=  $this->scallable2();
         $data=$data1+$data2;
         $this->load->view('accountant_view',$data);
     }
        function tables(){
         $this->db->select_sum('sold_litre');
         $this->db->from('tb_petrol');
         $this->db->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
         $res=  $this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $petrol){
                 $petrolized=array(
                     'Tsold'=>$petrol->sold_litre
                 );
             }
             unset($petrol);
             return $petrolized;
         }  else {
             $petrolized=array(
                     'Tsold'=>''
                 );
           return $petrolized;
         }
     }
     function tablespetrolmin(){
         $this->db->select_sum('sold_amount');
         $this->db->from('tb_petrol');
         $this->db->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
         $res=  $this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $petrol){
                 $petrolized=array(
                     'Tamount'=>$petrol->sold_amount
                 );
             }
             unset($petrol);
             return $petrolized;
         }  else {
             $petrolized=array(
                     'Tamount'=>''
                 );
           return $petrolized;
         }
     }
     function tables1(){
         $this->db->select_sum('sold_litre');
         $this->db->from('tb_diesel');
         $this->db->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
         $res=  $this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $petrol){
                 $petrolized=array(
                     'Tsold1'=>$petrol->sold_litre
                 );
             }
             unset($petrol);
             return $petrolized;
         }  else {
             $petrolized=array(
                     'Tsold1'=>''
                 );
           return $petrolized;
         }
     }
     function tablesdieselmin(){
         $this->db->select_sum('sold_amount');
         $this->db->from('tb_diesel');
         $this->db->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
         $res=  $this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $petrol){
                 $petrolized=array(
                     'Tamount1'=>$petrol->sold_amount
                 );
             }
             unset($petrol);
             return $petrolized;
         }  else {
             $petrolized=array(
                     'Tamount1'=>''
                 );
           return $petrolized;
         }
     }
     function tables2(){
         $this->db->select_sum('sold_litre');
         $this->db->from('tb_kerosine');
         $this->db->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
         $res=  $this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $petrol){
                 $petrolized=array(
                     'Tsold2'=>$petrol->sold_litre
                 );
             }
             unset($petrol);
             return $petrolized;
         }  else {
             $petrolized=array(
                     'Tsold2'=>''
                 );
           return $petrolized;
         }
     }
     function tableskerosinemin(){
         $this->db->select_sum('sold_amount');
         $this->db->from('tb_kerosine');
         $this->db->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
         $res=  $this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $petrol){
                 $petrolized=array(
                     'Tamount2'=>$petrol->sold_amount
                 );
             }
             unset($petrol);
             return $petrolized;
         }  else {
             $petrolized=array(
                     'Tamount2'=>''
                 );
           return $petrolized;
         }
     }
function tablesoilmin(){
         $this->db->select_sum('sold_amount');
         $this->db->from('tb_oil');
         $this->db->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
         $res=  $this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $petrol){
                 $petrolized=array(
                     'Tamount3'=>$petrol->sold_amount
                 );
             }
             unset($petrol);
             return $petrolized;
         }  else {
             $petrolized=array(
                     'Tamount3'=>''
                 );
           return $petrolized;
         }
     }
     function tablesoilcargo($id){
         $this->db->select_sum('sold_amount');
         $this->db->from('tb_oil');
         $this->db->join('oil_update','oil_update.oil_product = tb_oil.prod_qnty');
         $this->db->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station'),'oil_id'=>$id));
         $res=  $this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $petrol){
                 $petrolized=array(
                     'Tamount3'=>$petrol->sold_amount
                 );
             }
             unset($petrol);
             return $petrolized;
         }  else {
             $petrolized=array(
                     'Tamount3'=>''
                 );
           return $petrolized;
         }
     }
     function tablesoilcargo_sold($id){
         $this->db->select_sum('sold_qnty');
         $this->db->from('tb_oil');
         $this->db->join('oil_update','oil_update.oil_product = tb_oil.prod_qnty');
         $this->db->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station'),'oil_id'=>$id));
         $res=  $this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $petrol){
                 $petrolized=array(
                     'Tsold3'=>$petrol->sold_qnty
                 );
             }
             unset($petrol);
             return $petrolized;
         }  else {
             $petrolized=array(
                     'Tsold3'=>''
                 );
           return $petrolized;
         }
     }
     function payed($id){
         $this->form_validation->set_rules('csh','Cash','trim|required|numeric|xss_clean'); 
         if($this->form_validation->run()===FALSE){
             echo '<p class="alert alert-danger">Cant be empty..</p>'; 
         }  else {
             $this->load->model('accountant_model');
             $amount=  $this->input->post('csh');
             $date=  $this->input->post('dtc');
             $mode=  $this->input->post('check');
             $chqno=  $this->input->post('checque');
             $roles=  $this->session->userdata('role_station');
             $this->accountant_model->account_payed($id,$amount,$date,$mode,$chqno,$roles);
             echo '<p class=" alert alert-success">Saved successfully</p>';
             $res=  $this->db->get_where('tb_petrol',array('id'=>$id));
               $row=$res->row();
               if($row->credit_amount!==$row->payed){
                   $this->db->where('id',$id);
                   $this->db->update('tb_petrol',array('status'=>'credit'));
               }
         }
     }
     function payed_diesel($id){
         $this->form_validation->set_rules('csh','Cash','trim|required|numeric|xss_clean'); 
         if($this->form_validation->run()===FALSE){
             echo '<p class="alert alert-danger">Cant be empty..</p>'; 
         }  else {
             $this->load->model('accountant_model');
             $amount=  $this->input->post('csh');
             $date=  $this->input->post('dtc');
             $mode=  $this->input->post('check');
             $chqno=  $this->input->post('checque');
             $roles=  $this->session->userdata('role_station');
             $this->accountant_model->account_payed_diesel($id,$amount,$date,$mode,$chqno,$roles);
             echo '<p class="alert alert-success">Saved successfully</p>';
             $res=  $this->db->get_where('tb_diesel',array('id'=>$id));
               $row=$res->row();
               if($row->credit_amount!==$row->payed){
                   $this->db->where('id',$id);
                   $this->db->update('tb_diesel',array('status'=>'credit'));
               }
         }
     }
     function payed_kerosine($id){
         $this->form_validation->set_rules('csh','Cash','trim|required|numeric|xss_clean'); 
         if($this->form_validation->run()===FALSE){
             echo '<p class="alert-danger">Cant be empty..</p>'; 
         }  else {
             $this->load->model('accountant_model');
             $amount=  $this->input->post('csh');
             $date=  $this->input->post('dtc');
             $mode=  $this->input->post('check');
             $chqno=  $this->input->post('checque');
             $roles=  $this->session->userdata('role_station');
             $this->accountant_model->account_payed_kerosine($id,$amount,$date,$mode,$chqno,$roles);
             echo '<p class="alert alert-success">Saved successfully</p>';
             $res=  $this->db->get_where('tb_kerosine',array('id'=>$id));
               $row=$res->row();
               if($row->credit_amount!==$row->payed){
                   $this->db->where('id',$id);
                   $this->db->update('tb_kerosine',array('status'=>'credit'));
               }
         }
     }
     function payed_oil($id){
         $this->form_validation->set_rules('csh','Cash','trim|required|numeric|xss_clean'); 
         if($this->form_validation->run()===FALSE){
             echo '<p class="alert-danger">Cant be empty..</p>'; 
         }  else {
             $this->load->model('accountant_model');
             $amount=  $this->input->post('csh');
             $date=  $this->input->post('dtc');
             $mode=  $this->input->post('check');
             $chqno=  $this->input->post('checque');
            $roles=  $this->session->userdata('role_station');
             $this->accountant_model->account_payed_oil($id,$amount,$date,$mode,$chqno,$roles);
             echo '<p class="alert alert-success">Changes updated successfully</p>';
             $res=  $this->db->get_where('tb_oil',array('id'=>$id));
               $row=$res->row();
               if($row->credit_amount!==$row->payed){
                   $this->db->where('id',$id);
                   $this->db->update('tb_oil',array('status'=>'credit'));
               }
         }
     }
     function credit_entry(){
         $this->load->view('accountant_credit');   
     }
     function ajaxload($id){
       $data['customer']=$id;
       $this->load->view('customer_info',$data);
     }
     function ajaxload1($id){
       $data['customer']=$id;
       $this->load->view('customer_diesel',$data);
     }
     function ajaxload2($id){
       $data['customer']=$id;
       $this->load->view('customer_kerosine',$data);
     }
     function ajaxload3($id){
       $data['customer']=$id;
       $this->load->view('customer_oil',$data);
     }
     function diesel(){
        $data=  $this->scallable();
         $this->load->view('accountant_diesel',$data); 
     }
     function kerosine(){
        $data=  $this->scallable();
         $this->load->view('accountant_kerosine',$data); 
     }function oil(){
        $data=  $this->scallable();
        $this->load->view('accountant_oil',$data); 
     }
     function petrol_check(){
         $res=  $this->db->select_sum('Litre_petrol')->from('tb_petrol')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'petrol'=>$row->Litre_petrol,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'petrol'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function petrol_check1(){
         $res=  $this->db->select_sum('purchased_amount')->from('tb_petrol')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'petrol_amount'=>$row->purchased_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'petrol_amount'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function petrol_payed(){
         $res=  $this->db->select_sum('payed')->from('tb_petrol')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'payed'=>$row->payed,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'payed'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function petrol_payed1(){
         $res=  $this->db->select_sum('payed')->from('tb_diesel')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'payed1'=>$row->payed,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'payed1'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function petrol_payed2(){
         $res=  $this->db->select_sum('payed')->from('tb_kerosine')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'payed2'=>$row->payed,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'payed2'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function petrol_payed3(){
         $res=  $this->db->select_sum('payed')->from('tb_oil')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'payed3'=>$row->payed,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'payed3'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function petrol_check2(){
         $res=  $this->db->select_sum('expected_amount')->from('tb_petrol')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'exp_amount'=>$row->expected_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'exp_amount'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function petrol_check3(){
         $res=  $this->db->select_sum('sold_litre')->from('tb_petrol')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_litre'=>$row->sold_litre,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_litre'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function petrol_check4(){
         $res=  $this->db->select_sum('sold_amount')->from('tb_petrol')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_amount'=>$row->sold_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_amount'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function petrol_check5(){
         $res=  $this->db->select_sum('credit_litre')->from('tb_petrol')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'credit_litre'=>$row->credit_litre,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'credit_litre'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function petrol_check6(){
         $res=  $this->db->select_sum('credit_amount')->from('tb_petrol')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'credit_amount'=>$row->credit_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'credit_amount'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function petrol_check7(){
         $res=  $this->db->select_sum('Litre_diesel')->from('tb_diesel')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'diesel'=>$row->Litre_diesel,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'diesel'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function petrol_check8(){
         $res=  $this->db->select_sum('purchased_amount')->from('tb_diesel')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'diesel_amount'=>$row->purchased_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'diesel_amount'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function petrol_check9(){
         $res=  $this->db->select_sum('expected_amount')->from('tb_diesel')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'exp_amount1'=>$row->expected_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'exp_amount1'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function petrol_check10(){
         $res=  $this->db->select_sum('sold_litre')->from('tb_diesel')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_litre1'=>$row->sold_litre,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_litre1'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function petrol_check11(){
         $res=  $this->db->select_sum('sold_amount')->from('tb_diesel')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_amount1'=>$row->sold_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_amount1'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function petrol_check12(){
         $res=  $this->db->select_sum('credit_litre')->from('tb_diesel')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'credit_litre1'=>$row->credit_litre,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'credit_litre1'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function petrol_check13(){
         $res=  $this->db->select_sum('credit_amount')->from('tb_diesel')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'credit_amount1'=>$row->credit_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'credit_amount1'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function petrol_check14(){
         $res=  $this->db->select_sum('Litre_kerosine')->from('tb_kerosine')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'kerosine'=>$row->Litre_kerosine,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'kerosine'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function petrol_check15(){
         $res=  $this->db->select_sum('purchased_amount')->from('tb_kerosine')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'kerosine_amount'=>$row->purchased_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'kerosine_amount'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function petrol_check16(){
         $res=  $this->db->select_sum('expected_amount')->from('tb_kerosine')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'exp_amount2'=>$row->expected_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'exp_amount2'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function petrol_check17(){
         $res=  $this->db->select_sum('sold_litre')->from('tb_kerosine')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_litre2'=>$row->sold_litre,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_litre2'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function petrol_check18(){
         $res=  $this->db->select_sum('sold_amount')->from('tb_kerosine')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_amount2'=>$row->sold_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_amount2'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function petrol_check19(){
         $res=  $this->db->select_sum('credit_litre')->from('tb_kerosine')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'credit_litre2'=>$row->credit_litre,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'credit_litre2'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function petrol_check20(){
         $res=  $this->db->select_sum('credit_amount')->from('tb_kerosine')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'credit_amount2'=>$row->credit_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'credit_amount2'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
function petrol_check22(){
         $res=  $this->db->select_sum('purchased_amount')->from('tb_oil')
                 ->join('oil_update','oil_update.oil_product = tb_oil.prod_qnty')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'oil_amount'=>$row->purchased_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'oil_amount'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function petrol_check23(){
         $res=  $this->db->select_sum('sold_qnty')->from('tb_oil')
                 ->join('oil_update','oil_update.oil_product = tb_oil.prod_qnty')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_litre3'=>$row->sold_qnty,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_litre3'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     
function petrol_check25(){
         $res=  $this->db->select_sum('sold_amount')->from('tb_oil')
                 ->join('oil_update','oil_update.oil_product = tb_oil.prod_qnty')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_amount3'=>$row->sold_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_amount3'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function petrol_check26(){
         $res=  $this->db->select_sum('credit_litre')->from('tb_oil')
                 ->join('oil_update','oil_update.oil_product = tb_oil.prod_qnty')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'credit_litre3'=>$row->credit_litre,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'credit_litre3'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function petrol_check27(){
         $res=  $this->db->select_sum('credit_amount')->from('tb_oil')
                 ->join('oil_update','oil_update.oil_product = tb_oil.prod_qnty')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'credit_amount3'=>$row->credit_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'credit_amount3'=>'Nothing present'
             );
             return $petrola_data;
         }
         
         }
         function do_check(){
         $res=  $this->db->select_sum('Litre_petrol')->from('tb_petrol')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'dopetrol'=>$row->Litre_petrol,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'dopetrol'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function do_check1(){
         $res=  $this->db->select_sum('purchased_amount')->from('tb_petrol')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'dopetrol_amount'=>$row->purchased_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'dopetrol_amount'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function do_check2(){
         $res=  $this->db->select_sum('expected_amount')->from('tb_petrol')
                 ->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'doexp_amount'=>$row->expected_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'doexp_amount'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function do_check3(){
         $res=  $this->db->select_sum('sold_litre')->from('tb_petrol')
                 ->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'dosold_litre'=>$row->sold_litre,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'dosold_litre'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function do_check4(){
         $res=  $this->db->select_sum('sold_amount')->from('tb_petrol')
                 ->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'dosold_amount'=>$row->sold_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'dosold_amount'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function do_check5(){
         $res=  $this->db->select_sum('credit_litre')->from('tb_petrol')
                 ->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'docredit_litre'=>$row->credit_litre,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'docredit_litre'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function do_check6(){
         $res=  $this->db->select_sum('credit_amount')->from('tb_petrol')
                 ->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'docredit_amount'=>$row->credit_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'docredit_amount'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function do_check7(){
         $res=  $this->db->select_sum('Litre_diesel')->from('tb_diesel')
                 ->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'dodiesel'=>$row->Litre_diesel,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'dodiesel'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function do_check8(){
         $res=  $this->db->select_sum('purchased_amount')->from('tb_diesel')
                 ->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'dodiesel_amount'=>$row->purchased_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'dodiesel_amount'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function do_check9(){
         $res=  $this->db->select_sum('expected_amount')->from('tb_diesel')
                 ->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'doexp_amount1'=>$row->expected_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'doexp_amount1'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function do_check10(){
         $res=  $this->db->select_sum('sold_litre')->from('tb_diesel')
                 ->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'dosold_litre1'=>$row->sold_litre,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'dosold_litre1'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function do_check11(){
         $res=  $this->db->select_sum('sold_amount')->from('tb_diesel')
                 ->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'dosold_amount1'=>$row->sold_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'dosold_amount1'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function do_check12(){
         $res=  $this->db->select_sum('credit_litre')->from('tb_diesel')
                 ->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'docredit_litre1'=>$row->credit_litre,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'docredit_litre1'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function do_check13(){
         $res=  $this->db->select_sum('credit_amount')->from('tb_diesel')
                 ->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'docredit_amount1'=>$row->credit_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'docredit_amount1'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function do_check14(){
         $res=  $this->db->select_sum('Litre_kerosine')->from('tb_kerosine')
                 ->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'dokerosine'=>$row->Litre_kerosine,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'dokerosine'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function do_check15(){
         $res=  $this->db->select_sum('purchased_amount')->from('tb_kerosine')
                 ->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'dokerosine_amount'=>$row->purchased_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'dokerosine_amount'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function do_check16(){
         $res=  $this->db->select_sum('expected_amount')->from('tb_kerosine')
                 ->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'doexp_amount2'=>$row->expected_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'doexp_amount2'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function do_check17(){
         $res=  $this->db->select_sum('sold_litre')->from('tb_kerosine')
                 ->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'dosold_litre2'=>$row->sold_litre,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'dosold_litre2'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function do_check18(){
         $res=  $this->db->select_sum('sold_amount')->from('tb_kerosine')
                 ->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'dosold_amount2'=>$row->sold_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'dosold_amount2'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function do_check19(){
         $res=  $this->db->select_sum('credit_litre')->from('tb_kerosine')
                 ->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'docredit_litre2'=>$row->credit_litre,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'docredit_litre2'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function do_check20(){
         $res=  $this->db->select_sum('credit_amount')->from('tb_kerosine')
                 ->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'docredit_amount2'=>$row->credit_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'docredit_amount2'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
function do_check22(){
         $res=  $this->db->select_sum('purchased_amount')->from('tb_oil')
                 ->join('oil_update','oil_update.oil_product = tb_oil.prod_qnty')->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'dooil_amount'=>$row->purchased_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'dooil_amount'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function do_check23(){
         $res=  $this->db->select_sum('sold_qnty')->from('tb_oil')
                ->join('oil_update','oil_update.oil_product = tb_oil.prod_qnty')->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'dosold_litre3'=>$row->sold_qnty,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'dosold_litre3'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
function do_check25(){
         $res=  $this->db->select_sum('sold_amount')->from('tb_oil')
                 ->join('oil_update','oil_update.oil_product = tb_oil.prod_qnty')->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'dosold_amount3'=>$row->sold_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'dosold_amount3'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function do_check26(){
         $res=  $this->db->select_sum('credit_litre')->from('tb_oil')
                ->join('oil_update','oil_update.oil_product = tb_oil.prod_qnty')->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'docredit_litre3'=>$row->credit_litre,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'docredit_litre3'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
     function do_check27(){
         $res=  $this->db->select_sum('credit_amount')->from('tb_oil')
                 ->join('oil_update','oil_update.oil_product = tb_oil.prod_qnty')->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'docredit_amount3'=>$row->credit_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'docredit_amount3'=>'Nothing present'
             );
             return $petrola_data;
         }
         
         }
         function scallable(){
         $data1=  $this->petrol_check();
         $data2=  $this->petrol_check1();
         $data3=  $this->petrol_check2();
         $data4=  $this->petrol_check3();
         $data5=  $this->petrol_check4();
         $data6=  $this->petrol_check5();
         $data7=  $this->petrol_check6();
         $data8=  $this->petrol_check7();
         $data9=  $this->petrol_check8();
         $data10=  $this->petrol_check9();
         $data11=  $this->petrol_check10();
         $data12=  $this->petrol_check11();
         $data13=  $this->petrol_check12();
         $data14=  $this->petrol_check13();
         $data15=  $this->petrol_check14();
         $data16=  $this->petrol_check15();
         $data17=  $this->petrol_check16();
         $data18=  $this->petrol_check17();
         $data19=  $this->petrol_check18();
         $data20=  $this->petrol_check19();
         $data21=  $this->petrol_check20();
         $data23=  $this->petrol_check22();
         $data24=  $this->petrol_check23();
         $data26=  $this->petrol_check25();
         $data27=  $this->petrol_check26();
         $data28=  $this->petrol_check27();
         $data29=  $this->petrol_payed();
         $data30=  $this->petrol_payed1();
         $data31=  $this->petrol_payed2();
         $data32=  $this->petrol_payed3();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10
                 +$data11+$data12+$data13+$data14+$data15+$data16+$data17+$data18+$data19+$data20+$data21
                 +$data23+$data24+$data26+$data27+$data28+$data29+$data30+$data31+$data32; 
         return $data;
         }
         function scallable2(){
         $data1=  $this->do_check();
         $data2=  $this->do_check1();
         $data3=  $this->do_check2();
         $data4=  $this->do_check3();
         $data5=  $this->do_check4();
         $data6=  $this->do_check5();
         $data7=  $this->do_check6();
         $data8=  $this->do_check7();
         $data9=  $this->do_check8();
         $data10=  $this->do_check9();
         $data11=  $this->do_check10();
         $data12=  $this->do_check11();
         $data13=  $this->do_check12();
         $data14=  $this->do_check13();
         $data15=  $this->do_check14();
         $data16=  $this->do_check15();
         $data17=  $this->do_check16();
         $data18=  $this->do_check17();
         $data19=  $this->do_check18();
         $data20=  $this->do_check19();
         $data21=  $this->do_check20();
         $data23=  $this->do_check22();
         $data24=  $this->do_check23();
         $data26=  $this->do_check25();
         $data27=  $this->petrol_check26();
         $data28=  $this->do_check27();
         $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10
                 +$data11+$data12+$data13+$data14+$data15+$data16+$data17+$data18+$data19+$data20+$data21
                 +$data23+$data24+$data26+$data27+$data28;
         return $data;
         }
         function diesel_entry(){
             $this->load->view('accountant_diesel_credit');
         }
         function kerosine_entry(){
             $this->load->view('accountant_kerosine_credit');
         }
         function oil_entry(){
             $this->load->view('accountant_oil_credit');
         }
         function oil_credit_entry($id){
             $data['oil']=$id;
             $this->load->view('oil_check_credit',$data);
         }
         function petrolconts($id){
             $data1=  $this->scallable2();
             $data2=  $this->scallable();
             $data3=  $this->petrolcontx($id);
             $data4=  $this->petrolcontx1($id);
             $data=$data1+$data2+$data3+$data4;
             $res=  $this->db->get_where('tb_petrol',array('id'=>$id,'stat_role'=>  $this->session->userdata('role_station')));
             if($res->num_rows()===1){
              $data['seller']=$res;
              $this->load->view('petrol_conts',$data);  
             }
         }
         function petrolcontx($id){
             $res=  $this->db->select_sum('sold_litre')->from('tb_petrol')->where(array('id'=>$id,'stat_role'=>  $this->session->userdata('role_station')))->get();
             foreach ($res->result() as $data){
                 $data_petrol=array(
                     'petrolsold_litre'=>$data->sold_litre
                 );
             }
             unset($data);
             return $data_petrol;
          }
          function petrolcontx1($id){
             $res=  $this->db->select_sum('sold_amount')->from('tb_petrol')->where(array('id'=>$id,'stat_role'=>  $this->session->userdata('role_station')))->get();
             foreach ($res->result() as $data){
                 $data_petrol=array(
                     'petrolsold_amount'=>$data->sold_amount
                 );
             }
             unset($data);
             return $data_petrol;
          }
            function sellsprint($id){
            $this->load->helper('dompdf','file');
             $data1=  $this->scallable2();
             $data2=  $this->scallable();
             $data3=  $this->petrolcontx($id);
             $data4=  $this->petrolcontx1($id);
             $data=$data1+$data2+$data3+$data4;
             $res=  $this->db->get_where('tb_petrol',array('id'=>$id,'stat_role'=>  $this->session->userdata('role_station')));
             if($res->num_rows()===1){
              $data['seller']=$res;
             $doc= $this->load->view('petrol_conts',$data,TRUE);
             $thml='petrol sells info';
             pdf_create($doc,$thml,TRUE);
             }
         }
            function dieselconts($id){
             $data1=  $this->scallable2();
             $data2=  $this->scallable();
             $data3=  $this->dieselcontx($id);
             $data4=  $this->dieselcontx1($id);
             $data=$data1+$data2+$data3+$data4;
             $res=  $this->db->get_where('tb_diesel',array('id'=>$id,'stat_role'=>  $this->session->userdata('role_station')));
             if($res->num_rows()===1){
              $data['seller']=$res;
              $this->load->view('diesel_conts',$data);  
             }
         }
         function dieselcontx($id){
             $res=  $this->db->select_sum('sold_litre')->from('tb_diesel')->where(array('id'=>$id,'stat_role'=>  $this->session->userdata('role_station')))->get();
             foreach ($res->result() as $data){
                 $data_petrol=array(
                     'dieselsold_litre'=>$data->sold_litre
                 );
             }
             unset($data);
             return $data_petrol;
          }
          function dieselcontx1($id){
             $res=  $this->db->select_sum('sold_amount')->from('tb_diesel')->where(array('id'=>$id,'stat_role'=>  $this->session->userdata('role_station')))->get();
             foreach ($res->result() as $data){
                 $data_petrol=array(
                     'dieselsold_amount'=>$data->sold_amount
                 );
             }
             unset($data);
             return $data_petrol;
          }
         function dieselsellsprint($id){
             $this->load->helper('dompdf','file');
             $data1=  $this->scallable2();
             $data2=  $this->scallable();
             $data3=  $this->dieselcontx($id);
             $data4=  $this->dieselcontx1($id);
             $data=$data1+$data2+$data3+$data4;
             $res=  $this->db->get_where('tb_diesel',array('id'=>$id,'stat_role'=>  $this->session->userdata('role_station')));
             if($res->num_rows()===1){
              $data['seller']=$res;
             $doc= $this->load->view('diesel_conts',$data,TRUE);
             $thml='diesel sells info';
             pdf_create($doc,$thml,TRUE);
             }
         }
         function kerosineconts($id){
             $data1=  $this->scallable2();
             $data2=  $this->scallable();
             $data3=  $this->kerosinecontx($id);
             $data4=  $this->kerosinecontx1($id);
             $data=$data1+$data2+$data3+$data4;
             $res=  $this->db->get_where('tb_kerosine',array('id'=>$id,'stat_role'=>  $this->session->userdata('role_station')));
             if($res->num_rows()===1){
              $data['seller']=$res;
              $this->load->view('kerosine_conts',$data);  
             }
         }
         function kerosinecontx($id){
             $res=  $this->db->select_sum('sold_litre')->from('tb_kerosine')->where(array('id'=>$id,'stat_role'=>  $this->session->userdata('role_station')))->get();
             foreach ($res->result() as $data){
                 $data_petrol=array(
                     'kerosinesold_litre'=>$data->sold_litre
                 );
             }
             unset($data);
             return $data_petrol;
          }
          function kerosinecontx1($id){
             $res=  $this->db->select_sum('sold_amount')->from('tb_kerosine')->where(array('id'=>$id,'stat_role'=>  $this->session->userdata('role_station')))->get();
             foreach ($res->result() as $data){
                 $data_petrol=array(
                     'kerosinesold_amount'=>$data->sold_amount
                 );
             }
             unset($data);
             return $data_petrol;
          }
         function kerosinesellsprint($id){
             $this->load->helper('dompdf','file');
            $data1=  $this->scallable2();
             $data2=  $this->scallable();
             $data3=  $this->kerosinecontx($id);
             $data4=  $this->kerosinecontx1($id);
             $data=$data1+$data2+$data3+$data4;
             $res=  $this->db->get_where('tb_kerosine',array('id'=>$id,'stat_role'=>  $this->session->userdata('role_station')));
             if($res->num_rows()===1){
              $data['seller']=$res;
             $doc= $this->load->view('kerosine_conts',$data,TRUE);
             $thml='kerosine sells info';
             pdf_create($doc,$thml,TRUE);
             } 
         }
         function oilconts($id){
             $data1= $this->scallable2();
             $data2= $this->scallable();
             $data3= $this->oilcontx($id);
             $data4= $this->oilcontx1($id);
             $data5=$this->oil_checked();
             $data=$data1+$data2+$data3+$data4+$data5;
             $res=  $this->db->get_where('tb_oil',array('id'=>$id,'stat_role'=>  $this->session->userdata('role_station')));
             if($res->num_rows()===1){
              $data['seller']=$res;
              $this->load->view('oil_conts',$data);  
             }
         }
     function oilcontx1($id){
             $res=  $this->db->select_sum('sold_amount')->from('tb_oil')->where(array('id'=>$id,'stat_role'=>  $this->session->userdata('role_station')))->get();
             foreach ($res->result() as $data){
                 $data_petrol=array(
                     'oilsold_amount'=>$data->sold_amount
                 );
             }
             unset($data);
             return $data_petrol;
          }
          function oilcontx($id){
             $res=  $this->db->select_sum('sold_qnty')->from('tb_oil')->where(array('id'=>$id,'stat_role'=>  $this->session->userdata('role_station')))->get();
             foreach ($res->result() as $data){
                 $data_petrol=array(
                     'oilsold_litre'=>$data->sold_qnty
                 );
             }
             unset($data);
             return $data_petrol;
          }
          function oil_checked(){
         $res=  $this->db->select_sum('prod_name')
               ->from('tb_oil')->join('oil_update','oil_update.oil_product = tb_oil.prod_qnty')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'oil'=>$row->prod_name,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'oil'=>'Nothing present'
             );
             return $petrola_data;
         }
     }
         function oilsellsprint($id){
             $this->load->helper('dompdf','file');
            $data1= $this->scallable2();
             $data2= $this->scallable();
             $data3= $this->oilcontx($id);
             $data4= $this->oilcontx1($id);
             $data5=$this->oil_checked();
             $data=$data1+$data2+$data3+$data4+$data5;
             $res=  $this->db->get_where('tb_oil',array('id'=>$id,'stat_role'=>  $this->session->userdata('role_station')));
             if($res->num_rows()===1){
              $data['seller']=$res;
             $doc= $this->load->view('oil_conts',$data,TRUE);
             $thml='oil sells info';
             pdf_create($doc,$thml,TRUE);
             } 
         }
             function expenditure(){
             $data1=  $this->scallable();
             $data2=  $this->scallable2();
             $data=$data1+$data2;
             $this->load->view('accountant_expenditure',$data);
         }
         function expenditure_submit(){
        $this->form_validation->set_rules('cmt','Cash used','trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('wrs','Reasons','trim|required|xss_clean');
        $this->form_validation->set_rules('dt','Date','trim|required|xss_clean');
        if($this->form_validation->run()===FALSE){
         echo '<p class="alert alert-danger">Field can not be empty..Try again</p>';  
        }else{
         $this->load->model('accountant_model');
         $amount=  $this->input->post('cmt');
         $reasons=  $this->input->post('wrs');
         $date=  $this->input->post('dt');
         $entry=  $this->session->userdata('username');
         $mode=  $this->input->post('mdc');
         $cheque=  $this->input->post('chks');
         $roles=  $this->session->userdata('role_station');
         $this->accountant_model->expenditure($amount,$reasons,$date,$entry,$mode,$cheque,$roles);
         echo '<p class="alert alert-success">Posted successfully</p>';
    
         }
     }
     function report(){
         $this->load->view('accountant_report');
     }
     function report1(){
         $this->load->view('accountant_report1');
     }
     function report2(){
         $this->load->view('accountant_report2');
     }
     function report3(){
         $this->load->view('accountant_report3');
     }
     function petrolreport($id){
         $data['hist']=$id;
         $this->load->view('petrolreport_info',$data);
     }
     function reportprint($id){
     $this->load->helper('dompdf','file');
     $data['hist']=$id;
     $doc= $this->load->view('petrolreport_info',$data,TRUE);
     $htc='petrol report'; 
     pdf_create($doc,$htc,TRUE);
     }
     function reportprint1($id){
         $this->load->helper('dompdf','file');
         $data['hist']=$id;
       $doc= $this->load->view('dieselreport_info',$data,TRUE);
       $htc='diesel report'; 
       pdf_create($doc,$htc,TRUE);
     }
     function reportprint2($id){
         $this->load->helper('dompdf','file');
         $data['hist']=$id;
       $doc= $this->load->view('kerosinereport_info',$data,TRUE);
       $htc='kerosine report'; 
       pdf_create($doc,$htc,TRUE);
     }
     function reportprint3($id){
      $this->load->helper('dompdf','file');
      $data['hist']=$id;
       $doc= $this->load->view('oilreport_info',$data,TRUE);
       $htc='oil report'; 
       pdf_create($doc,$htc,TRUE);
     }
     function dieselreport($id){
         $data['hist']=$id;
         $this->load->view('dieselreport_info',$data);
     }
     function kerosinereport($id){
         $data['hist']=$id;
         $this->load->view('kerosinereport_info',$data);
     }
     function oilreport($id){
         $data['hist']=$id;
         $this->load->view('oilreport_info',$data);
     }
     function extensibility($month,$year){
        $this->db->select_sum('cash_used');
        $this->db->from('tb_expenditure');
        $this->db->like('date_entered',$month,'after');
        $this->db->like('date_entered',$year,'before');
        $this->db->where(array('stat_role'=>  $this->session->userdata('role_station')));
         $res= $this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $data_array=array(
                     'cash'=>$row->cash_used,
                 );
             }
        unset($row);
        return $data_array;
        }  else {
         $data_array=array(
         'cash'=>''
          );
         return $data_array;
     }
     }function extensibility1($date,$date2){
        $this->db->select_sum('cash_used');
        $this->db->from('tb_expenditure');
        $this->db->where(array('date_entered >='=>$date,'date_entered <='=>$date2,'stat_role'=>  $this->session->userdata('role_station')));
         $res= $this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $data_array=array(
                     'cash'=>$row->cash_used,
                 );
             }
        unset($row);
        return $data_array;
        }  else {
         $data_array=array(
         'cash'=>''
          );
         return $data_array;
     }
     }
  function general_report(){
   $this->load->view('accountant_year_reportk');
     }
     function printz(){
         $this->load->helper('dompdf','file');
         $data1=  $this->scallable();
         $data2=  $this->extensibility();
         $data=$data1+$data2;
         $doc=$this->load->view('general_report',$data,TRUE);
         $name='Repeort'.' ';
         pdf_create($doc,$name,TRUE);
     }
     function expupdate($id){
         $this->load->model('accountant_model');
         $amount=  $this->input->post('cash');
         $datez=  $this->input->post('dte');
         $reason=  $this->input->post('rsn');
         $mode=  $this->input->post('md');
         $chqno=  $this->input->post('shk');
         $roles=  $this->session->userdata('role_station');
         $this->accountant_model->updatez($id,$amount,$reason,$mode,$chqno,$datez,$roles);
         echo '<p class="alert alert-success">Changes updated..</p>';
     }
     function printexp($id){
     $this->load->helper('dompdf','file');
     $data['exp']=$id;
     $doc=$this->load->view('expenditureinfoprintz',$data,TRUE);
     $htc='expenditure report';
     pdf_create($doc,$htc,TRUE);
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
       $res1=  $this->db->select_sum('sold_amount')->from('tb_oil')
               ->join('oil_update','oil_update.oil_product = tb_oil.prod_qnty')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
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
 function petrolupdate(){
     $this->load->view('accountantupdate_petrol');
 }
 function dieselupdate(){
     $this->load->view('accountantupdate_diesel');
 }
 function kerosineupdate(){
     $this->load->view('accountantupdate_kerosine');
 }
 function oilupdate(){
     $this->load->view('accountantupdate_oil');
 }
 function margin_report(){
     $data1=  $this->scallable();
     $data2=  $this->scallable2();
     $data=$data1+$data2;
     $this->load->view('accountant_margin_report',$data);
 }
 function dayPetrol(){
     $this->load->view('accountant_day_report');  
 }
 function day_petrol($date=''){
     $res=  $this->db->get_where('tb_petrol',array('sold_date'=>$date,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
     $data1=  $this->semiPetrol($date);
     $data2=  $this->quarterPetrol($date);
     $data3=  $this->petrolUpdatez($date);
     $data=$data1+$data2+$data3;
    if($res->num_rows()>0){
     $this->load->view('accountant_semi_report',$data);
     }  else {
         echo '<p class="alert alert-warning">Nothing sold to this '.$date.'</p>';
     }
     }
  function weekPetrol(){
     $this->load->view('accountant_week_report');
 }
 function week_petrol($date='',$date2=''){
     $data1=  $this->yearPetrol($date, $date2);
     $data2=  $this->petrol_solddate($date, $date2);
     $data3=  $this->petrolUpdatez1($date,$date2);
     $data=$data1+$data2+$data3;
     $this->db->select('*');
     $this->db->from('tb_petrol');
     $this->db->where(array('sold_date >='=>$date,'sold_date <='=>$date2,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
    $res= $this->db->get();
    if($res->num_rows()>0){
        $this->load->view('accountant_quarter_report',$data);
    }  else {
    echo '<p class="alert alert-warning">Nothing sold to this '.$date.' '.'and'.' '.$date2.'</p>'; 
    }
 }
 function monthPetrol(){
     $this->load->view('accountant_month_report');
 }
 function check_month($month='',$year=''){
     $data1=  $this->dayGeneral($month,$year);
     $data2=  $this->weekGeneral($month,$year);
     $data3=  $this->petrolUpdatez2($month,$year);
     $data=$data1+$data2+$data3;
     $this->db->select('*');
     $this->db->from('tb_petrol');
     $this->db->like('sold_date',$month,'after');
     $this->db->like('sold_date',$year,'before');
     $this->db->where(array('seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
     $res=  $this->db->get();
     if($res->num_rows()>0){
       $this->load->view('accountant_day_reportg',$data);
     }else{
        echo '<p class="alert alert-warning"> Nothing sold to this '.$month.' '.'Month and this '.$year.' Year</p>'; 
     }
 }
 function quarterPetrol($date){
     $res=  $this->db->select_sum('sold_litre')->from('tb_petrol')
                 ->where(array('sold_date'=>  $date,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_litre'=>$row->sold_litre,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_litre'=>'Nothing present'
             );
             return $petrola_data;
         }
 }
 function semiPetrol($date){
     $res=  $this->db->select_sum('sold_amount')->from('tb_petrol')->where(array('sold_date'=>  $date,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_amount'=>$row->sold_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_amount'=>'Nothing present'
             );
             return $petrola_data;
         }
 }
 function yearPetrol($date,$date2){
     $res=  $this->db->select_sum('sold_amount')->from('tb_petrol')
             ->where(array('sold_date >='=>$date,'sold_date <='=>$date2,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_amount'=>$row->sold_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_amount'=>'Nothing present'
             );
             return $petrola_data;
         }
 }
 function petrol_solddate($date,$date2){
     $res=  $this->db->select_sum('sold_litre')->from('tb_petrol')
                 ->where(array('sold_date >='=>$date,'sold_date <='=>$date2,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_litre'=>$row->sold_litre,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_litre'=>'Nothing present'
             );
             return $petrola_data;
         }
 }
 function dayGeneral($month,$year){
   $this->db->select_sum('sold_litre');
   $this->db->from('tb_petrol');
   $this->db ->like('sold_date',$month,'after');
   $this->db->like('sold_date',$year,'before');
   $this->db->where(array('seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
   $res=  $this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_litre'=>$row->sold_litre,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_litre'=>'Nothing present'
             );
             return $petrola_data;
         }  
 }
 function weekGeneral($month,$year){
    $this->db->select_sum('sold_amount');
    $this->db->from('tb_petrol');
    $this->db->like('sold_date',$month,'after');
    $this->db->like('sold_date',$year,'before');    
    $this->db->where(array('seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
    $res=$this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_amount'=>$row->sold_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_amount'=>'Nothing present'
             );
             return $petrola_data;
         } 
 }
 function dayDiesel(){
     $this->load->view('accountant_day_reportd');  
 }
 function day_diesel($date=''){
     $res=  $this->db->get_where('tb_diesel',array('sold_date'=>$date,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
     $data1=  $this->semiDiesel($date);
     $data2=  $this->quarterDiesel($date);
     $data3=  $this->dieselUpdatez($date);
     $data=$data1+$data2+$data3;
    if($res->num_rows()>0){
     $this->load->view('accountant_semi_reportd',$data);
     }  else {
         echo '<p class="alert alert-warning">Nothing sold to this '.$date.'</p>';
     }
     }
  function weekDiesel(){
     $this->load->view('accountant_week_reportd');
 }
 function week_diesel($date='',$date2=''){
     $data1=  $this->yearDiesel($date, $date2);
     $data2=  $this->diesel_solddate($date, $date2);
     $data3=  $this->dieselUpdatez1($date,$date2);
     $data=$data1+$data2+$data3;
     $this->db->select('*');
     $this->db->from('tb_diesel');
     $this->db->where(array('sold_date >='=>$date,'sold_date <='=>$date2,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
    $res= $this->db->get();
    if($res->num_rows()>0){
        $this->load->view('accountant_quarter_reportd',$data);
    }  else {
    echo '<p class="alert alert-warning">Nothing sold to this '.$date.' '.'and'.' '.$date2.'</p>'; 
    }
 }
 function monthDiesel(){
     $this->load->view('accountant_month_reportd');
 }
 function check_month1($month='',$year=''){
     $data1=  $this->monthGeneral($month,$year);
     $data2=  $this->yearGeneral($month,$year);
     $data3=  $this->dieselUpdatez2($month,$year);
     $data=$data1+$data2+$data3;
     $this->db->select('*');
     $this->db->from('tb_diesel');
     $this->db->like('sold_date',$month,'after');
     $this->db->like('sold_date',$year,'before');
     $this->db->where(array('seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
    $res=  $this->db->get();
     if($res->num_rows()>0){
         $this->load->view('accountant_week_reportg',$data);
     }  else {
        echo '<p class="alert alert-warning"> Nothing sold to this '.$month.' '.'Month</p>'; 
     }
 }
 function quarterDiesel($date){
     $res=  $this->db->select_sum('sold_litre')->from('tb_diesel')
                 ->where(array('sold_date'=>  $date,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_litre'=>$row->sold_litre,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_litre'=>'Nothing present'
             );
             return $petrola_data;
         }
 }
 function semiDiesel($date){
     $res=  $this->db->select_sum('sold_amount')->from('tb_diesel')->where(array('sold_date'=>  $date,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_amount'=>$row->sold_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_amount'=>'Nothing present'
             );
             return $petrola_data;
         }
 }
 function yearDiesel($date,$date2){
     $res=  $this->db->select_sum('sold_amount')->from('tb_diesel')
             ->where(array('sold_date >='=>$date,'sold_date <='=>$date2,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_amount'=>$row->sold_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_amount'=>'Nothing present'
             );
             return $petrola_data;
         }
 }
 function yearDiesel1($date,$date2){
     $res=  $this->db->select_sum('sold_amount')->from('tb_diesel')
             ->where(array('sold_date >='=>$date,'sold_date <='=>$date2,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_amount1'=>$row->sold_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_amount1'=>'Nothing present'
             );
             return $petrola_data;
         }
 }
 function diesel_solddate($date,$date2){
     $res=  $this->db->select_sum('sold_litre')->from('tb_diesel')
                 ->where(array('sold_date >='=>$date,'sold_date <='=>$date2,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_litre'=>$row->sold_litre,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_litre'=>'Nothing present'
             );
             return $petrola_data;
         }
 }
 function monthGeneral($month,$year){
   $this->db->select_sum('sold_litre');
   $this->db->from('tb_diesel');
   $this->db ->like('sold_date',$month,'after');
   $this->db->like('sold_date',$year,'before');
   $this->db->where(array('seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
   $res=  $this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_litre'=>$row->sold_litre,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_litre'=>'Nothing present'
             );
             return $petrola_data;
         }   
 }
 function yearGeneral($month,$year){
    $this->db->select_sum('sold_amount');
    $this->db->from('tb_diesel');
    $this->db->like('sold_date',$month,'after');
    $this->db->like('sold_date',$year,'before');    
    $this->db->where(array('seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
    $res=$this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_amount'=>$row->sold_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_amount'=>'Nothing present'
             );
             return $petrola_data;
         } 
 }
 function yearGeneralz($month,$year){
    $this->db->select_sum('sold_amount');
    $this->db->from('tb_diesel');
    $this->db->like('sold_date',$month,'after');
    $this->db->like('sold_date',$year,'before');    
    $this->db->where(array('seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
    $res=$this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_amount1'=>$row->sold_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_amount1'=>'Nothing present'
             );
             return $petrola_data;
         } 
 }
 function dayKerosine(){
     $this->load->view('accountant_day_reportk');  
 }
 function day_kerosine($date=''){
     $res=  $this->db->get_where('tb_kerosine',array('sold_date'=>$date,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
     $data1=  $this->semiKerosine($date);
     $data2=  $this->quarterDiesel($date);
     $data3=  $this->kerosineUpdatez($date);
     $data=$data1+$data2+$data3;
    if($res->num_rows()>0){
     $this->load->view('accountant_semi_reportk',$data);
     }  else {
         echo '<p class="alert alert-warning">Nothing sold to this '.$date.'</p>';
     }
     }
  function weekKerosine(){
     $this->load->view('accountant_week_reportk');
 }
 function week_kerosine($date='',$date2=''){
     $data1=  $this->yearKerosine($date, $date2);
     $data2=  $this->kerosine_solddate($date, $date2);
     $data3=  $this->kerosineUpdatez1($date,$data2);
     $data=$data1+$data2+$data3;
     $this->db->select('*');
     $this->db->from('tb_kerosine');
     $this->db->where(array('sold_date >='=>$date,'sold_date <='=>$date2,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
    $res= $this->db->get();
    if($res->num_rows()>0){
        $this->load->view('accountant_quarter_reportk',$data);
    }  else {
    echo '<p class="alert alert-warning">Nothing sold to this '.$date.' '.'and'.' '.$date2.'</p>'; 
    }
 }
 function monthKerosine(){
     $this->load->view('accountant_month_reportk');
 }
 function check_month2($month='',$year=''){
     $data1=  $this->dayGeneral1($month,$year);
     $data2=  $this->weekGeneral1($month,$year);
     $data3=  $this->kerosineUpdatez2($month,$year);
     $data=$data1+$data2+$data3;
     $this->db->select('*');
     $this->db->from('tb_kerosine');
     $this->db->like('sold_date',$month,'after');
      $this->db->like('sold_date',$year,'before'); 
     $this->db->where(array('seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
    $res=  $this->db->get();
     if($res->num_rows()>0){
         $this->load->view('accountant_month_reportg',$data);
     }  else {
        echo '<p class="alert alert-warning"> Nothing sold to this '.$month.' '.'Month</p>'; 
     }
 }
 function quarterKerosine($date){
     $res=  $this->db->select_sum('sold_litre')->from('tb_kerosine')
                 ->where(array('sold_date'=>  $date,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_litre'=>$row->sold_litre,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_litre'=>'Nothing present'
             );
             return $petrola_data;
         }
 }
 function semiKerosine($date){
     $res=  $this->db->select_sum('sold_amount')->from('tb_kerosine')->where(array('sold_date'=>  $date,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_amount'=>$row->sold_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_amount'=>'Nothing present'
             );
             return $petrola_data;
         }
 }
 function yearKerosine($date,$date2){
     $res=  $this->db->select_sum('sold_amount')->from('tb_kerosine')
             ->where(array('sold_date >='=>$date,'sold_date <='=>$date2,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_amount'=>$row->sold_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_amount'=>'Nothing present'
             );
             return $petrola_data;
         }
 }
 function yearKerosine1($date,$date2){
     $res=  $this->db->select_sum('sold_amount')->from('tb_kerosine')
             ->where(array('sold_date >='=>$date,'sold_date <='=>$date2,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_amount2'=>$row->sold_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_amount2'=>'Nothing present'
             );
             return $petrola_data;
         }
 }
 function kerosine_solddate($date,$date2){
     $res=  $this->db->select_sum('sold_litre')->from('tb_kerosine')
                 ->where(array('sold_date >='=>$date,'sold_date <='=>$date2,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_litre'=>$row->sold_litre,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_litre'=>'Nothing present'
             );
             return $petrola_data;
         }
 }
 function dayGeneral1($month,$year){
   $this->db->select_sum('sold_litre');
   $this->db->from('tb_kerosine');
   $this->db ->like('sold_date',$month,'after');
   $this->db->like('sold_date',$year,'before');
   $this->db->where(array('seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
   $res=  $this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_litre'=>$row->sold_litre,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_litre'=>'Nothing present'
             );
             return $petrola_data;
         }   
 }
 function weekGeneral1($month,$year){
    $this->db->select_sum('sold_amount');
    $this->db->from('tb_kerosine');
    $this->db->like('sold_date',$month,'after');
    $this->db->like('sold_date',$year,'before');    
    $this->db->where(array('seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
    $res=$this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_amount'=>$row->sold_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_amount'=>'Nothing present'
             );
             return $petrola_data;
         } 
 }
 function weekGeneralz1($month,$year){
    $this->db->select_sum('sold_amount');
    $this->db->from('tb_kerosine');
    $this->db->like('sold_date',$month,'after');
    $this->db->like('sold_date',$year,'before');    
    $this->db->where(array('seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
    $res=$this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_amount2'=>$row->sold_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_amount2'=>'Nothing present'
             );
             return $petrola_data;
         } 
 }
 function petrolUpdatez($date){
     $res=  $this->db->get_where('tb_update',array('updated_date'=>$date,'stat_role'=>  $this->session->userdata('role_station')));
     if($res->num_rows()===1){
         foreach ($res->result() as $row){
             $petrol_price=array(
                 'petrol_price'=>$row->petrol
             );
         }
         unset($row);
         return $petrol_price;
     }  else {
         $petrol_price=array(
                 'petrol_price'=>''
         );
         return $petrol_price;
     }
 }function petrolUpdatez1($date,$date2){
             $this->db->select_sum('petrol');
             $this->db->from('tb_update');
             $this->db->where(array('updated_date >='=>$date,'updated_date <='=>$date2,'stat_role'=>  $this->session->userdata('role_station')));
         $res= $this->db->get();
             if($res->num_rows()===1){
         foreach ($res->result() as $row){
             $petrol_price=array(
                 'petrol_price'=>$row->petrol
             ); 
         }
         unset($row);
         return $petrol_price;
     }  else {
         $petrol_price=array(
                 'petrol_price'=>''
         );
         return $petrol_price;
     }
 }function petrolUpdatez2($month,$year){
            $this->db->select_sum('petrol');
            $this->db->from('tb_update');
            $this->db->like('updated_date',$month,'after');
            $this->db->like('updated_date',$year,'before');
            $this->db->where(array('stat_role'=>  $this->session->userdata('role_station')));
            $res= $this->db->get();
     if($res->num_rows()===1){
         foreach ($res->result() as $row){
             $petrol_price=array(
                 'petrol_price'=>$row->petrol
             ); 
         }
         unset($row);
         return $petrol_price;
     }  else {
         $petrol_price=array(
                 'petrol_price'=>''
         );
         return $petrol_price;
     }
 }
 function dieselUpdatez($date){
     $res=  $this->db->get_where('tb_update',array('updated_date'=>$date,'stat_role'=>  $this->session->userdata('role_station')));
     if($res->num_rows()===1){
         foreach ($res->result() as $row){
             $petrol_price=array(
                 'diesel_price'=>$row->diesel
             );
         }
         unset($row);
         return $petrol_price;
     }  else {
         $petrol_price=array(
                 'diesel_price'=>''
         );
         return $petrol_price;
     }
 }function dieselUpdatez1($date,$date2){
             $this->db->select_sum('diesel');
             $this->db->from('tb_update');
             $this->db->where(array('updated_date >='=>$date,'updated_date <='=>$date2,'stat_role'=>  $this->session->userdata('role_station')));
         $res= $this->db->get();
             if($res->num_rows()===1){
         foreach ($res->result() as $row){
             $petrol_price=array(
                 'diesel_price'=>$row->diesel
             ); 
         }
         unset($row);
         return $petrol_price;
     }  else {
         $petrol_price=array(
                 'diesel_price'=>''
         );
         return $petrol_price;
     }
 }function dieselUpdatez2($month,$year){
            $this->db->select_sum('diesel');
            $this->db->from('tb_update');
            $this->db->like('updated_date',$month,'after');
            $this->db->like('updated_date',$year,'before');
            $this->db->where(array('stat_role'=>  $this->session->userdata('role_station')));
            $res= $this->db->get();
     if($res->num_rows()===1){
         foreach ($res->result() as $row){
             $petrol_price=array(
                 'diesel_price'=>$row->diesel
             ); 
         }
         unset($row);
         return $petrol_price;
     }  else {
         $petrol_price=array(
                 'diesel_price'=>''
         );
         return $petrol_price;
     }
 }
 function kerosineUpdatez($date){
     $res=  $this->db->get_where('tb_update',array('updated_date'=>$date,'stat_role'=>  $this->session->userdata('role_station')));
     if($res->num_rows()===1){
         foreach ($res->result() as $row){
             $petrol_price=array(
                 'kerosine_price'=>$row->kerosine
             ); 
         }
         unset($row);
         return $petrol_price;
     }  else {
         $petrol_price=array(
                 'kerosine_price'=>''
         );
         return $petrol_price;
     }
 }function kerosineUpdatez1($date,$date2){
             $this->db->select_sum('kerosine');
             $this->db->from('tb_update');
             $this->db->where(array('updated_date >='=>$date,'updated_date <='=>$date2,'stat_role'=>  $this->session->userdata('role_station')));
         $res= $this->db->get();
             if($res->num_rows()===1){
         foreach ($res->result() as $row){
             $petrol_price=array(
                 'kerosine_price'=>$row->kerosine
             ); 
         }
         unset($row);
         return $petrol_price;
     }  else {
         $petrol_price=array(
                 'kerosine_price'=>''
         );
         return $petrol_price;
     }
 }function kerosineUpdatez2($month,$year){
            $this->db->select_sum('kerosine');
            $this->db->from('tb_update');
            $this->db->like('updated_date',$month,'after');
            $this->db->like('updated_date',$year,'before');
            $this->db->where(array('stat_role'=>  $this->session->userdata('role_station')));
            $res= $this->db->get();
     if($res->num_rows()===1){
         foreach ($res->result() as $row){
             $petrol_price=array(
                 'kerosine_price'=>$row->kerosine
             ); 
         }
         unset($row);
         return $petrol_price;
     }  else {
         $petrol_price=array(
                 'kerosine_price'=>''
         );
         return $petrol_price;
     }
 }
 function oilUpdatez($id,$date){
     $this->db->select('*');
     $this->db->from('oil_update');
     $this->db->join('tb_oil','tb_oil.prod_qnty = oil_update.oil_product');
     $this->db->where(array('oil_id'=>$id,'date_update'=>$date,'stat_rolez'=>  $this->session->userdata('role_station')));
     $res=  $this->db->get();
     if($res->num_rows()>0){
         foreach ($res->result() as $row){
             $petrol_price=array(
                 'oil_price'=>$row->oil_cost
             );
         }
         unset($row);
         return $petrol_price;
     }  else {
         $petrol_price=array(
                 'oil_price'=>''
         );
         return $petrol_price;
     }
 }function oilUpdatez1($id,$date,$date2){
     $this->db->select('*');
     $this->db->from('oil_update');
     $this->db->join('tb_oil','tb_oil.prod_qnty = oil_update.oil_product');
     $this->db->where(array('oil_id'=>$id,'date_update >='=>$date,'date_update <='=>$date2,'stat_rolez'=>  $this->session->userdata('role_station')));
     $res=  $this->db->get();
     if($res->num_rows()>0){
         foreach ($res->result() as $row){
             $petrol_price=array(
                 'oil_price'=>$row->oil_cost
             );
         }
         unset($row);
         return $petrol_price;
     }  else {
         $petrol_price=array(
                 'oil_price'=>''
         );
         return $petrol_price;
     }
 }function oilUpdatez2($id,$month,$year){
     $this->db->select('*');
     $this->db->from('oil_update');
     $this->db->join('tb_oil','tb_oil.prod_qnty = oil_update.oil_product');
     $this->db->like('date_update',$month,'after');
     $this->db->like('date_update',$year,'before');
     $this->db->where(array('oil_id'=>$id,'stat_rolez'=>  $this->session->userdata('role_station')));
     $res=  $this->db->get();
     if($res->num_rows()>0){
         foreach ($res->result() as $row){
             $petrol_price=array(
                 'oil_price'=>$row->oil_cost
             );
         }
         unset($row);
         return $petrol_price;
     }  else {
         $petrol_price=array(
                 'oil_price'=>''
         );
         return $petrol_price;
     }
 }
 function oilChangez($id){
     $data['oil']=$id;
     $this->load->view('oilChangesReport',$data);
 }
 function oil_check($id){
     $data['oil']=$id;
     $this->load->view('oil_check_ok',$data);
 }
 function oil_margin(){
     $this->load->view('accountant_margin_oil');
 }
 function dayOil($id){
     $data['id']=$id;
     $this->db->select('*');
     $this->db->from('tb_oil');
     $this->db->join('oil_update','oil_update.oil_product= tb_oil.prod_qnty');
     $this->db->where(array('oil_id'=>$id,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
     $res=  $this->db->get();
     if($res->num_rows()>0){
         $this->load->view('accountant_day_reporto',$data);
     }  else {
         echo '<p class="alert alert-warning"> Nothing has been sold</p>';
     }
 }
 function day_oil($id,$date=''){
     $data1=  $this->semiOil($id,$date);
     $data2=$this->quarterOil($id,$date);
     $data3=  $this->oilUpdatez($id,$date);
     $data=$data1+$data2+$data3;
    $this->db->select('*');
     $this->db->from('tb_oil');
     $this->db->join('oil_update','oil_update.oil_product= tb_oil.prod_qnty');
     $this->db->where(array('oil_id'=>$id,'sold_date'=>$date,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
     $res=  $this->db->get();
     if($res->num_rows()>0){
         $this->load->view('accountant_semi_reporto',$data);
     }  else {
        echo '<p class="alert alert-warning">Nothing sold to this '.$date.'</p>';  
     }
 }
 function quarterOil($id,$date){
            $this->db->select_sum('sold_qnty');
            $this->db->from('tb_oil');
            $this->db->join('oil_update','oil_update.oil_product= tb_oil.prod_qnty');
            $this->db->where(array('oil_id'=>$id,'sold_date'=>  $date,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
         $res=  $this->db->get();
            if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_litre'=>$row->sold_qnty,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_litre'=>'Nothing present'
             );
             return $petrola_data;
         }
 }
 function semiOil($id,$date){
    $this->db->select_sum('sold_amount');
    $this->db->from('tb_oil');
    $this->db->join('oil_update','oil_update.oil_product= tb_oil.prod_qnty');
    $this->db->where(array('oil_id'=>$id,'sold_date'=>  $date,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
         $res=  $this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_amount'=>$row->sold_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_amount'=>'Nothing present'
             );
             return $petrola_data;
         }
 }
 function yearOil($id,$date,$date2){
     $this->db->select_sum('sold_amount');
     $this->db->from('tb_oil');
     $this->db->join('oil_update','oil_update.oil_product= tb_oil.prod_qnty');
     $this->db->where(array('oil_id'=>$id,'sold_date >='=>$date,'sold_date <='=>$date2,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
     $res=  $this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_amount'=>$row->sold_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_amount'=>'Nothing present'
             );
             return $petrola_data;
         }
 }
 function yearOil1($id,$date,$date2){
     $this->db->select_sum('sold_amount');
     $this->db->from('tb_oil');
     $this->db->join('oil_update','oil_update.oil_product= tb_oil.prod_qnty');
     $this->db->where(array('oil_id'=>$id,'sold_date >='=>$date,'sold_date <='=>$date2,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
     $res=  $this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_amount3'=>$row->sold_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_amount3'=>'Nothing present'
             );
             return $petrola_data;
         }
 }
 function oil_solddate($id,$date,$date2){
     $this->db->select_sum('sold_qnty');
     $this->db->from('tb_oil');
     $this->db->join('oil_update','oil_update.oil_product= tb_oil.prod_qnty');
     $this->db->where(array('oil_id'=>$id,'sold_date >='=>$date,'sold_date <='=>$date2,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
     $res=  $this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_litre'=>$row->sold_qnty,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_litre'=>'Nothing present'
             );
             return $petrola_data;
         }
 }
 function dayGeneral3($id,$month,$year){
   $this->db->select_sum('sold_qnty');
   $this->db->from('tb_oil');
   $this->db->join('oil_update','oil_update.oil_product= tb_oil.prod_qnty');
   $this->db->like('sold_date',$month,'after');
   $this->db->like('sold_date',$year,'before');
   $this->db->where(array('oil_id'=>$id,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
   $res=$this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_litre'=>$row->sold_qnty,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_litre'=>'Nothing present'
             );
             return $petrola_data;
         }  
 }
 function weekGeneral3($id,$month,$year){
   $this->db->select_sum('sold_amount');
   $this->db->from('tb_oil');
   $this->db->join('oil_update','oil_update.oil_product= tb_oil.prod_qnty');
   $this->db->like('sold_date',$month,'after');
   $this->db->like('sold_date',$year,'before');
   $this->db->where(array('oil_id'=>$id,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
   $res=$this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_amount'=>$row->sold_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_amount'=>'Nothing present'
             );
             return $petrola_data;
         } 
 }
 function weekGeneralz3($id,$month,$year){
   $this->db->select_sum('sold_amount');
   $this->db->from('tb_oil');
   $this->db->join('oil_update','oil_update.oil_product= tb_oil.prod_qnty');
   $this->db->like('sold_date',$month,'after');
   $this->db->like('sold_date',$year,'before');
   $this->db->where(array('oil_id'=>$id,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
   $res=$this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'sold_amount3'=>$row->sold_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'sold_amount3'=>'Nothing present'
             );
             return $petrola_data;
         } 
 }
 function weekOil($id){
     $data['id']=$id;
     $this->db->select('*');
     $this->db->from('tb_oil');
     $this->db->join('oil_update','oil_update.oil_product= tb_oil.prod_qnty');
     $this->db->where(array('oil_id'=>$id,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
     $res=  $this->db->get();
     if($res->num_rows()>0){
        $this->load->view('accountant_week_reporto',$data);
     }  else {
         echo '<p class="alert alert-warning"> Nothing has been sold</p>';
     }
     
 }
 function week_oil($id,$date='',$date2=''){
     $data1=  $this->yearOil($id,$date, $date2);
     $data2=  $this->oil_solddate($id,$date, $date2);
     $data3=  $this->oilUpdatez1($id,$date,$date2);
     $data=$data1+$data2+$data3;
     $this->db->select('*');
     $this->db->from('tb_oil');
     $this->db->join('oil_update','oil_update.oil_product= tb_oil.prod_qnty');
     $this->db->where(array('oil_id'=>$id,'sold_date >='=>$date,'sold_date <='=>$date2,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
    $res= $this->db->get();
    if($res->num_rows()>0){
        $this->load->view('accountant_quarter_reporto',$data);
    }  else {
    echo '<p class="alert alert-warning">Nothing sold to this '.$date.' '.'and'.' '.$date2.'</p>'; 
    }
 }
 function monthOil($id){
     $data['id']=$id;
     $this->db->select('*');
     $this->db->from('tb_oil');
     $this->db->join('oil_update','oil_update.oil_product= tb_oil.prod_qnty');
     $this->db->where(array('oil_id'=>$id,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
     $res=  $this->db->get();
     if($res->num_rows()>0){
       $this->load->view('accountant_month_reporto',$data);
     }  else {
         echo '<p class="alert alert-warning"> Nothing has been sold</p>';
     }
 }
 function check_month3($id,$month='',$year=''){
     $data1=  $this->dayGeneral3($id,$month,$year);
     $data2=  $this->weekGeneral3($id,$month,$year);
     $data3=  $this->oilUpdatez2($id,$month,$year);
     $data=$data1+$data2+$data3;
     $this->db->select('*');
     $this->db->from('tb_oil');
     $this->db->like('sold_date',$month,'after');
     $this->db->like('sold_date',$year,'before');
     $this->db->where(array('oil_id'=>$id,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
    $res=  $this->db->get();
     if($res->num_rows()>0){
         $this->load->view('accountant_year_reportg',$data);
     }  else {
        echo '<p class="alert alert-warning"> Nothing sold to this '.$month.' '.'Month</p>'; 
     }
 }
 function general_month($month='',$year=''){
    $data1=  $this->dayGeneral($month,$year);
    $data2= $this->weekGeneral($month,$year);
    $data3=  $this->dayGeneral1($month,$year);
    $data7=  $this->monthGeneral($month,$year);
    $data9=  $this->petrolUpdatez2($month,$year);
    $data10=  $this->dieselUpdatez2($month,$year);
    $data11=  $this->kerosineUpdatez2($month,$year);
    $data14=  $this->extensibility($month,$year);
    $data13= $this->dayReal($month, $year);
    $data15=  $this->dayReal1($month, $year);
    $data16=  $this->dayReal2($month, $year);
    $data19=  $this->weekGeneralz1($month,$year);
    $data20=  $this->yearGeneralz($month,$year);
    $data=$data1+$data2+$data3+$data7+$data9+$data10+$data11
            +$data13+$data14+$data15+$data16+$data19+$data20;
    $this->load->view('general_report',$data);
 }
 function dayReal($month,$year){
   $this->db->select_sum('purchased_amount');
   $this->db->from('tb_petrol');
   $this->db ->like('entray_date',$month,'after');
   $this->db->like('entray_date',$year,'before');
   $this->db->where(array('added'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
   $res=  $this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'petrol_amount'=>$row->purchased_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'petrol_amount'=>'Nothing present'
             );
             return $petrola_data;
         }   
 }
 function dayReal1($month,$year){
   $this->db->select_sum('purchased_amount');
   $this->db->from('tb_diesel');
   $this->db ->like('entray_date',$month,'after');
   $this->db->like('entray_date',$year,'before');
   $this->db->where(array('stat_role'=>  $this->session->userdata('role_station')));
   $res=  $this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'diesel_amount'=>$row->purchased_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'diesel_amount'=>'Nothing present'
             );
             return $petrola_data;
         }   
 }
 function dayReal2($month,$year){
   $this->db->select_sum('purchased_amount');
   $this->db->from('tb_kerosine');
   $this->db ->like('entray_date',$month,'after');
   $this->db->like('entray_date',$year,'before');
   $this->db->where(array('stat_role'=>  $this->session->userdata('role_station')));
   $res=  $this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'kerosine_amount'=>$row->purchased_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'kerosine_amount'=>'Nothing present'
             );
             return $petrola_data;
         }   
 }
 function dayReal3($id,$month,$year){
   $this->db->select_sum('purchased_amount');
   $this->db->from('tb_oil');
   $this->db->join('oil_update','oil_update.oil_product= tb_oil.prod_qnty');
   $this->db->like('entray_date',$month,'after');
   $this->db->like('entray_date',$year,'before');
   $this->db->where(array('oil_id'=>$id,'stat_role'=>  $this->session->userdata('role_station')));
   $res=  $this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'oil_amount'=>$row->purchased_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'oil_amount'=>'Nothing present'
             );
             return $petrola_data;
         }   
 }
 function setts($date,$date2){
     $res=  $this->db->select_sum('purchased_amount')
             ->from('tb_petrol')
             ->where(array('entray_date >='=>$date,'entray_date <='=>$date2,'added'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
     if($res->num_rows()>0){
         foreach ($res->result() as $row){
         $petrola_data=array(
                     'petrol_amount'=>$row->purchased_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'petrol_amount'=>'Nothing present'
             );
             return $petrola_data;
         }   
 }function setts1($date,$date2){
     $res=  $this->db->select_sum('purchased_amount')
             ->from('tb_diesel')
             ->where(array('entray_date >='=>$date,'entray_date <='=>$date2,'added'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
     if($res->num_rows()>0){
         foreach ($res->result() as $row){
         $petrola_data=array(
                     'diesel_amount'=>$row->purchased_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'diesel_amount'=>'Nothing present'
             );
             return $petrola_data;
         }   
 }function setts2($date,$date2){
     $res=  $this->db->select_sum('purchased_amount')
             ->from('tb_kerosine')
             ->where(array('entray_date >='=>$date,'entray_date <='=>$date2,'added'=>'yes','stat_role'=>  $this->session->userdata('role_station')))->get();
     if($res->num_rows()>0){
         foreach ($res->result() as $row){
         $petrola_data=array(
                     'kerosine_amount'=>$row->purchased_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'kerosine_amount'=>'Nothing present'
             );
             return $petrola_data;
         }   
 }function setts3($id,$date,$date2){
   $this->db->select_sum('purchased_amount');
   $this->db->from('tb_oil');
   $this->db->join('oil_update','oil_update.oil_product= tb_oil.prod_qnty');
   $this->db->where(array('oil_id'=>$id,'entray_date >='=>$date,'entray_date <='=>$date2,'added'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
   $res=  $this->db->get();
         if($res->num_rows()>0){
             foreach ($res->result() as $row){
                 $petrola_data=array(
                     'oil_amount'=>$row->purchased_amount,
                 );
             }
             unset($row);
             return $petrola_data;
         }  else {
             $petrola_data=array(
                 'oil_amount'=>'Nothing present'
             );
             return $petrola_data;
         }    
 }
 function weekView(){
 $this->load->view('accountant_year_reportd');    
 }
 function week_all_view($date,$date2){
     $data1=  $this->yearPetrol($date, $date2);
     $data2=  $this->petrol_solddate($date, $date2);
     $data3=  $this->yearDiesel1($date, $date2);
     $data4=  $this->diesel_solddate($date, $date2);
     $data5=  $this->yearKerosine1($date, $date2);
     $data6=  $this->kerosine_solddate($date, $date2);
     $data9=  $this->petrolUpdatez1($date, $date2);
     $data10=  $this->dieselUpdatez1($date, $date2);
     $data11=  $this->kerosineUpdatez1($date, $date2);
     $data13= $this->setts($date, $date2);
     $data15=  $this->setts1($date, $date2);
     $data16=  $this->setts2($date, $date2);
     $data14=  $this->extensibility1($date, $date2);
     $data=$data1+$data2+$data3+$data4+$data5+$data6+
            $data9+$data10+$data11+$data13+$data14+$data15+$data16;
    $this->load->view('general_report',$data);
 }
 function oilDisturb($id){
     $data['id']=$id;
 $this->load->view('oil_disturb',$data);
 }
 function oil_week_disturb($id,$date,$date2){
     $data1=  $this->setts3($id, $date, $date2);
     $data2=  $this->yearOil1($id, $date, $date2);
     $data3=  $this->oilUpdatez1($id, $date, $date2);
     $data4=  $this->oil_solddate($id, $date, $date2);
     $data=$data1+$data2+$data3+$data4;
     $data['id']=$id;
     $this->db->select('*');
     $this->db->from('tb_oil');
     $this->db->join('oil_update','oil_update.oil_product= tb_oil.prod_qnty');
     $this->db->where(array('oil_id'=>$id,'sold_date >='=>$date,'sold_date <='=>$date2,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
    $res= $this->db->get();
    if($res->num_rows()>0){
        $this->load->view('oilgeneral_report',$data);
    }  else {
    echo '<p class="alert alert-warning">Nothing sold to this '.$date.' '.'and'.' '.$date2.'</p>'; 
    }
 }
 function oil_month_disturb($id,$month,$year){
     $data1=  $this->weekGeneralz3($id, $month, $year);
     $data2=  $this->dayReal3($id, $month, $year);
     $data3=  $this->oilUpdatez2($id, $month, $year);
     $data4=  $this->dayGeneral3($id, $month, $year);
     $data=$data1+$data2+$data3+$data4;
     $data['id']=$id;
     $this->db->select('*');
     $this->db->from('tb_oil');
     $this->db->join('oil_update','oil_update.oil_product= tb_oil.prod_qnty');
     $this->db->like('sold_date',$month,'after');
     $this->db->like('sold_date',$year,'before');
     $this->db->where(array('oil_id'=>$id,'seller_status'=>'yes','stat_role'=>  $this->session->userdata('role_station')));
    $res=  $this->db->get();
     if($res->num_rows()>0){
         $this->load->view('oilgeneral_report',$data);
     }  else {
        echo '<p class="alert alert-warning"> Nothing sold to this '.$month.' '.'Month</p>'; 
     }
 }
 }
 
 


 