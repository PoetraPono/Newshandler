<style type="text/css">
  th{
    text-align: center;
  }
  td{
    text-align: center; 
  }
</style>
<div class="container">
  <h1>Notification</h1>
  <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <!-- <input type="text" name="table_search" class="form-control pull-right" placeholder="Search"> -->

                  <!-- <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div> -->
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <!-- <th>ID Berita</th> -->
                  <th>Id Notifikasi</th>
                   <th>Kategori</th>
                  <th>Judul Berita</th>
                  <th>Nama Pengubah</th>
                  <th>Action</th>
                  <th>Waktu mengubah</th>
                </tr>
  
                <?php foreach ($list_notifikasi as $u_key){ ?>
                <tr>
                  <td><?php echo $u_key->idnotifikasi; ?></a></td>
                  <td><?php echo $u_key->kategori ?></td>
                  <td><?php echo $u_key->judul ?></td>
                   <td><?php echo $u_key->Nama; ?></td>
                  <td><?php echo $u_key->status_berita ?></td>
                  <td><?php echo $u_key->time; ?> <a href="<?=base_url()?>user/lihat_berita/<?php echo $u_key->idberita; ?>" type="submit" name="lihat" value="lihat"></a></td>
                  <td>
                    <a href="<?=base_url()?>notifikasi/update_status_read/<?php echo $u_key->idberita; ?>" type="submit" class="btn btn-default"><i class="fa fa-check"></i></a>
        
                  </td>
                  
                </tr>               
                <?php }?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
</div>