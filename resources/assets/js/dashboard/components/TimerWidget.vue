<template >
    <core-widget v-bind:is_active="is_active" v-bind:position="position" v-bind:title="titleComponent"
                 v-on:onposition="changePosition"
                 v-on:onisactive="changeIsActive">
        <div class="row">
            <div class="col-xs-6">
                <label class="label label-info timerClockBlock">
                    00:00
                </label>
            </div>
            <div class="col-xs-6">
                <label class="label label-info timerClockBlock">
                    + 00:00
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <input type="text" class="form-control">
            </div>
            <div class="col-xs-6">
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <button class="btn btn-primary" @click="start()">
                    <i class="glyphicon glyphicon-play"></i>
                </button>
                <button class="btn btn-primary" @click="pause()">
                    <i class="glyphicon glyphicon-pause"></i>
                </button>
                <button class="btn btn-primary" @click="stop()">
                    <i class="glyphicon glyphicon-stop"></i>
                </button>
            </div>
        </div>
        <button class="btn btn-success" @click="save()">Save widget</button>
    </core-widget>
</template>
<style>
    .timerClockBlock {
        width: 100%;
        display: block;
        font-size: 36px;
    }
</style>
<script>
    export default {
        props: ["stateWidgetId","titleComponent"],
        data: function() {
            return {
                startedTime: null,
                timerFrom: 0,
                action: 'start',
                timerTo: 0,
                is_active: false,
                position: "[0,0]"
            }
        },
        created() {
            console.log("TimerWidget component created");
            axios.get('/widget/get/'+this.stateWidgetId).then(function (r) {
                this.parseData(r.data);
            }.bind(this)).catch(function () {
            });
        },
        methods: {
            changePosition: function (val) {
                this.position = val;
            },
            changeIsActive: function (val) {
                this.is_active = val;
            },
            start: function () {
                this.action = 'start';
                this.save();
            },
            pause: function () {
                this.action = 'pause';
                this.save();
            },
            stop: function () {
                this.action = 'stop';
                this.save();
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
                this.startedTime = data.startedTime;
            },
            cumulateData: function() {
                return {
                    action: this.action,
                    startedTime: this.startedTime,
                    isActive: this.is_active,
                    position: this.position
                };
            }
        },
        mounted() {
            console.log('TimerWidget component mounted.')
        }
    }
</script>
