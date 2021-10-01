<template>
    <div
        data-aos="zoom-out"
        data-aos-duration="1000"
        class="p-5 md:px-3 md:py-2"
    >
        <AddNewContact ref="AddNewContact"> </AddNewContact>
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
            class="shadow-md border rounded-md"
            :search="search"
            item-key="mobile"
            show-select
        >
            <template v-slot:top>
                <v-toolbar flat class="rounded-md">
                    <v-toolbar-title>
                        <v-icon class="pb-1" left> mdi-phone </v-icon>
                        <span class="text-base"> Contacts </span>
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
                        small
                        class="capitalize"
                        v-on:click="addNewContact"
                    >
                        <v-icon left small> mdi-plus </v-icon>
                        Add New Contact
                    </v-btn>
                    <download-excel
                        class="btn btn-default"
                        :data="selectedList"
                        :fields="excel_file_header"
                        name="contacts.xls"
                    >
                        <v-btn color="secondary">
                            <v-icon left small> mdi-export </v-icon>
                        </v-btn>
                    </download-excel>
                    <v-btn
                        dark
                        small
                        color="secondary"
                        class="capitalize ml-2 text-xs"
                        v-on:click="uploadFile"
                    >
                        <v-icon left small> mdi-upload </v-icon>
                        Upload File
                    </v-btn>
                </v-toolbar>
            </template>

            <template v-slot:[`item.contact_group_id`]="{ item }">
                <v-chip>
                    <p class="text-sm font-normal mt-3.5">
                        {{ item.group.name }}
                    </p>
                </v-chip>
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
                        @click="deleteContact(item.id)"
                    >
                        <v-icon>mdi-delete</v-icon>
                    </v-btn>
                </v-flex>
            </template>
        </v-data-table>
    </div>
</template>

<script>
import AddNewContact from "./Add";
import UploadFile from "./Upload";
export default {
    components: { AddNewContact, UploadFile },
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
                    href: "/"
                },
                {
                    text: "Contacts",
                    disabled: true
                }
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
                    callback: value => {
                        return `${value}`;
                    }
                }
            },

            headers: [
                { text: "Mobile", value: "mobile" },
                { text: "Name", value: "name" },
                { text: "Email", value: "email" },
                { text: "Company", value: "company" },
                { text: "Address", value: "address" },
                { text: "NOTE", value: "note" },
                { text: "Group Name", value: "contact_group_id" },
                { text: "Actions", value: "actions", sortable: false }
            ]
        };
    },

    mounted() {
        const self = this;
        self.getAllContacts();
        self.$eventBus.$on("contacts_data", data => {
            self.getAllContacts();
        });
    },

    methods: {
        addNewContact() {
            const self = this;
            self.$refs.AddNewContact.create();
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
        }
    }
};
</script>
