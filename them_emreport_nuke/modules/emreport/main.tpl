<!-- BEGIN: main -->
{FILE "navbar.tpl"}
<div class="container">
    <div class="row">
		<div class="span4 offset4">
			<div class="widget widget-boxsearch">	
				<div class="widget-content widget-content-boxsearch">
					<!--<h1 class="brand-emreport">Sổ y bạ</h1>-->
					<div class="shortcuts">
						<a class="win-command" style="margin-top:-25px;">
							<span class="win-commandimage win-commandimage-large win-commandring"><i class="icon-user-md win-commandicon-large"></i></span>
						</a>
						<form class="form-horizontal" action="{ACTION}" method="post">
							<input type="text" class="span3 search-emreport" name="q"><br>
								<button style="margin-top:10px"  type="submit" class="btn btn-large">
					        		<i class="icon-search"></i> Tìm kiếm
								</button>
								<br />
							<!-- BEGIN: button -->
								<a href="{LINK}" style="margin-top:10px" class="btn btn-large btn-primary"><i class="icon-ok"></i>{VALUE}
								</a>
							<!-- END: button -->
							<input type="hidden" value="1" name="submit">
						</form>											
					</div>	<!-- End shortcuts-->
				</div> <!-- /widget-content -->	
			</div>	<!-- End - widget-->
				
			<!-- BEGIN: error -->
				<div class="alert alert-error" align="center">
					<button class="close" data-dismiss="alert">×</button>
        			{ERROR} <strong>{CMND}</strong>
        		</div>
    		<!-- END: error -->
    			
		</div><!-- End span-->		
	</div><!-- End row-->
</div>
<!-- END: main -->