<?php
//******************************************************************
//This file was generated by Cobalt, a rapid application development
//framework developed by JV Roig (jvroig@jvroig.com).
//
//Cobalt on the web: http://cobalt.jvroig.com
//******************************************************************
require 'path.php';
init_cobalt('Set User Passports');

$showPermissions = FALSE;
$fromSuccess     = '';
$exclusive       = 'YES';

if(isset($_GET['Username']) && $_GET['Username'] != "")
{
    $Username = $_GET['Username'];
    $fromSuccess="YES";
}

if(xsrf_guard())
{
    init_var($_POST['btn_cancel']);
    init_var($_POST['btn_submit']);
    init_var($_POST['find']);
    init_var($_POST['roleButton']);

    if($_POST['btn_cancel'])
    {
        log_action('Pressed cancel button');
        redirect(HOME_PAGE);
    }

    $Username  = $_POST['Username'];
    $role      = $_POST['role'];

    $exclusive = '';
    if(isset($_POST['exclusive']))
    {
        $exclusive = $_POST['exclusive'];
    }

    if($role!='') $_POST['roleButton'] = TRUE;

    if(($_POST['find']) || ($_POST['roleButton']) || ($fromSuccess=="YES"))
    {
        $data_con = new data_abstraction;
        $data_con->set_fields('a.person_id, c.first_name, c.middle_name, c.last_name');
        $data_con->set_table('user a, person c');
        $data_con->set_where("a.username='" . quote_smart($Username) . "' AND a.person_id = c.person_id");
        $result = $data_con->make_query()->result;
        $numrows = $data_con->num_rows;
        $data_con->close_db();

        if($numrows==1)
        {
            $data = $result->fetch_assoc();
            extract($data);
            $Name = $first_name . ' ' . $middle_name . ' ' . $last_name;
            //$Type = $user_type;

            if($role!='')
            {
                $arrLinkName = '';

                require_once 'subclasses/user_role_links.php';
                $obj_role = new user_role_links;
                $obj_role->get_user_role_links($role);
                $numLinks = $obj_role->num_rows;
                if($numLinks > 0)
                {
                    $arrLinkName = $obj_role->dump['descriptive_title'];
                }
                $obj_role->close_db();
                $showPermissions=TRUE;
            }
        }
        elseif($numrows==0)
        {
            $message = 'No match found for username you entered.';
            $message_type = 'error';
            $_POST['passportButton'] = FALSE;
            $_POST['find'] = FALSE;
            $Name='';
            $Role='';
            //$Type="";
        }

    }

    if($_POST['btn_submit'])
    {
        init_var($exclusive);
        if($exclusive==TRUE)
        {
            //Delete all existing permissions, so that the assigned role
            //will be the exclusive role of the user.
            $dbh = new data_abstraction();
            $dbh->set_query_type('DELETE');
            $dbh->set_table('user_passport');
            $dbh->set_where("username='" . quote_smart($Username) . "'");
            $dbh->make_query();
            $dbh->close_db();

            //Update user's assigned role
            $dbh = new data_abstraction();
            $dbh->set_query_type('UPDATE');
            $dbh->set_table('user');
            $dbh->set_update("role_id='" . quote_smart($role) . "'");
            $dbh->set_where("username='" . quote_smart($Username) . "'");
            $dbh->make_query();
            $dbh->close_db();

            //Assign role permissions
            $dbh->execute_query("INSERT `user_passport` SELECT '" . quote_smart($Username) . "', `link_id` FROM user_role_links WHERE role_id='" . quote_smart($role) . "'");
        }
        else
        {
            //Since non-exclusive, set user's role to 0 (no role assigned)
            $dbh = new data_abstraction();
            $dbh->set_query_type('UPDATE');
            $dbh->set_table('user');
            $dbh->set_update("role_id='0'");
            $dbh->set_where("username='" . quote_smart($Username) . "'");
            $dbh->make_query();
            $dbh->close_db();

            //Get the role permissions
            require_once 'subclasses/user_role_links.php';
            $obj_role = new user_role_links;
            $obj_role->get_user_role_links($role);
            $arrLink = $obj_role->dump['link_id'];
            $numLinks = $obj_role->num_rows;
            $obj_role->close_db();

            //Assign permissions to user
            $dbh = new data_abstraction();
            foreach($arrLink as $link_id)
            {
                $dbh->set_query_type('SELECT');
                $dbh->set_table('user_passport');
                $dbh->set_fields('username, link_id');
                $dbh->set_where("username='" . quote_smart($Username) . "' AND link_id='" . quote_smart($link_id) . "'");
                $dbh->make_query();
                if($dbh->num_rows == 0)
                {
                    $dbh->set_query_type('INSERT');
                    $dbh->set_values("'" . quote_smart($Username) . "','" . quote_smart($link_id) . "'");
                    $dbh->make_query();
                }
            }
            $dbh->close_db();
        }

        $message = 'Success! User passport has been updated.';
        $message_type='system';
    }
}
$html_writer = new html;
$html_writer->draw_header('Set User Passports', $message, $message_type);
?>

