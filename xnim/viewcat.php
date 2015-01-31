<?php
require_once "../nci/session.php"; 
require_once "../nci/dbc.php";

    if(!isset($_SESSION['ad_id'])){
        header( 'Location: login.php' );
         }
         $ad = $_SESSION['ad_id'];

         $admin = mysql_fetch_array(mysql_query("select * from aduser where ad_id = '$ad'"));

if(isset($_POST['update'])){
    $sql = mysql_query("select * from categories");
    while($cats = mysql_fetch_array($sql)){
        $cat_id = $cats['cat_id'];
        $cat_order = $_POST[$cat_id];
        if(isset($_POST['de']) && $_POST['de'] == $cat_id){
            mysql_query("delete from categories where cat_id = '$cat_id'");
            mysql_query("delete from categories where cat_parent_id = '$cat_id'");

        }
        mysql_query("update categories set cat_order = '$cat_order' where cat_id = '$cat_id'");
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
                        <h1 class="page-header">Category</h1>
                    </div>
                    <div class="panel-body">
                    <form method="post">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Category ID</th>
                                            <th>Category Name</th>
                                            <th>Sub Category</th>
                                            <th>Category Des</th>
                                            <th>Category Image</th>
                                            <th>Category Order</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $csql = mysql_query("select * from categories where cat_parent_id = 0 order by cat_order");
                                        while ($cat = mysql_fetch_array($csql)) {
                                    ?> 
                                        <tr bgcolor="#E6E6E6">
                                            <td><?php echo $cat['cat_id']; ?></td>
                                            <td><?php echo $cat['cat_name']; ?></td>
                                            <td></td>
                                            <td><?php echo $cat['cat_des']; ?></td>
                                            <td></td>
                                            <td><?php echo "<input type = 'number' name = '".$cat['cat_id']."' value='".$cat['cat_order']."'>"; ?></td>
                                            <td><?php echo "<input type = 'checkbox' name = 'de' value = '".$cat['cat_id']."'>"; ?></td>
                                        </tr>

                                        <?php
                                            $pcat = $cat['cat_id'];
                                            $ssql = mysql_query("select * from categories where cat_parent_id = $pcat order by cat_order");
                                            while ($scat = mysql_fetch_array($ssql)) { ?>
                                            <tr>
                                                <td><?php echo $scat['cat_id']; ?></td>
                                                <td></td>
                                                <td><?php echo $scat['cat_name']; ?></td>
                                                <td><?php echo $scat['cat_des']; ?></td>
                                                <td class="center"><center><?php echo "<img src='../images/cat_img/".$scat['cat_image']."' style='width:150px'>" ?></center></td>
                                                <td><?php echo "<input type = 'number' name = '".$scat['cat_id']."' value='".$scat['cat_order']."'>"; ?></td>
                                                <td><?php echo "<input type = 'checkbox' name = 'de' value = '".$scat['cat_id']."'>"; ?></td>
                                        </tr>
                                        <?php }} ?>
                                        <tr>
                                            <td colspan="7"><center><button type="submit" class="btn btn-default" name="update">Update</button></center></td>
                                        </tr>  
                                    </tbody>
                                </table>

                                </from>
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
