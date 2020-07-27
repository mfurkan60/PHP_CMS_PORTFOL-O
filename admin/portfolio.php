<?php   include "header.php" ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Yeni Portfolio Ekle</h1>
          </div>
        <div class="col-md-10">

<?php 

//aboout kısmından verileri çekme
$portfolio = $db->prepare("SELECT * FROM portfolio ");
$portfolio->execute();
$row = $portfolio->fetchAll(PDO::FETCH_OBJ);




?>


        <form action="" method="POST"> 
  <div class="form-group">
    <label for="exampleInputEmail1">PortFolio Başlığı</label>
    <input type="text" class="form-control" name="about_baslik" id="header_baslık"  >
  </div>
   
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Portfolio  Açıklaması</label>
    <textarea class="form-control" name="header_acıklama" id="exampleFormControlTextarea1" rows="3">
    

    </textarea>

    <div class="form-group">
    <label for="exampleInputEmail1">PortFolio KAtegori</label>
    <input type="text" class="form-control" name="header_buton" id="header_buton" >
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">PortFolio REsim</label>
    <input type="file" class="form-control" name="header_buton" id="header_buton" >
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Ekle</button>
</form>


        </div>

        
          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->



      <div class="col-md-12 mt-5">
      <div class="card">
      <div class="card-header">
        <h3>Portfolio</h3>
      </div>
      <div class="card-body">
        <table class="table table-striped">
    <thead>
        <th>İd</th>
      <th>Başlık</th>
      <th>Kategori</th>
      <th>İşlem</th>
    </thead>
    <tbody>
    <?php foreach($row as $portfolio_row){?>
      <tr>
        <td><?= $portfolio_row->portfolio_id ?></td>
        <td><?= $portfolio_row->portfolio_baslik ?></td>
        <td><?= $portfolio_row->portfolio_kategory ?></td>
        <td>
          <a href="?sil=<?php echo $portfolio_row->portfolio_id?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
          <a href="guncelle.php?id=<?php echo $portfolio_row->portfolio_id?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
        </td>
      
      
      
      
      </tr>
    <?php       }     ?>

    </tbody>

        </table>
         
        </div>
    
    </div>

       
      </div>
        <?php
        //Sİlme işlemi
        if(@$_GET["sil"]){
          $delete_portfolio = $db->prepare("DELETE FROM portfolio WHERE portfolio_id=:id");
          $delete_portfolio->execute(["id" => $_GET["sil"]]);



          //kontorl:
          if($delete_portfolio){
            ?>  <div class="alert alert-primary" role="alert">
            Silme işlemi başılı bir şekilde gerçekleşti
          </div> 
          <?php
            header("Refresh:2; url=portfolio.php");   
          }else{ ?>
              <div class="alert alert-danger" role="alert">
        Bir hata oluştu!
          </div>
          <?php header("Refresh:4, url=portfolio.php");     }
        }



        // verileri düzenleme işlemi
        
        
        ?>
     <?php include "footer.php" ?>