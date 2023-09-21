/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  daisyui: {
    themes: [],
  },
  theme: {
    container:{
      center: true,
      padding: "2rem"
    },
    extend: {
      colors:{
        main: "#000080",
        main2: "#ff7f00",
        main3: "#223693",
        main4: "#4466A5",
        main5: "#1B1848"

      },
      boxShadow:{
        ShadowMain: "rgba(0, 0, 0, 0.35) 0px 5px 15px;"
      }
    },
  },
  plugins: [
    require('flowbite/plugin'),
    require("daisyui")
  ],
}

