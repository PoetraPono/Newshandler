<div class="container" style="padding-right:6%">
    <h3>List Berita CopyWriter</h3>
    <br>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist" id="myTab">
        <li role="presentation" class="active"><a href="#example1-tab1" aria-controls="example1-tab1" role="tab" data-toggle="tab">Sent</a></li>
        <li role="presentation"><a href="#example1-tab2" aria-controls="example1-tab2" role="tab" data-toggle="tab">Approved</a></li>

    </ul>
    <br>
    <!-- Tab panes -->
    <div class="tab-content">
    <form name="form1" action="<?=base_url()?>user/tampil_dari_tgl" method="post" enctype="multipart/form-data" style="width:40%; float:left">

      <div>
        <label>Tanggal</label>
        <input type="text" id="tgl_awal" name="tgl_awal" >&nbsp;&nbsp;
        <input class="btn btn-primary" type="submit" value="Cari">&nbsp;&nbsp;
     </div>
     </form>

        <div role="tabpanel" class="tab-pane fade in active" id="example1-tab1">
            <table id="list_berita_pending" class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th><center>Status</center></th>
                        <th><center>Judul Berita</center></th>
                      <!--   <th><center>Creator</center></th> -->
                        <th><center>Editor</center></th>
                        <th><center>Time Created</center></th>
                        <th><center>Last Edited</center></th>
                        <th><center> </center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($berita_list_pending as $u_key){ ?>
                      <tr>
                      <td><?php
                      $st =  $u_key->status_read; 
                      if($st==0){
                          echo "<img src='".base_url()."assets/loading.png'>";
                      } else {
                          
                      }
                      ?></td>
                        <td><a href="javascript:void(0)" title="Edit" onclick="edit_isi_modal_berita(<?php echo $u_key->idberita ?>)"><?php echo $u_key->judul; ?></a></td>
                       
                        <td><?php echo $u_key->Nama; ?></td>
                        <td><?php echo $u_key->time_create; ?> <a href="<?=base_url()?>user/lihat_berita/<?php echo $u_key->idberita; ?>" type="submit" name="lihat" value="lihat"></a></td>
                        <td><?php echo $u_key->time_edit; ?></td>
                        <td>
                          
                        </td>
                      </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="example1-tab2">
            <table id="list_berita_approved" class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th><center>Status</center></th>
                        <th><center>Judul Berita</center></th>
                       <!--  <th><center>Creator</center></th> -->
                        <th><center>Editor</center></th>
                        <th><center>Time Created</center></th>
                        <th><center>Last Edited</center></th>
                        <th><center> </center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($berita_list_approved as $u_key){ ?>
                      <tr>
                        <td><?php
                      $st =  $u_key->status_read;
                      $sb=$u_key->status_berita;
                      if($sb==7){
                          echo "<img src='".base_url()."assets/return.png'>";
                           
                      } elseif($st==0){
                          echo "<img src='".base_url()."assets/loading.png'>";
                      }else{}
                      ?></td>
                        <td><a href="javascript:void(0)" title="Edit" onclick="edit_isi_modal_berita(<?php echo $u_key->idberita ?>)"><?php echo $u_key->judul; ?></a></td>
                       
                        <td><?php echo $u_key->Nama; ?></td>
                        <td><?php echo $u_key->time_create; ?> <a href="<?=base_url()?>user/lihat_berita/<?php echo $u_key->idberita; ?>" type="submit" name="lihat" value="lihat"></a></td>
                        <td><?php echo $u_key->time_edit; ?></td>
                         <td>
                           <a href="<?=base_url()?>user/lihat_berita/<?php echo $u_key->idberita; ?>" type="submit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                          <a href="<?=base_url()?>user/update_status_send_to_rd/<?php echo $u_key->idberita; ?>" type="submit" class="btn btn-default"><i class="fa fa-send"></i></a>
                          
                        </td>
                      </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="myModalKategori" class="modal fade">
    <div class="modal-dialog" style="overflow-y:initial !important;">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Isi Berita</h4>
        </div>
        <div class="modal-body" style="overflow-y:auto;height:200px;">
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

<script type="text/javascript">
                    $(document).ready(function(){

                    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {

                        localStorage.setItem('activeTab', $(e.target).attr('href'));

                    });

                    var activeTab = localStorage.getItem('activeTab');

                    if(activeTab){

                        $('#myTab a[href="' + activeTab + '"]').tab('show');                        

                    }

                });
                </script>

