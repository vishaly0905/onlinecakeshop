<div style="border: 4px solid black; width: 100%: padding: 1px;">
          <marquee behavior="alternate"­><h2 style="color: black; font-family: cursive; font-size: 40px;padding-top: 6px;padding-bottom: 0px;margin-bottom: 1px;">Gems Cake Collection</h2></marquee>
     </div><br>
<div class="banner-section">
<div class="hero-banner cdp slick-initialized slick-slider" data-wdgtinfo="banners~herobanner~1" style="height: 316.438px;">
 
<div class="aspectRation hero">
<img src="https://i7.fnp.com/assets/images/custom/cake-2020/hero-banners/gems-cakes-Desk-new-26-may-2021.jpg" height="489px" width="1300" alt="Gems Cake Online">
</div><br>

<!--
<div aria-live="polite" class="slick-list draggable"><div class="slick-track" style="opacity: 1; height: 316.438px;"><a href="/rakhi-with-cakes?promo=cakes_micro_desk_banner" data-wdgt="~rakhi Cakes~1" class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="height: 316.438px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;">
<div class="aspectRation hero">
<img src="https://i7.fnp.com/assets/images/custom/cake-2020/hero-banners/rakhi-Desk-15-july-2021.jpg" alt="Gems Cake Online">
</div> 
<a href="/all-cakes?promo=cakes_micro_desk_banner" data-wdgt="~Birthday~2" class="slick-slide" data-slick-index="1" aria-hidden="true" style="width: 573px; position: relative; left: -573px; top: 0px; z-index: 998; opacity: 0; transition: opacity 500ms ease-in-out 0s;">

<div class="aspectRation hero">
<img src="https://i7.fnp.com/assets/images/custom/cake-2020/hero-banners/cake-hero-banner-desk.png" alt="Cake Online">
</div>
</a>  </div></div>-->

     

<!DOCTYPE html>
<html>
<head>
  <title></title> 

</head>
<body>
<?php
$selected_val=1;
?>
 
<div class="row">

  <?php 
 $db_host = "localhost:3306";
// Place the username for the MySQL database here
$db_username = "root"; 
// Place the password for the MySQL database here
$db_pass = "Aa@1mysql"; 
// Place the name for the MySQL database here
$db_name = "cakes";

// Run the actual connection here 
$myConnection= mysqli_connect("$db_host","$db_username","$db_pass","$db_name") or die ("could not connect to mysql");
//mysqli_select_db($myConnection,"cakes") or die ("no database");        


  $query = "SELECT * FROM tblproducts WHERE status='available' GROUP BY product_code";
  $result = mysqli_query($myConnection,$query);
