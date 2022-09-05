<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import JetAuthenticationCard from "@/Components/AuthenticationCard.vue";
import JetApplicationLogo from "@/Components/ApplicationLogo.vue";
import JetButton from "@/Components/Button.vue";
import JetInput from "@/Components/Input.vue";
import JetCheckbox from "@/Components/Checkbox.vue";
import JetLabel from "@/Components/Label.vue";
import JetInputError from "@/Components/InputError.vue";

const form = useForm({
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
  terms: false,
});

const submit = () => {
  form.post(route("register"), {
    onFinish: () => form.reset("password", "password_confirmation"),
  });
};
</script>

<template>
  <Head title="Register" />

  <JetAuthenticationCard>
    <template #logo>
      <JetApplicationLogo />
    </template>

    <p class="mb-0">New Account</p>
    <h4 class="mb-4">Fill up all details</h4>

    <form @submit.prevent="submit">
      <div>
        <JetLabel for="name" value="Name" />
        <JetInput
          id="name"
          v-model="form.name"
          type="text"
          :class="{ 'is-invalid': form.errors.name }"
          @input="form.clearErrors('name')"
          required
          autofocus
          autocomplete="name"
        />
        <JetInputError :message="form.errors.name" />
      </div>

      <div class="mt-4">
        <JetLabel for="email" value="Email" />
        <JetInput
          id="email"
          v-model="form.email"
          type="email"
          :class="{ 'is-invalid': form.errors.email }"
          @input="form.clearErrors('email')"
          required
        />
        <JetInputError :message="form.errors.email" />
      </div>

      <div class="mt-4">
        <JetLabel for="password" value="Password" />
        <JetInput
          id="password"
          v-model="form.password"
          type="password"
          :class="{ 'is-invalid': form.errors.password }"
          @input="form.clearErrors('password')"
          required
          autocomplete="new-password"
        />
        <JetInputError :message="form.errors.password" />
      </div>

      <div class="mt-4">
        <JetLabel for="password_confirmation" value="Confirm Password" />
        <JetInput
          id="password_confirmation"
          v-model="form.password_confirmation"
          type="password"
          :class="{ 'is-invalid': form.errors.password_confirmation }"
          @input="form.clearErrors('password_confirmation')"
          required
          autocomplete="new-password"
        />
        <JetInputError :message="form.errors.password_confirmation" />
      </div>

      <div
        v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature"
        class="mt-4"
      >
        <JetLabel for="terms">
          <div class="flex items-center">
            <JetCheckbox id="terms" v-model:checked="form.terms" name="terms" />

            <div class="ms-2">
              I agree to the
              <a
                target="_blank"
                :href="route('terms.show')"
                class="underline text-sm text-gray-600 hover:text-gray-900"
                >Terms of Service</a
              >
              and
              <a
                target="_blank"
                :href="route('policy.show')"
                class="underline text-sm text-gray-600 hover:text-gray-900"
                >Privacy Policy</a
              >
            </div>
          </div>
        </JetLabel>
      </div>

      <div class="d-grid gap-2">
        <JetButton
          class="mt-4"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Register
        </JetButton>
      </div>
    </form>

    <template #footer>
      <Link
        :href="route('login')"
      >
        Already registered?
      </Link>
    </template>
  </JetAuthenticationCard>
</template>
