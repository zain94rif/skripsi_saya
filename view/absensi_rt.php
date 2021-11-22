<?php
// if(isset($_SESSION['SES_LOGIN'])) {
  // if ($_SESSION['SES_LEVEL']=="admin") {
    $kelas = $_GET['kelas'];
  ?>
    <!-- Custom fonts for this template-->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- Bootstrap core JavaScript-->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../assets/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../assets/js/demo/chart-area-demo.js"></script>
  <script src="../assets/js/demo/chart-pie-demo.js"></script>

  <!-- Page level plugins -->
  <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../assets/js/demo/datatables-demo.js"></script>
    <script src="../js/jquery.min.js" ></script>
    <script>
      $(document).ready(function(){
        var refreshId = setInterval(function(){
          $("#jj").load("../js/ubah.php?kelas=<?php echo $kelas?>");
        }, 3000);
      });
    </script>
  <div class="container-fluid">
		<br>
    <h1 class="h3 mb-2 text-gray-800">Absensi Real Time</h1>
    <br>
      <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Absensi</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive" id="jj">
              <!-- <table class="table table-bordered" id="jj" width="100%" cellspacing="0">
              </table> -->
            </div>
          </div>
        </div>
      </div>
<?php 
    //   }else{
    //   echo"<meta http-equiv='refresh' content='0; url=?Open=Ditolak'>";
    // }
// } else{
//   echo"<meta http-equiv='refresh' content='0; url=?Open=Login'>";
// }
?>