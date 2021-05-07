<?php
        include_once 'toolbar/index.php';
        include_once 'submenu/index.php';

        $columnPost         = isset($this->arrParams['filter_column']) ? $this->arrParams['filter_column'] : '';
        $orderPost          = isset($this->arrParams['filter_column_dir']) ? $this->arrParams['filter_column_dir'] : '';
        $lblUserName        = Helper::cmsLinkSort('Username', 'username', $columnPost, $orderPost);
        $lblEmail           = Helper::cmsLinkSort('Email', 'email', $columnPost, $orderPost);
        $lblFullName        = Helper::cmsLinkSort('Fullname', 'fullname', $columnPost, $orderPost);
        $lblStatus          = Helper::cmsLinkSort('Status', 'status', $columnPost, $orderPost);
        $lblGroup          = Helper::cmsLinkSort('Group', 'group_id', $columnPost, $orderPost);
        $lblOrdering        = Helper::cmsLinkSort('Ordering', 'ordering', $columnPost, $orderPost);
        $lblCreated         = Helper::cmsLinkSort('Created', 'created', $columnPost, $orderPost);
        $lblCreatedBy       = Helper::cmsLinkSort('Created By', 'created_by', $columnPost, $orderPost);
        $lblModified        = Helper::cmsLinkSort('Modified', 'modified', $columnPost, $orderPost);
        $lblModifiedBy      = Helper::cmsLinkSort('Modified By', 'modified_by', $columnPost, $orderPost);
        $lblID              = Helper::cmsLinkSort('ID', 'id', $columnPost, $orderPost);


        // SELECT BOX
        $arrStatus = array('default' => '- Select Status -', 1 => 'Publish', 0 => 'UnPublish');
        $selectboxStatus = Helper::cmsSelectbox('filter_state', 'inputbox', $arrStatus, isset($this->arrParams['filter_state']) ? $this->arrParams['filter_state'] : '');

        // GROUP
        $selectboxGroup    = Helper::cmsSelectbox('filter_group_id', 'inputbox', $this->slbGroup, isset($this->arrParams['filter_group_id']) ? $this->arrParams['filter_group_id'] : '');

        // PAGINATION
        $paginationHTML = $this->pagination->showPagination(URL::createLink('admin', 'group', 'index'));

        // MESSAGE
        $message	= Session::get('message');
        Session::delete('message');
        $strMessage = Helper::cmsMessage($message);
        // echo '<pre>';
        // print_r($this->Items);
        // echo '<pre />';


?>
<div id="system-message-container"><?php echo $strMessage;?></div>

<div id="element-box">
    <div class="m">
        <form action="#" method="post" name="adminForm" id="adminForm">
            <!-- FILTER -->
            <fieldset id="filter-bar">
                <div class="filter-search fltlft">
                    <label class="filter-search-lbl" for="filter_search">Filter:</label>
                    <input type="text" name="filter_search" id="filter_search" value="">
                    <button type="submit" name="submit-keyword">Search</button>
                    <button type="button" name="clear-keyword">Clear</button>
                </div>
                <div class="filter-select fltrt">
                    <?php echo $selectboxStatus . $selectboxGroup; ?>
                </div>
            </fieldset>
            <div class="clr"> </div>

            <table class="adminlist" id="modules-mgr">
                <!-- HEADER TABLE -->
                <thead>
                    <tr>
                        <th width="1%"><input type="checkbox" name="checkall-toggle"></th>
                        <th width="10%"><?php echo $lblUserName; ?></th>
                        <th width="10%"><?php echo $lblEmail; ?></th>
                        <th width="10%"><?php echo $lblFullName; ?></th>
                        <th width="10%"><?php echo $lblGroup; ?></th>
                        <th width="6%"><?php echo $lblStatus; ?></th>
                        <th width="10%"><?php echo $lblOrdering; ?></th>
                        <th width="8%"><?php echo $lblCreated; ?></th>
                        <th width="10%"><?php echo $lblCreatedBy; ?></th>
                        <th width="8%"><?php echo $lblModified; ?></th>
                        <th width="10%"><?php echo $lblModifiedBy; ?></th>
                        <th width="1%" class="nowrap"><?php echo $lblID; ?></th>
                    </tr>
                </thead>
                <!-- FOOTER TABLE -->
                <tfoot>
                    <tr>
                        <td colspan="12">
                            <!-- PAGINATION -->
                            <div class="container">
                            <?php echo $paginationHTML; ?>
                            </div>
                        </td>
                    </tr>
                </tfoot>
                <!-- BODY TABLE -->
                <tbody>
                    <?php
                    if (!empty($this->Items)) {
                        foreach ($this->Items as $key => $value) {
                            $id = $value['id'];
                            $ckb = '<input type="checkbox" name="cid[]" value="' . $id . '">';
                            $row = ($key % 2 == 0) ? 'row0' : 'row1';
                            $username = $value['username'];
                            $fullname = $value['fullname'];
                            $group_name = $value['group_name'];
                            $email = $value['email'];


                            $status = Helper::cmsStatus($value['status'], URL::createLink('admin', 'user', 'ajaxStatus', array('id' => $id, 'status' => $value['status'])), $id);
                            
                            $ordering = '<input type="text" name="order['.$id.']" size="5" value="' . $value['ordering'] . '" class="text-area-order">';
                            $created = Helper::formartDate('d-m-Y', $value['created']);
                            $createdBy = $value['created_by'];
                            $modified = Helper::formartDate('d-m-Y', $value['modified']);
                            $modifiredBy = $value['modified_by'];

                            $linkEdit = URL::createLink('admin', 'user', 'form', array('id' => $id));

                            echo '<tr class="' . $row . '">
                                    <td class="center">' . $ckb . '</td>
                                    <td><a href="'.$linkEdit.'">' . $username . '</a></td>
                                    <td class="center">' . $email . '</td>
                                    <td class="center">' . $fullname . '</td>
                                    <td class="center">' . $group_name . '</td>
                                    <td class="center">' . $status . '</td>
                                    <td class="order">' . $ordering . '</td>
                                    <td class="center">' . $created . '</td>
                                    <td class="center">' . $createdBy . '</td>
                                    <td class="center">' . $modified . '</td>
                                    <td class="center">' . $modifiredBy . '</td>
                                    <td class="center">' . $id . '</td>
                                </tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>

            <div>
                <input type="hidden" name="filter_column" value="username">
                <input type="hidden" name="filter_page" value="1">
                <input type="hidden" name="filter_column_dir" value="asc">
            </div>
        </form>
        <div class="clr"></div>
    </div>
</div>
</div>