<template>
    <div class="week">
        <div class="teams" v-for="game in games">
            <div class="team">{{ game.home }}/div>
                <div class="score">{{ game.home_score }} : {{ game.away_score }}</div>
                <div class="team">{{ game.away }}</div>
            </div>
        </div>
</template>

<script>
    export default {
        data() {
            return {
                games: []
            }
        },
        created() {
            this.fetchGames()
        },
        methods: {
            fetchGames() {
                fetch('/api/v1/get-games')
                    .then(res => res.json())
                    .then(res => {
                        this.games = res;
                    })
                    .catch(err => console.log(err));

            }
        }
    }
</script>

<style scoped>

</style>
