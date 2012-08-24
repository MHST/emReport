<!-- BEGIN: main -->
	<div class="container">
		<div class="row">
		<div class="span6 offset3" style="min-width:32px;">
			<div class="widget">
				<div class="widget-header">
					<i class="icon-user icon-red"></i>
					<h3>Thông tin bệnh nhân</h3>
				</div>
				<div class="widget-content">
					<div class="form-horizontal" id="register_patient">
						<div class="control-group">
							<label class="control-label " style="color:#999">{LANG.name}</label>
							<div class="controls">
								<span class="inline-text">{FULLNAME}</span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label"  style="color:#999">{LANG.cmnd}</label>
							<div class="controls">
								<span class="inline-text">{CMND}</span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label"  style="color:#999">{LANG.birthday}</label>
							<div class="controls">
								<span class="inline-text">{BIRTHDAY}</span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label"  style="color:#999">{LANG.location}</label>
							<div class="controls">
								<span class="inline-text">{LOCATION}</span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label"  style="color:#999">{LANG.email}</label>
							<div class="controls">
								<span class="inline-text">{EMAIL}</span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label"  style="color:#999">{LANG.gender}</label>
							<div class="controls">
								<span class="inline-text">{GENDER}</span>
							</div>
						</div>																
					</div><!-- Contact form-->
				</div>
			</div><!-- Eng widget-->
		</div><!-- End span6 -->
		<div>	
	 	
		<!-- Content information: Report-recent -->
		<div class="row">		
			<div class="span12">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>{LANG.examine_date}</th>
							<th>{LANG.examine}</th>
							<th>{LANG.diagnose}</th>
							<th>{LANG.conclude}</th>
							<th>{LANG.prescription}</th>
							<th>{LANG.note}</th>
							<th>{LANG.attach}</th>
							<th>Bác sỹ khám</th>
						</tr>
					</thead>
					<tbody>
						{LIST}
					</tbody>
				</table>
			</div><!-- End span12 -->
		</div><!-- End row-->
		
		<!-- BEGIN: examine -->
		<div class="row">
			<div class="span2 offset5" align="center">
				<a data-toggle="modal" href="#mymodal" class="win-command">
				<span class="win-commandimage win-commandring" style="color:#da4f49"><i class="icon-plus icon-red"></i></span>
				<span class="win-label" style="color:#da4f49">{LANG.new_examine}</span>
				</a>
			</div>
		</div>
		
		<!--Modal content for new report [KHAM MOI - ring] -->
		<div id="mymodal" class="modal hide fade in" style="border-radius:2px; display: none;">
			<div class="modal-body" style="padding:0px 0px;">
				<div class="widget">
						<div class="widget-header">
							<i class="icon-ok-sign"></i>
							<h3>{LANG.new_examine}</h3>
						</div><!-- End widget-header-right -->
						<div class="widget-content">
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
				</div><!-- End widget-->
			</div>
		</div>
		<!-- END: examine -->
	</div><!--End container-->
<!-- END: main -->