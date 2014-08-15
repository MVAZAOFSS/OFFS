<table class="table table-condensed table-hover table-striped" id="tcheck">
                <thead><th>option</th><th>Seller name</th><th>Date</th></thead>
            <tbody>
                <?php
            $this->db->select('*');
            $this->db->from('tb_oil');
            $this->db->join('oil_update','oil_update.oil_product = tb_oil.prod_qnty');
            $this->db->where(array('seller_status'=>'yes','stat_role'=>$this->session->userdata('role_station'),'oil_id'=>$oil));
            $res= $this->db->get();
                if($res->num_rows()>0){
                  foreach($res->result() as $row){
                      echo '<tr><td><button class="btn btn-success btn-xs" onclick="oilcheck(\''.$row->id.'\')"><span class="fa fa-share-square-o"></span>view</button>'."&nbsp;".anchor('general_accountant/printoverview3/'.$row->id,'<button class="btn btn-warning btn-xs"><span class="fa fa-print"></span>print</button>').'</td>'
                              . '<td>'.' '.$row->seller_name.'</td><td>'.$row->sold_date.'</td></tr>';   
                  }  
                }
                ?>
            </tbody>
</table>
<script>
$(document).ready(function(){ 
        $('#tcheck').dataTable(); 
    });
</script>