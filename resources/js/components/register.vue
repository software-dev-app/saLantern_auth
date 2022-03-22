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
                                    <div class="text-center pt-3">
                                        <a href="" class="logo logo-admin">
                                            <img src="https://www.salantern.co.za/images/SA%20Lantern%20Logo%20dark%20background.png" height="50" alt="logo" class="auth-logo">
                                        </a>
                                        <p class="text-muted font-18 mb-0">Register</p>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <form class="my-4" @submit.prevent="submit">

                                        <div class="form-group mb-2">
                                            <label class="form-label" for="first_name">First Name<span class="mandetory"> *</span></label>
                                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name" v-model="form.first_name"/>
                                            <div v-if="errors && errors.first_name" class="text-danger mt-2">{{ errors.first_name[0] }}</div>
                                        </div>

                                        <div class="form-group mb-2">
                                            <label class="form-label" for="last_name">Last Name <span class="mandetory"> *</span></label>
                                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name" v-model="form.last_name"/>
                                            <div v-if="errors && errors.last_name" class="text-danger mt-2">{{ errors.last_name[0] }}</div>
                                        </div>

                                        <div class="form-group mb-2">
                                            <label class="form-label" for="date_of_birth">Date of birth <span class="mandetory"> *</span></label>
                                            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="Enter date of birth" v-model="form.date_of_birth"/>
                                            <div v-if="errors && errors.date_of_birth" class="text-danger mt-2">{{ errors.date_of_birth[0] }}</div>
                                        </div>
                                         <div class="form-group mb-2">
                                            <label class="form-label" for="email">Email <span class="mandetory"> *</span></label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" v-model="form.email"/>
                                            <div v-if="errors && errors.email" autocomplete="off" class="text-danger mt-2">{{ errors.email[0] }}</div>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label" for="password">Password <span class="mandetory"> *</span></label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" v-model="form.password" />
                                            <div v-if="errors && errors.password" autocomplete="off" class="text-danger mt-2">{{ errors.password[0] }}</div>
                                        </div>

                                        <div class="form-group mb-2">
                                            <label class="form-label" for="password_confirmation">Confirm Password <span class="mandetory"> *</span></label>
                                            <input type="password" class="form-control" autocomplete="off" name="password_confirmation" id="password_confirmation" placeholder="Enter Confirm password" v-model="form.password_confirmation">
                                            <div v-if="errors && errors.password_confirmation" class="text-danger mt-2">{{ errors.password_confirmation[0] }}</div>
                                        </div>


                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <div class="d-grid mt-3">
                                                    <button class="btn btn-primary" @click="submit()" type="button">Sign Up <i class="fas fa-sign-in-alt ms-1"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                           <div v-if="success" class="alert alert-success mt-3">
                                                Account successfully registered!
                                            </div>
                                    </form>
                                    <div class="m-3 text-center text-muted">
                                        <p class="mb-0">Already have an account ? <a href="/auth/login" class="text-primary ms-2">Log in</a></p>
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
import formMixin from '../formMixin';


export default {

    mixins: [formMixin],

    data(){
        return {
           'action': '/auth/save',
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
  background-color: #908937;
  border-color: #908937;
}
.text-header{
    color: #908937;
}
.mandetory{
    color: red;
}
</style>
