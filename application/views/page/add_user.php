<div class="container">
  <h1>Tambah User</h1>
  <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <!-- /.box-header -->
            <form  role="form" method="post" action="<?=base_url()?>admin/add_data_user">
                <!-- text input -->
                <div class="form-group, col-md-8">
                  <label>Nama</label>
                  <input type="text" name="Nama" class="form-control" placeholder="Nama">
                  <br>
                </div>
                <div class="form-group, col-md-8">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" placeholder="Username">
                  <br>
                </div>
                <div class="form-group, col-md-8">
                  <label>Password</label>
                  <input type="text" name="password" class="form-control" placeholder="password">
                  <br>
                </div>
                <div class="form-group, col-md-8">
                   
                <label>Level</label>
                <select class="form-control select2" style="width: 100%;" name="level">
                  <option value='0'>--pilih--</option>
                  <?php 
                      foreach ($kategori as $kat) {
                        echo "<option value='$kat[idkategori]'>$kat[idkategori] . $kat[kategori]</option>";
                      }
                  ?>
                </select>
                <br>
              </div>
                <div class="form-group, col-md-8">
                   
                <label>Kategori</label>
                <select class="form-control select2" style="width: 100%;" name="kategori">
                  <option value='0'>--pilih--</option>
                  <?php 
                      foreach ($kategori as $kat) {
                        echo "<option value='$kat[idkategori]'>$kat[idkategori] . $kat[kategori]</option>";
                      }
                  ?>

                </select>
                <br>
              </div>
             
                </div>
                 <button type="submit" name="" class="btn btn-primary">Submit</button>
              <!-- <div class="box-footer">
                
              </div> -->
                
               
              </form>
              <div class="box-tools">
                <!-- <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div> -->
              </div>
            </div>
            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
  </div>
</div>