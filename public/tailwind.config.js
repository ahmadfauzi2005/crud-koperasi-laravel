module.exports = {
  mode: "jit",
  purge: [
    './index.html',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        "theme-yellow": '#ffc727',
        "theme-yellow-dark": '#e6b323',
        "theme-dark": '#37474f',
      },
      height: {
        'screen-75': '90vh',
        'screen-50': '50vh'
      },
      fontFamily: {
        'main': ['"Open Sans"']
      }
    },
  },
  variants: {
    extend: {
      scale: ['active', 'group-hover'],
    },
  },
  plugins: [],
}
