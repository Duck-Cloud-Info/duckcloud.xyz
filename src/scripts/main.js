document.addEventListener("DOMContentLoaded", () => {
  const newsContainer = document.getElementById("news-container");
  const categoryButtons = document.querySelectorAll(".category-btn");
  const hamburgerMenu = document.getElementById("hamburger-menu");
  const navLinks = document.getElementById("nav-links");

  // Toggle navigation menu for mobile
  hamburgerMenu.addEventListener("click", () => {
    navLinks.classList.toggle("show");
  });

  // Fetch data from JSON
  fetch("data/data.json")
    .then((response) => response.json())
    .then((data) => {
      // Sort articles by id in descending order
      const sortedArticles = data.articles.sort((a, b) => b.id - a.id);

      displayArticles(sortedArticles);

      // Filter articles by category
      categoryButtons.forEach((button) => {
        button.addEventListener("click", () => {
          const category = button.getAttribute("data-category");
          const filteredArticles = sortedArticles.filter((article) =>
            article.tags.includes(category)
          );
          displayArticles(filteredArticles);
        });
      });
    })
    .catch((error) => console.error("Error loading news:", error));

  function displayArticles(articles) {
    newsContainer.innerHTML = "";
    articles.forEach((article) => {
      const newsCard = document.createElement("div");
      newsCard.classList.add("news-card");

      newsCard.innerHTML = `
        <img src="${article.image}" alt="${article.title}">
        <div class="content">
          <h3>${article.title}</h3>
          <p>${article.description}</p>
          <p class="tags">Tags: ${article.tags.join(", ")}</p>
          <p class="timestamp">Published: ${article.timestamp}</p>
          <a href="/article?id=${article.id}" class="read-more">Read More</a>
        </div>
      `;

      newsContainer.appendChild(newsCard);
    });
  }
});