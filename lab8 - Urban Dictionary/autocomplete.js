
$(document).ready(function(){
	$("#txtSearch").keyup(function () {
                  autocomplet();
      });

});


// autocomplet : this function will be executed every time we change the text
function autocomplet() {
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#txtSearch').val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'autocomplete.php',
			type: 'POST',
			data: {words:keyword},
			success:function(data){
				$('#word_list_id').show();
				$('#word_list_id').html(data);
			}
		});
	} else {
		$('#word_list_id').hide();
	}
}

// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$('#txtSearch').val(item);
	// hide proposition list
	$('#word_list_id').hide();
}

