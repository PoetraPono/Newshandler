<div class="container">
  <h1>Tambah Kategori</h1>
  <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <!-- /.box-header -->
            <form  role="form" method="post" action="<?=base_url()?>admin/add_data_kategori">
                <!-- text input -->
                <div class="form-group, col-md-8">
                  <label>Nama Kategori</label>
                  <input type="text" name="kategori" class="form-control" placeholder="NamaKat">
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