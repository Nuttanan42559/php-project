<?php
    session_start();

    if ($_SESSION['permission'] == 10) {
      header('Location: ../member.php');
    }

    if (!isset($_SESSION['user_id'])) {
      header('Location: ../index.php');
    }

    require '../_action/conndb.php';
    mysqli_set_charset($dbcon, "utf8");

    $news_detail = mysqli_query($dbcon,"SELECT * FROM news ORDER BY date_content ASC");
    $product_detail = mysqli_query($dbcon,"SELECT * FROM product");
    $product_details = mysqli_query($dbcon,"SELECT * FROM product");

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['insert_news_general']))
    {
          $news_string = $_POST['news_general'];

          $sql = "INSERT INTO news (data_content, type_content) VALUES ('$news_string','0')";

          $insert = mysqli_query($dbcon, $sql);

          header('Location: frm_backend.php');

          mysqli_close($dbcon);
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['insert_news_hot']))
    {
          $news_string = $_POST['news_hot'];

          $sql = "INSERT INTO news (data_content, type_content) VALUES ('$news_string','1')";

          $insert = mysqli_query($dbcon, $sql);

          header('Location: frm_backend.php');

          mysqli_close($dbcon);
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['insert_product']))
    {
          if (empty($_POST['img_in']))
          {
                $img = $_POST['img_out'];
          }
          else
          {
                $img = "http://localhost/stevemcshop/img/" . $_POST['img_in'] . ".png";
          }

          $name_product = $_POST['name_product'];
          $price = $_POST['price_product'];
          $amount = $_POST['amount_product'];
          $command = $_POST['comm'];

          $sql = "INSERT INTO product (name_product, img_product, command_product, price_product, amount) VALUES ('$name_product','$img','$command', '$price', '$amount')";


            $insert = mysqli_query($dbcon, $sql);

            header('Location: frm_backend.php');

            mysqli_close($dbcon);


    }
    // DELETE NEWS
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['delete_news']))
    {

          $news_string = $_POST['news_delete'];

          $sql = "DELETE FROM news WHERE date_content = $news_string";

          $delete = mysqli_query($dbcon, $sql);

          header('Location: frm_backend.php');

          mysqli_close($dbcon);
    }
    //delete product
    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['delete_product']))
    {

      $news_string = $_POST['product_delete'];

      $sql = "DELETE FROM product WHERE id_product = $news_string";

      $delete = mysqli_query($dbcon, $sql);

      header('Location: frm_backend.php');

      mysqli_close($dbcon);
    }







 ?>
 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>MEMBER : <?php echo $_SESSION['user_id']; ?></title>

   <link rel="stylesheet" href="../css/bootstrap.min.css">
   <link rel="stylesheet" href="../css/steve.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">
   <script src="../dist/sweetalert.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="../js/alert.js"></script>
   <style>
     .navbar {
         margin-bottom: 0;
         border-radius: 0;
     }
   </style>

 </head>
 <body style="background-color: #CCD1D9">
     <div class="container">
       <div class="row">
         <center><h1>SteveMcShop SystemBackend</h1></center>
         <div class="col-sm-6 col-md-push-6">
             <div class="panel panel-warning">
                <div class="panel panel-heading">Detail : ข่าวสาร</div>
                <div class="panel panel-body">
                   <form method="post">
                      <?php
                          if ($news_detail->num_rows > 0) {
                              while ($news_row = $news_detail->fetch_assoc()) {
                                if ($news_row['type_content'] == 1)
                                {
                                   echo "<a class='list-group-item'>" . 'ข่าวที่ ' . $news_row['date_content'] . '  ' . "<span class='label label-danger label-xs'>ข่าวด่วน</span> " . $news_row['data_content'] . "</a>";
                                }
                                else if($news_row['type_content'] == 0)
                                {
                                   echo "<a class='list-group-item'>" . 'ข่าวที่ ' . $news_row['date_content'] . '  ' . "<span class='label label-success label-xs'>ข่าวทั่วไป</span> " . $news_row['data_content'] . "</a>";
                                }
                              }
                          }




                       ?>


                   </form>


                </div>
             </div>
             <div class="panel panel-info">
                <div class="panel panel-heading">Detail : สินค้า</div>
                <div class="panel panel-body">

                        <?php
                              if ($product_detail->num_rows > 0)
                              {
                                  while ($product_row = $product_detail->fetch_assoc())
                                  {

                                    echo "<div class='col-sm-6'>";
                                    echo "<a href='' class='list-group-item'>";
                                    echo "<center><img src=" . $product_row['img_product'] . " height='200' width='200'></center>";
                                    echo "<br>";
                                    echo "<font size='5' class='list-group-item-heading'>" . $product_row['name_product'] . "</font>";
                                    echo "<br>";
                                    echo "<font size='3' class='list-group-item-heading'>สินค้าที่ " . $product_row['id_product'] . "</font>";
                                    echo "<a href='_delete_product.php?product=" . $product_row['id_product'] . "'><button class='btn btn-danger'>ลบสินค้า</button></a>";
                                    
                                    echo "</a>";
                                    echo "</div><br>";





                                  }
                              }
                              else {
                                 echo "Not found Product!";
                              }






                         ?>

                </div>
             </div>
         </div>
         <div class="col-sm-6 col-md-pull-6">
             <div class="panel panel-warning">
                <div class="panel panel-heading">ข่าวสาร</div>
                <div class="panel panel-body">
                   <form method="post">

                      <a class='list-group-item'><span class='label label-success label-xs'>ข่าวทั่วไป</span><input name="news_general" class="form-control text-center" type="text"></input>
                       <br><center><input type="submit" name="insert_news_general" class="btn btn-success" value="เพิ่มข่าว"/></center>
                      </a>
                      <br>
                      <a class='list-group-item'><span class='label label-danger label-xs'>ข่าวด่วน</span><input name="news_hot" class="form-control text-center" type="text">
                       <br><center><input type="submit" name="insert_news_hot" class="btn btn-danger" value="เพิ่มข่าว"/></center>
                      </a>
                      <br>
                      <a class='list-group-item'><span class='label label-warning label-xs'>ลบข่าว</span><input name="news_delete" class="form-control text-center" type="text" placeholder="ใส่เลขที่ข่าว">
                       <br><center><input type="submit" name="delete_news" class="btn btn-warning" value="ลบข่าว"/></center>
                      </a>

                   </form>


                </div>
             </div>
             <div class="panel panel-info">
                <div class="panel panel-heading">สินค้า</div>
                <div class="panel panel-body">
                   <form method="post">
                     <div class="input-group">
                       <span class="input-group-addon">https://localhost/img/</span>
                       <input type="text" name="img_in" class="form-control text-center" placeholder="ชื่อรูป">
                       <span class="input-group-addon"form-control>.png</span>
                     </div>
                     <br>
                     <input class="form-control" type="text" name="img_out" placeholder="กรณีเอารูปมาจากที่อื่น ใส่ URL">
                        <br>
                        <input class="form-control text-center" type="text" name="name_product" placeholder="ชื่อสินค้า">
                        <br>
                        <input class="form-control text-center" type="text" name="price_product" placeholder="ราคาสินค้า">
                        <br>
                        <input class="form-control text-center" type="text" name="amount_product" placeholder="จำนวนสินค้า">
                        <br>
                        <input class="form-control" type="text" name="comm" placeholder="ใส่คำสั่ง | ใช้ <player> แทน player">
                       <br>
                       <br>
                       <center><button class="btn btn-primary" name="insert_product">เพิ่มสินด้า</button></center>
                       <hr>

                   </form>
                </div>
             </div>
         </div>

       </div>
     </div>
 </body>
 </html>
