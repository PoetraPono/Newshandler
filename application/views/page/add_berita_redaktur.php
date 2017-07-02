<div class="container" style="padding-right:7%; padding-top:2%">
  <!-- quick email widget -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">CK Editor
                <small>Advanced and full of features</small>
              </h3>
              
              <form role="form" method="post" action="<?=base_url()?>user/add_data_berita">
              <div class="box-body pad">
              
                <div class="form-group">
                <input class="form-control" placeholder="Judul:" name="judul">
              </div>
                    <textarea id="editor1" name="isi" rows="10" cols="80">
                                            Isi Berita
                    </textarea>

                 <div class="form-group">
                <input class="form-control" value="<?php echo $user_iduser;?>" name="user_iduser" readonly="readonly">
              </div>   
              
                <button type="submit" class="pull-right btn btn-default" id="sendEmail">Save
                <i class="fa fa-save"></i></button>
               

              </form>
              <br>
             
                <div class="btn btn-default btn-file">
                  <i class="fa fa-paperclip"></i> Attachment
                  <input type="file" name="attachment">
                </div>
                <p class="help-block">Max. 32MB</p>
            </div>
            </div>
            <!-- /.box-header -->
            <br>
          <!-- /.box -->
          
      <!-- ./row -->
</div>