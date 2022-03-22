<template>
  <div>
       <div class="container-md">
            <div class="row vh-100 d-flex justify-content-center">
                <div class="col-12 align-self-center">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 mx-auto">
                                <div class="card">
                                    <div class="card-body p-0 auth-header-box">
                                        <div class="text-center p-3">
                                            <a href="" class="logo logo-admin">
                                                <img src="https://www.salantern.co.za/images/SA%20Lantern%20Logo%20dark%20background.png" height="60" alt="logo" class="auth-logo mb-2">
                                            </a>
                                            <h4 class="mt-3 mb-1 fw-semibold text-muted font-18">WELCOME BACK</h4>
                                             <p class="text-muted font-18  mb-0">LOGIN HERE</p>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <form class="my-4" action="">
                                            <div class="form-group mb-2">
                                                <label class="form-label" for="username">Email</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" v-model="form.email" />
                                                <div v-if="errors && errors.email" class="text-danger mt-2">{{ errors.email[0] }}</div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="userpassword">Password</label>
                                                <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password" v-model="form.password">
                                                <div v-if="errors && errors.password" class="text-danger mt-2">{{ errors.password[0] }}</div>
                                            </div>

                                            <div class="form-group row mt-3">
                                                <div class="col-sm-6" >
                                                    <a href="" class="text-muted  font-13"><i class="dripicons-lock"></i> Forgot password?</a>
                                                    <!-- <div class="form-check form-switch form-switch-success">
                                                        <input class="form-check-input" type="checkbox" id="customSwitchSuccess">
                                                        <label class="form-check-label" for="customSwitchSuccess">Remember me</label>
                                                    </div> -->
                                                </div><!--end col-->
                                                <div class="col-sm-6 text-end">

                                                </div><!--end col-->
                                            </div><!--end form-group-->

                                            <div class="form-group mb-0 row">
                                                <div class="col-12">
                                                    <div class="d-grid mt-3">
                                                        <button class="btn btn-primary" @click="submit()" type="button">Log In <i class="fas fa-sign-in-alt ms-1"></i></button>
                                                    </div>
                                                </div><!--end col-->
                                            </div> <!--end form-group-->
                                        </form><!--end form-->
                                        <div class="m-3 text-center text-muted">
                                            <p class="mb-0">Don't have an account ?  <a href="/auth/register" class="text-primary ms-2">Register</a></p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
</template>

<script>

//calling our vuejs form methods from form mixin
import formMixin from '../formMixin';

export default {

     mixins: [formMixin],

    data(){
        return {
            //appends route from form mixin
           'action': '/auth/check',
        }
    },

}
</script>

<style>
    .auth-header-box{
        background-color:#0c013b ;
    }
    .btn-primary {
        color: #fff;
        background-color: #0c013b;
        border-color: #0c013b;
    }
</style>
