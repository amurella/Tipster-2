<!DOCTYPE html>
<html lang="en">
 <head>
  <title>Tip Calculator</title>
 </head>
 <body>

 <?php 
 	$billTot = "";
 	$billTotErr = "";

 	function test_valid($data)
 	{
 		if($data >= 0 && is_numeric($data))
 			return true;
 		else
 			return false;
 	}
 ?>
 	<form action="tipCalculator.php" method="post">
	  Bill Subtotal: <br> <input type="text" name="billTotal" value="<?php echo isset($_POST['billTotal']) ? $_POST['billTotal'] : '0.00'?>">
	 <br>
	 <?php echo $billTotError ?>

    <?php
		for ($i = 10; $i <= 20; $i+= 5) {
	?>
		<input type="radio" name="tipVal" value="<?php echo $i?>" <?php if (isset($_POST['tipVal']) && $_POST['tipVal'] == $i) echo "checked";?>>
		<?php echo ($i) . '%';?><br>
	<?php } ?>

  	<input class="button" type="submit" name="submit">
	</form>

<?php
 if(isset($_POST['submit']))
 {
 	if(test_valid($_POST['billTotal']))
 	{
 		$tip = $_POST['tipVal'];
 		$billTotal = $_POST['billTotal'];
 		$tip = $tip * 1/100;
 		$tip = $billTotal * $tip;
 		$totalTip = $billTotal + $tip;
 		
 		echo "Tip: $".number_format($tip, 2);
 		echo "<br>";
 		echo "Total: $".number_format($totalTip, 2);
 		echo "<br>";
 	}
 	else
 	{
		$billTotErr = "Valid Bill Must Be Inputted";
		echo $billTotErr;
	}
 }
 ?>
 </body>
</html>