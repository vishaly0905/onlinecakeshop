 <?php include('includes/connection.php');?>  

<!--header area-->
<?php include 'includes/header.php'; ?>

<!--sidebar area-->
<?php include 'includes/sidebar.php'; ?>

 <?php 
 if (isset($_GET["action"])) {
  if ($_GET["action"]=='delete') {
    foreach ($_SESSION["cart"] as $keys => $values) {
      if ($values['ids']==$_GET["id"]) {
        unset($_SESSION["cart"][$keys]);
        echo '<script>alert("Product is Remove")</script>';
        echo '<script>window.location="cart.php"</script>';
      }
    }
  }
} 
if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["cart"] as &$value){
    if($value['ids'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        
        break; // Stop the loop after found the product
    }
}

    
}
?>

 <div class="card mb-3">
            <div class="card-header">
              <center><h2 class="fas fa-shopping-cart">Cart(s)</h2></center>
            <div class="card-body">
              <div class="table-responsive">

                            <table class="table " width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                      <th >Image</th>
                                        <th width="200">Product</th>
                                        
                                        <th width="100">Weight</th>
                                        <th width="100">Quantity</th>
                                        <th width="200">Price (for 1 quantiry)</th>
                                        <th width="10">Total Price</th> 
                                        <th width="0">Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                if (!empty($_SESSION["cart"])) {
                                  $_SESSION['mm']=0;
                                  foreach($_SESSION["cart"] as $keys => $values){
                                    
                                    ?>
                                    <tr>
                                      <td><img src="img/<?php echo $values["name"]; ?>.jpg" style="width: 300px"></td>
                                      <td><?php echo $values["name"]; ?></td>
                                     

<!--<td>
  
  <form name="form" action="" method="post">
  
  <select name='quantity1' >
<option  value="0.5" >0.5 KG</option>
<option  value="1.0" selected>1.0 KG</option>
<option  value="1.5" >1.5 KG</option>
<option  value="2.0" >2.0 KG</option>
<option  value="2.5" >2.5 KG</option>
<option  value="3.0" >3.0 KG</option>
<option  value="4.0">4.0 KG</option>
<option  value="5.0">5.0 KG</option>
</select>
<input type="submit" name="submit" value="Select weight" />
                                  </form>
                                  //
//if(isset($_POST['submit'])){
//$selected_val = $_POST['quantity1'];  // Storing Selected Value In Variable
//echo "You have selected :" .$selected_val." KG";  // Displaying Selected Value
//}
//?>
                                 </td>-->




                                      <td>
                                       
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
mysqli_select_db($myConnection,"cakes") or die ("no database");        

								  
                $query = 'SELECT * FROM tblproducts where product_name="'.$values["name"].'"';
                    $result = mysqli_query($myConnection, $query) or die (mysqli_error($myConnection));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                           
                            
                            echo  $values["price"]/$row['selling_price'];
                            
                }
            ?> 
                                     
                                      Kg</td>
                                      <td>

<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $values["ids"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onchange="this.form.submit()">
<option <?php if($values["quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($values["quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($values["quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($values["quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($values["quantity"]==5) echo "selected";?> value="5">5</option>
<option <?php if($values["quantity"]==6) echo "selected";?> value="6">6</option>
<option <?php if($values["quantity"]==7) echo "selected";?> value="7">7</option>
<option <?php if($values["quantity"]==8) echo "selected";?> value="8">8</option>
<option <?php if($values["quantity"]==9) echo "selected";?> value="9">9</option>
<option <?php if($values["quantity"]==10) echo "selected";?> value="10">10</option>
<option <?php if($values["quantity"]==11) echo "selected";?> value="11">11</option>
<option <?php if($values["quantity"]==12) echo "selected";?> value="12">12</option>
<option <?php if($values["quantity"]==13) echo "selected";?> value="13">13</option>
<option <?php if($values["quantity"]==14) echo "selected";?> value="14">14</option>
<option <?php if($values["quantity"]==15) echo "selected";?> value="15">15</option>
<option <?php if($values["quantity"]==16) echo "selected";?> value="16">16</option>
<option <?php if($values["quantity"]==17) echo "selected";?> value="17">17</option>
<option <?php if($values["quantity"]==18) echo "selected";?> value="18">18</option>
<option <?php if($values["quantity"]==19) echo "selected";?> value="19">19</option>
<option <?php if($values["quantity"]==20) echo "selected";?> value="20">20</option>
</select>
</form>
</td>
                                      <td>&#8377 <?php echo $values["price"]; ?></td>
                                      <td>&#8377 <?php echo $values["quantity"] * $values["price"] ; ?></td>
                                      <td><a class="btn btn-danger" type="button" onclick="return confirm('Are you sure?')" href="cart.php?action=delete&id=<?php echo $values["ids"]; ?>">Remove</a></td>
                                    </tr>
                                    <?php 
                                    $name= $values["name"];
                                    

                                    $_SESSION['mm'] = $_SESSION['mm'] + ($values["quantity"] * $values["price"] );

                                  }
                                  ?>
                                
                             </tbody>
                             <tr>
                               <td colspan="4" align="right">Total Bill of Order</td>
                                  <td align="left">&#8377 <?php echo $_SESSION['mm']; ?></td>
                                  <td><a type="button" class="btn btn-success" href="addprod.php" >Proceed and Checkout</a></td>
                             </tr>
                               <?php
                                }
                                 ?>
                              </table>
                        </div>
                    
            </div>
           
          </div>

          
        </div>
        <?php include 'includes/footer.php'; ?>