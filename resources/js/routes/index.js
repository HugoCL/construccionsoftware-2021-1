import Projects from '../pages/Projects.vue'
import Users from '../pages/Users.vue'

export default {
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            //component: Homepage,
        },
        {
            path: '/projects',
            name: 'projects',
            component: Projects,
        },
        {
            path: '/projects-a',
            name: 'projects-a',
            component: Projects,
        },
        {
            path: '/projects-b',
            name: 'projects-b',
            component: Projects,
        },
        {
            path: '/projects-c',
            name: 'projects-c',
            component: Projects,
        },
        {
            path: '/users',
            name: 'users',
            component: Users,
        },
    ]
}
