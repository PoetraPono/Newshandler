
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Jawa Pos Redaktur | News</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datepicker/datepicker3.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/skin-blue.min.css">
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Redaktur</b>LTE</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu" id="pesan">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning" id="notifikasi_count"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have   <span  id="notifikasi_count_2"></span> notifications</li>
              <li id="konten-info"style="padding:3px;overflow:auto;width:auto;height:200px;border:1px solid grey">
                 
               </li>
                   
               </li>
              </li>
              <li class="footer"><a href="<?=base_url()?>user/list_berita">View all</a></li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $user['Nama'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                 <?php echo $user['Nama'];?>
                  <small><?php echo $user['level'];?> <?php echo $user['kategori'];?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="<?php echo base_url('dashboard/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
              
            </ul>
            
          </li>
         
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
           <p><?php echo $user['Nama'];?></p>
          <!-- Status -->
         <small><?php echo $user['level'];?> <?php echo $user['kategori'];?></small>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="<?=base_url()?>dashboard"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-reorder"></i> <span>Task</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url()?>user/add_berita">Buat Berita</a></li>
            <li><a href="<?=base_url()?>user/list_berita">Daftar Berita</a></li>
           
            
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <!-- Page Header
        <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <?php
           $p = @$page;
            if(empty($p)){
              $this->load->view("home");
            } else {
              $this->load->view("page/$p");
          }
        ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2015 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

 <!--  -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.0 -->

<!-- Bootstrap 3.3.6 -->

<script src="<?=base_url()?>assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>assets/dist/js/demo.js"></script>
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?=base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- DataTables -->
<script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>


<!--  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script> -->
<script type="text/javascript">
var table, table_kategori, tbale_berita;
var save_method;
var GSCCModal;
  $(document).ready(function() {

    //Notifikasi
      cek();
       $("#pesan").click(function(){
        
        $("#info").toggle();
        //ajax untuk menampilkan pesan yang belum terbaca
        $.ajax({
            url: "<?php echo base_url('notifikasi/lihat_notifikasi'); ?>",
            cache: false,
            success: function(msg){
              
                $("#konten-info").html(msg);
                
            }
        });

    });
    $("#notif").click(function(){
    $.ajax({
        url: "<?php echo base_url('notifikasi/notif'); ?>",
        cache: false,
        success: function(status){
          var x=1;
           if($x=0){
            $('#loading').show();
             $x=1;
          }else{
            $('#loading').hide();
          }

        }
     });
  });
 

    //datatables
    table = $('#table').DataTable({ 

        "paging": true,
        "lengthChange": true,
        "searching": true,
        //"ordering": true,
        "info": true,
        "autoWidth": false, //Initial no order.
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [],
        
       // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('admin/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });

    table_kategori = $('#table_kategori').DataTable({ 

        "paging": true,
        "lengthChange": true,
        "searching": true,
        //"ordering": true,
        "info": true,
        "autoWidth": false, //Initial no order.
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [],//Initial no order.
        
       // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('admin/ajax_list_kategori')?>",

            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });
  $('#list_berita_pending').DataTable({
      columns: [
         // { width: '5%' },
         { width: '25%' },
         { width: '10%' },
         { width: '10%' },
         { width: '15%' },
         { width: '15%' },
         { width: '20%' }
      ]
      
   });

  $('#list_berita_approved').DataTable({
      columns: [
         // { width: '5%' },
         { width: '25%' },
         { width: '10%' },
         { width: '10%' },
         { width: '15%' },
         { width: '15%' },
         { width: '20%' }
      ]
      
   });

  $('#list_berita_rejected').DataTable({
      columns: [
         // { width: '5%' },
         { width: '25%' },
         { width: '10%' },
         { width: '10%' },
         { width: '15%' },
         { width: '15%' },
         { width: '20%' }
      ]
      
   });

  $('#list_berita_saved').DataTable({
      columns: [
         // { width: '5%' },
         { width: '25%' },
         { width: '10%' },
         { width: '10%' },
         { width: '15%' },
         { width: '15%' },
         { width: '20%' }
      ]
      
   });
   
   
   $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
         .columns.adjust();
   });   
    
    $('#tgl_awal').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });


//NOTIIIIIIIIIIIIIIIIIIF

   
   
  });


