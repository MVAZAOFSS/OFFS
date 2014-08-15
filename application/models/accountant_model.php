<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Accountant_model extends CI_Model{
     function __construct() {
         parent::__construct();
     }
     function account_payed($id,$amount,$date,$mode,$chqno,$roles){
         
         $res2= $this->db->get_where('tb_petrol',array('id'=>$id));
         if ($res2->num_rows()===1) {
            
            $row=$res2->row();
            $data_up=array(
                'payed'=>$row->payed+$amount,
                'date_return'=>$date,
                'pay_mode'=>$mode,
                'checqNo'=>$chqno,
                'status'=>'not credit',
                'stat_role'=>$roles
            );
            $this->db->where('id',$id);
            $this->db->update('tb_petrol',$data_up);
        }  
     }
     function account_payed_diesel($id,$amount,$date,$mode,$chqno,$roles){
         
         $res2=  $this->db->get_where('tb_diesel',array('id'=>$id));
         if($res2->num_rows()===1) {
             $row=$res2->row();
             $data_up=array(
                'payed'=>$row->payed+$amount,
                'date_return'=>$date,
                'pay_mode'=>$mode,
                'checqNo'=>$chqno,
                'status'=>'not credit',
                 'stat_role'=>$roles
            );
            $this->db->where('id',$id);
            $this->db->update('tb_diesel',$data_up);
        }
     }
     function account_payed_kerosine($id,$amount,$date,$mode,$chqno,$roles){
         
         $res2=  $this->db->get_where('tb_kerosine',array('id'=>$id));
         if ($res2->num_rows()===1) {
             $row=$res2->row();
            $data_up=array(
                'payed'=>$row->payed+$amount,
                'date_return'=>$date,
                'pay_mode'=>$mode,
                'checqNo'=>$chqno,
                'status'=>'not credit',
               'stat_role'=>$roles
            );
            $this->db->where('id',$id);
            $this->db->update('tb_kerosine',$data_up);
        }
     }
     function account_payed_oil($id,$amount,$date,$mode,$chqno,$roles){
         
         $res2=  $this->db->get_where('tb_oil',array('id'=>$id));
         if ($res2->num_rows()===1) {
             $row=$res2->row();
            $data_up=array(
                'payed'=>$row->payed+$amount,
                'date_return'=>$date,
                'pay_mode'=>$mode,
                'checqNo'=>$chqno,
                'status'=>'not credit',
               'stat_role'=>$roles
            );
            $this->db->where('id',$id);
            $this->db->update('tb_oil',$data_up);
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
      function expenditure($amount,$reasons,$date,$entry,$mode,$cheque,$roles){
         $data_array=array(
             'cash_used'=>$amount,
             'reason'=>$reasons,
             'date_entered'=>$date,
             'data_entry_name'=>$entry,
             'cash_mode'=>$mode,
             'checqueNo'=>$cheque,
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
     function updatez($id,$amount,$reason,$mode,$chqno,$datez,$roles){
         $data_array=array(
             'cash_used'=>$amount,
             'date_entered'=>$datez,
             'reason'=>$reason,
             'cash_mode'=>$mode,
             'checqueNo'=>$chqno,
            'stat_role'=>$roles
         );
         $res=  $this->db->get_where('tb_expenditure',array('id'=>$id),1);
         if($res->num_rows()===1){
             $this->db->where('id',$id);
             $this->db->update('tb_expenditure',$data_array);
             
         }  else {
             return FALSE;
         }
         
     }
 }
