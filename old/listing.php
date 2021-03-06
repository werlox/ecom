<!DOCTYPE html>
<?php
require_once "nci/session.php"; 
require_once "nci/dbc.php";
require_once "nci/func.php";


?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listings</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="row"> 
      
      <!--left column-->
      
      <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="panel-group" id="accordionNo"> 
          <!--Category-->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"> <a data-toggle="collapse" href="#collapseCategory" class="collapseWill"> <span class="pull-left"> <i class="fa fa-caret-right"></i></span> Category </a> </h4>
            </div>
            <div id="collapseCategory" class="panel-collapse collapse in">
              <div class="panel-body">
                <ul class="nav nav-pills nav-stacked tree">
                <?php  category_tree(); ?>
                  
                  <li class="active dropdown-tree open-tree"> <a class="dropdown-tree-a"> <span class="badge pull-right">42</span> WOMEN COLLECTION </a>
                    <ul class="category-level-2 dropdown-menu-tree">
                      <li class="dropdown-tree"> <a class="dropdown-tree-a" href="sub-category.html"> Tshirt</a> </li>
                      <li> <a> Shoes</a> </li>
                      <li> <a> Shirt</a> </li>
                      <li> <a>T shirt</a> </li>
                      <li> <a href="sub-category.html"> Shirt</a> </li>
                      <li> <a href="sub-category.html">Fragrances</a> </li>
                      <li> <a href="sub-category.html">Scarf</a> </li>
                      <li> <a href="sub-category.html">Sandal</a> </li>
                      <li> <a href="sub-category.html">Underwear</a> </li>
                      <li> <a href="sub-category.html">Winter Collection</a> </li>
                      <li> <a href="sub-category.html">Men Accessories</a> </li>
                    </ul>
                  </li>
                  <li> <a href="#"> <span class="badge pull-right">42</span> MEN COLLECTION </a> </li>
                  <li> <a href="#"> <span class="badge pull-right">42</span> Baby &amp; Kids </a> </li>
                  <li> <a href="#"> <span class="badge pull-right">42</span> Home &amp; Kitchen </a> </li>
                  <li> <a href="#"> <span class="badge pull-right">42</span> Baby &amp; Kids </a> </li>
                  <li> <a href="#"> <span class="badge pull-right">42</span> More Stores </a> </li>
                  <li> <a href="#"> <span class="badge pull-right">42</span> Offers Zone </a> </li>
                </ul>
              </div>
            </div>
          </div>
          <!--/Category menu end-->
          
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"> <a class="collapseWill" data-toggle="collapse" href="#collapsePrice"> Price <span class="pull-left"> <i class="fa fa-caret-right"></i></span> </a> <span class="pull-right clearFilter  label-danger"> Clear </span> </h4>
            </div>
            <div id="collapsePrice" class="panel-collapse collapse in">
              <div class="panel-body priceFilterBody"> 
                <!-- -->
                <label style="display: none;">
                  <input type="radio" name="agree" value="0" style="display: none;">
                  100$ - 500$</label><span class="icr enabled" id="icr-3"><span class="icr__radio"></span><span class="icr__text">100$ - 500$</span></span>
                <br>
                <label style="display: none;">
                  <input type="radio" name="agree" value="1" style="display: none;">
                  500$ - 1000$</label><span class="icr enabled" id="icr-4"><span class="icr__radio"></span><span class="icr__text">500$ - 1000$</span></span>
                <br>
                <label style="display: none;">
                  <input type="radio" name="agree" value="2" style="display: none;">
                  1000$ - 1500$</label><span class="icr enabled" id="icr-5"><span class="icr__radio"></span><span class="icr__text">1000$ - 1500$</span></span>
                <br>
                <label style="display: none;">
                  <input type="radio" name="agree" value="3" style="display: none;">
                  1500$ - 2000$</label><span class="icr enabled" id="icr-6"><span class="icr__radio"></span><span class="icr__text">1500$ - 2000$</span></span>
                <br>
                <label style="display: none;">
                  <input type="radio" name="agree" value="4" style="display: none;">
                  2000$ - 2500$</label><span class="icr enabled" id="icr-7"><span class="icr__radio"></span><span class="icr__text">2000$ - 2500$</span></span>
                <br>
                <label style="display: none;">
                  <input type="radio" name="agree" value="5" style="display: none;">
                  2500$ - 3000$</label><span class="icr enabled" id="icr-8"><span class="icr__radio"></span><span class="icr__text">2500$ - 3000$</span></span>
                <br>
                <label style="display: none;">
                  <input type="radio" name="agree" value="6" disabled="" checked="" style="display: none;">
                  Don't know</label><span class="icr disabled checked" id="icr-9"><span class="icr__radio"></span><span class="icr__text">Don't know</span></span>
                <hr>
                <p>Enter a Price range </p>
                <form class="form-inline " role="form">
                  <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail2" placeholder="2000 $">
                  </div>
                  <div class="form-group sp"> - </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputPassword2" placeholder="3000 $">
                  </div>
                  <button type="submit" class="btn btn-default pull-right">check</button>
                </form>
              </div>
            </div>
          </div>
          <!--/price panel end-->
          
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"> <a data-toggle="collapse" href="#collapseBrand" class="collapseWill"> Brand <span class="pull-left"> <i class="fa fa-caret-right"></i></span> </a> </h4>
            </div>
            <div id="collapseBrand" class="panel-collapse collapse in">
              <div class="panel-body smoothscroll maxheight300 mCustomScrollbar _mCS_3" style="overflow: hidden;"><div class="mCustomScrollBox mCS-dark-2" id="mCSB_3" style="position: relative; height: 100%; overflow: hidden; max-width: 100%; max-height: 300px;"><div class="mCSB_container" style="position: relative; top: 0px;">
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="0" style="display: none;">
                    Armani </label><span class="icr enabled" id="icr-10"><span class="icr__checkbox"></span><span class="icr__text">Armani</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="1" style="display: none;">
                    Gucci </label><span class="icr enabled" id="icr-11"><span class="icr__checkbox"></span><span class="icr__text">Gucci</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="2" style="display: none;">
                    Louis Vuitton </label><span class="icr enabled" id="icr-12"><span class="icr__checkbox"></span><span class="icr__text">Louis Vuitton</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    Chanel </label><span class="icr enabled" id="icr-13"><span class="icr__checkbox"></span><span class="icr__text">Chanel</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    Roberto Cavalli </label><span class="icr enabled" id="icr-14"><span class="icr__checkbox"></span><span class="icr__text">Roberto Cavalli</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    Valentino </label><span class="icr enabled" id="icr-15"><span class="icr__checkbox"></span><span class="icr__text">Valentino</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    Ralph Lauren </label><span class="icr enabled" id="icr-16"><span class="icr__checkbox"></span><span class="icr__text">Ralph Lauren</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    Miu Miu </label><span class="icr enabled" id="icr-17"><span class="icr__checkbox"></span><span class="icr__text">Miu Miu</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    McQueen </label><span class="icr enabled" id="icr-18"><span class="icr__checkbox"></span><span class="icr__text">McQueen</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    adidas </label><span class="icr enabled" id="icr-19"><span class="icr__checkbox"></span><span class="icr__text">adidas</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    Nike </label><span class="icr enabled" id="icr-20"><span class="icr__checkbox"></span><span class="icr__text">Nike</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    Jimmy Choo </label><span class="icr enabled" id="icr-21"><span class="icr__checkbox"></span><span class="icr__text">Jimmy Choo</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    Bottega Veneta </label><span class="icr enabled" id="icr-22"><span class="icr__checkbox"></span><span class="icr__text">Bottega Veneta</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    Donna Karan </label><span class="icr enabled" id="icr-23"><span class="icr__checkbox"></span><span class="icr__text">Donna Karan</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    Oscar de la Renta </label><span class="icr enabled" id="icr-24"><span class="icr__checkbox"></span><span class="icr__text">Oscar de la Renta</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    Tods </label><span class="icr enabled" id="icr-25"><span class="icr__checkbox"></span><span class="icr__text">Tods</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    Burberry </label><span class="icr enabled" id="icr-26"><span class="icr__checkbox"></span><span class="icr__text">Burberry</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    Michael Kors </label><span class="icr enabled" id="icr-27"><span class="icr__checkbox"></span><span class="icr__text">Michael Kors</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    Mulberry </label><span class="icr enabled" id="icr-28"><span class="icr__checkbox"></span><span class="icr__text">Mulberry</span></span>
                </div>
                <div class="block-element">
                  <label> &nbsp; </label>
                  <!-- keep it blank // --> 
                </div>
              </div><div class="mCSB_scrollTools" style="position: absolute; display: block;"><div class="mCSB_draggerContainer"><div class="mCSB_dragger" style="position: absolute; height: 167px; top: 0px;" oncontextmenu="return false;"><div class="mCSB_dragger_bar" style="position: relative; line-height: 167px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div>
            </div>
          </div>
          <!--/brand panel end-->
          
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"> <a data-toggle="collapse" href="#collapseColor" class="collapseWill"> Color <span class="pull-left"> <i class="fa fa-caret-right"></i></span> </a> </h4>
            </div>
            <div id="collapseColor" class="panel-collapse collapse in">
              <div class="panel-body smoothscroll maxheight300 color-filter mCustomScrollbar _mCS_4" style="overflow: hidden;"><div class="mCustomScrollBox mCS-dark-2" id="mCSB_4" style="position: relative; height: 100%; overflow: hidden; max-width: 100%; max-height: 300px;"><div class="mCSB_container" style="position: relative; top: 0px;">
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="0" style="display: none;">
                    <small style="background-color:#333333"></small> Black <span>(123)</span> </label><span class="icr enabled" id="icr-29"><span class="icr__checkbox"></span><span class="icr__text"><small style="background-color:#333333"></small> Black <span>(123)</span></span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="1" style="display: none;">
                    <small style="background-color:#1664c4"></small> Blue (434) </label><span class="icr enabled" id="icr-30"><span class="icr__checkbox"></span><span class="icr__text"><small style="background-color:#1664c4"></small> Blue (434)</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="2" style="display: none;">
                    <small style="background-color:#c00707"></small> Red (338) </label><span class="icr enabled" id="icr-31"><span class="icr__checkbox"></span><span class="icr__text"><small style="background-color:#c00707"></small> Red (338)</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    <small style="background-color:#6fcc14"></small> Green (253) </label><span class="icr enabled" id="icr-32"><span class="icr__checkbox"></span><span class="icr__text"><small style="background-color:#6fcc14"></small> Green (253)</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    <small style="background-color:#943f00"></small> Brown (240) </label><span class="icr enabled" id="icr-33"><span class="icr__checkbox"></span><span class="icr__text"><small style="background-color:#943f00"></small> Brown (240)</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    <small style="background-color:#ff1cae"></small> Pink (212) </label><span class="icr enabled" id="icr-34"><span class="icr__checkbox"></span><span class="icr__text"><small style="background-color:#ff1cae"></small> Pink (212)</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    <small style="background-color:#f5f5dc"></small> Beige (176) </label><span class="icr enabled" id="icr-35"><span class="icr__checkbox"></span><span class="icr__text"><small style="background-color:#f5f5dc"></small> Beige (176)</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    <small style="background-color:#adadad"></small> Grey (154) </label><span class="icr enabled" id="icr-36"><span class="icr__checkbox"></span><span class="icr__text"><small style="background-color:#adadad"></small> Grey (154)</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    <small style="background-color:#5d00dc"></small> Purple (132) </label><span class="icr enabled" id="icr-37"><span class="icr__checkbox"></span><span class="icr__text"><small style="background-color:#5d00dc"></small> Purple (132)</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    <small style="background-color:#f1f40e"></small> Yellow (104) </label><span class="icr enabled" id="icr-38"><span class="icr__checkbox"></span><span class="icr__text"><small style="background-color:#f1f40e"></small> Yellow (104)</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    <small style="background-color:#ffc600"></small> Orange (77) </label><span class="icr enabled" id="icr-39"><span class="icr__checkbox"></span><span class="icr__text"><small style="background-color:#ffc600"></small> Orange (77)</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    <small style="background-color:#9b1d00"></small> Maroon (76) </label><span class="icr enabled" id="icr-40"><span class="icr__checkbox"></span><span class="icr__text"><small style="background-color:#9b1d00"></small> Maroon (76)</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    <small style="background-color:#0a43a3"></small> Navy Blue (68) </label><span class="icr enabled" id="icr-41"><span class="icr__checkbox"></span><span class="icr__text"><small style="background-color:#0a43a3"></small> Navy Blue (68)</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    <small style="background-color:#ede4b2"></small> Tan (67) </label><span class="icr enabled" id="icr-42"><span class="icr__checkbox"></span><span class="icr__text"><small style="background-color:#ede4b2"></small> Tan (67)</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    <small style="background-color:#ecf1ef"></small> Silver (49) </label><span class="icr enabled" id="icr-43"><span class="icr__checkbox"></span><span class="icr__text"><small style="background-color:#ecf1ef"></small> Silver (49)</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    <small style="background-color:#f3f1e7"></small> Off White (44) </label><span class="icr enabled" id="icr-44"><span class="icr__checkbox"></span><span class="icr__text"><small style="background-color:#f3f1e7"></small> Off White (44)</span></span>
                </div>
                <div class="block-element">
                  <label> &nbsp; </label>
                </div>
              </div><div class="mCSB_scrollTools" style="position: absolute; display: block;"><div class="mCSB_draggerContainer"><div class="mCSB_dragger" style="position: absolute; height: 178px; top: 0px;" oncontextmenu="return false;"><div class="mCSB_dragger_bar" style="position: relative; line-height: 178px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div>
            </div>
          </div>
          <!--/color panel end-->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"> <a data-toggle="collapse" href="#collapseThree" class="collapseWill"> Discount <span class="pull-left"> <i class="fa fa-caret-right"></i></span> </a> </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse in">
              <div class="panel-body">
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    Non-Discounted items </label><span class="icr enabled" id="icr-45"><span class="icr__checkbox"></span><span class="icr__text">Non-Discounted items</span></span>
                </div>
                <div class="block-element">
                  <label style="display: none;">
                    <input type="checkbox" name="tour" value="3" style="display: none;">
                    Discounted items </label><span class="icr enabled" id="icr-46"><span class="icr__checkbox"></span><span class="icr__text">Discounted items</span></span>
                </div>
              </div>
            </div>
          </div>
          <!--/discount  panel end--> 
        </div>
      </div>
      
      <!--right column-->
      <div class="col-lg-9 col-md-9 col-sm-12">
        <div class="w100 clearfix category-top">
          <h2> MEN COLLECTION </h2>
          <div class="categoryImage"> <img src="images/category.jpg" class="img-responsive" alt="img"> </div>
        </div>
        <!--/.category-top-->
        
        <div class="row subCategoryList clearfix">
          <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center ">
            <div class="thumbnail equalheight" style="height: 133px;"> <a class="subCategoryThumb" href="sub-category.html"><img src="images/product/3.jpg" class="img-rounded " alt="img"> </a> <a class="subCategoryTitle"><span> T shirt </span></a></div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center">
            <div class="thumbnail equalheight" style="height: 133px;"> <a class="subCategoryThumb" href="sub-category.html"><img src="images/site/casual.jpg" class="img-rounded " alt="img"> </a> <a class="subCategoryTitle"><span> Shirt </span></a></div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center">
            <div class="thumbnail equalheight" style="height: 133px;"> <a class="subCategoryThumb" href="sub-category.html"><img src="images/site/shoe.jpg" class="img-rounded " alt="img"> </a> <a class="subCategoryTitle"><span> shoes </span></a></div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center">
            <div class="thumbnail equalheight" style="height: 133px;"> <a class="subCategoryThumb" href="sub-category.html"><img src="images/site/jewelry.jpg" class="img-rounded " alt="img"> </a> <a class="subCategoryTitle"><span> Accessories </span></a></div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center">
            <div class="thumbnail equalheight" style="height: 133px;"> <a class="subCategoryThumb" href="sub-category.html"><img src="images/site/winter.jpg" class="img-rounded  " alt="img"> </a> <a class="subCategoryTitle"><span> Winter Collection </span></a></div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center">
            <div class="thumbnail equalheight" style="height: 133px;"> <a class="subCategoryThumb" href="sub-category.html"><img src="images/site/Male-Fragrances.jpg" class="img-rounded " alt="img"> </a> <a class="subCategoryTitle"><span> Fragrances </span></a></div>
          </div>
        </div>
        <!--/.subCategoryList-->
        
        <div class="w100 productFilter clearfix">
          <p class="pull-left"> Showing <strong>12</strong> products </p>
          <div class="pull-right ">
            <div class="change-order pull-right">
              <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                  Sorting
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Default sorting</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Sort by popularity</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Sort by price: low to high</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Sort by price: high to low</a></li>
                </ul>
              </div>
              <select class="form-control" name="orderby" style="display: none;">
                <option selected="selected">Default sorting</option>
                <option value="popularity">Sort by popularity</option>
                <option value="rating">Sort by average rating</option>
                <option value="date">Sort by newness</option>
                <option value="price">Sort by price: low to high</option>
                <option value="price-desc">Sort by price: high to low</option>
              </select>
            </div>
            <div class="change-view pull-right"> <a href="#" title="Grid" class="grid-view"> <i class="fa fa-th-large"></i> </a> <a href="#" title="List" class="list-view "><i class="fa fa-th-list"></i></a> </div>
          </div>
        </div>
        <!--/.productFilter-->
        <div class="row  categoryProduct xsResponse clearfix">
          
            
            <?php 
            $cat_id = $_GET['id'];
            $sql = sprintf("SELECT * FROM items where itm_cat_id = %d order by itm_name asc", $cat_id);
            $r = mysql_query( $sql );
            while($item = mysql_fetch_array($r) ){ ?>
              <div class="item col-sm-4 col-lg-4 col-md-4 col-xs-6">
              <div class="product">
              <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist" data-placement="left">
              <i class="glyphicon glyphicon-heart"></i>
              </a>
              <div class="image">  
              <div class="quickview">
                  <!-- <a title="Quick View" class="btn btn-xs  btn-quickview" data-target="#product-details-modal" data-toggle="modal"> Quick View </a> -->
                  <a title="Quick View" class="btn btn-xs  btn-quickview"> Quick View </a>
                 </div><a href="product-details.html"><img src="<?php echo $item['itm_ico']; ?>" alt="img" class="img-responsive"></a>
                  <div class="promotion"> <span class="new-product">NEW</span> <span class="discount"><?php echo $item['itm_dis']; ?>% OFF</span> </div>
                </div>
                <div class="description">
                  <h4><a href="product-details.html"><?php echo $item['itm_name']; ?></a></h4>
                  <div class="grid-description">
                    <p><?php echo $item['itm_des']; ?></p>
                  </div>
                  <div class="list-description">
                    <p><?php echo $item['itm_des']; ?></p>
                  </div>  
                  <span class="size">XL / XXL / S </span> </div>
                <div class="price"> <span><?php echo $item['itm_price']; ?></span> </div>
                <div class="action-control"> <a class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a> </div>
              </div>
            </div>

          <?php } ?>
          <!--/.item-->
          
        </div>
        <!--/.categoryProduct || product content end-->
        
        <div class="w100 categoryFooter">
          <div class="pagination pull-left no-margin-top">
            <ul class="pagination no-margin-top">
              <li> <a href="#">«</a></li>
              <li class="active"><a href="#">1</a></li>
              <li> <a href="#">2</a></li>
              <li> <a href="#">3</a></li>
              <li> <a href="#">4</a></li>
              <li> <a href="#">5</a></li>
              <li> <a href="#">»</a></li>
            </ul>
          </div>
          <div class="pull-right pull-right col-sm-4 col-xs-12 no-padding text-right text-left-xs">
            <p>Showing 1–450 of 12 results</p>
          </div>
        </div>
        <!--/.categoryFooter--> 
      </div>
      <!--/right column end--> 
      </div>
    </div>

    <!-- Product Details Modal  -->
    <div class="modal fade in" id="product-details-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button"> × </button>
                <div class="col-lg-5 col-md-5 col-sm-5  col-xs-12">

                    <!-- product Image -->

                    <div class="main-image  col-lg-12 no-padding style3">
                        <a class="product-largeimg-link" href="product-details.html"><img src="images/zoom/zoom1.jpg" class="img-responsive product-largeimg" alt="img">
                        </a>
                    </div>
                    <!--/.main-image-->
                    
                    <div class="modal-product-thumb">
                        <a class="thumbLink selected"><img data-large="images/zoom/zoom1.jpg" alt="img" class="img-responsive" src="images/zoom/zoom1.jpg">
                        </a>
                        <a class="thumbLink"><img data-large="images/zoom/zoom2.jpg" alt="img" class="img-responsive" src="images/zoom/zoom2.jpg">
                        </a>
                        <a class="thumbLink"><img data-large="images/zoom/zoom3.jpg" alt="img" class="img-responsive" src="images/zoom/zoom3.jpg">
                        </a>
                    </div> <!--/.modal-product-thumb-->
                </div> <!--/ product Image-->
               
                
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 modal-details no-padding">
                    <div class="modal-details-inner">
                        <h1 class="product-title"> Lorem ipsum dolor sit amet</h1>
                        <h3 class="product-code">Product Code : DEN1098</h3>
                        <div class="product-price"> <span class="price-sales"> $70</span> <span class="price-standard">$95</span> </div>
                        <div class="details-description">
                            <p>In scelerisque libero ut elit porttitor commodo Suspendisse laoreet magna. </p>
                        </div>
                        <div class="color-details"> <span class="selected-color"><strong>COLOR</strong></span>
                            <ul class="swatches Color">
                                <li class="selected">
                                    <a style="background-color:#f1f40e"> </a>
                                </li>
                                <li>
                                    <a style="background-color:#adadad"> </a>
                                </li>
                                <li>
                                    <a style="background-color:#4EC67F"> </a>
                                </li>
                            </ul>
                        </div>
                        <!--/.color-details-->

                        <div class="productFilter productFilterLook2">
                            <div class="filterBox">
                                <select >
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
                            <div class="filterBox">
                                <select >
                                    <option value="strawberries" selected="">Size</option>
                                    <option value="mango">XL</option>
                                    <option value="bananas">XXL</option>
                                    <option value="watermelon">M</option>
                                    <option value="apples">L</option>
                                    <option value="apples">S</option>
                                </select>
                            </div>
                        </div>
                        <!-- productFilter -->

                        <div class="cart-actions">
                            <div class="addto">
                                <button onclick="productAddToCartForm.submit(this);" id="item-1" class="button btn-cart cart first" title="Add to Cart" type="button">Add to Cart</button>
                                <a class="link-wishlist wishlist">Add to Wishlist</a> </div>
                        </div>
                        <!--/.cart-actions-->

                        <div class="product-share clearfix">
                            <p> SHARE </p>
                            <div class="socialIcon">
                                <a href="#"> <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#"> <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#"> <i class="fa fa-google-plus"></i>
                                </a>
                                <a href="#"> <i class="fa fa-pinterest"></i>
                                </a>
                            </div>
                        </div>
                        <!--/.product-share-->
                    </div><!--/.modal-details-inner-->
                </div>
                <!--/.modal-details-->
                <div class="clear"></div>
            </div><!--/.modal-content-->
        </div><!--/.modal-content-->
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script>
      //  $('.btn-quickview').live('click',function(){
      //    $('#product-details-modal').show();
      //    $('#product-details-modal').hide();
      //    console.log('hello');
      // )};

    $('.btn-quickview').on('click', function() {
         $('#product-details-modal').modal();
    });





     </script>
  </body>
</html>