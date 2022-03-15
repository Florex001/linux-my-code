let csillagok = document.getElementById('csillagok')
let hold = document.getElementById('hold')
let hegyek_hatul = document.getElementById('hegyek_hatul')
let szoveg = document.getElementById('szoveg')
let gomb = document.getElementById('gomb')
let hegyek_szemben = document.getElementById('hegyek_szemben')
let header = document.querySelector('header');

window.addEventListener('scroll', function(){
    let value = window.scrollY;
    csillagok.style.left = value * 0.25 + 'px';
    hold.style.top = value * 1.05 + 'px';
    hegyek_hatul.style.top = value * 0.5 + 'px';
    hegyek_szemben.style.top = value * 0 + 'px';
    szoveg.style.marginRight = value * 3.5 + 'px';
    szoveg.style.marginTop = value * 1.5 + 'px';
    gomb.style.marginTop = value * 1.5 + 'px';
    header.style.top = value * 0.5 + 'px';
})

var card = document.getElementById("card");

function openElolap(){
    card.style.transform = "RotateY(-180deg)";
}
function openHatlap(){
    card.style.transform = "RotateY(0deg)";
}

var kartya = document.getElementById("kartya");

function openElolap1(){
    kartya.style.transform = "RotateY(-180deg)";
}
function openHatlap1(){
    kartya.style.transform = "RotateY(0deg)";
}

var kartya1 = document.getElementById("kartya1");

function openElolap2(){
    kartya1.style.transform = "RotateY(-180deg)";
}
function openHatlap2(){
    kartya1.style.transform = "RotateY(0deg)";
}
