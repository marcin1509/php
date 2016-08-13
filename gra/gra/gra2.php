<HTML>
	<HEAD>
		<TITLE> GRA </TITLE>
	</HEAD>
	<style type="text/css">
	body {
		font-size : 20px;
		background: grey;
		text-align : center;
	}

	</style>
		<BODY>
	<P> 
	<b>Zgadnij liczbe </b>
	<form class = "formularz" action="gra2.php" method="POST">
		<input type="text" name="zgad" required> 
		<input type="submit" value="Wyslij">
	</form>
	</BODY>
	<?php
	session_start();
	class gierka{
		var $los;
		var $historia; 
		var $hist;
		
		function graj(){

			if (!isset($_SESSION['los'])){
				$_SESSION['los'] = rand(1,99);
				$historia[$hist] = $_SESSION['los'];
				echo $hist;
				$hist++;
			}
			
			if(isset($_POST['zgad'])){
				$zgad = $_POST['zgad'];
				$historia[$hist] = $zgad;
			}
			
			if($zgad == $_SESSION['los']){
				echo '<HTML>';
				echo '<HEAD';
				echo '</HEAD>';
				echo '<BODY>';
				echo 'Zgadles';
				
				
				
			    echo '<br>';
				echo "Ostatnio losowane liczby: ".$hist;
				for ($j=0; $j < $hist; $j++)
				{
					echo $historia[$j].' ';
					if (isempty($historia[$j])) {
						$j++;
						echo ' ';
					}
				}
				$hist++;
				session_destroy();
			}
		
			if ($zgad > $_SESSION['los']){
				echo '<HTML>';
				echo '<HEAD';
				echo '</HEAD>';
				echo '<BODY>';
				echo 'Za duza liczba';
				
			}
		
			if ($zgad < $_SESSION['los']){
				echo '<HTML>';
				echo '<HEAD';
				echo '</HEAD>';
				echo '<BODY>';
				echo "Za mala liczba";
			}
			
			
			if (!isset($_SESSION['licz'])){
				$_SESSION['licz'] = 1;
			}
			else {
				$_SESSION['licz']++;
			}
			echo '<br>';
			echo 'Strona odczytana '.$_SESSION['licz'];
			echo ' razy w ciagu tej sesji';
			echo '</BODY>';
			echo '</HTML>';
		}
	}	
?>

<?php
	$gierka = new gierka;
	$gierka -> graj();
	
?>

	
</HTML>