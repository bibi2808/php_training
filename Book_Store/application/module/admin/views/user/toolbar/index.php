<?php
    // Button Add
    $linkNew = URL::createLink('admin', 'user', 'form');
    $btnNew = Helper::cmsButton('New', 'toolbar-new', $linkNew, 'icon-32-new');

    // Button Publish
    $linkPublish = URL::createLink('admin', 'user', 'status', array('type' => 1));
    $btnPublish = Helper::cmsButton('Publish', 'toolbar-publish', $linkPublish, 'icon-32-publish', 'submit');

    // Button Unpublish
    $linkUnpublish = URL::createLink('admin', 'user', 'status', array('type' => 0));
    $btnUnPushlish = Helper::cmsButton('Unpublish', 'toolbar-unpublish', $linkUnpublish, 'icon-32-unpublish', 'submit');

    // Button Ordering
    $linkbtnOrdering = URL::createLink('admin', 'user', 'ordering');
    $btnOrdering = Helper::cmsButton('Ordering', 'toolbar-checkin', $linkbtnOrdering, 'icon-32-checkin', 'submit');

    // Button Trash
    $linkTrash = URL::createLink('admin', 'user', 'trash');
    $btnTrash = Helper::cmsButton('Trash', 'toolbar-trash', $linkTrash, 'icon-32-trash', 'submit');

    // Button Save
    $linkSave = URL::createLink('admin', 'user', 'form', array('type'=>'save'));
    $btnSave = Helper::cmsButton('Save', 'toolbar-apply', $linkSave, 'icon-32-apply','submit');

    // Button Save & Close
    $linkSaveClose = URL::createLink('admin', 'user', 'form', array('type'=>'save-close'));
    $btnSaveClose = Helper::cmsButton('Save & Close', 'toolbar-save', $linkSaveClose, 'icon-32-save','submit');

    // Button Save & New
    $linkSaveNew = URL::createLink('admin', 'user', 'form', array('type'=>'save-new'));
    $btnSaveNew = Helper::cmsButton('Save & New', 'toolbar-save-new', $linkSaveNew, 'icon-32-save-new','submit');

    // Button Cancel
    $linkCancel = URL::createLink('admin', 'user', 'index');
    $btnCancel = Helper::cmsButton('Cancel', 'toolbar-cancel', $linkCancel, 'icon-32-cancel');





    $cmsBtn = $btnNew . $btnPublish . $btnUnPushlish . $btnTrash;
    switch ($this->arrParams['action']) {
        case 'index':
            $cmsBtn = $btnNew . $btnPublish . $btnUnPushlish .$btnOrdering . $btnTrash;
        break;
        case 'form':
            $cmsBtn = $btnSave . $btnSaveClose . $btnSaveNew . $btnCancel;
        break;
    }

?>

<div id="toolbar-box">
    <div class="m">
        <!-- TOOLBAR -->
        <div class="toolbar-list" id="toolbar">
            <ul>
                <?php
                    echo $cmsBtn;
                ?>
            </ul>

            <div class="clr"></div>
        </div>
        <!-- TITLE -->
        <div class="pagetitle icon-48-groups">
            <h2><?php echo $this->_title; ?></h2>
        </div>
    </div>
</div>