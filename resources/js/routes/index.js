import Projects from '../pages/Projects.vue'
import ProjectsA from '../pages/ProjectsA.vue'
import ProjectsB from '../pages/ProjectsB.vue'
import ProjectsC from '../pages/ProjectsC.vue'
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
            component: ProjectsA,
        },
        {
            path: '/projects-b',
            name: 'projects-b',
            component: ProjectsB,
        },
        {
            path: '/projects-c',
            name: 'projects-c',
            component: ProjectsC,
        },
        {
            path: '/users',
            name: 'users',
            component: Users,
        },
    ]
}
