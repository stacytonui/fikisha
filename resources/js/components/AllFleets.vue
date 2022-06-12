<template>
    <div>
                           <router-link to="/fleet/add-fleet" class="nav-item nav-link text-right">Add Fleet</router-link>

        <table class="table " id="myTable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Reg No</th>
                <th>Contact</th>

                 <th>Status</th>
                <th>View</th>
            </tr>
            </thead>

        </table>
    </div>
</template>
<script>

    export default {
        data() {
            return {
                fleets: []
            }
        },
        created() {
let url = new URL(window.location.href);
let param = url.searchParams.get("type");
console.log(param);
var xhttp = new XMLHttpRequest();

            jQuery( document ).ready(function( $ ) {
            $(document).ready( function () {
            $.noConflict();
            $('#myTable').DataTable({
                "processing": true,
                "serverSide": true,
                   "bLengthChange": false,
                "ajax": "api/fleets/"+param,
                "columns": [
                    { "data": "id" },
                    { "data": "reg_no" },
                    { "data": "contact" },

                    { "data": "status" },
                    { "data": "action" },
                ]
            });

           });
        function status(value) {
            xhttp.open("GET", value, true);
            xhttp.send();
        }
});


       
        },
        methods: {
            deleteFleet(id) {
                this.axios
                    .delete(`http://localhost:8000/api/fleet/delete/${id}`)
                    .then(response => {
                        let i = this.fleets.map(item => item.id).indexOf(id); // find index of your object
                        this.fleets.splice(i, 1)
                    });
            }


        }
    }
</script>