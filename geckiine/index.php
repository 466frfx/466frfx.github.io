<!DOCTYPE html>

<html>

<head>

<meta
    name="viewport";
    content="width=device-width, initial-scale=1.0";
/>

<meta
    name="description";
    content="Geckiine - An installer for TCPGecko and Cafiine";
/>

<link
    href="index.css";
    rel="stylesheet";
    type="text/css";
/>

<link
    href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese";
    rel="stylesheet";
/>

<script>
        function validateValues() {
            var ip = [ document.forms["download"]["ip1"].value,
                      document.forms["download"]["ip2"].value,
                      document.forms["download"]["ip3"].value,
                      document.forms["download"]["ip4"].value ];
            for (var i = 0; i < ip.length; i++) {
                var ipDigit = ip[i];
                
                if ((ipDigit > 255) || (ipDigit < 0)) {
                    alert("The IP address entered is invalid.");
                    return false;
                }
            }
            return true;
        }
</script>

<title>Geckiine</title>

</head>

<body>

<div class="transparent">

<font color=white>

<h1><img src="logo.png" /></h1>
<h3>An installer for TCPGecko and Cafiine</h3>
<p>Enter your PC IP address:</p>
<form action="download.php" id="download" method="post" name="download"
onsubmit="return validateValues()">
<input name="ip1" style="width:70px" required="" type="number" placeholder="192"> .
<input name="ip2" style="width:70px" required="" type="number" placeholder="168"> .
<input name="ip3" style="width:70px" required="" type="number" placeholder="0"> .
<input name="ip4" style="width:70px" required="" type="number" placeholder="11"><br>
<br>
<input type="submit" value="Download">
</form>
<br>
<footer><a href="https://github.com/OatmealDome/Geckiine/blob/master/README.md">For more information, click here</a><br>
Geckiine created by <a href="https://twitter.com/oatmealdome">OatmealDome</a><br>
Website created by <a href="http://466gaming.ga">466</a></footer>

</font>

</div>

</body>

</html>