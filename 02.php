<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Orbitron:700" rel="stylesheet">
<title>LOOSE COMPARISON</title>
</head>
<body style="background-color: black"><center>
<font color="aqua" size="14" face="Orbitron">Challenge 02</font><br><br>
<style>
input[type=text]{border: 2px solid #00b2ee;border-radius: 4px;background-color: black;color: white;}
input::-webkit-input-placeholder{color:red;}
textarea:-moz-placeholder{color:#00b2ee;}
p.spacer{line-height:1em;}
input[type="submit"]{background-color: red;border: none;color: white;padding: 7px 32px;text-align: center;text-decoration: none;display:inline-block;font-size: 12px;margin: 4px 2px;cursor: pointer;}
</style>

<form action="02.php" class="authform" method="post" accept-charset="utf-8">
<p class="spacer"><input type="text" id="s" name="s" value="" style="text-align:center;width:350px;height:30px;font-size:20px;" placeholder="Salt" /><br>
<p class="spacer"><input type="text" id="h" name="h" value="" style="text-align:center;width:350px;height:30px;font-size:20px;" placeholder="Hash" /><br>
<p class="spacer"><input type="submit" name="submit" value="Check" />
<div class="return-value" style="padding: 10px 0">&nbsp;</div>
</form>

<font color="white" size="5" face="Orbitron">
<?php
function gen_secured_random() { 
    $a = rand(1337,2600)*42;
    $b = rand(1879,1955)*42;

    $a < $b ? $a ^= $b ^= $a ^= $b : $a = $b;

    return $a+$b;
}

function secured_hash_function($plain) { 
    $secured_plain = sanitize_user_input($plain);
    return md5($secured_plain);
}

function sanitize_user_input($input) { 
    $re = '/[^a-zA-Z0-9]/';
    $secured_input = preg_replace($re, "", $input);
    return $secured_input;
}

if (isset($_POST['s']) && isset($_POST['h'])) {
    $s = sanitize_user_input($_POST['s']);
    $h = secured_hash_function($_POST['h']);
    $r = gen_secured_random();
    if($s != false && $h != false) {
        if($s.$r == $h) {
            print "Good ! Here is your flag: KetchupMayoChef";
        }
        else {
            print "Failed..";
        }
    }
    else {
        print "<p>Hmm..</p>";
    }
}
?>
</font>

<br><iframe width="600" height="315"  src="https://ghostbin.com/paste/zn64n" frameborder="0" allowfullscreen></iframe>
</body>
</html>