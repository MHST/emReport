<!-- BEGIN: main -->
	<div class="container">
		<div align="center">
		<h1>{FULLNAME}</h1>
	 	<p>Số CMND : {CMND}</p>
	 	<p>Giới tính : {GENDER}</p>
	 	<p>Ngày sinh : {BIRTHDAY}</p>
	 	<p>Quê quán : {LOCATION}</p>
	 	<h2>Hồ sơ bệnh án</h2>
	 	</div>
	 	
		<!-- Content information: Report-recent -->
		<div class="row">		
			<div class="span12">
				<table class="responsive table table-bordered" style="background-color:#f9f9f9;border:1px solid #ddd">
					<thead>
						<tr>
							<th>Ngày khám</th>
							<th>Khám bệnh</th>
							<th>Chuẩn đoán</th>
							<th>Kết luận</th>
							<th>Đơn thuốc</th>
							<th>Ghi chú</th>
							<th>Đính kèm</th>
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
				<span class="win-commandimage win-commandring"><i class="icon-plus"></i></span>
				<span class="win-label">Khám mới</span>
				</a>
			</div>
		</div>
		
		<!--Modal content for new report [KHAM MOI - ring] -->
		<div id="mymodal" class="modal hide fade in" style="border-radius:2px; display: none;">
			<div class="modal-body" style="padding:0px 0px;">
				<div class="widget">
						<div class="widget-header">
							<i class="icon-ok-sign"></i>
							<h3>Khám mới</h3>
							<div class="widget-header-right">
								<a href="#" style="margin-top:20px;" type="button" class="close" data-dismiss="modal">&times;</a>
						</div><!-- End widget-header-right -->
						<div class="widget-content">
							<div class="form-horizontal" id="register_patient">
							<form action="{LINK}" method="post">
								<div class="control-group">
									<label class="control-label">Ngày khám</label>
									<div class="controls">
										<input class="span3" name="ngaykham" id="ngaykham" style="width: 90px;" maxlength="10" readonly="readonly" type="text" value="{NV_CURRENTTIME}"/>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Khám bệnh</label>
									<div class="controls">
										<input class="span3" type="text" name="khambenh">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Chẩn đoán</label>
									<div class="controls">
										<textarea class="textarea span3" rows="2" style="resize: none;" name="chandoan"></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Kết luận</label>
									<div class="controls">
										<textarea class="textarea span3" rows="2" style="resize: none;" name="ketluan"></textarea>
									</div>
								</div>																		
								<div class="control-group">
									<label class="control-label">Đơn thuốc</label>
									<div class="controls">
										<textarea class="textarea span3" rows="2" style="resize: none;" name="donthuoc"></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Ghi chú</label>
									<div class="controls">
										<textarea class="textarea span3" rows="2" style="resize: none;" name="ghichu"></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Đính kèm</label>
									<div class="controls">
										<input class="span3" type="text" name="dinhkem" value="Chức năng đang được phát triển" readonly="readonly">
									</div>
								</div>
								<div class="control-group" style="margin-top:20px">
									<label class="control-label" for="input01"></label>
									<div class="controls">
										<button type="submit" class="btn btn-danger"><i class="icon-user" style="color:#fff"></i> Thêm khám mới</button>
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