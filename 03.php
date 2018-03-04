<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Orbitron:700" rel="stylesheet">
<title>FILTRED XSS</title>
</head>
<body style="background-color: black"><center>
<font color="aqua" size="14" face="Orbitron">Challenge 03</font><br><br>
<style>
input[type=text]{border: 2px solid #00b2ee;border-radius: 4px;background-color: black;color: white;}
input::-webkit-input-placeholder{color:red;}
textarea:-moz-placeholder{color:#00b2ee;}
p.spacer{line-height:1em;}
input[type="submit"]{background-color: red;border: none;color: white;padding: 7px 32px;text-align: center;text-decoration: none;display:inline-block;font-size: 12px;margin: 4px 2px;cursor: pointer;}
</style>
<?php
    function check($input)
    {
        if(strlen($input)>32)die();
        if(preg_match("/(\(|\)|win|new|on|=|;|,|`|&|#|\\|!)/i", $input)) die();
        for ($i = 0; $i <= 32; $i++) {
            if(strpos($input,chr($i)))die();
        }
    }
    
    echo '
<form action="" method="get">
<p class="spacer"><input type="text" id="xss" name="xss" value="" style="text-align:center;width:350px;height:30px;font-size:20px;" placeholder="Payload" /><br>
<p class="spacer"><input type="submit" value="Check" />
</form>

<script>function win(){alert("Well Done");};</script>
    ';
    
    if(isset($_GET['xss']))
    {
        $xss=htmlentities($_GET['xss'],ENT_NOQUOTES);        
        check($xss);
        echo "<script>a:$xss</script>";
    }
   
?>
<br>
<font color="white" size="5" face="Orbitron">
Filters :
</font>
<br>
<font color="red" size="4" face="Orbitron">
/(\(|\)|win|new|on|=|;|,|`|&|#|\\|!)/i
</font>
</body>
</html>