<template>
    <div>
        <h3 class="text-center">Add Fleet</h3>
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <form @submit.prevent="addFleet">
                    <div class="form-group">
                        <label>Reg No</label>
                        <input type="text" class="form-control" v-model="fleet.reg_no">
                    </div>
                    <div class="form-group">
                        <label>Contact</label>
                        <input type="text" class="form-control" v-model="fleet.contact">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Fleet</button>
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
        methods: {
            addFleet() {
                this.axios
                    .post('http://localhost:8000/api/fleet/add', this.fleet)
                    .then(response => (
                        this.$router.push('/fleet?type=all')
                        // console.log(response.data)
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>