<template>
    <div
        data-aos="zoom-out"
        data-aos-duration="1000"
        class="p-5 md:px-3 md:py-2"
    >
        <div>
            <v-breadcrumbs :items="breadcrumbsItems">
                <template v-slot:divider>
                    <v-icon>mdi-chevron-right</v-icon>
                </template>
            </v-breadcrumbs>
        </div>

        <div class="w-full h-auto shadow-md rounded-lg flex space-x-2">
            <div class="w-full lg:w-4/6 px-5 rounded-lg">
                <div>
                    <v-card-title>
                        Send SMS Quickly and Efficiently
                    </v-card-title>
                    <div class="flex space-x-1 ml-4 -mt-3">
                        <div class="w-14 h-0.5 rounded-full bg-gray-600"></div>
                        <div class="w-6 h-0.5 bg-gray-600 rounded-full"></div>
                    </div>

                    <v-card-text class="mt-5 pr-10">
                        <v-row>
                            <v-select
                                outlined
                                :items="campaignList"
                                label="Select Campaign"
                                prepend-inner-icon="mdi-sign-text"
                                item-text="name"
                                item-value="id"
                                v-model="form_fields.campaign_id"
                            >
                            </v-select>
                        </v-row>

                        <v-row>
                            <v-select
                                outlined
                                :items="routeList"
                                label="Select Route"
                                prepend-inner-icon="mdi-routes"
                                item-text="name"
                                item-value="id"
                                v-model="form_fields.route_id"
                            >
                            </v-select>
                        </v-row>

                        <v-row>
                            <v-select
                                outlined
                                :items="senderList"
                                label="Select Sender ID"
                                prepend-inner-icon="mdi-card-account-details"
                                item-value="id"
                                item-text="sender_id"
                                v-model="form_fields.senderid"
                            >
                            </v-select>
                        </v-row>

                        <v-row>
                            <v-card elevation="2" rounded="lg">
                                <v-tabs dark background-color="blue darken-1">
                                    <v-tab>
                                        <v-icon left> mdi-content-copy </v-icon>
                                        Copy / Paste
                                    </v-tab>

                                    <v-tab>
                                        <v-icon left> mdi-cloud-upload </v-icon>
                                        Upload File
                                    </v-tab>

                                    <v-tab>
                                        <v-icon left>
                                            mdi-account-group
                                        </v-icon>
                                        Contact groups
                                    </v-tab>

                                    <v-tab>
                                        <v-icon left> mdi-magnify </v-icon>
                                        Search
                                    </v-tab>

                                    <v-tab-item>
                                        <v-card flat>
                                            <v-card-text>
                                                <v-chip
                                                    dark
                                                    x-small
                                                    class="ma-2 capitalize"
                                                    color="secondary"
                                                >
                                                    <v-icon class="mr-1"
                                                        >mdi-phone</v-icon
                                                    >
                                                    Mobile numbers
                                                </v-chip>
                                                <v-textarea
                                                    @change="show"
                                                    outlined
                                                    placeholder="Copy paste numbers separated by newline.........
                                                                            9851******"
                                                    v-model="
                                                        form_fields.pasted_numbers
                                                    "
                                                >
                                                </v-textarea>
                                            </v-card-text>
                                        </v-card>
                                    </v-tab-item>

                                    <v-tab-item>
                                        <v-card flat>
                                            <v-card-text>
                                                <v-chip
                                                    dark
                                                    x-small
                                                    class="ma-2"
                                                    color="secondary"
                                                >
                                                    <v-icon class="mr-1"
                                                        >mdi-paperclip</v-icon
                                                    >
                                                    txt/csv/xls/xlsx
                                                </v-chip>
                                                <v-file-input
                                                    class="mt-3"
                                                    placeholder="Upload your documents"
                                                    label="Browse"
                                                    type="file"
                                                    prepend-icon="mdi-paperclip"
                                                    v-model="
                                                        form_fields.excel_numbers
                                                    "
                                                >
                                                    <template
                                                        v-slot:selection="{
                                                            text
                                                        }"
                                                    >
                                                        <v-chip
                                                            small
                                                            label
                                                            color="primary"
                                                        >
                                                            {{ text }}
                                                        </v-chip>
                                                    </template>
                                                </v-file-input>
                                            </v-card-text>
                                        </v-card>
                                    </v-tab-item>

                                    <v-tab-item>
                                        <v-card flat>
                                            <v-card-text>
                                                <v-combobox
                                                    v-model="
                                                        form_fields.contact_groups
                                                    "
                                                    :items="contactGroups"
                                                    label="Select Contact Groups"
                                                    multiple
                                                    chips
                                                    solo
                                                    prepend-inner-icon="mdi-account-group"
                                                >
                                                    <template
                                                        v-slot:selection="data"
                                                    >
                                                        <v-chip
                                                            :key="
                                                                JSON.stringify(
                                                                    data.item
                                                                )
                                                            "
                                                            v-bind="data.attrs"
                                                            :input-value="
                                                                data.selected
                                                            "
                                                            :disabled="
                                                                data.disabled
                                                            "
                                                            @click:close="
                                                                data.parent.selectItem(
                                                                    data.item
                                                                )
                                                            "
                                                        >
                                                            <v-avatar
                                                                class="accent white--text"
                                                                left
                                                                v-text="
                                                                    data.item
                                                                        .slice(
                                                                            0,
                                                                            1
                                                                        )
                                                                        .toUpperCase()
                                                                "
                                                            ></v-avatar>
                                                            {{ data.item }}
                                                            <v-icon
                                                                small
                                                                class="ml-2"
                                                                @click="
                                                                    data.parent.selectItem(
                                                                        data.item
                                                                    )
                                                                "
                                                            >
                                                                $delete
                                                            </v-icon>
                                                        </v-chip>
                                                    </template>
                                                </v-combobox>
                                            </v-card-text>
                                        </v-card>
                                    </v-tab-item>

                                    <v-tab-item>
                                        <v-card flat>
                                            <v-card-text>
                                                <v-autocomplete
                                                    v-model="
                                                        form_fields.selected_numbers
                                                    "
                                                    :items="people"
                                                    filled
                                                    solo
                                                    chips
                                                    color="blue lighten-2"
                                                    label="Search People"
                                                    item-text="name"
                                                    item-value="name"
                                                    multiple
                                                    prepend-inner-icon="mdi-magnify"
                                                >
                                                    <template
                                                        v-slot:selection="data"
                                                    >
                                                        <v-chip
                                                            v-bind="data.attrs"
                                                            :input-value="
                                                                data.selected
                                                            "
                                                            close
                                                            @click="data.select"
                                                            @click:close="
                                                                remove(
                                                                    data.item
                                                                )
                                                            "
                                                        >
                                                            <v-avatar left>
                                                                <v-img
                                                                    :src="
                                                                        data
                                                                            .item
                                                                            .avatar
                                                                    "
                                                                ></v-img>
                                                            </v-avatar>
                                                            {{ data.item.name }}
                                                        </v-chip>
                                                    </template>
                                                    <template
                                                        v-slot:item="data"
                                                    >
                                                        <template
                                                            v-if="
                                                                typeof data.item !==
                                                                    'object'
                                                            "
                                                        >
                                                            <v-list-item-content
                                                                v-text="
                                                                    data.item
                                                                "
                                                            ></v-list-item-content>
                                                        </template>
                                                        <template v-else>
                                                            <v-list-item-avatar>
                                                                <img
                                                                    :src="
                                                                        data
                                                                            .item
                                                                            .avatar
                                                                    "
                                                                />
                                                            </v-list-item-avatar>
                                                            <v-list-item-content>
                                                                <v-list-item-title
                                                                    v-html="
                                                                        data
                                                                            .item
                                                                            .name
                                                                    "
                                                                ></v-list-item-title>
                                                                <v-list-item-subtitle
                                                                    v-html="
                                                                        data
                                                                            .item
                                                                            .group
                                                                    "
                                                                ></v-list-item-subtitle>
                                                            </v-list-item-content>
                                                        </template>
                                                    </template>
                                                </v-autocomplete>
                                            </v-card-text>
                                        </v-card>
                                    </v-tab-item>
                                </v-tabs>
                            </v-card>
                        </v-row>

                        <v-row class="mt-9">
                            <label for="" class="text-lg">
                                <v-icon small>mdi-cog</v-icon> Options :
                            </label>
                        </v-row>

                        <v-row>
                            <div class="flex space-x-3 -mt-3">
                                <div>
                                    <v-checkbox
                                        v-model="form_fields.remove_duplicate"
                                        label="Remove Duplicates"
                                        value="1"
                                    >
                                    </v-checkbox>
                                </div>

                                <div>
                                    <v-checkbox
                                        v-model="form_fields.remove_invalids"
                                        label="Remove Invalids"
                                        value="1"
                                    >
                                    </v-checkbox>
                                </div>

                                <div>
                                    <v-checkbox
                                        v-model="form_fields.remove_blacklist"
                                        label="Blacklist"
                                        value="1"
                                    >
                                    </v-checkbox>
                                </div>
                            </div>
                        </v-row>

                        <v-row>
                            <label for="" class="text-lg">
                                <v-icon small>mdi-message-cog</v-icon> SMS Type
                                :
                            </label>
                        </v-row>

                        <v-row>
                            <div class="-mt-3" >
                                <v-radio-group row v-model="form_fields.sms_type">
                                    <v-radio label="Text" value="text"> </v-radio>
                                    <v-radio label="Unicode" value="unicode"> </v-radio>
                                    <v-radio label="Dynamic" value="dynamic"> </v-radio>
                                </v-radio-group>
                            </div>
                        </v-row>

                        <v-row>
                            <div class="flex space-x-2">
                                <div>
                                    <label for="" class="text-lg">
                                        <v-icon small>mdi-message-draw</v-icon>
                                        SMS Content :
                                    </label>
                                </div>
                                <div class="mt-1">
                                    <a href="" class="italic">Use Template</a>
                                </div>
                            </div>
                        </v-row>

                        <v-row>
                            <div class="w-full mt-2">
                                <v-textarea
                                    outlined
                                    placeholder="Enter SMS Content here"
                                    v-model="form_fields.message"
                                >
                                </v-textarea>
                            </div>
                        </v-row>

                        <v-row>
                            <label for="" class="text-lg">
                                <v-icon small>mdi-clock</v-icon> Schedule :
                            </label>
                        </v-row>

                        <v-row>
                            <div class="-mt-3">
                                <v-radio-group row v-model="form_fields.schedule">
                                    <v-radio label="Now"> </v-radio>
                                    <v-radio label="Later"> </v-radio>
                                    <v-radio label="Long Course"> </v-radio>
                                </v-radio-group>
                            </div>
                        </v-row>
                    </v-card-text>
                    <v-divider></v-divider>

                    <v-card-actions class="justify-end">
                        <v-btn color="blue darken-1" dark @click="sendMessage">
                            Send
                            <v-icon right> mdi-send </v-icon>
                        </v-btn>
                    </v-card-actions>
                </div>
            </div>

            <div
                class="w-1/2 h-5/6 hidden lg:block"
                data-aos="fade-down"
                data-aos-duration="1000"
                data-aos-delay="500"
            >
                <img
                    src="/images/sendSMS.jpg"
                    class="object-cover w-full h-5/6"
                    alt=""
                />
            </div>
        </div>
    </div>
