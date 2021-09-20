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

      <template v-slot:[`item.actions`]="{item}">
        <v-flex>
          <v-btn class="ma-1" outlined x-small fab color="indigo">
            <v-icon>mdi-pencil</v-icon>
          </v-btn>
          <v-btn class="ma-1" outlined x-small fab color="error" @click="deleteManager(item.id)">
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
      accountManagers: [],

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
        { text: "Mobile", value: "phone" },
        { text: "WhtasApp", value: "whatsapp" },
        { text: "Skype", value: "facebook_url" },
        { text: "Created", value: "created_at" },
        { text: "Actions", value: "actions", sortable: false },
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

    async getAllAccountManagers(){
      const self = this;
      self.url = "/account-managers";
      let response = await self.getAll();
      self.accountManagers = response.data;
      console.log("hello");
      console.log(response.data);
    },

    deleteManager(id){
      const self = this;
      self.url = "delete/account-manager";
     
      let response = self.delete(id);
    }
  },
};
</script>