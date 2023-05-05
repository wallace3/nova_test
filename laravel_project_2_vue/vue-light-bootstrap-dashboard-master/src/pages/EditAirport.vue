<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Airport</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" v-model="airport.name">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Code</label>
                                    <input type="text" class="form-control" v-model="airport.code">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" v-model="airport.city">
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
            airport:{
                name:"",
                code:"",
                city:"",
                _method:"patch"
            }
        }
    },
    mounted(){
        this.getAirport()
    },
    methods:{
        async getAirport(){
            await this.axios.get(`http://127.0.0.1:8000/api/airports/show/${this.$route.params.id}`).then(response=>{
                const { name, code, city } = response.data
                this.airport.name = name
                this.airport.code = code
                this.airport.city = city
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            await this.axios.put(`http://127.0.0.1:8000/api/airports/${this.$route.params.id}`,this.airport).then(response=>{
                this.$router.push({name:"Airports"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>