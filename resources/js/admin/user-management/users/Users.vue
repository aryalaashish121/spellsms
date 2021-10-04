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
      @click:row="openControlPanel"
      v-model="selectedList"
      :headers="headers"
      :items="usersList"
      class="shadow-md border rounded-md cursor-pointer"
      :search="search"
      item-key="login_id"
      show-select
      loading="usertableLoading"
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

          <v-btn fab small color="primary" @click="addUser" class="capitalize">
            <v-icon small> mdi-plus </v-icon>
          </v-btn>

          <download-excel
            class="btn btn-default ml-1"
            :data="selectedList"
            :fields="excel_file_header"
            name="users.xls"
          >
            <v-btn fab small dark color="orange">
              <v-icon small> mdi-export </v-icon>
            </v-btn>
          </download-excel>
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
      usertableLoading:false,
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
      excel_file_header: {
        "Client Name": "name",
        "Company Name": "name",
        Address: "address",
        Mobile: "phone",
        LoginID: "login_id",
        Email: "email",
        "User type": {
          field: "roles[0].name",
          callback: (value) => {
            return `${value}`;
          },
        },
        Reseller: {
          field: "parent.name",
          callback: (value) => {
            return `Name: - ${value}`;
          },
        },
      },
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

    openControlPanel(item, row) {
      const self = this;

      self.$router.push({
        name: "admin.accountControlPanel",
        params: { id: item.slug },
      });
    },

    async loadUsersData() {
      const self = this;
      self.usertableLoading = true;
      self.url = "/users";
      let response = await self.getAll();
      self.usersList = response.data;
      self.usertableLoading = false;
      console.log(this.usersList);
    },

    exportData() {
      const self = this;
      self.url = "/export-users";
      let response = self.exportExcel(self.selectedList);
      console.log(response);
      console.log(self.selectedList);
    },

    exportNow() {},
  },
};
</script>
