<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Dashbord_model extends CI_Model{
     function __construct() {
         parent::__construct();
     }
     function petrol_insert($sn,$sold_litre,$sold_amount,$issue_date,$roles){
             $data_entry=array(
                 'seller_name'=>$sn,
                 'sold_litre'=>$sold_litre,
                 'sold_amount'=>$sold_amount,
                 'sold_date'=>$issue_date,
                 'seller_status'=>'yes',
                 'stat_role'=>$roles
             );
             $res1=  $this->db->get_where('tb_petrol',array('entray_date'=>$issue_date,'seller_name'=>$sn,'stat_role'=>  $this->session->userdata('role_station')));
             $res=  $this->db->get_where('tb_petrol',array('seller_name'=>$sn,'sold_date'=>$issue_date,'stat_role'=>  $this->session->userdata('role_station')));
             if($res->num_rows()===1){
                 $row=$res->row();
                 $data=array(
                     'seller_name'=>$sn,
                     'sold_litre'=>$row->sold_litre+$sold_litre,
                     'sold_amount'=>$row->sold_amount+$sold_amount,
                     'sold_date'=>$issue_date,
                     'seller_status'=>'yes',
                     'stat_role'=>$roles
                 );
                 $this->db->where('id',$row->id);
                 $this->db->update('tb_petrol',$data);
             }elseif($res1->num_rows()===1){
                 $row1=$res1->row();
                 $data=array(
                     'seller_name'=>$sn,
                     'sold_litre'=>$row1->sold_litre+$sold_litre,
                     'sold_amount'=>$row1->sold_amount+$sold_amount,
                     'sold_date'=>$issue_date,
                     'seller_status'=>'yes',
                     'stat_role'=>$roles
                 );
                 $this->db->where('id',$row1->id);
                 $this->db->update('tb_petrol',$data);
             }else {
                 $this->db->insert('tb_petrol',$data_entry); 
             }
     }
     function pertol_credit($sn,$sold_litre,$sold_amount,$issue_date,$customer_credit,$roles){
         $data_entry=array(
                 'seller_name'=>$sn,
                 'sold_litre'=>$sold_litre,
                 'sold_amount'=>$sold_amount,
                 'sold_date'=>$issue_date,
                 'customer_credit_name'=>$customer_credit,
                 'credit_litre'=>$sold_litre,
                 'credit_amount'=>$sold_amount,
                 'status'=>'credit',
                 'seller_status'=>'yes',
                 'stat_role'=>$roles
             );
             $res1=  $this->db->get_where('tb_petrol',array('entray_date'=>$issue_date,'seller_name'=>$sn,'stat_role'=>  $this->session->userdata('role_station')));
             $res=  $this->db->get_where('tb_petrol',array('seller_name'=>$sn,'sold_date'=>$issue_date,'customer_credit_name'=>$customer_credit,'stat_role'=>  $this->session->userdata('role_station')));
             if($res->num_rows()===1){
                 $row=$res->row();
                 $data=array(
                     'seller_name'=>$sn,
                     'sold_litre'=>$row->sold_litre+$sold_litre,
                     'sold_amount'=>$row->sold_amount+$sold_amount,
                     'sold_date'=>$issue_date,
                     'customer_credit_name'=>$customer_credit,
                     'credit_litre'=>$row->credit_litre+$sold_litre,
                     'credit_amount'=>$row->credit_amount+$sold_amount,
                     'status'=>'credit',
                     'seller_status'=>'yes',
                     'stat_role'=>$roles
                 );
                 $this->db->where('id',$row->id);
                 $this->db->update('tb_petrol',$data);
             } elseif($res1->num_rows()===1){ 
                 $row1=$res1->row();
                 $data=array(
                     'seller_name'=>$sn,
                     'sold_litre'=>$row1->sold_litre+$sold_litre,
                     'sold_amount'=>$row1->sold_amount+$sold_amount,
                     'sold_date'=>$issue_date,
                     'customer_credit_name'=>$customer_credit,
                     'status'=>'credit',
                     'seller_status'=>'yes',
                     'stat_role'=>$roles
                 );
                 $this->db->where('id',$row1->id);
                 $this->db->update('tb_petrol',$data);
             }else {
                 $this->db->insert('tb_petrol',$data_entry); 
             }
     }
     function diesel_insert($sn,$sold_litre,$sold_amount,$issue_date,$roles){
             $data_entry=array(
                 'seller_name'=>$sn,
                 'sold_litre'=>$sold_litre,
                 'sold_amount'=>$sold_amount,
                 'sold_date'=>$issue_date,
                 'seller_status'=>'yes',
                 'stat_role'=>$roles
             );
             $res1=  $this->db->get_where('tb_diesel',array('entray_date'=>$issue_date,'seller_name'=>$sn,'stat_role'=>  $this->session->userdata('role_station')));
             $res=  $this->db->get_where('tb_diesel',array('seller_name'=>$sn,'sold_date'=>$issue_date,'stat_role'=>  $this->session->userdata('role_station')));
             if($res->num_rows()===1){
                 $row=$res->row();
                 $data=array(
                     'seller_name'=>$sn,
                     'sold_litre'=>$row->sold_litre+$sold_litre,
                     'sold_amount'=>$row->sold_amount+$sold_amount,
                     'sold_date'=>$issue_date,
                     'seller_status'=>'yes',
                     'stat_role'=>$roles
                 );
                 $this->db->where('id',$row->id);
                 $this->db->update('tb_diesel',$data);
             }elseif($res1->num_rows()===1){  
                 $row1=$res1->row();
                 $data=array(
                     'seller_name'=>$sn,
                     'sold_litre'=>$row1->sold_litre+$sold_litre,
                     'sold_amount'=>$row1->sold_amount+$sold_amount,
                     'sold_date'=>$issue_date,
                     'seller_status'=>'yes',
                     'stat_role'=>$roles
                 );
                 $this->db->where('id',$row1->id);
                 $this->db->update('tb_diesel',$data);
              }else {
                 $this->db->insert('tb_diesel',$data_entry); 
             }
     }
     function diesel_credit($sn,$sold_litre,$sold_amount,$issue_date,$customer_credit,$roles){
            $data_entry=array(
                 'seller_name'=>$sn,
                 'sold_litre'=>$sold_litre,
                 'sold_amount'=>$sold_amount,
                 'sold_date'=>$issue_date,
                 'customer_credit_name'=>$customer_credit,
                 'credit_litre'=>$sold_litre,
                 'credit_amount'=>$sold_amount,
                 'status'=>'credit',
                'seller_status'=>'yes',
                'stat_role'=>$roles
             );
             $res1=  $this->db->get_where('tb_diesel',array('entray_date'=>$issue_date,'seller_name'=>$sn,'stat_role'=>  $this->session->userdata('role_station')));
             $res=  $this->db->get_where('tb_diesel',array('seller_name'=>$sn,'sold_date'=>$issue_date,'customer_credit_name'=>$customer_credit,'stat_role'=>  $this->session->userdata('role_station')));
             if($res->num_rows()===1){
                 $row=$res->row();
                 $data=array(
                     'seller_name'=>$sn,
                     'sold_litre'=>$row->sold_litre+$sold_litre,
                     'sold_amount'=>$row->sold_amount+$sold_amount,
                     'sold_date'=>$issue_date,
                     'customer_credit_name'=>$customer_credit,
                     'credit_litre'=>$row->credit_litre+$sold_litre,
                     'credit_amount'=>$row->credit_amount+$sold_amount,
                     'status'=>'credit',
                     'seller_status'=>'yes',
                     'stat_role'=>$roles
                 );
                 $this->db->where('id',$row->id);
                 $this->db->update('tb_diesel',$data);
             }elseif($res1->num_rows()===1){  
                  $row1=$res1->row();
                 $data=array(
                     'seller_name'=>$sn,
                     'sold_litre'=>$row1->sold_litre+$sold_litre,
                     'sold_amount'=>$row1->sold_amount+$sold_amount,
                     'sold_date'=>$issue_date,
                     'customer_credit_name'=>$customer_credit,
                     'status'=>'credit',
                     'seller_status'=>'yes',
                     'stat_role'=>$roles
                 );
                 $this->db->where('id',$row1->id);
                 $this->db->update('tb_diesel',$data);
              }else {
                 $this->db->insert('tb_diesel',$data_entry); 
             }
     }
     function kerosine_insert($sn,$sold_litre,$sold_amount,$issue_date,$roles){
            $data_entry=array(
                 'seller_name'=>$sn,
                 'sold_litre'=>$sold_litre,
                 'sold_amount'=>$sold_amount,
                 'sold_date'=>$issue_date,
                'seller_status'=>'yes',
                'stat_role'=>$roles
             );
             $res1=  $this->db->get_where('tb_kerosine',array('entray_date'=>$issue_date,'seller_name'=>$sn,'stat_role'=>  $this->session->userdata('role_station')));
             $res=  $this->db->get_where('tb_kerosine',array('seller_name'=>$sn,'sold_date'=>$issue_date,'stat_role'=>  $this->session->userdata('role_station')));
             if($res->num_rows()===1){
                 $row1=$res->row();
                 $data=array(
                     'seller_name'=>$sn,
                     'sold_litre'=>$row1->sold_litre+$sold_litre,
                     'sold_amount'=>$row1->sold_amount+$sold_amount,
                     'sold_date'=>$issue_date,
                     'seller_status'=>'yes',
                     'stat_role'=>$roles
                 );
                 $this->db->where('id',$row1->id);
                 $this->db->update('tb_kerosine',$data);
             }elseif ($res1->num_rows()===1) {
                 $row1=$res1->row();
                 $data=array(
                     'seller_name'=>$sn,
                     'sold_litre'=>$row1->sold_litre+$sold_litre,
                     'sold_amount'=>$row1->sold_amount+$sold_amount,
                     'sold_date'=>$issue_date,
                     'seller_status'=>'yes',
                     'stat_role'=>$roles
                 );
                 $this->db->where('id',$row1->id);
                 $this->db->update('tb_kerosine',$data);
             }else {
                 $this->db->insert('tb_kerosine',$data_entry); 
             }
     }
     function kerosine_credit($sn,$sold_litre,$sold_amount,$issue_date,$customer_credit,$roles){
             $data_entry=array(
                 'seller_name'=>$sn,
                 'sold_litre'=>$sold_litre,
                 'sold_amount'=>$sold_amount,
                 'sold_date'=>$issue_date,
                 'customer_credit_name'=>$customer_credit,
                 'credit_litre'=>$sold_litre,
                 'credit_amount'=>$sold_amount,
                 'status'=>'credit',
                 'seller_status'=>'yes',
                 'stat_role'=>$roles
             );
             $res1=  $this->db->get_where('tb_kerosine',array('entray_date'=>$issue_date,'seller_name'=>$sn,'stat_role'=>  $this->session->userdata('role_station')));
             $res=  $this->db->get_where('tb_kerosine',array('seller_name'=>$sn,'sold_date'=>$issue_date,'customer_credit_name'=>$customer_credit,'stat_role'=>  $this->session->userdata('role_station')));
             if($res->num_rows()===1){
                 $row=$res->row();
                 $data=array(
                     'seller_name'=>$sn,
                     'sold_litre'=>$row->sold_qnty+$sold_litre,
                     'sold_amount'=>$row->sold_amount+$sold_amount,
                     'sold_date'=>$issue_date,
                     'customer_credit_name'=>$customer_credit,
                     'credit_litre'=>$row->credit_litre+$sold_litre,
                     'credit_amount'=>$row->credit_amount+$sold_amount,
                     'status'=>'credit',
                     'seller_status'=>'yes',
                     'stat_role'=>$roles
                 );
                 $this->db->where('id',$row->id);
                 $this->db->update('tb_kerosine',$data);
              }elseif ($res1->num_rows()===1) {
                 $row1=$res1->row();
                 $data=array(
                     'seller_name'=>$sn,
                     'sold_litre'=>$row1->sold_qnty+$sold_litre,
                     'sold_amount'=>$row1->sold_amount+$sold_amount,
                     'sold_date'=>$issue_date,
                     'customer_credit_name'=>$customer_credit,
                     'status'=>'credit',
                     'seller_status'=>'yes',
                     'stat_role'=>$roles
                 );
                 $this->db->where('id',$row1->id);
                 $this->db->update('tb_kerosine',$data);
                }else {
                 $this->db->insert('tb_kerosine',$data_entry); 
             }
     }
     function oil_insert($sn,$sold_litre,$sold_amount,$issue_date,$roles,$name_insert){
             $data_entry=array(
                 'seller_name'=>$sn,
                 'prod_qnty'=>$name_insert,
                 'sold_qnty'=>$sold_litre,
                 'sold_amount'=>$sold_amount,
                 'sold_date'=>$issue_date,
                 'seller_status'=>'yes',
                 'stat_role'=>$roles
             );
             $res1=  $this->db->get_where('tb_oil',array('entray_date'=>$issue_date,'seller_name'=>$sn,'prod_qnty'=>$name_insert,'stat_role'=>  $this->session->userdata('role_station')));
             $res=  $this->db->get_where('tb_oil',array('seller_name'=>$sn,'sold_date'=>$issue_date,'prod_qnty'=>$name_insert,'stat_role'=>  $this->session->userdata('role_station')));
             if($res->num_rows()===1){
                 $row=$res->row();
                 $data=array(
                     'seller_name'=>$sn,
                     'prod_qnty'=>$name_insert,
                     'sold_qnty'=>$row->sold_qnty+$sold_litre,
                     'sold_amount'=>$row->sold_amount+$sold_amount,
                     'sold_date'=>$issue_date,
                     'seller_status'=>'yes',
                     'stat_role'=>$roles
                 );
                 $this->db->where('id',$row->id);
                 $this->db->update('tb_oil',$data);
             }elseif($res1->num_rows()===1){  
                  $row1=$res1->row();
                 $data=array(
                     'seller_name'=>$sn,
                     'prod_qnty'=>$name_insert,
                     'sold_qnty'=>$row1->sold_qnty+$sold_litre,
                     'sold_amount'=>$row1->sold_amount+$sold_amount,
                     'sold_date'=>$issue_date,
                     'seller_status'=>'yes',
                     'stat_role'=>$roles
                 );
                 $this->db->where('id',$row1->id);
                 $this->db->update('tb_oil',$data);
              }else {
                 $this->db->insert('tb_oil',$data_entry); 
             }
     }
     function oil_credit($sn,$sold_litre,$sold_amount,$issue_date,$customer_credit,$roles,$name){
         $data_entry=array(
                 'seller_name'=>$sn,
                 'prod_qnty'=>$name,
                 'sold_qnty'=>$sold_litre,
                 'sold_amount'=>$sold_amount,
                 'sold_date'=>$issue_date,
                 'customer_credit_name'=>$customer_credit,
                 'credit_litre'=>$sold_litre,
                 'credit_amount'=>$sold_amount,
                 'status'=>'credit',
                 'seller_status'=>'yes',
                 'stat_role'=>$roles
             );
             $res1=  $this->db->get_where('tb_oil',array('entray_date'=>$issue_date,'seller_name'=>$sn,'prod_qnty'=>$name,'stat_role'=>  $this->session->userdata('role_station')));
             $res=  $this->db->get_where('tb_oil',array('seller_name'=>$sn,'sold_date'=>$issue_date,'customer_credit_name'=>$customer_credit,'prod_qnty'=>$name,'stat_role'=>  $this->session->userdata('role_station')));
             if($res->num_rows()===1){
                 $row=$res->row();
                 $data=array(
                     'seller_name'=>$sn,
                     'prod_qnty'=>$name,
                     'sold_qnty'=>$row->sold_qnty+$sold_litre,
                     'sold_amount'=>$row->sold_amount+$sold_amount,
                     'sold_date'=>$issue_date,
                     'customer_credit_name'=>$customer_credit,
                     'credit_litre'=>$row->credit_litre+$sold_litre,
                     'credit_amount'=>$row->credit_amount+$sold_amount,
                     'status'=>'credit',
                     'seller_status'=>'yes',
                     'stat_role'=>$roles
                 );
                 $this->db->where('id',$row->id);
                 $this->db->update('tb_oil',$data);
              }elseif ($res1->num_rows()===1) {
                 $row1=$res1->row();
                 $data=array(
                     'seller_name'=>$sn,
                     'prod_qnty'=>$name,
                     'sold_qnty'=>$row1->sold_qnty+$sold_litre,
                     'sold_amount'=>$row1->sold_amount+$sold_amount,
                     'sold_date'=>$issue_date,
                     'customer_credit_name'=>$customer_credit,
                     'status'=>'credit',
                     'seller_status'=>'yes',
                     'stat_role'=>$roles
                 );
                 $this->db->where('id',$row1->id);
                 $this->db->update('tb_oil',$data);
                }else {
                 $this->db->insert('tb_oil',$data_entry); 
             }
     }
     function expenditure($amount,$reasons,$date,$entry,$roles){
         $data_array=array(
             'cash_used'=>$amount,
             'reason'=>$reasons,
             'date_entered'=>$date,
             'data_entry_name'=>$entry,
             'stat_role'=>$roles
         );
         $res=  $this->db->get_where('tb_expenditure',array('data_entry_name'=>$entry,'date_entered'=>$date));
         if($res->num_rows()===1){
             $this->db->where('date_entered',$date);
             $this->db->update('tb_expenditure',$data_array);
         }else{
             $this->db->insert('tb_expenditure',$data_array);
         }
     }
 }
