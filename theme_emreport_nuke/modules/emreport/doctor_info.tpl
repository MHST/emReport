<!-- BEGIN: main -->
{FILE "navbar.tpl"}
<div class="container">
	<div class="row">		
		<div class="span6 offset3">
			<div class="widget">
				<div class="widget-content">
					<div class="form-horizontal" id="register_patient">
						<div class="control-group">
							<label class="control-label " style="color:#999">{LANG.full_name}</label>
							<div class="controls">
								<span class="inline-text">{DATA.full_name}</span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label"  style="color:#999">{LANG.gender}</label>
							<div class="controls">
								<span class="inline-text">{DATA.gender}</span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label"  style="color:#999">{LANG.khoa}</label>
							<div class="controls">
								<span class="inline-text">{DATA.khoa}</span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label"  style="color:#999">{LANG.trinhdo}</label>
							<div class="controls">
								<span class="inline-text">{DATA.trinhdo}</span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label"  style="color:#999">{LANG.ngaycapbang}</label>
							<div class="controls">
								<span class="inline-text">{DATA.ngaycapbang}</span>
							</div>
						</div>																
						<div class="control-group">
							<label class="control-label"  style="color:#999">{LANG.mabenhvien}</label>
							<div class="controls">
								<span class="inline-text">{DATA.mabenhvien}</span>
							</div>
						</div>																		
						<div class="control-group">
							<label class="control-label"  style="color:#999">{LANG.email}</label>
							<div class="controls">
								<span class="inline-text"><a href="mailto:{DATA.email}">{DATA.email}</a></span>
							</div>
						</div>																
					</div><!-- Contact form-->
				</div>
			</div><!-- Eng widget-->
		</div><!-- End span6 -->		
	</div><!-- End row-->
</div><!--End container-->
<!-- END: main -->