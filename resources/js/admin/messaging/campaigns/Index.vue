<template>
  <div data-aos="zoom-out" data-aos-duration="1000" class="p-5 md:px-3 md:py-2">
    <CreateCampaign ref="CreateCampaign"> </CreateCampaign>
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
      :items="campaigns"
      class="shadow-md border rounded-md"
      :search="search"
      item-key="name"
      show-select
    >
      <template v-slot:top>
        <v-toolbar flat class="rounded-md">
          <v-toolbar-title>
            <v-icon class="pb-1" left> mdi-sign-text </v-icon>
            <span class="text-base"> Campaigns </span>
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
            v-on:click="CreateCampaign"
          >
            <v-icon left small> mdi-sign-text </v-icon>
            Add New Campaign
          </v-btn>
        </v-toolbar>
      </template>

      <template v-slot:[`item.status`]="{ item }">
        <v-icon size="20" color="primary" v-if="item.status == 'default'">
          mdi-check-circle-outline
        </v-icon>

        <v-icon v-else color="error" size="20">
          mdi-close-circle-outline
        </v-icon>
      </template>

      <template v-slot:[`item.actions`]="{}">
        <v-flex>
          <v-btn class="ma-1" outlined x-small fab color="indigo">
            <v-icon>mdi-pencil</v-icon>
          </v-btn>
          <v-btn class="ma-1" outlined x-small fab color="error">
            <v-icon>mdi-delete</v-icon>
          </v-btn>
        </v-flex>
      </template>
    </v-data-table>
  </div>
</template>

<script>
import CreateCampaign from "./Add";
export default {
  components: { CreateCampaign },
  data() {
    return {
      search: "",
      selected: [],

      breadcrumbsItems: [
        {
          text: "Dashboard",
          disabled: false,
          href: "/",
        },
        {
          text: "My Campaigns",
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
        { text: "Category", value: "category" },
        { text: "Default Status", value: "status" },
        { text: "Actions", value: "actions", sortable: false },
      ],

      campaigns: [
        {
          name: "Admission Open",
          category: "Education",
          status: "default",
        },
        {
          name: "Job Vacancy",
          category: "Carrers & Jobs",
          status: "not-default",
        },
      ],
    };
  },

  methods: {
    CreateCampaign() {
      const self = this;
      self.$refs.CreateCampaign.create();
    },
  },
};
</script>