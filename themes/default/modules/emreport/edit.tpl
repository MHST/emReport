<!-- BEGIN: main -->
	<div class="clear" align="center">
		 <h2>{LANG.edit_report}</h2>
		 
		 <form id="form" action="{ACTION}" method="post">
			 <table class="tab1">
			 	 <tbody>
					 <tr>
						 <td>{LANG.examine_date}</td>
					 	 <td>
					 	 	<input name="ngaykham" id="ngaykham" style="width: 90px;" maxlength="10" readonly="readonly" type="text" value="{DATA.ngaykham}"/>
	                    </td>
					 </tr>
				 </tbody>		
				 <tbody class="second">	
					 <tr>
					 	 <td>{LANG.examine}</td>
					 	 <td><input type="text" name="khambenh" value="{DATA.khambenh}"></td>
					 </tr>
				 </tbody>
				 <tbody>
					 <tr>
					 	 <td>{LANG.diagnose}</td>
					 	 <td>
						 	 <textarea name="chandoan" rows="2" cols="50">{DATA.chandoan}
							 </textarea>
					 	 </td>
					 </tr>
				 </tbody>
				 <tbody class="second">
					 <tr>
					 	 <td>{LANG.conclude}</td>
					 	 <td>
					 	 	 <textarea name="ketluan" rows="2" cols="50">{DATA.ketluan}
							 </textarea>
					     </td>
					 </tr>
			     </tbody>
			     <tbody>
					 <tr>
					 	 <td>{LANG.prescription}</td>
					 	 <td>
					 	 	 <textarea name="donthuoc" rows="2" cols="50">{DATA.donthuoc}
							 </textarea>
						 </td>
					 </tr>
				 </tbody>
				 <tbody class="second">
					 <tr>
					 	 <td>{LANG.note}</td>
					 	 <td>
					 	 	 <textarea name="ghichu" rows="2" cols="50">{DATA.ghichu}
							 </textarea>
					 	 </td>
					 </tr>
				 </tbody>
			 </table>
		 	 <input type="hidden" value="{DATA.id}" name="id">
		 	 <input type="submit" value="{LANG.update}">
		 	 <input type="hidden" value="1" name="submit">
		 </form>
	</div>
<!-- END: main -->