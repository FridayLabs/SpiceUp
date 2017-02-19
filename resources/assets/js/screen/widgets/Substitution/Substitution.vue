<template>
    <div class="substitution">
        <div class="substitution__container">
            <div class="substitution__team-color" v-bind:style="{ backgroundColor: teamData[substitutionData.team].color1 }"></div>
            <div class="substitution__team-name">
                {{teamData[substitutionData.team].nameShort}}
            </div>
            <div class="substitution__label">
                Substitution
            </div>
        </div>
        <div class="substitution__player">
            <div class="substitution__player-shadow"></div>
            <div class="substitution__arrow in"></div>
            <div class="substitution__player-name">
                {{substitutionData.playerIn}}
            </div>
        </div>
        <div class="substitution__player">
            <div class="substitution__player-shadow"></div>
            <div class="substitution__arrow out"></div>
            <div class="substitution__player-name">
                {{substitutionData.playerOut}}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
    	props: ['substitutionData', 'teamData']
    }
</script>


<style lang="scss" rel="stylesheet/scss">
    @import "../../../../sass/screen/variables.scss";

    .substitution {
        display: none;
        position: fixed;
        bottom: 10px;
        left: 10px;
        font-size: 20px;
        overflow: hidden;

        &__team-color {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 6px;
            left: 0;
        }

        &__container {
            padding-left: 6px;
            overflow: hidden;
            position: relative;
        }

        &__team-name, &__label {
            padding: 5px 10px;
            float: left;
            background-color: $primary_color;
            color: $black;
        }

        &__label {
            background-color: $secondary_color;
            color: $black;
        }

        &__player-name {
            float: left;
            padding: 0 5px;
            position: relative;
        }

        &__arrow {
            width: 10px;
            float: left;
            margin: 0 10px;
            margin-top: 3px;
        }

        &__arrow:after {
            content: '';
            display: block;
            border: 10px solid transparent;
        }

        &__arrow.in:after {
            border-left-color: #000;
        }

        &__arrow.out:after {
            border-right-color: #000;
            margin-left: -10px;
        }

        &__label {
            box-shadow: 0px 1px 5px 1px rgba(0, 0, 0, 0.5);
        }

        &__player {
            position: relative;
            overflow: hidden;
            margin-left: 6px;
            background-color: #fff;
            padding: 5px 10px;
        }

        &__player-shadow {
            position: absolute;
            width: 100%;
            height: 1px;
            top: -1px;
            left: 0;
            box-shadow: 0px 0px 5px 1px rgba(0, 0, 0, 0.5);
        }
    }
</style>