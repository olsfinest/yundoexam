<template>
  <div>
    <div class="card-header"><h5>LIST OF ALL USERS</h5></div>
    <br/>

    <button @click="adduser" type="submit" class="btn btn-info">
      Add User
    </button>
               
    <button @click="deleteUsers" class="btn btn-dark btn-block create_buttom">Delete All Users</button>

    <table class="table table-striped ">

      <thead>
           <tr>        
              <th>
                <div class="custom-control custom-checkbox">
                  <input v-model="selectAll" @click="select" value="selectAll" type="checkbox" class="custom-control-input" id="selectAll"> 
                  <label class="custom-control-label" for="selectAll"></label>
                </div>
              </th>  
              <th>delete / edit</th>                
              <th>First name</th> 
              <th>Last name</th>   
              <th>Username</th>   
              <th>Email</th>     
           </tr>
       </thead>

       <tbody>
            <tr v-for="user in users">
                <td>
                
                  <div class="custom-control custom-checkbox">
                      <input v-model="selected"  :value="user.id" type="checkbox" class="custom-control-input" :id="user.id"> 
                      <label class="custom-control-label" :for="user.id"></label>
                  </div>
                </td> 
                 <td>

                  <i @click="deleteUser(user.id)" class="fa fa-trash" aria-hidden="true"></i> 
                  <i @click="editUser(user.id)" class="fas fa-edit" aria-hidden="true"></i>
              
                </td>  
                <td>{{ user.first_name }} </td> 
                <td>{{ user.last_name }}</td>   
                <td>{{ user.username }}</td>   
                <td>{{ user.email }}</td> 
                       
            </tr>
       </tbody>

        <thead>
           <tr>        
              <th>
                
                <div class="custom-control custom-checkbox">
                  <input v-model="selectAll" @click="select" value="selectAll" type="checkbox" class="custom-control-input" id="selectAll1"> 
                  <label class="custom-control-label" for="selectAll"></label>
                </div>

              </th>  
              <th>delete / edit</th>                
              <th>First name</th> 
              <th>Last name</th>   
              <th>Username</th>   
              <th>Email</th>       
           </tr>
       </thead>


    </table>

    <button @click="deleteUsers" class="btn btn-dark btn-block create_buttom">Delete All Users</button>

  </div> 
</template>


<script>
     export default {

        data(){

            return {

                uri: '/getUser',

                uridelete: '/deleteManyUsers/',

                users: [],

                selected : [] ,

                selectAll: false,

            }

        },

        methods: {

            // checkbox select for all users

            select() {

  
              this.selected = [];

              if (!this.selectAll) {

                for(let user in this.users) {

                  this.selected.push(this.users[user].id);

                }

              }
     

            } ,


            // delete all users using multiple checkbox

            deleteUsers() {
       

               if(this.selected == "") {


                    alert("Select user/s on checkbox first thank you.");


               } else {

                    var _this = this;      

                      var r = confirm("Are you sure you wanna delete it");
                  
                      if (r == true) {

                        axios.post(this.uridelete + this.selected).then(response=>{

                          _this.loadUsers();

                          toastr.success("Users has been deleted!");
                      
                        }); 

                      } else {


                      }

                } 
   

            } ,

            // delete singular user on a button

            deleteUser(index) {

              var _this = this;      

               
                  var r = confirm("Are you sure you wanna delete it");
               
                  if (r == true) {

                    axios.post(this.uridelete + index).then(response=>{  

                      _this.loadUsers();

                      toastr.success("User has been deleted!");
         
                   }); 

                  } else {


                  }


            } ,

            // functions that links/redirects to edituser

            editUser(index) {

              var _this = this;      
    
              _this.$router.push({ name: "edituser" ,  query: { userId: index }  } );


            } ,


            // load all user data and add on the table

            loadUsers() {

               
                    axios.get(this.uri).then(response=>{

                        this.users = response.data.users;

                    });

            },

            // redirects button to add user

            adduser () {

              this.$router.push({ name: "adduser" });

            } ,


        },

        mounted() {

                // realtime ajax to load users

                this.loadUsers();

        }


    }
</script>
