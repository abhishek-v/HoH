<?php       
    session_start();
    function succ()
    {
        ?>
        <script type="text/javascript">
            alert("Item Successfully added!!")
        </script>
        <?php
    }
    if(!isset($_SESSION['admin']))
    {
        header("refresh:0,url=index.php");
    }
    else
    {

        $name='';
        $id=$_SESSION['admin'];
        require_once('../db.php');
        $query="SELECT * from admin WHERE id='$id'";
        $result=mysqli_query($stat,$query); 
        if($rows=mysqli_fetch_array($result))
        {
            $name=$rows['name'];
    ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Interface</title>
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="../assets/ico/favicon.png">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin.php">Admin Interface</a>
            </div>
            <?php
                require_once('topmenu.php');
            ?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="admin.php"><i class="fa fa-fw fa-dashboard"></i> Feedbacks</a>
                    </li>
                    <li class="active">
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-gift"></i> Items <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li >
                                <a href="additem.php"><i class="fa fa-fw fa-plus"></i> Add Item</a>
                            </li>
                            <li>
                                <a href="edititem.php"><i class="fa fa-fw fa-edit"></i> Edit Item</a>
                            </li>
                            <li>
                                <a href="deleteitem.php"><i class="fa fa-fw fa-minus"></i> Delete Item</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="vieworder.php"><i class="fa fa-fw fa-dashboard"></i> Orders</a>
                    </li>
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </nav>
                <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <i class="fa fa-fw fa-gift"></i>
                            Add Item
                        </h1>
                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-7">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <tbody>
                                    <center><p id="incor1"></p></center>
                                    <form method="post" enctype="multipart/form-data" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                                    <tr>
                                        <td><strong>Title</strong></td>
                                        <td>
                                            <input name="title" class="form-control" style="width:50%" type="text" required autocomplete="off" value=""></td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Description</strong></td>
                                        <td><textarea  name="description" class="form-control" style="width:100%;height: 100px;" type="text" required autocomplete="off"> </textarea></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Long Description</strong></td>
                                        <td><textarea  name="ldescription" class="form-control" style="width:100%;height: 500px;" type="text" required autocomplete="off"> </textarea></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Amount</strong></td>
                                        <td><input name="amount" class="form-control" style="width:50%" type="number" min="0" required autocomplete="off" value=""></td></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Image 1</strong></td>
                                        <td><input name="image1" class="form-control" style="width:50%" type="file" required autocomplete="off" value=""></td></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Image 2</strong></td>
                                        <td><input name="image2" class="form-control" style="width:50%" type="file" autocomplete="off" value=""></td></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Image 3</strong></td>
                                        <td><input name="image3" class="form-control" style="width:50%" type="file" autocomplete="off" value=""></td></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Image 4</strong></td>
                                        <td><input name="image4" class="form-control" style="width:50%" type="file" autocomplete="off" value=""></td></td>
                                    </tr>   
                                    <tr>
                                        <td><strong>Image 5</strong></td>
                                        <td><input name="image5" class="form-control" style="width:50%" type="file" autocomplete="off" value=""></td></td>
                                    </tr>
                                     <tr>
                                        <td><strong>Video (URL)</strong></td>
                                        <td>
                                            <input name="video" class="form-control" style="width:100%" type="text" autocomplete="off" value=""></td>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                                <button name="submit" class="btn btn-success" >Submit</button>
                                <?php  
                                    if(isset($_POST['submit']))
                                    {
                                        require_once('../db.php');
                                        $count=5;
                                        $f=1;
                                        $title=mysqli_real_escape_string($stat,$_POST['title']);
                                        $description=mysqli_real_escape_string($stat,$_POST['description']);
                                        $ldescription=mysqli_real_escape_string($stat,$_POST['ldescription']);
                                        $amount=mysqli_real_escape_string($stat,$_POST['amount']);
                                        $video=mysqli_real_escape_string($stat,$_POST['video']);
                                        $j=0;
                                        for($i=1;$i<=$count;$i++)
                                        {
                                            if($_FILES['image'.$i]['name']!="")
                                            {
                                                $img[$j]=$_FILES['image'.$i]['name'];
                                                $j++;
                                            }
                                        }
                                        define('GW_UPLOADPATH','../images/shop/');
                                        $image=true;
                                        $t=time();
                                        if($j==0)
                                            $image=false;
                                        for($i=0;$i<$j;$i++)
                                        {
                                            $name1[$i]=$file[$i]=$img[$i];
                                            $file1[$i]=substr($name1[$i],strrpos($name1[$i], '.')+1);
                                            $target[$i]=GW_UPLOADPATH.$t.'_'.($i+1).'.'.$file1[$i];
                                            $name1[$i]=$t.'_'.($i+1).'.'.$file1[$i]; 
                                            if(!($file1[$i]=="jpg"||$file1[$i]=="jpeg"||$file1[$i]=="png"||$file1[$i]=="bmp"||$file1[$i]=="gif"||$file1[$i]=="JPG"||$file1[$i]=="JPEG"||$file1[$i]=="PNG"||$file1[$i]=="BMP"||$file1[$i]=="GIF"))
                                            {
                                                $f=0;
                                                ?>
                                                <script>
                                                  var msg="Image is in wrong format!!";
                                                </script>
                                                <?php
                                            }
                                        }
                                        
                                        if($f==1)
                                        {
                                            for($i=0;$i<5;$i++)
                                            {
                                                if($i<$j)
                                                {
                                                    if(!(move_uploaded_file($_FILES['image'.($i+1)]['tmp_name'],$target[$i])))
                                                    {
                                                        $f=0;
                                                        ?>
                                                        <script>
                                                          var msg="Image not uploaded!!";
                                                        </script>
                                                        <?php
                                                    }   
                                                }
                                                else
                                                {
                                                    $name1[$i]="";
                                                }
                                            }
                                            if($f==1)
                                            {
                                                $query="INSERT INTO `shop`(`id`, `title`, `description`,`longdescription` ,`amount`, `available`, `rating`, `image1`, `image2`, `image3`, `image4`, `image5`, `video`) VALUES (NULL,'$title','$description','$ldescription','$amount',true,5,'$name1[0]','$name1[1]','$name1[2]','$name1[3]','$name1[4]','$video')";
                                                mysqli_query($stat,$query);
                                               succ();    
                                           }
                                           else
                                           {
                                                ?>
                                                <script type="text/javascript">
                                                    document.getElementById("incor1").innerHTML="ERROR : "+msg ;
                                                </script>
                                                <?php
                                           }
                                        }
                                    }
                                ?>
                            </form>
                            
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <div id="page-wrapper">
        <h1> <i class="fa fa-fw fa-gift"></i>Items</h1>
            <br>
            <div class="container-fluid" >
                <table class="table table-bordered table-hover table-striped" style="width: 95%;">
            <tbody>
                <tr>
                    <td><b>S.No</b></td>
                    <td><b>Title</b></td>
                    <td><b>Description</b></td>
                    <td><b>Amount</b></td>
                    <td><b>Available</b></td>
                    
                </tr>
                <?php
                    require_once('../db.php');
                    $query="SELECT * from shop";
                    $result=mysqli_query($stat,$query);
                    $i=1;
                    while($rows=mysqli_fetch_array($result))
                    {   
                        ?>  <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $rows['title'] ?></td>
                                <td><?php echo $rows['description'];?></td>
                                <td><?php echo $rows['amount'] ?></td>
                                <td><?php if($rows['available']==1) echo "Yes"; else echo "NO"; ?></td>
                            </tr>
                            <?php    
                            $i++;
                    }
                    ?>
            </tbody>
        </table>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>

</body>
<?php 
        }
        else
        {
            header("refresh:0,url=index.php");
        }
    }?>
</html>
    