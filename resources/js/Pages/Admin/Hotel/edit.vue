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
            class="max-w-full lg:max-w-6xl mx-auto px-4 sm:px-8 lg:px-20 Hotel-style-2025-new add-scroll-bar"

        >
            <h2 class="flex justify-center text-2xl sm:text-3xl font-semibold leading-7 text-white mt-2 mb-6 font-serif">
                Add Hotel Information
            </h2>
            <form @submit.prevent="editHotel(props.hotel.id)" method="POST" class="space-y-6">
                <!-- 1. Basic Information -->
                <div class="bg-gray-800 p-4 rounded-lg mb-6">
                    <h3 class="text-xl text-white mb-4">Basic Information</h3>

                    <!-- Hotel Name -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-white">Hotel Name</label>
                            <input v-model="form.name" type="text" required class="w-full p-2 border rounded-lg text-black" />
                        </div>
                        <!-- Price per Night -->
                        <div>
                            <label class="block text-sm font-medium text-white">Category</label>
                            <select v-model="form.category" class="w-full p-2 border rounded-lg text-black">
                                <option value="All">All</option>
                                <option value="Beach">Beach</option>
                                <option value="Mountain">Mountain</option>
                                <option value="Forest">Forest</option>
                                <option value="Historical Sites">Historical Sites</option>
                                <option value="City">City</option>
                                <option value="Luxury">Luxury</option>
                                <option value="Resort">Resort</option>
                                <option value="Business">Business</option>
                                <option value="Budget">Budget</option>
                                <option value="Boutique">Boutique</option>
                                <option value="Eco-Friendly">Eco-Friendly</option>
                                <option value="Family">Family</option>
                                <option value="Romantic">Romantic</option>
                                <option value="Wellness & Spa">Wellness & Spa</option>
                            </select>
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-medium text-white">Description</label>
                        <textarea v-model="form.description" class="w-full p-2 border rounded-lg text-black"></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Rating -->
                        <div>
                            <div>
                                <label class="block text-sm font-medium text-white">Rating</label>
                                <input v-model="form.rating"  type="number" step="0.1" required min="0" max="5" class="w-full p-2 border rounded-lg text-black" />
                            </div>
                        </div>
                        <!-- Price per Night -->
                        <div>
                            <div>
                                <label class="block text-sm font-medium text-white">Price per Night ($)</label>
                                <input v-model="form.price_per_night" type="number" step="0.01" required class="w-full p-2 border rounded-lg text-black" />
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-white">add main thumb image</label>
                            <input type="file" id="imageUpload1" accept="image/*"  @change="handleImageChange(0,$event)" />
                        </div>
                        <div>
                            <div>
                                <img
                                    v-if="form.images[0] && !arrayImage[0] || arrayImage[0] === null"
                                    :src="`/storage/${form.images[0]}`"
                                    :alt="form.name"
                                    class="w-full h-64 object-cover"
                                    style="height: 80px; width: 150px; border-radius: 30px"
                                />
                                <img
                                    v-if="arrayImage[0]"
                                    :src="arrayImage[0]"
                                    alt="Uploaded Image"
                                    style="height: 80px; width: 150px; border-radius: 30px"
                                />
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4" >
                                    <label class="block text-sm font-medium text-white">image 1</label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-white">image 1</label>
                            <input type="file" id="imageUpload2" accept="image/*" @change="handleImageChange(1,$event)" />
                        </div>
                        <div>
                            <div>
                                <img
                                    v-if="form.images[1] && !arrayImage[1] || arrayImage[1] === null"
                                    :src="`/storage/${form.images[1]}`"
                                    :alt="form.name"
                                    class="w-full h-64 object-cover"
                                    style="height: 80px; width: 150px; border-radius: 30px"
                                />
                                <img
                                    v-if="arrayImage[1]"
                                    :src="arrayImage[1]"
                                    alt="Uploaded Image"
                                    style="height: 80px; width: 150px; border-radius: 30px"
                                />
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-white">image 2</label>

                            <input type="file" id="imageUpload3" accept="image/*" @change="handleImageChange(2,$event)" />
                        </div>
                        <div>
                            <div>
                                <img
                                    v-if="form.images[2] && !arrayImage[2] || arrayImage[2] === null"
                                    :src="`/storage/${form.images[2]}`"
                                    :alt="form.name"
                                    class="w-full h-64 object-cover"
                                    style="height: 80px; width: 150px; border-radius: 30px"
                                />
                                <img
                                    v-if="arrayImage[2]"
                                    :src="arrayImage[2]"
                                    alt="Uploaded Image"
                                    style="height: 80px; width: 150px; border-radius: 30px"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. Location and Contact -->
                <div class="bg-gray-800 p-4 rounded-lg mb-6">
                    <h3 class="text-xl text-white mb-4">Location & Contact</h3>

                    <!-- Location -->
                    <div>
                        <label class="block text-sm font-medium text-white">Location</label>
                        <input v-model="form.location" type="text" required class="w-full p-2 border rounded-lg text-black" />
                    </div>

                    <!-- Province & District -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-white">District</label>
                            <select required v-model="form.district_id" class="w-full p-2 border rounded-lg text-black">
                                <option disabled value="">Select a District</option>
                                <option v-for="district in filterValueDistrict" :key="district.id" :value="district.id">
                                    {{ district.name }}
                                </option>
                            </select>
                        </div>
                        <div>
                            <p class="text-white mt-2">Province</p>
                            <p class="text-white mt-2"> {{ form.province_name }}</p>
                        </div>
                    </div>


                    <!-- Latitude & Longitude -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-white">Latitude</label>
                            <input v-model="form.latitude" type="text" class="w-full p-2 border rounded-lg text-black" />
                            <p class="text-red-500 text-xs font-thin" v-if="form.errors.latitude">
                                {{ form.errors.latitude }}
                            </p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-white">Longitude</label>
                            <input v-model="form.longitude" type="text" class="w-full p-2 border rounded-lg text-black" />
                            <p class="text-red-500 text-xs font-thin" v-if="form.errors.longitude">
                                {{ form.errors.longitude }}
                            </p>
                        </div>
                    </div>


                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <div>
                                <label class="block text-sm font-medium text-white">Contact Number</label>
                                <input v-model="form.contact_number" type="text" required class="w-full p-2 border rounded-lg text-black" />
                            </div>
                        </div>
                        <div>
                            <div>
                                <label class="block text-sm font-medium text-white">Email</label>
                                <input v-model="form.email" type="email" required class="w-full p-2 border rounded-lg text-black" />
                            </div>
                            <p class="text-red-500 text-xs font-thin" v-if="form.errors.email">
                                {{ form.errors.email }}
                            </p>
                        </div>
                    </div>
                    <!-- Contact Information -->
                    <div>
                        <label class="block text-sm font-medium text-white">Website</label>
                        <input v-model="form.website" type="url" class="w-full p-2 border rounded-lg text-black" />
                    </div>
                </div>

                <!-- 3. Amenities and Additional Details -->
                <div class="bg-gray-800 p-4 rounded-lg mb-6">
                    <h3 class="text-xl text-white mb-4">Amenities & Additional Details</h3>

                    <!-- Amenities -->

                    <div class="grid grid-cols-4 ">
                        <div class="col-span-2">
                            <label for="resource" class="block text-sm font-medium leading-6">Amenities</label>
                            <input
                                type="text"
                                v-model="form.amenities"
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm"
                                placeholder="Enter or select resource"
                                required
                            />
                        </div>
                        <div class="col-span-2">
                            <label for="resource" class="block text-sm font-medium leading-6 invisible">Amenities</label>
                            <select
                                v-model="form.amenities"
                                :multiple="allowMultipleSelectionAmenities"
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm"
                            >
                                <option disabled value="">Please select one or more</option>
                                <option>WiFi</option>
                                <option>Pool</option>
                                <option>Spa</option>
                                <option>Parking</option>
                                <option>Gym</option>
                                <option>Restaurant</option>
                                <option>Bar</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-4 ">
                        <div class="col-span-2">
                            <label for="resource" class="block text-sm font-medium leading-6">Room Types</label>
                            <input
                                type="text"
                                v-model="form.room_types"
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm"
                                placeholder="Enter or select resource"
                                required
                            />
                        </div>

                        <div class="col-span-2">
                            <label for="resource" class="block text-sm font-medium leading-6 invisible">Dropdown</label>
                            <select
                                v-model="form.room_types"
                                :multiple="allowMultipleSelectionHotel"
                                class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm"
                            >
                                <option disabled value="">Please select one or more</option>
                                <option>Single Room</option>
                                <option>Double Room</option>
                                <option>Twin Room</option>
                                <option>Triple Room</option>
                                <option>Quad Room</option>
                                <option>Deluxe Room</option>
                                <option>Suite</option>
                                <option>Junior Suite</option>
                                <option>Presidential Suite</option>
                                <option>Penthouse</option>
                                <option>Villa</option>
                                <option>Bungalow</option>
                                <option>Cottage</option>
                                <option>Dormitory</option>
                                <option>Accessible Room</option>
                            </select>
                        </div>
                    </div>

                    <!-- Check-in & Check-out Time -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-white">Check-in Time</label>
                            <input v-model="form.check_in_time" type="time" class="w-full p-2 border rounded-lg text-black" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-white">Check-out Time</label>
                            <input v-model="form.check_out_time" type="time" class="w-full p-2 border rounded-lg text-black" />
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end mt-6 gap-x-6">
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </AdminAuthenticatedLayout>
</template>

