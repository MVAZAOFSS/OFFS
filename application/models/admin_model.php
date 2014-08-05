<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  class Admin_model extends CI_Model{
      function __construct() {
          parent::__construct();
      }
      function petrol_insert($number_litres,$amount_parchased,$expected_amount,$data_entrance,$admin_name,$roles){
          $data_entry=array(
              'Litre_petrol'=>$number_litres,
              'purchased_amount'=>$amount_parchased,
              'expected_amount'=>$expected_amount,
              'entray_date'=>$data_entrance,
              'admin_name'=>$admin_name,
              'added'=>'yes',
              'stat_role'=>$roles
          );
          $res=  $this->db->get_where('tb_petrol',array('admin_name'=>$admin_name,'entray_date'=>$data_entrance));
          if($res->num_rows()===1){
              $row=$res->row();
              $array=array(
                  'Litre_petrol'=>$row->Litre_petrol+$number_litres,
                  'purchased_amount'=>$row->purchased_amount+$amount_parchased,
                  'expected_amount'=>$row->expected_amount+$expected_amount,
                  'entray_date'=>$data_entrance,
                  'admin_name'=>$admin_name,
                  'added'=>'yes',
                  'stat_role'=>$roles
              );
              $this->db->where('entray_date',$data_entrance);
              $this->db->update('tb_petrol',$array);
          }  else {
              $this->db->insert('tb_petrol',$data_entry); 
          }
      }
      public function diesel_insert($number_litres,$amount_parchased,$expected_amount,$data_entrance,$admin_name,$roles){
          $data_entry=array(
              'Litre_diesel'=>$number_litres,
              'purchased_amount'=>$amount_parchased,
              'expected_amount'=>$expected_amount,
              'entray_date'=>$data_entrance,
              'admin_name'=>$admin_name,
              'added'=>'yes',
              'stat_role'=>$roles
          );
          $res=  $this->db->get_where('tb_diesel',array('admin_name'=>$admin_name,'entray_date'=>$data_entrance));
          if($res->num_rows()===1){
              $row=$res->row();
              $array=array(
                  'Litre_diesel'=>$row->Litre_diesel+$number_litres,
                  'purchased_amount'=>$row->purchased_amount+$amount_parchased,
                  'expected_amount'=>$row->expected_amount+$expected_amount,
                  'entray_date'=>$data_entrance,
                  'admin_name'=>$admin_name,
                  'added'=>'yes',
                  'stat_role'=>$roles
              );
              $this->db->where('entray_date',$data_entrance);
              $this->db->update('tb_diesel',$array);
          }  else {
              $this->db->insert('tb_diesel',$data_entry); 
          }
      }
      public function kerosine_insert($number_litres,$amount_parchased,$expected_amount,$data_entrance,$admin_name,$roles){
          $data_entry=array(
              'Litre_kerosine'=>$number_litres,
              'purchased_amount'=>$amount_parchased,
              'expected_amount'=>$expected_amount,
              'entray_date'=>$data_entrance,
              'admin_name'=>$admin_name,
              'added'=>'yes',
              'stat_role'=>$roles
          );
          $res=  $this->db->get_where('tb_kerosine',array('admin_name'=>$admin_name,'entray_date'=>$data_entrance));
          if($res->num_rows()===1){
              $row=$res->row();
              $array=array(
                  'Litre_kerosine'=>$row->Litre_kerosine+$number_litres,
                  'purchased_amount'=>$row->purchased_amount+$amount_parchased,
                  'expected_amount'=>$row->expected_amount+$expected_amount,
                  'entray_date'=>$data_entrance,
                  'admin_name'=>$admin_name,
                  'added'=>'yes',
                  'stat_role'=>$roles
              );
              $this->db->where('entray_date',$data_entrance);
              $this->db->update('tb_kerosine',$array);
          }  else {
              $this->db->insert('tb_kerosine',$data_entry); 
          }
      }
      function oilPut($number_litres,$roles){
          $data_array=array(
              'oil_product'=>$number_litres,
              'stat_rolez'=>$roles
          );
          $res=  $this->db->get_where('oil_update',array('oil_product'=>$number_litres,'stat_rolez'=>  $this->session->userdata('role_station')),1);
          if($res->num_rows()===1){
              $this->db->where('oil_product',$number_litres);
              $this->db->update('oil_update',$data_array);
          }  else {
              $this->db->insert('oil_update',$data_array); 
          }
      }
     function oil_insert($number_litres,$amount_parchased,$prod_name,$data_entrance,$admin_name,$roles){
          $data_entry=array(
             'prod_qnty'=>$number_litres,
              'purchased_amount'=>$amount_parchased,
              'prod_name'=>$prod_name,
              'entray_date'=>$data_entrance,
              'admin_name'=>$admin_name,
              'added'=>'yes',
              'stat_role'=>$roles
          );
          $res=  $this->db->get_where('tb_oil',array('admin_name'=>$admin_name,'entray_date'=>$data_entrance,'prod_qnty'=>$number_litres));
          if($res->num_rows()===1){
              $row=$res->row();
              $array=array(
                  'prod_qnty'=>$number_litres,
                  'purchased_amount'=>$row->purchased_amount+$amount_parchased,
                  'prod_name'=>$row->prod_name+$prod_name,
                  'entray_date'=>$data_entrance,
                  'admin_name'=>$admin_name,
                  'added'=>'yes',
                  'stat_role'=>$roles
              );
              $this->db->where(array('prod_qnty'=>$number_litres,'entray_date'=>$data_entrance));
              $this->db->update('tb_oil',$array);
          }  else {
              $this->db->insert('tb_oil',$data_entry); 
          }
      }
      public function reporter($sender,$problem,$receiver,$roles){
             $array_prob=array(
                 'reporter'=>$sender,
                 'problem'=>$problem,
                 'receiver'=>$receiver,
                 'stat_role'=>$roles
             );
             $res=  $this->db->insert('tb_problem',$array_prob);
             return $res;
      }
      public function edit($id,$position){
          $array=array(
              'id'=>$id,
              'position'=>$position
          );
          $res=  $this->db->get_where('tb_user',array('id'=>$id),1);
          if($res->num_rows()===1){
              $this->db->where('id',$id);
              $this->db->update('tb_user',$array);
          }  else {
             return FALSE; 
          }
      }
      function updatepetrol($id,$number_litres,$amount_parchased,$expected_amount,$data_entrance,$roles){
          $data_entry=array(
              'Litre_petrol'=>$number_litres,
              'purchased_amount'=>$amount_parchased,
              'expected_amount'=>$expected_amount,
              'entray_date'=>$data_entrance,
              'stat_role'=>$roles
              
          );
          $res=  $this->db->get_where('tb_petrol',array('id'=>$id),1);
          if($res->num_rows()===1){
              $this->db->where('id',$id);
              $this->db->update('tb_petrol',$data_entry);
          }
      }
      function updatediesel($id,$number_litres,$amount_parchased,$expected_amount,$data_entrance,$roles){
          $data_entry=array(
              'Litre_diesel'=>$number_litres,
              'purchased_amount'=>$amount_parchased,
              'expected_amount'=>$expected_amount,
              'entray_date'=>$data_entrance,
              'stat_role'=>$roles
              
          );
          $res=  $this->db->get_where('tb_diesel',array('id'=>$id),1);
          if($res->num_rows()===1){
              $this->db->where('id',$id);
              $this->db->update('tb_diesel',$data_entry);
          }
      }
      function updatekerosine($id,$number_litres,$amount_parchased,$expected_amount,$data_entrance,$roles){
          $data_entry=array(
              'Litre_kerosine'=>$number_litres,
              'purchased_amount'=>$amount_parchased,
              'expected_amount'=>$expected_amount,
              'entray_date'=>$data_entrance,
              'stat_role'=>$roles
              
          );
          $res=  $this->db->get_where('tb_kerosine',array('id'=>$id),1);
          if($res->num_rows()===1){
              $this->db->where('id',$id);
              $this->db->update('tb_kerosine',$data_entry);
          }
      }
      function updateoil($id,$number_litres,$amount_parchased,$prod_name,$data_entrance,$roles){
          $data_entry=array(
              'prod_qnty'=>$number_litres,
              'purchased_amount'=>$amount_parchased,
              'prod_name'=>$prod_name,
              'entray_date'=>$data_entrance,
              'stat_role'=>$roles
              
          );
          $res=  $this->db->get_where('tb_oil',array('id'=>$id),1);
          if($res->num_rows()===1){
              $this->db->where('id',$id);
              $this->db->update('tb_oil',$data_entry);
          }
      }
      function petrol_cost($petrol,$roles){
          $data_array=array(
              'petrol'=>$petrol,
              'stat_role'=>$roles
          );
          $res=  $this->db->get_where('tb_update',array('stat_role'=>  $this->session->userdata('role_station')));
          if($res->num_rows()===1){
              $this->db->where('stat_role',  $this->session->userdata('role_station'));
              $this->db->update('tb_update',$data_array);
          }  else {
              $this->db->insert('tb_update',$data_array);
          }
      }
      function diesel_cost($diesel,$roles){
          $data_array=array(
              'diesel'=>$diesel,
              'stat_role'=>$roles
          );
          $res=  $this->db->get_where('tb_update',array('stat_role'=>  $this->session->userdata('role_station')));
          if($res->num_rows()===1){
              $this->db->where('stat_role',  $this->session->userdata('role_station'));
              $this->db->update('tb_update',$data_array);
          }  else {
              $this->db->insert('tb_update',$data_array);
          }
      }
      function kerosine_cost($kerosine,$roles){
          $data_array=array(
              'kerosine'=>$kerosine,
              'stat_role'=>$roles
          );
          $res=  $this->db->get_where('tb_update',array('stat_role'=>  $this->session->userdata('role_station')));
          if($res->num_rows()===1){
              $this->db->where('stat_role',  $this->session->userdata('role_station'));
              $this->db->update('tb_update',$data_array);
          }  else {
              $this->db->insert('tb_update',$data_array);
          }
      }
      function oil_cost($oil,$roles,$id,$date){
          $data_array=array(
              'oil_cost'=>$oil,
              'stat_rolez'=>$roles,
              'date_update'=>$date
          );
          $res=  $this->db->get_where('oil_update',array('oil_id'=>$id,'stat_rolez'=>  $this->session->userdata('role_station')));
          if($res->num_rows()===1){
              $this->db->where('oil_id', $id);
              $this->db->update('oil_update',$data_array);
          }  else {
              return FALSE; 
          }  
      }
  }
