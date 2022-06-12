<template>
    <div>
                               <router-link to="/customers/add-customer" class="nav-item nav-link text-right" >Add Customer</router-link>

       
        <table class="table " id="myTable">
            <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>

                 <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
            </thead>

        </table>
    </div>
</template>
<script>

    export default {
        data() {
            return {
                customers: []
            }
        },
        created() {
            jQuery( document ).ready(function( $ ) {

            $(document).ready( function () {
            $.noConflict();
            $('#myTable').DataTable({
                "processing": true,
                "serverSide": true,
                       "bLengthChange": false,
                "ajax": "api/customers",
                "columns": [
                    { "data": "id" },
                    { "data": "first_name" },
                    { "data": "last_name" },

                    { "data": "email" },
                    { "data": "phone" },
                    { "data": "action" },
                ]
            });
           });
});


            this.axios
                .get('http://localhost:8000/api/customers')
                .then(response => {
                    this.customers = response.data;
                });
        },
        methods: {
            deleteCustomer(id) {
                this.axios
                    .delete(`http://localhost:8000/api/customer/delete/${id}`)
                    .then(response => {
                        let i = this.customers.map(item => item.id).indexOf(id); // find index of your object
                        this.customers.splice(i, 1)
                    });
            }
        }
    }
</script>