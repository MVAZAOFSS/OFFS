<?php include_once 'header2.php';?>
<div id="content">
    <div class="col-lg-9">
        <nav>
            <div class="col-lg-7">
                <div class="panel panel-default">
           <div class="panel-heading">OIL PRODUCTS</div>
           <div class="panel-body">
            <table class="table table-bordered table-striped alert alert-success" id="mytable3">
                <thead><tr><th>Product</th><th>Action <b class="caret"></b></th></tr></thead>
                <tbody><tr><td>Magic Engine Oil T5</td><td></td></tr></tbody>
                <tbody><tr><td>2T Oil Water</td><td></td></tr></tbody>
                <tbody><tr><td>Acid Water</td><td></td></tr></tbody>
                <tbody><tr><td>Atf T1</td><td></td></tr></tbody>
                <tbody><tr><td>Atf II Pima Hydraulic</td><td></td></tr></tbody>
                <tbody><tr><td>Atf P.Min T1/2</td><td></td></tr></tbody>
                <tbody><tr><td>B/ Fluid 1/4 Ltrs</td><td></td></tr></tbody>
                <tbody><tr><td>B/ Fluid 1/2 Ltrs</td><td></td></tr></tbody>
                
            </table>
                </div>
                </div>
            </div>
            <div class="col-lg-5">
                
            </div>
        </nav>
    </div>
    <div class="col-lg-3">
        <div class="panel-success">
            <div class="panel-heading">
                <p> <span class="fa fa-list-alt"></span> System info</p>
            </div>
            <div class="list-group">
                <a href="<?php echo site_url('register_controller');?>" class="list-group-item btn-link">
                    <span class="fa fa-users "></span>   
                    Add new user
                   </a>
                <a href="<?php echo site_url('general_admin/change');?>" class="list-group-item">
                    <span class="fa fa-lock"></span>    
                    Change password
                    </a>
                <a href="<?php echo site_url('admin_controller/summary');?>" class="list-group-item">
                    <span class="fa fa-flag-o "></span>    
                    <span class="badge">
                   <?php if(($Litre_petrol-$sold_litre)<=4000){
                         echo '<blink>Petrol danger zone click.!</blink>';
                        }elseif (($Litre_kerosine-$sold_litre2)<=4000){
                            echo '<blink>Kerosine danger zone click.!</blink>';
                        }elseif (($Litre_diesel-$sold_litre1)<=4000){
                            echo '<blink>Diesel danger zone click.!</blink>';
                        }else{
                            echo '<blink><b>Ok</b></blink>';
                        }
                        ?>
                        </span>
                        Notification
                    </a>
                <a href="<?php echo site_url('admin_controller/notify_view');?>" class="list-group-item">
                    <span class="fa fa-flag-checkered"></span>    
                    <span class="badge">
                           <?php 
                           $res=$this->db->get_where('tb_problem',array('receiver'=>'admin','status'=>'unchecked','stat_role'=>$this->session->userdata('role_station')));
                           if($res->num_rows()>0){
                               echo '<blink>'.$this->db->count_all_results().'</blink>';
                           }  else {
                               echo '0';    
                           }
                            ?>
                        </span>
                        System alerts
                    </a>
                <a href="<?php echo site_url('admin_controller/summary');?>" class="list-group-item">
                    <span class="fa fa-file-text-o"></span>    
                    <span class="badge">View</span>
                        Balance of litres
                    </a>
                     <a href="#" class="list-group-item">
                         <span class="fa fa-files-o"></span>
                         View summary 
                    
                    </a>
                    
                   <a href="<?php echo site_url('logout');?>" class="list-group-item" >
                       <span class="fa fa-unlock-alt"></span>
                       Logout</a>
            </div>
        
       </div>
     </div>
</div>
<?php include_once 'footer.php';?>