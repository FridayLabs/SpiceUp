<template >
    <core-widget v-bind:is_active="is_active" v-bind:position="position"
                 v-on:onposition="changePosition"
                 v-on:onisactive="changeIsActive">
        <div class="row">
            <div class="col-xs-6">
            <button class="btn btn-primary btn-sm" style="width: 100%;" @click="addGoal('home')">
            <i class="glyphicon glyphicon-plus"></i>
            </button>
            </div>
            <div class="col-xs-6">
            <button class="btn btn-primary btn-sm" style="width: 100%;" @click="addGoal('away')">
            <i class="glyphicon glyphicon-plus"></i>
            </button>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <label class="label label-info" style="width: 100%;display: block;font-size: 36px;">
                    {{score_home}}
                </label>
            </div>
            <div class="col-xs-6">
                <label class="label label-info" style="width: 100%;display: block;font-size: 36px;">
                    {{score_away}}
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">{{team_home.name}}</div>
            <div class="col-xs-6">{{team_away.name}}</div>
        </div>
        <div class="row">
            <div class="col-xs-12">
            <table class="table table-bordered table-condensed">
                <tr v-for="goal in goal_list">
                    <td>{{goal.time}}</td>
                    <td>{{goal.team.name}}</td>
                    <td>{{goal.player.name}}</td>
                    <td>
                        <button class="btn bnt-warning btn-sm">
                            <i class="glyphicon glyphicon-edit"></i>
                        </button>
                    </td>
                    <td>
                        <button class="btn bnt-danger btn-sm">
                            <i class="glyphicon glyphicon-remove"></i>
                        </button>
                    </td>
                </tr>
            </table>
            </div>
        </div>
        <button class="button button-green" @click="save()">Save</button>
        <modal v-if="showModal" @close="showModal = false">
            <h3 slot="header">New goal to team "{{active_team}}"</h3>
            <div slot="body">
                <div>
                    <input type="text" v-model="newgoal_time" class="form-control">
                </div>
                <div>
                    <select v-model="newgoal_player" class="form-control">
                        <option v-for="player in player_list" v-bind:value="player.id">
                            {{player.name}}
                        </option>
                    </select>
                </div>
            </div>
        </modal>
    </core-widget>
</template>

<script>

    export default {
        props: ["stateWidgetId"],
        data: function() {
            return {
                team_home: {
                    name: "Team HOME"
                },
                team_away: {
                    name: "Team AWAY"
                },
                score_home: 0,
                active_team: 0,
                newgoal_player: 0,
                newgoal_time: 0,
                score_away: 0,
                goal_list: [
                    {
                        time: "12'",
                        team: {
                            name: "Team HOMUS"
                        },
                        player: {
                            name: "Ivan Semenov"
                        }
                    }
                ],
                player_list: [
                    {
                        id: 1,
                        name: "Player 1"

                    },
                    {
                        id: 2,
                        name: "Player 2"

                    },
                    {
                        id: 3,
                        name: "Player 3"

                    }
                ],
                is_active: false,
                position: "[0,0]",
                showModal: false,
                data: {}
            }
        },
        created() {
            console.log("created");
            axios.get('/widget/get/'+this.stateWidgetId).then(function (r) {
                this.is_active = r.data.is_active;
                this.position = r.data.position;
            }.bind(this)).catch(function () {
            });
        },
        methods: {
            addGoal: function (team) {
                this.active_team = team;
                this.showModal = true;
            },
            changePosition: function (val) {
                this.position = val;
            },
            changeIsActive: function (val) {
                this.is_active = val;
            },
            save: function () {
                axios.post('/widget/save/'+this.stateWidgetId, {
                    is_active: this.is_active,
                    position: this.position,
                    data: this.data
                }).then(function (r) {
                    console.log(r);
                }).catch(function () {

                });
            }
        },
        mounted() {
            console.log('COLOLOLOLO', this.stateWidgetId);
            console.log('Component mounted.')
        }
    }
</script>
