<!-- BEGIN: main -->
<div>
	<h3>Danh sách bác sĩ</h3>
    <table class="tab1">
        <thead>
            <tr>
    			<td>{LANG.cmnd}</td>
    			<td>{LANG.account}</td>
    			<td>{LANG.full_name}</td>
    			<td>{LANG.khoa}</td>
    			<td>{LANG.trinhdo}</td>
    			<td>{LANG.ngaycapbang}</td>
    			<td>{LANG.mabenhvien}</td>            
            </tr>
        <thead>
        
        <tbody>
			{LIST_DOCTOR}
        </tbody>
    </table>
    
    <h3>Danh sách bệnh nhân</h3>
    <table class="tab1">
        <thead>
            <tr>
    			<td>{LANG.cmnd}</td>
    			<td>{LANG.account}</td>
    			<td>{LANG.full_name}</td>
    			<td>{LANG.gender}</td>
    			<td>{LANG.birthday}</td>
    			<td>{LANG.location}</td>            
            </tr>
        <thead>
        
        <tbody>
			{LIST_PATIENT}
        </tbody>
    </table>
</div>
<!-- END: main -->
