<?php?>
  <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Edit User</h3>
            </div>
            <!-- /.box-header -->
           
            <div class="box-body">
              <form  role="form" method="POST" action="<?=base_url()?>admin/edit_data_user">
                <!-- text input -->
                <div class="form-group">
                  <label>ID</label>
                  <input type="text" name="iduser" class="form-control" value="<?php echo $iduser ?>";>
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="Nama" class="form-control" value="<?php echo $Nama; ?>";>
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="text" name="password" class="form-control" value="<?php echo $password; ?>">
                </div>
                <div class="form-group">
                  <label>ID Kategori</label> <label>1:wartawan, 2:redaktur,3:writer,4:admin</label>
                  <input type="text" name="kategori_idkategori" class="form-control" value="<?php echo $kategori_idkategori; ?>">
                </div>
                <div class="form-group">
                  <label>ID Level</label> <label>1:Metropolis, 2:Sport,3:Female,4:admin</label>
                  <input type="text" name="level_idlevel" class="form-control" value="<?php echo $level_idlevel; ?>">
                </div>
                

                
              <div class="box-footer">
                <button type="submit" name="submit" value="Update" class="btn btn-primary">Update</button>
              </div>
                
               
              </form>