<template>
    <button class="button button-green" :hidden="!showButton" @click="generateTeams()">Generate Teams</button>
</template>

<script>
    import {eventBus} from "../app";

    export default {
        data() {
            return {
                showButton: true
            }
        },
        methods: {
            generateTeams() {
                fetch('/api/v1/generate-teams')
                    .then(res => res.json())
                    .then(res => {
                        // this.showButton = false
                        eventBus.$emit('teams', res);
                    })
            }
        }
    }
</script>
