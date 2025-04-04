const express = require("express");
const path = require("path");

const app = express();
const PORT = process.env.PORT || 3000;

// Serve static files from the "public" directory
app.use(express.static(path.join(__dirname, "src")));

// Route for the homepage
app.get("/", (req, res) => {
  res.sendFile(path.join(__dirname, "src", "index.html"));
});

// Route for the "about" page
app.get("/about", (req, res) => {
  res.sendFile(path.join(__dirname, "src", "about.html"));
});

// Route for articles (dynamic routing)
app.get("/article/:id", (req, res) => {
  res.sendFile(path.join(__dirname, "src", "article.html"));
});

// Start the server
app.listen(PORT, () => {
  console.log(`Server is running on http://localhost:${PORT}`);
});