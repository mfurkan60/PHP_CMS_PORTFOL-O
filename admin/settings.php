<?php   include "header.php" ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ayarlar Sayfasındasınız</h1>
          </div>
<hr>
          <div class="row">


<?php //
//genel ayarları çekme
$settings= $db->prepare("SELECT * FROM admin_ayar WHERE  admin_id=:id"); 
$settings->execute(["id"  => 1 ]);
$row = $settings->fetch(PDO::FETCH_OBJ);


?>


      <div class="col-md-12"> 
      <div class="box-body">
  
    
    
    



      <form action="" method="POST"> 
  <div class="form-group">
    <label for="exampleInputEmail1">Site Başlığı</label>
    <input type="text" class="form-control" name="site_baslik" id="site_baslik" placeholder="<?php echo $row->site_baslik;   ?>" >
  </div>
   
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Site Açıklaması</label>
    <textarea class="form-control" name="site_aciklama" id="exampleFormControlTextarea1" rows="3">
    <?php echo $row->site_aciklama; ?>

    </textarea>
  </div>
  <button type="submit" class="btn btn-primary">Güncelle</button>
</form>
      
      </div>
      
      </div>
</div>
        
          <?php 
          
          //güncelleme kısmı
          if($_POST){
            $update = $db->prepare("UPDATE admin_ayar SET 
            site_baslik=:site_baslik,
            site_aciklama=:site_aciklama WHERE admin_id=:id
             ");
             $update->execute([
               "site_baslik" =>  $_POST["site_baslik"],
               "site_aciklama" => $_POST["site_aciklama"],
               "id" => 1
             ]);


             if($update){
              header("Refresh:2; url=anasayfa.php");           
            }
            else{
                echo("bir hata oluştu");
              }
          }
          
          
          ?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     <?php include "footer.php" ?>