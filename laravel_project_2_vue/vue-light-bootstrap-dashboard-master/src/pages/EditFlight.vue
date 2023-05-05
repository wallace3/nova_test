<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Flight</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Code Of flight</label>
                                    <input type="text" class="form-control" v-model="flight.code">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Departure Time</label>
                                    <input type="text" class="form-control" v-model="flight.departure_time">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Arrival Time</label>
                                    <input type="text" class="form-control" v-model="flight.arrival_time">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Departure Airport</label>
                                    <select class = "form-control" v-model="flight.departure_id">
                                        <option v-for="airport in airports" v-bind:value="airport.id">{{ airport.name }} -- {{ airport.city }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Arrival Airport</label>
                                    <select class = "form-control" v-model="flight.destination_id">
                                        <option v-for="airport in airports" v-bind:value="airport.id">{{ airport.name }} -- {{ airport.city }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Arline</label>
                                    <select class = "form-control" v-model="flight.airline_id">
                                        <option v-for="airline in airlines" v-bind:value="airline.id">{{ airline.name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            flight:{
                code:"",
                departure_time:"12:00",
                arrival_time:"15:00",
                departure_id:"",
                destination_id:"",
                airline_id:""
            },
            airlines:[],
            airports:[]
        }
    },
    mounted(){
        this.getAirlines(),
        this.getAirports(),
        this.getFlight()
    },
    methods:{
        async getFlight(){
            await this.axios.get(`http://127.0.0.1:8000/api/flights/show/${this.$route.params.id}`).then(response=>{
                const { code, departure_id, destination_id, arrival_time, departure_time, airline_id } = response.data
                this.flight.departure_id = departure_id
                this.flight.destination_id = destination_id
                this.flight.arrival_time = arrival_time
                this.flight.departure_time = departure_time
                this.flight.airline_id = airline_id
                this.flight.code = code
            }).catch(error=>{
                console.log(error)
            })
        },

        async getAirlines(){
            await this.axios.get('http://127.0.0.1:8000/api/airlines').then(response=>{
               this.airlines = response.data
            }).catch(error=>{
                console.log(error)
            })
        },

        async getAirports(){
            await this.axios.get('http://127.0.0.1:8000/api/airports').then(response=>{
               this.airports = response.data
            }).catch(error=>{
                console.log(error)
            })
        }, 

        async update(){
            await this.axios.put(`http://127.0.0.1:8000/api/flights/${this.$route.params.id}`,this.airline).then(response=>{
                this.$router.push({name:"Flights"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>