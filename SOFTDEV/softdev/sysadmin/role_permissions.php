<?php
//******************************************************************
//This file was generated by Cobalt, a rapid application development
//framework developed by JV Roig (jvroig@jvroig.com).
//
//Cobalt on the web: http://cobalt.jvroig.com
//******************************************************************
require 'path.php';
init_cobalt('Add user role');

$SHOW_MODULES=TRUE;
$passportGroup='All Groups';

if(isset($_GET['filter_field_used']) && isset($_GET['filter_used']) && isset($_GET['page_from']))
{
    $role_id = $_GET['role_id'];
    require 'components/get_listview_referrer.php';
    $role_name = cobalt_load_class('user_role')->get_role_name($role_id)->dump['role'];
}

if(xsrf_guard())
{
    init_var($_POST['btn_cancel']);
    init_var($_POST['btn_submit']);
    init_var($_POST['find']);
    init_var($_POST['passportButton']);
    require 'components/query_string_standard.php';

    $role_id       = $_POST['role_id'];
    $role_name     = $_POST['role_name'];
    $passportGroup = $_POST['passportGroup'];

    $link=array();
    if(isset($_POST['link']))
    {
        $link = $_POST['link'];
    }

    if(isset($_POST['numLinks']))
    {
        $numLinks = $_POST['numLinks'];
    }

    if($_POST['btn_cancel'])
    {
        log_action('Pressed cancel button');
        redirect("listview_user_role.php?$query_string");
    }

    if($_POST['btn_submit'])
    {
        $completeList='';
        if($passportGroup!="All Groups")
        {
            $data_con = new data_abstraction;
            $data_con->set_fields('link_id');
            $data_con->set_table('user_links');
            $data_con->set_where("passport_group_id='" . quote_smart($passportGroup) . "'");
            $result = $data_con->make_query()->result;
            $numrows = $data_con->num_rows;
            $data_con->close_db();
            if($numrows>0)
            {
                for($a=0;$a<$numrows;$a++)
                {
                    $info=$result->fetch_row();
                    if($a != ($numrows - 1)) $completeList = $completeList . "'$info[0]',";
                    else $completeList = $completeList . "'$info[0]'";
                }

                $data_con = new data_abstraction;
                $data_con->set_query_type('DELETE');
                $data_con->set_table('user_role_links');
                $data_con->set_where("role_id='" . quote_smart($role_id) . "' AND link_id IN ($completeList)");
                $data_con->make_query();
                $data_con->close_db();
            }
        }
        else
        {
            $data_con = new data_abstraction;
            $data_con->set_query_type('DELETE');
            $data_con->set_table('user_role_links');
            $data_con->set_where("role_id='" . quote_smart($role_id) . "'");
            $data_con->make_query();
            $data_con->close_db();
        }

        //FIXME: Make this a batch insert instead of a looped single insert.
        $data_con = new data_abstraction;
        $data_con->set_query_type('INSERT');
        for($a=0;$a<$numLinks;$a++)
        {
            if(isset($link[$a]))
            {
                $data_con->set_table('user_role_links');
                $data_con->set_fields('role_id, link_id');
                $data_con->set_values("'" . quote_smart($role_id) . "', '$link[$a]'");
                $data_con->make_query();
            }
        }
        $data_con->close_db();
        $message = 'Role privileges succesfully updated';
        $message_type = 'system';
    }
}
$html_writer = new html;
$html_writer->draw_header('Role Permissions', $message, $message_type);
$html_writer->draw_listview_referrer_info($filter_field_used, $filter_used, $page_from, $filter_sort_asc, $filter_sort_desc);
$html_writer->draw_hidden('role_id');
$html_writer->draw_hidden('role_name');
?>
<div class="container">
<fieldset class="container_invisible">
<fieldset class="top"> Modify System Privileges for Role: <?php echo $role_name; ?></fieldset>
<fieldset class="middle">
<table width="75%" cellpadding="2" cellspacing="2" align="center" class="tableContent">
<?php
init_var($passportGroup);
?>
<TR><TD align="right"> Passport Group: </TD><TD colspan="3">
    <SELECT NAME="passportGroup">
    <?php
    echo '<option selected>All Groups</option>';
    $data_con = new data_abstraction;
    $data_con->connect_db();
    $data_con->set_fields('passport_group_id, passport_group AS Passport_Group_Name');
    $data_con->set_table('user_passport_groups');
    $data_con->set_order('passport_group');
    if($result = $data_con->make_query()->result)
    {
        $a=0;
        while($data = $result->fetch_assoc())
        {
            extract($data);
            $selected = '';
            if($passport_group_id == $passportGroup) $selected = 'selected';
            echo "<option value='$passport_group_id' $selected> $Passport_Group_Name </option>";
        }
        $result->close();
    }
    else die($data_con->error);
    $data_con->close_db();
    ?>
    </SELECT> <input type=submit name="passportButton" value="GO" class=button1>
    </TD>
