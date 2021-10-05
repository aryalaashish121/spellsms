<template>
  <div>
    <v-dialog v-model="dialog" width="800">
      <v-card>
        <v-card-title class="text-h6 primary white--text">
          Reset Password
          <v-spacer></v-spacer>
          <v-btn dark icon @click="dialog = false">
            <v-icon>mdi-close</v-icon>
          </v-btn>
        </v-card-title>

        <v-card-text class="mt-5">
          <v-row>
            <v-col cols="12" sm="12" md="5">
              <v-text-field
                class="caption"
                rounded
                outlined
                dense
                v-model="password"
                :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                :type="show1 ? 'text' : 'password'"
                name="input-10-1"
                label="New Passsword"
                hint="At least 8 characters"
                counter
                @click:append="show1 = !show1"
              ></v-text-field>

              <v-text-field
                class="caption"
                rounded
                outlined
                dense
                v-model="confirm_password"
                :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
                :type="show2 ? 'text' : 'password'"
                name="input-10-1"
                label="Confirm Passsword"
                hint="At least 8 characters"
                counter
                @click:append="show2 = !show2"
              ></v-text-field>

              <v-btn
                rounded
                dark
                color="primary"
                dense
                class="capitalize"
                elevation="2"
                @click="changePassword"
                :loading="loading"
              >
                <v-icon left small dark> mdi-lock-reset </v-icon>
                Reset Password
              </v-btn>
            </v-col>

            <v-col cols="12" sm="12" md="7">
              <v-alert colored-border type="error" border="left" outlined>
                <p class="text-xs">Passwords <b>must :</b></p>
                <ul class="text-xs text-justify">
                  <li>* contain a minimum of 8 characters in length</li>
                  <li>
                    * Best Formated password seems to be :
                    <ul>
                      <li>i. Uppercase letter (A-Z)</li>
                      <li>ii. Lowercase letter (a-z)</li>
                      <li>iii. Digit (0-9)</li>
                      <li>iv. Special characters</li>
                    </ul>
                  </li>
                </ul>
              </v-alert>
            </v-col>
          </v-row>
        </v-card-text>

        <v-divider></v-divider>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
export default {
  data() {
    return {
      dialog: false,
      password: "",
      confirm_password: "",
      userSlug: "",
      show1: false,
      show2: false,
      loading: false,
    };
  },
  methods: {
    open() {
      const self = this;
      self.dialog = true;
    },

    changePassword() {
      const self = this;
      self.loading = true;
      self.url = "/reset/password";
      let id = this.$route.params.id;
      let data = {
        password: self.password,
        confirm_password: self.confirm_password,
      };

      self
        .put(id, data)
        .then((res) => {
          self.loading = false;
          self.confirm_password = "";
          self.password = "";
        })
        .catch((err) => {
          self.loading = false;
          self.dialog = false;
        });
    },
  },
};
</script>