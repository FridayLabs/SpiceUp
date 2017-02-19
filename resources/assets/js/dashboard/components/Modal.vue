<template>
    <transition name="modal">
        <div class="modal" style="display: block;">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <slot name="header">
                            default header
                        </slot>
                    </div>

                    <div class="modal-body">
                        <slot name="body">
                            default body
                        </slot>
                    </div>

                    <div class="modal-footer">
                        <slot name="footer">
                            <button class="btn btn-success" @click="$emit('add')">
                                Add
                            </button>
                            <button class="btn btn-default" @click="$emit('close')">
                                Cancel
                            </button>
                        </slot>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        mounted() {
            console.log('MODAL mounted.')
        }
    }
</script>
