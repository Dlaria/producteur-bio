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




let plus = (num,event) =>{
    let quantite = document.getElementById('quantite-' + num);
    quantite.value++
    event.preventDefault();
}


let moins = (num,event) =>{
    let quantite = document.getElementById('quantite-' + num);
    quantite.value--
    event.preventDefault();
    
}