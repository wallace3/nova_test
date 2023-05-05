<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Airline</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" v-model="airline.name">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Code</label>
                                    <input type="text" class="form-control" v-model="airline.code">
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
            airline:{
                name:"",
                code:"",
                _method:"patch"
            }
        }
    },
    mounted(){
        this.getAirport()
    },
    methods:{
        async getAirport(){
            await this.axios.get(`http://127.0.0.1:8000/api/airlines/show/${this.$route.params.id}`).then(response=>{
                const { name, code, city } = response.data
                this.airline.name = name
                this.airline.code = code
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            await this.axios.put(`http://127.0.0.1:8000/api/airlines/${this.$route.params.id}`,this.airline).then(response=>{
                this.$router.push({name:"Airlines"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>