<script setup>
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
  task: {
    type: Object,
    default: null,
  },
});

const showDeleteButton = ref(false);

function updateTask(identifier) {
  Inertia.put(
    route("tasks.update", identifier),
    {
      is_completed: !props.task.is_completed,
    },
    {
      preserveScroll: true,
      onSuccess: () => {
        document.activeElement.blur();
      },
    }
  );
}

function deleteTask(identifier) {
  Inertia.delete(route("tasks.destroy", identifier), {
    preserveScroll: true,
    onSuccess: () => {
      document.activeElement.blur();
    },
  });
}
</script>

<template>
  <div
    class="card card-body mb-2"
    :class="task.is_completed ? 'bg-light' : 'bg-white'"
    @mouseover="showDeleteButton = true"
    @mouseleave="showDeleteButton = false"
  >
    <div class="d-flex align-items-center justify-content-between flex-grow-1">
      <div class="d-flex align-items-center">
        <div class="form-check">
          <input
            :id="task.identifier"
            type="checkbox"
            class="form-check-input"
            style="width: 1.5rem; height: 1.5rem"
            :checked="task.is_completed"
            @change="updateTask(task.identifier)"
          />
        </div>
        <div class="ms-3">
          <label
            :for="task.identifier"
            class="text-gray-700"
            :class="{ 'line-through': task.is_completed }"
            >{{ task.title }}</label
          >
        </div>
      </div>
      <div class="ms-3" v-show="showDeleteButton">
        <button class="btn btn-link py-0" @click="deleteTask(task.identifier)">
          <i class="far fa-trash-alt"></i>
        </button>
      </div>
    </div>
  </div>
</template>