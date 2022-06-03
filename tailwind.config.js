module.exports = {
  content: [
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
      './src/**/*.{html,js}',
      './node_modules/tw-elements/dist/js/**/*.js',
  ],
    darkMode: 'media', // or 'media' or 'class'
    theme: {
    extend: {},
  },
  plugins: [
      require('tw-elements/dist/plugin'),
      require('@tailwindcss/forms'),
      require('@tailwindcss/typography'),
      require('@tailwindcss/aspect-ratio'),
      require('@tailwindcss/line-clamp'),
  ],
}
