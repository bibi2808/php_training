<?php
        // echo '<pre>';
        // print_r($this->items);
        // echo '<pre />';
        // $items = $this->items
    if(!empty($this->items)){
        $xhtml = '';
        foreach($this->items as $key => $value){
            $id = $value['id'];
            $status = ($value['status'] == 0) ? 'Inactive' : 'Active';
            $xhtml .= '
                    <div class="row" id="item-'.$id .'">
                        <p class="w-10"><input type="checkbox" class="checkbox[]" value="1"></p>
                        <p>' .$value['name'] .'</p>
                        <p class="w-10">' .$id .'</p>
                        <p class="w-10">' .$status .'</p>
                        <p class="w-10">' .$value['ordering'] .'</p>
                        <p class="w-10">' .$value['total'] .'</p>
                        <p class="w-10">
                            <a href="#">Edit</a> |
                            <a href="javascript:deleteItem(' . $id . ')">Delete</a>
                        </p>
                    </div>';
        }
    }
?>


<div class="content">
    <h3>Group :: List</h3>
    <div class="list">
        <div class="row head">
            <p class="w-10"><input type="checkbox" class="check-all" id="check-all"></p>
            <p>Group name</p>
            <p class="w-10">ID</p>
            <p class="w-10">Status</p>
            <p class="w-10">Ordering</p>
            <p class="w-10">Member</p>
            <p class="w-10">Action</p>
        </div>
        <?php echo $xhtml; ?>
    </div>
</div>
<script type="text/javascript">
    function deleteItem(id){
            $.post('index.php?controller=group&action=delete', {id: id}, function(res){
                $("div#item-" + id).hide(500);
            })
    }
</script>