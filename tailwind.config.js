/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    ".index.php",
    "./*.php",
    "./app/*.php",
    "./app/module/*.php",
    "./public/js/*.js"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}