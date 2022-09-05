<script setup>
import { nextTick, ref } from "vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";
import JetAuthenticationCard from "@/Components/AuthenticationCard.vue";
import JetApplicationLogo from "@/Components/ApplicationLogo.vue";
import JetButton from "@/Components/Button.vue";
import JetInput from "@/Components/Input.vue";
import JetLabel from "@/Components/Label.vue";
import JetInputError from "@/Components/InputError.vue";

const recovery = ref(false);

const form = useForm({
  code: "",
  recovery_code: "",
});

const recoveryCodeInput = ref(null);
const codeInput = ref(null);

const toggleRecovery = async () => {
  recovery.value ^= true;

  await nextTick();

  if (recovery.value) {
    recoveryCodeInput.value.focus();
    form.code = "";
  } else {
    codeInput.value.focus();
    form.recovery_code = "";
  }
};

const submit = () => {
  form.post(route("two-factor.login"));
};
</script>

<template>
  <Head title="Two-factor Confirmation" />

  <JetAuthenticationCard>
    <template #logo>
      <JetApplicationLogo />
    </template>

    <div class="mb-4 text-sm text-gray-600">
      <template v-if="!recovery">
        Please confirm access to your account by entering the authentication
        code provided by your authenticator application.
      </template>

      <template v-else>
        Please confirm access to your account by entering one of your emergency
        recovery codes.
      </template>
    </div>

    <form @submit.prevent="submit">
      <div v-if="!recovery">
        <JetLabel for="code" value="Code" />
        <JetInput
          id="code"
          ref="codeInput"
          v-model="form.code"
          type="text"
          inputmode="numeric"
          autofocus
          autocomplete="one-time-code"
          :class="{ 'is-invalid': form.errors.code }"
          @input="form.clearErrors('code')"
        />
        <JetInputError :message="form.errors.code" />
      </div>

      <div v-else>
        <JetLabel for="recovery_code" value="Recovery Code" />
        <JetInput
          id="recovery_code"
          ref="recoveryCodeInput"
          v-model="form.recovery_code"
          type="text"
          autocomplete="one-time-code"
          :class="{ 'is-invalid': form.errors.recovery_code }"
          @input="form.clearErrors('recovery_code')"
        />
        <JetInputError :message="form.errors.recovery_code" />
      </div>

      <div class="flex items-center justify-end mt-4">
        <button
          type="button"
          class="
            text-sm text-gray-600
            hover:text-gray-900
            underline
            cursor-pointer
          "
          @click.prevent="toggleRecovery"
        >
          <template v-if="!recovery"> Use a recovery code </template>

          <template v-else> Use an authentication code </template>
        </button>

        <JetButton
          class="ms-4"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Log in
        </JetButton>
      </div>
    </form>
  </JetAuthenticationCard>
</template>
