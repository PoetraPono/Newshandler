<style type="text/css">
div.container
{
   display: none
}
</style>

<div id="container" class="container">
  <!-- quick email widget -->
          <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Preview Download</h3>
              <form role="form" method="post" action="<?=base_url()?>data_edit_berita">
              <div class="box-body pad">
              
              <div class="form-group">
                <div id='judul_berita' style='display:none'><?php echo ($judul) ?> </div>
                <div id='judul_view' align="center"><h3><?php echo $judul ?> </h3> </div>
                <div id='judul' style='display:none'><?php echo ($judul) ?>  </div>
              </div>               
              <div class="form-group">                    
                    <div id='download_file_view'><?php echo $isi ?>  </div>
                    <div id='download_file' style='display:none'><?php echo htmlentities($isi) ?></div>
                    <script type="text/javascript">
                    //   var a = $("#tes").text();
                    //   console.log(a+"");
                    //   alert(a+'');
                    //   </script>
              </div>            
                <button type="submit" class="pull-right btn btn-default" id="download">Download<i class="fa fa-download"></i></button>                
              </form>
              <br>
                           
            </div>
            <!-- /.box-header -->
            <br>
          <!-- /.box -->
          
      
      <!-- /.box-header -->
            
              </table>
            </div>

<script type="text/javascript">

$(document).ready(function(){
  window.location.assign("<?=base_url()?>user/list_berita");      
  download();
  //setTimeout(function(){window.history.back()}, -1000);
  //$("div#container").removeClass("container");
  //window.stop();  
});
function download(){
      //alert("faaf");      
      var content = $("#download_file").text();
      var judul = $("#judul_view").text();
      var cetak_judul = $("#judul_berita").text();

      //var judul = document.getElementById('judul_berita').style.textAlign = 'center';
      //var judul = $("#judul").text().style(align=center);
      //var y = document.getElementById('judul').style.align="center";

      //var x = document.title;
      //var judul1 = htmlDocx.asBlob('judul: '+judul, {orientation: orientation});
      var orientation = document.querySelector('portrait');
      
      //var orientation = document.querySelector('.page-orientation input:checked').value;
      //var orientation = document.getElementById('sendEmail').value;
      //var cetak_judul = document.getElementById('judul_berita').value;
      var converted = htmlDocx.asBlob('<center><h3>'+judul+'</h3></center>' + content, {orientation: orientation});
      saveAs(converted, cetak_judul+'.rtf');
      //window.history.back();
}
  //  download();
</script>
