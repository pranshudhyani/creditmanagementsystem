<?php
// connect to database
$dbh = mysqli_connect("sql105.epizy.com", "epiz_26647184", "5ZTvYnbDLU1zo", "epiz_26647184_accounts") or die("Cannot connect");
$mysqli=new mysqli("sql105.epizy.com", "epiz_26647184", "5ZTvYnbDLU1zo", "epiz_26647184_accounts");
 if(mysqli_connect_errno())
 {
    echo "Connection fail";
 } 
// turn off auto-commit
mysqli_autocommit($dbh, FALSE);

if(!empty($_POST['submit']))
{
if ($_POST['submit'] && is_numeric($_POST['amt'])) {
    // add $$ to target account
    $amt=$_POST['amt'];
    $to=$_POST['to'];
    $from=$_POST['from'];
    $sql =  "UPDATE accounts SET Credits = Credits + '$amt' WHERE Name = '$to'";
    if(mysqli_query($dbh,$sql)){
        echo" Updated successsully";
    
                $sql="INSERT INTO logs(Sender,Reciever, Amount) VALUES('$from','$to','$amt') ";
        if(mysqli_query($dbh,$sql))
            {

             echo"updated 2.0";}
        else{
            echo "error recording";
        }
    }
    else{
        echo"error recording";

     // if error, roll back transaction
    }
 }   
   
    // subtract $$ from source account
    $sql="UPDATE accounts SET Credits = Credits - '$amt' WHERE Name = '$from'";
    if(mysqli_query($dbh,$sql)){
        echo" Upddated successsully";
    }
    else{
        echo"error recording";  // if error, roll back transaction
    }
    mysqli_commit($dbh);
    echo '<script>alert("Transfer Successfully done")</script>';
    header('location: Thankyou.php');


}
$result = mysqli_query($dbh, "SELECT * FROM accounts");
while ($row = mysqli_fetch_assoc($result)) {
    $accounts[] = $row;
}

// close connection
mysqli_close($dbh);
?>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="selecttab.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="textbox.css">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet"> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="FOOTER.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title> TRANSFER PAGE</title>
</head>
<body style="background: #222223 !important;">
<div class="title" style="box-shadow: 3px 3px 3px 3px #000000; font-size: 40px; text-align: center; border-radius: 20px; font-family: 'Roboto Mono', monospace; padding: 1%; margin-bottom: 2%;">
<h1 style="text-align: center; color: #FFFFFF;text-align: center; padding: .5rem; font-size: 5rem;"><strong>TRANSFER PAGE</strong></h1>
</div>
<div class= "border" style="box-shadow: 5px 5px 5px 5px #000000; font-size: 20px; text-align: center; border-radius: 20px; font-family: 'Russo One', sans-serif; padding: 2%; margin-bottom: 4%;">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<h2 style="color: #FFFFFF;text-align: center; padding: 1rem;"><strong>Transfer $</strong></h2>
<div class="form__group"> 
<input type="number" name="amt" size="5" class="form__input" id="name" placeholder="Amount $$$ " min="0" required="" /> 
<h2 style="text-align: center; padding: 1rem;"><strong>From</strong></h2>

<div class="select">
        <div class="block">
           <select   name="from">
           
           <?php
           foreach ($accounts as $a) {
           echo "<option value=\"" . $a['Name'] . "\">"."Name : ". $a['Name'] ."&nbsp &nbsp &nbsp "."   Id :  ".$a['Id'] . "</option>";   
           }
           ?>
</select>
</div>
</div>
<h2 style="text-align: center; color: #FFFFFF;text-align: center; padding: 1rem; "><strong>To</strong></h2>
<div class="select">
<div class="block">
<select name="to">
<?php
foreach ($accounts as $a) {
    echo "<option value=\"" . $a['Name'] . "\">"."Name : ". $a['Name'] ."&nbsp &nbsp &nbsp "."   Id :  ".$a['Id'] . "</option>";   
}
?>
</select>
</div>
</div>
<div style="margin: 30px; text-align: center;">
<input type="submit" name="submit" value="Transfer"class="btn btn-dark" style="font-size: 1rem; font-weight: bold; margin: ">
</div>
</form>
</div>
</div>


<footer class="site-footer" style="max-height: 30px; padding: 1rem;">
     
     
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12" style="float: left;">
            <p class="copyright-text">  Copyright &copy; 2020 All Rights Reserved by 
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
