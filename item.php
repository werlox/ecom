<?php
require_once "nci/session.php"; 
require_once "nci/dbc.php";
require_once "nci/func.php";
$set = 0;

if (isset($_GET['id'])) {
$set = 1;
$iid = $_GET['id'];
$item_sql = mysql_query("select * from items where itm_id = '$iid'");
$item = mysql_fetch_array($item_sql);
}
else{
header('Location: listing.php');
}

  

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $item['itm_name']; ?></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet">
    <link href="css/skin-1.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.min.css">
    <!--<link href="ion.checkRadio-1.1.0/css/ion.checkRadio.css" rel="stylesheet"> -->
    <!--<link href="ion.checkRadio-1.1.0/css/ion.checkRadio.cloudy.css" rel="stylesheet"> -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php include "navbar.php"; ?>


  
</div>
    <div class="container main-container headerOffset">


      <div class="row">
        <div class="breadcrumbDiv col-lg-12">
          <ul class="breadcrumb">
            <li> <a href="index.html">Home</a> </li>
            <li> <a href="category-layout.html">MEN COLLECTION</a> </li>
            <li> <a href="sub-category-layout.html">TSHIRT</a> </li>
            <li class="active">Lorem ipsum dolor sit amet </li>
          </ul>
        </div>
      </div>
      <div class="row"> 
  
    <div class="container">
<div class="row transitionfx">
  
   <!-- left column -->
    <div class="col-lg-6 col-md-6 col-sm-6">
      <!-- product Image and Zoom -->

    <div class="main-image sp-wrap col-lg-12 no-padding style2 style2look2" style="display: inline-block;"> 
         
        
         
      <div class="sp-large" style="overflow: hidden; height: auto;">	  
		  <a href="images/zoom/zoom3hi.jpg" class="">
		  <img src="images/zoom/zoom3.jpg" class="img-responsive" alt="img">
	  </a></div>
	  <div class="sp-thumbs sp-tb-active">
	  <a href="images/zoom/zoom1.jpg" class=""><img src="images/zoom/zoom1.jpg" class="img-responsive" alt="img"></a>
	  <a href="images/zoom/zoom2.jpg" class=""><img src="images/zoom/zoom2.jpg" class="img-responsive" alt="img"></a>
	  <a href="images/zoom/zoom3.jpg" class="sp-current"><img src="images/zoom/zoom3.jpg" class="img-responsive" alt="img"></a></div></div>
    </div><!--/ left column end -->
    
    
    <!-- right column -->
    <div class="col-lg-6 col-md-6 col-sm-5">
    
      <h1 class="product-title"> <?php echo $item['itm_name']; ?></h1>
      <h3 class="product-code">Product ID : <?php echo $item['itm_id']; ?></h3>
      <div class="product-price"> 
          <?php if($item['itm_dis'] <> 0) { 
            $np = $item['itm_price']-($item['itm_price']*$item['itm_dis']/100);
            echo "<span class='price-sales'> $".$np."</span>";?>
          <span class="price-standard">$<?php echo $item['itm_price']; ?></span>
          <?php }
          else {echo "<span class='price-sales'> $".$item['itm_price']."</span>"; }?> 
      </div>

      <div class="details-description">
        <p><?php echo $item['itm_des']; ?> </p>
      </div>
      


      <div class="color-details"> <span class="selected-color"><strong>PACKAGING</strong></span>
        <ul class="swatches pack">
        <?php
          $p_sql= mysql_query("select * from package");
          while($pac = mysql_fetch_array($p_sql)){ ?>
          <li> 
              <div class="packimg">
                  <img src="images/package/<?php echo $pac['pk_img']; ?>" alt="package" style="width:100px;">
              </div>
              <div class="packtitle"><?php echo $pac['pk_name']; ?></div>
              <div><?php echo $pac['pk_des']; ?></div>
              <div class="price">Price:<?php echo $pac['pk_price']; ?></div>
              <input name="one" class="chb" id="chb1" type="radio" />
            <?php } ?>
          </li>



        </ul>
      </div>
      <!--/.color-details-->
      
      <div class="productFilter productFilterLook2">
        <div class="filterBox">
          <select>
            <option value="strawberries" selected="">Quantity</option>
            <option value="mango">1</option>
            <option value="bananas">2</option>
            <option value="watermelon">3</option>
            <option value="grapes">4</option>
            <option value="oranges">5</option>
            <option value="pineapple">6</option>
            <option value="peaches">7</option>
            <option value="cherries">8</option>
          </select>
        </div>
      </div>
      <!-- productFilter -->
      <div class="cart-actions">
        <div class="addto">
          <button class="button btn-cart cart first" title="Add to Cart" type="button">Add to Cart</button>
          </div>
            <h3 class="incaps"><i class="fa fa fa-check-circle-o color-in"></i> In stock</h3>
            <h3 style="display:none" class="incaps"><i class="fa fa-minus-circle color-out"></i> Out of stock</h3>
          </div>
        
      <!--/.cart-actions-->
      
      <div class="clear"></div>
      
      <div class="product-tab w100 clearfix">
      
        <ul class="nav nav-tabs">
          <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
          <li> <a href="#shipping" data-toggle="tab">Shipping</a></li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="details"><?php echo $item['itm_des_long']; ?><br></div>
                   
          <div class="tab-pane" id="shipping">
            <table border = 1 width = 200>
              <colgroup>
              <col style="width:33%">
              <col style="width:33%">
              <col style="width:33%">
              </colgroup>
              <tbody>
                <tr>
                  <td>Type</td>
                  <td>Days</td>
                  <td>Des</td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td>Free</td>
                  <td>1</td>
                  <td>new</td>
                </tr>
              </tfoot>
            </table>
          </div>
          
        </div> <!-- /.tab content -->
        
      </div><!--/.product-tab-->
      
      <div style="clear:both"></div>
      
      <div class="product-share clearfix">
        <p> SHARE </p>
        <div class="socialIcon"> 
          <a href="#"> <i class="fa fa-facebook"></i></a> 
            <a href="#"> <i class="fa fa-twitter"></i></a> 
            <a href="#"> <i class="fa fa-google-plus"></i></a> 
            <a href="#"> <i class="fa fa-pinterest"></i></a> </div>
      </div>
      <!--/.product-share--> 
      
    </div><!--/ right column end -->
    
  </div><!--/.row-->

      </div>
      </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
            <!-- include carousel slider plugin  -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/script.js"></script>
    <!-- include smoothproducts // product zoom plugin  --> 
    <script type="text/javascript" src="js/smoothproducts.min.js"></script>
  <!--  <script>
    $("#SimilarProductSlider").owlCarousel({
        navigation: true

    });
    </script>-->
  </body>
</html>