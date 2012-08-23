<!-- BEGIN: main -->
	<br/>
	<div align="center">
		<!-- BEGIN: button -->
			<input class="btn" type="button" value="{VALUE}" onclick="window.location.href='{LINK}'">
		<!-- END: button -->
		
		<!-- BEGIN: search -->
		<br/>
		<br/>
        <form action="{ACTION}" method="post">
        	<label for="search">{LANG.search}</label>
            <input id="search" name="q" type="text" placeholder="{LANG.enter_cmnd}">
            <input type="submit" value="Submit">
            <input type="hidden" value="1" name="submit">
        </form>
        <br/>
        <!-- END: search -->
        
        <!-- BEGIN: error -->
        	<p style="color:red;">{ERROR} {CMND}</p>
        <!-- END: error -->
    </div>
<!-- END: main -->