<template>
  <div>
    <ul>
      <li :key="title.id" v-for="title in titles">
        {{ title.title }}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "App",
  data() {
    return {
      titles: [],
    };
  },
  mounted() {
    axios.get("http://homestead.test/api/title").then((resp) => {
      this.titles = resp.data.data;
    });
  },
};
</script>
