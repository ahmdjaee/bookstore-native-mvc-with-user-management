// Modal action
const openModal = document.getElementById('openModal');
const updateModal = document.getElementById('updateModal');
const closeModal = document.getElementById('closeModal');
const removeBook = document.getElementById('removeBook');
const formAuthor = document.getElementById('formAuthor');
const modal = document.getElementById('modal');

const baseUrl = 'http://localhost:8001/';

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