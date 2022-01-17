<template>
  <div>
    <a href="#" class="dhs_link ml-1" @click="followUser" v-text="linkText"
      >Follow</a
    >
  </div>
</template>

<script>
export default {
  props: ["userId", "follows"],

  mounted() {
    console.log("Component mounted.");
  },

  data: function () {
    return {
      status: this.follows,
    };
  },

  methods: {
    followUser() {
      axios
        .post("/instadeck/follow/" + this.userId)
        .then((response) => {
          this.status = !this.status;
          console.log(response.data);
        })
        .catch((errors) => {
          if (errors.response.status == 401) {
            window.location = "/instadeck/login";
          }
        });
    },
  },

  computed: {
    linkText() {
      return this.status ? "Unfollow" : "Follow";
    },
  },
};
</script>