<html>
<head>
	<title>E-Commerce</title>
 	 <link rel="stylesheet" href="assets/css/normalize.css">
     <link rel="stylesheet" href="assets/css/skeleton.css">
     <style type="text/css">
     
     table tbody tr td {
     	text-align: center;
     }

     div h3 {
     	margin-left: 75%;
     	margin-top: -50px;
     }

     div h3:hover {
     	color: blue;
     	font-family: 'Times New Roman';
     }

     .box {
     	height: auto;
     	width: 70%;
     	border: 1px solid white;
     	box-shadow: 10px 10px 5px grey;
     	overflow: auto;
     	padding: 20px;
     	background-color: whitesmoke;
     	border-radius: 10px;
     }
     .button {
     	background-color: #7CFC00;
     	color: #228B22;
     }
     .button2{
     	background-color: white;
     	color:blue;
     }
     .button:hover {
     	background-color: #ADFF2F;
     	box-shadow: 3px 3px 1px #00FA9A;
     	color:white;
     }

     </style>

</head>
<body>

<div class="container">
	<div class="row">
		<h2> Products </h2>
		<a href="/products/checkout">
		<h3><u> Your Cart ( 
			
		   <?php 
		   $overallq =0;  
               foreach ($this->session->userdata('cart') as $quantity) 
               {
               		$overallq += $quantity;   
               }
               echo $overallq;
           ?>

			) </u></h3>
		</a>
	</div>

	<div class="row">
		<div class="twelve columns">
			<div class="box">
			<table>
				<thead>
					<tr>
						<th>Description:</th>
						<th>Price:</th>
						<th>Quantity:</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<form action="products/checkout/" method="post">
					<?php 
						foreach ($products as $product) 
						{
					?>
						<tr>
							<td><?= $product['description'] ?></td>
							<td><?= $product['price'] ?></td>
							<td><input type="number" min='0' name="<?= $product['id'] ?>"><td>
							<button class="button" formaction="/products/add_product/" >Update</button>
							</td>
						</tr>
										
						<?php } ?>
						<input type="submit" value="checkout">	
	
						</form>
							
				
				</tbody>
			</table>
		</div>

		</div>
	</div>
</div>

</body>


</html>
