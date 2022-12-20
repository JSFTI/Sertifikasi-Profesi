<nav class="a-navbar">
  <div class="flex items-center my-auto h-full">
      <button class="text-3xl mr-3" x-data @@click="$store.sidebar.toggle()">
          <div class="i-mdi:menu">
            <span class="sr-only">Navbar Toggle</span>
          </div>
      </button>
      <div class="inline-flex flex-col items-center select-none">
          <div class="i-mdi:motorcycle text-5xl"></div>
      </div>
      <h1 class="flex-grow-1 text-center text-2xl font-bold">
          CLUB MOTOR MEDAN
      </h1>
  </div>
</nav>
<aside class="a-sidebar" x-data="{
    currentUrl: `{{ url()->current() }}`
}">
    <x-sidebar-tree :items="$sidebars" />
</aside>

<template x-teleport="body">
    <x-micromodal :id="'sign-in-modal'">
        <x-slot:title>Sign In</x-slot:title>

        <div x-data="{
            form: {
                email: '',
                password: '',
            },
            invalidFeedback: {
                email: '',
                password: '',
            },
            submit(){
                axios.post('login', this.form)
                    .then(() => {
                        window.location.reload();
                    })
                    .catch((err) => {
                        if(err.response.status === 422){
                            return Object.assign(this.invalidFeedback, transformToInvalids(err.response.data.errors));
                        }

                        alert(err.response.data?.message ?? 'Error Tidak Diketauhi');
                    });
            }
        }">
            <form class="flex flex-col gap-5" @@submit.prevent="submit">
                <div class="a-form-group" :class="{invalid: invalidFeedback.email}">
                    <label class="a-form-label" for="login-email">Email</label>
                    <input
                        class="a-form-control" type="email"
                        id="login-email" placeholder="Email" x-model="form.email"
                        autocomplete="username"
                    />
                    <div class="invalid-feedback" x-text="invalidFeedback.email"></div>
                </div>
                <div class="a-form-group" :class="{invalid: invalidFeedback.password}">
                    <label class="a-form-label" for="login-password">Password</label>
                    <input
                        class="a-form-control" type="password" x-model="form.password"
                        id="login-password" placeholder="Password"
                        autocomplete="current-password"
                    />
                    <div class="invalid-feedback" x-text="invalidFeedback.password"></div>
                </div>
                <button class="a-btn mx-auto mt-5">
                    Sign In
                </button>
            </form>
        </div>
    </x-micromodal>
</template>

<template x-teleport="body">
    <x-micromodal :id="'sign-up-modal'">
        <x-slot:title>Sign Up</x-slot:title>

        <div x-data="{
            form: {
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
            },
            invalidFeedback: {
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
            },
            submit(){
                axios.post('register', this.form)
                    .then(() => {
                        window.location.reload();
                    })
                    .catch((err) => {
                        if(err.response.status === 422){
                            return Object.assign(this.invalidFeedback, transformToInvalids(err.response.data.errors));
                        }

                        alert(err.response.data?.message ?? 'Error Tidak Diketauhi');
                    });
            }
        }">
            <form class="flex flex-col gap-5" @@submit.prevent="submit">
                <div class="a-form-group" :class="{invalid: invalidFeedback.name}">
                    <label class="a-form-label" for="register-name">Name</label>
                    <input
                        class="a-form-control" type="text"
                        id="register-name" placeholder="Nama" x-model="form.name"
                        autocomplete="name"
                    />
                    <div class="invalid-feedback" x-text="invalidFeedback.name"></div>
                </div>
                <div class="a-form-group" :class="{invalid: invalidFeedback.email}">
                    <label class="a-form-label" for="register-email">Email</label>
                    <input
                        class="a-form-control" password="email"
                        id="register-email" placeholder="Email" x-model="form.email"
                        autocomplete="username"
                    />
                    <div class="invalid-feedback" x-text="invalidFeedback.email"></div>
                </div>
                <div class="a-form-group" :class="{invalid: invalidFeedback.password}">
                    <label class="a-form-label" for="register-password">Password</label>
                    <input
                        class="a-form-control" type="password" x-model="form.password"
                        id="register-password" placeholder="Password"
                        autocomplete="new-password"
                    />
                    <div class="invalid-feedback" x-text="invalidFeedback.password"></div>
                </div>
                <div class="a-form-group" :class="{invalid: invalidFeedback.password_confirmation}">
                    <label class="a-form-label" for="login-password-confirmation">Konfirmasi Password</label>
                    <input
                        class="a-form-control" type="password" x-model="form.password_confirmation"
                        id="login-password-confirmation" placeholder="Konfirmasi Password"
                    />
                    <div class="invalid-feedback" x-text="invalidFeedback.password_confirmation"></div>
                </div>
                <button class="a-btn mx-auto mt-5">
                    Sign In
                </button>
            </form>
        </div>
    </x-micromodal>
</template>