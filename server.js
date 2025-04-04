const express = require("express");
const path = require("path");

const app = express();
const PORT = process.env.PORT || 3000;

// Serve static files from the "src" directory
app.use(express.static(path.join(__dirname, "src")));

// Route for the homepage
app.get("/", (req, res) => {
  res.sendFile(path.join(__dirname, "src", "index.html"));
});

// Route for the "about" page
app.get("/about", (req, res) => {
  res.sendFile(path.join(__dirname, "src", "about.html"));
});

// Route for articles (dynamic routing without .html)
app.get("/article", (req, res) => {
  // Serve the article.html file for any request to /article
  res.sendFile(path.join(__dirname, "src", "article.html"));
});

// Start the server
app.listen(PORT, () => {
  console.log(`Server is running on http://localhost:${PORT}`);
});