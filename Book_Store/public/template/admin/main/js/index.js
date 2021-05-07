// change status 
function changeStatus(url) {
	$.get(url, function (data) {
		let element = 'a#status-' + data['id'];
		let classRemove = 'publish';
		let classAdd = 'unpublish';
		if (data['status'] == 1) {
			classRemove = 'unpublish';
			classAdd = 'publish';
		}
		$(element).attr('href', "javascript:changeStatus('" + data['link'] + "')");
		$(element + ' span').removeClass(classRemove).addClass(classAdd);
	}, 'json');
}

// change status of groupACP
function changeGroupACP(url) {
	$.get(url, function (data) {
		let element = 'a#group-acp-' + data['id'];
		let classRemove = 'publish';
		let classAdd = 'unpublish';
		if (data['group_acp'] == 1) {
			classRemove = 'unpublish';
			classAdd = 'publish';
		}
		$(element).attr('href', "javascript:changeGroupACP('" + data['link'] + "')");
		$(element + ' span').removeClass(classRemove).addClass(classAdd);
	}, 'json');
}

// submit 
function submitForm(url) {
	$('#adminForm').attr('action', url);
	$('#adminForm').submit();
}

// sort 
function sortList(column, order) {
	$('input[name=filter_column]').val(column);
	$('input[name=filter_column_dir]').val(order);
	$('#adminForm').submit();
}

// change pagination
function changePage(page) {
	$('input[name=filter_page]').val(page);
	$('#adminForm').submit();
}

$(document).ready(function () {
	// checkbox
	$('input[name=checkall-toggle]').change(function () {
		let changeckb = this.checked;
		$('#adminForm').find(':checkbox').each(function () {
			this.checked = changeckb;
		})
	})

	// Search by keyword
	$('#filter-bar button[name=submit-keywork]').click(function () {
		$('#adminForm').submit();
	})

	// Clear keywork in search filter
	$('#filter-bar button[name=clear-keywork]').click(function () {
		$('#filter-bar input[name=filter-search]').val('');
		$('#adminForm').submit();
	})

	// change status in select option
	$('#filter-bar select[name=filter_state]').change(function () {
		$('#adminForm').submit();
	})

	// change group_acp in select option
	$('#filter-bar select[name=filter_group_acp]').change(function () {
		$('#adminForm').submit();
	})

	// change group_id in select option
	$('#filter-bar select[name=filter_group_id]').change(function () {
		$('#adminForm').submit();
	})
})

