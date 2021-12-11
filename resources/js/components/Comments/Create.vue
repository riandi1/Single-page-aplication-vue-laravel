<template>
  <div class="container mt-4">
    <form @submit.prevent="submit_form">
      <div class="form-group">
        <label for="exampleFormControlInput1">Titulo</label>
        <input
          type="text"
          class="form-control"
          id="exampleFormControlInput1"
          placeholder="Escriba el titulo"
          v-model="fields.title"
        />
        <div class="alert alert-danger" v-if="errors && errors.title">
          {{ errors.title[0] }}
        </div>
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Descripcion</label>
        <textarea
          class="form-control"
          id="exampleFormControlTextarea1"
          rows="3"
          v-model="fields.comment_text"
        ></textarea>
        <div class="alert alert-danger" v-if="errors && errors.comment_text">
          {{ errors.comment_text[0] }}
        </div>
      </div>
      <input type="file" @change="select_file" />
      <button type="submit" class="btn btn-primary" :disabled="form_submitting">
        {{ form_submitting ? "Guardando..." : "Guardar" }}
      </button>
    </form>
  </div>
</template>
<script>
export default {
  data() {
    return {
      fields: {
        title: '',
        comment_text: '',
        thumbnail: null
      },
      errors: {},
      form_submitting: false,
    };
  },
  methods: {
    select_file(event) {
      this.fields.thumbnail = event.target.files[0];
    },
    submit_form() {
      this.form_submitting = true;
      let fields = new FormData();
      for (let key in this.fields) {
        fields.append(key, this.fields[key]);
      }
      // axios.post('/api/comments',this.fields)
      axios
        .post("/api/comments",fields)
        .then((response) => {
          this.$swal({icon: 'success',title: 'Si se inserto el comentario'});
          this.$router.push("/");
          this.form_submitting = false;
        })
        .catch((error) => {
          this.$swal({icon: 'error',title: 'Completa los datos'});
          if (error.response.status === 422) {
            this.errors = error.response.data.errors;
          }
        });
    },
  },
};
</script>