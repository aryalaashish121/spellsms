<template>
  <div data-aos="zoom-out" data-aos-duration="1000" class="p-5 md:px-3 md:py-2">
    <div>
      <v-breadcrumbs :items="breadcrumbsItems">
        <template v-slot:divider>
          <v-icon>mdi-chevron-right</v-icon>
        </template>
      </v-breadcrumbs>
    </div>

    <div class="w-full h-auto shadow-md rounded-lg px-5">
      <div class="w-full lg:w-8/12 xl:w-6/12">
        <v-card flat>
          <v-card-title class="font-black">
            Send SMS Quickly and Efficiently
          </v-card-title>
          <div class="flex space-x-1 ml-4 -mt-3">
            <div class="w-14 h-0.5 rounded-full bg-gray-600"></div>
            <div class="w-6 h-0.5 bg-gray-600 rounded-full"></div>
          </div>

          <v-card-text class="mt-5 ml-3">
            <v-row>
              <v-select
                outlined
                :items="campaignList"
                label="Select Campaign"
                prepend-inner-icon="mdi-sign-text"
              >
              </v-select>
            </v-row>

            <v-row>
              <v-select
                outlined
                :items="routeList"
                label="Select Route"
                prepend-inner-icon="mdi-routes"
              >
              </v-select>
            </v-row>

            <v-row>
              <v-select
                outlined
                :items="senderList"
                label="Select Sender ID"
                prepend-inner-icon="mdi-card-account-details"
              >
              </v-select>
            </v-row>

            <v-row>
              <label for="" class="text-lg font-black">
                <v-icon small>mdi-cog</v-icon> Options :
              </label>
            </v-row>

            <v-row>
              <div class="flex space-x-3 -mt-3">
                <div>
                  <v-checkbox
                    v-model="checkDuplicates"
                    label="Remove Duplicates"
                  >
                  </v-checkbox>
                </div>

                <div>
                  <v-checkbox v-model="checkInvalids" label="Remove Invalids">
                  </v-checkbox>
                </div>

                <div>
                  <v-checkbox v-model="checkBlacklist" label="Blacklist">
                  </v-checkbox>
                </div>
              </div>
            </v-row>

            <v-row>
              <label for="" class="text-lg font-black">
                <v-icon small>mdi-message-cog</v-icon> SMS Type :
              </label>
            </v-row>

            <v-row>
              <div class="-mt-3">
                <v-radio-group row>
                  <v-radio label="Text"> </v-radio>
                  <v-radio label="Unicode"> </v-radio>
                  <v-radio label="Dynamic"> </v-radio>
                </v-radio-group>
              </div>
            </v-row>

            <v-row class="flex">
              <label for="" class="text-lg font-black">
                <v-icon small>mdi-message-draw</v-icon> SMS Content :
              </label>
              <div>
                <a href="">Use Template</a>
              </div>
            </v-row>

            <v-row>
              <div class="w-full mt-2">
                <v-textarea outlined placeholder="Enter SMS Content here">
                </v-textarea>
              </div>
            </v-row>

            <v-row>
              <label for="" class="text-lg font-black">
                <v-icon small>mdi-clock</v-icon> Schedule :
              </label>
            </v-row>

            <v-row>
              <div class="-mt-3">
                <v-radio-group row>
                  <v-radio label="Now"> </v-radio>
                  <v-radio label="Later"> </v-radio>
                  <v-radio label="Long Course"> </v-radio>
                </v-radio-group>
              </div>
            </v-row>
          </v-card-text>
        </v-card>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      checkDuplicates: false,
      checkInvalids: false,
      checkBlacklist: false,
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
      campaignList: ["Admission Open", "Job Vacancy"],
      routeList: ["SMSBIT", "SMSBIT-2"],
      senderList: ["AccsBit", "NikBit"],
    };
  },
};
</script>