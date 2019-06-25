// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('#select_1').select2({
	  	closeOnSelect: false,
	  	dropdownParent: $("#modalIdPasien"),
	  	minimumInputLength: 1,
      	placeholder: 'Insert Patient Name or Email Here',
      	ajax: {
              dataType: 'json',
              url: '/search/idPasien',
              delay: 300,
              data: function(params) {
                return {
                  q: params.term,
                  page : params.page
                };
              },
              processResults: function (data, params) {
	              params.page = params.page || 1;

	              return{
	              	results : data.data,
	              	pagination:{
	              		more:(params.page * 10) < data.total
	              	}
	             };	
            }
        },
        minimumInputLength : 1,
        templateResult : function (repo){
        	if(repo.loading) return repo.name;

        	var markup = "<img src='../../foto/"+repo.foto+"' width='50px'></img> &nbsp; "+ repo.name;

        	return markup;
        },
        templateSelection : function(repo){
        	return repo.name;
        },
       	
       	escapeMarkup : function(markup){ return markup;}
	});
});

$(document).ready(function() {
    $('#select_2').select2({
	  	closeOnSelect: false,
	  	minimumInputLength: 1,
	  	tags: true,
      	placeholder: 'Insert User Name or Email Here',
	});
});