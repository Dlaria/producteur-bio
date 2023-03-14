let popup = () => {
    let inputs = document.getElementsByClassName('input-form');
    let cguCgv = document.getElementsByClassName('cgu_cgv');
    console.log(cguCgv[0].checked);
    for(let i=0;i<inputs.length;i++){
        //console.log(inputs[i]);
        //console.log(inputs[i].value);
        if(inputs[i].value !== "" && cguCgv[0].checked === true){
        document.getElementById('popup').style.display = 'block';
    }
    }
}




let plus = (produitId,event) =>{
    let quantite = document.getElementById('quantite-' + produitId);
    quantite.value++
    opacityBtn(produitId, event);
    event.preventDefault();
}


let moins = (produitId,event) =>{
    let quantite = document.getElementById('quantite-' + produitId);
    quantite.value--
    opacityBtn(produitId, event)
    event.preventDefault();

}

let opacityBtn = (produitId, event) =>{
    let quantite = document.getElementById('quantite-' + produitId);
    let btnIndex = document.getElementById('btnIndex');
    console.log(btnIndex);
    console.log(quantite.value);
    if (+quantite.value < +quantite.min){
        quantite.value = quantite.min;
    }
    if (+quantite.value == 0){
        btnIndex.setAttribute('disabled',false);
    }else{
        btnIndex.removeAttribute('disabled',true);
    }
}