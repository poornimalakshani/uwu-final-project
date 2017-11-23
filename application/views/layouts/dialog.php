<div id="dialog-form" title="">

</div>


<script type="text/javascript">
var pageName = "Home";
var actionURL = '';

$(document).ready(function() {
	$("#dialog-form").dialog({
		autoOpen: false,
		height: 'auto',
		width: 'auto',
		modal: true,
		autoResize:true,
		buttons: {

		},
		close: function() {
			$("#dialog-form").html('');
			$( "#dialog-form" ).dialog("option", "title", '');
			$( "#dialog-form" ).dialog("option", "buttons", {});
		}
	});

	$('.add-edit').on('click', function(e) {
		e.preventDefault();

		actionURL = $(this).prop('href');

		var isAdd = true;
		var buttons = {
			'Create': addEditAction,
			'Cancel': cancelAction
		};

		if ($(this).data('type') == 'edit') {
			isAdd = false;

			buttons = {
				'Update': addEditAction,
				'Cancel': cancelAction
			};

		}

		var title = ((isAdd) ? 'Add New ' : 'Edit ') + pageName;
		$( "#dialog-form" ).dialog("option", "title", title);

		$( "#dialog-form" ).dialog("option", "buttons", buttons);

		initDialog();
	});

	$('.action.delete').on('click', function(e) {
		e.preventDefault();

		var conf = confirm('Are you sure?');
		if (conf) {
			window.location.href = $(this).prop('href');
		}
	});
});
function initDialog() {
	$.ajax({
		type: 'GET',
		url: actionURL,
		dataType: 'html',
		success: function(result) {
			$( "#dialog-form" ).html(result);
			$( "#dialog-form" ).dialog( "option", "position", { my: "center center", at: "center center", of: window } );
		}
	});

	$( "#dialog-form" ).dialog( "open" );
	$( "#dialog-form" ).dialog( "option", "position", { my: "center center", at: "center center", of: window } );
}

function addEditAction() {
	$.ajax({
		type: 'POST',
		url: actionURL,
		dataType: 'html',
		data: $( "#dialog-form" ).find( "form" ).serialize(),
		success: function(result) {
			if (result === 'success') {
				window.location.href = window.location;
			} else {
				$( "#dialog-form" ).html(result);
				$( "#dialog-form" ).dialog( "option", "position", { my: "center center", at: "center center", of: window } );
			}
		}
	});
}

function cancelAction() {
	$("#dialog-form").dialog('close');
}
</script>