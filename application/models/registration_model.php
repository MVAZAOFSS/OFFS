<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Registration_model extends CI_Model{
     function __construct() {
         parent::__construct();
     }
     function registration($first_name,$sec_name,$username,$email,$password,$position,$roles){
         $sess_data=array(
             'first_name'=>$first_name,
             'sec_name'=>$sec_name,
             'username'=>$username,
             'email'=>$email,
             'password'=>$password,
             'position'=>$position,
             'stat_role'=>$roles
         );
         $this->session->set_userdata($sess_data);
         $result=  $this->db->insert('tb_user',$sess_data);
         return $result;
     }
     function forgot($sn,$password){
         $res=  $this->db->get_where('tb_user',array('email'=>$sn),1);
         $array=array('password'=>$password);
         if($res->num_rows()===1){
             $this->db->where('email',$sn);
             $this->db->update('tb_user',$array);
         }
      }
      }

