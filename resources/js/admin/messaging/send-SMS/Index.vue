<template>
  <div data-aos="zoom-out" data-aos-duration="1000" class="p-5 md:px-3 md:py-2">
    <UseTemplate ref="useTemplate"></UseTemplate>
    <LaterDate ref="laterDate"></LaterDate>
    <LongCourseDate ref="longCourseDate"></LongCourseDate>
    <div>
      <v-breadcrumbs :items="breadcrumbsItems">
        <template v-slot:divider>
          <v-icon>mdi-chevron-right</v-icon>
        </template>
      </v-breadcrumbs>
    </div>

    <div class="w-full h-auto border rounded-lg flex space-x-2">
      <div class="w-full lg:w-7/12 px-5 rounded-lg">
        <v-card flat>
          <v-card-text>
            <v-card
              outlined
              class="blue lighten-3 white--text px-4 py-2 mt-3"
              dark
              elevation="1"
              rounded="xl"
            >
              <v-card-title> Campaign </v-card-title>
              <v-card-text>
                <v-col cols="12" md="8" class="-ml-3">
                  <v-select
                    outlined
                    dense
                    :items="campaignList"
                    label="Select Campaign"
                    prepend-inner-icon="mdi-sign-text"
                    item-text="name"
                    item-value="id"
                    v-model="form_fields.campaign_id"
                  >
                  </v-select>
                </v-col>
                <div
                  class="
                    hidden
                    overflow-hidden
                    p-3
                    lg:block
                    rounded-full
                    w-20
                    h-20
                    absolute
                    top-5
                    right-5
                  "
                >
                  <img
                    src="/images/email.png"
                    class="object-cover w-full h-full"
                    alt=""
                    srcset=""
                  />
                </div>
              </v-card-text>
            </v-card>

            <v-card outlined elevation="1" rounded="xl" class="mt-4">
              <v-card-text>
                <v-tabs show-arrows>
                  <v-tab>
                    <v-icon left> mdi-content-copy </v-icon>
                    Copy / Paste
                  </v-tab>

                  <v-tab>
                    <v-icon left> mdi-cloud-upload </v-icon>
                    Upload File
                  </v-tab>

                  <v-tab>
                    <v-icon left> mdi-account-group </v-icon>
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
                          <v-icon class="mr-1">mdi-phone</v-icon>
                          Mobile numbers
                        </v-chip>
                        <v-textarea
                          @change="show"
                          outlined
                          placeholder="Copy paste numbers separated by newline.........
                                       9851******"
                          v-model="form_fields.pasted_numbers"
                        >
                        </v-textarea>
                      </v-card-text>
                    </v-card>
                  </v-tab-item>

                  <v-tab-item>
                    <v-card flat>
                      <v-card-text>
                        <v-chip dark x-small class="ma-2" color="secondary">
                          <v-icon class="mr-1">mdi-paperclip</v-icon>
                          txt/csv/xls/xlsx
                        </v-chip>
                        <input
                          class="file-input"
                          type="file"
                          ref="import_file"
                          name="file"
                          @change="onFileChange"
                        />
                      </v-card-text>
                    </v-card>
                  </v-tab-item>

                  <v-tab-item>
                    <v-card flat>
                      <v-card-text>
                        <v-combobox
                          v-model="form_fields.contact_groups"
                          :items="contact_group_list"
                          label="Select Contact Groups"
                          item-text="name"
                          item-value="id"
                          multiple
                          chips
                          solo
                          filled
                          prepend-inner-icon="mdi-account-group"
                        >
                          <template v-slot:selection="data">
                            <v-chip
                              :key="JSON.stringify(data.item)"
                              v-bind="data.attrs"
                              :input-value="data.selected"
                              :disabled="data.disabled"
                              @click:close="data.parent.selectItem(data.item)"
                            >
                              <v-avatar
                                class="accent white--text"
                                left
                                v-text="
                                  data.item.name.slice(0, 1).toUpperCase()
                                "
                              ></v-avatar>
                              {{ data.item.name }}
                              <v-icon
                                small
                                class="ml-2"
                                @click="data.parent.selectItem(data.item)"
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
                          v-model="form_fields.selected_numbers"
                          :items="contacts_list"
                          filled
                          solo
                          chips
                          color="blue lighten-2"
                          label="Search People"
                          item-text="name"
                          item-value="mobile"
                          multiple
                          prepend-inner-icon="mdi-magnify"
                        >
                          <template v-slot:selection="data">
                            <v-chip
                              :key="JSON.stringify(data.item)"
                              v-bind="data.attrs"
                              :input-value="data.selected"
                              :disabled="data.disabled"
                              @click:close="data.parent.selectItem(data.item)"
                            >
                              <v-avatar
                                class="accent white--text"
                                left
                                v-text="
                                  data.item.name.slice(0, 1).toUpperCase()
                                "
                              ></v-avatar>
                              {{ data.item.name }}
                              <v-icon
                                small
                                class="ml-2"
                                @click="data.parent.selectItem(data.item)"
                              >
                                $delete
                              </v-icon>
                            </v-chip>
                          </template>
                        </v-autocomplete>
                      </v-card-text>
                    </v-card>
                  </v-tab-item>
                </v-tabs>
              </v-card-text>
            </v-card>

            <v-card outlined elevation="1" rounded="xl" class="px-4 py-2 mt-4">
              <v-card-text>
                <p class="text-base font-bold">Options :</p>

                <v-checkbox
                  v-model="form_fields.remove_duplicate"
                  label="Remove Duplicates"
                  value="1"
                >
                </v-checkbox>

                <v-checkbox
                  v-model="form_fields.remove_invalids"
                  label="Remove Invalids"
                  value="1"
                >
                </v-checkbox>

                <v-checkbox
                  v-model="form_fields.remove_blacklist"
                  label="Blacklist"
                  value="1"
                >
                </v-checkbox>

                <div
                  class="
                    hidden
                    overflow-hidden
                    p-3
                    lg:block
                    rounded-full
                    w-20
                    h-20
                    absolute
                    top-5
                    right-5
                  "
                >
                  <img
                    src="/images/settings.png"
                    class="object-cover w-full h-full"
                    alt=""
                    srcset=""
                  />
                </div>
              </v-card-text>
            </v-card>

            <v-card rounded="xl" outlined elevation="1" class="px-4 py-2 mt-4">
              <v-card-text>
                <p class="text-base font-bold">SMS Type :</p>

                <v-row class="ml-1">
                  <div class="-mt-3">
                    <v-radio-group row v-model="form_fields.sms_type">
                      <v-radio label="Text" value="text"> </v-radio>
                      <v-radio label="Unicode" value="unicode"> </v-radio>
                      <v-radio label="Dynamic" value="dynamic"> </v-radio>
                    </v-radio-group>
                  </div>
                </v-row>

                <div class="flex space-x-2 mt-4">
                  <div>
                    <p class="text-base">SMS Content :</p>
                  </div>
                  <div>
                    <v-btn
                      x-small
                      rounded
                      dark
                      color="blue darken-1"
                      class="italic capitalize"
                      @click="useTemplate"
                    >
                      Use Template
                    </v-btn>
                  </div>
                </div>

                <v-row>
                  <div class="w-full mt-2">
                    <v-textarea
                      outlined
                      class="caption"
                      placeholder="Enter SMS Content here"
                      v-model="form_fields.message"
                      ref="message_field_np"
                      v-on:keypress="changeToNepaliFont"
                    >
                    </v-textarea>
                  </div>
                </v-row>
                <div
                  class="
                    hidden
                    overflow-hidden
                    p-3
                    lg:block
                    rounded-full
                    w-20
                    h-20
                    absolute
                    top-5
                    right-5
                  "
                >
                  <img
                    src="/images/sms.png"
                    class="object-cover w-full h-full"
                    alt=""
                    srcset=""
                  />
                </div>
              </v-card-text>
            </v-card>

            <v-card rounded="xl" outlined elevation="1" class="px-4 py-2 mt-4">
              <v-card-text>
                <p class="text-base font-semibold">Schedule :</p>

                <v-row class="ml-0.5">
                  <div class="-mt-3">
                    <v-radio-group
                      row
                      mandatory
                      v-model="form_fields.schedule"
                      @change="chooseSmsSchedule"
                    >
                      <v-radio label="Now" value="now"> </v-radio>
                      <v-radio label="Later" value="later"> </v-radio>
                      <v-radio label="Long Course" value="longCourse">
                      </v-radio>
                    </v-radio-group>
                  </div>
                </v-row>

                <div class="mt-4">
                  <label for="" class="text-base">
                    Scheduled Date & Time :
                  </label>
                  <br />
                  <v-text-field
                    readonly
                    class="mt-2"
                    solo
                    dense
                    v-model="scheduledDateTime"
                  ></v-text-field>
                </div>

                <div
                  class="
                    hidden
                    overflow-hidden
                    p-3
                    lg:block
                    rounded-full
                    w-20
                    h-20
                    absolute
                    top-5
                    right-5
                  "
                >
                  <img
                    src="/images/schedule.png"
                    class="object-cover w-full h-full"
                    alt=""
                    srcset=""
                  />
                </div>
              </v-card-text>
            </v-card>
          </v-card-text>

          <v-divider></v-divider>

          <v-card-actions class="justify-end">
            <v-btn color="blue darken-1" dark @click="sendMessage">
              Send
              <v-icon right> mdi-send </v-icon>
            </v-btn>
          </v-card-actions>
        </v-card>
      </div>

      <div
        class="w-5/12 h-auto hidden lg:block flex justify-center pt-10"
        data-aos="zoom-in"
        data-aos-duration="500"
      >
        <div class="w-80 h-80">
          <lottie-player
            src="https://assets4.lottiefiles.com/private_files/lf30_osufshhg.json"
            background="transparent"
            speed="1"
            style="width: 300px; height: 300px"
            loop
            autoplay
          ></lottie-player>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.chipWrapper {
  border-radius: 9999px;
  height: 2.5rem /* 40px */;
  display: flex;
  align-items: center;
  transition: ease-in-out;
  transition-duration: 400;
  backdrop-filter: blur(4px) saturate(174%);
  -webkit-backdrop-filter: blur(4px) saturate(174%);
  background-color: rgba(229, 231, 235);

  padding-left: 0.75rem /* 12px */;
  padding-right: 0.75rem /* 12px */;
}

