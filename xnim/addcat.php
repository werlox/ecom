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
         

if(isset($_POST['savemain'])){
    $name = $_POST['maincat'];
    $des = $_POST['maindes'];
    mysql_query("INSERT INTO `categories` (`cat_name`, `cat_parent_id`, `cat_des`) VALUES ('$name', '0', '$des')");
    $msg = "Main Category Added.";
}



if(isset($_POST['savesub'])){
    if($_FILES['ico']['size'] < 0 || in_array($_FILES['ico']['type'],$extensions) == false){
             $msg = "Wrong Image Type";
    }
    else{
    $name = $_POST['subcat'];
    $des = $_POST['subdes'];
    $cat = $_POST['cat'];
    $target_dirico = "../images/cat_img/";
        $ico_name = $_FILES['ico']['name'];
        $ico_temp = $_FILES['ico']['tmp_name'];
        $ico_type = $_FILES['ico']['type'];
        $finame = date('YmdHis')."_".rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9)."_".$ico_name;
        $m_iname =  $target_dirico.$finame;
        move_uploaded_file($ico_temp,$m_iname);
    mysql_query("INSERT INTO `ecom`.`categories` (`cat_name`, `cat_parent_id`, `cat_des`, `cat_image`) VALUES ('$name', '$cat', '$des', '$finame')");
    $msg = "Sub Category Added.";
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
                        <h1 class="page-header">Add Category</h1>
                        <center><font color="red"><b><?php if(isset($msg)){echo $msg;} ?></b></font></center>
                        <div class="col-lg-6">
                        <form role="form" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                            <label>Main Category Name</label>
                            <input class="form-control"  name="maincat" required>
                            </div>
                            <div class="form-group">
                            <label>Main Category Des</label>
                            <textarea class="form-control" rows="3" name="maindes"></textarea>
                            </div>
                        <button type="submit" class="btn btn-default" name="savemain">Create Main Category</button>
                    </form>
                    </div>
                    <div class="col-lg-6">
                        <form role="form" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                        <label>Parent Category</label>
                        <select class="form-control" name="cat">
                        <?php $psql = mysql_query("select * from categories where cat_parent_id = 0");
                            while($cat = mysql_fetch_array($psql)){ ?>
                                <option value="<?php echo $cat['cat_id']?>"><?php echo $cat['cat_name']?></option>
                                <?php } ?>
                        </select>
                        </div>
                        <form role="form">
                                <div class="form-group">
                                <label>Sub Category Name</label>
                                <input class="form-control"  name="subcat" required>
                                </div>
                                <div class="form-group">
                                <label>Sub Category Des</label>
                                <textarea class="form-control" rows="3" name="subdes" required></textarea>
                                </div>
                        <div class="form-group">
                            <label>Header Image</label>
                            <input type="file" name="ico" required>
                        </div>
                        <button type="submit" class="btn btn-default" name="savesub">Create Sub Category</button>
                        </form>
                    </div>
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
