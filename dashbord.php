<?php
session_start();
require_once ('dbconn.php');
if (empty($_SESSION['email'])){
header("Location: login.php");
}
$email = $_SESSION['email'];
$sql = "SELECT * FROM main_data WHERE email= '$email'";
$result = mysqli_query($conn , $sql);
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_assoc($result))
{
$name = $row['name'];
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashbord</title>
    <link rel = "icon" href ="images/logo_title.png" type = "image/x-icon">
    <link rel="stylesheet" href="css/dashbord_style.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
   <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
   <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>

  </head>
  <body>
    <div class="container-fluid h-100">
    <div class="row h-100">
        <aside class="col-12 col-md-3  p-0 ">
            <nav class="navbar navbar-expand flex-md-column flex-row align-items-start py-2">
                <div class="collapse navbar-collapse">
                    <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
                        <li class="nav-item1 hello">
                            <a class="nav-link pl-0 text-nowrap" href="dashbord.php"><i class="fa fa-home fa-fw" style="color:white;"></i> <span class="font-weight-bold logo logo__txt" style="color:white;">SMART HOME</span></a>
                        </li>
                                    <div class="imgcontainer">
                                      <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
                                    </div>
                          <li>
                            &nbsp
                          </li>
                        <li>
                           <span class="ur1" style="color:white;">
                               &nbsp<?php echo "$name"; ?>
                           </span>
                        </li>
                        <li>
                            &nbsp
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0" href="dashbord_profile.php"><i class="fa fa-user-circle-o fa-fw"style="color:white;"></i>&nbsp<span class="d-none d-md-inline ur"style="color:white;">PROFILE</span></a> <!-- profile -->
                        </li>
                        <li>&nbsp</li>
                        <li class="nav-item">
                            <a class="nav-link pl-0" href="dashbord_mng_dvi.php"><i class="fa fa-gears fa-fw"style="color:white;"></i>&nbsp<span class="d-none d-md-inline ur" style="color:white;">MANAGE DEVICES</span></a>  <!-- manage devices -->
                        </li>
                        <li>&nbsp</li>
                        <li class="nav-item">
                            <a class="nav-link pl-0" href="dashbord_contactus.php"><i class="fa fa-vcard-o fa-fw"style="color:white;"></i>&nbsp<span class="d-none d-md-inline ur"style="color:white;">CONTACT US</span></a> <!-- contact us  -->
                        </li>
                        <li>&nbsp</li>
                        <li class="nav-item">
                            <a class="nav-link pl-0" href="dashbord_aboutus.php"><i class="fa fa-id-badge fa-fw"style="color:white;"></i>&nbsp<span class="d-none d-md-inline ur"style="color:white;">ABOUT US</span></a> <!-- about us -->
                        </li>
                        <li>&nbsp</li>
                        <li class="nav-item">
                            <a class="nav-link pl-0" href="logout.php"><i class="fa fa-power-off fa-fw"style="color:white;"></i>&nbsp<span class="d-none d-md-inline ur"style="color:white;">LOG OUT</span></a> <!--log out -->
                        </li>
                    </ul>
                </div>
            </nav>
        </aside>
        <main class="col next">
          <br>
          <br>
          <br>

          <h1><span class="heading">Welcome To The Dashbord</span></h1>
            <div>
                <span class="hello_l">Hello,<span> <?php echo "$name"; ?></span></span>
                <span><a href='device.php'><button class="bnt"><strong>Add Device</strong></button></a></span>
            </div>

            <fieldset class="col-md-12">
                <legend style="color:white;"><spam class="leg_ti">Bed Room</spam></legend>
                    <div style="color: white; background-color: black;">
                        <?php
                            $dbsql="SELECT * FROM bedroom";
                            $dbresult=mysqli_query($conn_device,$dbsql);
                            if(mysqli_num_rows($dbresult) > 0)
                            {
                                while($dbrow = mysqli_fetch_assoc($dbresult))
                                {
                                    $dbname = $dbrow['name'];
                                    $dbdis = $dbrow['dis'];
                                    $dbgpio = $dbrow['gpio'];
                                    echo "
                                    <table>
                                    <tr>
                                        <td>$dbname</td>
                                        <td>&nbsp</td>
                                        <td>&nbsp</td>
                                        <td>$dbdis</td>
                                    </tr>
                                    </table>";
                                }
                            }else
                            {
                                echo "No Data Available";
                            }
                            ?>
                    </div>
            </fieldset>
            <fieldset class="col-md-12">
                <legend style="color:white;"><spam class="leg_ti">Hall</spam></legend>
                <div style="color: white; background-color: black;">
                    <?php
                    $dhsql="SELECT * FROM hall";
                    $dhresult=mysqli_query($conn_device,$dhsql);
                    if(mysqli_num_rows($dhresult) > 0)
                    {
                        while($dhrow = mysqli_fetch_assoc($dhresult))
                        {
                            $dhname = $dhrow['name'];
                            $dhdis = $dhrow['dis'];
                            $dhgpio = $dhrow['gpio'];
                            echo "
                            <table>
                            <tr>
                                <td>$dhname</td>
                                <td>&nbsp</td>
                                <td>&nbsp</td>
                                <td>$dhdis</td>
                            </tr>
                            </table>";
                        }
                    }else
                    {
                        echo "No Data Available";
                    }
                    ?>
                </div>
            </fieldset>
            <fieldset class="col-md-12">
                <legend style="color:white;"><spam class="leg_ti">Kitchen</spam></legend>
                <div style="color: white; background-color: black;">
                    <?php
                    $dksql="SELECT * FROM kitchen";
                    $dkresult=mysqli_query($conn_device,$dksql);
                    if(mysqli_num_rows($dkresult) > 0)
                    {
                        while($dkrow = mysqli_fetch_assoc($dkresult))
                        {
                            $dkname = $dkrow['name'];
                            $dkdis = $dkrow['dis'];
                            $dkgpio = $dkrow['gpio'];
                            echo "
                            <table>
                            <tr>
                                <td>$dkname</td>
                                <td>&nbsp</td>
                                <td>&nbsp</td>
                                <td>$dkdis</td>
                            </tr>
                            </table>";
                        }
                    }else
                    {
                        echo "No Data Available";
                    }
                    ?>
                </div>
            </fieldset>
     </main>
    </div>
</div>
  </body>
</html>