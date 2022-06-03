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
    extend: {
        height: {
            '128': '32rem',
        },
        spacing: {
            '128': '32rem',
        }
    },
  },
  plugins: [
      require('tw-elements/dist/plugin'),
      require('@tailwindcss/forms'),
      require('@tailwindcss/typography'),
      require('@tailwindcss/aspect-ratio'),
      require('@tailwindcss/line-clamp'),
  ],
}
