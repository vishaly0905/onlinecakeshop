<?php include('includes/connection.php');?>  

<!--header area-->
<?php include 'includes/header.php'; ?>

<!--sidebar area-->
<?php include 'includes/sidebar.php'; ?>

<!--breadcrumbs area-->
<!--breadcrumbs area-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Track Your Order</li>
          </ol>
          <?php
if(!isset($_SESSION["userid"])){
 header("Location: index.php");
}
else{
?>
<?php
}
?> 

<style type="text/css">
 .hh-grayBox {
	background-color: #F8F8F8;
	margin-bottom: 20px;
    margin-top: 20px;
}
.pt45{padding-top:45px;}
.order-tracking{
	text-align: center;
	width: 25.00%;
	position: relative;
	display: block;
}
.order-tracking .is-complete{
	display: block;
	position: relative;
	border-radius: 50%;
	height: 30px;
	width: 30px;
	border: 0px solid #AFAFAF;
	background-color: #f7be16;
	margin: 0 auto;
	transition: background 0.25s linear;
	-webkit-transition: background 0.25s linear;
	z-index: 2;
}
.order-tracking .is-complete:after {
	display: block;
	position: absolute;
	content: '';
	height: 14px;
	width: 7px;
	top: -2px;
	bottom: 0;
	left: 5px;
	margin: auto 0;
	border: 0px solid #AFAFAF;
	border-width: 0px 2px 2px 0;
	transform: rotate(45deg);
	opacity: 0;
}
.order-tracking.completed .is-complete{
	border-color: #27aa80;
	border-width: 0px;
	background-color: #27aa80;
}
.order-tracking.completed .is-complete:after {
	border-color: #fff;
	border-width: 0px 3px 3px 0;
	width: 7px;
	left: 11px;
	opacity: 1;
}
.order-tracking p {
	color: #A4A4A4;
	font-size: 16px;
	margin-top: 8px;
	margin-bottom: 0;
	line-height: 20px;
}
.order-tracking p span{font-size: 14px;}
.order-tracking.completed p{color: #000;}
.order-tracking::before {
	content: '';
	display: block;
	height: 3px;
	width: calc(100% - 40px);
	background-color: #f7be16;
	top: 13px;
	position: absolute;
	left: calc(-50% + 20px);
	z-index: 0;
}
.container{
    padding-left:100px;
    padding-top:50px;
    padding-bottom :20px;
}
.order-tracking:first-child:before{display: none;}
.order-tracking.completed:before{background-color: #27aa80;}
.o_id{
    
    margin-left:0px;
}
.order_id{
    padding-bottom: 40px;
}
 </style>
 
 
 <div class="order_id">
     <form class="" method="post">
         <h3 style="text-align: center">Enter Your Order No. here:
         <input class="" type="text" name="order_id" value>
         <input class="" type="submit" name="submit" value="Track Order" />
                                  </form>
                                  <?php
$selected_val=1;                                 
if(isset($_POST['submit'])){
$selected_val = $_POST['order_id'];  // Storing Selected Value In Variable
//echo "\n You ha :" .$selected_val."";  // Displaying Selected Value
}
?></h3>
         
</form>
     </div>
     


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

              if($selected_val==1){  
                $query = "SELECT * FROM tbltransacdetail  WHERE customer_id='".$_SESSION['userid']."'  ";
                    $result = mysqli_query($myConnection, $query) or die (mysqli_error($myConnection));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                  
                            $Ddate=$row['delivery_date'];
                                  $Odate=$row['date'];  
                                  $remark=$row['remarks'];  
                                  $status=$row['status']; 
                                  $id=$row['transac_code'];             
                         /*   echo '<tr>';
                            echo '<td>'. $row['detail_id'].'</td>';
                            echo '<td>'. $row['transac_code'].'</td>';                     
                            echo '<td>'. $row['date'].'</td>';
                            echo '<td>'. $row['delivery_date'].'</td>';
                            echo '<td>&#8377 '. $row['totalprice'].'</td>';
                            echo '<td>'. $row['status'].'</td>';
                            echo '<td>'. $row['remarks'].'</td>';
                            echo '<td>  ';
                            echo '<center> <a class="btn btn-info" title="View list Of Ordered" href="orderdetail.php?id='. $row['transac_code'].'">View detail</a> </center></td>';
                            echo '</tr> ';*/
                }
            }
              else{  $query = "SELECT * FROM tbltransacdetail  WHERE customer_id='".$_SESSION['userid']."' and transac_code = '".$selected_val."' ";
                $result = mysqli_query($myConnection, $query) or die (mysqli_error($myConnection));
              
                    while ($row = mysqli_fetch_assoc($result)) {
                              
                        $Ddate=$row['delivery_date'];
                              $Odate=$row['date'];  
                              $remark=$row['remarks'];  
                              $status=$row['status'];
                              $id=$row['transac_code'];           
                     /*   echo '<tr>';
                        echo '<td>'. $row['detail_id'].'</td>';
                        echo '<td>'. $row['transac_code'].'</td>';                     
                        echo '<td>'. $row['date'].'</td>';
                        echo '<td>'. $row['delivery_date'].'</td>';
                        echo '<td>&#8377 '. $row['totalprice'].'</td>';
                        echo '<td>'. $row['status'].'</td>';
                        echo '<td>'. $row['remarks'].'</td>';
                        echo '<td>  ';
                        echo '<center> <a class="btn btn-info" title="View list Of Ordered" href="orderdetail.php?id='. $row['transac_code'].'">View detail</a> </center></td>';
                        echo '</tr> ';*/
            }
            
        }
            ?>
               <h3 style="text-align: center">Order No.:<?php echo $id; ?></h3>
               <div class="container">
  <div class="row">
						<div class="col-12 col-md-10 hh-grayBox pt45 pb60">
							<div class="row justify-content-between">
								<div class="order-tracking completed">
									<span class="is-complete"></span>
									<p><?php 
              if($status=="Cancelled")
                   {
                    echo 'Order Cancel' ;

                   }
               else{
                        echo 'Ordered' ;
               }    
            ?><br><span>
                                <?php 
                                    //$date->modify("-1 day");
                                    
                                    echo $Odate ;?></span></p>
								</div>
                                
								<div <?php 
              if($status=="Confirmed")
                   {
                    echo 'class="order-tracking completed"' ;

                   }
               else{
                        echo 'class="order-tracking completed"' ;
               }    
            ?> >
									<span class="is-complete"></span>
									<p><?php 
              if($status=="Confirmed")
                   {
                    echo 'Confirmed' ;

                   }
                   else if($status=="Cancelled")
                   {
                    echo 'Cancelled' ;

                   }
               else{
                        echo 'Pending' ;
               }    
            ?><br><span><?php 
            $Sdate=date_create($Ddate);
            date_modify($Sdate,"-1 days");
            $todayD=date_format($Sdate,"Y-m-d");    
                                     if($Odate==$Ddate){
                                                          echo $Ddate;
                                                        }
                                    else if($todayD==$Odate)  {
                                        echo $Odate;
                                    }                 
                                    else{
                                                               $Cdate=date_create($Odate);
                                                                date_modify($Cdate,"+1 days");
                                                               echo date_format($Cdate,"Y-m-d");
                                        }
                                                               ?></span></p>
								</div>
								<div <?php
                                $mydate=getdate(date("U"));
                                $today="$mydate[year]-$mydate[mon]-$mydate[mday]";
                                                                $Sdate=date_create($Ddate);
                                                                date_modify($Sdate,"-1 days");
                                                                $todayD=date_format($Sdate,"Y-m-d");
                                    if($today==$todayD or ($today==$Ddate and $status=="Confirmed")){
                                        echo 'class="order-tracking completed"' ;
                                    }
                                    else{
                                        echo 'class="order-tracking"' ;
                                    }                            
                                ?>
                                >
									<span class="is-complete"></span>
									<p>Shipped<br><span>
                                    <?php 
                                                    if($Odate==$Ddate){
                                                         echo $Ddate;
                                                    }
                                                    else{           $Sdate=date_create($Ddate);
                                                                date_modify($Sdate,"-1 days");
                                                               echo date_format($Sdate,"Y-m-d");
                                                    }?></span></p>
								</div>
                                <div <?php
                                $mydate=getdate(date("U"));
                                $today="$mydate[year]-$mydate[mon]-$mydate[mday]";
                                                                
                                    if($today==$Ddate and $status=="Confirmed"){
                                        echo 'class="order-tracking completed"' ;
                                    }
                                    else{
                                        echo 'class="order-tracking"' ;
                                    }                            
                                ?>>
									<span class="is-complete"></span>
									<p>Delivered<br><span><?php 
                                                               
                                                                echo $Ddate;
                                                                ?> </span></p>
								</div>
							</div>
						</div>
					</div>
                   
</div>

<h3 style="text-align: center"><?php 
              if(!$remark)
                   {
                    echo 'Your order is Pending. Please check your list of order for notification of confirmation.' ;

                   }
               else{
                        echo $remark ;
               }    
            ?></h3>
            <div class="feedback">
<?php
if($today==$Ddate and $status=="Confirmed"){
    echo '<input type="button" value="Feedback"';
}
?>
</div>
            
                                         
        <!-- /.container-fluid -->

<?php include 'includes/footer.php'; ?>
<?php include 'addtransac.php'; ?>