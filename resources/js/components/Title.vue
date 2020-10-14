<template>
    <li>
        <c-input
            v-show="isActive"
            ref="input"
            type="text"
            v-model="text"
            v-on:blur="editTitle(title.id)"
            @mouseup="mouseUp"
        />
        <button v-show="isActive" @mousedown="deleteTitle(title.id)">X</button>
        <span v-show="!isActive" @mousedown="toggleActive">{{ text }}</span>
    </li>
</template>

<script>
import { CInput } from "@chakra-ui/vue";

export default {
    name: "Child",
    components: {
        CInput
    },
    props: {
        title: Object,
        active: Boolean
    },
    data() {
        return {
            isActive: false,
            text: this.title.title
        };
    },
    methods: {
        deleteTitle(id) {
            this.$emit("delete-title", id);
        },
        toggleActive() {
            this.isActive = !this.isActive;
        },
        mouseUp() {
            this.$refs.input.$el.focus();
        },
        editTitle(id) {
            this.$emit("edit-title", {
                id,
                title: this.text
            });
            this.toggleActive();
        }
    }
};
</script>

<style scoped>
li {
    display: flex;
}
input {
    flex: 1 1 auto;
    font-family: "Nunito";
}
button {
    flex: 1 1 2.5rem;
    height: 2.5rem;
}
span {
    display: flex;
    flex: 1 1 100%;
    height: 2.5rem;
    padding-left: 1rem;
    padding-right: 1rem;
    align-items: center;
}
</style>
