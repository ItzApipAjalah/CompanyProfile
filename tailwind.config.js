/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
    ],
    theme: {
        extend: {
          colors: {
            'custom-green': '#012422',
          },
        },
      },
    plugins: [],
  }
