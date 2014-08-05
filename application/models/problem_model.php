<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Problem_model extends CI_Model{
     function __construct() {
         parent::__construct();
         $this->load->helper('form','url','html');
     }
     function problem_insert($user,$problem,$problem_choose,$roles){
         $array_magic=array(
             'reporter'=>$user,
             'problem'=>$problem,
             'receiver'=>$problem_choose,
             'stat_role'=>$roles
         );
       $res=  $this->db->insert('tb_problem',$array_magic);
       return $res;
     }
 }