<!-- BEGIN: main -->
	<br/>
	<div class="container" align="center">
        <form action="{ACTION}" method="post">
        	<label for="search">Tra cứu bệnh án</label>
            <input id="search" name="q" type="text" placeholder="Nhập số CMND">
            <input type="submit" value="Submit">
        </form>
        <br/>
      	<input type="button" value="Xem bệnh án" onclick="location.href='VIEW'">
        <input type="button" value="Tạo bệnh án" onclick="location.href='CREATE'">
    </div>
<!-- END: main -->