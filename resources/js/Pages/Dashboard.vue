<script setup>
import { computed } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import Task from "@/Components/Task.vue";
import contenteditable from "vue-contenteditable";

const props = defineProps({
  tasks: {
    type: Array,
    default: [],
  },
});

const formTitle = useForm({
  title: "My Tasks",
});

const formNewTask = useForm({
  title: "Add a task - enter to submit",
});

const availableTasks = computed(() =>
  props.tasks.filter((task) => {
    return !task.is_completed;
  })
);

const completedTasks = computed(() =>
  props.tasks.filter((task) => {
    return task.is_completed;
  })
);

function enterPressedOnTitle() {
  document.activeElement.blur();
}

function blurOnTitle() {
  console.log("blurred");
}

function enterPressedOnNewTask() {
  formNewTask.post(route("tasks.store"), {
    preserveScroll: true,
    onSuccess: () => {
      formNewTask.title = "Add a task - enter to submit";
      document.activeElement.blur();
    },
  });
}
</script>

<template>
  <AppLayout title="Dashboard">
    <div>
      <h1 class="fw-bolder">My Tasks</h1>
      <div class="mb-3 mt-4">
        <contenteditable
          tag="p"
          class="fs-5 p-3"
          style="background-color: #e5e7eb"
          :contenteditable="true"
          v-model="formNewTask.title"
          :no-nl="true"
          :no-html="true"
          @returned="enterPressedOnNewTask"
          @focus="formNewTask.title = null"
          @blur="formNewTask.title = 'Add a task - enter to submit'"
        />
      </div>
      <div>
        <task
          :task="task"
          v-for="task in availableTasks"
          :key="task.identifier"
        ></task>
      </div>
      <div
        class="d-flex flex-column align-items-center"
        v-if="availableTasks.length == 0 && completedTasks.length == 0"
      >
        <img src="/img/urban-683.png" alt="" />
        <h5 class="mb-0">There is nothing in here</h5>
        <p class="mb-0">Add new task to start!</p>
      </div>
      <div v-if="completedTasks.length > 0 || availableTasks.length > 0">
        <hr class="my-4" />
        <h5>Completed Tasks</h5>
        <div v-if="completedTasks.length > 0">
          <task
            :task="task"
            v-for="task in completedTasks"
            :key="task.identifier"
          ></task>
        </div>
        <div class="d-flex flex-column align-items-center" v-else>
          <img src="/img/urban-683.png" alt="" />
          <h5 class="mb-0">Nothing has been completed.</h5>
          <p class="mb-0">Be productive and start completing your tasks!!</p>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
