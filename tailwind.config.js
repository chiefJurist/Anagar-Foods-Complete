/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        'src/App.vue',
        'src/components/Navigation/Header.vue',
        'src/components/Navigation/Footer.vue',
        'src/components/Navigation/Menu.vue',
        'src/components/Contact/ContactMap.vue',
        'src/components/Contact/ContactMessage.vue',
        'src/components/Contact/ContactNav.vue',
        'src/components/About/AboutNav.vue',
        'src/components/About/AboutDescription.vue',
        'src/components/About/InternationalMenu.vue',
        'src/components/About/LocalMenu.vue',
        'src/components/About/LocalMenu2.vue',
        'src/components/Home/Welcome.vue',
        'src/components/Home/ImagesDisplay.vue',
        'src/views/LoginView.vue',
        'src/views/RegisterView.vue',
        'src/views/ContactView.vue',
        'src/views/AboutView.vue',
        'src/views/HomeView.vue',
        'src/views/NotFoundView.vue',
        'src/views/forgotPasswordView.vue',

        //AFTER THE USER HAS LOGGED IN
        'src/views/DashboardView.vue',
        'src/views/NotificationView.vue',
        'src/views/HistoryView.vue',
        'src/views/DetailsView.vue',
        'src/views/SettingsView.vue',
        'src/views/CreateView.vue',
        'src/components/Session/Navigation/Header2.vue',
        'src/components/Session/Navigation/Menu2.vue',
        'src/components/Session/Dashboard/Welcome2.vue',
        'src/components/Session/Dashboard/Empty.vue',
        'src/components/Session/Dashboard/Order.vue',
        'src/components/Session/Notification/Title.vue',
        'src/components/Session/Notification/Empty.vue',
        'src/components/Session/Notification/Info.vue',
        'src/components/Session/History/Title.vue',
        'src/components/Session/History/Empty.vue',
        'src/components/Session/History/Record.vue',
        'src/components/Session/Settings/Title.vue',
        'src/components/Session/Settings/Body.vue',
        'src/components/Session/Settings/Logout.vue',
        'src/components/Session/Create/International.vue',
        'src/components/Session/Create/Local.vue',
        'src/components/Session/Create/Country.vue'
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
                'food-bg': "url('/img/img-5.jpg')"
            },

            //Custom Animations
            keyframes: {
                right: {
                    '0%' : {
                        transform: 'translateX(100%)',
                        opacity: '0'
                    },
                    '90%' : {
                        transform: 'translateX(-10%)',
                        opacity: '0.8'
                    },
                    '100%' : {
                        transform: 'translateX(0)',
                        opacity: '1'
                    }
                },
                left: {
                    '0%' : {
                        transform: 'translateX(-100%)',
                        opacity: '0'
                    },
                    '90%' : {
                        transform: 'translateX(10%)',
                        opacity: '0.8'
                    },
                    '100%' : {
                        transform: 'translateX(0)',
                        opacity: '1'
                    }
                },
                top: {
                    '0%' : {
                        transform: 'translateY(-100%)',
                        opacity: '0'
                    },
                    '90%' : {
                        transform: 'translateY(10%)',
                        opacity: '0.8'
                    },
                    '100%' : {
                        transform: 'translateY(0)',
                        opacity: '1'
                    }
                },
                bottom: {
                    '0%' : {
                        transform: 'translateY(100%)',
                        opacity: '0'
                    },
                    '90%' : {
                        transform: 'translateY(-10%)',
                        opacity: '0.8'
                    },
                    '100%' : {
                        transform: 'translatY(0)',
                        opacity: '1'
                    }
                },
                grow: {
                    '0%' : {transform: 'scale(0.2)'},
                    '90%' : {transform: 'scale(1.1)'},
                    '100%' : {transform: 'scale(1)'}
                }
            },

            animation: {
                right: 'right 1s ease-out',
                left: 'left 1s ease-out',
                top: 'top 1s ease-out',
                bottom: 'bottom 1s ease-out',
                grow: 'grow 1s ease-out'
            },
        },
    },
    plugins: [],
}

