<script setup>
import { Head, useForm } from "@inertiajs/inertia-vue3";
import JetAuthenticationCard from "@/Components/AuthenticationCard.vue";
import JetApplicationLogo from "@/Components/ApplicationLogo.vue";
import JetButton from "@/Components/Button.vue";
import JetInput from "@/Components/Input.vue";
import JetLabel from "@/Components/Label.vue";
import JetInputError from "@/Components/InputError.vue";

const props = defineProps({
  email: String,
  token: String,
});

const form = useForm({
  token: props.token,
  email: props.email,
  password: "",
  password_confirmation: "",
});

const submit = () => {
  form.post(route("password.update"), {
    onFinish: () => form.reset("password", "password_confirmation"),
  });
};
</script>

<template>
  <Head title="Reset Password" />

  <JetAuthenticationCard>
    <template #logo>
      <JetApplicationLogo />
    </template>

    <form @submit.prevent="submit">
      <div>
        <JetLabel for="email" value="Email" />
        <JetInput
          id="email"
          v-model="form.email"
          type="email"
          :class="{ 'is-invalid': form.errors.email }"
          @input="form.clearErrors('email')"
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
          autocomplete="new-password"
          :class="{ 'is-invalid': form.errors.password }"
          @input="form.clearErrors('password')"
        />
        <JetInputError :message="form.errors.password" />
      </div>

      <div class="mt-4">
        <JetLabel for="password_confirmation" value="Confirm Password" />
        <JetInput
          id="password_confirmation"
          v-model="form.password_confirmation"
          type="password"
          required
          autocomplete="new-password"
          :class="{ 'is-invalid': form.errors.password_confirmation }"
          @input="form.clearErrors('password_confirmation')"
        />
        <JetInputError :message="form.errors.password_confirmation" />
      </div>

      <div class="flex items-center justify-end mt-4">
        <JetButton
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Reset Password
        </JetButton>
      </div>
    </form>
  </JetAuthenticationCard>
</template>
