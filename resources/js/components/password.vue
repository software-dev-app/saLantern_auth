<template>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><font-awesome-icon icon="fa-solid fa-key" /> Change Password</h4>
        </div><!--end card-header-->
        <div class="card-body">
            <div class="form-group mb-3 row">
                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Current Password</label>
                <div class="col-lg-9 col-xl-8">
                    <input class="form-control" type="password" placeholder="Password">
                    <!-- <a href="#" class="text-primary font-12">Forgot password ?</a> -->
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">New Password</label>
                <div class="col-lg-9 col-xl-8">
                    <input class="form-control" type="password" v-model="password" placeholder="New Password">
                    <div v-if="errors && errors.password" class="text-danger mt-2">{{ errors.password[0] }}</div>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Confirm Password</label>
                <div class="col-lg-9 col-xl-8">
                    <input class="form-control" type="password" v-model="password_confirmation" placeholder="Re-Password">
                    <div v-if="errors && errors.password_confirmation" class="text-danger mt-2">{{ errors.password_confirmation[0] }}</div>
                </div>
            </div>
            <div class="form-group mb-3 row">
                <div class="col-lg-9 col-xl-8 offset-lg-3">
                    <button type="submit" @click="submit()" class="btn btn-de-primary">Change Password</button>
                    <!-- <button type="button" class="btn btn-de-danger">Cancel</button> -->
                </div>
            </div>
        </div><!--end card-body-->
    </div>
</template>

<script>
export default {

    data(){
        return {
            showPassword: false,
            showConfirmPassword: false,
            password: '',
            password_confirmation: '',
            errors: [],
            success: false,
            loading: false,


            password_match: false,
            typing: false,
        }
    },
    methods:{
        //submit method posting to our update controller
        submit(){
            this.loading = true;
            let self = this;
            this.errors = [];

            axios({
                    method: 'post',
                    url: '/account/profile/update/password',
                    data: {

                    password: this.password,
                    password_confirmation: this.password_confirmation,

                    }
                }) .then(function (response) {

                       //set all input fields to null
                         self.success = true;
                         self.password = "";
                         self.password_confirmation = "";




                }).catch(function (errors){
                    self.errors = errors.response.data.errors;
                    console.log(self.errors);
                });
        },
    }
}
</script>

<style>

</style>
