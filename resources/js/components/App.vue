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
    <AddTitle v-on:add-title="addTitle" />
  </div>
</template>

<script>
import Title from "./Title";
import AddTitle from "./AddTitle";

export default {
  name: "App",
  components: {
    Title,
    AddTitle,
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
    async addTitle(newTitle) {
      this.titles = [...this.titles, newTitle];
      await fetch("http://homestead.test/api/title", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(newTitle),
      });
    },
  },
};
</script>
