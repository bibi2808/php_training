<?php
        include_once(MODULE_PATH . 'admin/views/toolbar.php');
        include_once 'submenu/index.php';

        // input

        // echo '<pre>';
        // print_r($this->arrParam);
        // echo '<pre />';
        $dataForm         = isset($this->arrParam['form']) ? $this->arrParam['form'] : '';
        $inputName = Helper::cmsInput('text', 'form[name]', 'name', $dataForm['name'] ?? null, 'inputbox required', 40);
        $inputOrdering    = Helper::cmsInput('text', 'form[ordering]', 'ordering', isset($dataForm['ordering']), 'inputbox', 40);
        $selectStatus    = Helper::cmsSelectbox('form[status]', null, array('default' => '- Select status -', 1 => 'Publish', 0 => 'Unpublish'), isset($dataForm['status']), 'width: 150px');
        $inputPicture = Helper::cmsInput('file', 'picture', 'picture', isset($dataForm['picture']), 'inputbox', 40);
       
        $inputToken         = Helper::cmsInput('hidden', 'form[token]', 'token', time());

        $inputID            = '';
        $rowID            = '';
        if (isset($this->arrParam['id'])) {
            $inputID    = Helper::cmsInput('text', 'form[id]', 'id', $dataForm['id'], 'inputbox readonly');
            $rowID        = Helper::cmsRowForm('ID', $inputID);
        }
        // ROW
        $rowName        = Helper::cmsRowForm('Name', $inputName, true);
        $rowOrdering    = Helper::cmsRowForm('Ordering', $inputOrdering);
        $rowStatus      = Helper::cmsRowForm('Status', $selectStatus);
        $rowSPicture    = Helper::cmsRowForm('Picture', $inputPicture);


        // MESSAGE
        $message    = Session::get('message');
        Session::delete('message');
        $strMessage = Helper::cmsMessage($message);

?>

<div id="system-message-container"><?php echo $strMessage . (isset($this->errors) ? $this->errors : ''); ?></div>
<div id="element-box">
    <div class="m">
        <form action="#" method="post" name="adminForm" id="adminForm" class="form-validate" enctype="multipart/form-data">
            <!-- FORM LEFT -->
            <div class="width-100 fltlft">
                <fieldset class="adminform">
                    <legend>Details</legend>
                    <ul class="adminformlist">
                        <li>
                            <?php echo $rowName . $rowOrdering . $rowStatus . $rowSPicture . $rowID; ?>
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