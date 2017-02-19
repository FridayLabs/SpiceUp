<template>
    <div class="panel panel-default">
        <div class="panel-heading">CORE Component</div>
        <div class="panel-body">
            <slot></slot>
            <div class="row">
                <div class="col-xs-12">
                    <div class="input-group">
                      <input type="text" class="form-control" v-model="_position" placeholder="[120,20]">
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
                    <input type="text" class="form-control" v-model="_is_active">
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
                _position: this.position,
                _is_active: this.is_active
            };
        },
        watch: {
            _position: function (val) {
                this.position = this._position;
                this.$emit('position');
            }
        },
        mounted() {
            console.log('Component mounted.');
        }
    }
</script>
