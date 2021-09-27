<template>
  <div
    class="
      flex
      w-full
      justify-center
      items-center
      px-20
      mt-10
      mx-20
      py-20
      border
      shadow
      rounded-md
    "
  >
    <div class="flex w-full lg:w-1/2 space-x-10">
      <div class="w-2/6 h-auto">
        <v-text-field
          rounded
          outlined
          dense
          v-model="newPassword"
          :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
          :type="show1 ? 'text' : 'password'"
          name="input-10-1"
          label="New Passsword"
          hint="At least 8 characters"
          counter
          @click:append="show1 = !show1"
        ></v-text-field>

        <v-text-field
          rounded
          outlined
          dense
          v-model="confirmPassword"
          :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
          :type="show2 ? 'text' : 'password'"
          name="input-10-1"
          label="Confirm Passsword"
          hint="At least 8 characters"
          counter
          @click:append="show2 = !show2"
        ></v-text-field>
      </div>

      <div class="w-1/2 h-auto">
        <v-alert colored-border type="error" border="left" outlined>
          <p class="text-xs font-normal"></p>
          Passwords <b>must :</b>
          <ul>
            <li>* contain a minimum of 8 characters in length</li>
            <li>
              * contain one of each :
              <ul>
                <li>i. Uppercase letter (A-Z)</li>
                <li>ii. Lowercase letter (a-z)</li>
                <li>iii. Digit (0-9)</li>
                <li>iv. Special characters</li>
              </ul>
            </li>
          </ul>
        </v-alert>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      newPassword: "",
      confirmPassword: "",

      show1: false,
      show2: false,
    };
  },
};
</script>