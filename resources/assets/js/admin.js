var f = []; // global functions
var l = []; // events listeners


f.loadCategoryDeleteModal = function() {
	var categoryId        = $(this).data('id');
	var categoryUrlDelete = $(this).data('urldelete');
	$('#category-name-delete').html($('#category-name-' + categoryId).html());
	$('#category-delete-form').attr('action', categoryUrlDelete);
};

$('.btn-delete-category').on('click', f.loadCategoryDeleteModal);