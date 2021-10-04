<template>
    <div
        data-aos="zoom-out"
        data-aos-duration="1000"
        class="p-5 md:px-3 md:py-2"
    >
        <CreateAnnouncement ref="createAnnouncement"> </CreateAnnouncement>
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
            :items="announcements"
            class="shadow-md border rounded-md"
            :search="search"
            item-key="id"
            show-select
        >
            <template v-slot:top>
                <v-toolbar flat class="rounded-md">
                    <v-toolbar-title>
                        <v-icon class="pb-1" left> mdi-bullhorn </v-icon>
                        <span class="text-base"> Announcements </span>
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
                        color="orange"
                        class="capitalize"
                        v-on:click="createAnnouncement"
                    >
                        <v-icon left small> mdi-bullhorn </v-icon>
                        Create Annoucement
                    </v-btn>
                    <download-excel
                        class="btn btn-default"
                        :data="selectedList"
                        :fields="excel_file_header"
                        name="announcements.xls"
                    >
                        <v-btn color="secondary">
                            <v-icon left small> mdi-export </v-icon>
                        </v-btn>
                    </download-excel>
                    <v-btn
                        class="ma-1"
                        outlined
                        x-small
                        fab
                        color="error"
                        @click="massDelete"
                    >
                        <v-icon>mdi-delete</v-icon>
                    </v-btn>
                </v-toolbar>
            </template>

            <template v-slot:[`item.status`]="{ item }">
                <v-icon
                    size="20"
                    color="primary"
                    v-if="item.status == 'Active'"
                >
                    mdi-check-circle-outline
                </v-icon>

                <v-icon v-else color="error" size="20">
                    mdi-close-circle-outline
                </v-icon>
            </template>

            <template v-slot:[`item.actions`]="{ item }">
                <v-flex>
                    <v-btn
                        class="ma-1"
                        outlined
                        x-small
                        fab
                        color="error"
                        @click="deleteAnnouncement(item.id)"
                    >
                        <v-icon>mdi-delete</v-icon>
                    </v-btn>
                </v-flex>
            </template>
        </v-data-table>
    </div>
</template>

<script>
import CreateAnnouncement from "./Add";
export default {
    components: { CreateAnnouncement },
    data() {
        return {
            search: "",
            selectedList: [],

            breadcrumbsItems: [
                {
                    text: "Dashboard",
                    disabled: false,
                    href: "/"
                },
                {
                    text: "Announcements",
                    disabled: true
                }
            ],
            excel_file_header: {
                Title: "title",
                Announcement: "content",
                "created at": "created_at"
            },
            headers: [
                { text: "Title", value: "title" },
                { text: "Message", value: "content" },
                { text: "Display to", value: "usertype" },
                { text: "Actions", value: "actions", sortable: false }
            ],
            announcements: []
        };
    },
    computed: {
        itemsWithSno() {
            return this.desserts.map((d, index) => ({ ...d, sn: index + 1 }));
        }
    },
    mounted() {
        this.loadAnnouncement();
    },
    methods: {
        createAnnouncement() {
            const self = this;
            self.$refs.createAnnouncement.create();
        },

        async loadAnnouncement() {
            const self = this;
            self.url = "/load-announcement";
            self.announcements = await self.getData();
            console.log(self.announcements);
        },

        deleteAnnouncement(id) {
            const self = this;
            self.url = "/delete-announcement";
            self.$store.commit("showDialog", {
                type: "confirm",
                icon: "mdi-alert-outline",
                title: "Delete announcement",
                message: "Are you sure you want to delete this announcement?",
                okCb: async () => {
                    self.delete(id, async () => {
                        self.loadAnnouncement();
                    });
                }
            });
        },

        massDelete() {
            const self = this;
            self.url = "/delete-selected-announcement";
            let array = [];
            self.selectedList.forEach(element => {
                array.push(element.id);
            });

            if (array.length == 0) {
                self.$store.commit("showSnackbar", {
                    message: "Please select atleast one announcement!",
                    color: false
                });
            } else {
                let data = {ids: array};
                self.url = "/delete-announcement";
                self.$store.commit("showDialog", {
                    type: "confirm",
                    icon: "mdi-alert-outline",
                    title: "Delete announcements",
                    message:
                        "Are you sure you want to delete these selected announcement?",
                    okCb: async () => {
                        self.deleteSelected(data, async () => {
                            self.loadAnnouncement();
                        });
                    }
                });
            }
        }
    }
};
</script>
