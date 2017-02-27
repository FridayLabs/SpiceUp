<template >
    <core-widget v-bind:is_active="is_active" v-bind:position="position" v-bind:title="titleComponent"
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
                    {{teams.home.score}}
                </label>
            </div>
            <div class="col-xs-6">
                <label class="label label-info" style="width: 100%;display: block;font-size: 36px;">
                    {{teams.away.score}}
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">{{teams.home.name}}</div>
            <div class="col-xs-6">{{teams.away.name}}</div>
        </div>
        <div class="row">
            <div class="col-xs-12">
            <table class="table table-striped table-bordered table-condensed" style="font-size: 10px;">
                <tr v-for="(goal, index) in goal_list">
                    <td>{{goal.time}}</td>
                    <td>{{goal.fullScore}}</td>
                    <td>{{goal.team.name}}</td>
                    <td>{{goal.player.name}}</td>
                    <!--<td>-->
                        <!--<button class="btn btn-warning btn-xs">-->
                            <!--<i class="glyphicon glyphicon-edit"></i>-->
                        <!--</button>-->
                    <!--</td>-->
                    <td>
                        <button class="btn btn-danger btn-xs" v-if="index == 0" @click="removeLastGoal">
                            <i class="glyphicon glyphicon-remove"></i>
                        </button>
                    </td>
                </tr>
            </table>
            </div>
        </div>
        <modal v-if="showModal" @close="showModal = false" @add="saveGoal">
            <h3 slot="header">New goal to team "{{newgoal.teamType}}"</h3>
            <div slot="body">
                <div class="row">
                    <div class="col-xs-3">
                        <input type="text" v-model="newgoal.time" class="form-control" style="width: 100%;">
                    </div>
                    <div class="col-xs-9">
                        <select v-model="newgoal.player" class="form-control">
                            <option v-for="(player, index) in getAllPlayers()" v-bind:value="player">
                                {{index}}) {{player.last_name}} {{player.first_name}} ({{player.position}})
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </modal>
        <button class="btn btn-success" @click="save()">Save widget</button>
    </core-widget>
</template>

<script>

    export default {
        props: ["stateWidgetId","titleComponent"],
        data: function() {
            let teams = {
                home: {
                    name: "Team Home",
                    score: 0,
                    players: []
                },
                away: {
                    name: "Team Home",
                    score: 0,
                    players: []
                }
            };
            return {
                teams: teams,
                newgoal: {
                    teamType: "home",
                    player: null,
                    time: ""
                },
                goal_list: [],
                is_active: false,
                position: "[0,0]",
                showModal: false,
                data: {}
            }
        },
        created() {
            console.log("ScoreWidget component created");
            axios.get('/widget/get/'+this.stateWidgetId).then(function (r) {
                this.parseData(r.data);
            }.bind(this)).catch(function () {
            });
        },
        methods: {
            getAllPlayers: function() {
                let types = ["home","away"];
                if(this.newgoal.teamType == "away") {
                    types = ["away","home"];
                }
                let players = this.teams[types[0]].players;
                players = players.concat(this.teams[types[1]].players);
                console.log(players);
                return players;
            },
            saveGoal: function() {
                this.showModal = false;
                this.teams[this.newgoal.teamType].score++;
                let fullScore = this.teams.home.score + ":" + this.teams.away.score;
                this.goal_list.unshift({
                    time: this.newgoal.time + "'",
                    team: this.teams[this.newgoal.teamType],
                    player: this.newgoal.player,
                    fullScore: fullScore
                });
            },
            addGoal: function (teamType) {
                this.newgoal.teamType = teamType;
                this.showModal = true;
            },
            removeLastGoal: function() {
                let lenght = this.goal_list.length;
                this.goal_list.splice(lenght-1, 1);
            },
            changePosition: function (val) {
                this.position = val;
            },
            changeIsActive: function (val) {
                this.is_active = val;
            },
            save: function () {
                axios.post('/widget/save/'+this.stateWidgetId, this.cumulateData()).then(function (r) {
                    console.log(r);
                }).catch(function () {
                    console.log("Error saving");
                });
            },
            parseData: function(data) {
                this.is_active = data.isActive;
                this.position = data.position;
                this.teams = data.teams;
                this.goal_list = data.goalList;
            },
            cumulateData: function() {
                return {
                    goalList: this.goal_list,
                    teams: this.teams,
                    isActive: this.is_active,
                    position: this.position
                };
            }
        },
        mounted() {
            console.log('ScoreWidget component mounted.')
        }
    }
</script>
