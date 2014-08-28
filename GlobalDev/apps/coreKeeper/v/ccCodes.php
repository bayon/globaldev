<?php  
include_once ('HEADS/default_head.php');
?>
 
<div id='content'>
	<div class='page_title'>
		Ajax Table
	</div>
	<?php
	include_once ('./components/ajax_tableHelper_ccMath.php');
	?>
</div>

<script>
//function postAjaxForm(dataString,controller,receiverId)
function initCodePage(){
	postAjaxForm('method=ajaxSortableCCMathTable&column=code&direc=asc', './c/ajax_controller.php', 'ajaxSortableTableResults');
}
initCodePage();
</script>
