// Modal action
const openModal = document.getElementById('openModal');
const closeModal = document.getElementById('closeModal');
const removeBook = document.getElementById('removeBook');
const formAuthor = document.getElementById('formAuthor');
const modal = document.getElementById('modal');

const baseUrl = 'http://localhost:8000/';

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

// formAuthor.addEventListener('submit', (e) => {
//     e.preventDefault();
//     // Get form data
//     const name = document.getElementById("name").value;
//     // const message = document.getElementById("message").value;

//     // Prepare data for AJAX request
//     const data = {
//         name: name,
//     };

//     // Create the XHR object
//     const xhr = new XMLHttpRequest();

//     // Configure the request
//     xhr.open("POST", baseUrl + "/authors", true); // Replace with your URL
//     xhr.setRequestHeader("Content-Type", "multipart/form-data"); // Set header for JSON data

//     // Function to handle successful response
//     xhr.onload = function () {
//         if (xhr.status === 200) {
//             console.log("Data sent successfully:", JSON.parse(xhr.responseText));
//             // You can also update the UI here based on the response
//         } else {
//             console.error("Error:", xhr.statusText);
//             // You can display an error message to the user here
//         }
//     };

//     // Function to handle errors
//     xhr.onerror = function (error) {
//         console.error("Error sending data:", error);
//         // You can display an error message to the user here
//     };

//     // Send the request with data converted to JSON string
//     xhr.send(JSON.stringify(data));
// })

