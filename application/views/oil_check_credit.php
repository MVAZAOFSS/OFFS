<table class="table table-condensed table-striped" id="record">

<thead><tr><th>Oil creditors(s) List</th></tr></thead>
<tbody>
    <?php
    $this->db->select('*');
    $this->db->from('tb_oil');
    $this->db->join('oil_update','oil_update.oil_product = tb_oil.prod_qnty');
    $this->db->where(array('status'=>'credit','stat_role'=>$this->session->userdata('role_station'),'oil_id'=>$oil));
    $res=$this->db->get();
    if($res->num_rows()>0){
        foreach ($res->result() as $row){
            echo '<tr><td>'.$row->customer_credit_name.'<button class="btn btn-success btn-xs pull-right"  onclick="creditviewz(\''.$row->id.'\')">
                <span class="fa fa-share-square-o"></span> Pay
                </button></td></tr>';
        }
    }
    ?>
</tbody>
</table>
<script>
    $(document).ready(function(){ 
        $('#record').dataTable(); 
    });
</script>