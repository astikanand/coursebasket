$(document).ready(function() {
	
	
	function refreshSmallBasket() {
		$.ajax({
			
		    url: '/modules/basket_small_refresh.php',
			dataType: 'json',
			success: function(data) {
				$.each(data, function(k, v) {
                      $("#basket_left ." + k + " span").text(v);
                });
			},
			error: function(data) {
				alert("Error1 occured");
			}
			
		});
        
    }
	
	
	
	if($(".add_to_basket").length > 0 ) {
		$(".add_to_basket").click(function() {
			
			var trigger = $(this);
			var param = trigger.attr("rel");
			var item = param.split("_");
			
			$.ajax ({
				type: 'POST',
				url: '/modules/basket.php',
				dataType: 'json',
				data: ({ id : item[0] , job : item[1] }),
				success: function(data) {
					var new_id = item[0] + '_' + data.job;
	                if (data.job != item[1]) {
	                    if (data.job == 0) {
	                        trigger.attr("rel", new_id);
	                        trigger.text("Remove from basket");
	                        trigger.addClass("red");
	                    } else {
	                        trigger.attr("rel", new_id);
	                        trigger.text("Add to basket");
	                        trigger.removeClass("red");
	                    }
	                    refreshSmallBasket();
	                }
				},
				
				
				error: function(data) {
					alert("Error2 occured");
				}
				
			});
			return false;
		});
	}
});
