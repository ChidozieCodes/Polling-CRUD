window.onload = function() {
  
}
$('#selectall').click(function (e) {
  	$('.checkb').attr('checked',true)
  })
$('#unselectall').click(function (e) {
  	$('.checkb').attr('checked',false)
  })

$('.hamburg_img').click(function(){
	var e = $('#sidebar').show()

});

$('#close').click(function(){
	var e = $('#sidebar').hide()

});

$('#modal_container').on('click', '#cancel', function(){
	$('#modal_container').hide()
});

$('#modal').on('click', '#delete', function(){
	var id = $(this).data('id');

	$.get('ajax-file.php', {
		deletezoneid:id
	}, function(data, status){
		if(status){

			$.get('ajax-file.php', {
				delLgaZoneid: id
			}, function(data, status){
				if (status) {
					$.get('ajax-file.php', {
						delWardZoneid:id
					}, function(data, status){
						if (status) {
							$.get('ajax-file.php', {
								delpollingunitZoneid:id
							}, function(data, status){
								if (status) {
									window.location.href ='zone.php';
								}
							})
						}
					})
				}
			})
		}
	});
});

$('#modal').on('click', '#delete_lga', function(){
	var id = $(this).data('id');

	$.get('ajax-file.php', {
		deletelgaid:id
	}, function(data, status){
		if(status){
			window.location.href ='lga.php';
		}
	});
});

$('#modal').on('click', '#delete_ward', function(){
	var id = $(this).data('id');

	$.get('ajax-file.php', {
		deletewardid:id
	}, function(data, status){
		if(status){
			window.location.href ='ward.php';
		}
	});
});

$('#modal').on('click', '#delete_polling', function(){
	var id = $(this).data('id');

	$.get('ajax-file.php', {
		deletepollingid:id
	}, function(data, status){
		if(status){
			window.location.href ='pollingunit.php';
		}
	});
});

$('#container').on('click' , '#delete_box', function(){
	$('#modal_container').show();
	var i = $(this).data('id');
	//alert(i);
	$.get('ajax-file.php', {
		id:i
	}, function(data, status){
		$('#modal').html(data);
	});
});
$('#container').on('click' , '#delete_box_lga', function(){
	$('#modal_container').show();
	var i = $(this).data('id');
	//alert(i);
	$.get('ajax-file.php', {
		id:i
	}, function(data, status){
		$('#modal').html(data);
	});
});

$('#container').on('click' , '#delete_box_lga_sing', function(){
	$('#modal_container').show();
	var i = $(this).data('id');
	//alert(i);
	$.get('ajax-file.php', {
		errorlgaid:i
	}, function(data, status){
		$('#modal').html(data);
	});
});

$('#container').on('click' , '#delete_box_ward_sing', function(){
	$('#modal_container').show();
	var i = $(this).data('id');
	//alert(i);
	$.get('ajax-file.php', {
		errorwardid:i
	}, function(data, status){
		$('#modal').html(data);
	});
});

$('#container').on('click' , '#delete_box_polling_sing', function(){
	$('#modal_container').show();
	var i = $(this).data('id');
	//alert(i);
	$.get('ajax-file.php', {
		errorpollingid:i
	}, function(data, status){
		$('#modal').html(data);
	});
});

$('#zonelist').change(function(){
	var id = $(this).val();

	$.get('ajax-file.php', {
		zonelistId:id
	}, function(data, status){
		$('#lgalist').html(data);
	});

})

$('#lgalist').change(function(){
	var id = $(this).val();

	$.get('ajax-file.php', {
		lgalistId:id
	}, function(data, status){
		$('#wardlist').html(data);
	})

})

$('#wardlist').change(function(){
	var id = $(this).val();

	$.get('ajax-file.php', {
		wardlistId:id
	}, function(data, status){
		$('#pollinglist').html(data);
	})

})

$('#user_li').click(function(e){
	//alert('hi')
	$('#sub_user_holder').slideToggle();
	$('.arr').toggleClass('rotate');
})

// $.get('ajax-file.php', {}, function(){});