import $ from 'jquery';

    function convertForm2Json(form){
        const array = $(form).serializeArray();
        const json = {};
       
        $.each(array, function(){
            json[this.name] = this.value;
        });
        return JSON.stringify(json);
    }
    // console.log('hallo');
    
    $('form.delete').on('submit', function(e){
      
        e.preventDefault();
        const form = $(this);

        if(confirm('Wollen Sie diesen Artikel löschen?')){
   
            $.ajax({
                url: form.attr('action'),
                method: 'delete',
                contentType: 'application/json',
                data: convertForm2Json(form),
                success: function(response){
                    if(response.status == 200) {
                        alert('Erfolgreich gelöscht');
                        location.reload();
                    }
                },
                error: function(errorMsg){

                    if(errorMsg) {
                        if(errorEl.length == 1) {
                            errorEl.html(errorMsg);
                        }
                        else {
                            let errorAlertEl = $('<div class="alert alert-danger"></div>').html();
                            form.closest('table').before(errorAlertEl);
                        }
                    }
                }
            });
        } 
});
    
