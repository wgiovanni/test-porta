<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Registro</div>
          <div class="card-body">
            <div class="alert" :class="colorAlert" v-bind="showAlert">
              {{ message }}
            </div>
            <form @submit.prevent="register()">
              <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end"
                  >Nombre</label
                >
                <div class="col-md-6">
                  <input
                    id="name"
                    type="text"
                    class="form-control"
                    name="name"
                    value=""
                    required
                    autocomplete="name"
                    autofocus
                    v-model="user.name"
                    placeholder="Nombre"
                  />
                </div>
              </div>

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
                    v-model="user.email"
                    placeholder="Email"
                  />
                </div>
              </div>

              <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end"
                  >Teléfono</label
                >
                <div class="col-md-6">
                  <input
                    id="phone"
                    type="text"
                    class="form-control"
                    name="phone"
                    value=""
                    required
                    autocomplete="phone"
                    v-model="user.phone"
                    placeholder="Teléfono"
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
                    autocomplete="new-password"
                    v-model="user.password"
                    placeholder="Contraseña"
                  />
                </div>
              </div>

              <div class="row mb-3">
                <label
                  for="password-confirm"
                  class="col-md-4 col-form-label text-md-end"
                  >Confirmar contraseña</label
                >

                <div class="col-md-6">
                  <input
                    id="password-confirm"
                    type="password"
                    class="form-control"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    v-model="user.password_confirmation"
                    placeholder="Confirmar contraseña"
                  />
                </div>
              </div>

              <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    Registrar
                  </button>
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
        name: "",
        email: "",
        phone: "",
        password: "",
        password_confirmation: "",
      },
      message: "",
      showAlert: false,
      colorAlert: "",
    };
  },
  methods: {
    register() {
      let self = this;
      axios
        .post("/register", self.user)
        .then((res) => {
          self.clear();
          self.message = "Usuario registrado con éxito.";
          self.colorAlert = "alert-success";
          self.countDownChanged();
          window.location.href = "http://localhost/";
        })
        .catch(function (error) {
          self.message = error.response.data.message + " ";
          for (let key in error.response.data.errors) {
            if (error.response.data.errors.hasOwnProperty(key)) {
              self.message += error.response.data.errors[key] + "  ";
            }
          }
          self.colorAlert = "alert-danger";
          self.countDownChanged();
        });
    },
    clear() {
      this.user.name = "";
      this.user.email = "";
      this.user.phone = "";
      this.user.password = "";
      this.user.password_confirmation = "";
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
