<template>
    <form @submit.prevent="addTitle">
        <c-input type="text" placeholder="New Title" v-model="title" />
    </form>
</template>

<script>
import { CInput } from "@chakra-ui/vue";
import uuid from "uuid";

export default {
    name: "AddTitle",
    components: {
        CInput
    },
    data() {
        return {
            title: ""
        };
    },
    methods: {
        addTitle() {
            this.$emit("add-title", {
                id: uuid.v4(),
                title: this.title
            });
            this.title = "";
        }
    }
};
</script>
