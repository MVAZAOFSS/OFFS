<div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class=" text-primary">
                 search by:<span class="fa fa-search-plus pull-right" ></span>
              </a>
            </h4>
          </div>
          <div id="collapseThree" class="panel-collapse collapse">
            <div class="panel-body">
           <?php
            $this->db->select('*');
            $this->db->from('tb_oil');
            $this->db->join('oil_update','oil_update.oil_product = tb_oil.prod_qnty');
            $this->db->where(array('seller_status'=>'yes','stat_role'=>$this->session->userdata('role_station'),'oil_id'=>$oil));
           $res= $this->db->get();
            if($res->num_rows()>0){
                echo '<table class="table table-striped table-bordered table-condensed" id="seach">';
                echo '<thead><tr><th>date</th><th>option</th></tr></thead>';
                echo '<tbody>';
                foreach ($res->result() as $row){
                     echo '<tr>'
                        . '<td>'.$row->sold_date.'</td><td class="pull-right">'.'<a class="btn btn-success btn-xs" onclick="showoilhistory(\''.$row->id.'\')"><span class="fa fa-search"></span></a> '.' '.anchor('accountant_controller/reportprint3/'.$row->id,'<button class="btn btn-warning btn-xs"><span class="fa fa-print"></span></button>').'</td>'
                        . '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            }  else {
                echo '<ul class="list-group">'
                           . '<li class="list-group-item text-warning"><a href="#">No records</a></li>'
                           . '</ul>';
                 }
            ?>
            </div>
          </div>
        </div>
<script>
     $(document).ready(function(){
            $('#seach').dataTable();
        });
</script>
