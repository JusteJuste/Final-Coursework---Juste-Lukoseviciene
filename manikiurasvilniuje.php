<?php

    $Name = isset($_POST['Name']) ? $_POST['Name'] : '';
    $Address = isset($_POST['Address']) ? $_POST['Address'] : '';
    $telefonas = isset($_POST['telefonas']) ? $_POST['telefonas'] : '';
    $content = isset($_POST['content']) ? $_POST['content'] : '';
    $procedura1 = isset($_POST['procedura1']) ? true : false;
    $procedura2 = isset($_POST['procedura2']) ? true : false;
    $procedura3 = isset($_POST['procedura3']) ? true : false;


    $success = isset($_GET['success']) ? $_GET['success'] : '';
    $error = array("Name" => "","Address" => "", "telefonas" => "","database" => "");



    if($_POST){
		if(strlen($Name) == 0 || strlen($Address) == 0 || strlen($telefonas) == 0){
			if(strlen($Name) == 0){
				$error['Name'] = 'Error';
			}
			if(strlen($Address) == 0){
				$error['Address'] = 'Error';
			}
			if(strlen($telefonas) == 0){
				$error['telefonas'] = 'Error';
			}
   
   

    } else {

        $conn = new mysqli('localhost','root','root','manikiuras');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $Name = isset($_POST['Name']) ? $_POST['Name'] : '';
        $Address = isset($_POST['Address']) ? $_POST['Address'] : '';
        $telefonas = isset($_POST['telefonas']) ? $_POST['telefonas'] : '';
        $content = isset($_POST['content']) ? $_POST['content'] : '';
        $procedura1 = isset($_POST['procedura1']) ? true : false;
        $procedura2 = isset($_POST['procedura2']) ? true : false;
        $procedura3 = isset($_POST['procedura3']) ? true : false;
    
        $saved = $conn->query("INSERT INTO manikiurasvilniuje (Name, Address, telefonas, content, procedura1, procedura2, procedura3)
             VALUES ('$Name','$Address','$telefonas', '$content', '$procedura1', '$procedura2','$procedura3')");
        if($saved){
            header('Location: ' . $_SERVER['PHP_SELF'] . '?success=OK');
		}else{
                $error['database'] = "Error when saving";
        }


    }
}

    
    if(strlen($success) == 0) {    


?>

<!DOCTYPE HTML>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Manikiuras Vilniuje</title>
    <link rel="stylesheet" type="text/css" href="normalize.css"/>
    <link rel="stylesheet" type="text/css" href="style1.css"/>
    <link rel="stylesheet" type="text/css" href="manikiuras2.css"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">    
</head>

<body>
<header>

<div class="inner containerA">
    <div class="nav">
        <label for="toggle">&#9776;</label>
        <input type="checkbox" id="toggle"/>
            <div class="menu">
                <a class="pradzia1" href="read.php">Pradžia</a>
                <a class="pradzia" href="#vietos">Vietos</a>
                <a class="pradzia" href="contacts.html">Kontaktai</a>
                <a class="active" href="manikiurasvilniuje.php">Registracija</a>


            </div>
    </div>
<div>


</header> 

<div class="bottletext">
<img class="bottle" src="bottle4.jpg" alt="bottle"/>

<p class="manikiurasvilniuje">MANIKIŪRAS VILNIUJE</p>
<p class="raskmeistre">Rask meistrę arčiau namų</p>
<p class="www">www.manikiurasvilniuje.lt</p>

</div>


    <div class="pinkfonas">
        <div class="pinktext">    
            <h2 class="reg ">Darai manikiūrą Vilniuje?<br> Nori būti randama kaimynių?</h2>
            <h2 class="reg bold">Užsiregistruok!</h2>
        </div>
    <h3 id="succes"></h3>
    <form class="w3-container w3-card-4 w3-light-grey" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <p>Kaip vadiniesi? <br><input type="text" name="Name" class="w3-input w3-border" placeholder="pavadinimas" value="<?php echo $Name; ?>"/></p>
        <p>Kokiu adresu atlieki procedūras? <br><input type="text" name="Address" class="w3-input w3-border" placeholder="gatvė, namo nr., pašto kodas, miestas" value="<?php echo $Address; ?>"/></p>
        <p>Kokias procedūras atlieki? <br>
            <input type="checkbox" name="procedura1" value=<?php echo $procedura1; ?>> Gelinį lakavimą</br>
            <input type="checkbox" name="procedura2" value=<?php echo $procedura2; ?>> Manikiūrą</br> 
            <input type="checkbox" name="procedura3" value=<?php echo $procedura3; ?>> Pedikiūrą</br> 
        <p>Kontaktinis tel.nr. <br><input type="text" name="telefonas" class="w3-input w3-border" placeholder="86xxxxxxx" value="<?php echo $telefonas; ?>"/></p>
        <p>Papildoma informacija: <br><textarea name="content" class="w3-input w3-border"><?php echo $content; ?></textarea></p>
        <?php echo $error['database']; ?>
        <p><?php echo $success; ?>
        <p><input type="submit" value="Registruotis" /></p> 
    </div>
    </form>

    <footer>
        <div class="footer">
            ©2018 by Juste
        </div>
    </footer>

    <!--mygtukas UP-->
    <button onclick="topFunction()" id="myBtn" title="Go to top">Į viršų</button>
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
                document.getElementById("myBtn").style.display = "block";
            } else {
                 document.getElementById("myBtn").style.display = "none";
                }
            }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>        



</body>
</html>

<?php
	} else {
		echo '<script type="text/javascript">
           window.location = "manikiurasvilniuje.php";
      </script>';
	}
?>