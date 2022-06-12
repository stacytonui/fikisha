<template>
    <div>
        <h3 class="text-center">Add Customer</h3>
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <form @submit.prevent="addCustomer">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" v-model="customer.first_name">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" v-model="customer.last_name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" v-model="customer.email">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" v-model="customer.phone">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Customer</button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                customer: {}
            }
        },
        methods: {
            addCustomer() {
                this.axios
                    .post('http://localhost:8000/api/customer/add', this.customer)
                    .then(response => (
                        this.$router.push({name: 'customers'})
                        // console.log(response.data)
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>