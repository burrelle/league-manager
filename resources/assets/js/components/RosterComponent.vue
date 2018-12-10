<template>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <ul style="list-style-type: none;">
                    <li v-for="team in teams" :key="team.id">
                        <a :href="'/api/teams/' + team.id + '/roster'"> {{team.teamName}} </a>
                    </li>
                </ul>
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
