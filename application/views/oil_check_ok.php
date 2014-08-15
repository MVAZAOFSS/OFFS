<?php
$this->db->select('*');
$this->db->from('tb_oil');
$this->db->join('oil_update','oil_update.oil_product = tb_oil.prod_qnty');
$this->db->where(array('sold_date'=>  date('m-d-Y'),'seller_status'=>'yes','stat_role'=>$this->session->userdata('role_station'),'oil_id'=>$oil));
$results=$this->db->get();
if($results->num_rows()>0){
    echo '<table class="table table-condensed table-striped table-hover">';
    echo '<thead><tr><th>Date</th><th>Name</th><th class="text-center">Action <b class="caret"></b></th></tr></thead>';
    foreach ($results->result() as $row){
    echo '<tbody><tr><td>'.$row->sold_date.'</td><td class="text-primary">'.$row->seller_name.'</td><td>'. '<button class="btn btn-success btn-xs" onclick="oilcheck(\''.$row->id.'\')" data-target=".display" data-toggle="modal"><span class="fa fa-share-square"></span> view'
           . '</button>'.' '.anchor('accountant_controller/oilsellsprint/'.$row->id,'<button class="btn btn-warning btn-sm"><span class="fa fa-print"> print</span></button>').'</td></tr></tbody>';     
    }
     echo '</table>';
}  else {
    echo '<p class="text-warning">No records found for today</p>';    
}
            ?>
<ul class="list-group">
            <li class="list-group-item">Oil creditors(s) List</li>
            </ul>
<table class="table" id="customer">
                <thead><tr><th>Seller name</th><th>Customer name</th><th>Qnty(s)</th><th>Amount to be payed</th><th>Action</th></tr></thead>
                <tbody>
                    <?php 
                    $this->db->select('*');
                    $this->db->from('tb_oil');
                    $this->db->join('oil_update','oil_update.oil_product = tb_oil.prod_qnty');
                    $this->db->where(array('status'=>'credit','stat_role'=>$this->session->userdata('role_station'),'oil_id'=>$oil));
                    $res=$this->db->get();
                    if($res->num_rows()>0){
                        foreach ($res->result() as $row){
                            echo '<tr><td>'.$row->seller_name.'</td><td>'.$row->customer_credit_name.'</td><td>'.$row->credit_litre.'</td><td>'.$row->credit_amount.'</td><td><button class="btn btn-success btn-xs" onclick="editprograme(\''.$row->id.'\')" data-target=".displayz" data-toggle="modal"><span class="fa fa-share-square">Pay</span></button></td></tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
<script>
    $(document).ready(function(){ 
        $('#customer').dataTable(); 
    });
</script>