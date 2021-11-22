<template>
  <div>
    <v-dialog
      v-model="createAnnouncementDialog"
      persistent
      max-width="750px"
      scrollable
    >
      <v-card>
        <v-card-title class="primary white--text body-1" elevation="5">
          <v-icon dark left> mdi-bullhorn </v-icon>
          Create Announcement
          <v-spacer></v-spacer>
          <v-btn dark icon @click="createAnnouncementDialog = false">
            <v-icon>mdi-close</v-icon>
          </v-btn>
        </v-card-title>
        <v-card-text>
          <v-card flat>
            <v-card-text class="mt-3">
              <v-row>
                <v-select
                  :items="userTypeList"
                  v-model="usertype"
                  item-text="name"
                  item-value="id"
                  multiple
                  label="Display to"
                  outlined
                  prepend-inner-icon="mdi-account-cog"
                ></v-select>
              </v-row>

              <v-row class="flex space-x-2">
                <v-text-field
                  v-model="title"
                  label="Announcement title"
                  outlined
                  prepend-inner-icon="mdi-account-cog"
                ></v-text-field>
              </v-row>

              <v-row>
                <v-textarea
                  outlined
                  v-model="content"
                  name="input-7-4"
                  label="Display Text"
                  placeholder="Enter text to dsiplay as announcement"
                ></v-textarea>
              </v-row>
            </v-card-text>

            <v-divider></v-divider>

            <v-card-actions class="justify-end">
              <v-btn
                color="error"
                text
                v-on:click="createAnnouncementDialog = false"
              >
                <v-icon left> mdi-close</v-icon>Cancel
              </v-btn>
              <v-btn text color="primary" @click="createAnnouncement">
                Save <v-icon right> mdi-content-save</v-icon>
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-card-text>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
export default {
  data() {
    return {
      column: null,
      createAnnouncementDialog: false,
      userTypeList: [],
      usertype: [],
      title: "",
      content: "",
      displayToList: [
        "All Users & Resellers",
        "Only All Users",
        "Only All Resellers",
      ],
      row: null,
    };
  },
  mounted() {
    const self = this;
    self.getRoles();
  },
  methods: {
    create() {
      const self = this;
      self.createAnnouncementDialog = true;
    },
    async getRoles() {
      const self = this;
      self.url = "/roles";
      self.userTypeList = await self.getData();
    },
    async createAnnouncement() {
      const self = this;
      self.url = "/create-announcement";
      let data = {
        usertype: self.usertype,
        title: self.title,
        content: self.content,
      };
      let response = await self.post(data);
      console.log(data);
    },
  },
};
</script>
