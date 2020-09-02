<?php
// connect to database
$dbh = mysqli_connect("sql105.epizy.com", "epiz_26647184", "5ZTvYnbDLU1zo", "epiz_26647184_accounts") or die("Cannot connect");

$sql="SELECT * FROM logs ORDER BY time desc";
     $result1= mysqli_query($dbh,$sql);
     while ($row1 = mysqli_fetch_assoc($result1)){
        $logs[]=$row1;}

mysqli_commit($dbh);
// close connection
mysqli_close($dbh);
?>
<html>
<head>
    <title> Logs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="selecttab.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="textbox.css">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet"> 
     <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Corben:wght@700&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="FOOTER.css">
    <link rel="stylesheet" type="text/css" href="mainpage.css">


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body style="background-color: #222223; ">


<div class="title" style="box-shadow: 2px 2px 2px 2px #000000; font-size: 30px; text-align: center; border-radius: 20px;font-family: 'Roboto Mono', monospace; margin-bottom: 1%;">
<h1 style="text-align: center; color: #FFFFFF;text-align: center; padding: .5rem; font-size: 3rem;"><strong>TRANSACTION LOGS</strong></h1>
</div>

    <div class="container" style=" font-size: 90px; text-align: center; border-radius: 5px; font-family: 'Russo One', sans-serif; padding: 3%; margin:20px 20px 20px 20px ; box-sizing:content-box; height: 60%; align-self: center; margin-bottom: 3%; ">
<table class="table table-dark table-hover  table-sm" style="width: 1200px;box-shadow: 1px 1px 1px 1px #FFFFFF; height: 90%; border-radius: 5px;" >
    <th ><tr style="font-size: 30px; text-align: left; font-weight: bold; background-color: #ffae42;color: #000000;"><td>Sr. No.</td><td>Sender</td><td>Reciever</td><td>Amount</td><td>Time</td></tr></th> 
<?php
$ct=0;
foreach ($logs as $b) {
    $ct=$ct+1;
     echo "<tr ><td>".$ct."</td><td>" . $b['Sender'] . "</td><td>" . $b['Reciever'] ."</td><td>".$b['Amount']."</td><td>".$b['time']. "</td></tr>";

     if($ct==15){break;}
 }
 ?>  
 </table>
</table>

<div class="button_cont" align="right"><a class="example_e" href="index.php" target="_self" rel="nofollow noopener">Home</a></div>

</div>
 <footer class="site-footer" style="max-height: 30px; padding: 1rem;">
     
     
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12" style="float: left;">
            <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by 
         <a href="#">Pranshu Dhyani</a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12" style="float: right; max-width: 25%;">
            <ul class="social-icons">
              <li><a class="facebook" href="#" style="height: 35px;"><i class="fa fa-facebook" style="padding-top : 10px;"></i></a></li>
              <li><a class="twitter" href="#" style="height: 35px;"><i class="fa fa-twitter" style="padding-top : 10px;"></i></a></li>
              <li><a class="dribbble" href="#" style="height: 35px;"><i class="fa fa-dribbble" style="padding-top : 10px;"></i></a></li>
              <li><a class="linkedin" href="#" style="height: 35px;"><i class="fa fa-linkedin"  style="padding-top : 10px;"></i></a></li>   
            </ul>
          </div>
        
      </div>
</footer>

</body>
</html>