let base_url = 'http://localhost/ToDoList/'

let input_ajax = document.getElementById('input_cari_ajax')
let container_ajax = document.getElementById('container_search_ajax')

input_ajax.addEventListener('keyup', function(){

    let xhr = new XMLHttpRequest()

    xhr.onreadystatechange = function(){
        if( xhr.readyState == 4 && xhr.status == 200 ){
            container_ajax.innerHTML = xhr.response
        }
    }

    xhr.open('post', base_url + 'home/cari/' + input_ajax.value, true)
    xhr.send()
})


let input_cari_user = document.getElementById('cari_user')
let container_cari_user = document.getElementById('container_cari_pengguna')

// container_cari_user.innerHTML = 'hai'

input_cari_user.addEventListener('keyup', function(){

    let xhr = new XMLHttpRequest()

    xhr.onreadystatechange = function(){
        if( xhr.readyState == 4 && xhr.status == 200 ){
            container_cari_user.innerHTML = xhr.response
        }
    }

    xhr.open('post', base_url + 'cari_pengguna/index/' + input_cari_user.value, true)
    xhr.send()
})