<template>
  <div>
    <v-dialog
      v-model="createCampaignDialog"
      persistent
      max-width="750px"
      scrollable
    >
      <v-card>
        <v-card-title class="primary white--text" elevation="5">
          <v-icon dark left> mdi-sign-text </v-icon>
          Create Campaign
          <v-spacer></v-spacer>
          <v-btn dark icon @click="createCampaignDialog = false">
            <v-icon>mdi-close</v-icon>
          </v-btn>
        </v-card-title>
        <v-card-text>
          <v-card flat>
            <v-card-text class="mt-3">
              <v-row>
                <v-text-field
                  label="Name"
                  outlined
                  prepend-inner-icon="mdi-sign-text"
                  v-model="form_fields.name"
                ></v-text-field>
              </v-row>

              <v-row>
                <v-textarea
                  outlined
                  name="input-7-4"
                  label="Description"
                  placeholder="A brief description of this campaign"
                  v-model="form_fields.description"
                ></v-textarea>
              </v-row>

              <v-row>
                <v-select
                  :items="categoriesList"
                  item-value="id"
                  item-text="name"
                  label="Category"
                  outlined
                  prepend-inner-icon="mdi-view-list"
                  v-model="form_fields.category_id"
                ></v-select>
              </v-row>


              <v-row>
                <v-select
                  :items="routeList"
                  item-text="name"
                  item-value="id"
                  label="Default Route"
                  outlined
                  prepend-inner-icon="mdi-routes"
                  v-model="form_fields.default_route"
                ></v-select>
              </v-row>

              <v-row class="flex space-x-2">
                <v-label> Set as default : </v-label>
                <div class="-mt-6">
                  <v-radio-group v-model="form_fields.is_default" column >
                    <v-radio
                      color="blue"
                      label="Yes, Sure."
                      value="1"
                    ></v-radio>
                    <v-radio
                      color="red"
                      label="No, thanks."
                      value="0"
                      
                    ></v-radio>
                  </v-radio-group>
                </div>
              </v-row>
            </v-card-text>

            <v-divider></v-divider>

            <v-card-actions class="justify-end">
              <v-btn
                color="error"
                text
                v-on:click="createCampaignDialog = false"
              >
                <v-icon left> mdi-close</v-icon>Cancel
              </v-btn>
              <v-btn text color="primary" @click="addNew"> 
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
  data(){
    return{
    column: null,
    createCampaignDialog: false,
    categoriesList: [],
    routeList: [],
    row: null,
    form_fields:{
      is_default:"",
      name:"",
      description:"",
      default_route:"",
      category_id:"",

    },
    }
  },
  mounted(){
    const self = this;
    self.getCampaignCategories();
    self.getRouteList();
  },


  methods: {
    create() {
      const self = this;
      self.createCampaignDialog = true;
    },
      async getCampaignCategories(){
      const self = this;
      self.url = "/all-campaign-categories";
      self.categoriesList = await self.getData();
      console.log(self.categoriesList);
    },

    async getRouteList(){
      const self = this;
      self.url = "/route";
      self.routeList = await self.getData();
    },

    addNew(){
      const self = this;
      self.url = "/add-campaigns";
      let data = {
        name:self.form_fields.name,
        description:self.form_fields.description,
        category_id:self.form_fields.category_id,
        default_route:self.form_fields.default_route,
        is_default:self.form_fields.is_default
        }
      let response = self.post(data);
    }
  },
};
</script>