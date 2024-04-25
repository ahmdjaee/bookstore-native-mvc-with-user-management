function showModal(id) {
    document.getElementById('modal').style.display = 'flex';

    const name = document.getElementById('name');
    const email = document.getElementById('email');
    const birthdate = document.getElementById('birthdate');
    const placeOfBirth = document.getElementById('placeOfBirth');

    const ajax = new XMLHttpRequest();

    ajax.open('GET', `${baseUrl}api/authors/${id}`);
    ajax.send();

    ajax.addEventListener('load', () => {
        const response = JSON.parse(ajax.response);
        const data = response.data;

        name.value = data.name;
        email.value = data.email;
        birthdate.value = data.birthdate;
        placeOfBirth.value = data.placeOfBirth;
    })
}