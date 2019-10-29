module.exports = {
    theme: {
        extend: {}
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
