@extends('layouts.app')

@section('title', 'Travel Tips - Vraman')

@section('content')
<section class="relative h-64 bg-gradient-to-r from-primary-600 to-primary-800">
    <div class="relative container mx-auto px-4 h-full flex items-center">
        <div class="text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Travel Tips</h1>
            <p class="text-xl opacity-90">Essential tips for an unforgettable trip to India</p>
        </div>
    </div>
</section>

<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Before You Travel -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-clipboard-check text-primary-600 text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Before You Travel</h2>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <div>
                                <strong class="text-gray-800">Valid Passport & Visa:</strong>
                                <p class="text-gray-600">Ensure your passport is valid for at least 6 months from your travel date. Apply for an Indian e-Visa online.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <div>
                                <strong class="text-gray-800">Travel Insurance:</strong>
                                <p class="text-gray-600">Always purchase comprehensive travel insurance covering medical emergencies, trip cancellations, and lost luggage.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <div>
                                <strong class="text-gray-800">Vaccinations:</strong>
                                <p class="text-gray-600">Consult your doctor about recommended vaccinations. Hepatitis A, Typhoid, and Tetanus are commonly recommended.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <div>
                                <strong class="text-gray-800">Copies of Documents:</strong>
                                <p class="text-gray-600">Keep digital and physical copies of your passport, visa, travel insurance, and important documents.</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Health & Safety -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-heartbeat text-red-600 text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Health & Safety</h2>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-tint text-blue-500 mt-1 mr-3"></i>
                            <div>
                                <strong class="text-gray-800">Drink Bottled Water:</strong>
                                <p class="text-gray-600">Always drink bottled or purified water. Avoid ice cubes and tap water. Check the seal on bottles.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-utensils text-orange-500 mt-1 mr-3"></i>
                            <div>
                                <strong class="text-gray-800">Food Safety:</strong>
                                <p class="text-gray-600">Eat freshly cooked hot food. Be cautious with street food. Avoid raw vegetables and unpeeled fruits from unknown sources.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-pills text-green-500 mt-1 mr-3"></i>
                            <div>
                                <strong class="text-gray-800">Carry Medications:</strong>
                                <p class="text-gray-600">Bring essential medicines including antidiarrheal, pain relievers, and any prescription medications in original containers.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-sun text-yellow-500 mt-1 mr-3"></i>
                            <div>
                                <strong class="text-gray-800">Sun Protection:</strong>
                                <p class="text-gray-600">Use sunscreen, wear sunglasses, and carry a hat. India can be very hot, especially during summer months.</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Cultural Etiquette -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-hands-praying text-purple-600 text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Cultural Etiquette</h2>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-shoe-prints text-gray-500 mt-1 mr-3"></i>
                            <div>
                                <strong class="text-gray-800">Remove Shoes:</strong>
                                <p class="text-gray-600">Always remove your shoes before entering temples, mosques, and sometimes homes. Look for shoe racks outside.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-tshirt text-blue-500 mt-1 mr-3"></i>
                            <div>
                                <strong class="text-gray-800">Dress Modestly:</strong>
                                <p class="text-gray-600">When visiting religious sites, cover your shoulders and knees. Some places may require head covering.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-hand-paper text-orange-500 mt-1 mr-3"></i>
                            <div>
                                <strong class="text-gray-800">Use Right Hand:</strong>
                                <p class="text-gray-600">Use your right hand for eating and passing items. The left hand is considered impure in Indian culture.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-camera text-gray-500 mt-1 mr-3"></i>
                            <div>
                                <strong class="text-gray-800">Ask Before Photographing:</strong>
                                <p class="text-gray-600">Always ask permission before photographing people. Some religious sites prohibit photography.</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Money Matters -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-rupee-sign text-green-600 text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Money Matters</h2>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-money-bill-wave text-green-500 mt-1 mr-3"></i>
                            <div>
                                <strong class="text-gray-800">Carry Cash:</strong>
                                <p class="text-gray-600">While cards are widely accepted, smaller shops and rural areas prefer cash. ATMs are readily available in cities.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-exchange-alt text-blue-500 mt-1 mr-3"></i>
                            <div>
                                <strong class="text-gray-800">Currency Exchange:</strong>
                                <p class="text-gray-600">Exchange currency at official money changers or banks. Avoid exchanging on the street.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-receipt text-yellow-500 mt-1 mr-3"></i>
                            <div>
                                <strong class="text-gray-800">Bargaining:</strong>
                                <p class="text-gray-600">Bargaining is expected in markets and with rickshaws. Start at about 50% of the asking price and negotiate.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-hand-holding-usd text-purple-500 mt-1 mr-3"></i>
                            <div>
                                <strong class="text-gray-800">Tipping:</strong>
                                <p class="text-gray-600">Tipping is appreciated but not mandatory. 10% at restaurants, ₹50-100 for guides, and small change for porters.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Quick Tips Card -->
                <div class="bg-primary-50 rounded-xl p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Quick Tips</h3>
                    <ul class="space-y-3 text-gray-700">
                        <li class="flex items-center">
                            <i class="fas fa-check text-primary-600 mr-2"></i>
                            Carry toilet paper/tissues
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-primary-600 mr-2"></i>
                            Download offline maps
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-primary-600 mr-2"></i>
                            Get a local SIM card
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-primary-600 mr-2"></i>
                            Learn basic Hindi phrases
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-primary-600 mr-2"></i>
                            Use ride-hailing apps
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-primary-600 mr-2"></i>
                            Carry power adapter
                        </li>
                    </ul>
                </div>

                <!-- Emergency Numbers -->
                <div class="bg-red-50 rounded-xl p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Emergency Numbers</h3>
                    <ul class="space-y-3">
                        <li class="flex items-center justify-between">
                            <span class="text-gray-700">Police</span>
                            <span class="font-bold text-red-600">100</span>
                        </li>
                        <li class="flex items-center justify-between">
                            <span class="text-gray-700">Ambulance</span>
                            <span class="font-bold text-red-600">102</span>
                        </li>
                        <li class="flex items-center justify-between">
                            <span class="text-gray-700">Fire</span>
                            <span class="font-bold text-red-600">101</span>
                        </li>
                        <li class="flex items-center justify-between">
                            <span class="text-gray-700">Tourist Helpline</span>
                            <span class="font-bold text-red-600">1363</span>
                        </li>
                        <li class="flex items-center justify-between">
                            <span class="text-gray-700">Women Helpline</span>
                            <span class="font-bold text-red-600">1091</span>
                        </li>
                    </ul>
                </div>

                <!-- Packing Essentials -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Packing Essentials</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li><i class="fas fa-suitcase text-primary-600 mr-2"></i>Comfortable walking shoes</li>
                        <li><i class="fas fa-umbrella text-primary-600 mr-2"></i>Umbrella/raincoat</li>
                        <li><i class="fas fa-solar-panel text-primary-600 mr-2"></i>Power bank</li>
                        <li><i class="fas fa-first-aid text-primary-600 mr-2"></i>Basic first aid kit</li>
                        <li><i class="fas fa-hand-sparkles text-primary-600 mr-2"></i>Hand sanitizer</li>
                        <li><i class="fas fa-bug text-primary-600 mr-2"></i>Insect repellent</li>
                    </ul>
                </div>

                <!-- Need Help -->
                <div class="bg-primary-600 rounded-xl p-6 text-white">
                    <h3 class="text-xl font-bold mb-3">Need Help Planning?</h3>
                    <p class="opacity-90 mb-4">Our travel experts are here to assist you</p>
                    <a href="{{ route('contact') }}" class="block text-center bg-white text-primary-600 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
