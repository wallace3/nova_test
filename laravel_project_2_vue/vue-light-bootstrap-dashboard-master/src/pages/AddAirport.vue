<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add airport</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create">
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
                                <button type="submit" class="btn btn-primary">Save</button>
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
    name:"add-category",
    data(){
        return {
            airport:{
                name:"",
                code:"",
                city:""
            }
        }
    },
    methods:{
        async create(){
            await this.axios.post('http://127.0.0.1:8000/api/airports',this.airport).then(response=>{
                this.$router.push({name:"Airports"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>