<template>
    <div>
        <h3 class="text-center">Edit Fleet</h3>
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <form @submit.prevent="updateFleet">
                    <div class="form-group">
                        <label>Reg No</label>
                        <input type="text" class="form-control" v-model="fleet.fleet.reg_no">
                    </div>
                    <div class="form-group">
                        <label>Contact</label>
                        <input type="text" class="form-control" v-model="fleet.fleet.contact">
                    </div>
                    <div class="form-group">
                        <label>Assign Order</label>
                        <select class="form-control" v-model="fleet.fleet.order_id">
                        <option v-for="(item , index) in fleet.orders" :value="item.id" v-bind:key="index" :selected= "fleet.fleet.order_id" >
                                {{item.order_id}}
                        </option>
                    </select>                  </div>
                    <button type="submit" class="btn btn-primary">Update Fleet</button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                fleet: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/fleet/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.fleet = response.data;
                    // console.log(response.data);
                });
        },
        methods: {
            updateFleet() {
                this.axios
                    .post(`http://localhost:8000/api/fleet/update/${this.$route.params.id}`, this.fleet.fleet)
                    .then((response) => {
                        console.log(response);
                        this.$router.push('/fleet?type=all');
                    });
            }
        }
    }
</script>