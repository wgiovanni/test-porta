<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Inicio de sesión</div>

          <div class="card-body">
            <div class="alert" :class="colorAlert" v-bind="showAlert">
              {{ message }}
            </div>
            <form @submit.prevent="login()">
              <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end"
                  >Email</label
                >
                <div class="col-md-6">
                  <input
                    id="email"
                    type="email"
                    class="form-control"
                    name="email"
                    value=""
                    required
                    autocomplete="email"
                    autofocus
                    placeholder="Email"
                    v-model="user.email"
                  />
                </div>
              </div>

              <div class="row mb-3">
                <label
                  for="password"
                  class="col-md-4 col-form-label text-md-end"
                  >Contraseña</label
                >

                <div class="col-md-6">
                  <input
                    id="password"
                    type="password"
                    class="form-control"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="Contraseña"
                    v-model="user.password"
                  />
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6 offset-md-4">
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      name="remember"
                      id="remember"
                    />

                    <label class="form-check-label" for="remember">
                      Recordar
                    </label>
                  </div>
                </div>
              </div>

              <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    Inicio de sesión
                  </button>
                  <a class="btn btn-link" href=""> Olvidaste tu contraseña </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: {
        email: "",
        password: "",
      },
      message: "",
      showAlert: false,
      colorAlert: "",
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    login() {
      let self = this;

      axios
        .post("/login", {
          email: self.user.email,
          password: self.user.password,
        })
        .then((res) => {
          self.clear();
          self.message = "Inicio de sesión exitoso.";
          self.colorAlert = "alert-success";
          self.countDownChanged();
          window.location.href = "http://localhost/";
        })
        .catch(function (error) {
          self.message = "Estas credenciales no coinciden con nuestros registros.";
          self.colorAlert = "alert-danger";
          self.countDownChanged();
        });
    },
    clear() {
      this.user.email = "";
      this.user.password = "";
    },
    countDownChanged() {
      this.showAlert = true;
      setTimeout(() => {
        this.showAlert = false;
      }, 7000);
    },
  },
};
</script>
