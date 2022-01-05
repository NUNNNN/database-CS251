<?php include('server.php'); ?>
<?php 
    session_start();
if (!isset($_SESSION['username'])) {
   $_SESSION['msg'] = "You must log in first";
   header('location: login.php');
}

if (isset($_GET['logout'])) {
   session_destroy();
   unset($_SESSION['username']);
   header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Load icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body{
            font-family: 'Montserrat', sans-serif;
            font-family: 'Open Sans', sans-serif;
            font-family: 'Prompt', sans-serif;
        }

        h1,h2,h3{
            font-family: 'Open Sans', sans-serif;
            font-family: 'Prompt', sans-serif;
        }

        .header{
            width: 100.0%;
            height: 20.0%;
            position: absolute;
            background-color: #C1C1C1;
            font-size: 35px;
        }

        table {
            font-family: 'Open Sans', sans-serif;
            font-family: 'Prompt', sans-serif;
            border-collapse: collapse;
            width: 100.0%;
        }

        td, th {
            border-collapse: collapse;
            text-align: center;
            font-size: 35px;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .footer {
            width: 100.0%;
            height:170px;
	        /* position:absolute; */
	        bottom:0px;
            background-color: black;
            text-align: left;
            font-family: 'Open Sans', sans-serif;
            font-family: 'Prompt', sans-serif;
        }       
        .dropbtn {
            background-color: black;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            font-family: 'Open Sans', sans-serif;
            font-family: 'Prompt', sans-serif;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            font-family: 'Open Sans', sans-serif;
            font-family: 'Prompt', sans-serif;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-family: 'Open Sans', sans-serif;
            font-family: 'Prompt', sans-serif;
            font-size: 16px;
        }

        .dropdown-content a:hover {background-color: #f1f1f1}

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }

        .blank {
            background-color: white;
            width: 11%;
            height: 100%;
            display: inline-block;
        }

        figure{
            width: 200px;
        }

        figure img{
            width: 100%;
        }

        figure figcaption{
            text-align: center;
        }

        .boxicon {
          width: 125px;
          height: 125px;
          border: 5px solid lightgray;
        }

        .boxiconselect {
          width: 125px;
          height: 125px;
          border: 5px solid chartreuse;
        }

        .concerticon {
          width: 300px;
          height: 750px;
          border: 1px solid lightgray;
        }

        .mypurchases {
          background-color: white;
          width: 600px;
          margin-left: 20%;
          margin-top: 50px;
        }

        icon{
            width: 125px;    
        }

        icon img{
            width: 100%;
        }

        concert img{
            width: 100%;
        }

        .columnicon {
          float: left;
          width: 20%;
          padding: 15px;
        }

        .boxconcert {
            text-align: center;
            display: flex:
            width: 900px;
            margin-left: 12%;
            margin-top: 20px;
            padding: 25px;
        }

        .columnconcert {
            float: left;
            width: 25%;
            padding: 25px;
        }

        .rowconcert:after {
            content: "";
            display: table;
            clear: both;
        }
        
  .normal {
          font-weight: normal;
          }
  .light {
          font-weight: lighter;
          }

        
          .alignleft {
          float: left;
          line-height: 1px;
          }
          .alignright {
          float: right;
          line-height: 1px;
          }
          .button {
        background-color: SpringGreen; /* Green */
        border: none;
        width: 65%;
        color: white;
        padding: 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 5px 2px;
        cursor: pointer;
        border-radius: 12px;
        }
        .button:hover {
            background-color: #2EFF00;
        }

        .btn-text-center{
	        text-align: center;	
        }

        /* The Modal (background) */
        .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 50px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 25%;
        }

        /* The Close Button */
        .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        }

        .close:hover,
        .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
        }
    </style>
    
    <title>wowTicket</title>
</head>
<body>
<table>
    <tr>
    <th><a href="loginlaew.php" style="text-decoration:none">wowTicket</th>
    <th><form class="example" action="finding.php" method="GET">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit"  value="Search" ><i class="fa fa-search"><a href= "finding.php"></a></i></button>
    </form></th>
    <th><div class="dropdown">  
        <!-- logged in user information -->
        <button class="dropbtn">PROFILE</button>
        <div class="dropdown-content">
        <a href="editprofile.php">Edit Profile</a>
        <a href="myticket.php">My Tickets</a>
        <a href="mypurchases.php">My Purchases</a>
        </div>
        <?php if (isset($_SESSION['username'])) : ?>
        
        <span style="font-size:15px;color:#B2B2B2; font-weight:normal;">&emsp;
              Welcome <strong><?php echo $_SESSION['username']; ?></strong>
                <!-- <p><a href="loginlaew.php?logout='1'" style="color: red;">Logout</a></p> -->
        <?php endif ?>
    </div></th>
    <th><a href="yangmaidailogin.php"><input type="button" value="LOG OUT"></th>
  </tr>
