let self = this;

this.buildSelectOptions = function( data , selectedId){
    let result = '<option></option>'
    let selectedValue = document.getElementById(selectedId).value;
    for(let i = 0; i<data.length; i++){
        result += '<option value="' + data[i].code+ '"'
        if(selectedValue == data[i].code) result += ' selected  '
        result +='>' + data[i].name + '</option>'
    }
    return result
}

this.buildSelectOptionsById = function( data , selectedId){
    let result = '<option></option>'
    let selectedValue = document.getElementById(selectedId).value;
    for(let i = 0; i<data.length; i++){
        result += '<option value="' + data[i].id+ '"'
        if(selectedValue == data[i].id) result += ' selected  '
        result +='>' + data[i].name + '</option>'
    }
    return result
}
