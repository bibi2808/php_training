<?php
include_once(MODULE_PATH . 'admin/views/toolbar.php');
include_once 'submenu/index.php';

// input

// echo '<pre>';
// print_r($this->arrParam);
// echo '<pre />';
$dataForm         = isset($this->arrParam['form']) ? $this->arrParam['form'] : '';
$inputName = Helper::cmsInput('text', 'form[name]', 'name', $dataForm['name'] ?? null, 'inputbox required', 40);
$inputOrdering    = Helper::cmsInput('text', 'form[ordering]', 'ordering', $dataForm['ordering'] ?? null, 'inputbox', 40);
$selectStatus    = Helper::cmsSelectbox('form[status]', null, array('default' => '- Select status -', 1 => 'Publish', 0 => 'Unpublish'), $dataForm['status'] ?? null, 'width: 150px');
$selectGroupACP    = Helper::cmsSelectbox('form[group_acp]', null, array('default' => '- Select group acp -', 1 => 'Yes', 0 => 'No'), $dataForm['group_acp'] ?? null, 'width: 150px');
$inputToken        = Helper::cmsInput('hidden', 'form[token]', 'token', time());

$inputID        = '';
$rowID            = '';
if (isset($this->arrParam['id'])) {
    $inputID    = Helper::cmsInput('text', 'form[id]', 'id', $dataForm['id'], 'inputbox readonly');
    $rowID        = Helper::cmsRowForm('ID', $inputID);
}
// ROW
$rowName        = Helper::cmsRowForm('Name', $inputName, true);
$rowOrdering    = Helper::cmsRowForm('Ordering', $inputOrdering);
$rowStatus        = Helper::cmsRowForm('Status', $selectStatus);
$rowGroupACP    = Helper::cmsRowForm('Group ACP', $selectGroupACP);


// MESSAGE
$message    = Session::get('message');
Session::delete('message');
$strMessage = Helper::cmsMessage($message);

?>

<div id="system-message-container"><?php echo $strMessage . (isset($this->errors) ? $this->errors : ''); ?></div>
<div id="element-box">
    <div class="m">
        <form action="#" method="post" name="adminForm" id="adminForm" class="form-validate">
            <!-- FORM LEFT -->
            <div class="width-100 fltlft">
                <fieldset class="adminform">
                    <legend>Details</legend>
                    <ul class="adminformlist">
                        <li>
                            <?php echo $rowName . $rowOrdering . $rowStatus . $rowGroupACP . $rowID; ?>
                        </li>
                    </ul>
                    <div class="clr"></div>
                    <div>
                        <?php echo $inputToken; ?>
                    </div>
                </fieldset>
            </div>
            <div class="clr"></div>
            <div>
            </div>
        </form>
        <div class="clr"></div>
    </div>
</div>