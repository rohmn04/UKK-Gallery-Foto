$(document).ready(function(){
	const isLiked = $('#likebtn').data('liked');
	if (isLiked === true){
		$('#like').hide();
		$('#liked').show();
		$('#likebtn').addClass('follow-btn_2')
		$('#likebtn').removeClass('follow-btn')
	}else{
		$('#like').show();
		$('#liked').hide();
		$('#likebtn').removeClass('follow-btn')
		$('#likebtn').removeClass('follow-btn')
	}
	$('#likebtn').click(fuction(){
		const postId = $(this).date(id);
		const likeURL = '/like-post/$postId';

		$.ajaxSetup({
			headers: {
				'X-CSRF-Token'; $('meta[name="scrf-token"]').attr('content')
			}
		});
		$.ajax({
			url :likeURL,
			type: 'post',
			success: function(data) {
				if (data.liked) {
					$(this).find('#like').hide();
					$(this).find('#liked').show();
					$(this).addClass('follow-btn_2');
					$(this).removeClass('follow-btn');
				}else{
					$(this).find('#like').show();
					$(this).find('#liked').hide();
					$(this).removeClass('follow-btn_2');
					$(this).addClass('follow-btn');
				}
				console.log(data);


				$('#likeCount').load(location.href + ' #likeCount');
			}.bind(this),
			error:function(jqXHR, ajaxOptions, thrownError) {
				console.log('server error');
			}
		});
	});
});