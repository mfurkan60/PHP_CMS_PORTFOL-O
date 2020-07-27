<?php   include "header.php" ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Portfolio Kısmı</h1>
          </div>
        <div class="col-md-10">

<?php 

//aboout kısmından verileri çekme
$portfolioDelay = $db->prepare("SELECT * FROM portfolio WHERE portfolio_id=:getid");
$portfolioDelay->execute(["getid"=> $_GET["id"] ]);
$row = $portfolioDelay->fetch(PDO::FETCH_OBJ);




?>


        <form action="" method="POST"> 
  <div class="form-group">
    <label for="exampleInputEmail1">PortFolio Başlığı</label>
    <input type="text" class="form-control" name="portfolio_baslik" id="portfolio_baslik" placeholder="<?php echo $row->portfolio_baslik;   ?>" >
  </div>
   
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Portfolio  Kategori</label>
    <textarea class="form-control" name="portfolio_kategory" id="portfolio_kategory" rows="3">
    <?php echo $row->portfolio_kategory; ?>

    </textarea>

    

  
    <div class="form-group">
    <h3>Güncel Resim</h3>
    <img src="../upload/<?php echo $row->protlolio_resim ?>" class="img-fluid" alt="">


    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Portfolio Resim Güncelle</label>
    <input type="file" class="form-control" name="header_buton" id="header_buton" placeholder="<?php echo $row->protlolio_resim;   ?>" >
  </div>

  </div>
  <button type="submit" class="btn btn-primary">Güncelle</button>
</form>


        </div>

        
          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php 

//update datas


if($_POST){
  $update_datas= $db->prepare("UPDATE portfolio  SET portfolio_kategory=:portfolio_kategory,
  portfolio_baslik=:portfolio_baslik WHERE portfolio_id=:id" );
$update_datas->execute(["portfolio_kategory" => $_POST["portfolio_kategory"],
                "portfolio_baslik" => $_POST["portfolio_baslik"],
                "id"=> $_GET["id"]
]);

if($update_datas){ 
  header("Refresh:2; url=portfolio.php");  
  ?>
<div class="alert alert-primary" role="alert">
  Güncelleme Başarılı oldu
</div>

<?php     } 
else{   ?>
<div class="alert alert-danger" role="alert">
  Güncelleme Başarısız
</div>

<?php    }
}



?>

 
        
     <?php include "footer.php" ?>