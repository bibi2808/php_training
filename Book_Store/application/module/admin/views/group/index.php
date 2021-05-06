<?php
    include_once 'toolbar/index.php';
    include_once 'submenu/index.php';
 
    $columnPost		= $this->arrParam['filter_column'];
    $orderPost		= $this->arrParam['filter_column_dir'];
    $lblName 		= Helper::cmsLinkSort('Name', 'name', $columnPost, $orderPost);
    $lblStatus		= Helper::cmsLinkSort('Status', 'status', $columnPost, $orderPost);
    $lblGroupACP	= Helper::cmsLinkSort('Group ACP', 'group_acp', $columnPost, $orderPost);
    $lblOrdering	= Helper::cmsLinkSort('Ordering', 'ordering', $columnPost, $orderPost);
    $lblCreated		= Helper::cmsLinkSort('Created', 'created', $columnPost, $orderPost);
    $lblCreatedBy	= Helper::cmsLinkSort('Created By', 'created_by', $columnPost, $orderPost);
    $lblModified	= Helper::cmsLinkSort('Modified', 'modified', $columnPost, $orderPost);
    $lblModifiedBy	= Helper::cmsLinkSort('Modified By', 'modified_by', $columnPost, $orderPost);
    $lblID			= Helper::cmsLinkSort('ID', 'id', $columnPost, $orderPost);
?>

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
                    <select style="" name="filter_state" class="inputbox">
                        <option value="default">- Select Status -</option>
                        <option value="1">Publish</option>
                        <option value="0">Unpublish</option>
                    </select><select style="" name="filter_group_acp" class="inputbox">
                        <option value="default">- Select Group ACP -</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select> </div>
            </fieldset>
            <div class="clr"> </div>

            <table class="adminlist" id="modules-mgr">
                <!-- HEADER TABLE -->
                <thead>
                    <tr>
                        <th width="1%"><input type="checkbox" name="checkall-toggle"></th>
                        <th class="title"><?php echo $lblName;?></th>
                        <th width="10%"><?php echo $lblStatus;?></th>
                        <th width="10%"><?php echo $lblGroupACP;?></th>
                        <th width="10%"><?php echo $lblOrdering;?></th>
                        <th width="10%"><?php echo $lblCreated;?></th>
                        <th width="10%"><?php echo $lblCreatedBy;?></th>
                        <th width="10%"><?php echo $lblModified;?></th>
                        <th width="10%"><?php echo $lblModifiedBy;?></th>
                        <th width="1%" class="nowrap"><?php echo $lblID;?></th>
                    </tr>
                </thead>
                <!-- FOOTER TABLE -->
                <tfoot>
                    <tr>
                        <td colspan="10">
                            <!-- PAGINATION -->
                            <div class="container">
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
                                $ckb = '<input type="checkbox" name="cid[]" value="'.$id.'">';
                                $row = ($key%2==0) ? 'row0' : 'row1';
                                $name = $value['name'];
                                
                                $status = Helper::cmsStatus($value['status'], URL::createLink('admin', 'group', 'ajaxStatus', array('id' => $id, 'status' => $value['status'])), $id);
                                $group_acp	= Helper::cmsGroupACP($value['group_acp'], URL::createLink('admin', 'group', 'ajaxACP', array('id' => $id, 'group_acp' => $value['group_acp'])), $id);
                                $ordering = '<input type="text" name="order[]" size="5" value="'.$value['ordering'].'" class="text-area-order">';
                                $created = Helper::formartDate('d-m-Y', $value['created']);
                                $createdBy = $value['created_by'];
                                $modified = Helper::formartDate('d-m-Y', $value['modified']);
                                $modifiredBy = $value['modified_by'];
                                
                                echo '<tr class="'.$row.'">
                                    <td class="center">'.$ckb.'</td>
                                    <td><a href="#">'.$name.'</a>
                                    </td>
                                    <td class="center">'.$status.'</td>
                                    <td class="center">'.$group_acp.'</td>
                                    <td class="order">'.$ordering.'</td>
                                    <td class="center">'.$created.'</td>
                                    <td class="center">'.$createdBy.'</td>
                                    <td class="center">'.$modified.'</td>
                                    <td class="center">'.$modifiredBy.'</td>
                                    <td class="center">'.$id.'</td>
                                </tr>';
                            }
                        }
                    ?>
                </tbody>
            </table>

            <div>
                <input type="hidden" name="filter_column" value="name">
                <!-- <input type="hidden" name="filter_page" value="1"> -->
                <input type="hidden" name="filter_column_dir" value="asc">
            </div>
        </form>

        <div class="clr"></div>
    </div>
</div>
</div>