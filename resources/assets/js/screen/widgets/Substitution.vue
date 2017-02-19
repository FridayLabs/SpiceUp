<template>
    <div class="substitution">
        <div class="substitution__container">
            <div class="substitution__team-color"></div>
            <div class="substitution__team-name">
                LIV
            </div>
            <div class="substitution__label">
                Substitution
            </div>
        </div>
        <div class="substitution__player">
            <div class="substitution__player-shadow"></div>
            <div class="substitution__arrow in"></div>
            <div class="substitution__player-name">
                69 Old Guy
            </div>
        </div>
        <div class="substitution__player">
            <div class="substitution__player-shadow"></div>
            <div class="substitution__arrow out"></div>
            <div class="substitution__player-name">
                69 New Guy
            </div>
        </div>
    </div>
</template>

<script>
    export default {
    }
</script>


<style lang="scss" rel="stylesheet/scss">
    body {
        background-color: #0d3625;
    }
    .substitution {
        position: fixed;
        bottom: 10px;
        left: 10px;
        font-size: 20px;
        /*border: 1px solid #e5e5e5;*/
        overflow: hidden;

        &__team-color {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 6px;
            background-color: cornflowerblue;
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
            background-color: #fff;
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