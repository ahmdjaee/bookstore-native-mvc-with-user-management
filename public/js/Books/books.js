function showModal(id) {
    const name = document.getElementById('name');
    const image = document.getElementById('image');
    const genreId = document.getElementById('genreId');
    const author = document.getElementById('authorId');
    const releaseDate = document.getElementById('releaseDate');
    const synopsis = document.getElementById('synopsis');
    const pages = document.getElementById('pages');
    const publisherId = document.getElementById('publisherId');
    const price = document.getElementById('price');
    const stock = document.getElementById('stock');

    document.getElementById('modal').style.display = 'flex';

    const ajax = new XMLHttpRequest();
    ajax.open('GET', `${baseUrl}/api/books/${id}`);
    ajax.send();

    ajax.addEventListener('load', () => {
        const response = JSON.parse(ajax.response);
        const data = response['data'];
        console.log(data);

        genreId.value = data.genreId;
        image.value = data.image;
        name.value = data.name;
        pages.value = data.pages;
        author.value = data.author.id;
        synopsis.value = data.synopsis;
        releaseDate.value = data.releaseDate;
        publisherId.value = data.publisher.id;
        price.value = data.price;
        stock.value = data.stock;
    })

    document.getElementById('formBook').setAttribute('action', `${baseUrl}/books/${id}/update`);
}

