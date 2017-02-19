<template>
    <div class="panel panel-default">
        <div class="panel-heading">CORE Component</div>
        <div class="panel-body">
            <slot></slot>
            <div class="row">
                <div class="col-xs-12">
                    <div class="input-group">
                      <input type="text" class="form-control" v-model="true_position" placeholder="[120,20]">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                        <i class="glyphicon glyphicon-map-marker"></i>
                        </button>
                      </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <input type="checkbox" class="form-control" v-model="true_is_active"> Widget is active?
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ["is_active", "position"],
        data: function () {
            return {
                true_is_active: this.is_active,
                true_position: this.position
            };
        },
        watch: {
            is_active: function(val) {
                this.true_is_active = val;
            },
            position: function(val) {
                this.true_position = val;
            },
            true_position: function (value) {
                this.$emit("onposition", value);
            },
            true_is_active: function (value) {
                this.$emit("onisactive", value);
            }
        },
        mounted() {
            console.log('Component mounted.');
        }
    }
</script>