if (mysqli_num_rows($result)>0) 
{
 while ($row=mysqli_fetch_array($result)) 
{
    $_SESSION['zero'] = $row["available"];
    $_SESSION['one'] = $row["product_code"];
if ($_SESSION['zero']==1) {
   $sqls = "UPDATE tblproducts SET status = 'Unavailable' WHERE product_code='".$_SESSION['one']."'";
     mysqli_query($myConnection,$sqls)or die(mysqli_error($myConnection));
}
   ?>
   <br>
<div class="col-lg-3">
  <div class="card mb-3">
    <div class="card-body">
      <form method="post" action="index.php?action=add&id=<?php echo $row["product_code"]; ?>" >
         <center><img src="img/<?php echo $row["product_name"]; ?>.jpg" style="width: 300px">
         <h4 class="text-info"><?php echo $row["product_name"]; ?></h4>
         <h5 class="text-info">Available Qty:(<?php echo $row["available"]; ?>)</h5>
         <form name="form" action="" method="post" >
  
  <select type="hidden" name='quantity1' >
  <!--<option value="" selected disabled hidden>Choose weight</option>-->
<option  value="0.5" >0.5 KG</option>
<option  value="1.0" selected>1.0 KG</option> 
<option  value="1.5" >1.5 KG</option>
<option  value="2.0" >2.0 KG</option>
<option  value="2.5" >2.5 KG</option>
<option  value="3.0" >3.0 KG</option>
<option  value="4.0">4.0 KG</option>
<option  value="5.0">5.0 KG</option>
</select>
<input class="form-control" type="submit" name="submit" value="Select weight" />
                                  </form>
                                  <?php
if(isset($_POST['submit'])){
$selected_val = $_POST['quantity1'];  // Storing Selected Value In Variable
echo "\n You have selected :" .$selected_val." KG";  // Displaying Selected Value
}
?>
          <h4 width="200"  style="text-decoration: line-through" style="text-align: center">
                                     &#8377 <?php 
                                     $price=$row["selling_price"]*$selected_val;
                                     echo $price+($price*$selected_val/10); ?>.00 <h6><?php echo $selected_val*10 ?>% Saving</h6></h4>
         <h4 class="text-danger">&#8377 <?php echo $row["selling_price"]*$selected_val; ?>.00</h4>
       <input class="form-control" type="hidden" placeholder="Quantity" name="quant" value="1">
       <input class="form-control" type="hidden" name="av" value="<?php echo $row["available"]; ?>">
       <input class="form-control" type="hidden" name="hiddenname" value="<?php echo $row["product_name"];?>">
       <input class="form-control" type="hidden" name="hiddenprice" value="<?php echo $row["selling_price"]*$selected_val; ?>">
       <details>
       <summary>Description</summary>
       <section class="flex-row-grow  " id="attr-container">

                        <div class="pdp-sub-header" style="margin-top:24px;"></div>
                                    <div class="pdp-description" style="margin-top:16px;">
                                        This classic round <?php echo $row["product_name"]; ?>  makes a highly tempting gift. It weighs <?php echo $selected_val ?> kg, and is stuffed with whipped cream and studded with cherries. Its eggless version is also available. You can give this gift on any joyous occasion.<br> 
                                        <h2>Key attributes :</h2>
                                    </div>

                                        <ul class="sDescExtra attr"><li class="pdp-description">Weight : <?php echo $selected_val ?> Kg</li><li class="pdp-description">Flavours : <?php echo $row["product_name"]; ?> </li><li class="pdp-description">Shape : Round </li><li>By order now,You are saving :&#8377 <?php echo $price*$selected_val*0.1;  ?> </li><div class="clear"></div></ul>


                            <div id="more-details" style="margin-top: 20px; display: none;"><span onclick="toggleDetails()" class="pdp-blue-header">More details</span></div>
                                
                            
                    </section>
</details>
       <input class="btn btn-success" type="submit" name="add_to_cart" value="Add to Cart" style="margin-top: 10px"></center>
     </form>
    </div>
  </div>
</div>
<?php
}
}
?>
</div>

</body>
<?php 
if (isset($_POST["add_to_cart"])) 
{
  $av = $_POST['av'];
$qq = $_POST["quant"];
  if ($av > $qq) {

  if (isset($_SESSION["cart"])) 
{
  $itemarrayid = array_column($_SESSION["cart"], "ids");
  if (!in_array($_GET["id"], $itemarrayid)) {
   
    $count=count($_SESSION["cart"]);
    $itemarray = array(
     'ids' => $_GET["id"],
     'name' => $_POST["hiddenname"],
     'price' => $_POST["hiddenprice"],
     'quantity' => $_POST["quant"],
     'weight' => $_POST['quantity1']);
     
     $_SESSION["cart"][$count] = $itemarray;
    echo "<script>alert('Product is added to your cart!')</script>";
    echo "<script>window.location = 'index.php'</script>";
  }else{
    echo "<script>alert('Item Already Added')</script>";
    echo "<script>window.location = 'index.php'</script>";
  }
}
else
{
  $itemarray = array(
  'ids' => $_GET["id"], 
  'name' => $_POST["hiddenname"],
  'price' => $_POST["hiddenprice"],
  'quantity' => $_POST["quant"],
  'weight' => $_POST['quantity1']);
  
  $_SESSION['cart'][0] = $itemarray;
  echo "<script>alert('Product is added to your cart!')</script>";
    echo "<script>window.location = 'index.php'</script>";
}
}else{
        echo '<script>alert("Invalid Quantity")</script>';
      echo '<script>window.location="index.php"</script>';
}
}


 ?>
</html>