// Modal action
const openModal = document.getElementById('openModal');
const closeModal = document.getElementById('closeModal');
const removeBook = document.getElementById('removeBook');
const modal = document.getElementById('modal');

const baseUrl = 'http://localhost:8080/';

document.addEventListener('DOMContentLoaded', () => {
    openModal.addEventListener('click', () => {
        document.getElementById('modal').style.display = 'flex';
    })
    closeModal.addEventListener('mouseover', () => {
        closeModal.style = 'cursor: pointer; color: red;'
    })
    closeModal.addEventListener('mouseleave', () => {
        closeModal.style = 'cursor: default; color: black;'
    })
    closeModal.addEventListener('click', () => {
        document.getElementById('modal').style.display = 'none';
    })

});

removeBook.addEventListener('submit', (e) => {
    const ajax = new XMLHttpRequest();
    const id = document.getElementById('id').value;
    ajax.open('PUT', `${baseUrl}${id}`);
    ajax.send();

    console.log(id);
})

