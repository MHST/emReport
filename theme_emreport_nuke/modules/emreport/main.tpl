<!-- BEGIN: main -->
{FILE "navbar_main.tpl"}
<!-- BEGIN: wrap -->
<div class="container">
    <div class="row">
		<div class="span4 offset4 style="min-width:270px;"">
			<div class="widget widget-boxsearch">	
				<div class="widget-content widget-content-boxsearch">
					<!--<h1 class="brand-emreport">Sổ y bạ</h1>-->
					<div class="shortcuts">
						<a class="win-command" style="margin-top:-25px;margin-left:-10px;margin-bottom:10px;">
							<span class="win-commandimage win-commandimage-large win-commandring">
								<img src="{IMAGE}" style="margin-top:20px">
							</span>
						</a>
						<br/>
						<!-- BEGIN: doctor -->
							<form class="form-horizontal" action="{ACTION}" method="post">
								<input type="text" class="span3 search-emreport" name="q"><br>
								<button style="margin-top:20px" type="submit" class="btn">
					        		<i class="icon-search"></i> {LANG.search}
								</button>
								<a href="{LINK}" style="margin-top:20px" class="btn btn-primary"><i class="icon-ok icon-white"></i> {LANG.create_emreport_admin}
								</a>
							</form>
						<!-- END: doctor -->
						
						<!-- BEGIN: user -->
							<a href="{LINK}" style="margin-top:20px" class="btn btn-primary"><i class="icon-ok icon-white"></i>{LANG.create_emreport}
							</a>
						<!-- END: user -->		
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
<!-- END: wrap -->
<!-- END: main -->