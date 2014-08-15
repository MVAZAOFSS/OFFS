<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Dashbord extends CI_Controller{
     function __construct() {
         parent::__construct();
         $this->load->helper('url','form','html','file');
         $this->load->library('form_validation');
         if(!$this->session->userdata('logged_in')){
             redirect('logout'); 
         }elseif ($this->session->userdata('apartment')!=='seller') {
             redirect('logout'); 
        }
     }
     function index(){
         $data1=  $this->show_records();
        $data2=  $this->show_sold();
        $data3=  $this->show_amount();
        $data4=  $this->show_sold_amount();
        $data5= $this->diesel_show();
        $data6=  $this->diesel_sold();
        $data7=  $this->diesel_sold_amount();
        $data8=  $this->diesel_amount();
        $data9=  $this->kerosine_amount();
        $data10=  $this->kerosine_show();
        $data11=  $this->kerosine_sold();
        $data12=  $this->kerosine_sold_amount();
        $data17=  $this->Total();
        $data18=  $this->Total1();
        $data19=  $this->Total2();
        $data20=  $this->Total3();
        $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+
                $data12+$data17+$data18+$data19+$data20;
         $data['activef']=TRUE;
         $data['active']=TRUE;
         $data['active5']=TRUE;
         $this->load->view('dashbord',$data);
     }
    function dashbord_summary(){
         $data1=  $this->show_records();
        $data2=  $this->show_sold();
        $data3=  $this->show_amount();
        $data4=  $this->show_sold_amount();
        $data5= $this->diesel_show();
        $data6=  $this->diesel_sold();
        $data7=  $this->diesel_sold_amount();
        $data8=  $this->diesel_amount();
        $data9=  $this->kerosine_amount();
        $data10=  $this->kerosine_show();
        $data11=  $this->kerosine_sold();
        $data12=  $this->kerosine_sold_amount();

        $data17=  $this->Total();
        $data18=  $this->Total1();
        $data19=  $this->Total2();
        $data20=  $this->Total3();
        $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+
                $data12+$data17+$data18+$data19+$data20;
      $dataz=$this->load->view('summary_view',$data,TRUE);
      $file=  $this->session->userdata('username').' ';
       pdf_create($dataz,$file,TRUE);
        
     }
    function petrol(){
        $data1=  $this->show_records();
        $data2=  $this->show_sold();
        $data3=  $this->show_amount();
        $data4=  $this->show_sold_amount();
        $data5= $this->diesel_show();
        $data6=  $this->diesel_sold();
        $data7=  $this->diesel_sold_amount();
        $data8=  $this->diesel_amount();
        $data9=  $this->kerosine_amount();
        $data10=  $this->kerosine_show();
        $data11=  $this->kerosine_sold();
        $data12=  $this->kerosine_sold_amount();

        $data17=  $this->Total();
        $data18=  $this->Total1();
        $data19=  $this->Total2();
        $data20=  $this->Total3();
        $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+
                $data12+$data17+$data18+$data19+$data20;
        $data['activef']=TRUE;
        $data['active']=TRUE;
        $data['active5']=TRUE;
        unset($data['activef1']);
        $this->form_validation->set_rules('nlitre','Sold Litres','trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('cost','Sold Amount','trim|required|alpha_numeric|xss_clean');
        $this->form_validation->set_rules('issue','Sold date','trim|required|xss_clean');
        if($this->form_validation->run()===FALSE){
            $this->load->view('dashbord',$data);
        }  else {
            $this->load->model('dashbord_model');
            $sn=  $this->session->userdata('username');
            $sold_litre=  $this->input->post('nlitre');
            $sold_amount=  $this->input->post('cost');
            $issue_date=  $this->input->post('issue');
            $roles=  $this->session->userdata('role_station');
            $this->dashbord_model->petrol_insert($sn,$sold_litre,$sold_amount,$issue_date,$roles);
            $data['smg']='<p class="alert alert-success">Recorded successiffuly.!</p>';
            $this->load->view('dashbord',$data);
        }
    }
    function petrol_credit(){
        $data1=  $this->show_records();
        $data2=  $this->show_sold();
        $data3=  $this->show_amount();
        $data4=  $this->show_sold_amount();
        $data5= $this->diesel_show();
        $data6=  $this->diesel_sold();
        $data7=  $this->diesel_sold_amount();
        $data8=  $this->diesel_amount();
        $data9=  $this->kerosine_amount();
        $data10=  $this->kerosine_show();
        $data11=  $this->kerosine_sold();
        $data12=  $this->kerosine_sold_amount();

        $data17=  $this->Total();
        $data18=  $this->Total1();
        $data19=  $this->Total2();
        $data20=  $this->Total3();
        $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+
                $data12+$data17+$data18+$data19+$data20;
        $data['activef']=TRUE;
        $data['active']=TRUE;
        $data['active6']=TRUE;
        unset($data['active5']);
        $this->form_validation->set_rules('nlitre1','Sold Litres','trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('cost1','Sold Amount','trim|required|alpha_numeric|xss_clean');
        $this->form_validation->set_rules('ncost1','Customer name','trim|required|xss_clean');
        $this->form_validation->set_rules('issue1','Sold date','trim|required|xss_clean');
        if($this->form_validation->run()===FALSE){
            $this->load->view('dashbord',$data);
        }  else {
            $this->load->model('dashbord_model');
            $sn=  $this->session->userdata('username');
            $sold_litre=  $this->input->post('nlitre1');
            $sold_amount=  $this->input->post('cost1');
            $customer_credit=  $this->input->post('ncost1');
            $issue_date=  $this->input->post('issue1');
            $roles=  $this->session->userdata('role_station');
            $this->dashbord_model->pertol_credit($sn,$sold_litre,$sold_amount,$issue_date,$customer_credit,$roles);
            $data['smg1']='<p class="alert alert-success">Recorded successiffuly.!</p>';
            $this->load->view('dashbord',$data);
        }
    }
    function diesel(){
        $data1=  $this->show_records();
        $data2=  $this->show_sold();
        $data3=  $this->show_amount();
        $data4=  $this->show_sold_amount();
        $data5= $this->diesel_show();
        $data6=  $this->diesel_sold();
        $data7=  $this->diesel_sold_amount();
        $data8=  $this->diesel_amount();
        $data9=  $this->kerosine_amount();
        $data10=  $this->kerosine_show();
        $data11=  $this->kerosine_sold();
        $data12=  $this->kerosine_sold_amount();

        $data17=  $this->Total();
        $data18=  $this->Total1();
        $data19=  $this->Total2();
        $data20=  $this->Total3();
        $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+
                $data12+$data17+$data18+$data19+$data20;
        $data['activef']=TRUE;
        $data['active1']=TRUE;
        $data['active7']=TRUE;
        unset($data['activef1']);
        unset($data['active']);
        $this->form_validation->set_rules('nlitre2','Sold Litres','trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('cost2','Sold Amount','trim|required|alpha_numeric|xss_clean');
        $this->form_validation->set_rules('issue2','Sold date','trim|required|xss_clean');
        if($this->form_validation->run()===FALSE){
            $this->load->view('dashbord',$data);
        }  else {
            $this->load->model('dashbord_model');
            $sn=  $this->session->userdata('username');
            $sold_litre=  $this->input->post('nlitre2');
            $sold_amount=  $this->input->post('cost2');
            $issue_date=  $this->input->post('issue2');
            $roles=  $this->session->userdata('role_station');
            $this->dashbord_model->diesel_insert($sn,$sold_litre,$sold_amount,$issue_date,$roles);
            $data['smg2']='<p class="alert alert-success">Recorded successiffuly.!</p>';
            $this->load->view('dashbord',$data);
        }
    }
    function diesel_credit(){
         $data1=  $this->show_records();
        $data2=  $this->show_sold();
        $data3=  $this->show_amount();
        $data4=  $this->show_sold_amount();
        $data5= $this->diesel_show();
        $data6=  $this->diesel_sold();
        $data7=  $this->diesel_sold_amount();
        $data8=  $this->diesel_amount();
        $data9=  $this->kerosine_amount();
        $data10=  $this->kerosine_show();
        $data11=  $this->kerosine_sold();
        $data12=  $this->kerosine_sold_amount();

        $data17=  $this->Total();
        $data18=  $this->Total1();
        $data19=  $this->Total2();
        $data20=  $this->Total3();
        $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+
                $data12+$data17+$data18+$data19+$data20;
        $data['activef']=TRUE;
        $data['active1']=TRUE;
        $data['active8']=TRUE;
        unset($data['active7']);
        unset($data['active']);
        unset($data['activef1']);
        $this->form_validation->set_rules('nlitre3','Sold Litres','trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('cost3','Sold Amount','trim|required|alpha_numeric|xss_clean');
        $this->form_validation->set_rules('ncost3','Customer name','trim|required|xss_clean');
        $this->form_validation->set_rules('issue3','Sold date','trim|required|xss_clean');
        if($this->form_validation->run()===FALSE){
            $this->load->view('dashbord',$data);
        }  else {
            $this->load->model('dashbord_model');
            $sn=  $this->session->userdata('username');
            $sold_litre=  $this->input->post('nlitre3');
            $sold_amount=  $this->input->post('cost3');
            $customer_credit=  $this->input->post('ncost3');
            $issue_date=  $this->input->post('issue3');
            $roles=  $this->session->userdata('role_station');
            $this->dashbord_model->diesel_credit($sn,$sold_litre,$sold_amount,$issue_date,$customer_credit,$roles);
            $data['smg3']='<p class="alert alert-success">Recorded successiffuly.!</p>';
            $this->load->view('dashbord',$data);
        }
    }
    function kerosine(){
        $data1=  $this->show_records();
        $data2=  $this->show_sold();
        $data3=  $this->show_amount();
        $data4=  $this->show_sold_amount();
        $data5= $this->diesel_show();
        $data6=  $this->diesel_sold();
        $data7=  $this->diesel_sold_amount();
        $data8=  $this->diesel_amount();
        $data9=  $this->kerosine_amount();
        $data10=  $this->kerosine_show();
        $data11=  $this->kerosine_sold();
        $data12=  $this->kerosine_sold_amount();

        $data17=  $this->Total();
        $data18=  $this->Total1();
        $data19=  $this->Total2();
        $data20=  $this->Total3();
        $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+
                $data12+$data17+$data18+$data19+$data20;
        $data['activef']=TRUE;
        $data['active2']=TRUE;
        $data['active9']=TRUE;
        unset($data['activef1']);
        unset($data['active1']);
        unset($data['active']);
        $this->form_validation->set_rules('nlitre4','Sold Litres','trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('cost4','Sold Amount','trim|required|alpha_numeric|xss_clean');
        $this->form_validation->set_rules('issue4','Sold date','trim|required|xss_clean');
        if($this->form_validation->run()===FALSE){
            $this->load->view('dashbord',$data);
        }  else {
            $this->load->model('dashbord_model');
            $sn=  $this->session->userdata('username');
            $sold_litre=  $this->input->post('nlitre4');
            $sold_amount=  $this->input->post('cost4');
            $issue_date=  $this->input->post('issue4');
            $roles=  $this->session->userdata('role_station');
            $this->dashbord_model->kerosine_insert($sn,$sold_litre,$sold_amount,$issue_date,$roles);
            $data['smg4']='<p class="alert alert-success">Recorded successiffuly.!</p>';
            $this->load->view('dashbord',$data);
        }
    }
    function kerosine_credit(){
        $data1=  $this->show_records();
        $data2=  $this->show_sold();
        $data3=  $this->show_amount();
        $data4=  $this->show_sold_amount();
        $data5= $this->diesel_show();
        $data6=  $this->diesel_sold();
        $data7=  $this->diesel_sold_amount();
        $data8=  $this->diesel_amount();
        $data9=  $this->kerosine_amount();
        $data10=  $this->kerosine_show();
        $data11=  $this->kerosine_sold();
        $data12=  $this->kerosine_sold_amount();
        $data17=  $this->Total();
        $data18=  $this->Total1();
        $data19=  $this->Total2();
        $data20=  $this->Total3();
        $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+
                $data12+$data17+$data18+$data19+$data20;
        $data['activef']=TRUE;
        $data['active10']=TRUE;
        $data['active2']=TRUE;
        unset($data['activef1']);
        unset($data['active9']);
        unset($data['active1']);
        unset($data['active']);
        $this->form_validation->set_rules('nlitre5','Sold Litres','trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('cost5','Sold Amount','trim|required|alpha_numeric|xss_clean');
        $this->form_validation->set_rules('ncost5','Customer name','trim|required|xss_clean');
        $this->form_validation->set_rules('issue5','Sold date','trim|required|xss_clean');
        if($this->form_validation->run()===FALSE){
            $this->load->view('dashbord',$data);
        }  else {
            $this->load->model('dashbord_model');
            $sn=  $this->session->userdata('username');
            $sold_litre=  $this->input->post('nlitre5');
            $sold_amount=  $this->input->post('cost5');
            $customer_credit=  $this->input->post('ncost5');
            $issue_date=  $this->input->post('issue5');
            $roles=  $this->session->userdata('role_station');
            $this->dashbord_model->kerosine_credit($sn,$sold_litre,$sold_amount,$issue_date,$customer_credit,$roles);
            $data['smg5']='<p class="alert alert-success">Recorded successiffuly.!</p>';
            $this->load->view('dashbord',$data);
        }
    }
    function oil($name){
        $data1=  $this->show_records();
        $data2=  $this->show_sold();
        $data3=  $this->show_amount();
        $data4=  $this->show_sold_amount();
        $data5=  $this->diesel_show();
        $data6=  $this->diesel_sold();
        $data7=  $this->diesel_sold_amount();
        $data8=  $this->diesel_amount();
        $data9=  $this->kerosine_amount();
        $data10= $this->kerosine_show();
        $data11= $this->kerosine_sold();
        $data12= $this->kerosine_sold_amount();
        $data17= $this->Total();
        $data18= $this->Total1();
        $data19= $this->Total2();
        $data20= $this->Total3();
        $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+
                $data12+$data17+$data18+$data19+$data20;
        $data['active3']=TRUE;
        $data['activef']=TRUE;
        $data['active11']=TRUE;
        unset($data['active2']);
        unset($data['active1']);
        unset($data['active']);
        unset($data['activef1']);
        $this->form_validation->set_rules('nlitre6','Sold box','trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('cost6','Sold Amount','trim|required|alpha_numeric|xss_clean');
        $this->form_validation->set_rules('issue6','Sold date','trim|required|xss_clean');
        $this->form_validation->run();
        $data['name']=$name;
        $res=  $this->db->get_where('oil_update',array('oil_id'=>$name));
        if($res->num_rows()===1){
            $row=$res->row();
        if(isset($_POST['save'])){
        if($this->form_validation->run()===FALSE){
            $this->load->view('oildump',$data);
        }  else {
            $this->load->model('dashbord_model');
            $sn=  $this->session->userdata('username');
            $sold_litre=  $this->input->post('nlitre6');
            $namezcheck=$row->oil_product;
            $sold_amount=  $this->input->post('cost6');
            $issue_date=  $this->input->post('issue6');
            $roles=  $this->session->userdata('role_station');
            $this->dashbord_model->oil_insert($sn,$sold_litre,$sold_amount,$issue_date,$roles,$namezcheck);
            $data['smg6']='<p class="alert alert-success">Recorded successiffuly.!</p>';
            $this->load->view('oildump',$data);
        }
        }
        }
    }
    function oil_credit($name_cost){
        $data1=  $this->show_records();
        $data2=  $this->show_sold();
        $data3=  $this->show_amount();
        $data4=  $this->show_sold_amount();
        $data5= $this->diesel_show();
        $data6=  $this->diesel_sold();
        $data7=  $this->diesel_sold_amount();
        $data8=  $this->diesel_amount();
        $data9=  $this->kerosine_amount();
        $data10=  $this->kerosine_show();
        $data11=  $this->kerosine_sold();
        $data12=  $this->kerosine_sold_amount();
        $data17=  $this->Total();
        $data18=  $this->Total1();
        $data19=  $this->Total2();
        $data20=  $this->Total3();
        $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+
                $data12+$data17+$data18+$data19+$data20;
        $data['activef']=TRUE;
        $data['active3']=TRUE;
        $data['active12']=TRUE;
        unset($data['active11']);
        unset($data['active2']);
        unset($data['active1']);
        unset($data['active']);
        unset($data['activef1']);
        $this->form_validation->set_rules('nlitre7','Sold box','trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('cost7','Sold Amount','trim|required|alpha_numeric|xss_clean');
        $this->form_validation->set_rules('ncost7','Customer name','trim|required|xss_clean');
        $this->form_validation->set_rules('issue7','Sold date','trim|required|xss_clean');
        $this->form_validation->run();
        $data['name']=$name_cost;
        $res=  $this->db->get_where('oil_update',array('oil_id'=>$name_cost));
        if($res->num_rows()===1){
            $row=$res->row();
        if(isset($_POST['save'])){
        if($this->form_validation->run()===FALSE){
            $this->load->view('oildump',$data);
        }  else {
            $this->load->model('dashbord_model');
            $sn=  $this->session->userdata('username');
            $name=$row->oil_product;
            $sold_litre=  $this->input->post('nlitre7');
            $sold_amount=  $this->input->post('cost7');
            $customer_credit=  $this->input->post('ncost7');
            $issue_date=  $this->input->post('issue7');
            $roles=  $this->session->userdata('role_station');
            $this->dashbord_model->oil_credit($sn,$sold_litre,$sold_amount,$issue_date,$customer_credit,$roles,$name);
            $data['smg7']='<p class="alert alert-success">Recorded successiffuly.!</p>';
            $this->load->view('oildump',$data);
        }
        }
        }
    }
    function show_records(){
        $result=  $this->db->select_sum('Litre_petrol')->from('tb_petrol')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
        if($result->num_rows()>0){
            foreach ($result->result() as $row){
                    $array_records=array(
                        'number_litre'=>$row->Litre_petrol
                    );
            }
            unset($row);
            return $array_records;
        }  else {
            $array_records=array(
                'number_litre'=>'No litres of Petrol found'
            );
            return $array_records;
        }
    }
    function show_amount(){
        $result1=  $this->db->select_sum('purchased_amount')->from('tb_petrol')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
        if($result1->num_rows()>0){
            foreach ($result1->result() as $row){
                    $array_records=array(
                        'purchased_amount'=>$row->purchased_amount
                    );
            }
            unset($row);
            return $array_records;
        }  else {
            $array_records=array(
                'purchased_amount'=>'No cash of Petrol found'
            );
            return $array_records;
        }
    }
       function show_sold(){
        $res=  $this->db->select_sum('sold_litre')->from('tb_petrol')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
        if($res->num_rows()===1){
            foreach ($res->result() as $ro){
                $array=array(
                    'sold_litres'=>$ro->sold_litre
                );
            }
            unset($ro);
            return $array;
        }else{
            $array=array(
            'sold_litres'=>'No customer'
        );
             return $array;
        }
    }
    function show_sold_amount(){
        $res1=  $this->db->select_sum('sold_amount')->from('tb_petrol')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
        if($res1->num_rows()===1){
            foreach ($res1->result() as $ro){
                $array=array(
                    'sold_amount'=>$ro->sold_amount
                );
            }
            unset($ro);
            return $array;
        }else{
            $array=array(
            'sold_amount'=>'No customer'
        );
        return $array;
    }
 }
 function diesel_show(){
   $result=  $this->db->select_sum('Litre_diesel')->from('tb_diesel')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
        if($result->num_rows()>0){
            foreach ($result->result() as $row){
                    $array_records=array(
                        'number_litre1'=>$row->Litre_diesel
                    );
            }
            unset($row);
            return $array_records;
        }  else {
            $array_records=array(
                'number_litre1'=>'No litres of diesel found'
            );
            return $array_records;
        }  
 }
 function diesel_sold(){
     $res=  $this->db->select_sum('sold_litre')->from('tb_diesel')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
        if($res->num_rows()===1){
            foreach ($res->result() as $ro){
                $array=array(
                    'sold_litres1'=>$ro->sold_litre
                );
            }
            unset($ro);
            return $array;
        }else{
            $array=array(
            'sold_litres1'=>'No customer'
        );
        return $array;
        }
 }
 function diesel_amount(){
     $result1=  $this->db->select_sum('purchased_amount')->from('tb_diesel')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
        if($result1->num_rows()>0){
            foreach ($result1->result() as $row){
                    $array_records=array(
                        'purchased_amount1'=>$row->purchased_amount
                    );
            }
            unset($row);
            return $array_records;
        }  else {
            $array_records=array(
                'purchased_amount1'=>'No cash of diesel found'
            );
            return $array_records;
        }
 }
 function diesel_sold_amount(){
     $res1=  $this->db->select_sum('sold_amount')->from('tb_diesel')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
        if($res1->num_rows()===1){
            foreach ($res1->result() as $ro){
                $array=array(
                    'sold_amount1'=>$ro->sold_amount
                );
            }
            unset($ro);
            return $array;
        }else{
            $array=array(
            'sold_amount1'=>'No customer'
        );
            return $array;
    }
 }
 function kerosine_show(){
   $result=  $this->db->select_sum('Litre_kerosine')->from('tb_kerosine')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
        if($result->num_rows()>0){
            foreach ($result->result() as $row){
                    $array_records=array(
                        'number_litre2'=>$row->Litre_kerosine
                    );
            }
            unset($row);
            return $array_records;
        }  else {
            $array_records=array(
                'number_litre2'=>'No litres of kerosine found'
            );
            return $array_records;
        }  
 }
 function kerosine_sold(){
     $res=  $this->db->select_sum('sold_litre')->from('tb_kerosine')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
        if($res->num_rows()===1){
            foreach ($res->result() as $ro){
                $array=array(
                    'sold_litres2'=>$ro->sold_litre
                );
            }
            unset($ro);
            return $array;
        }else{
            $array=array(
            'sold_litres2'=>'No customer'
        );
        return $array;
        }
 }
 function kerosine_amount(){
     $result1=  $this->db->select_sum('purchased_amount')->from('tb_kerosine')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
        if($result1->num_rows()>0){
            foreach ($result1->result() as $row){
                    $array_records=array(
                        'purchased_amount2'=>$row->purchased_amount
                    );
            }
            unset($row);
            return $array_records;
        }  else {
            $array_records=array(
                'purchased_amount2'=>'No cash of kerosine found'
            );
            return $array_records;
        }
 }
 function kerosine_sold_amount(){
     $res1=  $this->db->select_sum('sold_amount')->from('tb_kerosine')->where(array('stat_role'=>  $this->session->userdata('role_station')))->get();
        if($res1->num_rows()===1){
            foreach ($res1->result() as $ro){
                $array=array(
                    'sold_amount2'=>$ro->sold_amount
                );
            }
            unset($ro);
            return $array;
        }else{
            $array=array(
            'sold_amount2'=>'No customer'
        );
        return $array;
    }
 }
public function view(){
         $data1=  $this->show_records();
        $data2=  $this->show_sold();
        $data3=  $this->show_amount();
        $data4=  $this->show_sold_amount();
        $data5= $this->diesel_show();
        $data6=  $this->diesel_sold();
        $data7=  $this->diesel_sold_amount();
        $data8=  $this->diesel_amount();
        $data9=  $this->kerosine_amount();
        $data10=  $this->kerosine_show();
        $data11=  $this->kerosine_sold();
        $data12=  $this->kerosine_sold_amount();
        $data17=  $this->Total();
        $data18=  $this->Total1();
        $data19=  $this->Total2();
        $data20=  $this->Total3();
        $data=$data1+$data2+$data3+$data4+$data5+$data6+$data7+$data8+$data9+$data10+$data11+
                $data12+$data17+$data18+$data19+$data20;
         $data['activef1']=TRUE;
         $this->load->view('dashbord',$data);
 }
 public function count(){
     
     $res1=  $this->db->get_where('tb_problem',array('receiver'=>'Seller','status'=>'unchecked','stat_role'=>  $this->session->userdata('role_station')));
     if ($res1->num_rows()>0){
         $data['msg']=$res1;
         $this->load->view('dashbord_msg',$data);
     }else {
      $data['msg1']='<p class="alert alert-info">Inbox Empty.!</p>';
      $this->load->view('dashbord_msg',$data);  
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
        $this->load->view('notification_details',$data_sess);
    }
 }
 public function delete($id){
    $del= $this->db->get_where('tb_problem',array('id'=>$id,'receiver'=>'seller'));
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
        $this->load->view('notification_details',$data_sess);
 }  else {
     $data['msg1']='<p class="alert alert-success">Message deleted.!</p>';
      $this->load->view('dashbord_msg',$data); 
 }
 }
 function Total(){
     $res=  $this->db->get_where('tb_petrol',array('sold_date'=>  date('m-d-Y'),'stat_role'=>  $this->session->userdata('role_station')));
     if($res->num_rows()>0){
         foreach ($res->result() as $row){
             $data=array(
                 'seller_name'=>$row->seller_name,
                 'sold_litre'=>$row->sold_litre,
                 'sold_amountd'=>$row->sold_amount
             );
         }
         unset($row);
         return $data;
     }  else {
         $data=array(
             'seller_name'=>  $this->session->userdata('username'),
             'sold_litre'=>'Not yet',
             'sold_amountd'=>'Not yet'
         );    
         return $data;
     }
 }
 function Total1(){
     $res=  $this->db->get_where('tb_diesel',array('sold_date'=>  date('m-d-Y'),'stat_role'=>  $this->session->userdata('role_station')));
     if($res->num_rows()>0){
         foreach ($res->result() as $row){
             $data=array(
                 'seller_name1'=>$row->seller_name,
                 'sold_litre1'=>$row->sold_litre,
                 'sold_amountd1'=>$row->sold_amount
             );
         }
         unset($row);
         return $data;
     }  else {
         $data=array(
             'seller_name1'=>  $this->session->userdata('username'),
             'sold_litre1'=>'Not yet',
             'sold_amountd1'=>'Not yet'
         );    
         return $data;
     }
 }
 function Total2(){
     $res=  $this->db->get_where('tb_kerosine',array('sold_date'=>  date('m-d-Y'),'stat_role'=>  $this->session->userdata('role_station')));
     if($res->num_rows()>0){
         foreach ($res->result() as $row){
             $data=array(
                 'seller_name2'=>$row->seller_name,
                 'sold_litre2'=>$row->sold_litre,
                 'sold_amountd2'=>$row->sold_amount
             );
         }
         unset($row);
         return $data;
     }  else {
         $data=array(
             'seller_name2'=>  $this->session->userdata('username'),
             'sold_litre2'=>'Not yet',
             'sold_amountd2'=>'Not yet'
         );    
         return $data;
     }
 }
 function Total3(){
     $res=  $this->db->get_where('tb_oil',array('sold_date'=>  date('m-d-Y'),'stat_role'=>  $this->session->userdata('role_station')));
     if($res->num_rows()>0){
         foreach ($res->result() as $row){
             $data=array(
                 'seller_name3'=>$row->seller_name,
                 'sold_litre3'=>$row->sold_qnty,
                 'sold_amountd3'=>$row->sold_amount
             );
         }
         unset($row);
         return $data;
     }  else {
         $data=array(
             'seller_name3'=>  $this->session->userdata('username'),
             'sold_litre3'=>'Not yet',
             'sold_amountd3'=>'Not yet'
         );    
         return $data;
     }
 }
 function expenditures(){
     $this->form_validation->set_rules('cmt','Cash used','trim|required|numeric|xss_clean');
     $this->form_validation->set_rules('wrs','Reasons','trim|required|xss_clean');
     $this->form_validation->set_rules('dt','Date','trim|required|xss_clean');
     if($this->form_validation->run()===FALSE){
         echo '<p class="alert alert-danger">Cant be empty..Try again</p>';  
     }else{
         $this->load->model('dashbord_model');
         $amount=  $this->input->post('cmt');
         $reasons=  $this->input->post('wrs');
         $date=  $this->input->post('dt');
         $entry=  $this->session->userdata('username');
         $role=  $this->session->userdata('role_station');
         $this->dashbord_model->expenditure($amount,$reasons,$date,$entry,$role);
         echo '<p class="alert alert-success">Well posted</p>';
     }
 }
 function petrolupdate(){
     $this->load->view('dashbord_petrol');
 }
 function dieselupdate(){
     $this->load->view('dashbord_diesel');
 }
 function kerosineupdate(){
     $this->load->view('dashbord_kerosine');
 }
 function oilupdate(){
     $this->load->view('dashbord_oil');
 }
 function oil_dump($prod){
     $data['name']=$prod;
     $this->load->view('oildump',$data);
 }
 }

