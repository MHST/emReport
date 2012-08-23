<!-- BEGIN: main -->
<!-- BEGIN: wrap -->
	<br/>
	<div align="center">
		<!-- BEGIN: user -->
			<input class="btn" type="button" value="{LANG.create_emreport}" onclick="window.location.href='{LINK}'">
		<!-- END: user -->
		
		<!-- BEGIN: doctor -->
		<input class="btn" type="button" value="{LANG.create_emreport_admin}" onclick="window.location.href='{LINK}'">
		<br/>
		<br/>
        <form action="{ACTION}" method="post">
        	<label for="search">{LANG.search}</label>
            <input id="search" name="q" type="text" placeholder="{LANG.enter_cmnd}">
            <input type="submit" value="Submit">
            <input type="hidden" value="1" name="submit">
        </form>
        <br/>
        <!-- END: doctor -->
        
        <!-- BEGIN: error -->
        	<p style="color:red;">{ERROR} {CMND}</p>
        <!-- END: error -->
    </div>
<!-- END: wrap -->
<!-- END: main -->