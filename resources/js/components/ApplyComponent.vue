<template>
  <div>
    <form @submit="formSubmit">
      <button v-if="show" type="submit" class="btn btn-success mt-2" style="width:100%">Apply</button>

      <div v-else class="alert alert-success mt-2">Application sent!</div>
    </form>
  </div>
</template>

<script>
export default {
  props: ["jobid"],
  data() {
    return {
      show: true
    };
  },
  methods: {
    formSubmit(e) {
      e.preventDefault();

      axios.post("/applications/" + this.jobid).then(response => {
        this.show = false;
      });

      //   axios.post('/applications/' + this.jobid, {

      //   }).then=((response) => {
      //       this.show = false
      //   })
    }
  }
};
</script>