function onCheckfield(field) {
	console.log($(`#${field}`));
	if($(`#${field}`).val() == "") {
		$(`#${field}`).removeClass('is-valid');
		$(`#${field}`).addClass('is-invalid');
	}else{
		$(`#${field}`).removeClass('is-invalid');
		$(`#${field}`).addClass('is-valid');
	}
}