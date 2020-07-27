<?php   include "header.php" ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">About Kısmı</h1>
          </div>
        <div class="col-md-10">

<?php 

//aboout kısmından verileri çekme
$about = $db->prepare("SELECT * FROM about WHERE about_id =:id");
$about->execute(["id"=> 1]);
$row = $about->fetch(PDO::FETCH_OBJ);




?>


        <form action="" method="POST"> 
  <div class="form-group">
    <label for="exampleInputEmail1">About Başlığı</label>
    <input type="text" class="form-control" name="about_baslik" id="header_baslık" placeholder="<?php echo $row->about_baslik;   ?>" >
  </div>
   
  <div class="form-group">
    <label for="exampleFormControlTextarea1">About  Açıklaması</label>
    <textarea class="form-control" name="header_acıklama" id="exampleFormControlTextarea1" rows="3">
    <?php echo $row->about_aciklama; ?>

    </textarea>
    <div class="form-group">
    <label for="exampleInputEmail1">About Buton</label>
    <input type="text" class="form-control" name="header_buton" id="header_buton" placeholder="<?php echo $row->about_buton;   ?>" >
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Güncelle</button>
</form>


        </div>

        
          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     <?php include "footer.php" ?>