<script setup>
import { Inertia } from '@inertiajs/inertia';
import AdminAuthenticatedLayout from '@/Layouts/Admin/AdminAuthenticatedLayout.vue';
import {Head, router, useForm} from '@inertiajs/vue3';
import {computed, ref, watch} from "vue";

const allowMultipleSelectionHotel = ref(true);
const allowMultipleSelectionAmenities = ref(true);

const props = defineProps({
    hotel: {
        type: Array,
    },
    districts: {
        type: Array,
    },
});

const form = useForm({
    name: props.hotel.name||"",
    description:props.hotel.description ||"",
    location: props.hotel.location||"",
    province_name: props.hotel.province_name||"",
    district_id: props.hotel.district.id ||"",
    latitude:props.hotel.latitude ||"",
    longitude: props.hotel.longitude||"",
    rating:props.hotel.rating ||"",
    price_per_night:props.hotel.price_per_night|| "",
    amenities: props.hotel.amenities.split(", ")|| "",
    room_types: props.hotel.room_types||[],
    check_in_time: props.hotel.check_in_time||"14:00",
    check_out_time: props.hotel.check_out_time||"11:00",
    contact_number: props.hotel.contact_number||"",
    email: props.hotel.email||"",
    website: props.hotel.website||"",
    category : (props.hotel.category || "all").charAt(0).toUpperCase() + (props.hotel.category || "all").slice(1),
    images: props.hotel.images||[],
});


const filterValueDistrict = computed(() => {
    console.log("Filtering for province:", form.province_name);
    return props.districts.filter(district => {
        if (form.name && form.name === district.name) {
            return true;  }
        return true;
    });
});

watch(() => form.district_id, (newDistrictId) => {
    if (!newDistrictId) return;
    const selectedDistrict = props.districts.find(d => d.id === newDistrictId);
    if (selectedDistrict && selectedDistrict.province?.province_name) {
        form.province_name = selectedDistrict.province.province_name;
        console.log("Updated province_name:", form.province_name);
    }
});

const arrayImage = [];

const handleImageChange = (index,event) => {
    const file = event.target.files[0]; // Get the selected file
    if (file) {
        form.images[index] = file;
        arrayImage[index] = URL.createObjectURL(file);
        console.log(form.images)
    }
};

const editHotel = (id) => {
    form.post(route('hotel.update',id), {
        onSuccess: () => {
            alert("hotel Update Successfully");
            console.log("hotel submitted successfully");
        },
        onError: (errors) => {
            console.log("hotel Save errors:", errors);
            if (errors.name) {
                form.errors.name = "The hotel has already been taken.";
            }
        },
    });
};

const goBack = () => {
    Inertia.visit(route('hotel.index'));
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

