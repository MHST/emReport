<!-- BEGIN: main -->
	<br/>
	<div align="center">
		<!-- BEGIN: button -->
			<input class="btn" type="button" value="{VALUE}" onclick="window.location.href='{LINK}'">
		<!-- END: button -->
		<br/>
		<br/>
        <form action="{ACTION}" method="post">
        	<label for="search">Tra cứu bệnh án</label>
            <input id="search" name="q" type="text" placeholder="Nhập số CMND">
            <input type="submit" value="Submit">
            <input type="hidden" value="1" name="submit">
        </form>
        <br/>
    </div>
<!-- END: main -->