<script setup>
import { Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { ref } from "vue";

const boards = ref([
    { id: 1, name: "Development Board", color: "#3B82F6" },
    { id: 2, name: "Marketing Board", color: "#A855F7" },
    { id: 3, name: "Personal Tasks", color: "#22C55E" },
]);

const selectedBoard = ref(boards.value[0]);
const open = ref(false);
const createBoard = () => {
    console.log("Create board");
};
</script>

<template>
    <Head title="Boards" />

    <AuthenticatedLayout>
        <div class="py-8">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <!-- MAIN CARD -->
                <div>
                    <!-- HEADER -->
                    <div class="mb-6 flex items-center justify-between">
                        <h1 class="text-2xl font-bold text-white">Boards</h1>

                        <button
                            @click="createBoard"
                            class="flex items-center gap-2 rounded-xl border border-white/10 bg-white/5 px-4 py-2 text-sm text-gray-300 transition hover:bg-white/10"
                        >
                            + Create Board
                        </button>
                    </div>

                    <!-- SELECT BOARD (kept separate) -->
                    <div class="mb-6 relative">
                        <label class="block text-sm text-gray-400 mb-2">
                            Select Board
                        </label>

                        <!-- Trigger -->
                        <button
                            @click="open = !open"
                            class="w-full flex items-center justify-between px-4 py-3 rounded-xl border border-white/10 bg-white/5 text-left text-white hover:bg-white/10 transition"
                        >
                            <div class="flex items-center gap-2">
                                <span
                                    class="h-2.5 w-2.5 rounded-full"
                                    :style="{
                                        backgroundColor: selectedBoard.color,
                                    }"
                                ></span>

                                <span class="text-sm font-medium">
                                    {{ selectedBoard.name }}
                                </span>
                            </div>

                            <svg
                                class="w-4 h-4 text-gray-400"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                />
                            </svg>
                        </button>

                        <!-- Dropdown -->
                        <div
                            v-if="open"
                            class="absolute z-50 mt-2 w-full rounded-xl border border-white/10 bg-[#111827] shadow-2xl overflow-hidden"
                        >
                            <button
                                v-for="board in boards"
                                :key="board.id"
                                @click="
                                    selectedBoard = board;
                                    open = false;
                                "
                                class="w-full flex items-center gap-2 px-4 py-3 text-left text-sm text-gray-300 hover:bg-white/10 transition"
                            >
                                <span
                                    class="h-2.5 w-2.5 rounded-full"
                                    :style="{ backgroundColor: board.color }"
                                ></span>

                                {{ board.name }}
                            </button>
                        </div>
                    </div>

                    <!-- BOARD CONTENT -->
                    <div
                        class="rounded-2xl border border-white/10 bg-[#0D1117] p-5"
                    >
                        <h2 class="text-xl font-semibold text-white">
                            {{ selectedBoard.name }}
                        </h2>

                        <p class="mt-1 text-gray-400 text-sm">
                            Manage your tasks here. This board is currently
                            empty. You can create tasks and move them across
                            different columns.
                        </p>

                        <!-- COLUMNS (AI dark + Trello style but still same layout) -->
                        <div
                            class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4"
                            v-if="selectedBoard"
                        >
                            <!-- TO DO -->
                            <div
                                class="rounded-2xl border border-white/10 bg-[#0D1117] p-4"
                            >
                                <!-- HEADER -->
                                <div
                                    class="flex items-center justify-between mb-4"
                                >
                                    <div class="flex items-center gap-2">
                                        <span
                                            class="h-2 w-2 rounded-full bg-gray-400"
                                        ></span>
                                        <h3 class="text-white font-medium">
                                            To Do
                                        </h3>
                                        <span class="text-xs text-gray-500"
                                            >(0)</span
                                        >
                                    </div>

                                    <!-- actions -->
                                    <div class="flex items-center gap-2">
                                        <button
                                            class="text-gray-400 hover:text-white transition"
                                        >
                                            +
                                        </button>

                                        <button
                                            class="text-gray-400 hover:text-white transition"
                                        >
                                            ⋯
                                        </button>
                                    </div>
                                </div>

                                <!-- EMPTY STATE -->
                                <div
                                    class="rounded-lg border border-white/5 bg-white/5 p-4 text-center"
                                >
                                    <p class="text-sm text-gray-500">
                                        No tasks yet
                                    </p>

                                    <button
                                        class="mt-3 text-xs text-blue-400 hover:text-blue-300 transition"
                                    >
                                        + Add first task
                                    </button>
                                </div>
                            </div>

                            <!-- IN PROGRESS -->
                            <div
                                class="rounded-xl border border-white/10 bg-[#0D1117] p-4"
                            >
                                <div
                                    class="flex items-center justify-between mb-4"
                                >
                                    <div class="flex items-center gap-2">
                                        <span
                                            class="h-2 w-2 rounded-full bg-yellow-400"
                                        ></span>
                                        <h3 class="text-white font-medium">
                                            In Progress
                                        </h3>
                                        <span class="text-xs text-gray-500"
                                            >(0)</span
                                        >
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <button
                                            class="text-gray-400 hover:text-white transition"
                                        >
                                            +
                                        </button>

                                        <button
                                            class="text-gray-400 hover:text-white transition"
                                        >
                                            ⋯
                                        </button>
                                    </div>
                                </div>

                                <div
                                    class="rounded-lg border border-white/5 bg-white/5 p-4 text-center"
                                >
                                    <p class="text-sm text-gray-500">
                                        No tasks yet
                                    </p>

                                    <button
                                        class="mt-3 text-xs text-blue-400 hover:text-blue-300 transition"
                                    >
                                        + Add first task
                                    </button>
                                </div>
                            </div>

                            <!-- DONE -->
                            <div
                                class="rounded-xl border border-white/10 bg-[#0D1117] p-4"
                            >
                                <div
                                    class="flex items-center justify-between mb-4"
                                >
                                    <div class="flex items-center gap-2">
                                        <span
                                            class="h-2 w-2 rounded-full bg-green-400"
                                        ></span>
                                        <h3 class="text-white font-medium">
                                            Done
                                        </h3>
                                        <span class="text-xs text-gray-500"
                                            >(0)</span
                                        >
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <button
                                            class="text-gray-400 hover:text-white transition"
                                        >
                                            +
                                        </button>

                                        <button
                                            class="text-gray-400 hover:text-white transition"
                                        >
                                            ⋯
                                        </button>
                                    </div>
                                </div>

                                <div
                                    class="rounded-lg border border-white/5 bg-white/5 p-4 text-center"
                                >
                                    <p class="text-sm text-gray-500">
                                        No tasks yet
                                    </p>

                                    <button
                                        class="mt-3 text-xs text-blue-400 hover:text-blue-300 transition"
                                    >
                                        + Add first task
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div
                            v-else
                            class="text-center text-gray-500 py-10 text-sm"
                        >
                            Please select a board to view its tasks.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
