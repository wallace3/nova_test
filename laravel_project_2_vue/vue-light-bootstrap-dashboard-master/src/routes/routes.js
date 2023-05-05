import DashboardLayout from '../layout/DashboardLayout.vue'
// GeneralViews
import NotFound from '../pages/NotFoundPage.vue'

// Admin pages
import Overview from 'src/pages/Overview.vue'
import UserProfile from 'src/pages/UserProfile.vue'
import TableList from 'src/pages/TableList.vue'
import Typography from 'src/pages/Typography.vue'
import Icons from 'src/pages/Icons.vue'
import Maps from 'src/pages/Maps.vue'
import Notifications from 'src/pages/Notifications.vue'
import Upgrade from 'src/pages/Upgrade.vue'
import Airlines from 'src/pages/Airlines.vue'
import Airports from 'src/pages/Airports.vue'
import Flights from 'src/pages/Flights.vue'
import AddAirport from 'src/pages/AddAirport.vue'
import EditAirport from 'src/pages/EditAirport.vue'
import AddAirline from 'src/pages/AddAirline.vue'
import EditAirline from 'src/pages/EditAirline.vue'
import AddFlight from 'src/pages/AddFlight.vue'
import EditFlight from 'src/pages/EditFlight.vue'
import Login from 'src/pages/Login.vue'


const routes = [
  {
    path: '/',
    component: DashboardLayout,
    redirect: '/admin/overview'
  },
  {
    path: '/admin',
    component: DashboardLayout,
    redirect: '/admin/overview',
    children: [
      {
        path: 'overview',
        name: 'Overview',
        component: Overview
      },
      {
        path: 'user',
        name: 'User',
        component: UserProfile
      },
      {
        path: 'table-list',
        name: 'Table List',
        component: TableList
      },
      {
        path: 'typography',
        name: 'Typography',
        component: Typography
      },
      {
        path: 'icons',
        name: 'Icons',
        component: Icons
      },
      {
        path: 'maps',
        name: 'Maps',
        component: Maps
      },
      {
        path: 'notifications',
        name: 'Notifications',
        component: Notifications
      },
      {
        path: 'airlines',
        name: 'Airlines',
        component: Airlines
      },
      {
        path: 'airports',
        name: 'Airports',
        component: Airports
      },
      {
        path: 'flights',
        name: 'Flights',
        component: Flights
      },
      {
        path: 'add-airport',
        name: 'AddAirport',
        component: AddAirport
      },
      {
        path: 'add-airline',
        name: 'AddAirline',
        component: AddAirline
      },
      {
        path: 'add-flight',
        name: 'AddFlight',
        component: AddFlight
      },
      {
        path: 'edit-airport',
        name: 'EditAirport',
        component: EditAirport
      },
      {
        path: 'edit-airline',
        name: 'EditAirline',
        component: EditAirline
      },
      {
        path: 'edit-flight',
        name: 'EditFlight',
        component: EditFlight
      },
    ]
  },
  {
    path: '/login',
    name: 'Login',
    component: Login
  },
  { path: '*', component: NotFound }
]

/**
 * Asynchronously load view (Webpack Lazy loading compatible)
 * The specified component must be inside the Views folder
 * @param  {string} name  the filename (basename) of the view to load.
function view(name) {
   var res= require('../components/Dashboard/Views/' + name + '.vue');
   return res;
};**/

export default routes
