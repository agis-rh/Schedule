<!doctype html>
<html class="no-js">
  <head>
    <meta charset="UTF-8">
    <title>Program Jadwal Pelajaran SMKN 1 Lemahsugih</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/img/favicon/favicon.png">
    <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/main.min_1.css">
    <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="stylesheet" href="assets/lib/fullcalendar/fullcalendar.css">
    <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
    <script src="assets/lib/modernizr/modernizr.min.js"></script>
  </head>
  <body>
    <div id="wrap">
        <div id="top">
            <?php require_once ("application/template/part_top.php"); ?>
        </div><!-- /#top -->
        
        <div id="left">
            <?php require_once ("application/template/part_left.php"); ?>
        </div><!-- /#left -->
        <div id="content">
            <div class="outer">
                <div class="inner">
                    <div class="row">
              <div class="col-lg-12">
                    <div class="box">
                    <h3 class="text-primary">
                        &nbsp;&nbsp;&nbsp;&nbsp;&copy; Sistem Informasi Jadwal Pelajaran - <?php echo date("Y");?>
                    </h3>
                    </div>
              </div>
                    </div>
                </div>
            </div>
        </div><!-- /#content -->
        <div id="content">
            <div class="outer">
                <div class="inner">
                    <div class="row" style="display: none">
                        <div class="col-lg-8">
                          <div class="box">
                            <header>
                              <h5>Line Chart</h5>
                            </header>
                            <div class="body" id="trigo" style="height: 250px;"></div>
                          </div>
                        </div>
                    </div>
                    
                    <?php require_once ("system/konten-admin.php"); ?>
                    
                </div>
            </div>
        </div><!-- /#content -->
        <div id="right">
            <?php require_once ("application/template/part_right.php"); ?>
        </div><!-- /#right -->
    </div><!-- /#wrap -->
    <footer id="footer">
        <p>Copyright &copy; <?php echo date("Y"); ?>. All Rights Reserved - IBeESNay&trade;</p>
    </footer><!-- /#footer -->
    <!-- #helpModal -->
    <div id="helpModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Nama Program :</h4>
          </div>
          <div class="modal-body">
            <p>
            <h3>
                Program Aplikasi Jadwal Pelajaran
            </h3>
            
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup Info</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal --><!-- /#helpModal -->
    <script src="assets/lib/jquery/jquery.min.js"></script>
    <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/lib/screenfull/screenfull.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="assets/lib/fullcalendar/fullcalendar.js"></script>
    <script src="assets/lib/jquery.tablesorter/jquery.tablesorter.min.js"></script>
    <script src="assets/lib/jquery.sparkline/jquery.sparkline.min.js"></script>
    <script src="assets/lib/flot/jquery.flot.js"></script>
    <script src="assets/lib/flot/jquery.flot.selection.js"></script>
    <script src="assets/lib/flot/jquery.flot.resize.js"></script>
    <script src="assets/lib/plupload/plupload.full.min.js"></script>
    <script src="assets/lib/plupload/jquery.plupload.queue/jquery.plupload.queue.min.js"></script>
    <script src="assets/lib/jquery.gritter/js/jquery.gritter.min.js"></script>
    <script src="assets/lib/jquery.uniform/jquery.uniform.min.js"></script>
    <script src="assets/lib/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
    <script src="assets/lib/jquery-form/jquery.form.js"></script>
    <script src="assets/lib/formwizard/jquery.form.wizard.js"></script>
    <script src="assets/lib/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="assets/lib/jquery-validation/src/localization/messages_ja.js"></script>
    <script src="assets/lib/holderjs/holder.js"></script>
    <script>
      $(function() {
        dashboard();
      });
    function jam(){
        $.ajax({
            url: "system/jam_admin.php",
            cache: false,
            success: function(msg){
                $("#jam").html(msg);
            }
        });
            var waktu = setTimeout("jam()",1000);
        }
        $(document).ready(function(){
            $('.form-jadwal').hide();
            jam();
            $('#right-btn').click(function(){
                $('.text-menu').slideToggle();
                $('#waktu').slideToggle();
            });
            $('#top-btn').click(function(){
                $('.text-menu').slideToggle();
                $('#waktu').slideToggle();
            });
        });
    </script>
    <!-- Metis core scripts -->
    <script src="assets/js/main.js"></script>
  </body>
</html>