<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Navbar</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <router-link exact active-class="active" class="nav-link" :to="{name:'comments.index'}">Inicio</router-link>
          </li>
          <li class="nav-item">
            <router-link exact active-class="active" class="nav-link" :to="{name:'comments.create'}">Crear</router-link>
          </li>
        </ul>
      </div>
    </nav>
    <main>
        <div class="container">
            <router-view></router-view>
        </div>
    </main>
  </div>
</template>
<script>
export default {};
</script>