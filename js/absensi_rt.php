<?php
// if(isset($_SESSION['SES_LOGIN'])) {
  // if ($_SESSION['SES_LEVEL']=="admin") {
    $kelas = $_GET['kelas'];
  ?>
    <script src="js/jquery.min.js" ></script>
    <script>
      $(document).ready(function(){
        var refreshId = setInterval(function(){
          $("#jj").load("js/ubah.php?kelas=<?php echo $kelas?>");
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