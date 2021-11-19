let self = this;
this.toggleOther = function(){
    let value = document.getElementById("position").value
    if(value === 'Other'){
        document.getElementById('position_other').value=''
        document.getElementById('position_other').classList.remove('d-none')
    }else{
        document.getElementById('position_other').value=value
        document.getElementById('position_other').classList.add('d-none')
    }
}

this.toggleBusiness = function(){
    let value = document.querySelector("input[name=bizowner]:checked")?.value
    console.log(value)
    if(value == 'yes'){
        document.getElementById('biznes_card').classList.remove('d-none')
    }else{
        document.getElementById('biznes_card').classList.add('d-none')
    }
}

this.toggleOther()
document.getElementById("position").onchange = function(){self.toggleOther()}
this.toggleBusiness()
document.getElementById("bizowner_yes").onchange = function(){self.toggleBusiness()}
document.getElementById("bizowner_no").onchange = function(){self.toggleBusiness()}