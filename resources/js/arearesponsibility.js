let self = this;
this.initCards = function(){
    $('#localAddress').hide();
    $('#internationalAddress').hide();
    $('#barangayCard').hide();
    $('#cityCard').hide();
    $('#regionCard').hide();
    $('#provinceCard').hide();
}

this.toggleArea = function(){
    let value = document.getElementById("coordinator_level").value
    if (value === 'ofw') {
        $('#country_id').val($('#country').val());
        $('#internationalAddress').show();
        $('#localAddress').hide();
        $('#regionCard').hide();
        $('#provinceCard').hide();
        $('#cityCard').hide();
        $('#barangayCard').hide();
    }else if(value === 'regional'){
        $('#country_id').val(174);
        $('#internationalAddress').hide();
        $('#localAddress').show();
        $('#regionCard').show();
        $('#provinceCard').hide();
        $('#cityCard').hide();
        $('#barangayCard').hide();
    }else if(value === 'provincial'){
        $('#country_id').val(174);
        $('#internationalAddress').hide();
        $('#localAddress').show();
        $('#regionCard').show();
        $('#provinceCard').show();
        $('#cityCard').hide();
        $('#barangayCard').hide();
    }else if(value === 'city'){
        $('#country_id').val(174);
        $('#internationalAddress').hide();
        $('#localAddress').show();
        $('#regionCard').show();
        $('#provinceCard').show();
        $('#cityCard').show();
        $('#barangayCard').hide();
    }else if(value === 'municipal'){
        $('#country_id').val(174);
        $('#internationalAddress').hide();
        $('#localAddress').show();
        $('#regionCard').show();
        $('#provinceCard').show();
        $('#cityCard').show();
        $('#barangayCard').hide();
    }else if(value === 'barangay'){
        $('#country_id').val(174);
        $('#internationalAddress').hide();
        $('#localAddress').show();
        $('#regionCard').show();
        $('#provinceCard').show();
        $('#cityCard').show();
        $('#barangayCard').show();
    }
}

this.initCards()
this.toggleArea()
document.getElementById("coordinator_level").onchange = function(){self.toggleArea()}
$('#country_id').on('change', function(){
    if($( this ).val()!=174) {
        $('#coordinator_level').val('ofw');
    }else{
        $('#coordinator_level').val('');
    }
})