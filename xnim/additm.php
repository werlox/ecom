<?php
require_once "nci/session.php"; 
require_once "nci/dbc.php";
require_once "nci/func.php";

    if(!isset($_SESSION['ad_id'])){
        header( 'Location: login.php' );
         }
         $ad = $_SESSION['ad_id'];
         $admin = mysql_fetch_array(mysql_query("select * from aduser where ad_id = '$ad'"));
         $date = new DateTime();
         $extensions = array("image/jpeg","image/jpg","image/png");  
                


if(isset($_POST['save'])){
    if($_POST['name'] == ""){
        $msg = "Enter Item Name.";
    }	
    elseif($_POST['des']  == ""){
        $msg = "Enter Item Description.";
    }
    elseif($_POST['price']  == ""){
        $msg = "Enter Item Price.";
    }
    elseif($_FILES['ico']['name']==''){
        $msg = "Select Item Thumbnail.";
    }
    elseif($_FILES['ico']['size'] < 0 || in_array($_FILES['ico']['type'],$extensions) == false){
             $msg = "Wrong Thumbnail Type";
    }
    else{
        $name = $_POST['name'];
        $des = $_POST['des'];
        $cat = $_POST['cat'];
        $price = $_POST['price'];
        $dis = $_POST['dis'];
        $qty = $_POST['qty'];
        $target_dirico = "../images/itm_ico/";
        $ico_name = $_FILES['ico']['name'];
        $ico_temp = $_FILES['ico']['tmp_name'];
        $ico_type = $_FILES['ico']['type'];
        $finame = date('YmdHis')."_".rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9)."_".$ico_name;
        $m_iname =  $target_dirico.$finame;
        move_uploaded_file($ico_temp,$m_iname);
                

        mysql_query("INSERT INTO `items` (`itm_name`, `itm_des`, `itm_ico`, `itm_cat_id`, `itm_price`, `itm_qty`, `itm_dis`) VALUES ('$name', '$des', '$finame', '$cat', '$price', '$qty', '$dis')");
        $item = mysql_fetch_array(mysql_query("select max(itm_id) as iid from items where itm_name = '$name'"));
        $itemid =  $item['iid'];
        $target_dir = "../images/items/";
    	

        foreach($_FILES['image']['tmp_name'] as $key => $tmp_name ){
    	    $file_name = $key.$_FILES['image']['name'][$key];
    	    $file_size =$_FILES['image']['size'][$key];
        	$file_tmp =$_FILES['image']['tmp_name'][$key];
        	$file_type=$_FILES['image']['type'][$key];
            if($file_size > 0 && in_array($file_type,$extensions) != false){
    			$fname = date('YmdHis')."_".rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9)."_".$file_name;
    			$m_name =  $target_dir.$fname;
                $n_name = substr($m_name, 3);
                move_uploaded_file($file_tmp,$m_name);
                mysql_query("INSERT INTO `ecom`.`itm_images` (`itm_id`, `img_name`, `img_link`) VALUES ('$itemid', '$fname', '$n_name')");

            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ecom - Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php require_once "nav.php"; ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add Item</h1>
                        <center><font color="red"><b><?php if(isset($msg)){echo $msg;} ?></b></font></center>
			            <form role="form" enctype="multipart/form-data" method="post">
			            <div class="form-group">
                        	<label>Item Name</label>
                            <input class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Item Description</label>
                            <textarea class="form-control" rows="3" name="des" required></textarea>
                        </div>
                        <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="cat">
                        <?php $psql = mysql_query("select * from categories where cat_parent_id = 0");
                        while($catS = mysql_fetch_array($psql)){ 
                            $cid = $catS['cat_id'];
                            $dpsql = mysql_query("select * from categories where cat_parent_id ='$cid'");
                            while($cat = mysql_fetch_array($dpsql)){ 
                            ?>
                        <option value="<?php echo $cat['cat_id']?>"><?php echo $catS['cat_name']. " - " .$cat['cat_name']?></option>
                        <?php } }?>
                        </select>
                        </div>
						<div class="form-group1">
                        	<label>Item Price</label>
                            <input class="form-control" type="number" name="price" required>
                        </div>
                        <div class="form-group2">
                        	<label>Item Discount %</label>
                            <input class="form-control" type="number" name="dis">
                        </div>
                        <div class="form-group">
                        	<label>Item Quantity</label>
                            <input class="form-control" type="number" name="qty">
                        </div>
						<div class="form-group">
                        	<label>Thumbnail Image</label>
                            <input type="file" name="ico" required>
                        </div>
                        <div class="form-group">
                        	<label>Item Image 1</label>
                            <input type="file" name="image[]">
                        </div>
                        <div class="form-group">
                        	<label>Item Image 2</label>
                            <input type="file" name="image[]">
                        </div>
                        <div class="form-group">
                        	<label>Item Image 3</label>
                            <input type="file" name="image[]">
                        </div>
                        <div class="form-group">
                        	<label>Item Image 4</label>
                            <input type="file" name="image[]">
                        </div>
                        <div class="form-group">
                        	<label>Item Image 5</label>
                            <input type="file" name="image[]">
                        </div>
 						<button type="submit" class="btn btn-default" name="save">Save Item</button>
                        </form>
 
            
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>
