<template>
    <div class="container">
      <div class="row">
          <div class="col-md-6 mt-5 mx-auto">
              <form v-on:submit.prevent="login">
                <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  
                <div class="form-group">
                  <label for="email"> Email Address</label>
                  <input type="email" v-model="credentials.email" class="form-control" name="email" placeholder="Email Address">
                </div>
  
                <div class="form-group">
                  <label for="password"> Password</label>
                  <input type="password" v-model="credentials.password" class="form-control" name="password" placeholder="Password">
                </div>
  
                <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
              </form>
        </div>
      </div>
    </div>
  
  </template>
  
  
  <script>
  export default{
    data(){
      return {
        credentials:{
          email: '',
          password: ''
        }
      }
    },
    methods:{
      async login(){
          await this.axios.post('http://127.0.0.1:8000/api/auth/login',this.credentials).then(response=>{
              localStorage.setItem('usertoken', response.data.token)
              this.$router.push({name:"Airports"})
          }).catch(error=>{
              console.log(error)
          })
      },
    }
  }
  </script>