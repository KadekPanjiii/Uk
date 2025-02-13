<?php
$inputAngka = "";
$isi = "";

if(isset($_POST["urut"])){
    $inputAngka = $_POST["angka"];
    $angka = array_map("intval", explode(" ", $inputAngka));

    function bubub_sort($angka){
        $n = count($angka);
        for($i = 0; $i < $n; $i++){
            for($j = $n -1; $j > $i; $j--){
                if($_POST["tipe"] == "asc" && $angka[$j] < $angka[$j - 1] || ($_POST["tipe"] == "desc" && $angka[$j] > $angka[$j - 1])){
                    $dummy = $angka[$j];
                    $angka[$j] = $angka[$j - 1];
                    $angka[$j - 1] = $dummy;
                }
            }
        }
        return $angka;
    }

    $sort = bubub_sort($angka);
    $isi = implode(", ", $sort);
}

if(empty($inputAngka)){
    $isi = "Tidak ada angka yang diurutkan.";
}
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<?php include("../includes/header.php") ?>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <?php include("../includes/navbar.php") ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include("../includes/sidebar.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Home</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Views</a></li>
              <li class="breadcrumb-item active">Home</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
            <div class="card">
              <form action="" method="post">
              <div class="card-body">
                <div class="form-group">
                    <label for="">Angka</label>
                    <input type="text" class="form-control" name="angka" placeholder="Masukkan angka acak (pisahkan dengan spasi)" value="<?= $inputAngka ?>">
                </div>
                <div class="form-group">
                    <label for="">Isi File</label>
                    <select name="tipe" id="" class="form-control">
                        <option value="asc" <?= (isset($_POST["tipe"]) && ($_POST["tipe"]) == "asc" ? "selected" : "") ?>>Ascending</option>
                        <option value="desc" <?= (isset($_POST["tipe"]) && ($_POST["tipe"]) == "desc" ? "selected" : "") ?>>Descending</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Angka Setelah Diurutkan</label>
                    <input type="text" class="form-control" readonly value="<?= $isi ?>">
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn bg-pink" name="urut">Submit</button>
              </div>
              </form>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<?php include("../includes/footer.php") ?>

<script>
    if(window.history.replaceState){
        window.history.replaceState(null, null, window.location.href)
    }
</script>

</body>
</html>
