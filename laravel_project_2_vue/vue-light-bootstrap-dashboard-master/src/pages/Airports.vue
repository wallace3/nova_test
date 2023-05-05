<template>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-2 text-end">
                <router-link :to='{name:"AddAirport"}' class="btn btn-primary">Create New Airport</router-link>
            </div>
          <div class="col-12">
            <card class="strpied-tabled-with-hover"
                  body-classes="table-full-width table-responsive"
            >
              <template slot="header">
                <h4 class="card-title">airports</h4>
                <p class="card-category">Table of airports</p>
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
                            <tbody v-if="airports.length > 0">
                                <tr v-for="(airport,key) in airports" :key="key">
                                    <td>{{ airport.id }}</td>
                                    <td>{{ airport.name }}</td>
                                    <td>{{ airport.code }}</td>
                                    <td>
                                        <router-link :to='{name:"EditAirport",params:{id:airport.id}}' class="btn btn-success">Edit</router-link>
                                        <button type="button" @click="deleteAirport(airport.id)" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4">No airports Found.</td>
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
    import Card from 'src/components/Cards/Card.vue'
  
    export default {
      components: {
        Card
      },
      data () {
        return {
          airports:[]
        }
      },
      mounted(){
        this.getAirports()
      },
      methods:{
        async getAirports(){
            await this.axios.get('http://127.0.0.1:8000/api/airports').then(response=>{
                this.airports = response.data
            }).catch(error=>{
                console.log(error)
                this.airports = []
            })
        },
        deleteAirport(id){
            if(confirm("Are you sure to delete this airport ?")){
                this.axios.delete(`http://127.0.0.1:8000/api/airports/${id}`).then(response=>{
                    this.getAirports()
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
  