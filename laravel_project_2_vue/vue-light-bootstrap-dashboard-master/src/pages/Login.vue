<template>
  <div class="container login-container">
    <div class="row">
        <div class="col-md-6 mt-5 mx-auto login-form-1">
            <form v-on:submit.prevent="login">
              <h1 class="h3 mb-3 font-weight-normal">Inicio de Sesión</h1>

              <div class="form-group">
                <label for="email"> Correo</label>
                <input type="email" v-model="credentials.email" class="form-control" name="email" placeholder="Corre">
              </div>

              <div class="form-group">
                <label for="password"> Contraseña </label>
                <input type="password" v-model="credentials.password" class="form-control" name="password" placeholder="Contraseña">
              </div>

              <button type="submit" class="btn btn-lg btn-primary btn-block">Iniciar Sesión</button>
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
            this.$router.push('/')
        }).catch(error=>{
            console.log(error)
        })
    },
  }
}
</script>
<style>

.login-container{
    margin-top: 5%;
    margin-bottom: 5%;
}
.login-form-1{
    padding: 5%;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-1 h3{
    text-align: center;
    color: #333;
}
.login-form-2{
    padding: 5%;
    background: #0062cc;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-2 h3{
    text-align: center;
    color: #fff;
}
.login-container form{
    padding: 10%;
}
.btnSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    border: none;
    cursor: pointer;
}
.login-form-1 .btnSubmit{
    font-weight: 600;
    color: #fff;
    background-color: #0062cc;
}
.login-form-2 .btnSubmit{
    font-weight: 600;
    color: #0062cc;
    background-color: #fff;
}
.login-form-2 .ForgetPwd{
    color: #fff;
    font-weight: 600;
    text-decoration: none;
}
.login-form-1 .ForgetPwd{
    color: #0062cc;
    font-weight: 600;
    text-decoration: none;
}

</style>