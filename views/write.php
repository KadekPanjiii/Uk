<?php
$folderPath = "txt-folder/";
$fileList = glob($folderPath . "*");

if(isset($_POST["buat"])){
  $fileName = $_POST["namaFile"] . ".txt";

  //TODO Membuat folder jika belum ada
  if(!is_dir($folderPath)){
    mkdir($folderPath, 0777, true);
  }

  $filePath = $folderPath . $fileName;

  if(file_exists($filePath)){
    echo "<script> alert('File dengan nama tersebut sudah ada. Pilih nama file lain.') </script>";
  } else {
    $txt = $_POST["isiFile"];
    $file = fopen($filePath, "w") or die ("Tidak bisa membuka file!");

    if($file){
      fwrite($file, $txt);
      fclose($file);

      echo "<script> alert('Teks berhasil ditulis ke dalam file $folderPath') </script>";
    }
  }
  header("Refresh: 0");
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
              <form action="" method="post">
              <div class="card-body">
                <div class="form-group">
                    <label for="">Nama File</label>
                    <input type="text" class="form-control" name="namaFile" placeholder="Masukkan nama file (tanpa ekstensi .txt)">
                </div>
                <div class="form-group">
                    <label for="">Isi File</label>
                    <textarea name="isiFile" class="form-control" cols="30" rows="10"></textarea>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn bg-pink" name="buat">Submit</button>
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

</body>
</html>
