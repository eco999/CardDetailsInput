<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Card input</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/validation.js"></script>
</head>

<body>
	<h2>Payment Options</h2>
	<hr>
	<label class="boldlabel">Debit / Credit Card</label>
	<img src="image/MasterCard.jpg" class="processorImg" id="processorImg">
    <section class="inputContainer" name="inputContainer">
		<div id="inputDetails">


			<form method="POST" action="index.php" id="submissionForm">
				<br>
				<label>Card Number </label>
				<input type="text" id="cardNumberInput" name="cardNumberInput" maxlength="16">

				<br>
				<br>

				<label>Expiration Date </label>
				<select id="monthSelector" name="monthSelector">
					<optgroup label="Month">
						<option selected disabled hidden>Month</option>
						<option value="01">January</option>
						<option value="02">February</option> 
						<option value="03">March</option> 
						<option value="04">April</option> 
						<option value="05">May</option> 
						<option value="06">June</option> 
						<option value="07">July</option> 
						<option value="08">August</option> 
						<option value="09">September</option> 
						<option value="10">October</option> 
						<option value="11">November</option> 
						<option value="12">December</option> 
					</optgroup>
				</select>
				<select id="yearSelector" name="yearSelector">
					<optgroup label="Year">
						<option selected disabled hidden>Year</option>
						<option>2020</option>
						<option>2021</option>
						<option>2022</option>
						<option>2023</option>
						<option>2024</option>
						<option>2025</option>
					</optgroup>
				</select>

				<br>
				<br>

				<label>Security Code </label>
				<input type="text" id="securityCodeInput" maxlength="4" name="securityCodeInput">
				<br>
				<label class="cvvHelp">(3-4 digit normally on the back of your card)</label>

				<br>
				<br>

				<input type="submit" class="continue" value="Continue" onclick="validateCard()">
				<input type="text" id="jsValidCheck" name="jsValidCheck" hidden>
			</form>
			<?php 
				$conn = mysqli_connect("localhost","root","","creditcard");
				if(!$conn)
				{
					die("fail");
				}
				error_reporting(0);
				$result=$_POST["jsValidCheck"]; 
				$ccnum=$_POST["cardNumberInput"];
				$month=$_POST["monthSelector"];
				$year=$_POST["yearSelector"];
				$seccode=$_POST["securityCodeInput"];
				$expdate=$year."-".$month."-01";
				echo $expdate;
				
				if($result=="true")
				{
					$insertCard = "INSERT INTO card (ccnum, expdate, seccode) VALUES (".$ccnum.", '".$expdate."', ".$seccode.")";
					$conn->query($insertCard);
				}
				else
				{

				}
			?>
		</div>
		<br>
		<br>
		<br>
		<br>
    </section>

    </header>
</body>
</html>