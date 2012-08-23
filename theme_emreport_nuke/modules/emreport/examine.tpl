<!-- BEGIN: main -->
{FILE "navbar.tpl"}
<div class="container">
<div class="row">
<div class="span6 offset3">
<div class="widget widget-boxsearch">
	<h1 align="center">{LANG.cmnd} : {CMND}</h1>
	<br />	 
	<div class="widget-header">
		<i class="icon-ok-sign"></i>
		<h3>{LANG.examine}</h3>
	</div><!-- End widget-header-right -->
	
	<div class="widget-content widget-content-boxsearch">
		<div class="form-horizontal" id="register_patient">
		<form action="{LINK}" method="post">
			<div class="control-group">
				<label class="control-label">{LANG.examine_date}</label>
				<div class="controls">
					<input class="span3" name="ngaykham" id="ngaykham" style="width: 90px;" maxlength="10" readonly="readonly" type="text" value="{NV_CURRENTTIME}"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">{LANG.examine}</label>
				<div class="controls">
					<input class="span3" type="text" name="khambenh">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">{LANG.diagnose}</label>
				<div class="controls">
					<textarea class="textarea span3" rows="2" style="resize: none;" name="chandoan"></textarea>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">{LANG.conclude}</label>
				<div class="controls">
					<textarea class="textarea span3" rows="2" style="resize: none;" name="ketluan"></textarea>
				</div>
			</div>																		
			<div class="control-group">
				<label class="control-label">{LANG.prescription}</label>
				<div class="controls">
					<textarea class="textarea span3" rows="2" style="resize: none;" name="donthuoc"></textarea>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">{LANG.note}</label>
				<div class="controls">
					<textarea class="textarea span3" rows="2" style="resize: none;" name="ghichu"></textarea>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">{LANG.attach}</label>
				<div class="controls">
					<input class="span3" type="text" name="dinhkem" value="" readonly="readonly">
				</div>
			</div>
			<div class="control-group" style="margin-top:20px">
				<label class="control-label" for="input01"></label>
				<div class="controls">
					<button type="submit" class="btn btn-danger"><i class="icon-user icon-white" style="color:#fff"></i> {LANG.new_examine}</button>
				</div>
			</div>		
			<input type="hidden" value="{CMND}" name="cmnd">	
			<input type="hidden" value="1" name="submit">		
		</form>																																			
		</div><!-- Contact form-->
	</div><!-- End widget-content-->
</div>
</div>
</div>
</div>
<!-- END: main -->