.chipWrapper:hover {
  --tw-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1),
    0 10px 10px -5px rgba(0, 0, 0, 0.04);
  box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
    var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}
</style>

<script>
import Conversions from "../../../common/conversions";
import UseTemplate from "../../../components/Dialogues/UseTemplate.vue";
import LaterDate from "../../../components/Dialogues/LaterDateSMS.vue";
import LongCourseDate from "../../../components/Dialogues/LongCourseSMS.vue";
export default {
  components: { UseTemplate, LaterDate, LongCourseDate },
  data() {
    return {
      contacts: "",
      select: [],
      selectedPeople: [],
      contact_group_list: [],
      contacts_list: [],
      campaignList: [],
      routeList: [],
      senderList: [],
      checkDuplicates: false,
      checkInvalids: false,
      checkBlacklist: false,
      selectedFile: null,
      sendlater: "",
      sendnow: "",
      form_fields: {
        campaign_id: "",
        pasted_numbers: "",
        excel_numbers: "",
        selected_numbers: [],
        contact_groups: [],
        message: "",
        remove_duplicate: "",
        remove_invalids: "",
        remove_blacklist: "",
        sms_type: "",
        schedule: "",
      },
      excelfile: null,

      breadcrumbsItems: [
        {
          text: "Dashboard",
          disabled: false,
          href: "/",
        },
        {
          text: "Send SMS",
          disabled: true,
        },
      ],
    };
  },
  mounted() {
    const self = this;
    self.$eventBus.$on("backFire", (data) => {
      self.form_fields.message = data.msg;
    });
    self.loadCampaignList();
    self.loadRoutes();
    self.loadSenderIDs();
    self.loadGroups();
    self.loadContacts();
  },

  methods: {
    onFileChange(e) {
      const self = this;
      console.log(e);
      self.selectedFile = e.target.files[0];
      console.log(self.selectedFile);
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

    async loadGroups() {
      const self = this;
      self.url = "/all-contact-groups";
      self.contact_group_list = await self.getData();
    },

    async loadContacts() {
      const self = this;
      self.url = "/all-contacts";
      self.contacts_list = await self.getData();
    },

    async loadSenderIDs() {
      const self = this;
      self.url = "/all-senderid";
      self.senderList = await self.getData();
    },

    async sendMessage() {
      const self = this;
      alert("hello");
      self.url = "/send-sms";
      const formdata = new FormData();
      let contactgrouplist = [];
      // console.log(formdata);
      if (self.selectedFile) {
        formdata.append(
          "excel_numbers",
          self.selectedFile,
          self.selectedFile.name
        );
      }
      if (self.form_fields.contact_groups) {
        self.form_fields.contact_groups.forEach((element) => {
          contactgrouplist.push(element.id);
        });
      }
      console.log(contactgrouplist);

      formdata.append("campaign_id", self.form_fields.campaign_id);
      formdata.append("pasted_numbers", self.form_fields.pasted_numbers);
      formdata.append("selected_numbers", self.form_fields.selected_numbers);
      formdata.append("contact_groups", contactgrouplist);
      formdata.append("message", self.form_fields.message);
      formdata.append("remove_duplicate", self.form_fields.remove_duplicate);
      formdata.append("remove_invalids", self.form_fields.remove_invalids);
      formdata.append("remove_blacklist", self.form_fields.remove_blacklist);
      formdata.append("sms_type", self.form_fields.sms_type);
      formdata.append("schedule", self.form_fields.schedule);
      // console.log(formdata);
      let response = await self.sendSms(formdata);
      console.log(response);
    },

    changeToNepaliFont(e) {
      if (this.form_fields.sms_type == "unicode") {
        let convertedtext = new Conversions().translateNepali(
          this.$refs.message_field_np,
          e
        );
        this.form_fields.message = this.form_fields.message + convertedtext;
      }
    },

    useTemplate() {
      const self = this;
      self.$refs.useTemplate.open();
    },

    chooseSmsSchedule(e) {
      const self = this;
      if (self.form_fields.schedule == "later") {
        self.$refs.laterDate.open();
      } else if (self.form_fields.schedule == "longCourse") {
        self.$refs.longCourseDate.open();
      }
    },
  },
};
</script>
