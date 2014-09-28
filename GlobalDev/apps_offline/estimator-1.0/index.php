<?php include_once("html_head.php"); ?>
<!-- INCLUDE PAGE MODEL-->
 
		
<div class ='content'>
	<div class ='section'>
		<div class='app_description' style='text-align:left;'>
			The Estimator app allows you to estimate cost and time with tasks and materials
		 for just about any job.
		 <ul>
		 	<li>make customized lists of</li>
		 		<ul>
		 			<li>materials</li>
		 			<li>tasks</li>
		 		</ul>
		 	<li>make an estimate</li>
		 		<ul>
		 			<li>add tasks to the estimate</li>
		 			<li>add materials to the estimate</li>
		 			<li>specify a few details</li>
		 			<li>and get a quick final estimate</li>
		 		</ul>
		 	<li>oh, and the coolest thing about it, besides the fact that I made it, is that you can use it even when you are offline.</li>
		 </ul>
		</div>
			
		
		 
		 
	</div>
	<div style='display:none;'>
	<p>Current Todo:</p>
	<ul>
		<li>tax rate dynamic part of estimate creation</li>
		<li>estimate finalization...</li>
		<li>UI/UX</li>
		<li>clean up comments</li>
		<li>insert into gdev</li>
	</ul>
	
	<p>Done</p>
	<ul>
		<li>current materials: on init needs to show subtotal</li>
		<li>need to sum up ALL task costs and material costs.*see calculateEntireEstimate(id) in estimate.js</li>
		<li>make sure task has place to store 'cost sub total' or whatever its called.:unique function name problem.</li>
		<li>make sure cost sub total shows initially on tasks page.</li>
		<li>make sure separate estimates, have separate component parts</li>
	</ul>
	</div>
</div>

 

<?php include_once("html_foot.php"); ?>