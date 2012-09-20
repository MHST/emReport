<!-- BEGIN: main -->
<div class="container" style="margin-top:-60px">
	<div class="row">
		<div class="span4 offset4">
			
			<div class="widget widget-boxsearch">	
				<div class="widget-content widget-content-boxsearch">
					<div class="shortcuts">
						<a class="win-command" style="margin-top:-20px;margin-left:-10px">
							<span class="win-commandimage win-commandimage-large win-commandring">
								<img src="{IMAGE}" style="margin-top:20px">
							</span>
						</a>
						<br/><br/>
						<form id="loginForm" class="form-horizontal" method="post" action="{LOGIN}">
							<div class="control-group">
								<label class="control-label">{LANG.account}</label>
								<div class="controls">
									<input id="login_iavim" name="nv_login" value="{DATA.nv_login}" class="span2" type="text">
								</div>
							</div>						
							<div class="control-group">
								<label class="control-label">{LANG.password}</label>
								<div class="controls">
									<input id="password_iavim" name="nv_password" value="{DATA.nv_password}" class="span2" type="password">
								</div>
								<a class="pull-right" href="{LOSTPASS}" style="text-decoration:none;margin-right:2px;"><i class="icon-minus-sign icon-blue"></i> Quên mật khẩu</a><br/>
								<a class="pull-right" href="{REGISTER}" style="text-decoration:none;margin-right:2px;"><i class="icon-plus-sign icon-blue"></i> Đăng kí</a>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="input01"></label>
								<div class="controls">
									<button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> {LANG.login}</button>
								</div>
							</div>
						</form>
						
						<!-- BEGIN: openid -->
				        <div style="margin:20px;">
				            <img style="margin-left:10px;vertical-align:middle;" alt="{LANG.openid_login}" title="{LANG.openid_login}" src="{OPENID_IMG_SRC}" width="{OPENID_IMG_WIDTH}" height="{OPENID_IMG_HEIGHT}" /><br/>
				            <!-- BEGIN: server -->
							<a href="{OPENID.href}"><img style="margin-left: 10px;margin-right:2px;vertical-align:middle;" alt="{OPENID.title}" title="{OPENID.title}" src="{OPENID.img_src}" width="{OPENID.img_width}" height="{OPENID.img_height}" />{OPENID.title}</a>
							<!-- END: server -->
				        </div>
						<!-- END: openid -->
						
						<a href="{NV_BASE_SITEURL}" class="win-command">
							<span class="win-commandimage win-commandring" style="color:#da4f49"><i class="icon-home icon-red"></i></span>
							<span class="win-label" style="color:#da4f49">{LANG.home}</span>
						</a>											
					</div>	<!-- End shortcuts-->
				</div> <!-- /widget-content -->	
			</div>	<!-- End - widget-->		
		</div><!-- End span-->		
	</div><!-- End row-->
</div><!-- End container -->
<!-- END: main -->