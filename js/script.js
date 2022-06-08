// alert('hai')

let gelap = document.querySelector('#tombol-dark')
let body = document.querySelector('.gelap')
let accordion = document.querySelector('.accordion-item')
let navigasi = document.querySelector('.bg-light')
let teks_nav = document.querySelector('.navbar-brand')
let teks_list = document.querySelectorAll('.accordion-body')

gelap.addEventListener('click', function(){

    body.classList.toggle('mode-gelap-bg')
    accordion.classList.toggle('mode-gelap-bg')
    // accordion.classList.toggle('mode-gelap-bg')
    navigasi.classList.toggle('bg-dark')
    teks_nav.classList.toggle('text-white')
    for(let i = 0; i < teks_list.length; i++){
        teks_list[i].classList.toggle('text-white')
    }
    

})

