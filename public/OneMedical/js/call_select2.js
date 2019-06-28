// In your Javascript (external .js resource or <script> tag)

//dengan modal (popup) sebagai alasnya -> cari id pasien berdasarkan email
$(document).ready(function() {
    $('#select_1').select2({
      minimumInputLength: 3,
	  	closeOnSelect: false,
	  	dropdownParent: $("#modalIdPasien"),
      placeholder: 'Insert Patient Email Here',
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

        	var markup = "<img src='../../foto/"+repo.foto+"' width='38px' class='rounded-circle'></img> &nbsp; "+ repo.email;

        	return markup;
        },
        templateSelection : function(repo){
        	return repo.name;
        },
       	
       	escapeMarkup : function(markup){ return markup;}
	});
});


//tanpa modal (popup) sebagai alasnya -> cari id pasien berdasarkan email
$(document).ready(function() {
  $('#select_2').select2({
      minimumInputLength: 3,
      closeOnSelect: false,
      placeholder: 'Insert Patient Email Here',
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

          var markup = "<img src='../../foto/"+repo.foto+"' width='38px' class='rounded-circle'></img> &nbsp; "+ repo.email;

          return markup;
        },
        templateSelection : function(repo){
          return repo.name;
        },
        
        escapeMarkup : function(markup){ return markup;}
	});
});

//tanpa modal (popup) sebagai alasnya -> cari id dokter berdasarkan email
$(document).ready(function() {
  $('#select_2').select2({
      minimumInputLength: 3,
      closeOnSelect: false,
      placeholder: 'Insert Doctor Email Here',
        ajax: {
              dataType: 'json',
              url: '/search/idDokter',
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

          var markup = "<img src='../../foto/"+repo.foto+"' width='38px' class='rounded-circle'></img> &nbsp; "+ repo.email;

          return markup;
        },
        templateSelection : function(repo){
          return repo.name;
        },
        
        escapeMarkup : function(markup){ return markup;}
  });
});