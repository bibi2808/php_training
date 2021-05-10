<?php
include_once(MODULE_PATH . 'admin/views/toolbar.php');
    // input
    $dataForm           = isset($this->arrParam['form']) ? $this->arrParam['form'] : '';

    $inputEmail         = Helper::cmsInput('text', 'form[email]', 'email', $dataForm['email'] ?? null, 'inputbox required', 40);
    $inputFullName      = Helper::cmsInput('text', 'form[fullname]', 'fullname', $dataForm['fullname'] ?? null, 'inputbox', 40);
    $inputID            = Helper::cmsInput('text', 'form[id]', 'id', $dataForm['id'], 'inputbox readonly');

    // ROW
    $rowUserEmail       = Helper::cmsRowForm('Email', $inputEmail, true);
    $rowFullName        = Helper::cmsRowForm('FullName', $inputFullName);
    $rowID              = Helper::cmsRowForm('ID', $inputID);

    // MESSAGE
    $message            = Session::get('message');
    Session::delete('message');
    $strMessage         = Helper::cmsMessage($message);

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
                            <?php echo  $rowUserEmail . $rowFullName . $rowID; ?>
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