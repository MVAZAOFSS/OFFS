<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Start extends CI_Controller{
     function __construct() {
         parent::__construct();
         $this->load->helper('url','form','html');
     }
     function index(){
         $this->load->view('home');
     }
     
 }

