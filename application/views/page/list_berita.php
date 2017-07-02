<div class="container" style="padding-right:8%">
    <h3>List Berita </h3>
    <br>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#example1-tab1" aria-controls="example1-tab1" role="tab" data-toggle="tab">Sent</a></li>
        <li role="presentation"><a href="#example1-tab2" aria-controls="example1-tab2" role="tab" data-toggle="tab">Approved</a></li>
         <li role="presentation"><a href="#example1-tab3" aria-controls="example1-tab3" role="tab" data-toggle="tab">Rejected</a></li>
         <li role="presentation"><a href="#example1-tab4" aria-controls="example1-tab4" role="tab" data-toggle="tab">Saved</a></li>

    </ul>
    <br>
    <!-- Tab panes -->
    <div class="tab-content">
    <form name="form1" action="<?=base_url()?>admin/tampil_dari_tgl" method="post" enctype="multipart/form-data" style="width:40%; float:left">

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
                        <th><center>Judul Berita</center></th>
                        <th><center>Creator</center></th>
                        <th><center>Time Created</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($berita_list_pending as $u_key){ ?>
                    <tr>
                        <td><a href="javascript:void(0)" title="Edit" onclick="edit_isi_modal_berita(<?php echo $u_key->idberita ?>)"><?php echo $u_key->judul; ?></a></td>
                        <td><?php echo $u_key->Nama; ?></td>
                        <td><?php echo $u_key->time_create; ?> <a href="<?=base_url()?>user/lihat_berita/<?php echo $u_key->idberita; ?>" type="submit" name="lihat" value="lihat"></a></td>
                   </tr>
                   <?php }?>
                </tbody>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="example1-tab2">
            <table id="list_berita_approved" class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th><center>Judul Berita</center></th>
                        <th><center>Creator</center></th>
                        <th><center>Time Created</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($berita_list_approved as $u_key){ ?>
                      <tr>
                        <td><a href="javascript:void(0)" title="Edit" onclick="edit_isi_modal_berita(<?php echo $u_key->idberita ?>)"><?php echo $u_key->judul; ?></a></td>
                        <td><?php echo $u_key->Nama; ?></td>
                        <td><?php echo $u_key->time_create; ?> <a href="<?=base_url()?>user/lihat_berita/<?php echo $u_key->idberita; ?>" type="submit" name="lihat" value="lihat"></a></td>
                      </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="example1-tab3">
            <table id="list_berita_rejected" class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th><center>Judul Berita</center></th>
                        <th><center>Creator</center></th>
                        <th><center>Time Created</center></th>
                    </tr>
                </thead>
                <tbody>
                   <?php foreach ($berita_list_rejected as $u_key){ ?>
                      <tr>
                        <td><a href="javascript:void(0)" title="Edit" onclick="edit_isi_modal_berita(<?php echo $u_key->idberita ?>)"><?php echo $u_key->judul; ?></a></td>
                        <td><?php echo $u_key->Nama; ?></td>
                        <td><?php echo $u_key->time_create; ?> <a href="<?=base_url()?>user/lihat_berita/<?php echo $u_key->idberita; ?>" type="submit" name="lihat" value="lihat"></a></td>                       
                      </tr>
                   <?php }?>
                </tbody>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="example1-tab4">
            <table id="list_berita_saved" class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th><center>Judul Berita</center></th>
                        <th><center>Creator</center></th>
                        <th><center>Time Created</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($berita_list_saved as $u_key){ ?>
                      <tr>
                        <td><a href="javascript:void(0)" title="Edit" onclick="edit_isi_modal_berita(<?php echo $u_key->idberita ?>)"><?php echo $u_key->judul; ?></a></td>
                        <td><?php echo $u_key->Nama; ?></td>
                        <td><?php echo $u_key->time_create; ?> <a href="<?=base_url()?>user/lihat_berita/<?php echo $u_key->idberita; ?>" type="submit" name="lihat" value="lihat"></a></td>
                      </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>

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

