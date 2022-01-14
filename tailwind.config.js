module.exports = {
    //just in time(for watching)
    mode: 'JIT',
    content: [
        './packages/abouterf/laravel-mobile-auth/src/resources/views/*.blade.php',
        './packages/abouterf/laravel-mobile-auth/src/resources/views/**/*.blade.php',
        './packages/abouterf/laravel-mobile-auth/src/resources/views/**/**/*.blade.php'
    ],
    theme: {
        extend: {},
    },
    plugins: [],
}