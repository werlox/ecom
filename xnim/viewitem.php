<?php
require_once "../nci/session.php"; 
require_once "../nci/dbc.php";

    if(!isset($_SESSION['ad_id'])){
        header( 'Location: login.php' );
         }
         $ad = $_SESSION['ad_id'];

         $admin = mysql_fetch_array(mysql_query("select * from aduser where ad_id = '$ad'"));

if(isset($_POST['update'])){
    $sql = mysql_query("select * from items");
    while($cats = mysql_fetch_array($sql)){
        $cat_id = $cats['itm_id'];
        $cat_order = $_POST[$cat_id];
        if(isset($_POST['de']) && $_POST['de'] == $cat_id){
            mysql_query("delete from items where itm_id = '$cat_id'");
            mysql_query("delete from itm_images where itm_id = '$cat_id'");

        }
        //mysql_query("update categories set cat_order = '$cat_order' where cat_id = '$cat_id'");
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
                        <h1 class="page-header">Items</h1>
                    </div>
                    <div class="panel-body">
                    <form method="post">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Items ID</th>
                                            <th>Items Name</th>
                                            <th>Items Des</th>
                                            <th>Items Category</th>
                                            <th>Items Price</th>
                                            <th>Items Tumbnail</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $csql = mysql_query("select * from items");
                                        while ($cat = mysql_fetch_array($csql)) {
                                            $cat_id = $cat['itm_cat_id'];
                                            $cato = mysql_fetch_array(mysql_query("select * from categories where cat_id = '$cat_id'"))
                                    ?> 
                                        <tr bgcolor="#E6E6E6">
                                            <td><?php echo $cat['itm_id']; ?></td>
                                            <td><?php echo $cat['itm_name']; ?></td>
                                            <td><?php echo $cat['itm_des']; ?></td>
                                            <td><?php echo $cato['cat_name']; ?></td>
                                            <td><?php echo $cat['itm_price']; ?></td>
                                            <td class="center"><center><?php echo "<img src='../images/itm_ico/".$cat['itm_ico']."' style='width:150px'>" ?></center></td>
                                            <td><?php echo "<input type = 'checkbox' name = 'de' value = '".$cat['itm_id']."'>"; ?></td>
                                        </tr>
                                        <?php } ?>
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
