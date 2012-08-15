<!-- BEGIN: main -->
	<div class="clear" align="center">
		 <h1>Số CMND : {CMND}</h1>
		 <h2>Khám bệnh</h2>
		 
		 <form id="form" action="{ACTION}" method="post">
			 <table class="tab1">
			 	 <tbody>
					 <tr>
						 <td>Ngày khám</td>
					 	 <td>
					 	 	<input name="ngaykham" id="ngaykham" style="width: 90px;" maxlength="10" readonly="readonly" type="text" value="{NV_CURRENTTIME}"/>
	                    </td>
					 </tr>
				 </tbody>		
				 <tbody class="second">	
					 <tr>
					 	 <td>Khám bệnh</td>
					 	 <td><input type="text" name="khambenh"></td>
					 </tr>
				 </tbody>
				 <tbody>
					 <tr>
					 	 <td>Chẩn đoán</td>
					 	 <td>
						 	 <textarea name="chandoan" rows="2" cols="50">
							 </textarea>
					 	 </td>
					 </tr>
				 </tbody>
				 <tbody class="second">
					 <tr>
					 	 <td>Kết luận</td>
					 	 <td>
					 	 	 <textarea name="ketluan" rows="2" cols="50">
							 </textarea>
					     </td>
					 </tr>
			     </tbody>
			     <tbody>
					 <tr>
					 	 <td>Đơn thuốc</td>
					 	 <td>
					 	 	 <textarea name="donthuoc" rows="2" cols="50">
							 </textarea>
						 </td>
					 </tr>
				 </tbody>
				 <tbody class="second">
					 <tr>
					 	 <td>Ghi chú</td>
					 	 <td>
					 	 	 <textarea name="ghichu" rows="2" cols="50">
							 </textarea>
					 	 </td>
					 </tr>
				 </tbody>
				 <tbody>
					 <tr>
					 	 <td>Đính kèm</td>
					 	 <td><input type="text" name="dinhkem" readonly="readonly"></td>
					 </tr>
				 </tbody>
			 </table>
		 	 <input type="hidden" value="{CMND}" name="cmnd">
		 	 <input type="submit" value="Khám">
		 	 <input type="hidden" value="1" name="submit">
		 </form>
	</div>
<!-- END: main -->