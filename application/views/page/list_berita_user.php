<style>
  th{
    text-align: center;
  }
  td{
    text-align: center; 
  }
  
}
</style>
<!-- <script src="<?=base_url()?>assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js')?>"></script> -->
<!-- START CUSTOM TABS -->
      <h2 class="page-header">List News</h2>
      <form name="form1" action="<?=base_url()?>admin/tampil_dari_tgl" method="post" enctype="multipart/form-data" style="width:40%; float:left">

      <div>
        <label>Tanggal</label>
        <input type="text" id="tgl_awal" name="tgl_awal" >&nbsp;&nbsp;
        <input class="btn btn-primary" type="submit" value="Cari">&nbsp;&nbsp;
     </div>
     </form>
     <form name="form1" action="<?=base_url()?>admin/tampil_dari_search" method="post" enctype="multipart/form-data" style="width:40%; float:right">

      <div>
        <label>Cari</label>
        <input type="text" id="cari" name="cari" >&nbsp;&nbsp;
        <input class="btn btn-primary" type="submit" value="Cari">&nbsp;&nbsp;
     </div>
     </form>
     <br>
     <br>
      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Pending</a></li>
              <li><a href="#tab_2" data-toggle="tab">Approved</a></li>
              <li><a href="#tab_3" data-toggle="tab">Rejected</a></li>
              
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-tooltip" data-toogle="tooltip">
                <tr>
                 <th>status</th>
                  <th>ID Berita</th>
                  <th>Judul Berita</th>
                  <th>Creator</th>
                  <th>Time Created</th>
                  <th> </th>
                </tr>

                <?php foreach ($berita_list_pending as $u_key){ ?>
                <tr>
                <td><?php
                      $st =  $u_key->status_read; 
                      if($st==0){
                          echo "<img src='".base_url()."assets/loading.png'>";
                      } else {
                          
                      }
                      ?></td>
                  <td><?php echo $u_key->idberita; ?></td>
                  <td><a href="javascript:void(0)" title="Edit" onclick="edit_isi_modal_berita(<?php echo $u_key->idberita ?>)"><?php echo $u_key->judul; ?></a></td>
                  <td><?php echo $u_key->Nama; ?></td>
                  <td><?php echo $u_key->time_create; ?> <a href="<?=base_url()?>user/lihat_berita/<?php echo $u_key->idberita; ?>" type="submit" name="lihat" value="lihat"></a></td>
                  <td>
                    <button type="submit" class="btn btn-default" ><i class="fa fa-pencil"></i></button>
                    <button type="submit" class="btn btn-default" onclick="hapus()"><i class="fa fa-trash"></i></button>
                    <button type="submit" class="btn btn-default"><i class="fa fa-check"></i></button>
                    
                  </td>
                  
                </tr>
                
                <?php }?>
              </table>
            </div>
              </div>
            

              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                 <th>status</th>
                  <th>ID Berita</th>
                  <th>Judul Berita</th>
                  <th>Creator</th>
                  <th>Time Created</th>
                  <th> </th>
                </tr>
                <?php foreach ($berita_list_approved as $u_key){ ?>
                <tr>
               <td><?php
                      $st =  $u_key->status_read; 
                      if($st==0){
                          echo "<img src='".base_url()."assets/loading.png'>";
                      } else {
                          
                      }
                      ?></td>
                  <td><?php echo $u_key->idberita; ?></td>
                  <td><a href="javascript:void(0)" title="Edit" onclick="edit_isi_modal_berita(<?php echo $u_key->idberita ?>)"><?php echo $u_key->judul; ?></a></td>
                  <td><?php echo $u_key->Nama; ?></td>
                  <td><?php echo $u_key->time_create; ?> <a href="<?=base_url()?>user/lihat_berita/<?php echo $u_key->idberita; ?>" type="submit" name="lihat" value="lihat"></a></td>
                  <td>
                      <button type="hidden" class="btn btn-default" onclick="hapus()"><i class="fa fa-trash"></i></button>
                      <button type="hidden" class="btn btn-default"><i class="fa fa-download"></i></button>
                    }
                    
                  }
                    
                  </td>
                  
                </tr>
                
                <?php }?>
              </table>
            </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID Berita</th>
                  <th>Judul Berita</th>
                  <th>Creator</th>
                  <th>Time Created</th>
                  <th> </th>
                </tr>
                <?php foreach ($berita_list_rejected as $u_key){ ?>
                <tr>
                  <td><?php echo $u_key->idberita; ?></td>
                  <td><a href="javascript:void(0)" title="Edit" onclick="edit_isi_modal_berita(<?php echo $u_key->idberita ?>)"><?php echo $u_key->judul; ?></a></td>
                  <td><?php echo $u_key->Nama; ?></td>
                  <td><?php echo $u_key->time_create; ?> <a href="<?=base_url()?>user/lihat_berita/<?php echo $u_key->idberita; ?>" type="submit" name="lihat" value="lihat"></a></td>
                  <td>
                    <button type="submit" class="btn btn-default" onclick="hapus()"><i class="fa fa-trash"></i></button>
                    <button type="submit" class="btn btn-default"><i class="fa fa-check"></i></button>
                  </td>
                  
                </tr>
                
                <?php }?>
              </table>
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
    <div id="myModalKategori" class="modal fade">
    <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Isi Berita</h4>
        </div>
        <div class="modal-body">
        <!-- <form  role="form" method="post" action="<?=base_url()?>admin_data_user-->
          <form  role="form" method="post" action="#" id="formModalBerita">
            
            <input type="hidden" name="idberita" class="form-control" placeholder="Id Berita" readonly>               
            
            <!--<input type="text" name="isi" class="form-control" placeholder="isi" readonly>-->
            <div id="isi">
            </div>
            <br>
                             
        </form>
        </div id="isi">
        </form>
                          
        <div class="modal-footer">
                             <!-- <button type="submit" name="" class="btn btn-primary">Submit -->
        <button type="button" id="btnSave" onclick="save_isi_modal()" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              
        </div>
        </div>
        </div>
        </div>
        </div>
