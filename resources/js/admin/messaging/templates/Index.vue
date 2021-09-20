<template>
  <div data-aos="zoom-out" data-aos-duration="1000" class="p-5 md:px-3 md:py-2">
    <CreateTemplate ref="CreateTemplate"> </CreateTemplate>
    <div>
      <v-breadcrumbs :items="breadcrumbsItems">
        <template v-slot:divider>
          <v-icon>mdi-chevron-right</v-icon>
        </template>
      </v-breadcrumbs>
    </div>
    <v-data-table
      v-model="selected"
      :headers="headers"
      :loading="isLoading"
      :items="templates"
      class="shadow-md border rounded-md"
      :search="search"
      item-key="name"
      show-select
    >
      <template v-slot:top>
        <v-toolbar flat class="rounded-md">
          <v-toolbar-title>
            <v-icon class="pb-1" left> mdi-shape </v-icon>
            <span class="text-base"> Templates </span>
          </v-toolbar-title>
          <v-divider class="mx-4" inset vertical></v-divider>

          <v-text-field
            v-model="search"
            append-icon="mdi-magnify"
            label="Search"
            single-line
            hide-details
            class="text-sm"
          ></v-text-field>
          <v-spacer></v-spacer>

          <v-btn
            dark
            color="green"
            class="capitalize"
            v-on:click="createTemplate"
          >
            <v-icon left small> mdi-shape </v-icon>
            Add New Template
          </v-btn>
        </v-toolbar>
      </template>

      <template v-slot:[`item.actions`]="{ item }">
        <v-flex>
          <v-btn class="ma-1" outlined x-small fab color="indigo">
            <v-icon>mdi-pencil</v-icon>
          </v-btn>
          <v-btn
            class="ma-1"
            outlined
            x-small
            fab
            color="error"
            @click="deleteTemplate(item.id)"
          >
            <v-icon>mdi-delete</v-icon>
          </v-btn>
        </v-flex>
      </template>
    </v-data-table>
  </div>
</template>


<script>
import CreateTemplate from "./Add";
export default {
  components: { CreateTemplate },
  data() {
    return {
      search: "",
      selected: [],
      templates: [],
      isLoading: true,

      breadcrumbsItems: [
        {
          text: "Dashboard",
          disabled: false,
          href: "/",
        },
        {
          text: "Templates",
          disabled: true,
        },
      ],

      headers: [
        {
          text: "Name",
          align: "start",
          sortable: false,
          value: "name",
        },
        { text: "Text", value: "description" },
        { text: "Actions", value: "actions", sortable: false },
      ],
    };
  },

  mounted() {
    const self = this;
    self.getAllTemplates();
    self.$eventBus.$on("templateData", (data) => {
      self.getAllTemplates();
    });
  },

  methods: {
    createTemplate() {
      const self = this;
      self.$refs.CreateTemplate.create();
    },

    async getAllTemplates() {
      const self = this;
      self.isLoading = true;
      try {
        self.url = "/all-templates";
        let response = await self.getAll();
        self.templates = response.data;
        self.isLoading = false;
      } catch (err) {}
    },

    async deleteTemplate(id) {
      const self = this;
      self.url = "/delete-template";

      let response = self.delete(id);
      self.getAllTemplates();
    },
  },
};
</script>