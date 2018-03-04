
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Orbitron:700" rel="stylesheet">
<title>ANGULAR XSS</title>
</head>
<body style="background-color: black"><center>
<font color="aqua" size="14" face="Orbitron">Challenge 04</font><br><br>
<style>
input[type=text]{border: 2px solid #00b2ee;border-radius: 4px;background-color: black;color: white;}
input::-webkit-input-placeholder{color:red;}
textarea:-moz-placeholder{color:#00b2ee;}
p.spacer{line-height:1em;}
input[type="submit"]{background-color: red;border: none;color: white;padding: 7px 32px;text-align: center;text-decoration: none;display:inline-block;font-size: 12px;margin: 4px 2px;cursor: pointer;}
</style>
<?php

    echo '

        <form action="" method="get">
        <p class="spacer"><input type="text" name="payload" style="text-align:center;width:350px;height:30px;font-size:20px;" placeholder="Payload" /><br>
        <p class="spacer"><input type="submit" value="Check" />
        </form>
        
    ';
    
    if(isset($_GET['payload']))
    {
        $payload=htmlentities($_GET['payload']);
        if(strlen($payload)>100)die();
        echo "<script src='//ajax.googleapis.com/ajax/libs/angularjs/1.6.0/angular.min.js'></script><div ng-app>$payload</div>";
    }


    
?>
<br>
<font color="white" size="5" face="Orbitron">
Angular :
</font>
<br>
<font color="red" size="4" face="Orbitron">
https://ajax.googleapis.com/ajax/libs/angularjs/1.6.0/angular.min.js
</font>
</body>
</html>