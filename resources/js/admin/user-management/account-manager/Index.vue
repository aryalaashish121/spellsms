<template>
  <div data-aos="zoom-out" data-aos-duration="1000" class="p-5 md:px-3 md:py-2">
    <CreateAccountManager ref="createAccountManager"> </CreateAccountManager>
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
      :items="accountManagers"
      class="shadow-md border rounded-md"
      :search="search"
      item-key="name"
      show-select
    >
      <template v-slot:top>
        <v-toolbar flat class="rounded-md">
          <v-toolbar-title>
            <v-icon class="pb-1" left> mdi-account-tie </v-icon>
            <span class="text-base"> Account Managers </span>
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
            color="secondary"
            class="capitalize"
            v-on:click="createAccountManager"
          >
            <v-icon left small> mdi-account-tie </v-icon>
            Add Account Manager
          </v-btn>
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
import CreateAccountManager from "./Add";
export default {
  components: { CreateAccountManager },
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
          text: "Account Managers",
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
        { text: "Email", value: "email" },
        { text: "Mobile", value: "mobile" },
        { text: "WhtasApp", value: "whats_app" },
        { text: "Skype", value: "skype" },
        { text: "Created", value: "created_at" },
        { text: "Actions", value: "actions", sortable: false },
      ],

      accountManagers: [
        {
          name: "Prakash Bista",
          email: "bistap@gmail.com",
          mobile: "987654321",
          whats_app: "987654321",
          skype: "prakash22",
          created_at: "Wed, 15th Sep 2021 11:44 AM",
        },
        {
          name: "Nikesh Magar",
          email: "nikeshm@gmail.com",
          mobile: "987654323",
          whats_app: "987654323",
          skype: "nikesh99",
          created_at: "Mon, 13th Sep 2021 10:13 AM",
        },
      ],
    };
  },

  mounted() {
    const self = this;
    self.getAllAccountManagers();
  },

  methods: {
    createAccountManager() {
      const self = this;
      self.$refs.createAccountManager.create();
    },

    getAllAccountManagers(){
      const self = this;
      self.url = "/all-account-managers";
      let response = self.getAll();
      self.accountManagers = response.data;
    }
  },
};
</script>