<div class="container">
<fieldset class="container_invisible">
<fieldset class="top"> Role-Based Access Control Interface</fieldset>
<fieldset class="middle">
<table class="input_form" width="800">
<tr><td><a href="set_user_passports.php">[Custom Permissions]</a> :: <a href="set_user_passports2.php">[View and Remove Permissions Per Module]</a> :: <b>[Role-Based Access Control Interface]</b><hr></td>
</table>
<?php
init_var($Username);
init_var($Name);
init_var($Type);
?>
<table width="75%" cellpadding="2" cellspacing="2" class="input_form">
<tr>
    <td class="label"> Username: </td>
    <td><input type=text name="Username" value="<?php echo $Username; ?>"> <input type=submit name=find value="FIND" class=button1></td>
</tr>
<tr>
    <td class="label"> Full Name: </td>
    <td><input type=text name="Name" size=30 value="<?php echo $Name; ?>" readonly></td>
</tr>
<tr>
    <td class="label"> Role: </td>
    <td>
        <?php
        $query="SELECT role_id, role AS `role_name` FROM user_role ORDER BY role";
        $value='role_id';
        $items=array('role_name');
        $html_writer->draw_select_field_from_query($query, $value, $items, '','role',FALSE, FALSE,'','onChange="show_loading_div(); this.form.submit()"');

        $checked ='';
        if($exclusive=='YES')
        {
            $checked = 'checked';
        }
        ?>
        <input type="checkbox" id="exclusive" name="exclusive" value="YES" <?php echo $checked; ?>><label for="exclusive"> Exclusive Role</label>
    </td>
</tr>
</table>

<?php
if($showPermissions)
{
    echo '<table width="700" align="center" class="listView">';
    echo '<tr class="listRowHead"><td colspan="2">Permissions</td></tr>';
    if(is_array($arrLinkName))
    {
        for($a=0; $a<$numLinks; $a+=2)
        {
            if($a%4==0) $class='listRowOddNoHighlight';
            else $class='listRowEvenNoHighlight';

            echo '<tr class="' . $class . '">';
            echo '<td>' . $arrLinkName[$a] . '</td>';

            $b = $a+1;
            if(isset($arrLinkName[$b])) echo '<td>' . $arrLinkName[$b] . '</td>';
            else echo '<td> &nbsp; </td>';

            echo '</tr>';
        }
        echo '<tr><td colspan="2" align="center">
                <input type="submit" name="btn_submit" value="ASSIGN ROLE" class="button1">
              </td></tr>';
    }
    else
    {
        echo '<tr><td align="center"> No permissions set for this role </td></tr>';
    }
    echo '</table>';
}
?>
</fieldset>
</fieldset>
</div>

<?php $html_writer->draw_footer();
