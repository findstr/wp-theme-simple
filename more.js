var pending = false
jQuery(document).ready(function($) {
	$('div.load-more a').click(function() {
		if (pending)
			return false;
		$this = $(this);
		var href = $this.attr("href");
		console.log("Ready!!!" + href);
		if (href == undefined) {
			return false;
		}
		pending = true;
		$.ajax({
			url: href,
			type: "get",
			error: function(req) {
				pending = false;
			},
			success: function(data) {
				pending = false;
				var $res = $(data).find(".post");
				$('div.load-more').before($res);
				var loadmore = $(data).find('div.load-more a')
				var newhref = loadmore.attr('href');
				if (newhref != undefined) {
					$('.load-more a').attr("href", newhref);
				} else {
					//$('.load-more').hide();
				}
			}
		});
		return false;
	});
});

