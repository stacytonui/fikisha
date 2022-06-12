import AllFleets from './components/AllFleets.vue';
import AddFleet from './components/AddFleet.vue';
import EditFleet from './components/EditFleet.vue';
import AllCustomers from './components/AllCustomers.vue';
import AddCustomer from './components/AddCustomer.vue';
import EditCustomer from './components/EditCustomer.vue';
import AllOrders from './components/AllOrders.vue';
import Home from './components/Home.vue';
export const routes = [
    {
        name: 'home',
        path: '/home',
        component: Home
    },
    {
        name: 'fleet',
        path: '/fleet',
        component: AllFleets
    },
    {
        name: 'orders',
        path: '/orders',
        component: AllOrders
    },
    {
        name: 'add-fleet',
        path: '/fleet/add-fleet',
        component: AddFleet
    },
    {
        name: 'edit-fleet',
        path: '/fleet/edit-fleet/:id',
        component: EditFleet
    },
    {
        name: 'customers',
        path: '/customers',
        component: AllCustomers
    },
    {
        name: 'add-customer',
        path: '/customers/add-customer',
        component: AddCustomer,
        props: true
        
    },
    {
        name: 'edit-customer',
        path: '/customers/edit-customer/:id',
        component: EditCustomer
    }
];