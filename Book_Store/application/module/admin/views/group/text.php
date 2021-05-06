<div id="toolbar-box">
    <div class="m">
        <!-- TOOLBAR -->
        <div class="toolbar-list" id="toolbar">
            <ul>
                <li class="button" id="toolbar-popup-new"><a class="modal"
                        href="/bookstore/index.php?module=admin&controller=group&action=form"><span
                            class="icon-32-new"></span>New</a></li>
                <li class="button" id="toolbar-publish"><a class="modal" href="#"
                        onclick="javascript:submitForm('/bookstore/index.php?module=admin&controller=group&action=status&type=1');"><span
                            class="icon-32-publish"></span>Publish</a></li>
                <li class="button" id="toolbar-unpublish"><a class="modal" href="#"
                        onclick="javascript:submitForm('/bookstore/index.php?module=admin&controller=group&action=status&type=0');"><span
                            class="icon-32-unpublish"></span>Unpublish</a></li>
                <li class="button" id="toolbar-checkin"><a class="modal" href="#"
                        onclick="javascript:submitForm('/bookstore/index.php?module=admin&controller=group&action=ordering');"><span
                            class="icon-32-checkin"></span>Ordering</a></li>
                <li class="button" id="toolbar-trash"><a class="modal" href="#"
                        onclick="javascript:submitForm('/bookstore/index.php?module=admin&controller=group&action=trash');"><span
                            class="icon-32-trash"></span>Trash</a></li>
            </ul>

            <div class="clr"></div>
        </div>
        <!-- TITLE -->
        <div class="pagetitle icon-48-groups">
            <h2>Group Manager :: List</h2>
        </div>
    </div>
</div>
<div id="submenu-box">
    <div class="m">
        <ul id="submenu">
            <li><a href="#" class="active">Group</a></li>
            <li><a href="/bookstore/index.php?module=admin&controller=user&action=index">User</a></li>
        </ul>
        <div class="clr"></div>
    </div>
</div>
<div id="system-message-container"></div>

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
                    <select name="filter_state" class="inputbox">
                        <option value="default">- Select Status -</option>
                        <option value="1">Publish</option>
                        <option value="0">Unpublish</option>
                    </select><select name="filter_group_acp" class="inputbox">
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
                        <th class="title"><a href="#" onclick="javascript:sortList('name','desc')">Name</a></th>
                        <th width="10%"><a href="#" onclick="javascript:sortList('status','desc')">Status</a></th>
                        <th width="10%"><a href="#" onclick="javascript:sortList('group_acp','desc')">Group ACP</a>
                        </th>
                        <th width="10%"><a href="#" onclick="javascript:sortList('ordering','desc')">Ordering</a>
                        </th>
                        <th width="10%"><a href="#" onclick="javascript:sortList('created','desc')">Created</a></th>
                        <th width="10%"><a href="#" onclick="javascript:sortList('created_by','desc')">Created
                                By</a></th>
                        <th width="10%"><a href="#" onclick="javascript:sortList('modified','desc')">Modified</a>
                        </th>
                        <th width="10%"><a href="#" onclick="javascript:sortList('modified_by','desc')">Modified
                                By</a></th>
                        <th width="1%" class="nowrap"><a href="#" onclick="javascript:sortList('id','desc')">ID</a>
                        </th>
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
                    <tr class="row0">
                        <td class="center"><input type="checkbox" name="cid[]" value="3"></td>
                        <td><a href="/bookstore/index.php?module=admin&controller=group&action=form&id=3">Member</a>
                        </td>
                        <td class="center"><a class="jgrid" id="status-3"
                                href="javascript:changeStatus('/bookstore/index.php?module=admin&controller=group&action=ajaxStatus&id=3&status=1');">
                                <span class="state publish"></span>
                            </a></td>
                        <td class="center"><a class="jgrid" id="group-acp-3"
                                href="javascript:changeGroupACP('/bookstore/index.php?module=admin&controller=group&action=ajaxACP&id=3&group_acp=0');">
                                <span class="state unpublish"></span>
                            </a></td>
                        <td class="order"><input type="text" name="order[3]" size="5" value="2" class="text-area-order">
                        </td>
                        <td class="center">12-11-2013</td>
                        <td class="center">admin</td>
                        <td class="center">03-12-2013</td>
                        <td class="center">admin</td>
                        <td class="center">3</td>
                    </tr>
                    <tr class="row1">
                        <td class="center"><input type="checkbox" name="cid[]" value="2"></td>
                        <td><a href="/bookstore/index.php?module=admin&controller=group&action=form&id=2">Manager</a>
                        </td>
                        <td class="center"><a class="jgrid" id="status-2"
                                href="javascript:changeStatus('/bookstore/index.php?module=admin&controller=group&action=ajaxStatus&id=2&status=1');">
                                <span class="state publish"></span>
                            </a></td>
                        <td class="center"><a class="jgrid" id="group-acp-2"
                                href="javascript:changeGroupACP('/bookstore/index.php?module=admin&controller=group&action=ajaxACP&id=2&group_acp=1');">
                                <span class="state publish"></span>
                            </a></td>
                        <td class="order"><input type="text" name="order[2]" size="5" value="4" class="text-area-order">
                        </td>
                        <td class="center">07-11-2013</td>
                        <td class="center">admin</td>
                        <td class="center">03-12-2013</td>
                        <td class="center">admin</td>
                        <td class="center">2</td>
                    </tr>
                    <tr class="row0">
                        <td class="center"><input type="checkbox" name="cid[]" value="1"></td>
                        <td><a href="/bookstore/index.php?module=admin&controller=group&action=form&id=1">Admin</a>
                        </td>
                        <td class="center"><a class="jgrid" id="status-1"
                                href="javascript:changeStatus('/bookstore/index.php?module=admin&controller=group&action=ajaxStatus&id=1&status=1');">
                                <span class="state publish"></span>
                            </a></td>
                        <td class="center"><a class="jgrid" id="group-acp-1"
                                href="javascript:changeGroupACP('/bookstore/index.php?module=admin&controller=group&action=ajaxACP&id=1&group_acp=1');">
                                <span class="state publish"></span>
                            </a></td>
                        <td class="order"><input type="text" name="order[1]" size="5" value="5" class="text-area-order">
                        </td>
                        <td class="center">11-11-2013</td>
                        <td class="center">admin</td>
                        <td class="center">12-11-2013</td>
                        <td class="center">admin</td>
                        <td class="center">1</td>
                    </tr>
                </tbody>
            </table>

            <div>
                <input type="hidden" name="filter_column" value="name">
                <input type="hidden" name="filter_page" value="1">
                <input type="hidden" name="filter_column_dir" value="asc">
            </div>
        </form>

        <div class="clr"></div>
    </div>
</div>
</div>