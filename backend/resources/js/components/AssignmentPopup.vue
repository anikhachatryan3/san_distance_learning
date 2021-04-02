<template>
<div>
    <vs-dialog>
        <p>
            {{text}}
        </p>
        <p>
            {{savedText}}
        </p>
    </vs-dialog>
</div>


</template>

<script>
export default {
    name: "AssignmentPopup",
    data() {
        return {
            savedText: "This is the saved text",
            text: "",
        }
    },
    created() {

    }
}

</script>

<style scoped>

</style>
