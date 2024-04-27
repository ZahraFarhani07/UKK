
function formatState(state) {
    if (!state.id) {
      return state.text;
    }
  
    var baseUrl = "/user/pages/images/flags";
    var $state = $(
      '<span><img src="' + baseUrl + '/' + state.element.value.toLowerCase() + '.png" class="img-flag" /> ' + state.text + '</span>'
    );
    return $state;
  }
  
  $(".js-example-templating").select2({
    placeholder: 'Pilih karyawan',
    templateResult: formatState,
    templateSelection: formatState,
    ajax: {
      url: '/path/to/karyawan-search-endpoint',
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        return {
          results: data
        };
      },
      cache: true
    }
  });
  