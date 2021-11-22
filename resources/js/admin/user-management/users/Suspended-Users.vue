<template>
  <div data-aos="zoom-out" data-aos-duration="1000" class="p-5 md:px-3 md:py-2">
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
      :items="customers"
      class="shadow border rounded-xl"
      :search="search"
      item-key="client_name"
      show-select
      :loading="loading"
    >
      <template v-slot:top>
        <v-toolbar flat class="rounded-xl">
          <v-toolbar-title>
            <v-icon class="pb-1" left> mdi-account-remove </v-icon>
            <span class="text-base"> Suspended Accounts </span>
          </v-toolbar-title>
          <v-divider class="mx-4" inset vertical></v-divider>

          <v-text-field
            v-model="search"
            outlined
            dense
            prepend-inner-icon="mdi-magnify"
            label="Search"
            single-line
            hide-details
            class="text-sm shadow-inner"
          ></v-text-field>
          <v-spacer></v-spacer>
        </v-toolbar>
      </template>
      <template v-slot:[`item.user_type`]="{ item }">
        <v-flex v-if="item.roles[0]">
          <div v-for="role in item.roles" :key="role.id">
            {{ role.name }}
          </div>
        </v-flex>
        <v-flex v-else>N/A</v-flex>
      </template>
      <template v-slot:[`item.actions`]="{}">
        <v-flex>
          <v-btn class="ma-1" outlined x-small fab color="indigo">
            <v-icon>mdi-pencil</v-icon>
          </v-btn>
        </v-flex>
      </template>
    </v-data-table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      search: "",
      selected: [],
      loading: false,
      customers: [],
      breadcrumbsItems: [
        {
          text: "Dashboard",
          disabled: false,
          href: "/",
        },
        {
          text: "Suspended Users",
          disabled: true,
        },
      ],

      headers: [
        {
          text: "Client Name",
          align: "start",
          sortable: false,
          value: "name",
        },
        { text: "Company Name", value: "company_name" },
        { text: "Address", value: "address" },
        { text: "User Type", value: "user_type" },
        { text: "Actions", value: "actions", sortable: false },
      ],
    };
  },
  mounted() {
    const self = this;
    self.loadSuspenderUsers();
  },
  methods: {
    async loadSuspenderUsers() {
      const self = this;
      self.url = "/suspended-users";
      self.loading = true;

      let response = await self.getAll();
      self.customers = response.data;
      self.loading = false;
    },
  },
};
</script>