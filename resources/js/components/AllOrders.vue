<template>
    <div>

        <table class="table " id="myTable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Order ID</th>
                <th>Delivery Address</th>

                 <th>Customer</th>
                <th>Status</th>
            </tr>
            </thead>

        </table>
    </div>
</template>
<script>

    export default {
        data() {
            return {
                orders: []
            }
        },
        created() {
let url = new URL(window.location.href);
let param = url.searchParams.get("type");
console.log(param);

            jQuery( document ).ready(function( $ ) {
            $(document).ready( function () {
            $.noConflict();
            $('#myTable').DataTable({
                "processing": true,
                "serverSide": true,
                   "bLengthChange": false,
                "ajax": "api/orders/"+param,
                "columns": [
                    { "data": "id" },
                    { "data": "order_id" },
                    { "data": "delivery_address" },

                    { "data": "customer_id" },
                    { "data": "status" },
                ]
            });
           });
});


       
        },
        methods: {
            // deleteOrder(id) {
            //     this.axios
            //         .delete(`http://localhost:8000/api/order/delete/${id}`)
            //         .then(response => {
            //             let i = this.orders.map(item => item.id).indexOf(id); // find index of your object
            //             this.orders.splice(i, 1)
            //         });
            // }
        }
    }
</script>