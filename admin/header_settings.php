<?php   include "header.php" ?>


<?php 
$header_settings = $db->prepare("SELECT * FROM header WHERE header_id=:id");
$header_settings->execute(["id" => 1]);
$row = $header_settings->fetch(PDO::FETCH_OBJ);








?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
           <div class="col-md-10"> 


           <form action="" method="POST"> 
  <div class="form-group">
    <label for="exampleInputEmail1">Header Başlığı</label>
    <input type="text" class="form-control" name="header_baslık" id="header_baslık" placeholder="<?php echo $row->header_baslık;   ?>" >
  </div>
   
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Header Açıklaması</label>
    <textarea class="form-control" name="header_acıklama" id="exampleFormControlTextarea1" rows="3">
    <?php echo $row->header_acıklama; ?>

    </textarea>
    <div class="form-group">
    <label for="exampleInputEmail1">Header Buton</label>
    <input type="text" class="form-control" name="header_buton" id="header_buton    " placeholder="<?php echo $row->header_buton;   ?>" >
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Güncelle</button>
</form>
 
           </div>

          


        
          
<?php // post the form güncellemede hat var

if($_POST){
    $update = $db->prepare("UPDATE header SET 
    header_baslık=:header_baslık,
    header_acıklama=:header_acıklama WHERE header_id=:id");
     $update->execute([
       "header_baslık" =>  $_POST["header_baslık"],
       "header_acıklama" => $_POST["header_acıklama"],
       "id" => 1
     ]);


     if($update){
         echo "basaırlı ";
        header("Refresh:2; url=header_settings.php");           
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