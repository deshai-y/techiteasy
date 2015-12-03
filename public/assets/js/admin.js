var f = []; // global functions
var l = []; // events listeners


f.loadCategoryDeleteModal = function() {
	var categoryId        = $(this).data('id');
	var categoryUrlDelete = $(this).data('urldelete');
	alert(categoryUrlDelete);
	$('#categoryDeleteForm').attr('action', categoryUrlDelete);
};

$('.btn-delete-category').on('click', f.loadCategoryDeleteModal);
//# sourceMappingURL=admin.js.map
