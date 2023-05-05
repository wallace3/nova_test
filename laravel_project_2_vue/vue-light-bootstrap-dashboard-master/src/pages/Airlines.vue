<template>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-2 text-end">
                <router-link :to='{name:"AddAirline"}' class="btn btn-primary">Create New Airline</router-link>
            </div>
          <div class="col-12">
            <card class="strpied-tabled-with-hover"
                  body-classes="table-full-width table-responsive"
            >
              <template slot="header">
                <h4 class="card-title">Airlines</h4>
                <p class="card-category">Table of airlines</p>
              </template>
              <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Airport Name</th>
                                    <th>Code</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody v-if="airlines.length > 0">
                                <tr v-for="(airline,key) in airlines" :key="key">
                                    <td>{{ airline.id }}</td>
                                    <td>{{ airline.name }}</td>
                                    <td>{{ airline.code }}</td>
                                    <td>
                                        <router-link :to='{name:"EditAirline",params:{id:airline.id}}' class="btn btn-success">Edit</router-link>
                                        <button type="button" @click="deleteAirline(airline.id)" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4">No airlines Found.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </card>
          </div>
        </div>
      </div>
    </div>
  </template>
  <script>
    import LTable from 'src/components/Table.vue'
    import Card from 'src/components/Cards/Card.vue'
  
    export default {
      components: {
        LTable,
        Card
      },
      data () {
        return {
          airlines:[]
        }
      },
      mounted(){
        this.getAirlines(),
        this.baseUrl = 'http://127.0.0.1:8000/'
      },
      methods:{
        async getAirlines(){
            await this.axios.get('http://127.0.0.1:8000/api/airlines').then(response=>{
                this.airlines = response.data
            }).catch(error=>{
                console.log(error)
                this.airlines = []
            })
        },
        deleteAirline(id){
            if(confirm("Are you sure to delete this airline ?")){
                this.axios.delete(`http://127.0.0.1:8000/api/airlines/${id}`).then(response=>{
                    this.getAirlines()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
      }
    }
  </script>
  <style>
  </style>
  