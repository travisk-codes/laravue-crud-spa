<template>
    <c-box bg="pink" w="100%" m="4">
        <c-list>
            <Title
                v-for="title in titles"
                :key="title.id"
                :title="title"
                v-on:delete-title="deleteTitle"
                v-on:edit-title="editTitle"
            />
        </c-list>
        <AddTitle v-on:add-title="addTitle" />
    </c-box>
</template>

<script>
import Title from "./Title";
import AddTitle from "./AddTitle";
import { CBox, CList, CListItem } from "@chakra-ui/vue";

export default {
    name: "App",
    components: {
        Title,
        AddTitle,
        CBox,
        CList
    },
    data() {
        return {
            titles: [],
            activeTitle: null
        };
    },
    async mounted() {
        const resp = await fetch(
            "https://laravue-crud-spa.travisk.info/api/title"
        );
        const json = await resp.json();
        this.titles = json.data;
    },
    methods: {
        async deleteTitle(id) {
            this.titles = this.titles.filter(title => title.id !== id);
            await fetch(
                `https://laravue-crud-spa.travisk.info/api/title/${id}`,
                {
                    method: "DELETE"
                }
            );
        },
        async addTitle(newTitle) {
            this.titles = [...this.titles, newTitle];
            await fetch("https://laravue-crud-spa.travisk.info/api/title", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(newTitle)
            });
        },
        async editTitle(title) {
            await fetch(
                `https://laravue-crud-spa.travisk.info/api/title/${title.id}`,
                {
                    method: "PUT",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(title)
                }
            );
        }
    }
};
</script>

<style>
* {
    box-sizing: border-box;
}
</style>
