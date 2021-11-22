<template>
  <div>
    <v-dialog v-model="addUserDialog" persistent max-width="750px" scrollable>
      <v-card>
        <v-card-title class="primary white--text body-1" elevation="5">
          <v-icon dark left> mdi-account-circle </v-icon>
          Add User
          <v-spacer></v-spacer>
          <v-btn dark icon @click="addUserDialog = false">
            <v-icon>mdi-close</v-icon>
          </v-btn>
        </v-card-title>
        <v-card-text>
          <v-stepper v-model="e1" class="mt-2">
            <v-stepper-header>
              <v-stepper-step :complete="e1 > 1" step="1" editable>
                Account Info
              </v-stepper-step>

              <v-divider></v-divider>

              <v-stepper-step :complete="e1 > 2" step="2" editable>
                Transaction & Route Allotment
              </v-stepper-step>
            </v-stepper-header>

            <v-stepper-items>
              <v-stepper-content step="1">
                <v-card flat>
                  <v-card-text>
                    <v-row>
                      <v-select
                        :items="userTypeList"
                        label="Select Type"
                        item-value="name"
                        item-text="name"
                        outlined
                        prepend-inner-icon="mdi-account-cog"
                        v-model="form_fields.account_type"
                      ></v-select>
                    </v-row>

                    <v-row>
                      <v-text-field
                        outlined
                        prepend-inner-icon="mdi-office-building"
                        label="Company Name"
                        type="text"
                        v-model="form_fields.company_name"
                      ></v-text-field>
                    </v-row>

                    <v-row>
                      <v-text-field
                        outlined
                        prepend-inner-icon="mdi-account-circle"
                        label="Customer Name"
                        type="text"
                        v-model="form_fields.name"
                      ></v-text-field>
                    </v-row>

                    <v-row>
                      <v-text-field
                        outlined
                        prepend-inner-icon="mdi-map-marker"
                        label="Company Address"
                        type="text"
                        v-model="form_fields.address"
                      ></v-text-field>
                    </v-row>

                    <v-row>
                      <v-text-field
                        outlined
                        prepend-inner-icon="mdi-account-arrow-right"
                        label="Assign login ID"
                        type="text"
                        v-model="form_fields.login_id"
                      ></v-text-field>
                    </v-row>

                    <v-row>
                      <v-text-field
                        outlined
                        prepend-inner-icon="mdi-account-key"
                        label="Assign password"
                        type="password"
                        v-model="form_fields.password"
                      ></v-text-field>
                    </v-row>

                    <v-row>
                      <v-text-field
                        outlined
                        prepend-inner-icon="mdi-email"
                        label="Email"
                        type="email"
                        v-model="form_fields.email"
                      ></v-text-field>
                    </v-row>

                    <v-row>
                      <v-text-field
                        outlined
                        prepend-inner-icon="mdi-phone"
                        label="Contact No"
                        type="number"
                        v-model="form_fields.phone"
                      ></v-text-field>
                    </v-row>

                    <v-divider></v-divider>

                    <v-row>
                      <v-checkbox v-model="form_fields.expire_password">
                        <template v-slot:label>
                          <div>User must change password at next login</div>
                        </template>
                      </v-checkbox>
                    </v-row>
                  </v-card-text>
                </v-card>

                <v-card-actions class="justify-end">
                  <v-btn color="primary" text @click="e1 = 2">
                    Next <v-icon> mdi-chevron-right</v-icon>
                  </v-btn>
                </v-card-actions>
              </v-stepper-content>

              <v-stepper-content step="2">
                <v-card flat>
                  <v-card-text>
                    <v-row>
                      <v-select
                        :items="routeList"
                        item-text="name"
                        item-value="id"
                        label="Route"
                        outlined
                        prepend-inner-icon="mdi-directions-fork"
                        v-model="form_fields.route_id"
                      ></v-select>
                    </v-row>

                    <v-row class="flex">
                      <v-label
                        >Action
                        <v-radio-group v-model="row" row>
                          <v-radio label="Assigned" value="radio-1"></v-radio>
                          <v-radio
                            label="Not Assigned"
                            value="radio-2"
                          ></v-radio>
                        </v-radio-group>
                      </v-label>
                    </v-row>

                    <v-row>
                      <v-text-field
                        outlined
                        prepend-inner-icon="mdi-email"
                        label="Balance"
                        type="number"
                        suffix="SMS"
                        v-model="form_fields.balance"
                      ></v-text-field>
                    </v-row>

                    <v-row>
                      <v-date-picker v-model="form_fields.validity">
                      </v-date-picker>
                    </v-row>
                  </v-card-text>
                </v-card>

                <v-card-actions class="justify-end">
                  <v-btn color="primary" text @click="e1 = 1">
                    <v-icon> mdi-chevron-left </v-icon> Back
                  </v-btn>

                  <v-btn
                    color="primary"
                    text
                    v-on:click="addUser"
                    :loading="loading"
                  >
                    <v-icon class="mr-1"> mdi-account-circle </v-icon>
                    Create Account
                  </v-btn>
                </v-card-actions>
              </v-stepper-content>
            </v-stepper-items>
          </v-stepper>
        </v-card-text>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: false,
      form_fields: [],
      routeList: [],
      isSaving: false,
      loading: false,
      addUserDialog: false,
      userTypeList: [],

      validityList: [
        "1 Month",
        "2 Months",
        "3 Months",
        "4 Months",
        "5 Months",
        "6 Months",
        "7 Months",
        "8 Months",
        "9 Months",
        "10 Months",
        "11 Months",
        "1 Year",
        "2 Years",
        "3 Years",
        "Unlimited",
      ],
      e1: 1,
      row: null,
    };
  },
  mounted() {
    const self = this;
    self.getRoles();
    self.getRoutes();
  },

  methods: {
    add() {
      const self = this;
      self.addUserDialog = true;
    },

    async getRoles() {
      const self = this;
      self.url = "/roles";
      self.userTypeList = await self.getData();
    },

    async getRoutes() {
      const self = this;
      self.url = "/route";
      self.routeList = await self.getData();
      console.log(self.routeList);
    },
    store() {
      const self = this;
      console.log(self.form_fields);
      self.url = "/create";
      let response = self.post(self.form_fields);
    },
    addUser() {
      const self = this;
      self.loading = true;
      console.log(self.form_fields);
      self.url = "/user/create";

      console.log(self.form_fields);
      let data = {
        account_type: self.form_fields.account_type,
        company_name: self.form_fields.company_name,
        name: self.form_fields.name,
        login_id: self.form_fields.login_id,
        email: self.form_fields.email,
        password: self.form_fields.password,
        phone: self.form_fields.phone,
        address: self.form_fields.address,
        route_id: self.form_fields.route_id,
        balance: self.form_fields.balance,
        validity: self.form_fields.validity,
        expire_password: self.form_fields.expire_password,
      };

      self.post(data, async () => {
        self.loading = false;
        self.$eventBus.$emit("usersData");
        self.addUserDialog = false;
        console.log("success");
      });
      // let response = self.post(self.form_fields);
      // console.log(response);
    },
  },
};
</script>
