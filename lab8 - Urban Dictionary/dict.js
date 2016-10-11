$(function () {
    'use strict';
	
    $("#txtSearch").focus();
	
    function getdata() {
       
        var d = $("#txtSearch").val();
		
        $.ajax("dict.php",
						{"type": "post",
						 "data": {
								  'search': d
								 }
				}).done(function (data) {
					var def = $.parseJSON(data),
					i = 0;
					$("#lblResult").nextAll().remove();
					$("p").last().after("<h2>Search Results for <strong>" + d + "</strong></h2>");
           
					for (i = 0; i < def.length; i += 1) {
						if (i === 0) {
							$("h2").last().after("<h2>Word type <strong>" + def[i].wordtype + " </strong></h2>");
							$("h2").last().after("<p><em>" + (i + 1) + "</em> " + def[i].definition + "</p>");
						} else if (def[i - 1].wordtype === def[i].wordtype) {
							$("p").last().after("<p><em>" + (i + 1) + "</em> " + def[i].definition + "</p>");
						} else {
							$("p").last().after("<h2>Word type <strong>" + def[i].wordtype + " </strong></h2>");
							$("h2").last().after("<p><em>" + (i + 1) + "</em> " + def[i].definition + "</p>");
						}
					}
				}).fail(function () {
					$("#lblResult").nextAll().remove();
					$("p").last().after("<h2>could not connect to server</h2>");
				});
        
		$("#txtSearch").focus();
    }
	
    $("#btnSubmit").click(getdata);
    
	$("#txtSearch").keyup(function (e) {

        if (e.keyCode === 13) {
            getdata();
            $('#word_list_id').hide();
        }
        else
            {
              autocomplet();
            }
        
    });
    
    $("#txtSearch").focusout(function () {
        $('#word_list_id').hide();

    });
 
});

function autocomplet() {
     'use strict';
	var min_length = 0; 
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

function set_item(item) {
    'use strict';
	$('#txtSearch').val(item);
	$('#word_list_id').hide();
}



