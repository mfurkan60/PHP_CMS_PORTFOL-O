<?php   include "header.php" ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Yeni Portfolio Ekle</h1>
          </div>
        <div class="col-md-10">

<?php 

//Contact kısmından verileri çekme
$contact = $db->prepare("SELECT * FROM contact ");
$contact->execute();
$row = $contact->fetch(PDO::FETCH_OBJ);




?>


        <form action="" method="POST"> 
  <div class="form-group">
    <label for="exampleInputEmail1">contact Başlığı</label>
    <input type="text" class="form-control" name="about_baslik" id="header_baslık" placeholder="<?php echo $row->contact_baslik;  ?>" >
  </div>
   
  

    <div class="form-group">
    <label for="exampleInputEmail1">Contact Açıklama</label>
    <input type="text" class="form-control" name="header_buton" id="header_buton" placeholder="<?php echo $row->contact_aciklama; ?>" >
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Contact Eposta</label>
    <input type="text" class="form-control" name="header_buton" id="header_buton" placeholder="<?php echo $row->contact_eposta;  ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Contact No</label>
    <input type="text" class="form-control" name="header_buton" id="header_buton" placeholder="<?php echo $row->contact_no;  ?>">
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