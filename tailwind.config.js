/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  // Hapus baris 'darkMode: 'class''
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter', 'sans-serif'],
      },
      // Hapus palet warna kustom
      colors: {
        // Hapus semua kode palet warna kustom di sini
      },
    },
  },
  plugins: [],
}