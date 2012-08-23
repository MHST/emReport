<!-- BEGIN: main -->
{FILE "navbar.tpl"}
<!-- BEGIN: is_forum -->
<div class="quote" style="width:780px;">
    <blockquote class="error">
        <p>
            <span>{LANG.modforum}</span>
        </p>
    </blockquote>
</div>
<!-- END: is_forum -->

<div class="container">
	<div class="row">
		<div class="span6 offset3">
			<!-- BEGIN: error -->
				<div class="alert alert-error" align="center">
					<button class="close" data-dismiss="alert">×</button>
			        <strong>{ERROR}</strong>
			    </div>
			<!-- END: error -->
		
			<!-- BEGIN: add_user -->
			
			<div class="widget widget-boxsearch">
				<div class="widget-header">
					<i class="icon-ok-sign"></i>
					<h3>{LANG.member_add}</h3>
				</div><!-- End widget-header-right -->
				<div class="widget-content widget-content-boxsearch">
					<div class="form-horizontal" id="register_patient">
						<form id="form_add_user" action="{FORM_ACTION}" method="post" enctype="multipart/form-data">
						    <div class="control-group">
						    	<label class="control-label">{LANG.account}<span style="color:#FF0000">*</span></label>
						    	<div class="controls">
									<input type="text" value="{DATA.username}" name="username" id="username_iavim" />
								</div>
							</div>
							<div class="control-group">
						    	<label class="control-label">{LANG.cmnd}<span style="color:#FF0000">*</span></label>
						    	<div class="controls">
									<input type="text" value="{DATA.cmnd}" name="cmnd" id="cmnd_iavim"/>
								</div>
							</div>
							<div class="control-group">
						    	<label class="control-label">{LANG.password}<span style="color:#FF0000">*</span></label>
						    	<div class="controls">
									<input type="text" style="width: 150px" id="pass_iavim" name="password" value="{DATA.password}" readonly="readonly" />
								</div>
							</div>
							<div class="control-group">
						    	<label class="control-label">{LANG.name}<span style="color:#FF0000">*</span></label>
						    	<div class="controls">
									<input type="text" value="{DATA.full_name}" name="full_name" />
								</div>
							</div>
							<div class="control-group">
						    	<label class="control-label">{LANG.gender}<span style="color:#FF0000">*</span></label>
						    	<div class="controls">
									<select name="gender">
				                        <!-- BEGIN: gender -->
				                        <option value="{GENDER.key}"{GENDER.selected}>{GENDER.title}</option>
				                        <!-- END: gender -->
				                    </select>
								</div>
							</div>
							<div class="control-group">
						    	<label class="control-label">{LANG.birthday}<span style="color:#FF0000">*</span></label>
						    	<div class="controls">
									<input type="text" name="birthday" id="birthday" value="{DATA.birthday}" style="width: 90px;" maxlength="10" readonly="readonly" type="text" />
						            <img src="{NV_BASE_SITEURL}images/calendar.jpg" style="cursor: pointer; vertical-align: middle;" onclick="popCalendar.show(this, 'birthday', 'dd.mm.yyyy', true);" alt="" height="17" />
								</div>
							</div>
							<div class="control-group">
						    	<label class="control-label">{LANG.address}<span style="color:#FF0000">*</span></label>
						    	<div class="controls">
									<input type="text" value="{DATA.location}" name="location"/>
								</div>
							</div>
						    <div class="control-group">
						    	<label class="control-label">{LANG.email}</label>
						    	<div class="controls">
									<input type="text" value="{DATA.email}" name="email" id="email_iavim"/>
								</div>
							</div>   
							<div style="margin-top:20px;" align="center">
								<button type="submit" name ="confirm" class="btn btn-danger"><i class="icon-user icon-white" style="color:#fff"></i>{LANG.member_add}</button>
							</div>		
						</form>
					</div>
				</div>
			</div>
			<!-- END: add_user -->
		</div>
	</div>
</div>

<script type="text/javascript">
//<![CDATA[
document.getElementById('form_add_user').setAttribute("autocomplete", "off");
//]]>
</script>
<!-- END: main -->