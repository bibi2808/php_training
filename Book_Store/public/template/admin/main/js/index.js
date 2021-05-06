function changeStatus(url){
	$.get(url, function(data){
		var element		= 'a#status-' + data['id'];
		var classRemove = 'publish';
		var classAdd 	= 'unpublish';
		if(data['status']==1){
			classRemove = 'unpublish';
			classAdd 	= 'publish';
		}
		$(element).attr('href', "javascript:changeStatus('"+data['link']+"')");
		$(element + ' span').removeClass(classRemove).addClass(classAdd);
	}, 'json');
}

function submitForm(url){
	$('#adminForm').attr('action', url);
	$('#adminForm').submit();
}

function sortList(column, order){
	alert(1)
	$('input[name=filter_column]').val(column);
	$('input[name=filter_column_dir]').val(order);
	$('#adminForm').submit();
}

function changeGroupACP(url){
	
	$.get(url, function(data){
		var element		= 'a#group-acp-' + data['id'];
		var classRemove = 'publish';
		var classAdd 	= 'unpublish';
		if(data['group_acp']==1){
			classRemove = 'unpublish';
			classAdd 	= 'publish';
		}
		$(element).attr('href', "javascript:changeGroupACP('"+data['link']+"')");
		$(element + ' span').removeClass(classRemove).addClass(classAdd);
	}, 'json');
}

$(document).ready(function(){
	$('input[name=checkall-toggle]').change(function(){
		let changeStatus = this.checked;
		$('#adminForm').find(':checkbox').each(function(){
			this.checked = changeStatus;
		})
	})
})

