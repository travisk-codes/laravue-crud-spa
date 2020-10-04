<template>
  <div>
    <ul>
      <Title
        v-for="title in titles"
        :key="title.id"
        :title="title"
        v-on:delete-title="deleteTitle"
      />
    </ul>
  </div>
</template>

<script>
import Title from "./Title";

export default {
  name: "App",
  components: {
    Title,
  },
  data() {
    return {
      titles: [],
      activeTitle: null,
    };
  },
  async mounted() {
    const resp = await fetch("http://homestead.test/api/title");
    const json = await resp.json();
    this.titles = json.data;
  },
  methods: {
    async deleteTitle(id) {
      this.titles = this.titles.filter((title) => title.id !== id);
      await fetch(`http://homestead.test/api/title/${id}`, {
        method: "DELETE",
      });
    },
  },
};
</script>
