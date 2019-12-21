<template>
  <div>
      <div class="card-header"><h5>ADD USER</h5></div>
      <div class="card-body">

          <div class="form-group row mb-0">
                <div class="col-md-0 offset-md-0">
                    <button @click="allusers" type="submit" class="btn btn-info">
                        All Users
                     </button>
                     <br/><br/>
                </div>
          </div>
         
          <div class="form-group row">

                <label for="first_name" class="col-md-3 col-form-label text-md-right">First Name</label>
               
                <div class="col-md-6">
                    <input v-model="user.first_name" id="first_name" type="text" class="form-control" name="first_name" value="" required autocomplete="first_name" autofocus>             

                    <br v-if="this.errormessage.first_name" />
                    <div v-if="this.errormessage.first_name" class="alert alert-danger" role="alert">
                         {{ this.errormessage.first_name }}
                    </div> 

                </div>

             
                             
          </div>

          <div class="form-group row">

                <label for="last_name" class="col-md-3 col-form-label text-md-right">Last Name</label>

                <div class="col-md-6">
                    
                    <input v-model="user.last_name" id="last_name" type="text" class="form-control" name="last_name" value="" required autocomplete="last_name" autofocus>            

                    <br v-if="this.errormessage.last_name" />
                    <div v-if="this.errormessage.last_name" class="alert alert-danger" role="alert">
                         {{ this.errormessage.last_name }}
                    </div>  

                </div>

                 
                
          </div>


          <div class="form-group row">

                <label for="address" class="col-md-3 col-form-label text-md-right">Address</label>

                <div class="col-md-6">
                    <input v-model="user.address" id="address" type="text" class="form-control" name="address" value="" required autocomplete="address" autofocus>             

                    <br v-if="this.errormessage.address" />
                    <div v-if="this.errormessage.address" class="alert alert-danger" role="alert">
                         {{ this.errormessage.address }}
                    </div>  

                </div>
                
          </div>

          <div class="form-group row">

                <label for="postcode" class="col-md-3 col-form-label text-md-right">Post Code</label>

                <div class="col-md-6">
                    <input v-model="user.postcode" placeholder="2600" id="postcode" type="text" class="form-control" name="postcode" value="" required autocomplete="postcode" autofocus>             

                    <br v-if="this.errormessage.postcode" />
                    <div v-if="this.errormessage.postcode" class="alert alert-danger" role="alert">
                         {{ this.errormessage.postcode }}
                    </div>  

                </div>
                
          </div>


          <div class="form-group row">

                <label for="contact_phone_number" class="col-md-3 col-form-label text-md-right">Contact Phone Number</label>

                <div class="col-md-6">
                    <input v-model="user.contact_phone_number" placeholder="+639051231230" id="contact_phone_number" type="text" class="form-control" name="contact_phone_number" value="" required autocomplete="postcode" autofocus>             

                    <br v-if="this.errormessage.contact_phone_number" />
                    <div v-if="this.errormessage.contact_phone_number" class="alert alert-danger" role="alert">
                         {{ this.errormessage.contact_phone_number }}
                    </div>  
                </div>
                
          </div>


          <div class="form-group row">

                <label for="username" class="col-md-3 col-form-label text-md-right">Username</label>

                <div class="col-md-6">
                    <input v-model="user.username" id="username" type="text" class="form-control" name="username" value="" required autocomplete="username" autofocus>             

                    <br v-if="this.errormessage.username" />
                    <div v-if="this.errormessage.username" class="alert alert-danger" role="alert">
                         {{ this.errormessage.username }}
                    </div>  
                    
                </div>
                
          </div>


          <div class="form-group row">

                <label for="email" class="col-md-3 col-form-label text-md-right">Email</label>

                <div class="col-md-6">
                    <input v-model="user.email" id="email" type="text" class="form-control" name="email" value="" required autocomplete="email" autofocus>             

                    <br v-if="this.errormessage.email" />
                    <div v-if="this.errormessage.email" class="alert alert-danger" role="alert">
                         {{ this.errormessage.email }}
                    </div>  

                </div>
                
          </div>


          <div class="form-group row">

                <label for="password" class="col-md-3 col-form-label text-md-right">Password</label>

                <div class="col-md-6">

                    <input v-model="user.password" id="password" type="password" class="form-control" name="password" value="" required autocomplete="password" autofocus>             

                    <br v-if="this.errormessage.password" />
                    <div v-if="this.errormessage.password" class="alert alert-danger" role="alert">
                         {{ this.errormessage.password }}
                    </div>  

                </div>
                
          </div>

          <div class="form-group row">

                <label for="password-confirm" class="col-md-3 col-form-label text-md-right">Confirm Password</label>

                <div class="col-md-6">

                    <input v-model="user.password_confirm" id="password-confirm" type="password" class="form-control" name="password-confirm" value="" required autocomplete="password-confirm" autofocus>            

                    <br v-if="this.errormessage.password_confirm" />
                    <div v-if="this.errormessage.password_confirm" class="alert alert-danger" role="alert">
                         {{ this.errormessage.password_confirm }}
                    </div>  
                  
                </div>
                
          </div>

          <div class="form-group row mb-0">
                <div class="col-md-3 offset-md-3">
                    <button type="submit" class="btn btn-primary" @click="createUser">
                        Register
                     </button>
                </div>
          </div>
        
      </div>
  </div> 
</template>


<script>
     export default {

        data(){

            return {

                uri: 'storeUser/',

                user:{

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

                errors : [] ,

               
            }

        },

        methods: {

            // a link functionalty going to allusers

           allusers() {

               this.$router.push({ name: "allusers" });

           } ,

           // create a user with all fields going to the contoller field UserController.php  storeUser

           createUser() { 
     

            this.errors = [];

            const vm = this;

            axios.post('/storeUser', { 

                first_name : this.user.first_name , 	
                last_name : this.user.last_name , 
                address : this.user.address , 
                postcode : this.user.postcode , 
                contact_phone_number : this.user.contact_phone_number , 
                username : this.user.username , 
                email : this.user.email , 
                password : this.user.password , 
                password_confirm : this.user.password_confirm  

            }).then(function (response) {
                
               vm.$router.push({ name: "allusers" });
               console.log(response);  

               toastr.success("User has been created!");

  
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

     
           }  


        },

       


    }
</script>