</table>

 <!-- pic -->
<div class = "mypurchases"><h1 align="left">My Tickets</h1></div>
<?php
    $name = $_SESSION['username'];
    
    $sql = 
    "SELECT name.FirstName, name.LastName,
    customer.Customer_ID, customer.Username, 
    customer_order.CustomerOrder_ID, customer_order.Concert_ID, customer_order.Status,
    date.Date,
    concert.Concert_Name, concert.Img, 
    location.Location_Name,
    ticket.Zone, ticket.SeatNum, ticket.Price, ticket.TicketType
    FROM ((((((customer
    INNer JOIN name ON customer.Customer_ID = name.Customer_ID)
    INNER JOIN customer_order ON customer.Customer_ID = customer_order.Customer_ID)
    INNER JOIN date ON customer_order.Concert_ID = date.Concert_ID)
    INNER JOIN concert ON customer_order.Concert_ID = concert.Concert_ID) 
    INNER JOIN location ON customer_order.Concert_ID = location.Concert_ID) 
    INNER JOIN ticket ON customer_order.CustomerOrder_ID = ticket.CustomerOrder_ID)
    WHERE customer.Username = '$name' AND customer_order.Status = 'success'
    ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) :
    // output data of each row
?>
<div class = "boxconcert">
    <div class= "rowconcert">         
    <?php
    while($row = $result->fetch_assoc()):
    ?>
           
           <div class = "columnconcert">
                    <div class = "concerticon">
                        <concert>
                            <a href= "toPay.php">
                            <img src=  "data: image/jpeg;base64, <?php echo base64_encode($row['Img'])?> ">
                            </a>
                            <p style="font-size:19px;">&nbsp; <?php echo $row['Concert_Name']?></p>
                            <p>&nbsp; <?php echo $row['Date']?></p>
                            
                            <p style ="color:gray;font-size:12px"><img src="img\map-locator.png" style="width:5%">&nbsp; <?php echo $row['Location_Name']?></p>
                            <p  style ="color:brown;font-size:15px">&nbsp;Zone  <?php echo $row['Zone']?>, <?php echo $row['SeatNum']?></p>
                            <p  style ="color:brown;font-size:15px">&nbsp;<?php echo $row['Price']?>THB</p>
                              <!-- modal -->     
                            <!-- Trigger/Open The Modal -->
                            <div class="btn-text-center"><button name="ticket" class="button" id="myBtn">View Ticket</button></div>
                        </concert>
                    </div>
            </div>
    <!-- The Modal -->
            <div id="myModal" class="modal">

            <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h3><?php echo $row['Concert_Name']?></h3>
                    <p><?php echo $row['Date']?></p>
                        <img src="image\map-locator.png" style="width:20px;float:left">
                        <p style ="color:gray;font-size:12px"><?php echo $row['Location_Name']?></p>
                        <img  src="image\qr-code.png" style="width: 100%">
                        <p class="alignleft" >Ticket Type: <span style="color:gray"><?php echo $row['TicketType']?></span></p>
                        <p class="alignright">Zone&nbsp;<span style="color:gray"><?php echo $row['Zone']?></span></p>
                        <div style="clear: both;"></div>
                        <p class="alignleft">Price:<span style="color:gray"> <?php echo $row['Price']?> Bath</span></p>
                        <p class="alignright">SeatNo.&nbsp;<span style="color:gray"><?php echo $row['SeatNum']?></span></p>
                        <div style="clear: both;"></div>
                        <h4><?php echo $row['FirstName']?>&nbsp;&nbsp;<?php echo $row['LastName']?></h4>
                    </br></br></br></br>         
                </div>
            </div>
         
    <?php endwhile ?> 
    <?php    else : ?>
        <h2 style="margin:200px;"><?php echo "0 results" ?></h2>
    <?php endif ?>     
            
            
     </div>    
</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
//var btn = document.querySelector("[name='']");
//var btn = document.getElementsByName("ticket")[0] || document.getElementsByName("ticket")[1];
var btn = document.getElementById("myBtn");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

    </br></br></br></br>
    </div> 
    </div>
    <div style = "height:800px">
    
</div>
   <div class="footer">
   <footer><a href="loginlaew.php"><h2><p style="color:white;">wowTicket</p></h3></footer>
   <footer><a href="contact.php"><p style="color:white;">help</p></footer>
   <footer><a href="contact.php"><p style="color:white;">Support</p></footer>
    </div>
</body>
</html>