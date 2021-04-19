<template>
<div>
        <div class="modal fade" :class="showassignment ? 'show' : ''" id="assignmentModal" tabindex="-1" role="dialog" :style="showassignment ? 'padding-right: 15px; display: block;' : ''">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Assignment</h5>
                    <button @click="dismissModal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button @click="dismissModal" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
export default {
        props: ["showassignment"],
        methods : {
            dismissModal() {
                this.$emit('assignment-modal-dismiss');
            }
        }
    }
</script>

<style>

</style>