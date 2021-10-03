 <template>
  <div>
    <v-tooltip right>
      <template v-slot:activator="{ on, attrs }">
        <span v-on="on" v-bind="attrs">
          <v-btn fab dark x-small :color="color" v-on:click="openDialogBox">
            <v-icon>{{ icon }}</v-icon>
          </v-btn>
        </span>
      </template>
      <span class="text-xs">{{ title }}</span>
    </v-tooltip>

    <v-dialog v-model="resetPassDialog" width="500">
      <v-card>
        <v-card-title class="text-h5 grey lighten-2">
          Privacy Policy
        </v-card-title>

        <v-card-text>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do e
        </v-card-text>

        <v-divider></v-divider>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="primary" text @click="resetPassDialog = false">
            I accept
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
import ResetPassword from "../components/Dialogues/ResetPassword";
export default {
  components: { ResetPassword },
  props: {
    icon: String,
    title: String,
    color: String,
  },

  data() {
    return {
      resetPassDialog: false,
    };
  },

  mounted() {
    const self = this;
  },

  methods: {
    openDialogBox() {
      const self = this;

      if (self.title == "Check Dialogue") {
        self.resetPassDialog = true;
      }
    },
  },
};
</script>