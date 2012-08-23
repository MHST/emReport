<!-- BEGIN: main -->
	<div align="center">
	<form method="post">
	<table>
		  <tr>
			  <td><label for="cmnd">{LANG.cmnd}</label></td>	  
			  <td><input type="text" id="cmnd" name="cmnd" /></td>
		  </tr>
	</table>	
		<input type="submit" value="{LANG.create}" />
		<input type="reset" value="{LANG.cancel}" />
		<input type="hidden" value="1" name="submit">
	</form>
	<!-- BEGIN: error -->
        	<p style="color:red;">{ERROR} {CMND}</p>
        <!-- END: error -->
	</div>
<!-- END: main -->