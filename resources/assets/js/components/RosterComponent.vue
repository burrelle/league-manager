<template>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <select v-model="team">
                    <option v-for="team in teams" :value=team.id :key="team.id">{{team.teamName}}</option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data()  {
        return {
            teams: {}
        }
    },
    mounted() {
        axios.get('/api/teams').then(response => {
            this.teams = response.data
        }).catch(error => {
            console.log(err);
        });
    }
}
</script>

<style>

</style>
