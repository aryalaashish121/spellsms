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
      class="shadow-md border rounded-md"
      :search="search"
      item-key="client_name"
      show-select
    >
      <template v-slot:top>
        <v-toolbar flat class="rounded-md">
          <v-toolbar-title>
            <v-icon class="pb-1" left> mdi-account-remove </v-icon>
            <span class="text-base"> Suspended Accounts </span>
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
        </v-toolbar>
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
export default {
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
          text: "Suspended Users",
          disabled: true,
        },
      ],

      headers: [
        {
          text: "Name",
          align: "start",
          sortable: false,
          value: "client_name",
        },
        { text: "Login ID", value: "login_id" },
        { text: "User Type", value: "user_type" },
        { text: "Actions", value: "actions", sortable: false },
      ],

      customers: [
        {
          client_name: "Aashish Aryal",
          login_id: "aashish99",
          user_type: "Client",
        },
        {
          client_name: "Prakash Bista",
          login_id: "bistap99",
          user_type: "Reseller",
        },
        {
          client_name: "Sunil Shrestha",
          login_id: "bistap99",
          user_type: "Reseller",
        },
      ],
    };
  },
};
</script>