<template>
    <div class="container">
        <header>Assign Participant to Team</header>
        <form class="" method="post" @submit.prevent="changeTeam">
        <div class="row">
            <div class="col-sm">
                <select v-model="participant">
                    <option value="">Select a participant</option>
                    <option v-for="participant in participants" :key="participant.id" :value="participant.id">{{participant.firstName}} {{participant.lastName}} </option>
                </select>
            </div>
            <div class="col-sm">
                <select v-model="team">
                    <option value="">No Team</option>
                    <option v-for="team in teams" :value=team.id :key="team.id">{{team.teamName}}</option>
                </select>
            </div>
            <div class="col-sm">
                <button type="submit" class="btn btn-primary btn-sm">Assign</button>
            </div>
        </div>
        </form>
    </div>
</template>

<script>
    import swal from 'sweetalert';
    export default {
        data() {
            return {
                participants: {},
                participant: '',
                teams: {},
                team: '',
            };
        },
        mounted() {
            axios
                .get("/api/participants")
                .then(result => {
                    this.participants = result.data;
                })
                .catch(err => {
                    console.log(err);
                });
            axios
                .get("/api/teams")
                .then(result => {
                    this.teams = result.data;
                })
                .catch(err => {
                    console.log(err);
                });
        },
        methods: {
            changeTeam: function() {
                axios.post("/api/teams/" + this.team + "/captain/" + this.participant).then((result) => {
                    swal({
                        title: "Player added to team",
                        text: "Well done!",
                        icon: "success",
                    });
                }).catch(err => {
                    console.log(err);
                })
            }
        }
    };

</script>

<style>


</style>
