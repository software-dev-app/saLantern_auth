<template>
    <div>
        <nav class="navbar navbar-navy mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="https://www.salantern.co.za/images/SA%20Lantern%20Logo%20dark%20background.png" height="40" alt="">
                </a>
                <a type="button" class="navbar-brand justify-content-end text-white" @click.prevent="logout" ><font-awesome-icon icon="fa-solid fa-arrow-right-from-bracket" /> Logout</a>
            </div>
        </nav>

       <div class="row justify-content-center">
            <div class="col-sm-10 ">
                <div class="page-title-box">
                    <div class="float-end">
                    </div>
                    <h4 class="page-title">Profile</h4>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">
                        <div class="met-profile">
                             <div class="row">
                                <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                    <div class="met-profile_user-detail">
                                        <h5 class="met-user-name"></h5>
                                        <p class="mb-0 met-user-name-post"></p>
                                    </div>
                                </div>
                            </div>

                                <div class="col-lg-4  align-self-center">
                                    <ul class="list-unstyled personal-detail mb-0">
                                        <li class="mt-2"> <h5> <font-awesome-icon icon="fa-solid fa-user" />  Hi Mr. {{ user.last_name }} </h5>   </li>
                                    </ul>

                                </div>
                                <div class="col-lg-6  align-self-center">
                                    <div class="row">
                                        <div class="col-auto text-end border-end">
                                            <p class="mb-0 fw-semibold"> <font-awesome-icon icon="fa-solid fa-cake-candles" />  {{ age }}</p>
                                        </div>
                                        <div class="col-auto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h4 class="card-title"><font-awesome-icon icon="fa-solid fa-address-card" /> Personal Information</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group mb-3 row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">First Name</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input class="form-control" type="text" placeholder="Enter first name" v-model="user.first_name"/>

                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Last Name</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input class="form-control" type="text"  placeholder="Enter last name" v-model="user.last_name" />

                                            </div>
                                        </div>


                                         <div class="form-group mb-3 row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Email</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input class="form-control" type="text" placeholder="Enter email" v-model="user.email">

                                            </div>
                                        </div>
                                         <div class="form-group mb-3 row">
                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Date of Birth</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input class="form-control" type="text" onfocusin="(this.type='date')" onfocusout="(this.type='text')" placeholder="Enter date of birth" v-model="user.date_of_birth">

                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <div class="col-lg-9 col-xl-8 offset-lg-3">
                                                <button  @click="submit()" class="btn btn-de-primary">Submit</button>
                                                <!-- <button type="button" class="btn btn-de-danger">Cancel</button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!--end col-->
                            <div class="col-lg-6 col-xl-6">
                                <password></password>
                            </div> <!-- end col -->
                        </div><!--end row-->
                    </div>
            </div>
        </div>

    </div>
</template>

<script>
import password from './password.vue';

export default {
  components: { password },

    props:[
        'user',
        'age'
    ],
    mounted(){
        this.user;
    },

    //form methods posting to our server
    methods:{
        submit(){
            axios({
                method: 'post',
                url: '/account/profile/update',
                data: {
                first_name: this.user.first_name,
                last_name: this.user.last_name,
                date_of_birth: this.user.date_of_birth,
                email: this.user.email,
            }
            })
            .then(function (response) {
                if(response.data.status== "success")
                self.success = true;

                if(response.data.status== "errors")
                self.errors = true;
                }).catch(function (errors){
                self.errors = errors.response.data.errors;
                console.log(self.errors);
            });
        },
         logout(){
            axios.get('/auth/logout').then(() =>{
                window.location.href = '/auth/login'
            });
        }
    }

}
</script>

<style>
    .navbar-navy{
        background-color:#0c013b ;
    }
    .icon{
        font-size: 20px;
    }
</style>
