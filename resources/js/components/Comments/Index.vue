<template>
  <div class="container mt-4">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Titulo</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Created_at</th>
          <th colspan="2">operaciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="comment in comments.data" :key="comment.id">
          <th>{{ comment.id }}</th>
          <th>{{ comment.title }}</th>
          <td>{{ comment.comment_text.substring(0, 30) }}</td>
          <td>{{ comment.created_at }}</td>
          <td>
            <router-link class="btn btn-primary"
              :to="{ name: 'comments.edit', params: { id: comment.id } }"
              >Editar</router-link
            >
          </td>
          <td>
            <button class="btn btn-danger" @click="delete_comment(comment.id)">
              Eliminar
            </button>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="row justify-content-center">
      <pagination
        :data="comments"
        @pagination-change-page="getResults"
      ></pagination>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      comments: {},
    };
  },
  mounted() {
    this.getResults();
    // axios.get('/api/comments').then(response =>{
    //   this.comments = response.data.data;
    // })
  },
  methods: {
    // Our method to GET results from a Laravel endpoint
    getResults(page = 1) {
      axios.get("api/comments?page=" + page).then((response) => {
        this.comments = response.data;
      });
    },
    delete_comment(comment_id) {
      this.$swal({
        title: "esta seguro?",
        text: "¿no podra revertirlo",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        CancelButtonColor: "#d33",
        confirmButtonText: "Si eliminar",
      }).then((response) => {
        if (response.value) {
          axios
            .delete("/api/comments/" + comment_id)
            .then((response) => {
              this.$swal({
                icon: "success",
                title: "Si se Eliminado el comentario",
              });
              this.getResults();
            })
            .catch((error) => {
              this.$swal({
                icon: "error",
                title: "Si se Eliminado el comentario",
              });
            });
        }
      });
    },
  },
};
</script>