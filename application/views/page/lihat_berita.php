<div class="container" style="padding-right:6%;">
  <!-- quick email widget -->
          <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">CK Editor
                <small>Advanced and full of features</small>
              </h3>
              <form role="form" method="post" action="<?=base_url()?>user/data_edit_berita">
              <div class="box-body pad">
              
                <div class="form-group">
                <input class="form-control" placeholder="Judul:" name="judul" value="<?php echo $judul ?>"
              </div>
                    <textarea id="editor1" name="isi" rows="10" cols="80" >
                               
                               <?php echo $isi ?>             
                    </textarea>

                 <div class="form-group">
                <input class="form-control" value="<?php echo $user_iduser;?>" name="user_iduser" readonly="readonly">
              </div> 
              <div class="form-group">
                <input class="form-control" value="<?php echo $idberita;?>" name="idberita" readonly="readonly">
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
          
      
      <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">

              <table class="table table-tooltip" data-toogle="tooltip">
                <tr>
                  <th>ID History</th>
                  <th>Judul Berita</th>
                  <!--  <th>Creator</th> -->
                  <th>Editor</th>
                  <th>Time Edited</th>
                  <th> </th>
                </tr>
             <?php foreach ($result2 as $u_key){ ?>
                <tr>
                  <td><?php echo $u_key->idhistory_edit; ?></td>
                  <td title="<?php echo $u_key->isi?>"><?php echo $u_key->judul; ?></td>

                  <td><?php echo $u_key->Nama; ?></td>
                  <td><?php echo $u_key->time_edit; ?></td>

                </tr>
                
           <?php }?>
              </table>
            </div>
