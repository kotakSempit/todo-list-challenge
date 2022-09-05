<script setup>
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { Head, Link } from "@inertiajs/inertia-vue3";
import JetBanner from "@/Components/Banner.vue";
import JetDropdown from "@/Components/Dropdown.vue";
import JetDropdownLink from "@/Components/DropdownLink.vue";
import JetNavLink from "@/Components/NavLink.vue";
import JetResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import JetApplicationLogo from "@/Components/ApplicationLogo.vue";

defineProps({
  title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
  Inertia.put(
    route("current-team.update"),
    {
      team_id: team.id,
    },
    {
      preserveState: false,
    }
  );
};

const logout = () => {
  Inertia.post(route("logout"));
};
</script>

<template>
  <div>
    <Head :title="title" />

    <JetBanner />

    <nav
      class="navbar navbar-expand-lg bg-light border-bottom"
      style="padding: 24px"
    >
      <div class="container">
        <JetApplicationLogo class="navbar-brand" width="30px" height="30px" />
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarTogglerDemo02"
          aria-controls="navbarTogglerDemo02"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          </ul>

          <div v-if="$page.props.user">
            <div class="nav-item dropdown" v-if="$page.props.user">
              <a
                class="nav-link p-0"
                href="#"
                id="navbarDropdownMenuLink"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <img
                  class="rounded-circle"
                  style="height: 32px; width: 32px"
                  :src="$page.props.user.profile_photo_url"
                  :alt="$page.props.user.name"
                />
              </a>
              <ul
                class="
                  dropdown-menu dropdown-menu-end
                  shadow
                  border-light
                  p-3
                  mt-2
                "
                aria-labelledby="navbarDropdownMenuLink"
              >
                <li class="p-3">
                  <div class="font-medium text-base text-gray-800">
                    {{ $page.props.user.name }}
                  </div>
                  <div class="font-medium text-sm text-gray-500">
                    {{ $page.props.user.email }}
                  </div>
                </li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <Link
                    class="dropdown-item rounded py-2"
                    :href="route('profile.show')"
                  >
                    <i class="fas fa-cog fa-fw"></i> Account Settings
                  </Link>
                </li>
                <li>
                  <a class="dropdown-item rounded py-2" @click.prevent="logout">
                    Logout
                  </a>
                </li>
              </ul>
            </div>
          </div>

          <template v-else>
            <Link
              :href="route('login')"
              class="btn btn-primary btn-sm"
              style="padding: 8px 24px"
            >
              LOGIN
            </Link>
          </template>
        </div>
      </div>
    </nav>

    <div class="container mt-5 px-3">
      <main>
        <slot />
      </main>
    </div>
  </div>
</template>

<style scoped>
body {
  background-color: #f3f4f6;
}
</style>
