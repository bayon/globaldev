<?php
ini_set("SMTP","mail.localhost.com");
ini_set("smtp_port","25");

$to = 'bayon_forte@yahoo.com';
$subject = 'Website Change Request';
$headers = "From: " . strip_tags($_POST['req-email']) . "\r\n";
$headers .= "Reply-To: " . strip_tags($_POST['req-email']) . "\r\n";
//$headers .= "CC: susan@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = "<htm><body>
<div style='background-color:lightblue;height:50px;width:100%;border:solid 1px blue;'>
<h1>Testing</h1>
<p>Test <span style='font-style:italic;'>This is only a test.</span> of html in email.</p>
</div>
</body></html>";
mail($to, "log", $message, $headers);
?>