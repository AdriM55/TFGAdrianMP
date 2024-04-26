const Nacionales = {
  cargarNoticias: function() {
      const url = 'https://api.rss2json.com/v1/api.json?rss_url=https://e00-elmundo.uecdn.es/elmundo/rss/espana.xml';
      const xhr = new XMLHttpRequest();
      
      xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE) {
              if (xhr.status === 200) {
                  const data = JSON.parse(xhr.responseText);
                  const noticiasNacionales = document.getElementById('noticias-nacionales');
                  // Itera solo sobre las primeras 4 noticias
                  for (let i = 0; i < 4; i++) {
                      const item = data.items[i];
                      const noticia = document.createElement('div');
                      noticia.classList.add('noticia');
                      noticia.innerHTML = `
                          <h3>${item.title}</h3>
                          <p>${item.description}</p>
                          <img src="${item.thumbnail}" alt="Imagen de la noticia">
                          <a href="${item.link}" target="_blank">Leer más</a>
                      `;
                      noticiasNacionales.appendChild(noticia);
                  }
              } else {
                  console.error('Error al obtener las noticias. Código de estado:', xhr.status);
              }
          }
      };

      xhr.open('GET', url);
      xhr.send();
  }
};

document.addEventListener("DOMContentLoaded", function() {
  Nacionales.cargarNoticias();
});


const Internacionales = {
  cargarNoticias: function() {
    const url = 'https://api.rss2json.com/v1/api.json?rss_url=https://e00-elmundo.uecdn.es/elmundo/rss/internacional.xml';
    const xhr = new XMLHttpRequest();
      
      xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE) {
              if (xhr.status === 200) {
                  const data = JSON.parse(xhr.responseText);
                  const internacional = document.getElementById('noticias-internacionales');
                  // Itera solo sobre las primeras 4 noticias
                  for (let i = 0; i < 4; i++) {
                      const item = data.items[i];
                      const noticia = document.createElement('div');
                      noticia.classList.add('noticia');
                      noticia.innerHTML = `
                          <h3>${item.title}</h3>
                          <p>${item.description}</p>
                          <img src="${item.thumbnail}" alt="Imagen de la noticia">
                          <a href="${item.link}" target="_blank">Leer más</a>
                      `;
                      internacional.appendChild(noticia);
                  }
              } else {
                  console.error('Error al obtener las noticias. Código de estado:', xhr.status);
              }
          }
      };

      xhr.open('GET', url);
      xhr.send();
  }
};

document.addEventListener("DOMContentLoaded", function() {
  Internacionales.cargarNoticias();
});

const Opinion = {
  cargarNoticias: function() {
    const url = 'https://api.rss2json.com/v1/api.json?rss_url=https://feeds2.feedburner.com/libertaddigital/opinion';
    const xhr = new XMLHttpRequest();
      
      xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE) {
              if (xhr.status === 200) {
                  const data = JSON.parse(xhr.responseText);
                  const opinion = document.getElementById('noticias-opinion');
                  // Itera solo sobre las primeras 4 noticias
                  for (let i = 0; i < 4; i++) {
                      const item = data.items[i];
                      const noticia = document.createElement('div');
                      noticia.classList.add('noticia');
                      noticia.innerHTML = `
                          <h3>${item.title}</h3>
                          <p>${item.description}</p>
                          <a href="${item.link}" target="_blank">Leer más</a>
                      `;
                      opinion.appendChild(noticia);
                  }
              } else {
                  console.error('Error al obtener las noticias. Código de estado:', xhr.status);
              }
          }
      };

      xhr.open('GET', url);
      xhr.send();
  }
};

document.addEventListener("DOMContentLoaded", function() {
  Opinion.cargarNoticias();
});


const CampoGIB = {
  cargarNoticias: function() {
    const url = 'https://api.rss2json.com/v1/api.json?rss_url=https://www.europasur.es/rss/campo-de-gibraltar/';
    const xhr = new XMLHttpRequest();
      
      xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE) {
              if (xhr.status === 200) {
                  const data = JSON.parse(xhr.responseText);
                  const campoGIB = document.getElementById('noticias-campoGIB');
                  // Itera solo sobre las primeras 4 noticias
                  for (let i = 0; i < 4; i++) {
                      const item = data.items[i];
                      const noticia = document.createElement('div');
                      noticia.classList.add('noticia');
                      noticia.innerHTML = `
                          <h3>${item.title}</h3>
                          <img src="${item.thumbnail}" alt="Imagen de la noticia">
                          <a href="${item.link}" target="_blank">Leer más</a>
                      `;
                      campoGIB.appendChild(noticia);
                  }
              } else {
                  console.error('Error al obtener las noticias. Código de estado:', xhr.status);
              }
          }
      };

      xhr.open('GET', url);
      xhr.send();
  }
};

document.addEventListener("DOMContentLoaded", function() {
  CampoGIB.cargarNoticias();
});
