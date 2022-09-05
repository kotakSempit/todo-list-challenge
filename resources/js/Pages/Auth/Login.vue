<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import JetAuthenticationCard from "@/Components/AuthenticationCard.vue";
import JetAuthenticationCardLogo from "@/Components/ApplicationLogo.vue";
import JetButton from "@/Components/Button.vue";
import JetInput from "@/Components/Input.vue";
import JetInputError from "@/Components/InputError.vue";
import JetCheckbox from "@/Components/Checkbox.vue";
import JetLabel from "@/Components/Label.vue";

defineProps({
  canResetPassword: Boolean,
  status: String,
});

const form = useForm({
  email: "",
  password: "",
  remember: false,
});

const submit = () => {
  form
    .transform((data) => ({
      ...data,
      remember: form.remember ? "on" : "",
    }))
    .post(route("login"), {
      onFinish: () => form.reset("password"),
    });
};
</script>

<template>
  <Head title="Log in" />

  <JetAuthenticationCard>
    <template #logo>
      <JetAuthenticationCardLogo />
    </template>

    <p class="mb-0">Welcome Back</p>
    <h4 class="mb-4">Login into Application</h4>

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
      {{ status }}
    </div>

    <form @submit.prevent="submit">
      <div>
        <JetLabel for="email" value="Email" />
        <JetInput
          id="email"
          v-model="form.email"
          type="email"
          :class="{ 'is-invalid': form.errors.email }"
          required
          autofocus
        />
        <JetInputError :message="form.errors.email" />
      </div>

      <div class="mt-4">
        <JetLabel for="password" value="Password" />
        <JetInput
          id="password"
          v-model="form.password"
          type="password"
          required
          autocomplete="current-password"
        />
      </div>

      <JetCheckbox
        class="mt-4"
        v-model:checked="form.remember"
        name="remember"
        label="Remember me"
      />

      <div class="d-grid gap-2">
        <JetButton class="mt-4" :disabled="form.processing">
          Continue
        </JetButton>
      </div>
    </form>

    <template #footer>
      <!-- <Link
        v-if="canResetPassword"
        :href="route('password.request')"
      >
        Forgot your password?
      </Link> -->
      <!-- <br> -->

      <Link :href="route('register')">Need an account? Register</Link>
    </template>
  </JetAuthenticationCard>
</template>
