<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";
const showingNavigationDropdown = ref(false);
</script>
<template>
    <nav
        class="sticky top-2 z-50 border border-white/5 bg-[#0D1117] backdrop-blur-xl"
    >
        <div class="mx-auto max-w-6xl px-6">
            <div class="flex h-16 items-center justify-between">
                <!-- LEFT -->
                <div class="flex items-center gap-10">
                    <Link :href="route('dashboard')" class="flex items-center">
                        <ApplicationLogo
                            class="h-9 w-auto fill-current text-white"
                        />
                    </Link>

                    <div class="hidden sm:flex items-center gap-6">
                        <NavLink
                            :href="route('dashboard')"
                            :active="route().current('dashboard')"
                        >
                            Dashboard
                        </NavLink>
                        <NavLink
                            :href="route('board.index')"
                            :active="route().current('board.index')"
                        >
                            Boards
                        </NavLink>
                    </div>
                </div>

                <!-- USER -->

                <div class="hidden sm:flex items-center">
                    <Dropdown align="right" width="48">
                        <template #trigger>
                            <button
                                class="flex items-center gap-2 rounded-xl border border-white/10 bg-white/5 px-4 py-2 text-sm text-gray-300 transition hover:bg-white/10"
                            >
                                {{ "Hey! " + $page.props.auth.user.name }}

                                <svg
                                    class="h-4 w-4"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    />
                                </svg>
                            </button>
                        </template>

                        <template #content>
                            <div
                                class="rounded-xl border border-white/10 bg-[#0D1117] py-2"
                            >
                                <DropdownLink :href="route('profile.edit')">
                                    Profile
                                </DropdownLink>

                                <DropdownLink
                                    :href="route('logout')"
                                    method="post"
                                    as="button"
                                >
                                    Logout
                                </DropdownLink>
                            </div>
                        </template>
                    </Dropdown>
                </div>

                <!-- MOBILE -->

                <button
                    @click="
                        showingNavigationDropdown = !showingNavigationDropdown
                    "
                    class="sm:hidden rounded-lg p-2 text-gray-400 hover:bg-white/10"
                >
                    ☰
                </button>
            </div>
        </div>
    </nav>
</template>
