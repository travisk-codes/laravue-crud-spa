<template>
  <form @submit.prevent="addTitle">
    <input type="text" placeholder="New Title" v-model="title" />
  </form>
</template>

<script>
import uuid from "uuid";

export default {
  name: "AddTitle",
  data() {
    return {
      title: "",
    };
  },
  methods: {
    addTitle() {
      this.$emit("add-title", {
        id: uuid.v4(),
        title: this.title,
      });
      this.title = "";
    },
  },
};
</script>