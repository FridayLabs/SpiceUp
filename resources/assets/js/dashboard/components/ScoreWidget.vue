<template >
    <core-widget v-bind:is_active="is_active" v-bind:position="position">
        <div class="row">
            <div class="col-xs-6">
            <a class="btn btn-primary btn-sm" href="#">
            <i class="glyphicon glyphicon-plus"></i>
            </a>
            </div>
            <div class="col-xs-6">
            <a class="btn btn-primary btn-sm" href="#">
            <i class="glyphicon glyphicon-plus"></i>
            </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
            <input class="form-control" value="0">
            </div>
            <div class="col-xs-6">
            <input class="form-control" value="0">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
            <a class="btn btn-primary btn-sm" href="#">
            <i class="glyphicon glyphicon-minus"></i>
            </a>
            </div>
            <div class="col-xs-6">
            <a class="btn btn-primary btn-sm" href="#">
            <i class="glyphicon glyphicon-minus"></i>
            </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">Team Home</div>
            <div class="col-xs-6">Team Away</div>
        </div>
        <div class="row">
            <div class="col-xs-12">
            <table class="table table-bordered table-condensed">
                <tr>
                    <td>12'</td>
                    <td>Team Home</td>
                    <td>Player #1</td>
                    <td>
                        <a href="#" class="btn bnt-warning btn-sm">
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a href="#" class="btn bnt-danger btn-sm">
                            <i class="glyphicon glyphicon-remove"></i>
                        </a>
                    </td>
                </tr>
            </table>
            </div>
        </div>
        <button id="show-modal" @click="showModal = true">Show Modal</button>
        <button @click="save()">Save</button>
        <modal v-if="showModal" @close="showModal = false">
            <!--
              you can use custom content here to overwrite
              default content
            -->
            <h3 slot="header">custom scoreeee header</h3>
        </modal>
    </core-widget>
</template>

<script>

    export default {
        props: ["stateWidgetId"],
        data: function() {
            return {
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
