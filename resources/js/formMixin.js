import axios from "axios";

export default {
    data() {
        return{
            form: {},
            errors: {},
            success: false,
            loaded:true,
            action: '',
        };
    },
//holds both our register and login methods for posting to our server
    methods: {
        submit(){
            if(this.loaded){
                this.loaded = false;
                this.success = false;
                this.errors = {};
                axios.post(this.action, this.form).then(response => {
                    this.form = {};
                    this.loaded = true;
                    this.success = true;
                    setTimeout(function(){window.location.href = "/account/profile";}, 1000);

                }).catch(error => {
                    this.loaded = true;
                    if(error.response.status == 422){
                        this.errors = error.response.data.errors || {};
                    }
                });
            }
        }
    }
};
