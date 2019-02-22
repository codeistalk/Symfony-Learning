$(document).ready(function () {
	$('.js-like-article').on('click', function (e) {
		e.preventDefault();

		var $link = $(e.currentTarget);

		$link.toggleClass('fa-hear-o').toggleClass('fa-heart');

		$('.js-like-artcile-count').html('TEST');
	});
});