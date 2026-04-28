<?php
/**
 * Training Management
 */

$page_security = 'SA_TRAINING';
$path_to_root = "../../..";

include_once($path_to_root . "/includes/session.inc");
include_once($path_to_root . "/includes/ui.inc");
include_once($path_to_root . "/modules/FA_Training/includes/training_db.inc");

page(_("Training"), false, false, "", "");

$section = isset($_GET['section']) ? $_GET['section'] : 'programs';

switch ($section) {
    case 'my':
        display_my_training();
        break;
    case 'programs':
    default:
        display_training_programs();
        break;
}

end_page(true);

function display_training_programs(): void
{
    $programs = get_training_programs();
    
    start_table(TABLESTYLE);
    table_header([_('Name'), _('Type'), _('Duration'), _('Status'), _('Action')]);
    
    while ($prog = db_fetch($programs)) {
        alt_table_row($prog);
        label_cell($prog['name']);
        label_cell($prog['type']);
        label_cell($prog['duration_hours'] ? $prog['duration_hours'] . ' hrs' : '-');
        label_cell($prog['status']);
        echo "<td><a href='?enroll=" . $prog['id'] . "'>" . _("Enroll") . "</a></td>";
    }
    end_table(1);
}

function display_my_training(): void
{
    $my_id = isset($_SESSION["wa_user"]) ? $_SESSION["wa_user"]->employee_id : 0;
    $enrollments = get_enrollments(['employee_id' => $my_id]);
    
    start_table(TABLESTYLE);
    table_header([_('Program'), _('Type'), _('Status'), _('Completion Date')]);
    
    while ($enr = db_fetch($enrollments)) {
        alt_table_row($enr);
        label_cell($enr['program_name']);
        label_cell($enr['type']);
        label_cell($enr['status']);
        label_cell($enr['completion_date'] ? sql2date($enr['completion_date']) : '-');
    }
    end_table(1);
}