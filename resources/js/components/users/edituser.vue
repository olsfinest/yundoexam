<template>
  <div>
    <fieldset v-for="user in user">

      <div class="card-header"><h5>UPDATE {{  user.first_name }} {{  user.last_name }}</h5></div>
      <div class="card-body">

           <div class="form-group row mb-0">
                <div class="col-md-0 offset-md-0">
                    <button @click="back" type="submit" class="btn btn-info">
                        Go back
                     </button>
                     <br/><br/>
                </div>
          </div>
        
         <div class="form-group row">

                <label for="first_name" class="col-md-3 col-form-label text-md-right">First Name</label>
               
                <div class="col-md-6">

                    <input v-model="user.first_name" id="first_name" type="text" class="form-control" name="first_name" value="" required autocomplete="first_name" autofocus>             

                    <br v-if="errormessage.first_name" />

                    <div v-if="errormessage.first_name" class="alert alert-danger" role="alert">
                         {{ errormessage.first_name }}
                    </div> 

                </div>

               
          </div>

          <div class="form-group row">

                <label for="last_name" class="col-md-3 col-form-label text-md-right">Last Name</label>

                <div class="col-md-6">

                    <input v-model="user.last_name" id="last_name" type="text" class="form-control" name="last_name" value="" required autocomplete="last_name" autofocus>            

                    <br v-if="errormessage.last_name" />
                    <div v-if="errormessage.last_name" class="alert alert-danger" role="alert">
                         {{ errormessage.last_name }}
                    </div>  

                </div>

                 
                
          </div>


          <div class="form-group row">

                <label for="address" class="col-md-3 col-form-label text-md-right">Address</label>

                <div class="col-md-6">
                    <input v-model="user.address" id="address" type="text" class="form-control" name="address" value="" required autocomplete="address" autofocus>             

                    <br v-if="errormessage.address" />
                    <div v-if="errormessage.address" class="alert alert-danger" role="alert">
                         {{ errormessage.address }}
                    </div>  

                </div>
                
          </div>

          <div class="form-group row">

                <label for="postcode" class="col-md-3 col-form-label text-md-right">Post Code</label>

                <div class="col-md-6">

                    <input v-model="user.postcode" placeholder="2600" id="postcode" type="text" class="form-control" name="postcode" value="" required autocomplete="postcode" autofocus>             

                    <br v-if="errormessage.postcode" />
                    <div v-if="errormessage.postcode" class="alert alert-danger" role="alert">
                         {{ errormessage.postcode }}
                    </div> 

                </div>
                
          </div>


          <div class="form-group row">

                <label for="contact_phone_number" class="col-md-3 col-form-label text-md-right">Contact Phone Number</label>

                <div class="col-md-6">
                    <input v-model="user.contact_phone_number" placeholder="+639051231230" id="contact_phone_number" type="text" class="form-control" name="contact_phone_number" value="" required autocomplete="postcode" autofocus>             

                    <br v-if="errormessage.contact_phone_number" />
                    <div v-if="errormessage.contact_phone_number" class="alert alert-danger" role="alert">
                         {{ errormessage.contact_phone_number }}
                    </div> 
                </div>
                
          </div>


          <div class="form-group row">

                <label for="username" class="col-md-3 col-form-label text-md-right">Username</label>

                <div class="col-md-6">

                    <input v-model="user.username" id="username" type="text" class="form-control" name="username" value="" required autocomplete="username" autofocus>              

                    <br v-if="errormessage.username" />
                    <div v-if="errormessage.username" class="alert alert-danger" role="alert">
                         {{ errormessage.username }}
                    </div> 

                </div>
                
          </div>


          <div class="form-group row">

                <label for="email" class="col-md-3 col-form-label text-md-right">Email</label>

                <div class="col-md-6">
                    <input v-model="user.email" id="email" type="text" class="form-control" name="email" value="" required autocomplete="email" autofocus>             

                    <br v-if="errormessage.email" />
                    <div v-if="errormessage.email" class="alert alert-danger" role="alert">
                         {{ errormessage.email }}
                    </div> 
                </div>
                
          </div>


          <div class="form-group row">

                <label for="password" class="col-md-3 col-form-label text-md-right">Password</label>

                <div class="col-md-6">
                    <input v-model="user.password" id="password" type="password" class="form-control" name="password" value="" required autocomplete="password" autofocus>            

                    <br v-if="errormessage.password" />
                    <div v-if="errormessage.password" class="alert alert-danger" role="alert">
                         {{ errormessage.password }}
                    </div> 

                </div>
                
          </div>

          <div class="form-group row">

                <label for="password-confirm" class="col-md-3 col-form-label text-md-right">Confirm Password</label>

                <div class="col-md-6">

                    <input v-model="user_data.password_confirm" id="password-confirm" type="password" class="form-control" name="password-confirm" value="" required autocomplete="password-confirm" autofocus>            


                    <br v-if="errormessage.password_confirm" />
                    <div v-if="errormessage.password_confirm" class="alert alert-danger" role="alert">
                         {{ errormessage.password_confirm }}
                    </div> 

                </div>
          </div>
         
          <div class="form-group row mb-0">
                <div class="col-md-3 offset-md-3">
                    <button @click="updateUser" type="submit" class="btn btn-primary">
                        Update User
                     </button>
                </div>
          </div>
        
      </div>

    </fieldset>

  </div> 
