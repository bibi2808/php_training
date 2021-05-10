<?php
include_once(MODULE_PATH . 'admin/views/toolbar.php');
include_once 'submenu/index.php';

echo '<pre>';
print_r($this->arrParam);
echo '<pre />';

    // input
    $dataForm         = isset($this->arrParam['form']) ? $this->arrParam['form'] : '';
    $inputUserName = Helper::cmsInput('text', 'form[username]', 'name', $dataForm['username'] ?? null, 'inputbox required', 40);
    $inputEmail = Helper::cmsInput('text', 'form[email]', 'name', $dataForm['email'] ?? null, 'inputbox required', 40);
    $inputFullName = Helper::cmsInput('text', 'form[fullname]', 'name', $dataForm['fullname'] ?? null, 'inputbox', 40);
    $inputPassword = Helper::cmsInput('text', 'form[password]', 'name', $dataForm['password'] ?? null, 'inputbox required', 40);
    $inputOrdering    = Helper::cmsInput('text', 'form[ordering]', 'ordering', $dataForm['ordering'] ?? null, 'inputbox', 40);
    $slbStatus    = Helper::cmsSelectbox('form[status]', null, array('default' => '- Select status -', 1 => 'Publish', 0 => 'Unpublish'), $dataForm['status'] ?? null, 'width: 150px');
    $slbGroup		= Helper::cmsSelectbox('form[group_id]', 'inputbox', $this->slbGroup, (isset($dataForm['group_id']) ? $dataForm['group_id'] : ''));


    $inputToken        = Helper::cmsInput('hidden', 'form[token]', 'token', time());

    $inputID        = '';
    $rowID            = '';
    if (isset($this->arrParam['id'])) {
        $inputID    = Helper::cmsInput('text', 'form[id]', 'id', $dataForm['id'], 'inputbox readonly');
        $rowID        = Helper::cmsRowForm('ID', $inputID);
    }
    // ROW
    $rowUserName        = Helper::cmsRowForm('UserName', $inputUserName, true);
    $rowUserEmail        = Helper::cmsRowForm('Email', $inputEmail, true);
    $rowFullName       = Helper::cmsRowForm('FullName', $inputFullName);
    $rowPassword       = Helper::cmsRowForm('Password', $inputPassword, true);
    $rowOrdering    = Helper::cmsRowForm('Ordering', $inputOrdering);
    $rowStatus        = Helper::cmsRowForm('Status', $slbStatus);
    $rowGroup    = Helper::cmsRowForm('Group', $slbGroup);


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
                            <?php echo $rowUserName . $rowUserEmail . $rowFullName . $rowPassword . $rowStatus .$rowGroup . $rowOrdering . $rowID; ?>
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