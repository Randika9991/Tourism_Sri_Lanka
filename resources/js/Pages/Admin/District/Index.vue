<template>

    <Head title="District" />

    <AdminAuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <!-- District Header -->
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    District Information
                </h2>

                <!-- Add New District Section -->
                <div class="text-xl font-semibold leading-tight text-gray-800">
                    <button
                        @click="addNew"
                        class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400"
                    >
                        Add New
                    </button>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 px-4">
                        <template v-if="districts.data.length > 0">
                            <div v-for="district in districts.data" :key="district.id">
                                <a :href="route('district.edit',{id: district.id})" class="block bg-white shadow-md rounded-lg overflow-hidden">
                                    <img
                                        style="height: 250px;"
                                        :src="`/storage/${district.image}`"
                                    :alt="district.name"
                                    class="w-full h-5 object-cover"
                                    />
                                    <div class="p-4">
                                        <h2 class="font-bold text-xl">Name : {{ district.name }}</h2>

                                        <p class="text-gray-600">Popular : {{ district.mostly_popular }}</p>

                                        <p class="text-gray-600">Travel Season : {{ district.travel_season }}</p>

                                    </div>
                                </a>
                            </div>
                        </template>
                        <template v-else>
                            <p>No districts available.</p>
                        </template>
                    </div>

                    <div class="mt-4 gap-4 px-4 flex justify-center">
                        <template v-for="link in districts.links" :key="link.url">
                            <Link
                                v-if="link.url"
                                :href="link.url"
                                class="mx-1 inline-flex items-center px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                :class="{ 'font-bold': link.active }"
                            >
                                <span v-html="link.label"></span>
                            </Link>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </AdminAuthenticatedLayout>
</template>

<script setup>
import AdminAuthenticatedLayout from '@/Layouts/Admin/AdminAuthenticatedLayout.vue';
import { Head,Link} from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue';
import {Inertia} from "@inertiajs/inertia";

const props = defineProps({
    districts: Object, // Ensure pets is of type Object
});

// console.log(props.districts);

const addNew = () => {
    Inertia.visit(route('district.create'));
};
</script>

