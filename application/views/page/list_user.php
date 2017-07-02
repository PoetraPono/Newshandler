<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <script src="<?php echo base_url()?>assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
</head>
    
<style type="text/css">
  th{
    text-align: center;
  }
  td{
    text-align: center; 
  }
</style>

    <div class="container" style="padding-right: 8%;">
        <h1 style="font-size:20pt">Daftar User</h1>

        
        <br />
        <button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Add Person</button>
        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
        <br />
        <br />
          <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
         
            <thead>

                <tr>
                    <th><center>Nama</center></th>
                    <th><center>Kategori</center></th>
                    <th><center>Level</center></th>
                    <th><center>Action</center></th>
                    <th><center>Action</center></th>
                    
                </tr>
            </thead>
            <tbody>
              

            </tbody>           
          </table>
          <!-- </div>
        </div>
      </div>
    </div>   
 </div> -->
</div>
<div id="myModal" class="modal fade">
  <div class="modal-dialog">
  <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Edit User</h4>
      </div>
      <div class="modal-body">
      <!-- <form  role="form" method="post" action="<?=base_url()?>admin_data_user-->
        <form  role="form" method="post" action="#" id="form">
          
          <input type="hidden" name="iduser" class="form-control" placeholder="iduser" readonly>
          <br>

          <label>Nama</label>
          <input type="text" name="Nama" class="form-control" placeholder="Nama">
          <br>
                           
                            
          <label>Username</label>
          <input type="text" name="username" class="form-control" placeholder="Username">
          <br>
                         
                            
          <label>Password</label>
          <input type="text" name="password" class="form-control" placeholder="password">
          <br>
                        
                               
          <label>Level</label>
            <select class="form-control select2" style="width: 100%;" name="level">
              <option value='0'>--pilih--</option>
                <?php foreach ($level_list as $u_key){
                  echo "<option value=$u_key->idlevel_user>  $u_key->level  </option>"   ;
                }?> 
            </select>
          <br>
                          
                               
          <label>Kategori</label>
            <select class="form-control select2" style="width: 100%;" name="kategori">
              <option value='0'>--pilih--</option>          
                <?php foreach ($kategori_list as $u_key){
                  echo "<option value=$u_key->idkategori> $u_key->kategori </option>"   ;
                }?>
            </select>
          <br>
      </form>
      </div>
                        
      <div class="modal-footer">
                           <!-- <button type="submit" name="" class="btn btn-primary">Submit -->
      <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            
      </div>
      </div>
      </div>
      </div>
      </div>

<!----------------------------------------------Modal untuk Edit-------------------------------------------------------------------- -->
