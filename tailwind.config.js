/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./public/**/*.{html, js}",
    "./template/**/*.{html, js, php}",
    ".index.php",
    "template/layout/page_signup.php",
    "public/js/script.js",
    "./*.php"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}