</template>


<script>
     export default {

        data(){

            return {

                uri: '/getSingleUser/',

                user: [],

                user_data:{

                    password_confirm : '',
                    id : '',
                  
                },

                errormessage:{

                    first_name: '',
                    last_name: '',
                    address: '',
                    postcode: '',
                    contact_phone_number: '',
                    username: '',
                    email: '',
                    password: '',
                    password_confirm : '',
                  
                },

             
            }

        },

        methods: {

            // update all fields for the user going to the contoller field UserController.php  updateUser

            updateUser() {

                var first_name_update = document.getElementById("first_name");
                var last_name_update = document.getElementById("last_name");
                var address_update = document.getElementById("address");
                var postcode_update = document.getElementById("postcode");
                var contact_phone_number_name_update = document.getElementById("contact_phone_number");
                var username_name_update = document.getElementById("username");
                var email_update = document.getElementById("email");
                var password_update = document.getElementById("password");
                var password_confirm = document.getElementById("password-confirm");

                const vm = this;

                axios.post('/updateUser/' + this.user_data.id, { 

                    first_name : first_name_update.value , 	
                    last_name : last_name_update.value , 
                    address : address_update.value , 
                    postcode : postcode_update.value , 
                    contact_phone_number : contact_phone_number_name_update.value , 
                    username : username_name_update.value , 
                    email : email_update.value , 
                    password : password_update.value , 
                    password_confirm : password_confirm.value  

                }).then(function (response) {

                    vm.$router.push({ name: "allusers" });
                    console.log(response);  
                    toastr.success("User has been updated!");
    
                })
                
                
                 .catch(error=> {

                    

                    if(error.response.data.errors.first_name){

                        this.errormessage.first_name = error.response.data.errors.first_name[0];

                            
                    } else {

                        this.errormessage.first_name = "";

                    }   


                    if(error.response.data.errors.last_name){

                        this.errormessage.last_name = error.response.data.errors.last_name[0];
                            
                    } else {

                        this.errormessage.last_name = "";

                    }   


                    if(error.response.data.errors.address){

                        this.errormessage.address = error.response.data.errors.address[0];
                            
                    } else {

                        this.errormessage.address = "";

                    }   


                    if(error.response.data.errors.postcode){

                        this.errormessage.postcode = error.response.data.errors.postcode[0];
                            
                    } else {

                        this.errormessage.postcode = "";

                    }   


                    if(error.response.data.errors.contact_phone_number){

                        this.errormessage.contact_phone_number = error.response.data.errors.contact_phone_number[0];
                            
                    } else {

                        this.errormessage.contact_phone_number = "";

                    }   


                    if(error.response.data.errors.username){

                        this.errormessage.username = error.response.data.errors.username[0];
                            
                    } else {

                        this.errormessage.username = "";

                    }   


                    if(error.response.data.errors.email){

                        this.errormessage.email = error.response.data.errors.email[0];
                            
                    } else {

                        this.errormessage.email = "";

                    }   


                    if(error.response.data.errors.password){

                        this.errormessage.password = error.response.data.errors.password[0];
                            
                    } else {

                        this.errormessage.password = "";

                    }   

                    if(error.response.data.errors.password_confirm){

                        this.errormessage.password_confirm = error.response.data.errors.password_confirm[0];
                            
                    } else {

                        this.errormessage.password_confirm = "";

                    }   


                });

            } ,

            // load data for 1 certain user using id

            
            loadUser() {

                const _this = this; 

                axios.get(this.uri + this.$route.query.userId).then(response=>{

                        this.user = response.data.user;

                        _this.user_data.password_confirm = response.data.user[0].password;

                        _this.user_data.id = response.data.user[0].id;

                });

            },

            // it will go back to all user list

            back() {
                
             
                this.$router.go(-1);

            } ,



        },

         mounted() {

             

                this.loadUser();

        }

    }
</script>