<html>
    <head>
        <title>eSAT</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/ofss.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/all.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/tooltip.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/datepicker.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/slide.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.dataTables.css');?>">
        <script src="<?php echo base_url('assets/js/jquery-2.0.3.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery-1.10.2.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap-modal.js') ?>"></script>
        <!--<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js') ?>"></script>-->
        <script src="<?php echo base_url('assets/js/datepicker.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/core.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/position.js') ?>"></script>
        <!--<script src="<?php echo base_url('assets/js/tooltip.js') ?>"></script>-->
        <!--<script src="<?php echo base_url('assets/js/jquery-ui.widget.js') ?>"></script>-->
        <script src="<?php echo base_url('assets/js/bootstrap-alert.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap-dropdown.js');?>"></script>
        <script src="<?php echo base_url('assets/js/tabcordion.js');?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap-popover.js');?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>"></script>
    </head>
    <body>
        <header class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="collapse navbar-collapse">
                    <di class="nav navbar-brand">
                        <?php 
                        if($this->session->userdata('apartment')==='admin'){
                            echo 'Welcome Administrator of Station '.$this->session->userdata('role_station');
                        }elseif ($this->session->userdata('apartment')==='seller') {
                            echo 'Welcome Seller of Station '.$this->session->userdata('role_station');
                        }elseif ($this->session->userdata('apartment')==='accountant') {
                            echo 'Welcome Accountant of Station '.$this->session->userdata('role_station');
                        }
                        
                        ?>
                        
                    </di>
                    <ul class="nav navbar-nav pull-right">
                        <li class="active"><a href="#" class="fa fa-home">Home</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Services<b class="caret"></b></a>
                                <?php
                                if($this->session->userdata('apartment')==='seller'){
                                    echo '<ul class="dropdown-menu">
                                    <li><a href="'.site_url('dashbord/dieselupdate').'" ><span class="fa fa-eye"></span> Diesel</a></li>
                                    <li><a href="'.site_url('dashbord/kerosineupdate').'" ><span class="fa fa-eye"></span> Kerosene</a></li>
                                    <li><a href="'.site_url('dashbord/petrolupdate').'" ><span class="fa fa-eye"></span> Petrol</a></li>
                                    <li><a href="'.site_url('dashbord/oilupdate').'" ><span class="fa fa-eye"></span> Oil</a></li>
                                </ul>'; 
                                }elseif ($this->session->userdata('apartment')==='admin') {
                                    echo '<ul class="dropdown-menu">
                                    <li><a href="'.site_url('admin_controller/dieselupdate').'" ><span class="fa fa-plus"></span> Diesel</a></li>
                                    <li><a href="'.site_url('admin_controller/kerosineupdate').'" ><span class="fa fa-plus"></span> Kerosene</a></li>
                                    <li><a href="'.site_url('admin_controller/petrolupdate').'" ><span class="fa fa-plus"></span> Petrol</a></li>
                                    <li><a href="'.site_url('admin_controller/oilupdate').'" ><span class="fa fa-plus"></span> Oil</a></li>
                                </ul>';
                                }elseif ($this->session->userdata('apartment')==='accountant') {
                                    echo '<ul class="dropdown-menu">
                                    <li><a href="'.site_url('accountant_controller/dieselupdate').'" ><span class="fa fa-eye"></span> Diesel</a></li>
                                    <li><a href="'.site_url('accountant_controller/kerosineupdate').'" ><span class="fa fa-eye"></span> Kerosene</a></li>
                                    <li><a href="'.site_url('accountant_controller/petrolupdate').'" ><span class="fa fa-eye"></span> Petrol</a></li>
                                    <li><a href="'.site_url('accountant_controller/oilupdate').'" ><span class="fa fa-eye"></span> Oil</a></li>
                                </ul>';
                                 }
                                ?>
                           </li>
                        <li><div class="btn-group open">
                                <a class="btn btn-primary dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-user fa-fw"></i> <?php echo $this->session->userdata('username');?> <span class="fa fa-caret-down "></span></a>
                                <ul class="dropdown-menu">
                                      <li><a href="<?php echo site_url('admin_profile');?>"><i class="fa fa-pencil fa-fw"></i> Profile</a></li>
                                  </ul>
                              </div></li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="page-above">
            
        </div>
        



