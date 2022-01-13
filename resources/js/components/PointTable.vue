<template>
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Team</th>
            <th>W</th>
            <th>D</th>
            <th>L</th>
            <th>P</th>
            <th>Av.</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="team in teams">
            <td>{{ team.order }}</td>
            <td>{{ team.name }}</td>
            <td>{{ team.win }}</td>
            <td>{{ team.deal }}</td>
            <td>{{ team.loss }}</td>
            <td>{{ team.point }}</td>
            <td>{{ team.average }}</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
    import {eventBus} from "../app";
    export default {
        data() {
            return {
                teams: []
            }
        },
        created() {
            this.fetchTeams();
        },
        methods: {
            fetchTeams() {
                fetch('/api/v1/get-teams')
                    .then(res => res.json())
                    .then(res => {
                        this.teams = res;
                    })
                    .catch(err => console.log(err));
            }
        },
        mounted() {
            eventBus.$on('teams', (teams) => {
                this.teams = teams
            })
        }
    }
</script>

