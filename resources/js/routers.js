import VueRouter from 'vue-router'

const routes = [
  {
    path: '/',
    name: 'dashboard',
    component: require('./components/Dashboard.vue').default
  },
  {
    path: '/addwork',
    name: 'add_work',
    component: require('./components/Work/AddWork.vue').default
  },
  {
    path: '/editwork',
    name: 'editwork',
    component: require('./components/Work/EditWork.vue').default
  },
  {
    path: '/allwork',
    name: 'allwork',
    component: require('./components/Work/AllWork.vue').default
  },
  {
    path: '/worklink_esan',
    name: 'worklink_esan',
    component: require('./components/Work/WorkLinkEsan.vue').default
  },
  {
    path: '/worklink_teit',
    name: 'worklink_teit',
    component: require('./components/Work/WorkLinkTeit.vue').default
  },
  {
    path: '/worklink_prarimonton',
    name: 'worklink_prarimonton',
    component: require('./components/Work/WorkLinkPraRiMonTon.vue').default
  },
  {
    path: '/worklink_huan',
    name: 'worklink_huan',
    component: require('./components/Work/WorkLinkHuan.vue').default
  },
  {
    path: '/worklink_grang',
    name: 'worklink_grang',
    component: require('./components/Work/WorkLinkGrang.vue').default
  },
]

export default new VueRouter({
  routes
})