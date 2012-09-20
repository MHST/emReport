<!-- BEGIN: main -->
	<div align="center">
		<h1>{FULLNAME}</h1>
	 	<p>{LANG.cmnd} : {CMND}</p>
	 	<p>{LANG.gender} : {GENDER}</p>
	 	<p>{LANG.birthday} : {BIRTHDAY}</p>
	 	<p>{LANG.location} : {LOCATION}</p>
	 	<h2>{LANG.record}</h2>
	 	<table border="1">
			<tr>
				<td>{LANG.examine_date}</td>
				<td>{LANG.examine}</td>
				<td>{LANG.diagnose}</td>
				<td>{LANG.conclude}</td>
				<td>{LANG.prescription}</td>
				<td>{LANG.note}</td>
				<td>{LANG.attach}</td>
				<td>{LANG.doctor}</td>
				<!-- BEGIN: edit -->
				<td></td>
				<!-- END: edit -->
			</tr>
		 	{LIST}
		</table>
		<!-- BEGIN: examine -->
			<form action="{LINK}" method="post">
				<input type="hidden" value="{CMND}" name="cmnd">
				<input type="submit" value="{LANG.new_examine}">
			</form>
		<!-- END: examine -->
	</div>
	<form name="forwardForm" action="{ACTION}" method="post">
		<input id="cmndDoctor" name="cmndDoctor" type="hidden">
	</form>
	<form name="forwardEditForm" action="{EDIT_ACTION}" method="post">
		<input id="id" name="id" type="hidden">
	</form>
	
<script type="text/javascript">
	function forward2Form(cmnd){
		document.forwardForm.cmndDoctor.value = cmnd;
		document.forwardForm.submit();
	}
	
	function forward2EditForm(id){
		document.forwardEditForm.id.value = id;
		document.forwardEditForm.submit();
	}
</script>
<!-- END: main -->