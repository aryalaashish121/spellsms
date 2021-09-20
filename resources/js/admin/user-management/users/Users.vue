<template>
  <div data-aos="zoom-out" data-aos-duration="1000" class="p-5 md:px-3 md:py-2">
    <AddUser ref="addUser"> </AddUser>
    <div>
      <v-breadcrumbs :items="breadcrumbsItems">
        <template v-slot:divider>
          <v-icon>mdi-chevron-right</v-icon>
        </template>
      </v-breadcrumbs>
    </div>
    <v-data-table
      v-model="selectedList"
      :headers="headers"
      :items="usersList"
      class="shadow-md border rounded-md"
      :search="search"
      item-key="login_id"
      show-select
    >
      <template v-slot:top>
        <v-toolbar flat class="rounded-md">
          <v-toolbar-title>
            <v-icon class="pb-1" left> mdi-account-clock </v-icon>
            <span class="text-base"> Active Users </span>
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

          <v-btn color="primary" @click="addUser" class="capitalize">
            <v-icon left small> mdi-plus </v-icon>
            Add
          </v-btn>

          <v-btn color="secondary" @click="exportData">
            <v-icon left small> mdi-export </v-icon>
          </v-btn>
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
      <template v-slot:[`item.reseller`]="{ item }">
        <v-flex v-if="item.parent">
          {{ item.parent.name }}
        </v-flex>
        <v-flex v-else>N/A</v-flex>
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

<style>
@import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap");
th {
  color: #000;
  font-weight: 700 !important;
}
td {
  font-size: 12px !important;
  font-weight: 400 !important;
}
</style>

<script>
import AddUser from "./Add";
export default {
  components: { AddUser },
  data() {
    return {
      selectedList: [],
      search: "",
      selected: [],
      usersList: [],
      breadcrumbsItems: [
        {
          text: "Dashboard",
          disabled: false,
          href: "/",
        },
        {
          text: "Active Users",
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
        { text: "Login ID", value: "login_id" },
        { text: "User Type", value: "user_type" },
        { text: "Reseller/Upline", value: "reseller" },
        { text: "Actions", value: "actions", sortable: false },
      ],
    };
  },

  mounted() {
    const self = this;
    self.loadUsersData();
    self.$eventBus.$on("usersData", (data) => {
      self.loadUsersData();
    });
  },

  methods: {
    addUser() {
      const self = this;
      self.$refs.addUser.add();
    },

    async loadUsersData() {
      const self = this;
      self.url = "/users";
      let response = await self.getAll();
      self.usersList = response.data;
    },

    exportData() {
      const self = this;
      self.url = "/export-users";
      let response = self.post(self.selectedList);
      console.log(response);
      console.log(self.selectedList);
    },
  },
};
</script>
