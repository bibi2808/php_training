function deleteItem(id){
    console.log(id)
    $.post('index.php?controller=group&action=delete', {id: id}, function(res){
        $("div#item-" + id).hide(500);
    })
}