<template>
  <div data-aos="zoom-out" data-aos-duration="1000" class="p-5 md:px-3 md:py-2">
    <AddNewContact ref="AddNewContact"> </AddNewContact>
    <EditContact ref="editContact"> </EditContact>
    <UploadFile ref="UploadFile"> </UploadFile>
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
      :loading="loading"
      :items="contacts"
      class="shadow-sm border rounded-xl"
      :search="search"
      item-key="mobile"
      show-select
    >
      <template v-slot:top>
        <v-toolbar flat class="rounded-xl">
          <v-toolbar-title>
            <v-icon class="pb-1" left> mdi-phone </v-icon>
            <span class="text-base"> Contacts </span>
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
            class="text-sm"
          ></v-text-field>
          <v-spacer></v-spacer>

          <v-tooltip top>
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                v-on="on"
                v-bind="attrs"
                dark
                fab
                color="primary"
                small
                v-on:click="addNewContact"
              >
                <v-icon small> mdi-plus </v-icon>
              </v-btn>
            </template>
            <span>Add New Contact</span>
          </v-tooltip>

          <v-tooltip top>
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                dark
                fab
                small
                color="green"
                v-on="on"
                v-bind="attrs"
                class="ml-2"
                v-on:click="uploadFile"
              >
                <v-icon small> mdi-upload </v-icon>
              </v-btn>
            </template>
            <span>Upload File</span>
          </v-tooltip>

          <v-tooltip top>
            <template v-slot:activator="{ on, attrs }">
              <download-excel
                class="btn btn-default ml-2"
                :data="selectedList"
                :fields="excel_file_header"
                name="contacts.xls"
              >
                <v-btn fab dark small v-on="on" v-bind="attrs" color="orange">
                  <v-icon small> mdi-export </v-icon>
                </v-btn>
              </download-excel>
            </template>
            <span>Export as Excel</span>
          </v-tooltip>
        </v-toolbar>
      </template>

      <template v-slot:[`item.contact_group_id`]="{ item }">
        <v-chip small dark color="blue lighten-1">
          {{ item.group.name }}
        </v-chip>
      </template>

      <template v-slot:[`item.actions`]="{ item }">
        <v-flex>
          <v-btn
            class="ma-1"
            x-small
            fab
            dark
            color="green darken-1"
            @click="editContact(item.id)"
          >
            <v-icon small>mdi-pencil</v-icon>
          </v-btn>
          <v-btn
            class="ma-1"
            x-small
            fab
            dark
            color="red darken-1"
            @click="deleteContact(item.id)"
          >
            <v-icon small>mdi-delete</v-icon>
          </v-btn>
        </v-flex>
      </template>
    </v-data-table>
  </div>
</template>
<script>
import AddNewContact from "./Add";
import EditContact from "./Edit.vue";
import UploadFile from "./Upload";
export default {
  components: { AddNewContact, UploadFile, EditContact },
  data() {
    return {
      search: "",
      selected: [],
      contacts: [],
      loading: true,
      selectedList: [],

      breadcrumbsItems: [
        {
          text: "Dashboard",
          disabled: false,
          href: "/",
        },
        {
          text: "Contacts",
          disabled: true,
        },
      ],
      excel_file_header: {
        "Client Name": "name",
        Mobile: "mobile",
        Email: "email",
        Address: "address",
        Note: "note",
        Company: "company",
        Group: {
          field: "group.name",
          callback: (value) => {
            return `${value}`;
          },
        },
      },

      headers: [
        { text: "Mobile", value: "mobile" },
        { text: "Name", value: "name" },
        { text: "Email", value: "email" },
        { text: "Company", value: "company" },
        { text: "Address", value: "address" },
        { text: "NOTE", value: "note" },
        { text: "Group Name", value: "contact_group_id" },
        { text: "Actions", value: "actions", sortable: false },
      ],
    };
  },

  mounted() {
    const self = this;
    self.getAllContacts();
    self.$eventBus.$on("contacts_data", (data) => {
      self.getAllContacts();
    });
  },

  methods: {
    addNewContact() {
      const self = this;
      self.$refs.AddNewContact.create();
    },
    editContact(id) {
      const self = this;
      self.$refs.editContact.edit(id);
    },
    uploadFile() {
      const self = this;
      self.$refs.UploadFile.upload();
    },

    async getAllContacts() {
      const self = this;
      self.loading = true;

      try {
        self.url = "/all-contacts";
        let response = await self.getAll();
        self.contacts = response.data;
        console.log(self.contacts);
        self.loading = false;
      } catch ($err) {}
    },

    async deleteContact(id) {
      const self = this;
      self.url = "/delete-contact";

      let response = self.delete(id);
      self.getAllContacts();
    },
  },
};
</script>
