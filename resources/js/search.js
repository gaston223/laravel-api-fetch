const form = document.getElementById('search-form');

form.addEventListener('keyup', function(e){
    e.preventDefault();

    const token = document.querySelector('meta[name="csrf-token"]').content;
    const url = this.getAttribute('action');
    const q = document.getElementById('q').value;
    fetch(url, {
        headers: {
            'Content-Type' : 'application/json',
            'X-CSRF-TOKEN' : token
        },
        method : 'post',
        body : JSON.stringify({
            q: q
        })
    }).then(response => {

        const posts = document.getElementById('posts');

        posts.innerHTML = '';


        response.json().then( data => {
             Object.entries(data)[0][1].forEach(element => {
                posts.innerHTML += `<h1>${element.title}</h1>
                <p>${element.content}</p>`
            
            });
        })
    }).catch(error => {
        console.log(error)
    })

})