</template>

<style></style>

<script>
import axios from "axios";
import Api from "../../../common/Api";
export default {
    data() {
        const srcs = {
            1: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
            2: "https://cdn.vuetifyjs.com/images/lists/2.jpg",
            3: "https://cdn.vuetifyjs.com/images/lists/3.jpg",
            4: "https://cdn.vuetifyjs.com/images/lists/4.jpg",
            5: "https://cdn.vuetifyjs.com/images/lists/5.jpg"
        };
        return {
            contacts: "",
            select: [],
            selectedPeople: [],
            checkDuplicates: false,
            checkInvalids: false,
            checkBlacklist: false,
            files: [],
            form_fields: [],
            breadcrumbsItems: [
                {
                    text: "Dashboard",
                    disabled: false,
                    href: "/"
                },
                {
                    text: "Send SMS",
                    disabled: true
                }
            ],
            campaignList: [],
            routeList: [],
            senderList: [],
            contactGroups: ["Students", "Employees", "Workers"],
            people: [
                { header: "Group 1" },
                { name: "Sandra Adams", group: "Group 1", avatar: srcs[1] },
                { name: "Ali Connors", group: "Group 1", avatar: srcs[2] },
                { name: "Trevor Hansen", group: "Group 1", avatar: srcs[3] },
                { name: "Tucker Smith", group: "Group 1", avatar: srcs[2] },
                { divider: true },
                { header: "Group 2" },
                { name: "Britta Holt", group: "Group 2", avatar: srcs[4] },
                { name: "Jane Smith ", group: "Group 2", avatar: srcs[5] },
                { name: "John Smith", group: "Group 2", avatar: srcs[1] },
                { name: "Sandra Williams", group: "Group 2", avatar: srcs[3] }
            ]
        };
    },
    mounted() {
        const self = this;
        self.loadCampaignList();
        self.loadRoutes();
        self.loadSenderIDs();
    },

    methods: {
        remove(item) {
            const index = this.selectedPeople.indexOf(item.name);
            if (index >= 0) this.selectedPeople.splice(index, 1);
        },

        async loadCampaignList() {
            const self = this;
            self.url = "/my-campaigns";
            self.campaignList = await self.getData();
        },

        async loadRoutes() {
            const self = this;
            self.url = "/route";
            self.routeList = await self.getData();
        },

        async loadSenderIDs() {
            const self = this;
            self.url = "/all-senderid";
            self.senderList = await self.getData();
        },

        show() {
            console.log(self.contacts);
        },
        async sendMessage() {
            const self = this;
            alert("hello");
            self.url = "/send-sms";
            let data = {
                campaign_id:self.form_fields.campaign_id,
                pasted_numbers: self.form_fields.pasted_numbers,
                excel_numbers: self.form_fields.excel_numbers,
                selected_numbers: self.form_fields.selected_numbers,
                contact_groups: self.form_fields.contact_groups,
                message: self.form_fields.message,
                remove_duplicate:self.form_fields.remove_duplicate,
                remove_invalids:self.form_fields.remove_invalids,
                remove_blacklist:self.form_fields.remove_blacklist,
                sms_type:self.form_fields.sms_type,
                schedule:self.form_fields.schedule
            };

           let response = await self.post(data);
           console.log(response);
        }
    }
};
</script>
