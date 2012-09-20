<!-- BEGIN: main -->
<div class="container">
	<div class="span12">
		<div class="widget widget-table action-table">						
			<div class="widget-header">
				<i class="icon-file icon-blue"></i>
				<h3>Hồ sơ bệnh án</h3>
				<div class="pull-right" style="margin-right:20px">
				<a class="show-hide btn btn-mini active" data-toggle="collapse" data-target="#demo"><i style="margin-left:0px" class="icon-minus"></i></a>
				</div>
			</div> <!-- /widget-header -->
		
			<div class="widget-content" style="background-color:white">
				<div id="demo" class="span6 offset3 collapse out" style="margin:10px 0px">
					<table class="table table-striped table-bordered" style="background-color:#fff; border:1px solid #ccc;">
						<thead>
							<tr>
								<th colspan='2' style="text-align:center">Thông tin bệnh nhân</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>{LANG.full_name}</td>
								<td>{FULLNAME}</td>
							</tr>
							<tr>
								<td>{LANG.cmnd}</td>
								<td>{CMND}</td>
							</tr>
							<tr>
								<td>{LANG.gender}</td>
								<td>{GENDER}</td>
							</tr>
							<tr>
								<td>{LANG.birthday}</td>
								<td>{BIRTHDAY}</td>
							</tr>
							<tr>
								<td>{LANG.location}</td>
								<td>{LOCATION}</td>
							</tr>	
						</tbody>
					</table>
				</div>
				<p class="divider" ></p>
				<table cellpadding="0" cellspacing="0" id="report" class="display table table-hover table-bordered" style="border-top:1px solid #ccc;border-bottom:1px solid #ccc; background-color:#fff">
					<thead>
						<tr>
							<th>{LANG.examine_date}</th>
							<th>{LANG.examine}</th>
							<th>{LANG.diagnose}</th>
							<th>{LANG.conclude}</th>
							<th>{LANG.prescription}</th>
							<th>{LANG.note}</th>
							<th>{LANG.attach}</th>
							<th>{LANG.examine_doctor}</th>
							<!-- BEGIN: edit -->
							<th></th>
							<!-- END: edit -->
						</tr>
					</thead>
					<tbody>
						{LIST}
					</tbody>
				</table>	
				
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
								<form action="{LINK}" method="post" enctype="multipart/form-data">
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
											<input class="span3" type="file" name="dinhkem">
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
			
			</div> <!-- /widget-content -->	
		</div>
	</div>
	<form name="forwardForm" action="{ACTION}" method="post">
		<input id="cmndDoctor" name="cmndDoctor" type="hidden">
	</form>
	<form name="forwardEditForm" action="{EDIT_ACTION}" method="post">
		<input id="id" name="id" type="hidden">
	</form>
</div><!--End container-->

<script src="{NV_BASE_SITEURL}themes/theme_emreport_nuke/js/bootstrap.js"></script>	
<script src="{NV_BASE_SITEURL}themes/theme_emreport_nuke/js/jquery.dataTables.min.js"></script>
<script src="{NV_BASE_SITEURL}themes/theme_emreport_nuke/js/dataTables.bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#report').dataTable({
        "sScrollY": 600,
        "bInfo": false,
        "bScrollCollapse": true,
        "bLengthChange": false,
       	
       	"bPaginate": true
		});
		$(".collapse").collapse({
		});
		$(".show-hide").click(function(e){
				var $icon = $(this).find("i");
				if($icon.hasClass("icon-minus"))
					$(this).removeClass('active'),
					$icon.removeClass('icon-minus').addClass("icon-plus");
				else
					if($icon.hasClass("icon-plus"))
						$(this).addClass('active'),
						$icon.removeClass("icon-plus").addClass("icon-minus");

			});

	});

	function forward2Form(cmnd){
		document.forwardForm.cmndDoctor.value = cmnd;
		document.forwardForm.submit();
	}
	
	function forward2EditForm(id){
		document.forwardEditForm.id.value = id;
		document.forwardEditForm.submit();
	}
</script>
<!-- END: main -->