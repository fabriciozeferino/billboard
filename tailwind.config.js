
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    theme: {
        extend: {
            /* For A4 size */
            screens: {
              screen: {'raw': 'screen'},
              print: {'raw': 'print'},
            },
            maxWidth: {
                'a4': '64.609375rem'
            },
            height: {
                'a4': '91.350883rem',
                'a4-col': '77.36632rem',
                'a4-col-full': '83.350883rem',
            },

        }
    },
    variants: {
        borderColor: ['responsive', 'hover', 'focus', 'group-hover'],
        fill: ['responsive', 'hover', 'focus', 'group-hover'],
        textColor: ['responsive', 'hover', 'focus', 'group-hover'],
    },
    plugins: [
        require('@tailwindcss/custom-forms'),
        require('tailwindcss-plugins/pagination'),
    ]
}
