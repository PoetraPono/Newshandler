<style>
  th{
    text-align: center;
  }
  td{
    text-align: center; 
  }
  .tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
  }

  .tooltip .tooltiptext {
      visibility: hidden;
      width: 120px;
      background-color: black;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px 0;

      /* Position the tooltip */
      position: absolute;
      z-index: 1;
  }

  .tooltip:hover .tooltiptext {
      visibility: visible;
}
</style>
<!-- START CUSTOM TABS -->
      <h2 class="page-header">List News for Wartawan</h2>

      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Pending (1)</a></li>
              <li><a href="#tab_2" data-toggle="tab">Approved (1)</a></li>
              <li><a href="#tab_3" data-toggle="tab">Rejected (1)</a></li>
              
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">

              <div class="tab-pane active" id="tab_1">
                <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-tooltip" data-toogle="tooltip">
                <tr>
                  <th>ID Berita</th>
                  <th>Judul Berita</th>
                  <th>Creator</th>
                  <th>Time Created</th>
                  <th> </th>
                </tr>
                <?php foreach ($list_history as $u_key){ ?>
                <tr>
                  <td><?php echo $u_key->idberita; ?></td>
                  <td title="<?php echo $u_key->isi?>"><?php echo $u_key->judul; ?></td>
                  <td><?php echo $u_key->Nama; ?></td>
                  <td><?php echo $u_key->time_create; ?> <a href="<?=base_url()?>user/lihat_berita/<?php echo $u_key->idberita; ?>" type="submit" name="lihat" value="lihat"></a></td>
                  <td>
                    <a href="<?=base_url()?>user/lihat_berita/<?php echo $u_key->idberita; ?>" type="submit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                    <button type="submit" class="btn btn-default"><i class="fa fa-trash"></i></button>
                    <button type="submit" class="btn btn-default"><i class="fa fa-check"></i></button>
                    
                  </td>
                  
                </tr>
                
                <?php }?>
              </table>
            </div>
              </div>
              
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->

        
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- END CUSTOM TABS -->