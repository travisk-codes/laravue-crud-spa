<template>
  <li>
    <button v-on:click="deleteTitle(title.id)">X</button>
    <form v-if="isActive" @submit.prevent="editTitle(title.id)">
      <input type="text" v-model="text" v-on:blur="editTitle(title.id)" />
    </form>
    <span v-else v-on:click="toggleActive">{{ text }}</span>
  </li>
</template>

<script>
export default {
  name: "Child",
  props: {
    title: Object,
  },
  data() {
    return {
      isActive: false,
      text: this.title.title,
    };
  },
  methods: {
    deleteTitle(id) {
      this.$emit("delete-title", id);
    },
    toggleActive() {
      this.isActive = !this.isActive;
    },
    editTitle(id) {
      this.$emit("edit-title", {
        id,
        title: this.text,
      });

      this.toggleActive();
    },
  },
};
</script>