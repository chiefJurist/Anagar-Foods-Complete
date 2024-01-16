/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        'src/App.vue',
        'src/components/Header.vue',
        'src/components/Footer.vue',
        'src/views/ContactView.vue',
        'src/components/Contact/ContactMap.vue',
        'src/components/Contact/ContactMessage.vue',
        'src/components/Contact/ContactNav.vue',
        'src/components/Menu.vue',
        'src/views/LoginView.vue',
        'src/views/RegisterView.vue',
        'src/views/AboutView.vue',
        'src/components/About/AboutNav.vue',
        'src/components/About/AboutDescription.vue',
        'src/components/About/InternationalMenu.vue',
        'src/components/About/LocalMenu.vue',
        'src/components/About/LocalMenu2.vue',
        'src/views/HomeView.vue',
        'src/components/Home/Welcome.vue',
        'src/components/Home/ImagesDisplay.vue',
    ],
    theme: {
        extend: {
            //Custom font
            fontFamily: {
                custom: ['Nunito']
            },

            //Background Images
            backgroundImage: {
                'bg-1': "url('/img/bg-1.png')",
                'bg-2': "url('/img/bg-2.png')",
                'bg-3': "url('/img/bg-3.png')",
                'bg-4': "url('/img/bg-4.png')",
                'bg-5': "url('/img/bg-5.png')",
                'bg-6': "url('/img/bg-6.png')",
                'bg-7': "url('/img/bg-7.png')",
                'bg-8': "url('/img/bg-8.png')",
                'bg-9': "url('/img/bg-9.png')",
                'bg-sm-1': "url('/img/bg-sm-1.png')",
                'bg-sm-2': "url('/img/bg-sm-2.png')",
                'bg-sm-3': "url('/img/bg-sm-3.png')",
                'bg-sm-4': "url('/img/bg-sm-4.png')",
                'bg-sm-5': "url('/img/bg-sm-5.png')",
                'bg-sm-6': "url('/img/bg-sm-6.png')",
            }
        },
    },
    plugins: [],
}

