<style type="text/css">
  th{
    text-align: center;
  }
  td{
    text-align: center; 
  }
</style>

<div class="container" style="padding-right: 8%;">
  <h1>List Kategori</h1>
  <button class="btn btn-success" onclick="add_kategori()"><i class="glyphicon glyphicon-plus"></i> Add Kategori</button>
  <button class="btn btn-default" onclick="reload_kategori()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
  
        <br />
        <br />
        
        <table id="table_kategori" class="table table-striped table-bordered" cellspacing="0" width="100%">
       
            <thead>
                <tr>
                    <th><center>Kategori</center></th>
                    <th><center>Action</center></th>       
                    <th><center>Action</center></th>
                </tr>
            </thead>
            <tbody>

            </tbody>
           
        </table>
</div>

<div id="myModalKategori" class="modal fade">
  <div class="modal-dialog">
  <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Edit Kategori</h4>
      </div>
      <div class="modal-body">
      <!-- <form  role="form" method="post" action="<?=base_url()?>admin_data_user-->
        <form  role="form" method="post" action="#" id="formkategori">
             
          <input type="hidden" name="idkategori" class="form-control" placeholder="Kategori" readonly>               
          <label>Kategori</label>
          <input type="text" name="kategori" class="form-control" placeholder="Kategori">
          <br>
                           
      </form>
      </div>
                        
      <div class="modal-footer">
                           <!-- <button type="submit" name="" class="btn btn-primary">Submit -->
      <button type="button" id="btnSave" onclick="save_kategori()" class="btn btn-primary">Save</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            
      </div>
      </div>
      </div>
      </div>
      </div>
