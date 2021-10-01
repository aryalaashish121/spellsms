<template>
    <div>
        <v-dialog v-model="dialog" persistent max-width="550px" scrollable>
            <v-card>
                <v-card-title class="primary white--text" elevation="5">
                    <v-icon dark left> mdi-download </v-icon>
                    Import Contact
                    <v-spacer></v-spacer>
                    <v-btn dark icon @click="dialog = false">
                        <v-icon>mdi-close</v-icon>
                    </v-btn>
                </v-card-title>
                <v-card-text>
                    <v-card flat>
                        <v-card-text class="mt-3">
                            <v-row>
                                <v-select
                                    label="Select Group"
                                    outlined
                                    :items="contact_group_list"
                                    item-text="name"
                                    item-value="id"
                                    prepend-inner-icon="mdi-account-group"
                                    type="number"
                                    v-model="contact_group_id"
                                ></v-select>
                            </v-row>

                            <v-row class="flex">
                                <v-label>Upload File : </v-label>
                                <div class="-mt-2">
                                    <v-chip
                                        dark
                                        x-small
                                        class="ma-2"
                                        color="secondary"
                                    >
                                        <v-icon class="mr-1"
                                            >mdi-paperclip</v-icon
                                        >
                                        xls or xlsx
                                    </v-chip>
                                </div>
                            </v-row>

                            <v-row>
                               <!-- <input
                                                    class="file-input"
                                                    type="file"
                                                    ref="import_file"
                                                    name="file"
                                                    @change="onFileChange"
                                                /> -->
                                   <v-file-input
                                    class="mt-3"
                                    placeholder="Upload your documents"
                                    label="Browse"
                                    solo
                                    prepend-icon="mdi-paperclip"
                                    @change="onFileChange"
                                > 
                                    <template v-slot:selection="{ text }">
                                        <v-chip small label color="primary">
                                            {{ text }}
                                        </v-chip>
                                    </template>
                                </v-file-input>
                            </v-row>
                        </v-card-text>
                    </v-card>
                </v-card-text>
                <v-divider></v-divider>
                <v-card-actions class="justify-end">
                    <v-btn color="error" text v-on:click="dialog = false">
                        <v-icon left> mdi-close</v-icon>Cancel
                    </v-btn>
                    <v-btn text color="primary" @click="uploadNewContacts">
                        Import <v-icon right> mdi-content-save</v-icon>
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
export default {
    data() {
        return {
            dialog: false,
            contact_group_list: [],
            excel_file:"",
            contact_group_id:"",
            selectedFile:null,
        };
    },
    mounted(){
      const self = this;
      self.loadGroups();
    },
    methods: {
        onFileChange(e) {
            const self = this;
            self.selectedFile = e;
            console.log(self.selectedFile);

        },
        upload() {
            const self = this;
            self.dialog = true;
        },

        async uploadNewContacts(){
          const self = this;
          self.url = "/upload-new-contacts";
          const formdata = new FormData();
          formdata.append('excel_numbers',self.selectedFile,self.selectedFile.name);
          formdata.append('contact_group_id',self.contact_group_id);

           let response = await self.post(formdata);
        },

        async loadGroups() {
            const self = this;
            self.url = "/all-contact-groups";
            self.contact_group_list = await self.getData();
        }
    }
};
</script>
