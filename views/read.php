<?php
$folderPath = "txt-folder/";
$fileList = glob($folderPath . "*");
$fileContent = "";
if(isset($_POST["baca"])){
    $filePath = $folderPath . $_POST["namaFile"] . ".txt";

    if(file_exists($filePath)){
        $fileContent = file_get_contents($filePath);

        if(empty($fileContent)){
            $fileContent = "Isi file kosong";
        }
    } else {
        $fileContent = "File tidak ditemukan.";
    }
}

if(isset($_GET["file"])){
    $filePath = $folderPath . $_GET["file"];

    if(file_exists($filePath)){
        $_POST["namaFile"] = $_GET["file"];
        $fileContent = file_get_contents($filePath);

        if(empty($fileContent)){
            $fileContent = "Isi file kosong";
        }
    } else {
        $fileContent = "File tidak ditemukan.";
    }
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
          <div class="col-lg-6">
            <div class="card">
              <form action="read.php" method="post">
              <div class="card-body">
                <div class="form-group">
                    <label for="">Nama File</label>
                    <input type="text" class="form-control" name="namaFile" placeholder="Masukkan nama file (tanpa ekstensi .txt)">
                </div>
                <div class="form-group">
                    <label for="">Isi File</label>
                    <textarea name="isiFile" class="form-control" cols="30" rows="10" readonly><?= $fileContent ?></textarea>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn bg-pink" name="baca">Submit</button>
              </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card">

              <div class="card-body">
                <div class="card-header">
                  <h5 class="card-title">Daftar File</h5>
                </div>
                <div class="card-body">
                  <?php if (empty($fileList)) : ?>
                  <p>Tidak ada file.</p>
                  <?php else : ?>
                    <?php foreach ($fileList as $list) : ?>
                        <a href="read.php?file=<?= basename($list) ?>" class="btn bg-gradient-pink"><?= basename($list) ?></a>
                    <?php endforeach ; ?>
                  <?php endif ; ?>
                </div>
              </div>
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
