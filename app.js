const apiKey = "e55cf9420589ab0c56243f7e6c0bf976"; // 👈 Buraya kendi TMDb API anahtarını yapıştır

const filmler = [
  "The Matrix", 
  "Inception", 
  "Interstellar", 
];

async function filmDetaylariniGetir(filmAdi) {
  const url = `https://api.themoviedb.org/3/search/movie?api_key=${apiKey}&language=tr-TR&query=${encodeURIComponent(filmAdi)}`;
  try {
    const response = await fetch(url);
    const data = await response.json();
    if (data.results && data.results.length > 0) {
      return data.results[0];
    }
    return null;
  } catch (error) {
    console.error(filmAdi + " için veri alınamadı:", error);
    return null;
  }
}

async function sevdiğimFilmleriGetir() {
  const filmListesi = document.getElementById("film-listesi");
  filmListesi.innerHTML = "";

  for (const filmAdi of filmler) {
    const film = await filmDetaylariniGetir(filmAdi);
    if (film) {
      const filmHtml = `
        <div class="col-md-4 mb-4">
          <div class="card h-100 shadow-sm">
            <img src="https://image.tmdb.org/t/p/w500${film.poster_path}" class="card-img-top" alt="${film.title}">
            <div class="card-body">
              <h5 class="card-title">${film.title}</h5>
              <p class="card-text">${film.overview.slice(0, 100)}...</p>
            </div>
          </div>
        </div>
      `;
      filmListesi.innerHTML += filmHtml;
    } else {
      filmListesi.innerHTML += `
        <div class="col-md-4 mb-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">${filmAdi}</h5>
              <p class="card-text">Film bilgisi bulunamadı.</p>
            </div>
          </div>
        </div>
      `;
    }
  }
}

window.onload = sevdiğimFilmleriGetir;
