<template>
  <li>
    <button v-on:click="deleteTitle(title.id)">X</button>
    <span>{{ title.title }}</span>
  </li>
</template>

<script>
export default {
  name: "Child",
  props: {
    title: Object,
  },
  methods: {
    deleteTitle(id) {
      this.$emit("delete-title", id);
    },
  },
};
</script>