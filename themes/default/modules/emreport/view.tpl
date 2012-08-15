<!-- BEGIN: main -->
	<div align="center">
		<h1>{FULLNAME}</h1>
	 	<p>Số CMND : {CMND}</p>
	 	<p>Giới tính : {GENDER}</p>
	 	<p>Ngày sinh : {BIRTHDAY}</p>
	 	<p>Quê quán : {LOCATION}</p>
	 	<h2>Hồ sơ bệnh án</h2>
	 	<table border="1">
			<tr>
				<td>Ngày khám</td>
				<td>Khám bệnh</td>
				<td>Chẩn đoán</td>
				<td>Kết luận</td>
				<td>Đơn thuốc</td>
				<td>Ghi chú</td>
				<td>Đính kèm</td>
				<td>Người khám</td>
			</tr>
		 	{LIST}
		</table>
		<!-- BEGIN: examine -->
			<form action="{LINK}" method="post">
				<input type="hidden" value="{CMND}" name="cmnd">
				<input type="submit" value="Khám mới">
			</form>
		<!-- END: examine -->
	</div>
<!-- END: main -->