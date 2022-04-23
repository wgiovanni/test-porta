<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Registro</div>

          <div class="card-body">
            <form method="POST" @submit.prevent="register()">

              <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">Nombre</label>

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

                  <!-- @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror -->
                </div>
              </div>

              <div class="row mb-3">
                <label
                  for="email"
                  class="col-md-4 col-form-label text-md-end"
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

                  <!-- @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror -->
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

                  <!-- @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror -->
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
              name: '',
              email: '',
              password: '',
              password_confirmation: ''
          }
      }
  },
  methods: {
      register() {
          console.log(this.user.name, this.user.email, this.user.password, this.user.password_confirmation);
      }
  }
};
</script>
