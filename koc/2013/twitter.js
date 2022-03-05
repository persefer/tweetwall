

$.fn.twitter = function() { 
    var o = $(this[0]) // It's your element
	var args = arguments[0] || {}; // It's your object of arguments



$.getJSON("test.js", { name: "John", time: "2pm" }, function(json) {
    alert("JSON Data: " + json.results[0].from_user);
    });


//    return $(this).addClass('changed'); 
}


(function ($) {

jQuery.fn.listProducts = function() {
    var o = $(this[0]) // It's your element
	var args = arguments[0] || {}; // It's your object of arguments
	
		$.get('product_list.php', { hashtag_array: args, time: "2pm" }, function(data) {
            console.log(args);
					if (status == "error") {
						var msg = "Sorry but there was an error: ";
						alert(msg + xhr.status + " " + xhr.statusText);
					}
					else
					{
						o.html(data);
					}
				});

};



jQuery.fn.listProductsByFacebook = function(i) {
    var o = $(this[0]) // It's your element
        $.get('product_list.php', { user_fb_accesstoken: i}, function(data) {
            console.log(i);
                    if (status == "error") {
                        var msg = "Sorry but there was an error: ";
                        alert(msg + xhr.status + " " + xhr.statusText);
                    }
                    else
                    {
                        o.html(data);
                    }
                });
    

};

}(jQuery));