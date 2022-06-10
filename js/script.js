let input_ajax = document.getElementById('input_cari_ajax')
let container_ajax = document.getElementById('container_search_ajax')

input_ajax.addEventListener('keyup', function(){

    let xhr = new XMLHttpRequest()

    xhr.onreadystatechange = function(){
        if( xhr.readyState == 4 && xhr.status == 200 ){
            container_ajax.innerHTML = xhr.response
        }
    }

    xhr.open('post', 'http://localhost/ToDoList/home/cari/' + input_ajax.value, true)
    xhr.send()
})