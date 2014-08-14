<?php
include_once ('HEADS/default_head.php');
?>
<?php 
		echo(navigation());
		echo(customCSSMenu());
?>
<style>
	.todoList{
		text-align:left;float:left;margin-left:5%;overflow-y:scroll;max-height:250px;border:solid 1px black;
		background-color:#111111;
		color:green;
	}
	.todoList p{
		color:white;
	}
	.todoList a{
		color:orange;
	}
</style>
<div id='content'>
	<p>
		home view
	</p>
</div>
<div>
	<?php
		//echo("<br>ACTUAL SESSION: <pre>");print_r($_SESSION);echo("</pre>");
		if(1 ==2){
			if($user){
			echo("<br>user_id:".$user->user_id);
			echo("<br>username:".$user->username);
			echo("<br>user_password:".$user->password);
			$_SESSION['user']=serialize($user);
		}else{
			 $user = unserialize($_SESSION['user']);
			 echo("<br>user_id:".$user->user_id);
			echo("<br>username:".$user->username);
			echo("<br>user_password:".$user->password);
			$_SESSION['user']=serialize($user);
		}
		}
		
	?>
</div>

<div class='todoList'>
	<p>To Do:</p>
		<ul>
			
			<li>calendar and datepicker AS scheduler</li>
			<li>solve the web transfer issues</li>
				<ul>
					<li>sanitize()</li>
					<li>db connections</li>
					<li>db and table names as constants</li>
				</ul>
			<li>Global Components: </li>
			<ul>
				<li>cc to ajaxtable</li>
				<li>phone call links</li>
				<li>contact form with email/HTML formating.</li>
				<li>cc to ajaxtable</li>
			</ul>
			<li>RWD</li>
		</ul>
	
	<p>Done:</p>
	<ul>
		<li>App Specific Databases</li>
		<li>web efficiency methods</li>
			<ul>~app cache ( done at the global level)</ul>
		<li>global components: </li>
			<ul>
				<li>~map</li>
				<li>~attachments</li>
				<li>~date picker</li>
				<li>~actionList</li>
				<li>~graphing: flot graphs from feedback-1.2 </li>
				<li>~jqgrid</li>
				<li>~jqscheduler</li>
				<li>~ajaxSortableTable</li>
				 
			</ul>
	</li>
</ul>
		<p>App Specific Considerations:</p> 
	<ul>
		<li>google analytics</li>
			<ul><a href='https://www.google.com/analytics/web/?hl=en#home/a48383737w79853781p82669518/' target='_blank'>google analytics</a></ul>
		<li>PayPal integration</li>
			<ul><a href='https://developer.paypal.com/webapps/developer/docs/classic/adaptive-payments/integration-guide/APIntro/' target='_blank'>developer.paypal</a></ul>
   			<!-- https://developer.paypal.com/webapps/developer/docs/classic/adaptive-accounts/gs_AdaptiveAccounts/ -->
   			<ul><a href='https://developer.paypal.com/webapps/developer/docs/classic/adaptive-accounts/gs_AdaptiveAccounts/' target='_blank'>Adpative Payments</a></ul>

   			 <!--  https://github.com/paypal/adaptivepayments-sdk-php/blob/master/samples/SimpleSamples/ParallelPay.php -->
   			<ul><a href='https://github.com/paypal/adaptivepayments-sdk-php/blob/master/samples/SimpleSamples/ParallelPay.php' target='_blank'>adaptivepayments-sdk-php</a></ul>
https://github.com/paypal/merchant-sdk-php/blob/master/README.md
   			<ul>Parallell Payment</ul>
   			
    </li>
    <li>ftps</li>
       			<ul><a href=' https://help.yahoo.com/kb/yahoo-web-hosting/SLN20422.html?impressions=true' target='_blank'>ftps directions</a></ul>

	</ul>
</div>
 
<?php
include_once ('HEADS/html_foot.php');
?>
