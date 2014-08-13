<!-- remember to include:: include_once ('/HEADS/datepicker_head.php'); -->
<div>
	<div>date picker:</div>
	<input id="datepick" size="30" />
	<button onClick="getDateSelected()">verify</button>
	<script type="text/javascript">
		new datepickr('datepick');
		function getDateSelected(){
			alert('date selected:'+document.getElementById('datepick').value);
		}
	</script>
</div>
