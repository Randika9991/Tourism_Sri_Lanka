<template>
    <Head title="District" />

    <AdminAuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Edit District info
                </h2>
                <div class="flex items-center space-x-4 ml-auto">
                    <button
                        @click="goBack"
                        class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg shadow-sm hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400"
                    >
                        Back
                    </button>
                </div>
            </div>
        </template>

        <div
            class="max-w-full lg:max-w-6xl mx-auto sm:mt-0 px-4 sm:px-8 lg:px-20 add-scroll-bar District-style-2025-new"
        >
            <h2
                class="flex justify-center text-2xl sm:text-3xl font-semibold leading-7 text-white mt-2 mb-6 font-serif"
            >
                Add District Information
            </h2>

        </div>
    </AdminAuthenticatedLayout>
</template>

<script setup>
import { Inertia } from '@inertiajs/inertia';
import AdminAuthenticatedLayout from '@/Layouts/Admin/AdminAuthenticatedLayout.vue';
import {Head, router, useForm} from '@inertiajs/vue3';
import {computed, ref, watch} from "vue";

const allowMultipleSelection = ref(false);
const imagePreview = ref(null); // Holds the preview URL

const props = defineProps({
    provinces: {
        type: Array,
    },
});

const editDistrict = (id) => {

};

const goBack = () => {
    Inertia.visit(route('district.index'));
};

// const DeleteDistrict = (id) => {
//     if (confirm('Are you sure you want to delete this district?')) {
//         router.delete(route('district.delete', id), {
//             onSuccess: () => {
//                 alert("District deleted successfully");
//             },
//             onError: (error) => {
//                 console.error('Error deleting district:', error);
//                 alert("Failed to delete district!");
//             }
//         });
//     }
// };

</script>

