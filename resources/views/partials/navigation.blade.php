<nav class="a-navbar">
  <div class="flex items-center my-auto h-full">
      <button class="text-3xl mr-3" x-data @@click="$store.sidebar.toggle()">
          <div class="i-mdi:menu"></div>
      </button>
      <a href="{{ url('/') }}" class="inline-flex flex-col items-center select-none">
          <div class="i-mdi:motorcycle text-5xl"></div>
      </a>
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
                        class="a-form-control" password="email"
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