</TR>
</TABLE>

<table class="input_form" width="900">
<tr><td><hr></td>
</table>

<?php
if($SHOW_MODULES)
{
    if($passportGroup != 'All Groups')
    {
        $data_con = new data_abstraction;
        $data_con->connect_db();
        $data_con->set_fields('passport_group AS `Group_Title`');
        $data_con->set_table('user_passport_groups');
        $data_con->set_where("passport_group_id = '$passportGroup'");
        $result = $data_con->make_query()->result;
        $data_con->close_db();

        $info = $result->fetch_assoc();
        extract($info);
    }
    else $Group_Title = "All Groups";
?>
    <br><br>
    <table width="900" class="listView" align="center">
    <TR class="listRowHead"><TD colspan="2"> <?php echo "$Group_Title privileges for $role_name";?></TD></TR>
    <TR><TD colspan=2>
        <input type=button name=CHECK value="CHECK ALL" class="button1" onClick="checkAll();">
        <input type=button name=UNCHECK value="UNCHECK ALL" class="button1" onClick="uncheckAll();">
    </TD></TR>
    <?php
    $data_con = new data_abstraction;
    $data_con->set_fields('a.link_id, a.descriptive_title AS `Module_Name`');
    $data_con->set_table('user_links a, user_passport_groups b');

    if($passportGroup!="All Groups")
        $data_con->set_where("a.passport_group_id = b.passport_group_id AND b.passport_group_id='$passportGroup'");
    elseif($passportGroup=="All Groups")
        $data_con->set_where("a.passport_group_id = b.passport_group_id AND b.passport_group_id!=''");

    $data_con->set_order('a.descriptive_title');
    $result = $data_con->make_query()->result;
    $numrows= $data_con->num_rows;
    $data_con->close_db();
    echo '<input type="hidden" name="numLinks" value="' . $numrows . '">';

    for ($a=0;$a<$numrows;$a+=2)
    {
        if($a%4==0) $class='listRowOddNoHighlight';
        else $class='listRowEvenNoHighlight';

        $info=$result->fetch_assoc();
        extract($info);

        $data_con = new data_abstraction;
        $data_con->set_fields('role_id');
        $data_con->set_table('user_role_links');
        $data_con->set_where("role_id='$role_id' AND link_id='$link_id'");
        $data_con->make_query();

        $checked = '';
        if($data_con->num_rows==1) $checked = 'checked';

        echo "<TR class=$class><TD class=\"listCell\"><label style=\"display: block;\" for='checkfield[$a]'><input type=checkbox ID='checkfield[$a]' name=\"link[]\" value='$link_id' $checked> $Module_Name</label></TD>";

        $data_con->close_db();

        if(($a+1) < $numrows)
        {
            $info=$result->fetch_assoc();
            extract($info);

            $data_con = new data_abstraction;
            $data_con->set_fields('role_id');
            $data_con->set_table('user_role_links');
            $data_con->set_where("role_id='$role_id' AND link_id='$link_id'");
            $data_con->make_query();

            if($data_con->num_rows==0)     echo "<TD class='listCell'><label style=\"display: block;\" for=\"checkfield[" . ($a+1) . "]\"><input type=checkbox ID='checkfield[" . ($a+1) . "]' name=\"link[]\" value='$link_id'> $Module_Name</label></TD></TR>";
            elseif($data_con->num_rows==1) echo "<TD class='listCell'><label style=\"display: block;\" for=\"checkfield[" . ($a+1) . "]\"><input type=checkbox ID='checkfield[" . ($a+1) . "]' name=\"link[]\" value='$link_id' checked> $Module_Name</label></TD></TR>";

            $data_con->close_db();
        }
        else echo "<TD class='listCell'> &nbsp; </TD></TR>";
    }
    if($numrows > 0)
    {
        echo "<TR><TD colspan=2 align=center>
                <input type=submit name=btn_submit value='SUBMIT' class=submit>
                <input type=submit name=btn_cancel value='BACK' class=cancel>";
    }
    else
    {
        echo "<TR><TD colspan=2> No modules found for this passport group. Please choose a different passport group.";
    }
    ?>
    </TD></TR>
    </TABLE>
<?php
}
else echo "<TABLE align=center><TR><TD><input type=submit name=btn_cancel value='BACK' class=button1></TD></TR></TABLE>";
echo '</fieldset>';
echo '</fieldset>';
echo '</div>';
$html_writer->draw_footer();
?>
<script language="JavaScript" type="text/JavaScript">
function checkAll()
{

    var arrCheckBoxes = document.getElementsByName('link[]');
    for (var i = 0; i < arrCheckBoxes.length; i++)
    {
        arrCheckBoxes[i].checked = true;
    }
}
function uncheckAll()
{
    var arrCheckBoxes = document.getElementsByName('link[]');
    for (var i = 0; i < arrCheckBoxes.length; i++)
    {
        arrCheckBoxes[i].checked = false;
    }
}
</script>
<?php
