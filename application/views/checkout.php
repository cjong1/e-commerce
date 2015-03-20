
<html>
<head>
	<title>Checkout</title>
	<style type="text/css">

	 table tbody tr td {
     	text-align: center;
     }
     button {
     	color: white;
     	background-color: blue;
     	box-shadow: 2px 2px 1px black;
     }
     .box {
     	height: 500px;
     	width: 50%;
     	border: 1px solid white;
     	box-shadow: 10px 10px 5px grey;
     	overflow: auto;
     	padding: 20px;
     	background-color: whitesmoke;
     	border-radius: 10px;
     	margin-left: 20%;
     }
     .red {
     	background-color: red;
     	color: white;
     }
     .form {
     	width: 90%;
     	background-color: #F0FFF0;
     	border-radius: 10px;
     	border: 1px solid silver;
     	box-shadow: 10px 10px 5px grey;
     	padding:5px;
     	margin-top: 75px;
     	margin-left: 20px;
     }
     .cart {
     	width: 90%;
     	background-color: #F0FFF0;
     	border-radius: 10px;
     	border: 1px solid silver;
     	box-shadow: 10px 10px 5px grey;
     	padding:15px;
     	margin-left: 20px;
     }
     .order {
     	height: 30px;
     	width: 75px;
     	margin-top: 10%;
     	margin-left: 45%;
     	box-shadow: 6px 6px 4px black;
     	font-size: 20px;
     }
     .cancel {
          height: 30px;
          width: 75px;
          margin-top: 10px;
          margin-bottom: 30px;
          margin-left: 45%;
          box-shadow: 6px 6px 4px black;
          font-size: 20px;
          background-color: red;
     }

     .delete {
          background-color:red;
          color: white;
     }

	</style>



</head>

<body>

<div class="container">

	<div class="box">

	<h2> Check Out</h2>
	<table class="cart">
		<thead>
			<tr>
				<th>Description:</th>
				<th>Price:</th>
				<th>Quantity:</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
               
<?php 

               $amount = 0;
               $overallq = 0;
               foreach($this->session->userdata('info') as $key=> $product)
               {
                
?>  
                  <tr>    
                  <td><?= $product['description'] ?></td> 

                    <td><?= $product['price']?> </td> 

<?php 
                   foreach ($this->session->userdata('cart') as $id => $quantity) {
                    
                         if($product['id'] ==$id ) {
?>  
                                   <td><?= $quantity ?></td> 
                                   <td><a href="/products/destroy/<?= $product['id'] ?>"><button class='delete'>Delete</button></a></td>
                             </tr>
<?php
                                   $overallq += $quantity;   
                                   $amount += $product['price'] * $quantity;
                         }
                    }  
               }
?>          
         
			<tr>	
				<td>Total</td>
				<td><?= $amount ?></td>
                    <td><?= $overallq ?></td>
			</tr>
		</tbody>
	</table>

	<div class="form">
		<h2> Billing Information: </h2>
		<form>
			<label>Name:</label><br>
			<input type="text" name="name" value="your name"><br>
			<label>Address:</label><br>
			<input type="text" name="address" value="where you live"><br>
			<label>Card:</label><br>
			<input type="text" name="card" value="give me your money"><br>
		</form>
	</div>

	<a href="/products/order/"><button class="order"> Order </button></a>
     <a href="/products/cancel/"><button class="cancel"> Cancel </button></a>

</div>


</body>

</html>