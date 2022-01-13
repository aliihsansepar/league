<template>
    <button :class="disableButton ? 'button button-secondary' : 'button button-green' " :disabled="disableButton" @click="generateTeams()">Generate Fixture</button>
</template>

<script>
    import {eventBus} from "../app";

    export default {
        data() {
            return {
                disableButton: false,
            }
        },
        methods: {
            generateTeams() {
                fetch('/api/v1/generate-teams')
                    .then(res => res.json())
                    .then(res => {
                        eventBus.$emit('teams', res.teams);
                        eventBus.$emit('games', res.games);
                        this.disableButton = true;
                    })
            }
        }
    }
</script>
