<!-- BEGIN: main -->
<!-- BEGIN: is_forum -->
<div class="quote" style="width:780px;">
    <blockquote class="error">
        <p>
            <span>{LANG.modforum}</span>
        </p>
    </blockquote>
</div>
<div class="clear"></div>
<!-- END: is_forum -->
<!-- BEGIN: error -->
<div style="width: 780px;" class="quote">
    <blockquote class="error">
        <p>
            <span>{ERROR}</span>
        </p>
    </blockquote>
</div>
<div class="clear"></div>
<!-- END: error -->
<!-- BEGIN: add_user -->
<form id="form_add_user" action="{FORM_ACTION}" method="post" enctype="multipart/form-data">
    <table class="tab1">
        <tbody>
            <tr>
                <td>
                    {LANG.account}
                </td>
                <td style="width:10px">
                    (<span style="color:#FF0000">*</span>)
                </td>
                <td>
                    <input class="txt" value="{DATA.username}" name="username" id="username_iavim" style="width:300px" />
                </td>
            </tr>
        </tbody>
        <tbody class="second">
            <tr>
                <td>
                    {LANG.cmnd}
                </td>
                <td style="width:10px">
                    (<span style="color:#FF0000">*</span>)
                </td>
                <td>
                    <input class="txt" value="{DATA.cmnd}" name="cmnd" id="cmnd_iavim" style="width:300px" />
                </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>
                    {LANG.password}
                </td>
                <td style="width:10px">
                    (<span style="color:#FF0000">*</span>)
                </td>
                <td>
                    <input class="txt" type="text" style="width: 150px" id="pass_iavim" name="password" value="{DATA.password}" readonly="readonly" />
                </td>
            </tr>
        </tbody>
        <tbody class="second">
            <tr>
                <td>
                    {LANG.name}
                </td>
                <td style="width:10px">
                    (<span style="color:#FF0000">*</span>)
                </td>
                <td>
                    <input class="txt" type="text" value="{DATA.full_name}" name="full_name" style="width:300px" />
                </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>
                    {LANG.gender}
                </td>
                <td style="width:10px">
                    (<span style="color:#FF0000">*</span>)
                </td>
                <td>
                    <select name="gender">
                        <!-- BEGIN: gender -->
                        <option value="{GENDER.key}"{GENDER.selected}>{GENDER.title}</option>
                        <!-- END: gender -->
                    </select>
                </td>
            </tr>
        </tbody>
        <tbody class="second">
            <tr>
                <td>
                    {LANG.birthday}
                </td>
                <td style="width:10px">
                    (<span style="color:#FF0000">*</span>)
                </td>
                <td>
                    <input name="birthday" id="birthday" value="{DATA.birthday}" style="width: 90px;" maxlength="10" readonly="readonly" type="text" />
                    <img src="{NV_BASE_SITEURL}images/calendar.jpg" style="cursor: pointer; vertical-align: middle;" onclick="popCalendar.show(this, 'birthday', 'dd.mm.yyyy', true);" alt="" height="17" />
                </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>
                    {LANG.address}
                </td>
                <td style="width:10px">
                    (<span style="color:#FF0000">*</span>)
                </td>
                <td>
                    <input class="txt" type="text" value="{DATA.location}" name="location" style="width:300px" />
                </td>
            </tr>
        </tbody>
        <tbody class="second">
            <tr>
                <td colspan="2">
                    {LANG.email}
                </td>
                <td>
                    <input class="txt" value="{DATA.email}" name="email" id="email_iavim" style="width:300px" />
                </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td colspan="3">
                    <input type="submit" name="confirm" value="{LANG.member_add}" />
                </td>
            </tr>
        </tbody>
    </table>
</form>
<script type="text/javascript">
//<![CDATA[
document.getElementById('form_add_user').setAttribute("autocomplete", "off");
//]]>
</script>
<!-- END: add_user -->
<!-- END: main -->