//end of document reDY



  function add_person()
  {
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#myModal').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
  }

  function edit_person(id)
  {
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('admin/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          
            $('[name="Nama"]').val(data.Nama);
            $('[name="username"]').val(data.username);
            $('[name="password"]').val(data.password);
            $('[name="level"]').val(data.level_idlevel);
            $('[name="kategori"]').val(data.kategori_idkategori);
            $('#myModal').modal('show'); // show bootstrap modal when complete loaded
            //$('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
  }

  function save()
  {
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('admin/ajax_add')?>";
    } else if (save_method == 'update') {
        url = "<?php echo site_url('admin/ajax_update/')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#myModal').modal('hide');
                reload_user();
                // setTimeout(  function(){
                //   table.ajax.reload();

                // },30000);
            
            
              }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
  }

  function reload_user()
  {
    table.ajax.reload(null,false); //reload datatable ajax 
    //table.api().ajax.reload();
    //table.reload();

  }

  function delete_person(id)
  {
    if(confirm('Are you sure delete this data?'))

        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('admin/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#myModal').modal('hide');
                reload_user();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }



  //----------------KATEGORI------------------//
  function add_kategori()
  {
    save_method = 'add';
    $('#formkategori')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#myModalKategori').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
  }

  function reload_kategori()
  {
    table_kategori.ajax.reload(null,false); //reload datatable ajax 
    //table.api().ajax.reload();
    //table.reload();

  }

  function save_kategori()
  {
    $('#btnSaveKategori').text('saving...'); //change button text
    $('#btnSaveKategori').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('admin/ajax_add_kategori')?>";
    } else {
        url = "<?php echo site_url('admin/ajax_update_kategori')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#formkategori').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#myModalKategori').modal('hide');
                reload_kategori();
                // setTimeout(function(){
                //   table_kategori.ajax.reload();
                // },30000);
            
          }

            $('#btnSaveKategori').text('save'); //change button text
            $('#btnSaveKategori').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSaveKategori').text('save'); //change button text
            $('#btnSaveKategori').attr('disabled',false); //set button enable 

        }
    });
  }

  function edit_kategori(id)
  {
    save_method = 'update';
    $('#formkategori')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('admin/ajax_edit_kategori/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          
            $('[name="kategori"]').val(data.kategori);
             $('[name="idkategori"]').val(data.idkategori);
            $('#myModalKategori').modal('show'); // show bootstrap modal when complete loaded
            //$('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
  }

  function delete_kategori(id)
  {
    if(confirm('Are you sure delete this data?'))

        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('admin/ajax_delete_kategori')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#myModalKategori').modal('hide');
                reload_kategori();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }


//----------------MODAL BERITA-----------------------------------//
function edit_isi_modal_berita(id)
  {
    //save_method = 'update';
    $('#formModalBerita')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('admin/ajax_edit_modal_berita/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          
            $('[name="idberita"]').val(data.idberita);
            //$('[name="isi"]').val(data.isi);
            $('#isi').html(data.isi);
            $('#myModalKategori').modal('show'); // show bootstrap modal when complete loaded
            //$('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
  }

  function hapus(){
    alert("Yakin akan menghapus berita ini?");
  }
//---------------------------------------------------------------Notifikasi-------------------------------------------------//
var x = 1;

function cek(){

    $.ajax({
        url: "<?php echo base_url('notifikasi/cek'); ?>",
        cache: false,
        success: function(msg){
            $('#notifikasi_count').html(msg);
            $('#notifikasi_count_2').html(msg);
           
        }
    });
    var waktu = setTimeout("cek()",3000);
}

</script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
   document.getElementById('download').addEventListener('click', function(e) {
      e.preventDefault();
      //convertImagesToBase64()
      // for demo purposes only we are using below workaround with getDoc() and manual
      // HTML string preparation instead of simple calling the .getContent(). Becasue
      // .getContent() returns HTML string of the original document and not a modified
      // one whereas getDoc() returns realtime document - exactly what we need.
     // var contentDocument = CKEDITOR.instance.editor1.getData();
      //var contentDocument = CKEDITOR.instances.editor1;
      //var content = '<!DOCTYPE html>' + contentDocument.documentElement.outerHTML;      
      
      var content = $("#download_file").text();
      var judul = $("#judul_view").text();
      //var judul = document.getElementById('judul_berita').style.textAlign = 'center';
      //var judul = $("#judul").text().style(align=center);
      //var y = document.getElementById('judul').style.align="center";
      
      //var x = document.title;
      //var judul1 = htmlDocx.asBlob('judul: '+judul, {orientation: orientation});
      var orientation = document.querySelector('portrait');
      
      //var orientation = document.querySelector('.page-orientation input:checked').value;
      //var orientation = document.getElementById('sendEmail').value;
      var cetak_judul = document.getElementById('judul_berita').value;
      var converted = htmlDocx.asBlob('<center><h3>'+judul+'</h3></center>' + '<style textAlign="center">'+content +'</style>' , {orientation: orientation});
      saveAs(converted, cetak_judul+'.rtf');

      var link = document.createElement('a');
      link.href = URL.createObjectURL(converted);
      link.download = 'document.rtf';
      link.appendChild(
        document.createTextNode('Click here if your download has not started automatically'));
      var downloadArea = document.getElementById('dowload-area');
      downloadArea.innerHTML = '';
      downloadArea.appendChild(link);
    });
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
