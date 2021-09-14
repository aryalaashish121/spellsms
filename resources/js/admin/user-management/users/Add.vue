<template>
  <div>
    <v-dialog v-model="addUserDialog" persistent max-width="750px" scrollable>
      <v-card>
        <v-card-title class="primary white--text" elevation="5">
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
                        outlined
                        prepend-inner-icon="mdi-account-cog"
                      ></v-select>
                    </v-row>

                    <v-row>
                      <v-text-field
                        outlined
                        prepend-inner-icon="mdi-office-building"
                        label="Company Name"
                        type="text"
                      ></v-text-field>
                    </v-row>

                    <v-row>
                      <v-text-field
                        outlined
                        prepend-inner-icon="mdi-account-circle"
                        label="Customer Name"
                        type="text"
                      ></v-text-field>
                    </v-row>

                    <v-row>
                      <v-text-field
                        outlined
                        prepend-inner-icon="mdi-map-marker"
                        label="Company Address"
                        type="text"
                      ></v-text-field>
                    </v-row>

                    <v-row>
                      <v-text-field
                        outlined
                        prepend-inner-icon="mdi-account-arrow-right"
                        label="Assign login ID"
                        type="text"
                      ></v-text-field>
                    </v-row>

                    <v-row>
                      <v-text-field
                        outlined
                        prepend-inner-icon="mdi-account-key"
                        label="Assign password"
                        type="password"
                      ></v-text-field>
                    </v-row>

                    <v-row>
                      <v-text-field
                        outlined
                        prepend-inner-icon="mdi-email"
                        label="Email"
                        type="email"
                      ></v-text-field>
                    </v-row>

                    <v-row>
                      <v-text-field
                        outlined
                        prepend-inner-icon="mdi-phone"
                        label="Mobile No"
                        type="number"
                      ></v-text-field>
                    </v-row>

                    <v-divider></v-divider>

                    <v-row>
                      <v-checkbox v-model="checkbox">
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
                        label="Route"
                        outlined
                        prepend-inner-icon="mdi-directions-fork"
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
                        type="text"
                        suffix="SMS"
                      ></v-text-field>
                    </v-row>

                    <v-row>
                      <v-select
                        :items="validityList"
                        label="Validity"
                        outlined
                        prepend-inner-icon="mdi-calendar-clock"
                      ></v-select>
                    </v-row>
                  </v-card-text>
                </v-card>

                <v-card-actions class="justify-end">
                  <v-btn color="primary" text @click="e1 = 1">
                    <v-icon> mdi-chevron-left </v-icon> Back
                  </v-btn>

                  <v-btn color="primary" text @click="e1 = 1">
                    <v-icon class="mr-1"> mdi-account-circle </v-icon> Create
                    Account
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
  data: () => ({
    addUserDialog: false,
    userTypeList: ["Client", "Reseller"],
    routeList: ["SMSBIT ID: 116", "SMSBIT ID: 117", "SMSBIT ID: 118"],
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
    checkbox: false,
    e1: 1,
    row: null,
  }),

  methods: {
    add() {
      const self = this;
      self.addUserDialog = true;
    },
  },
};
</script>