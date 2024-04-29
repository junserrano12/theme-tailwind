/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.php","./src/**/*.js","./**/*.html"],
  theme: {
    extend: {},
  },
  plugins: [require("@tailwindcss/typography")],
}

