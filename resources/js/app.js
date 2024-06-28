import './bootstrap';

addSuccessListener(response => {
    alert('Paiement Reussie');
});

addFailedListener(error => {
    console.log(error);
});
// JavaScript
//const form = document.getElementById('myForm');
/*const btnpayer = document.getElementById('btn-payer');


btnpayer.addEventListener("click", (e) => {
    e.preventDefault
    openKkiapayWidget({
        amount:"1",
        position:"right",
        callback:"/success",
        data:"Régler votre panier",
        theme:"#092374",
        sandbox:"true",
        key:"3d4fdbe032e811ef96e18159e530ffed"
    })

})*/