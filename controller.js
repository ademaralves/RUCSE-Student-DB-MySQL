var user_id = 0;

function closeModal() {
    user_id = 0;
    document.getElementById('modal-js-example').classList.remove('is-active');
}

function openModal(id){
    user_id = id;
    document.getElementById('modal-js-example').classList.add('is-active');
}

function deleteUser(){
    window.location.href = '/delete.php?id='+user_id.toString();
}