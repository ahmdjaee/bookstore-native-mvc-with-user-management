function showModal(id) {
    const name = document.getElementById('name');
    const genre = document.getElementById('genre');
    const author = document.getElementById('authorId');
    const releaseDate = document.getElementById('releaseDate');
    const synopsis = document.getElementById('synopsis');
    const pages = document.getElementById('pages');

    document.getElementById('modal').style.display = 'flex';
    const ajax = new XMLHttpRequest();
    ajax.open('GET', `${baseUrl}api/books/${id}`);

    ajax.addEventListener('load', () => {
        const response = JSON.parse(ajax.response);
        const data = response['data'];
        console.log(data);

        genre.value = data.genre;
        name.value = data.name;
        pages.value = data.pages;
        author.value = data.author.id;
        synopsis.value = data.synopsis;
        releaseDate.value = data.releaseDate;
    })
    ajax.send();
}