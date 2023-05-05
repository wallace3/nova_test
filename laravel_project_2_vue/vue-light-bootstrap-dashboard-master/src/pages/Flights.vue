<template>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-2 text-end">
                <router-link :to='{name:"AddFlight"}' class="btn btn-primary">Create Flight</router-link>
            </div>
          <div class="col-12">
            <card class="strpied-tabled-with-hover"
                  body-classes="table-full-width table-responsive"
            >
              <template slot="header">
                <h4 class="card-title">Flights</h4>
                <p class="card-category">Flights</p>
              </template>
              <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Flight Code</th>
                                    <th>Departure time</th>
                                    <th>Arrival Time</th>
                                    <th>Departure</th>
                                    <th>Destination</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tbody v-if="flights.length > 0">
                                <tr v-for="(flight,key) in flights" :key="key">
                                    <td>{{ flight.id }}</td>
                                    <td>{{ flight.code }}</td>
                                    <td>{{ flight.departure_time }}</td>
                                    <td>{{ flight.arrival_time }}</td>
                                    <td>{{ flight.departure }}</td>
                                    <td>{{ flight.destination }}</td>
                                    <td>{{ flight.type }}</td>
                                    <td>
                                        <router-link :to='{name:"EditFlight",params:{id:flight.id}}' class="btn btn-success">Edit</router-link>
                                        <button type="button" @click="deleteFlight(flight.id)" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4">No Flights Found.</td>
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
          flights:[]
        }
      },
      mounted(){
        this.getFlights()
      },
      methods:{
        async getFlights(){
            await this.axios.get('http://127.0.0.1:8000/api/flights/tracking').then(response=>{
                this.flights = response.data
            }).catch(error=>{
                console.log(error)
                this.flights = []
            })
        },
        deleteFlight(id){
            if(confirm("Are you sure to delete this flight ?")){
                this.axios.delete(`http://127.0.0.1:8000/api/flights/${id}`).then(response=>{
                    this.getFlights()
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
  